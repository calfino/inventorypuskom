<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
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

    public function index(){
        // $data['count_laporan'] = $this->cms->get_count_undone_laporan();
        $data['count_laporan'] = $this->cms->get_count('laporan');
        $data['count_inventaris'] = $this->cms->get_count('inventaris');
        $data['count_barang'] = $this->cms->get_count('barang');
            // echo "<pre>";
            // print_r($data);
            // echo "</pre";
            // die();
        $this->load->view('dashboard',$data);
    }
/*
    private function log($event, $table, $key, $comment = ''){
        return $this->cms->log($this->session->userdata('user_id'), $event, $table, $key, $comment);
    }
*/
}
