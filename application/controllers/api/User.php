<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Model_user');
    }

    //header
    //X-API-KEY 123456
    //http://localhost/blog/api/user/user?id=1
    public function user_get() {
        //get from url
        $id = $this->get('id');
        if ($id) {
            //get user by id to database 
            $user = $this->Model_user->get_by(array('id' => $id));
            if (isset($user['id'])) {
                //get data 
                $this->response(array('status' => 'success', 'data' => $user));
            } else {
                $this->response(array('status' => 'failure', 'message' => 'No users were found'), REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            //get all user to database 
            $user = $this->Model_user->get_all();
            if (isset($user)) {
                //get data 
                $this->response(array('status' => 'success', 'data' => $user));
            } else {
                $this->response(array('status' => 'failure', 'message' => 'No users were found'), REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    //insert data
    public function user_post() {
        //get post data array
        $data = $this->post();
        //check if email is exist
        $isEmail = $this->Model_user->get_by(array('email' => $data['email']));
        if (!$isEmail) {
            //insert to database and get new ID
            $id = $this->Model_user->insert($data);
            if ($id) {
                $this->response(array('status' => 'success', 'message' => 'created'));
            } else {
                $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $this->response(array('status' => 'failure', 'message' => 'email already exist'), REST_Controller::HTTP_CONFLICT);
        }
    }

    //update data
    public function user_put() {
        //declare model
        //get put data array
        $data = $this->put();
        //get id
        $id = $data['id'];
        //check if want to update email
        if (isset($data['email'])) {
            //check if email is exist
            $isEmail = $this->Model_user->get_by(array('email' => $data['email']));
            if (!$isEmail) {
                //call update function
                $this->update($id, $data);
            } else {
                $this->response(array('status' => 'failure', 'message' => 'email already exist'), REST_Controller::HTTP_CONFLICT);
            }
        } else {
            //call update function
            $this->update($id, $data);
        }
    }

    public function user_delete($id) {
//        delete return true or false
        $isDelete = $this->Model_user->delete($id);
        if ($isDelete) {
            $this->response(array('status' => 'success', 'message' => 'deleted'));
        } else {
            $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function update($id, $data) {
        //update to database return true or false
        $isUpdate = $this->Model_user->update($id, $data);
        if ($isUpdate) {
            $this->response(array('status' => 'success', 'message' => 'updated'));
        } else {
            $this->response(array('status' => 'failure', 'message' => 'error'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
