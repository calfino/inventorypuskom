<?php 
class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_cms', 'cms');
        $id_user = $this->session->userdata('username');
        if (empty($id_user)) redirect('login');
    }

    public function viewbarang()
    {
        $data['barang'] = $this->cms->getAll('barang');
/*
        echo "<pre>";
        print_r($data['barang']);
        echo "</pre>";
        die();
*/        
        $this->load->view('viewbarang', $data);
    }

    public function createbarang()
    {
        if (!empty($this->input->post('submit'))) {
            $id_barang = $this->input->post('id_barang');
            $jenis = strtoupper($this->input->post('jenis'));
            $merk = strtoupper($this->input->post('merk'));
            $seri = strtoupper($this->input->post('seri'));

            if ($jenis == 'KOMPUTER' or $jenis == 'PC') {
                $ram = strtoupper($this->input->post('ram'));
                $hdd = strtoupper($this->input->post('hdd'));
                $processor = strtoupper($this->input->post('processor'));
            } else {
                $ram = '';
                $hdd = '';
                $processor = '';
            }

            $data = array(
                'id_barang' => $id_barang,
                'jenis' => $jenis,
                'seri' => $seri,
                'merk' => $merk,
                'ram' => $ram,
                'hdd' => $hdd,
                'processor' => $processor
            );

            $res = $this->cms->insert('barang', $data);
            if ($res) {
                $this->session->set_flashdata('warning', 'Data Created Succesfull');
                redirect('barang/viewbarang');
            } else {
                $this->session->set_flashdata('warning', 'Error');
                redirect('barang/viewbarang');
            }
        }

        $this->load->view('createbarang');

    }

    public function gudang()
    {
        $data['gudang'] = $this->cms->get_gudang();
        $this->load->view('gudangbarang', $data);
    }

    public function addItemGudang()
    {
        if (!empty($this->input->post('submit'))) {
            $id_barang  = $this->input->post('id_barang');
            $gudang     = $this->input->post('gudang');
            $stok       = $this->input->post('stok');
            $tahun      = $this->input->post('tahun');

            $data_gd = array(
                'tipe_gudang' => $gudang,
                'stok'        => $stok,
                'tahun_pembelian' =>$tahun);

            $var = $this->cms->insert_gudang($data_gd);

            $data_r = array(
                'id_barang'     => $id_barang,
                'id_gudang'     => $var['id_gudang']
            );

            $ins = $this->cms->insert('r_gudang_barang',$data_r);
            if($ins) redirect('barang/gudang');
            
        }
        $data['barang'] = $this->cms->getAll('barang');
        $this->load->view('createGudang.php',$data);
    }

    public function addStokGudang($id)
    {
        if (!empty($this->input->post('submit'))) {
            $stok   = $this->input->post('stok');
            $res    = $this->cms->tambah($id,$stok);
            redirect('barang/gudang');
        }
        $this->session->set_userdata('b_id',$id);
        $this->load->view('addStok.php');
    }

    public function edit($id){
        $data['detailBarang'] = $this->cms->getItemBarang($id);
        $this->load->view('edit_barang',$data);
    }

    public function update($id){
        $jenis = strtoupper($this->input->post('jenis'));
        $merk = strtoupper($this->input->post('merk'));
        $seri = strtoupper($this->input->post('seri'));
        $ram = strtoupper($this->input->post('ram'));
        $hdd = strtoupper($this->input->post('hdd'));
        $processor = strtoupper($this->input->post('processor'));

        $where  = array(
            'id_barang' => $id);
        $data   = array(
                'jenis' => $jenis,
                'seri' => $seri,
                'merk' => $merk,
                'ram' => $ram,
                'hdd' => $hdd,
                'processor' => $processor
            );

        $res = $this->cms->update($where,'barang',$data);
        if ($res){
            $this->session->flashdata('message','Updated Successful');
            //$this->log('Update', 'user', $id, 'mengganti nama menjadi '.$nama);
            redirect('barang/viewbarang');
        }
        else{
            $this->session->flashdata('message','Updated Error');
            redirect('barang/viewbarang');
        }

    }
  /*  NTR DIUPDATE LINKNYA 
  public function update_barang()
    {
        $data['update_barang'] = $this->cms->update_barang();
        $this->load->view('edit_barang', $data);
    }
/*

  /*  NTR DIUPDATE LINKNYA 
  public function update_inventaris()
    {
        $data['update_inventaris'] = $this->cms->update_inventaris();
        $this->load->view('edit_inventaris', $data);
    }
/*

  /*  NTR DIUPDATE LINKNYA 
  public function update_user_tabel()
    {
        $data['update_user_tabel'] = $this->cms->update_user_tabel();
        $this->load->view('edit_user_tabel', $data);
    }
/*

  /*  NTR DIUPDATE LINKNYA 
  public function update_ruang()
    {
        $data['update_ruang'] = $this->cms->update_ruang();
        $this->load->view('edit_ruang', $data);
    }
/*




    public function update($id){
        $jenis      = $this->input->post('jenis');
        $merk       = $this->input->post('merk');
        $seri       = $this->input->post('seri');
        $ram        = $this->input->post('ram');
        $hdd        = $this->input->post('hdd');
        $processor  = $this->input->post('processor');

        $where  = array (
            'id_barang' => $id);

        $data   = array (
            'jenis'     => $jenis,
            'seri'      => $seri,
            'merk'      => $merk,
            'ram'       => $ram,
            'hdd'       => $hdd,
            'processor' => $processor
            );
        
        $this->cms->update($where,'barang',$data);      
    }

    public function isi_gudang($id){
        $tipe_gudang    = $this->input->post('gudang');
        $stok           = $this->input->post('stok');
        $tahun          = $this->input->post('tahun');

        $data = array(
            'tipe_gudang'   =>  $tipe_gudang,
            'stok'          =>  $stok,
            'tahun_pembelian'   => $tahun
            );

        $this->cms->insert('gudang',$data);
        $var_gd = $this->cms->get_last('gudang','id_gudang');

        $data_r = array(
            'id_barang' => $id,
            'id_gudang' => $var_gd['id_gudang']
            );

        $res = $this->cms->insert('r_gudang_barang',$data_r);
        if($res){
            $this->session->set_flashdata('warning','Warehouse Inserted Succesful');
            redirect('barang');             
        }
        else {
            $this->session->set_flashdata('warning','Error');
            redirect('barang');
        }
    }

    public function tambah($id_gd){
        $stok       = $this->input->post('stok');
        
        $where      = array(
            'id_gudang' => $id_gudang
            );

        $data       = array(
            'stok'  => 'stok'+$stok);

        $this->cms->update($where,'gudang',$data);
        if ($res) {
            $this->session->set_flashdata('warning','Added Successful');
            redirect('barang');}
    }
     */
}

?>