<?php 
class laporan extends CI_Controller
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
    	$this->load->view('form_laporan');
    }

    public function view()
    {
    	$data['laporan'] = $this->cms->getLaporan();
        $this->load->view('laporan',$data);
    }

    public function cek($id){
        $data['laporan'] = $this->cms->get_detail_laporan($id);
        $data['progress'] = $this->cms->get_progress($id);
        $this->session->set_userdata('l_id',$id);
        $this->load->view('view_cek_laporan',$data);
    }


    // public function update_laporan($id){
    //     $hasil_laporan      = $this->input->post('hasil');
    //     $tanggal_selesai    = $this->input->post('tanggal_selesai');
    //     $id_status          = $this->input->post('status');
    //     $id_inventaris      = $this->input->post('id_inventaris');
    //     $kondisi            = $this->input->post('kondisi');
    //     $id_user            = $this->input->post('user');

    //     $where = array(
    //         'id_laporan'    => $id);

    //     $data = array(
    //         'id_status'     => $id_status,
    //         'hasil_laporan' => $hasil_laporan
    //         );

    //     $data1 = array(
    //         'id_user'       => $id_user,
    //         'id_inventaris' => $id_inventaris,
    //         'kondisi'       => $kondisi
    //         );

    //     $this->cms->update($where,'laporan',$data);
    //     $this->cms->update($where,'r_mt_laporan',$data1);
    //     //$this->log('Update', 'laporan', $id, 'melengkapi data');

    //     if ($id_status == 3){
    //         $dataIns = array(
    //             'detail'    => $hasil_laporan,
    //             'tanggal'   => $tanggal_selesai
    //             );
    //         $var_mt = $this->load->cms->insert_mt_laporan($dataIns);

    //         $data['tanggal_selesai'] = $tanggal_selesai;
    //         $data1['id_maintenance'] = $var_mt['id_maintenance'];

    //         $this->cms->update($where,'r_mt_laporan',$data1);
    //         $this->cms->update($where,'laporan',$data);
    //         //error handling jika hasil_laporan, kondisi, id_inventaris tidak diisi
    //         //$this->log('Update', 'laporan', $id, 'selesai');
    //     }
    // }

    public function update(){
        if(!empty($this->input->post('submit'))){
            $id_inventaris = $this->input->post('id_inventaris');
            $id_lap = $this->session->userdata('l_id');
            
            $data = array(
                'id_inventaris' => $id_inventaris,
                'id_laporan' => $id_lap);

            $a = $this->cms->insert('r_mt_laporan',$data);

            if ($a){
                redirect('laporan/cek/'.$id_lap);
            }
        }

        $data['inventaris'] = $this->cms->getInventarisBarang();
        $this->load->view('UpdateLaporan',$data);;
    }

    public function add_progress(){
        if(!empty($this->input->post('submit'))){
            $aktivitas = $this->input->post('aktivitas');
            $user = $this->input->post('user');
            $tanggal = $this->input->post('tanggal');
            $id_laporan = $this->session->userdata('l_id');

            $data_pro = array(
                'aktivitas' => $aktivitas,
                'tanggal_progress' => $tanggal
                );

            $var_pro = $this->cms->insert_progress($data_pro);

            $data_rlap_pro = array(
                'id_laporan' => $id_laporan,
                'id_progress' => $var_pro['id_progress']
                );

            $data_ruser_pro = array(
                'id_progress' => $var_pro['id_progress'],
                'id_user'   => $user
                );
            
            $a = $this->load->cms->insert('r_progress_laporan',$data_rlap_pro);
            $b = $this->load->cms->insert('r_user_progress',$data_ruser_pro);
            $setStatusUp = $this->load->cms->set_status('laporan','2');

            if($a && $b){
                $this->session->flashdata('message','Successfully Updated');
                //$this->log('Add Progress', 'laporan_progress', $id_laporan, 'laporan ke'.$id_laporan.' progress '.id_progress.' oleh '.$id_user);
                redirect('laporan/cek/'.$id_laporan);
            }
            else{
                $this->session->flashdata('message','Error Updated');
                redirect('laporan/cek/'.$id_laporan);
            }            
        }        
        $data['user'] = $this->cms->get_user();        
        $this->load->view('createProgressLaporan.php',$data);                
    }
}
?>