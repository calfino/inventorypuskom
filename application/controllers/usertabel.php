<?php 
class usertabel extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Mdl_cms','cms');
        $id_user = $this->session->userdata('username');
        if(empty($id_user)) redirect('login');                  
    }

    public function user(){
        $data['users'] = $this->cms->get_user();
        $this->load->view('viewUser',$data);
    }

    public function add_user(){
        if(!empty($this->input->post('submit'))){
            $nama   = strtolower($this->input->post('nama'));
            $data   = array('nama_user'  => $nama);
            $res    = $this->cms->insert('user',$data);
            if ($res){
                $this->session->flashdata('message','Added Successful');
                //$this->log('Create', 'user', $nama, ' ');
                redirect('usertabel/user');
            }
            else{
                $this->session->flashdata('message','Add Error');
                redirect('usertabel/user');
            }
        }
        $this->load->view('createkaryawan');    
    }

    public function edit($id){
        $data['detailUser'] = $this->cms->getItem($id,'user','id_user');
        $this->load->view('edit_user_tabel',$data);
    }

    public function update($id){    
        $nama   = $this->input->post('nama');
        $where  = array(
            'id_user' => $id);
        $data   = array(
            'nama_user' => $nama);
        $res = $this->cms->update($where,'user',$data);
        if ($res){
            $this->session->flashdata('message','Updated Successful');
            //$this->log('Update', 'user', $id, 'mengganti nama menjadi '.$nama);
            redirect('usertabel/user');
        }
        else{
            $this->session->flashdata('message','Updated Error');
            redirect('usertabel/user');
        }
    }

    public function remove($id){
        $where  = array(
            'id_user' => $id);
        $res = $this->cms->delete($where,'user');
        if ($res){
            //$this->log('remove', 'user', $id, '');
            $this->session->flashdata('message','Remove Successful');
            redirect('usertabel/user');
        }
        else{
            $this->session->flashdata('message','Remove Error');
            redirect('usertabel/user');
        }
    }



}

?>
