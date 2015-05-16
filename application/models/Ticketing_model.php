<?php
class Ticketing_model extends CI_Model {
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_all_tiket_by_id($idakun){
        $this->db->where("ID_AKUN", $idakun);
        $query = $this->db->get("tiket");
        return $query;
    }

    function cari_tiket_by_id($idakun, $idtiket){
        $this->db->where("ID_AKUN", $idakun);
        $this->db->where("ID_TIKET", $idtiket);
        $query = $this->db->get("tiket");
        return $query->num_rows();
    }

    function get_posisi_ticket($idakun){
        $this->db->where("ID_AKUN", $idakun);
        $query = $this->db->get("tiket");
        return $query->num_rows();
    }

    function insert_tiket($id_akun, $nama, $notiket, $email, $nohp, $asalinstansi) {
        $data = array(
            'ID_TIKET' => NULL,
            'ID_AKUN' => $id_akun,
            'NAMA' => $nama,
            'NO_TIKET' => $notiket,
            'E_MAIL' => $email,
            'NO_HP' => $nohp,
            'ASAL_INSTANSI' => $asalinstansi,
        );
        $this->db->insert('tiket', $data);
    }

    function update_tiket($idtiket, $nama, $email, $nohp, $asalinstansi){
        $data = array(
            'NAMA' => $nama,
            'E_MAIL' => $email,
            'NO_HP' => $nohp,
            'ASAL_INSTANSI' => $asalinstansi,
        );
        $this->db->where('ID_TIKET', $idtiket);
        $this->db->update('tiket', $data);
    }

    function count_tiket(){
        $query = $this->db->query('SELECT MAX(NO_TIKET) AS S FROM `tiket`');
        if ($query->num_rows()>0) {
            $query = $query->row();
            return $query->S;
        } else {
            return 0;
        }
    }

    function get_random_voucher(){
        $query = $this->db->query("SELECT `ID_VOUCHER` FROM voucher WHERE STATUS_VOUCHER=0 ORDER BY RAND() LIMIT 1");
        return $query;
    }

    function update_beli_tiket($id, $id_voucher){
        $query = $this->db->query("UPDATE `beli` SET `ID_VOUCHER` = '".$id_voucher."' WHERE `ID_AKUN` = ".$id.";");
        return $query;
    }

    function update_voucher_terpilih($id_voucher){
        $query = $this->db->query("UPDATE `voucher` SET  `STATUS_VOUCHER` =  '1' WHERE  `ID_VOUCHER` =".$id_voucher.";");
        return $query;
    }

    function konfirmasi($id_akun, $namapengirim,$namabank,$tanggal, $biaya) {
            $data = array(
                'ID_KONFIRMASI' => NULL,
                'ID_AKUN' => $id_akun,
                'NAMA_PENGIRIM' => $namapengirim,
                'NAMA_BANK' => $namabank,
                'TANGGAL_BAYAR' => $tanggal,
                'BIAYA' => $biaya,
                );
            $this->db->insert('konfirmasi', $data);
        }

    function ambilharga($param){
        $query = $this->db->query("SELECT * FROM acara WHERE `ID_ACARA` = ".$param);
            return $query;
    }

    function ambilkode($param){
     $query = $this->db->query("SELECT * FROM voucher WHERE `ID_VOUCHER` = (SELECT ID_VOUCHER FROM beli WHERE ID_AKUN = ".$param.")");
            return $query;
    }

    function cetak_tiket($id){
        $query = $this->db->query('SELECT * FROM `tiket` where ID_AKUN = '.$id);
        return $query->result();
    }
    
}  

?>