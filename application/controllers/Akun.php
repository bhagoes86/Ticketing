<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function index()
	{
		$data2 = array(
				'title' => "Hai Unair - Ticketing",
				'fb' => true,
				'tw' => true,
				);

		if(isset($_POST['buat'])){
			$this->validasi_buat();
		}
		else if(isset($_POST['login'])) {
			$this->validasi_login();
		}
		else {
			$this->load->view('header', $data2);
			$this->load->view('header-image');
			$this->load->view('dashboard/akun');
			$this->load->view('header-footer/footer-fb-tw');
			$this->load->view('header-footer/footer');

		}
	}

	public function validasi_buat(){
		$email = $this->input->post('email');
		$pswd = $this->input->post('pswd');
		$repswd = $this->input->post('repswd');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('pswd', 'pswd', 'required');
		$this->form_validation->set_rules('repswd', 'repswd', 'required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('email', $email);
			redirect(base_url()."akun?error=blank");
		}
		if (strlen($pswd)<5) {
			$this->session->set_flashdata('email', $email);
			redirect(base_url()."akun?error=lengthpass");
		}
		if ($pswd!=$repswd) {
			$this->session->set_flashdata('email', $email);
			redirect(base_url()."akun?error=pass");
		}

		$this->load->model('Membership_model');
		if ($this->Membership_model->cek_email($email)==false) {
			$this->session->set_flashdata('email', $email);
			redirect(base_url()."akun?error=email");
		} else {
			$this->Membership_model->create_member($email, $pswd);
			redirect(base_url()."akun?s=login");
		}
	}

	private function validasi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username=='' || $password=='') {
			redirect(base_url()."akun?s=login&errorl=blank");	
		}
		$this->load->model('Membership_model');
		$login = false;
		$login = $this->Membership_model->validate($username, $password);
		if($login==false){
			redirect(base_url()."akun?s=login&errorl=invalid");	
		} else {
			$id = $this->Membership_model->getidakun($username);
			$data=array('LOGIN'=>TRUE,'USERNAME'=>$username,'ID_AKUN'=>$id);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}		

	// public function tes(){
	// 	echo teshelper();
	// }
}