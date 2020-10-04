<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video_db extends CI_Model
{
	// Upload the details of the video uploaded
	public function store_details($user_name, $title, $description, $filename, $extension,$thumbnail)
	{
		$data = array(
            'title' => $title,
            'description' => $description,
            'filename' => $filename,
            'extension' => $extension,
            'thumbnail' => $thumbnail
		);
        $success = $this->db->insert('video_details', $data);
        if($success){
            $this->db->select('id');
            $query = $this->db->get_where('video_details', array('filename' => $filename));
            $row = $query->row(0);
            $video_id = $row->id;
            return $this->assign_user($user_name, $video_id);
        }
        return $success;
    }

    public function assign_user($user_name , $video_id )
	{
        $this->db->select('id');
        $query = $this->db->get_where('login', array('user_name' => $user_name));
        $row = $query->row(0);
        $user_id = $row->id;
        if($user_id){
            $data = array(
                'user_id' => $user_id,
                'video_id' => $video_id
            );
            return $this->db->insert('user_videos', $data);
        }
		return $user_id;
    }

    public function get_new_filename()
	{
        $query = $this->db->get('video_details');
        $row = $query->last_row();
        return  $row->id + 1;
    }

    public function search_videos($str){
        $query = $this->db->query('select * from video_details where title like "%'.$str.'%"');
        $videos_data = [];
        foreach($query->result_array() as $row){
           
            $filename = $row['id'].'.'.$row['extension'];
            $video['id'] = $row['id'];
            $video['title'] = $row['title'];
            $video['description'] = $row['description'];
            $video['extension'] = $row['extension'];
            $video['filename'] = $filename;
            $video['thumbnail'] = $row['thumbnail'];
            array_push($videos_data, $video); 
        }
        return $videos_data;
    }
}