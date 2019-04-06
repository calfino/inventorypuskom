<?php
defined('BASEPATH') or exit('No direct script access allowed');

class maintenance extends CI_Controller
{
	public function __construct(){
		parent::__construct();
        $this->load->model('Mdl_cms','cms');
        $id_user = $this->session->userdata('username');
        if(empty($id_user)) redirect('login');                  		
	}

    public function create(){
    	if(!empty($this->input->post('submit'))){
    		$id_inventaris	= strtoupper($this->input->post('id_inventaris'));
    		$kondisi	= strtoupper($this->input->post('kondisi'));
    		$tgl_mt		= $this->input->post('tanggal');
    		$detail		= strtolower($this->input->post('detail'));
    		$user 		= $this->input->post('user');
    		$data	= array(
    			'detail'	=> $detail,
    			'tanggal'	=> $tgl_mt);

    		$var_mt = $this->cms->insert_mt_laporan($data);

//            echo "<pre>";
//            print_r($data);
//            print_r($var_mt);

    		$data1	= array(
    			'id_maintenance'	=> $var_mt['id_maintenance'],
    			'id_inventaris'		=> $id_inventaris,
    			'id_user'			=> $user,
    			'kondisi_akhir'		=> $kondisi
    			 );

    		$ins1	= $this->cms->insert('r_mt_laporan',$data1);

//            print_r($data1);
//            print_r($ins1);
//            echo "</pre";
//            die();
    		if ($ins1) {
				$this->session->set_flashdata('warning','Data Created Succesfull');
				//log
                redirect('maintenance/view');}
            else {
                $this->session->set_flashdata('warning','Error');
                redirect('maintenance/view');}
    	}

    	$data['inventaris'] = $this->cms->getInventarisBarang();
    	$data['user'] = $this->cms->get_user();
/*
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
*/
    	$this->load->view('createMaintenance',$data);
    }

    public function view(){
    	$data['maintenance']	= $this->cms->get_maintenance();
    	$this->load->view('view_maintenance',$data);
    }

    public function detail($id){
         $data['detailMt'] = $this->cms->get_detail_Maintenance($id);
         $this->load->view('view_detail_maintenance',$data);
    }

}
