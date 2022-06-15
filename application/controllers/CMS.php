<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CMS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->curd = $this->load->model('Curd_model');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
        $this->user_type = $this->session->logged_in['user_type'];
    }

   

    public function seoPageSetting() {
        $data = array();
        $data['title'] = "Set The Page wise SEO Attributes";
        $data['description'] = "SEO";
        $data['form_title'] = "SEO";
        $data['table_name'] = 'seo_settings';
        $form_attr = array(
            "seo_title" => array("title" => "Title", "required" => true, "place_holder" => "Title", "type" => "text", "default" => ""),
            "seo_description" => array("title" => "Description", "required" => true, "place_holder" => "Description", "type" => "textarea", "default" => ""),
            "seo_keywords" => array("title" => "Keywords", "required" => true, "place_holder" => "Keywords", "type" => "textarea", "default" => ""),
            "seo_url" => array("title" => "Page URL", "required" => false, "place_holder" => "Link", "type" => "text", "default" => ""),
        );

        if (isset($_POST['submitData'])) {
            $postarray = array();
            foreach ($form_attr as $key => $value) {
                $postarray[$key] = $this->input->post($key);
            }
            $this->Curd_model->insert('seo_settings', $postarray);
            redirect("CMS/seoPageSetting");
        }


        $categories_data = $this->Curd_model->get('seo_settings');
        $data['list_data'] = $categories_data;

        $fields = array(
            "id" => array("title" => "ID#", "width" => "100px"),
            "seo_title" => array("title" => "Title", "width" => "200px"),
            "seo_description" => array("title" => "Description", "width" => "200px"),
            "seo_keywords" => array("title" => "Keywords", "width" => "200px"),
            "seo_url" => array("title" => "URL", "width" => "200px"),
        );

        $data['fields'] = $fields;
        $data['form_attr'] = $form_attr;
        $this->load->view('layout/curd', $data);
    }

    public function siteSEOConfigUpdate() {
        $data = array();
        $blog_data = $this->Curd_model->get_single('configuration_site', 1);
        $data['site_data'] = $blog_data;
        if (isset($_POST['update_data'])) {
            $blogArray = array(
                 "site_name" => $this->input->post("site_name"),
                "seo_keywords" => $this->input->post("keyword"),
                "seo_title" => $this->input->post("title"),
                "seo_desc" => $this->input->post("description"),
            );

            $this->db->where('id', 1);
            $this->db->update('configuration_site', $blogArray);
            redirect("CMS/siteConfigUpdate");
        }

        $this->load->view('configuration/site_update', $data);
    }

}

?>
