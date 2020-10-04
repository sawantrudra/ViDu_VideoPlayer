<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_db extends CI_Model
{
    //get user detils
    public function get_user_details($user_name)
    {
        $query = $this->db->get_where('login', array('user_name' => strtolower($user_name)));
        $row = $query->row(0);
        $data['user_email'] = $row->user_email;
        $data['user_id'] = $row->id;
        $data['user_name'] = $user_name;
        $data['first_name'] =$row->first_name;
        $data['last_name'] =$row->last_name;
        $data['profile_file_name'] = $row->profile_file_name;
        $data['google_picture'] = $row->google_picture;
        return $data;
    }
    //get the video names of the videos uploaded by user
    public function get_uploaded_videos($user_id)
    {
        //upload a video
        $this->db->select('video_id');
        $query = $this->db->get_where('user_videos', array('user_id' => $user_id));
        $videos_data = [];
        foreach($query->result_array() as $row){
            $this->db->select('id, title, description, extension,thumbnail');
            $query2 = $this->db->get_where('video_details', array('id' => $row['video_id']));
            $row2 = $query2->row(0);
            $filename = $row2->id.'.'.$row2->extension;
            $video['id'] = $row2->id;
            $video['title'] = $row2->title;
            $video['description'] = $row2->description;
            $video['extension'] = $row2->extension;
            $video['filename'] = $filename;
            $video['thumbnail'] = $row2->thumbnail;
            array_push($videos_data, $video); 
        }
        return $videos_data;
    }

    public function get_wishlist_videos($user_id)
    {
        //upload a video
        $this->db->select('video_id');
        $query = $this->db->get_where('wishlist', array('user_id' => $user_id));
        $videos_data = [];
        foreach($query->result_array() as $row){
            $this->db->select('id, title, description, extension,thumbnail');
            $query2 = $this->db->get_where('video_details', array('id' => $row['video_id']));
            $row2 = $query2->row(0);
            $filename = $row2->id.'.'.$row2->extension;
            $video['id'] = $row2->id;
            $video['title'] = $row2->title;
            $video['description'] = $row2->description;
            $video['extension'] = $row2->extension;
            $video['filename'] = $filename;
            $video['thumbnail'] = $row2->thumbnail;
            array_push($videos_data, $video); 
        }
        return $videos_data;
    }

    public function get_all_videos()
    {
        //upload a video
        $this->db->select('video_id');
        $query = $this->db->get('user_videos');
        $videos_data = [];
        foreach($query->result_array() as $row){
            $this->db->select('id, title, description, extension,thumbnail');
            $query2 = $this->db->get_where('video_details', array('id' => $row['video_id']));
            $row2 = $query2->row(0);
            $filename = $row2->id.'.'.$row2->extension;
            $video['id'] = $row2->id;
            $video['title'] = $row2->title;
            $video['description'] = $row2->description;
            $video['extension'] = $row2->extension;
            $video['filename'] = $filename;
            $video['thumbnail'] = $row2->thumbnail;
            array_push($videos_data, $video); 
        }
        return $videos_data;
    }

    public function update_profile($user_id,$first_name, $last_name, $filename, $extension)
	{
		$data = array(
            'id' => $user_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'profile_file_name' => $filename,
            'profile_file_extension' => $extension
        );
        $this->db->where('id', $user_id);
		$this->db->update('login',$data);

    }
}