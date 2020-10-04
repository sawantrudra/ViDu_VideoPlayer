<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of VideoUpload
 
 */
class Video_upload extends CI_Controller
{

    //variable for storing error message
    private $error;
    //variable for storing success message
    private $success;

    function __construct()
    {
        parent::__construct();
        //load this to validate the inputs in upload form
        $this->load->library('form_validation');
    }

    //appends all error messages
    private function handle_error($err)
    {
        $this->error .= $err . "\r\n";
    }

    //appends all success messages
    private function handle_success($succ)
    {
        $this->success .= $succ . "\r\n";
    }

    public function index()
    {

        $this->load->view('templates/header');
        if ($this->input->post('upload_video')) {
            //set preferences
            //file upload destination
            $upload_path = "./uploads/uploaded_videos/";
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'wmv|mp4|avi|mov|mpeg';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = FALSE;
            //change file name
            $this->load->model('video_db');
            $name = $_FILES['video_name']['name'];
            $position = strpos($name, ".");
            $file_extension = substr($name, $position + 1);
            $file_extension = strtolower($file_extension);
            $new_file = $this->video_db->get_new_filename();
            $config['file_name'] =  $new_file . '.' . $file_extension;
            //store video info once uploaded
            $video_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload
            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select a video file.');
            }
            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'video_name' is the name of the input
                if (!$this->upload->do_upload('video_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } else {
                    //store the video file info
                    $video_data = $this->upload->data();
                    //echo $video_data;
                    $config['upload_path']   = "./uploads/uploaded_thumbnails/";
                    $name = $_FILES['thumbnail']['name'];
                    $position = strpos($name, ".");
                    $file_ext = substr($name, $position + 1);
                    $file_ext = strtolower($file_ext);
                    $config['file_name'] = $new_file . '.' . $file_ext;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']      = 102400;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('thumbnail')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload', $error);
                        echo "failed!!!" . $_FILES['thumbnail']['name'].$error['error'];
                    } else {
                        $uploadedImage = $this->upload->data();
                        $this->resizeImage($uploadedImage['file_name']);
                       // return $uploadedImage['file_name'];
                    }
                    // echo $thumbnail.'heheheheh';
                    $this->load->model('video_db');
                    $this->video_db->store_details(
                        $this->session->userdata('username'),
                        $this->input->post('video_title'),
                        $this->input->post('video_description'),
                        $new_file.'.'.$file_extension,
                        $file_extension,
                        $uploadedImage['file_name']
                    );
                }
            }
            // There were errors, we have to delete the uploaded video
            if ($is_file_error) {
                if ($video_data) {
                    $file = $upload_path . $video_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
                $data['errors'] = $this->error;
            } else {
                $data['video_name'] = $video_data['file_name'];
                $data['video_path'] = 'uploads/uploaded_videos/';
                $data['video_type'] = $video_data['file_type'];
                $this->handle_success('Video was successfully uploaded to directory: <strong>' . $upload_path . '</strong>.');
                
                $data['success'] = $this->success;
            }
            
           // $this->load->view("templates/header");
        $this->load->view("uploaded_video",$data);
        $this->load->view("templates/footer");
        //redirect("profile_page/");
        }
        else{
            $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        
        $this->load->view('upload', $data);
        $this->load->view('templates/footer');
        }
        //load the error and success messages
        
    }

    public function resizeImage($filename)
    {
        $source_path = './uploads/uploaded_thumbnails/' . $filename;
        $target_path = './uploads/thumbnails/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => FALSE,
            'create_thumb' => FALSE,
            'width' => 150,
            'height' => 150
        );
        $this->load->library('image_lib');
        $this->image_lib->initialize($config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }
}
