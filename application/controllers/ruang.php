<?php 
class ruang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mdl_cms","cms");        
        if (empty($this->session->userdata('username'))) {
            $this->session->flashdata('warning','Unauthorized Access');
            redirect('login');
        }
    }

    public function view(){
        $data['ruang'] = $this->cms->get_ruang();
        $this->load->view('lihatruang',$data);
    }

    public function add_ruang(){
        if(!empty($this->input->post('submit'))){
            $nama   = strtoupper($this->input->post('nama'));
            $gedung = strtoupper($this->input->post('gedung'));
            $data   = array(
                'nama_ruang'    => $nama,
                'gedung'        => $gedung);
            $res = $this->cms->insert('ruang',$data);
            if ($res){
                //$this->log('Create', 'ruang', $nama, ' ');
                $this->session->flashdata('message','Added Successful');
                redirect('ruang/view');
            }
            else{
                $this->session->flashdata('message','Add Error');
                redirect('ruang/view');
            }
        }
        $this->load->view('createruang');
    }

    public function edit($id){
        $data['detailRuang'] = $this->cms->getItem($id,'ruang','id_ruang');
        $this->load->view('edit_ruang',$data);
    }

    public function update($id){
        $nama   = $this->input->post('nama');
        $gedung = $this->input->post('gedung');
        $where  = array(
            'id_ruang' => $id);
        $data   = array(
            'nama_ruang'    => $nama,
            'gedung'        => $gedung);
        $res = $this->cms->update($where,'ruang',$data);
        if ($res){
            //$this->log('Update', 'ruang', $id, $nama.' '.$gedung);
            $this->session->flashdata('message','Updated Successful');
            redirect('ruang/view');
        }
        else{
            $this->session->flashdata('message','Updated Error');
            redirect('ruang/view');
        }
    }

    public function remove($id){
        $where  = array(
            'id_ruang' => $id);
        $res = $this->cms->delete($where,'ruang');
        if ($res){
            //$this->log('remove', 'ruang', $id, '');
            $this->session->flashdata('message','Updated Successful');
            redirect('ruang/view');
        }
        else{
            $this->session->flashdata('message','Updated Error');
            redirect('ruang/view');
        }
    }
}
?>