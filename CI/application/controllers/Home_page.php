<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    
   public function __construct()
   {
      parent::__construct();
      $this->load->model('profile_db');
    }
    /**
     * Show First page of the website 
     * Option to Login or Sign Up
     */
    public function index()
    {
        //weclome message and design
        //login form
        $this->load->view('templates/header');
        //$this->load->view('home');
        // $this->load->view('video_player');
        $user_name = $this->session->userdata('username');
        
        $this->show_all_videos($user_name);
        $this->show_uploaded_videos($user_name);
        $this->load->view('templates/footer');
        //    $this->load->model('email_model');
        //    $this->email_model->send_verification_email('khatavkar.mugdha1@gmail.com','argrgvrvrfvr');
    }

    public function upload_video()
    {
        //upload a video
        redirect('Video_upload');
    }
    // public function open_video_player($video_data){

    //     $this->load->view('video_player',$data);
    // }
    public function show_uploaded_videos($user_name)
    {
        $this->load->model('profile_db');
        $user_data = $this->profile_db->get_user_details($user_name);
        $user_id = $user_data['user_id'];
        $videos_data = $this->profile_db->get_uploaded_videos($user_id);
        $data['videos_data'] = $videos_data;
        $this->load->view('user_videos', $data);
    }

    public function show_all_videos()
    {
        $this->load->model('profile_db');
        $videos_data = $this->profile_db->get_all_videos();
        $data['videos_data'] = $videos_data;
        $this->load->view('all_videos', $data);
    }

    public function livesearch()
    {

        $this->load->model('profile_db');
        $videos_data = $this->profile_db->get_all_videos();
        $q = $_GET["q"];
        if (strlen($q) > 0) {
            $hint = "";
            foreach ($videos_data as $video_data) {
                if (strpos($video_data['title'], $q) !== false) {
                    if ($hint == "") {
                        $hint = "<a class='dropdown-item' href='" . base_url() . "video_player/" . $video_data['id'] .
                            "' target='_self'>" .
                            $video_data['title'] . "</a>";
                    } else {
                        $hint = $hint . "<br /><a class='dropdown-item' href='" .
                            base_url() . "video_player/" . $video_data['id'] .
                            "' target='_self'>" .
                            $video_data['title'] . "</a>";
                    }
                }
            }
            if($hint == ""){
                foreach ($videos_data as $video_data) {
                    if (strpos($video_data['description'], $q) !== false) {
                        if ($hint == "") {
                            $hint = "<a class='dropdown-item' href='" .
                                base_url() . "video_player/" . $video_data['id'] .
                                "' target='_self'>" .
                                $video_data['title'] . "</a>";
                        } else {
                            $hint = $hint . "<br /><a class='dropdown-item' href='" .
                                base_url() . "video_player/" . $video_data['id'] .
                                "' target='_self'>" .
                                $video_data['title'] . "</a>";
                        }
                    }
                }
            }
            
        }

        // $data['videos_data'] = $videos_data;


        // Set output to "no suggestion" if no hint was found
        // or to the correct values
        if ($hint == "") {
            $response = "no suggestion";
        } else {
            $response = $hint;
        }

        //output the response
        echo $response;
    }
}
