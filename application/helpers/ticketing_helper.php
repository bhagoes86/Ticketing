<?php 
	if (!function_exists('isLoggedIn')) {
		function isLoggedIn(){
			$ci=& get_instance();
			if ($ci->session->userdata('LOGIN')==TRUE) {
				return true;
			} else {
				redirect(base_url("akun?s=login&act=notallow&errorl=not"), 'refresh'); //redirect to login page
			}			
		}
	}

	if (!function_exists('isSesiLoggedIn')) {
		function isSesiLoggedIn(){
			$ci=& get_instance();
			if ($ci->session->userdata('LOGIN')==TRUE) {
				return true;
			} else {
				return false;				
			}			
		}
	}

	if (!function_exists('signOut')) {
		function signOut(){
			$ci=& get_instance();
			$ci->session->sess_destroy();
		}
	}

	if (!function_exists('convertIntToHarga')) {
		function convertIntToHarga($harga){
			$ribu = floor($harga/1000);
			$ratus = $harga%1000;
			return $ribu.".".$ratus;
		}
	}

