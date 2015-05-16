<?php 

class Beli_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function insert_beli_tiket($id, $qty){
		$beli = array(
			"ID_BELI" => NULL,
			"ID_AKUN" => $id,
			"QUANTITY" => $qty
			);
		$this->db->insert("beli", $beli);
	}

	function get_qty($id){
		$this->db->select("QUANTITY");
		$this->db->where('ID_AKUN', $id);
		return $this->db->get("beli");
	}

}