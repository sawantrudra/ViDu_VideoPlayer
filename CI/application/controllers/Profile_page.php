<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_db');
    }

    /**
     * Show user Profile page
     * Option to Login or Sign Up
     */
    public function index()
    {
        //weclome message and design
        //login form
        
        $this->load->view('templates/header');
        $user_data = $this->get_details();
        $this->load->view('user_details', $user_data);
        //$this->show_carousals($user_data['user_name']);
        //$this->update_profile();
        $this->show_wishlist_videos($user_data['user_name']);
        $this->show_uploaded_videos($user_data['user_name']);
        // $this->update_profile();
        
        $this->load->view('templates/footer');
    }
    public function get_details()
    {
        $user_name = $this->session->userdata('username');
        $this->load->model('profile_db');
        $user_data = $this->profile_db->get_user_details($user_name);
        return $user_data;
    }
    public function show_carousals($user_name)
    {
        $this->load->model('profile_db');
        $user_data = $this->profile_db->get_user_details($user_name);
        $user_id = $user_data['user_id'];
        $videos_data = $this->profile_db->get_uploaded_videos($user_id);
        $data['videos_data'] = $videos_data;
        $this->load->view('profile_carousals', $data);
    }
    public function show_uploaded_videos($user_name)
    {
        $this->load->model('profile_db');
        $user_data = $this->profile_db->get_user_details($user_name);
        $user_id = $user_data['user_id'];
        $videos_data = $this->profile_db->get_uploaded_videos($user_id);
        $data['videos_data'] = $videos_data;
        $this->load->view('user_videos', $data);
    }
    public function show_wishlist_videos($user_name)
    {
        $this->load->model('profile_db');
        $user_data = $this->profile_db->get_user_details($user_name);
        $user_id = $user_data['user_id'];
        $videos_data = $this->profile_db->get_wishlist_videos($user_id);
        $data['videos_data'] = $videos_data;
        $this->load->view('user_wishlist', $data);
    }
    
    public function update_profile()
    {

        if ($this->input->post('submit')) {

            $firstname = $this->input->post('firstname');
            $lasttname = $this->input->post('lastname');
            if (isset($_FILES['profile_image']['name'])) {
                $upload_path = "./uploads/profile_images/";
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';
                $config['max_filename'] = '255';
                $config['encrypt_name'] = FALSE;
                $name = $_FILES['profile_image']['name'];
                $position = strpos($name, ".");
                $file_extension = substr($name, $position + 1);
                $file_extension = strtolower($file_extension);
                $user_details = $this->profile_db->get_user_details($this->session->userdata('username'));
                $config['file_name'] =  $user_details['user_id'] . '.' . $file_extension;
                $image_data = array();
                $is_file_error = FALSE;
                if (!$_FILES) {
                    $is_file_error = TRUE;
                    echo 'Select a image file.';
                }
                if (!$is_file_error) {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('profile_image')) {
                        echo $this->upload->display_errors();
                        $is_file_error = TRUE;
                    } else {
                        $image_data = $this->upload->data();
                        $this->resizeImage($image_data['file_name']);
                    }
                }
                if ($is_file_error) {
                    if ($image_data) {
                        $file = $upload_path . $image_data['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    }
                } else {
                    $data['image_name'] = $config['file_name'];
                    $data['image_path'] = 'uploads/profile_images/';
                    $data['image_type'] = $image_data['file_type'];
                    echo 'Video was successfully uploaded to directory: <strong>' . $upload_path . '</strong>.';
                }
            }
            $this->profile_db->update_profile($user_details['user_id'], $firstname, $lasttname, $config['file_name'], $file_extension);
        }
        // $data['errors'] = $this->error;
        // $data['success'] = $this->success;
        //load the view along with data
        redirect('profile_page/');
    }

    public function resizeImage($filename)
    {
        $source_path = './uploads/profile_images/' . $filename;
        $target_path = './uploads/profile_images/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => FALSE,
            'create_thumb' => FALSE,
            'width' => 300,
            'height' => 300
        );
        $this->load->library('image_lib');
        $this->image_lib->initialize($config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }
}
