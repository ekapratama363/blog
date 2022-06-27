<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {
     function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('api_helper');
        $this->load->helper('form');
        $this->load->library('session');
		$this->load->helper('upload_file');
        //declare model
        $this->load->model('Model_blog');
        
		// if($this->session->userdata('is_login') != "true"){
		// 	redirect(base_url("admin/auth"));
        // }
    }

    public function index() {
        $data['filePage'] = 'admin/blogs/index';

		$fetch = api_blog('GET', "blog/blog");
        $data['blogs'] = json_decode($fetch);

        $this->load->view('admin/layouts', $data);
    }

    public function create() {
        $data['filePage'] = 'admin/blogs/create';

        $this->load->view('admin/layouts', $data);
    }

    public function store() {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ];

        $message = "";
        if($_FILES['image']['name']) {
            foreach($_FILES as $key => $file) {
                if($file['name']) {
                    $upload = upload_file($file, 'blog');
                    if($upload == $file['name']) {
                        $image  = [$key => $upload];
                        $data = array_merge($data, $image);
                    } else {
                        $message = $upload;
                    }
                }
            }
        } 
        
        $save = $this->Model_blog->insert($data);
        
        if($message) {
            $this->session->set_flashdata('failed', $message);
        } else {
            $this->session->set_flashdata('success', 'save data successfully');
        }

        redirect(base_url("admin/blog/create"));
    }

    public function edit($id) {
        $data['filePage'] = 'admin/blogs/edit';

		$fetch = api_blog('GET', "blog/blog?id=$id");

        $data['blog'] = json_decode($fetch);

        $this->load->view('admin/layouts', $data);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ];

        $message = "";
        if($_FILES['image']['name']) {
            foreach($_FILES as $key => $file) {
                if($file['name']) {
                    $upload = upload_file($file, 'blog');
                    if($upload == $file['name']) {
                        $image  = [$key => $upload];
                        $data = array_merge($data, $image);
                    } else {
                        $message = $upload;
                    }
                }
            }
        } 
        
        $update = $this->Model_blog->update($id, $data);

        if($message) {
            $this->session->set_flashdata('failed', $message);
        } else {
            $this->session->set_flashdata('success', 'save data successfully');
        }

        redirect(base_url("admin/blog/index"));
    }

    public function delete($id) {

        $message = 'Success delete data';

		$fetch = api_blog('DELETE', "blog/blog/$id");

        redirect(base_url("admin/blog/index"));

    }
}
