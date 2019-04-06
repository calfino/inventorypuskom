<?php 
class inventaris extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_cms','cms');
        if (empty($this->session->userdata('username'))) {
            $this->session->flashdata('warning','Unauthorized Access');
            redirect('login');
        }        
    }

    public function createinventaris()
    {
        if(!empty($this->input->post('submit'))){
            $id_inventaris = $this->input->post('id_inventaris');
            $id_barang  = $this->input->post('id_barang');
            $tipe_gudang  = $this->input->post('gudang');
            $id_ruang   = $this->input->post('ruang');
            $user    = $this->input->post('user');

            // cek if barang komputer
            // build pemilihan barang, gudang, tahun
            $bar    = $this->cms->get_barang_spef($id_barang);
            if ($bar['jenis'] == 'PC' OR $bar['jenis'] == 'KOMPUTER' ){
                $ram = $bar['ram'];
                $hdd = $bar['hdd'];
                $processor = $bar['processor'];
            }
            
            else{
                $ram = '';
                $hdd = '';
                $processor = '';
            }

            $var = $this->cms->get_itemGudang($id_barang,$tipe_gudang);

            $data = array(
                'id_inventaris' => $id_inventaris,
                'id_ruang'      => $id_ruang,
                'kondisi'       => 'baru',
                'ram'           => $ram,
                'hdd'           => $hdd,
                'processor'     => $processor
                );

            $data2  = array(
                'id_inventaris' => $id_inventaris,
                'id_gudang'     => $var['id_gudang']);

            $data3  = array(
                'id_inventaris' => $id_inventaris,
                'id_user'       => $user);


            $ins    = $this->cms->insert('inventaris',$data);
            $ins2   = $this->cms->insert('r_gudang_invent',$data2);
            $ins3   = $this->cms->insert('r_user_invent',$data3);
            $dec    = $this->cms->kurang($var['id_gudang']);
            
            if ($ins && $ins2 && $ins3){
                $this->session->set_flashdata('warning','Data Created Succesfull');
                redirect('inventaris/view');}
            else {
                $this->session->set_flashdata('warning','Error');
                redirect('inventaris/view');}
        }
        $data['barang'] = $this->cms->get_barang();
        $data['ruang']  = $this->cms->get_ruang();
        $data['user']   = $this->cms->get_user();
        $this->load->view('createinventaris',$data);

    }

    public function remove($id){
        $where  = array(
            'id_inventaris' => $id);
        $res = $this->cms->delete($where,'r_user_invent');
        $res2 = $this->cms->delete($where,'r_gudang_invent');
        $res3 = $this->cms->delete($where,'inventaris');
        if ($res) redirect('inventaris/view');
    }

    public function view()
    {
        $data['barang'] = $this->cms->get_barang();
        $data['ruang']  = $this->cms->get_ruang();
        $data['user']   = $this->cms->get_user();
        $data['inventaris'] = $this->cms->get_inventaris();        
        $this->load->view('navbar');
        $this->load->view('ViewInventaris',$data);
    }
/*
    public function index(){
        $id_user = $this->session->userdata('user_id');
//      if(empty($id_user)) redirect('login');  
        $data['invent'] = $this->cms->get_inventaris();
        $this->load->view('page/inventaris',$data);
    }

    public function create(){
        if (empty($param)) {
            $data['barang'] = $this->cms->get_gudang();
            $this->load->view('page/form_create',$data); //untuk show list barang yang bisa dijadikan inventaris
        }
        $id_inventaris = $this->input->post('id_inventaris');
        $id_barang  = $this->input->post('id_barang');
        $id_ruang   = $this->input->post('id_ruang');
        $kondisi    = $this->input->post('kondisi');
        $ram        = $this->input->post('ram');
        $hdd        = $this->input->post('hdd');
        $processor  = $this->input->post('processor');

        //troubleshoot tampilan dulu masalah gudang, fungsi tabel gudang (kurang stok dan kasih tahun pemakaian)
        //$id_gudang    = $this->input->post('gudang');

    //  $this->cms->insert->
    // skenario tampilan id_inv,id_bar/jenis bar, ruang, dari gudang baru/bekas, kondisinya
    // skenario error jika stok kosong !!! 
    #insert r_invent_gudang, r_invent_user, r_gd_barang
    }

    public function detail_inventaris($id){
        $data['inventaris'] = $this->cms->get_detail_inventaris($id);
        //record maintenance
        //record laporan
        $this->load->view('page/detail_inventaris',$data);
    }

    public function update($id){
        $id_barang  = $this->input->post('id_barang');
        $id_ruang   = $this->input->post('id_ruang');
        $kondisi    = $this->input->post('kondisi');
        $ram        = $this->input->post('ram');
        $hdd        = $this->input->post('hdd');
        $processor  = $this->input->post('processor');
        //troubleshoot tampilan dulu masalah gudang
        //$id_gudang    = $this->input->post('gudang');

        //$this->cms->update();
    }

    public function delete($id){
        $where = array(
            'id_inventaris' = $id);

        $del1 = $this->cms->delete($where, 'inventaris');
        $del2 = $this->cms->delete($where, 'r_user_invent');
        $del3 = $this->cms->delete($where, 'r_gudang_invent');
        $del4 = $this->cms->delete($where, 'r_mt_laporan');
    }
*/
}

?>