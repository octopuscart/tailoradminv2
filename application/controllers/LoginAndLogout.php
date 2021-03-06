<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAndLogout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

   

    function index($msg = '') {
        $data1['msg'] =$msg;
        $postdata = $this->input->post();
       $data = [];
        if (isset($_POST['signIn'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->select('au.id,au.first_name,au.last_name,au.email,au.password,au.user_type, au.image');
            $this->db->from('admin_users au');
      
            $this->db->where('email', $username);
            $this->db->where('password', md5($password));
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
//                redirect('Order/orderAnalysisVendor');
                foreach ($query->result_array() as $row) {
                    $data[] = $row;
                }
            } 
            else 
                {
                $data1['msg'] = 'this';
              //  redirect('LoginAndLogout/login_admin/');
            }
            $usr = $data[0]['email'];
            $pwd = $data[0]['password'];
          
            if($data[0]['user_type']==''){
                redirect('LoginAndLogout/index/');
            }
            
            if ($username == $usr && md5($password) == $pwd) {
                $sess_data = array(
                    'username' => $username,
                    'password' => $password,
                    'first_name' => $data[0]['first_name'],
                    'last_name' => $data[0]['last_name'],
                    'login_id' => $data[0]['id'],
                    'user_type' => $data[0]['user_type'],
                    'image' => $data[0]['image'],
                );
                $this->session->set_userdata('logged_in', $sess_data);

                redirect('Order/orderAnalysis');
            }
        }
        $this->load->view('login',$data1);
    }

    // Logout from admin page
    function logout() {
        $newdata = array(
            'username' => '',
            'password' => '',
            'logged_in' => FALSE,
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();

        redirect('LoginAndLogout', 'refresh');
    }

}
