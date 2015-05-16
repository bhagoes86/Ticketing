<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function Dashboard(){
		parent::__construct();
		isLoggedIn();

		$this->id_acara = 2; //id acara Closing diesnat FK
		$this->id = $this->session->userdata('ID_AKUN');
		$this->load->model('Membership_model');
		$this->status = $this->Membership_model->getstatususer($this->id);
		$this->load->model('Ticketing_model');
		$r = $this->Ticketing_model->ambilharga($this->id_acara);
		$r = $r->row();
		$this->min_acara = $r->MIN_TIKET;
		$this->max_acara = $r->MAX_TIKET;
		$this->nama_acara = $r->NAMA_ACARA;
		$this->harga_acara = $r->HARGA_ACARA;
	}

	private function usir($status){
		if ($status==0) {
			redirect(base_url()."dashboard");
		}
		if ($status==1) {
			redirect(base_url()."dashboard/regis");
		}
		if ($status==2) {
			redirect(base_url()."dashboard/ambilvoucher");
		}
		if ($status==3) {
			redirect(base_url()."dashboard/bayar");
		}
		if ($status==4) {
			redirect(base_url()."dashboard/tungguverifikasi");
		}
		if ($status==5) {
			redirect(base_url()."dashboard/cetaktiket");
		}
	}

		// page dashboard
	public function index()
	{
		if ($this->status!=0) {
			$this->usir($this->status);
		}
		
		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);

		$nav['registrasi'] = "active";
		$nav['ambil'] = "";
		$nav['kirim'] = "";
		$nav['bukti'] = "";

		$data = array(
			"nav" => $nav
		);

		$data5['harga_acara'] = $this->harga_acara;
		$data5['nama_acara'] = $this->nama_acara;
		$data5['min'] = $this->min_acara;
		$data5['max'] = $this->max_acara;

		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/belitiket', $data5);
		$this->load->view('footer');
	}

	public function validasi_tiket(){
		if ($this->input->post('beli')=="beli") { //jika button diklik
			$tiket = $this->input->post('tiket');
			if ($tiket>=$this->min_acara && $tiket<=$this->max_acara) { //untuk sementara masih hanya 1 tiket
				$this->set_tiket($tiket);
			} else {
				redirect(base_url()."dashboard/?error=null_tiket");
			}
		} else {
			echo "do nothing";
		}
	}

	private function set_tiket($tiket){
		$id = $this->session->userdata('ID_AKUN');
		$this->load->model('Beli_model');
		$this->Beli_model->insert_beli_tiket($this->id, $tiket);
		$this->Membership_model->set_status_user($this->id, 1);
		redirect(base_url()."dashboard/regis");
	}
	// end of page dashboard

	// page regis
	public function regis($edit = null){
		if ($this->status!=1) {
			$this->usir($this->status);
		}


		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);
		
		$nav['registrasi'] = "active";
		$nav['ambil'] = "";
		$nav['kirim'] = "";
		$nav['bukti'] = "";
		
		if ($edit==null) {
			$id = $this->session->userdata('ID_AKUN');
			$data3["qty"]=0;
			$data3["peserta"]=null;
			$this->load->model("Beli_model");
			$query = $this->Beli_model->get_qty($id);
			if ($query->num_rows()>0) {
				$query = $query->row();
				$data3["qty"]=$query->QUANTITY;

				$this->load->model('Ticketing_model');
				$data3["peserta"] = $this->Ticketing_model->get_all_tiket_by_id($id);
				$data3["posisi"] = $this->Ticketing_model->get_posisi_ticket($id);
			}

			$data = array(
				"nav" => $nav
			);
			$this->load->view('header', $data2);
			$this->load->view('dashboard/header-nav', $data);
			$this->load->view('dashboard/belitiket2', $data3);
			$this->load->view('footer');
		} else if($edit!=null){
			$id = $this->session->userdata('ID_AKUN');
			$e = $this->Ticketing_model->cari_tiket_by_id($id, $edit);
			if ($e == 0) {
				redirect(base_url().'dashboard/regis');
			}
			$data3["qty"]=0;
			$data3["peserta"]=null;
			$this->load->model("Beli_model");
			$query = $this->Beli_model->get_qty($id);
			if ($query->num_rows()>0) {
				$query = $query->row();
				$data3["qty"]=$query->QUANTITY;

				$this->load->model('Ticketing_model');
				$data3["peserta"] = $this->Ticketing_model->get_all_tiket_by_id($id);
				$data3["posisi"] = $this->Ticketing_model->get_posisi_ticket($id);
				$data3['edit'] = $edit;
			}

			$data = array(
				"nav" => $nav
			);
			$this->load->view('header', $data2);
			$this->load->view('dashboard/header-nav', $data);
			$this->load->view('dashboard/regis_edit', $data3);
			$this->load->view('footer');
		}
	}

	public function validasi_regis($edit = null){
		if ($this->input->post('regis')=="regis") { //jika button di klik
			$nama = $this->input->post("nama");
			$email =  $this->input->post("email");
			$hp =  $this->input->post("hp");
			$instansi =  $this->input->post("instansi");

			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('hp', 'hp', 'required');
			$this->form_validation->set_rules('instansi', 'instansi', 'required');
			if ($this->form_validation->run()==FALSE) {
				$this->store_regis($nama, $email, $hp, $instansi);
				if ($edit==null) {
					redirect(base_url()."dashboard/regis?error=blank");
				} else {
					redirect(base_url()."dashboard/regis/".$edit."?error=blank");
				}
			}
	 		if (preg_match('/[^0-9]/', $hp)) { //untuk symbol
	 			$this->store_regis($nama, $email, $hp, $instansi);
				if ($edit==null) {
					redirect(base_url().'dashboard/regis?error=hp');
				} else {
					redirect(base_url()."dashboard/regis/".$edit."?error=hp");
				}
	 		}
	 		if ($edit==null) {
				$this->save_tiket($this->id, $nama, $email, $hp, $instansi);
			} else {
				$e = $this->Ticketing_model->cari_tiket_by_id($this->id, $edit);
				if ($e == 0) {
					redirect(base_url().'dashboard/regis');
				}
				$this->update_tiket($edit, $nama, $email, $hp, $instansi);
			}
		}
	}

	private function update_tiket($idtiket, $nama, $email, $nohp, $asalinstansi){
		$id = $this->session->userdata('ID_AKUN');
 		$this->load->model('Ticketing_model');
 		$this->Ticketing_model->update_tiket($idtiket, $nama, $email, $nohp, $asalinstansi);

 		$posisi = $this->Ticketing_model->get_posisi_ticket($id);
 		$qty=0;
		$this->load->model("Beli_model");
		$query = $this->Beli_model->get_qty($id);
		$query = $query->row();
		$qty = $query->QUANTITY;

 		redirect(base_url().'dashboard/regis');
	}

	private function save_tiket($id, $nama, $email, $hp, $instansi){
		$id = $this->session->userdata('ID_AKUN');
 		$this->load->model('Ticketing_model');
 		$notiket = $this->Ticketing_model->count_tiket()+1;
 		$this->Ticketing_model->insert_tiket($id, $nama, $notiket, $email, $hp, $instansi);

 		$posisi = $this->Ticketing_model->get_posisi_ticket($id);
 		$qty=0;
		$this->load->model("Beli_model");
		$query = $this->Beli_model->get_qty($id);
		$query = $query->row();
		$qty = $query->QUANTITY;

 		redirect(base_url().'dashboard/regis');
	}

	private function store_regis($nama, $email, $hp, $instansi){
		$this->session->set_flashdata("nama" , $nama);		
		$this->session->set_flashdata("email" , $email);
		$this->session->set_flashdata("hp" , $hp);		
		$this->session->set_flashdata("instansi" , $instansi);
	}
	// end of page regis

	public function goambilvoucher(){
		$this->Membership_model->set_status_user($this->id, 2);
		redirect(base_url().'dashboard/ambilvoucher');
	}

	// page voucher
	public function ambilvoucher(){
		if ($this->status!=2) {
			$this->usir($this->status);
		}

		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);

		$nav['registrasi'] = "";
		$nav['ambil'] = "active";
		$nav['kirim'] = "";
		$nav['bukti'] = "";

		$data = array(
			"nav" => $nav
		);
		
		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/voucher');
		$this->load->view('footer');
	}

	public function getvoucher(){
		// echo "ambil voucher";
		if ($this->status!=2) {
			$this->usir($this->status);
		}

		$this->load->model('Ticketing_model');
		$query = $this->Ticketing_model->get_random_voucher(); //get random voucher
		$query = $query->row();
		$id_voucher = $query->ID_VOUCHER;
		// echo "ID VOUCHER = ".$id_voucher;
		$this->Ticketing_model->update_beli_tiket($this->id, $id_voucher);//update [beli]
		$this->Membership_model->set_status_user($this->id, 3); //update status akun
		$this->Ticketing_model->update_voucher_terpilih($id_voucher);//update status voucher terpilih
		redirect(base_url().'dashboard/bayar');
	}
	// end of page voucher

	// page bayar
	public function bayar(){
		if ($this->status!=3) {
			$this->usir($this->status);
		}

		$param= $this->id_acara;
		$kode= $this->session->userdata("ID_AKUN");

		$this->load->model('Ticketing_model');
		$masukindums = $this->Ticketing_model->ambilharga($param);
		$this->load->model("Beli_model");
		$query = $this->Beli_model->get_qty($this->id);
		$query = $query->row();
		$qty = $query->QUANTITY;
		$masukindums = $masukindums->row();
		$masukindums2 = $this->Ticketing_model->ambilkode($kode);
		$masukindums2 = $masukindums2->row();
		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);

		$nav['registrasi'] = "";
		$nav['ambil'] = "active";
		$nav['kirim'] = "";
		$nav['bukti'] = "";

		$data = array(
			"nav" => $nav
		);

		$masukindums = ($masukindums->HARGA_ACARA*$qty) + $masukindums2->KODE_VOUCHER;
		$data3 = array(
			'harga' => convertIntToHarga($masukindums)
			);
		
		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/voucher2', $data3);
		$this->load->view('footer');
	}
	// end of page bayar
	public function konfirmasi(){
		if ($this->status!=3) {
			$this->usir($this->status);
		}

		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);

		$nav['registrasi'] = "";
		$nav['ambil'] = "";
		$nav['kirim'] = "active";
		$nav['bukti'] = "";

		$data = array(
			"nav" => $nav
		);
		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/konfirmasi');
		$this->load->view('footer');
	}

	public function konfirmasi_validation(){
		$this->load->library('form_validation');
		$namapengirim = $this->input->post("namapengirim");
		$namabank =  $this->input->post("namabank");
		$tanggal =  $this->input->post("tanggal");
		$biaya =  $this->input->post("biaya");

		$this->form_validation->set_rules('namapengirim', 'namapengirim', 'required');
        $this->form_validation->set_rules('namabank', 'namabank', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
        if (($this->form_validation->run() == false)||($this->form_validation->run() == FALSE)) {
            $this->storeValidasi($namapengirim,$namabank,$tanggal,$biaya);
            redirect(base_url("dashboard/konfirmasi?error=blank"), 'refresh');
        } else if(preg_match('/[^0-9]/', $biaya)){
        	$this->storeValidasi($namapengirim,$namabank,$tanggal,$biaya);
			redirect(base_url().'dashboard/konfirmasi?error=biaya');
        } else {
	 		$this->load->model('Ticketing_model');
			$this->Ticketing_model->konfirmasi($this->id, $namapengirim, $namabank, $tanggal, $biaya);
			$this->Membership_model->set_status_user($this->id, 4); //update status akun
		 	redirect(base_url().'dashboard/tungguverifikasi');
        }
    }

    public function storeValidasi($namapengirim,$namabank,$tanggal,$biaya){
    	$this->session->set_flashdata("namapengirim", $namapengirim);
    	$this->session->set_flashdata("namabank", $namabank);
    	$this->session->set_flashdata("tanggal", $tanggal);
    	$this->session->set_flashdata("biaya", $biaya);
    }

    public function tungguverifikasi(){
		if ($this->status!=4) {
			$this->usir($this->status);
		}

		$data2 = array(
				'title' => "Hai Unair - Ticketing",
				'fb' => false,
				'tw' => false,
				);

		$nav['registrasi'] = "";
		$nav['ambil'] = "";
		$nav['kirim'] = "active";
		$nav['bukti'] = "";

		$data = array(
			"nav" => $nav
		);
		$param1 = $this->session->userdata('ID_AKUN');
		
		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/tunggukonfirmasi');
		$this->load->view('footer');
	}

	//tombol cetak tiket
	public function cetakpdf(){
		$id_akun = $this->session->userdata("ID_AKUN");
		redirect("http://haiunair.com/kerjasama/functions/cetaktiket.php?ida=".$id_akun);
	}


    // page cetak bukti pendaftaran
    public function cetaktiket(){
    	if ($this->status!=5) {
			$this->usir($this->status);
		}
		$this->load->model('Ticketing_model');
		
		$id = $this->session->userdata("ID_AKUN");
		$k = $this->Ticketing_model->cetak_tiket($id);
		
		$data4 = array(
			"tiket" => $k,
			'nama_acara' => $this->nama_acara,
		);
		
		$data2 = array(
			'title' => "Hai Unair - Ticketing",
			'fb' => false,
			'tw' => false,
			);

		$nav['registrasi'] = "";
		$nav['ambil'] = "";
		$nav['kirim'] = "";
		$nav['bukti'] = "active";

		$data = array(
			"nav" => $nav

		);
		
		$data3 = array(
			'harga' => "35.201"
			);
		
		$this->load->view('header', $data2);
		$this->load->view('dashboard/header-nav', $data);
		$this->load->view('dashboard/cetaktiket', $data4);
		$this->load->view('footer');
		
	}

	
	public function logout(){
		signOut();
		redirect(base_url("akun?act=logout"));
	}
	
}
