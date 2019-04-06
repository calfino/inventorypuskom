<?php 
/**
 * Date created: 4-12-2018, Vincent Sanjaya
 */
 class Mdl_cms extends CI_Model
 {
 	
 	public function __construct()
 	{
 		parent:: __construct();
 	}

#	INSERT FUNCTION

 	public function insert($table,$data){
 		return $this->db->insert($table,$data);
 	}

 	public function insert_progress($data){
 		$this->db->insert('laporan_progress',$data);
 		$sql = "SELECT * FROM laporan_progress ORDER BY id_progress DESC LIMIT 1";
 		return $this->db->query($sql)->row_array();
 	}

 	public function insert_gudang($data){
 		$this->db->insert('gudang',$data);
 		$sql = "SELECT * FROM gudang ORDER BY id_gudang DESC LIMIT 1";
 		return $this->db->query($sql)->row_array();
 	}

 	public function insert_mt_laporan($data){
 		$this->db->insert('maintenance',$data);
 		$sql = "SELECT * FROM maintenance ORDER BY id_maintenance DESC LIMIT 1";
 		return $this->db->query($sql)->row_array();
 	}

 	public function insert_log($user,$event,$table,$key,$comment)
 	{
 		$data = array(
 			'user'		=> $user,
 			'event'		=> $event,
 			'table_relation' => $table,
 			'item_id'		=> $key,
 			'comment'		=> $comment
 			);
 		return $this->db->insert('log_activities',$data);
 	}

# SELECT FUNCTION

	public function get_inventaris(){
		$sql 	= "SELECT * FROM inventaris
		NATURAL JOIN r_gudang_invent	NATURAL JOIN gudang
		NATURAL JOIN r_gudang_barang	NATURAL JOIN (SELECT id_barang,jenis,merk,seri from barang) a
		NATURAL JOIN r_user_invent		NATURAL JOIN user
		NATURAL JOIN ruang";
		return $this->db->query($sql)->result_array();		
	}

	public function get_detail_inventaris($id){
		$sql 	= "SELECT * FROM inventaris
		NATURAL JOIN r_gudang_invent	NATURAL JOIN gudang
		NATURAL JOIN r_gudang_barang	NATURAL JOIN (SELECT id_barang,jenis,merk,seri from barang) a
		NATURAL JOIN r_user_invent		NATURAL JOIN user
		NATURAL JOIN ruang where id_inventaris = $id";
		return $this->db->query($sql)->result_array();
	}

	public function get_laporan(){
		$sql	= "SELECT * FROM laporan
		NATURAL JOIN r_mt_laporan	NATURAL JOIN (SELECT id_inventaris,id_ruang from inventaris) a
									NATURAL JOIN ruang
		NATURAL JOIN laporan_status ";
		return $this->db->query($sql)->result_array();
	}
	
	public function getLaporan(){
		$sql	= " SELECT * FROM laporan NATURAL JOIN laporan_status";
		return $this->db->query($sql)->result_array();
	}

	public function get_last($table,$key){
		$sql 	= "SELECT * FROM $table ORDER BY $key DESC LIMIT 1";
		return $this->db->query($sql)->row_array();
	}

	public function get_detail_laporan($id){
		$sql 	= "SELECT * FROM laporan
		NATURAL JOIN r_mt_laporan	
		where id_laporan = $id
		-- NATURAL JOIN (SELECT id_inventaris,id_ruang from inventaris) a
		-- 							NATURAL JOIN ruang
		-- NATURAL JOIN r_gudang_invent 	NATURAL JOIN gudang
		-- NATURAL JOIN r_gudang_barang 	NATURAL JOIN (SELECT id_barang,jenis,merk,seri from barang) b
		-- NATURAL JOIN laporan_status
		-- NATURAL JOIN r_progress_laporan NATURAL JOIN laporan_progress
		-- NATURAL JOIN r_user_progress	NATURAL JOIN user ";
		return $this->db->query($sql)->result_array();
	}

	public function get_progress($id){
		$sql	= "SELECT * FROM laporan
		NATURAL JOIN r_progress_laporan NATURAL JOIN laporan_progress
		NATURAL JOIN r_user_progress 	NATURAL JOIN user where id_laporan = $id";
		return $this->db->query($sql)->result_array();
	}

	public function get_gudang(){
		$sql 	= "SELECT * FROM gudang
		NATURAL JOIN (r_gudang_barang	NATURAL JOIN barang)";
		return $this->db->query($sql)->result_array();
	}

	public function get_maintenance(){
		$sql	= "SELECT * FROM maintenance
		NATURAL JOIN r_mt_laporan	NATURAL JOIN (SELECT id_inventaris,id_ruang from inventaris) a
									NATURAL JOIN ruang
									NATURAL JOIN user";
		return $this->db->query($sql)->result_array();
	}

	public function get_detail_maintenance($id){
		$sql	= "SELECT * FROM maintenance
		NATURAL JOIN r_mt_laporan 
		NATURAL JOIN user
		NATURAL JOIN r_gudang_invent	NATURAL JOIN r_gudang_barang NATURAL JOIN barang 
			where id_maintenance = $id";
		return $this->db->query($sql)->result_array();
	}

	public function get_basic_inventaris(){
		return $this->db->get("inventaris")->result_array();
	}

	public function getInventarisBarang(){
		$sql 	= "SELECT * FROM inventaris
		NATURAL JOIN r_gudang_invent	NATURAL JOIN gudang
		NATURAL JOIN r_gudang_barang	NATURAL JOIN (SELECT id_barang,jenis,merk,seri from barang) a";
		return $this->db->query($sql)->result_array();
	}

	public function get_sort_maintenance($id){
		$sql	= "SELECT * FROM maintenance
		NATURAL JOIN r_mt_laporan	NATURAL JOIN (SELECT id_inventaris,id_ruang from inventaris) a
									NATURAL JOIN ruang
									NATURAL JOIN user
		where id_maintenance = $id";
		return $this->db->query($sql)->result_array();
	}

	public function get_count($table){
		$sql = "SELECT * FROM $table";
		return $this->db->query($sql)->num_rows();
	}

	public function get_count_undone_laporan(){
		$sql = "SELECT * FROM laporan where id_status = 1";
		return $this->db->query($sql)->num_rows();
	}

	public function get_barang_spef($id){
		$sql = "SELECT * FROM barang where id_barang = '$id'";
		return $this->db->query($sql)->row_array();
	}

	public function getAll($table){
		return $this->db->get($table)->result_array();
	}
	public function get_barang(){
		$sql = "SELECT * FROM gudang 
		NATURAL JOIN r_gudang_barang NATURAL JOIN barang";
		return $this->db->query($sql)->result_array();
	}

	public function get_itemGudang($id_barang,$tipe){
		$sql = "SELECT id_gudang FROM gudang NATURAL JOIN r_gudang_barang
		where id_barang = $id_barang and tipe_gudang = $tipe";
		return $this->db->query($sql)->row_array();
	}

	public function get_ruang(){
		return $this->db->get("ruang")->result_array();
	}

	public function get_user(){
		return $this->db->get('user')->result_array();
	}

	public function getItem($id,$table,$column){
		$query = "SELECT * FROM $table where $column = $id";
		return $this->db->query($query)->row_array();
	}

	public function getItemBarang($id){
		$query = "SELECT * FROM barang where id_barang = '$id'";
		return $this->db->query($query)->row_array();
	}

# update

	public function update($where,$table,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//alternatif tambah stok
	public function tambah($id,$stok){
		$sql = "UPDATE gudang SET stok = stok + $stok where id_gudang = $id";
		return $this->db->query($sql);
	}

	public function kurang($id){
		$sql = "UPDATE gudang SET stok = stok - 1 where id_gudang = $id";
		return $this->db->query($sql);
	}
# logister event


# delete

	public function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}


}
 ?>

