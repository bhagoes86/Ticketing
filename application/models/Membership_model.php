<?php
 
class Membership_model extends CI_Model {
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   function validate($username, $password)
   {
    $this->db->where('USERNAME', $username);
    $this->db->where('PASSWORD', $password);
    $query = $this->db->get("akun");
     
    if($query->num_rows() == 1)
    {
     return true;
    } else {
      return false;
    }
   }
  
    function create_member($email, $pwdp)
    {
     $new_member_insert_data = array(
       'ID_AKUN' => null,
       'USERNAME' => $email,
       'PASSWORD' => $pwdp,
      );

     $this->db->insert('akun',$new_member_insert_data);
    }

    function cek_email($email){
      $query = $this->db->query('SELECT * FROM `akun` WHERE `USERNAME`="'.$email.'"');
      if ($query->num_rows()>0) {
        return false;
      } else {
        return true;
      }
    }

    function getidakun($username){
      $query = $this->db->query('SELECT ID_AKUN FROM akun WHERE USERNAME="'.$username.'"');
      if ($query->num_rows()==1) {
        $query = $query->row();
        return $query->ID_AKUN;
      } else {
        return 0;
      }
    }

    function getstatususer($id){
      $this->db->where('ID_AKUN', $id);
      $query = $this->db->get("akun");
       
      if($query->num_rows() == 1)
      {
       $query = $query->row(); 
       return $query->STATUS;
      } else {
        return 0;
      }
    }

    function set_status_user($id, $status){
      $query = $this->db->query("UPDATE `akun` SET `STATUS` = '".$status."' WHERE `akun`.`ID_AKUN` = ".$id.";");
      if ($this->db->affected_rows()) {
        return true;
      } else {
        return false;
      }
    }
}