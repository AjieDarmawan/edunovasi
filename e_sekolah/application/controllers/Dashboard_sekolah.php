<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_sekolah extends CI_Controller
{


	public function index()
	{
		$this->load->view('dashboard_sekolah/landing');
	}

	public function list_sekolah()
	{
		$this->load->view('dashboard_sekolah/list_sekolah');
	}

	function dashboard_admin()
	{
		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess['userdata']);
		// die;
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			$data['sesi'] = $sess['userdata'];

			$this->load->view('dashboard_sekolah/admin/admin_ranking');
		} else {
			redirect('login');
		}
	}

	function login()
	{
		error_reporting(0);
		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess['userdata']);
		// die;
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			// $data['sesi'] = $sess['userdata'];
			// $this->load->view('dashboard_sekolah/dashboard/dashboard_admin',$data);
			redirect('dashboard_admin');
		} else {
			$this->load->view('auth/login');
		}
	}

	function auth_login()
	{
		$user = $this->auth_model->login(
			$this->input->post('username'),
			$this->input->post('password')
		);

		if ($user) {
			$session = $this->auth_model->select_by_id($user['id_users']);
			if ($session) {
				$this->session->set_userdata(array('pegawai' => $session));
				//echo "berhasil";
				redirect('master/event');
			} else {
				echo "gagal";
				die;
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}


	function logout()
	{
		$this->session->sess_destroy();
		redirect('login', false);
		//$this->load->view('auth/logout');
	}


	// ADMIN

	function admin_history()
	{

		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess['userdata']);
		// die;
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			$data['sesi'] = $sess['userdata'];
			$this->load->view('dashboard_sekolah/admin/admin_history');
		} else {
			redirect('login');
		}
	}

	function admin_ranking()
	{

		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess['userdata']);
		// die;
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			$data['sesi'] = $sess['userdata'];
			$this->load->view('dashboard_sekolah/admin/admin_ranking');
		} else {
			redirect('login');
		}
	}


	function sekolah_detail($id_peserta, $email)
	{


		$data2['id_peserta'] = base64_decode($id_peserta);
		$data2['email'] = base64_decode($email);

		$sess = $this->session->userdata();
		// echo "<pre>";
		// print_r($sess['userdata']);
		// die;
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			$data['sesi'] = $sess['userdata'];
			$this->load->view('dashboard_sekolah/admin/sekolah_detail', $data2);
		} else {
			redirect('login');
		}
	}


	function event_sekolah()
	{

		$sess = $this->session->userdata();
		if ($sess['userdata']['status'] == 200) {
			//redirect('auth');
			$data['sesi'] = $sess['userdata'];
			$this->load->view('dashboard_sekolah/admin/event_sekolah');
		} else {
			redirect('login');
		}
	}
}
