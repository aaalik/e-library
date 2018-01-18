<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class book extends CI_Controller {

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

	function __construct(){
        parent::__construct();      
        $this->load->model('m_book');
    }
	public function index()
	{
		$data['book'] = $this->m_book->show_book()->result();
		$view['title'] = "E-Library | Book";
	   	$view['menu'] = "book";
	   	$view['isi'] = $this->load->view('v_book',$data, TRUE);
		$this->load->view('v_main', $view);
	}

	public function detail(){
		$id = $this->input->get("id", true);
		$data['query'] = $this->m_book->detail_book($id);
		$data['book_id'] = $data['query']->row()->book_id; //mengambil hasil dari query dengan row cd_user
		$data['title_book'] = $data['query']->row()->title;
		$data['author'] = $data['query']->row()->author;
		$data['year'] = $data['query']->row()->year;
		$data['description'] = $data['query']->row()->description;
		$data['img_name'] = $data['query']->row()->img_name;

		// variable main
		$view['title'] = "E-Library | Book";
	   	$view['menu'] = "book";
	   	$view['isi'] = $this->load->view('v_bookdetail',$data, TRUE);
		$this->load->view('v_main', $view);
	}
}
