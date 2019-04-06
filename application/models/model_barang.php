<?php 

class model_barang extends CI_Model
{
    public function lihat_barang()
    {
        $query = $this->db->get('barang');

        return $query->result();
    }
    public function create_barang($data)
    {

        $this->db->insert('barang', $data);



    }
}





?>
