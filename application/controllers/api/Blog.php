<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Blog extends REST_Controller {

    function __construct() {
        parent::__construct();
		$this->load->helper('upload_file');

        //declare model
        $this->load->model('Model_blog');
    }

    public function blog_get() {
        //get from url
        $id = $this->get('id');
        if ($id) {
            //get user by id to database 
            $user = $this->Model_blog->get_by(array('id' => $id));
            if (isset($user['id'])) {
                //get data 
                $this->response(array('status' => 'success', 'data' => $user));
            } else {
                $this->response(array('status' => 'failure', 'message' => 'No data were found'), REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            //get all user to database 
            $user = $this->Model_blog->get_all();
            if (isset($user)) {
                //get data 
                $this->response(array('status' => 'success', 'data' => $user));
            } else {
                $this->response(array('status' => 'failure', 'message' => 'No data were found'), REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //insert data
    public function blog_post() {
        //get post data array
        $data = $this->post();

        $message = "";
        if ($_FILES['image']['name']) {
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

        //insert to database and get new ID
        $insert = $this->Model_blog->insert($data);
        if ($insert) {
            $this->response(array('status' => 'success', 'message' => 'created'));
        } else {
            $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //update data
    public function blog_put() {
        //get put data array
        $data = $this->put();
        //get id
        $id = $data['id'];

        // $message = "";
        // if($_FILES['image']['name']) {
        //     foreach($_FILES as $key => $file) {
        //         if($file['name']) {
        //             $upload = upload_file($file, 'blog');
        //             if($upload == $file['name']) {
        //                 $image  = [$key => $upload];
        //                 $data = array_merge($data, $image);
        //             } else {
        //                 $message = $upload;
        //             }
        //         }
        //     }
        // } 

        $isUpdate = $this->Model_blog->update($id, $data);
        if ($isUpdate) {
            $this->response(array('status' => 'success', 'message' => 'updated'));
        } else {
            $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function blog_delete($id) {
//        delete return true or false
        $isDelete = $this->Model_blog->delete($id);
        if ($isDelete) {
            $this->response(array('status' => 'success', 'message' => 'deleted'));
        } else {
            $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
