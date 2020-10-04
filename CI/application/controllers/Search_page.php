<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load this to validate the inputs in upload form
       // $this->load->model('video_db');
        $this->load->model('profile_db');
    }
    public function index()
    {
    }

    public function item_search()
    {
        $this->load->view('templates/header');
        $str = $this->input->post('input_string');
        $this->load->model('video_db');
        $data['videos_data'] = $this->video_db->search_videos($str);
        $this->load->view('item_search',$data);
        $this->load->view('templates/footer');
    }

}