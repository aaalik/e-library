<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operator extends CI_Controller {

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
		if($this->session->userdata("level") == "1" || $this->session->userdata("level") == "0")
		{
			$this->load->model('m_operator');
			$data['operator'] = $this->m_operator->view_data()->result();
			$view['title'] = "E-Library | Operator";
	    	$view['menu'] = "operator";
	    	$view['isi'] = $this->load->view('v_operator',$data, TRUE);
			$this->load->view('v_main', $view);
		}
		else
		{
			redirect(base_url()."main/login");
		}
	}

	public function verify()
	{
		if($this->session->userdata("level") == "1" || $this->session->userdata("level") == "0")
		{
			$this->load->model('m_operator');
			//$idd = $data['query']->row()->no;
			$id = $this->input->get("id", true);
			$data = array(
		        'status' => '1'
			);
	        $this->m_operator->update_data($data, 'tb_user', $id);
	        redirect(base_url()."operator");
	    }
	    else
		{
			redirect(base_url()."main/login");
		}
	}

	public function delete()
	{
		if($this->session->userdata("level") == "1" || $this->session->userdata("level") == "0")
		{
			$this->load->model('m_operator');
			//$idd = $data['query']->row()->no;
			$id = $this->input->get("id", true);
	        $this->m_operator->delete_data('tb_user', $id);
	        redirect(base_url()."operator");
	    }
	    else
		{
			redirect(base_url()."main/login");
		}
	}
}