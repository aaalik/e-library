<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata("loggedin")=="true")
		{
			$view['title'] = "E-Library | Home";
	    	$view['menu'] = "home";
	    	$view['isi'] = $this->load->view('v_home', '', TRUE);
			$this->load->view('v_main', $view);
		}
		else
		{
			redirect(base_url()."main/login");
		}
	}

	public function register()
	{
		if($this->session->userdata("loggedin")=="true")
		{
			redirect(base_url());
		}
		else
		{
			$view['title'] = "E-Library | Register";
	    	$view['menu'] = "home";
	    	$view['isi'] = $this->load->view('v_register', '', TRUE);
			$this->load->view('v_main', $view);
		}
	}

	public function login()
	{
		if($this->session->userdata("loggedin")=="true")
		{
			echo "dah";
			redirect(base_url());
		}
		else
		{
			$view['title'] = "E-Library | Login";
    		$view['menu'] = "home";
			$data2['email'] = $this->input->post("email",true);
			$data2['pass'] = $this->input->post("pass",true);
			$data2['gagal']="";

			$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => '%s wajib diisi.',
	                ),
	        ),
	        array(
	                'field' => 'pass',
	                'label' => 'Password',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => '%s wajib diisi.',
	                ),
	        	)
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
				$this->load->model('m_main');
				$cek_user = $this->m_main->login($data2['email'], $data2['pass']);
				if($cek_user->num_rows()>0)
				{
					$this->session->set_userdata("loggedin", "true");
					$this->session->set_userdata("level", $cek_user->row()->level);
					$this->session->set_userdata("name", $cek_user->row()->name);
					$this->session->set_userdata("id", $cek_user->row()->id);
					echo "berhasil";
					redirect(base_url());
				}
				else
				{
					$data2['gagal']="Email atau password tidak ditemukan";
				}
			}

			$view['isi'] = $this->load->view('v_login', $data2, TRUE);
			$this->load->view('v_main', $view);
		}
		//$this->load->view('v_login');
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url()."main/login");
	}
}
