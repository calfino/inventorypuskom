<?php 
class report_problems extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_cms','cms');        

    }

    public function index()
    {
        $this->load->view('report_problems');
    }

    public function create(){
    	if (empty($this->input->post('subject'))){
    		redirect('_404');
    	}

    	$subject	= $this->input->post('subject');
    	$detail		= $this->input->post('detail');
    	$pelapor	= $this->input->post('pelapor');
    	$email		= $this->input->post('email');
        $date       = date('y-m-d H:i:s');

    	$data 	= array(
    		'subject' 	=> $subject,
    		'detail'	=> $detail,
    		'pelapor'	=> $pelapor,
    		'email'		=> $email,
            'id_status' => '1');

    	$ins 	= $this->cms->insert('laporan',$data);

    	if ($ins){
    		echo 'Terimakasih, laporan berhasil dibuat';
            header("Refresh:2; url=".base_url()."login");    		
    	}
    	else{
    		echo 'Laporan gagal dibuat';
            header("Refresh:2; url=".base_url()."login");    		
    	}
    }
}
?>