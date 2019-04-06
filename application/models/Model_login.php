<?php 
class Model_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function auth($user, $pass)
    {
        $where = array(
            'username' => $user,
            'password' => $pass
        );
        $this->db->where($where);
        return $this->db->get("user_login")->row_array();
    }
}


?>