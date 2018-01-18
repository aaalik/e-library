<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class book extends CI_Controller {
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

    public function detail()
    {
        $id = $this->input->get("id", true);
        echo $id;
		$data['query'] = $this->m_book->detail_book($id);
		$data['book_id'] = $data['query']->row()->book_id;
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
    
    public function edit_book()
    {
        if($this->session->userdata("loggedin")=="true")
		{
			$view['title'] = "E-Library | Edit Book";
	    	$view['menu'] = "book";

            $id = $this->input->get("id", true);
            $data['query'] = $this->m_book->detail_book($id);

            $data['title'] = $this->input->post('title');
            $data['author'] = $this->input->post('author');
			$data['year'] = $this->input->post('year');
            $data['description'] = $this->input->post('description');

            if(!isset($_POST['submit']))
            {
				$data['title'] = $data['query']->row()->title;
				$data['author'] = $data['query']->row()->author;
				$data['year'] = $data['query']->row()->year;
				$data['description'] = $data['query']->row()->description;
			}
            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s must be filled.',
                    )
                ),
                array(
                    'field' => 'author',
                    'label' => 'Author',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s must be filled.',
                    )
                ),
                array(
                    'field' => 'year',
                    'label' => 'Year',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s must be filled.',
                    )
                ),
                array(
                    'field' => 'description',
                    'label' => 'Description',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '%s must be filled.',
                    )
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == TRUE)
            {
                $idd = $data['query']->row()->book_id;
                $data = array(
                    'title' => $data['title'],
                    'author' => $data['author'],
                    'year' => $data['year'],
                    'description' => $data['description']
                );
                $this->m_book->edit_book($data, 'tb_book', $idd);
                //$this->session->set_flashdata('msg','<strong>Berhasil! </strong>Data berhasil diupdate.');
                redirect(base_url()."book");
            }

	    	$view['isi'] = $this->load->view('v_bookedit', $data, TRUE);
			$this->load->view('v_main', $view);
		}
		else
		{
			redirect(base_url()."main/login");
		}
    }

	public function add_book()
	{
		$view['title'] = "E-Library | Add Book";
	    $view['menu'] = "book";

        
	    $title = $this->input->post('title');
	    $author = $this->input->post('author');
	    $year = $this->input->post('year');
        $description = $this->input->post('description');
	    $img_dname = $this->input->post('birthday');
	    $data = array(
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'description' => $description
        );
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s must be filled.',
                )
            ),
            array(
                'field' => 'author',
                'label' => 'Author',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s must be filled.',
                )
            ),
            array(
                'field' => 'year',
                'label' => 'Year',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s must be filled.',
                )
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s must be filled.',
                )
            )
        );    
     
        if($this->input->post('submit')){
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == TRUE)
            {
                $config1['upload_path'] = './asset/uploads/';
                $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                $config1['encrypt_name'] = true;
                $this->load->library('upload', $config1);
                
                
                if($this->upload->do_upload('img_name'))
                {
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    $data = array(
                        'title' => $data['title'],
                        'author' => $data['author'],
                        'year' => $data['year'],
                        'description' => $data['description'],
                        'img_name' => $uploadedFile
                    );
                    $this->m_book->add_book($data, 'tb_book');
                    redirect(base_url('book'));            
                }
            }
        }

        $view['isi'] = $this->load->view('v_bookadd', $data, TRUE);
		$this->load->view('v_main', $view);
    }
}
