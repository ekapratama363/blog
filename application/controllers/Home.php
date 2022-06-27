<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
     function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('api_helper');
    }

    public function index() {
        $data['filePage'] = 'pages/home';

		$fetch = api_blog('GET', "blog/blog");
		$blogs = json_decode($fetch);

        if (count($blogs->data) > 0) {
            foreach($blogs->data as $key => $blog) {
                if ($key % 4 == 0) {
                    $blogs->data[$key]->header = $key;
                }
            }
        }

        $data['blogs'] = $blogs;

        $this->load->view('layouts', $data);
    }

    public function page($id) { 
        $data['filePage'] = 'pages/home_detail';
        
		$fetch = api_blog('GET', "blog/blog?id={$id}");
		$blog  = json_decode($fetch);
        $data['blog'] = $blog;

        $this->load->view('layouts', $data);
    }
}
