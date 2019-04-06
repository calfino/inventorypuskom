<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_login", "mdl");
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function checklogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $result = $this->mdl->auth($username, $password);
        if (!empty($result)) {
            $this->session->set_userdata('username', $result['username']);
            redirect(site_url('dashboard'));
        } else {
            echo "Login Failed";
            header("Refresh:3; url=".base_url()."login");
        }

    }

    public function signout(){
        $this->session->sess_destroy();
        reedirect('login');        
    }
}
