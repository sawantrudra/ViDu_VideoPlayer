<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_db extends CI_Model
{
	// Log in
	public function login($username, $password)
	{
		// Validate
		if($username==''){
			return false;
		}
		$this->db->where('user_name', $username);
		//$this->db->where('user_password', $password);

		$result = $this->db->get('login');
		$row = $result->row(0);
		if(!$row->verified){
			return false;
		}
		if ($result->num_rows() == 1) {
			if(password_verify($password, $row->user_password))
				return true;
		} else {
			return false;
		}
	}

	// Check username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('login', array('user_name' => $username));
		if (empty($query->row_array())) {
			return 1;
		} else {
			return 0;
		}
	}
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('login', array('user_email' => $email));
		if (empty($query->row_array())) {
			return 1;
		} else {
			return 0;
		}
	}


	// Register a new user
	public function register_user($username, $useremail, $password,  $question_1, $question_2, $answer_1,$answer_2)
	{
		$verification_code = md5(strtolower($username.$useremail.$password));
		$data = array(
			'user_name' => $username,
			'user_email' => $useremail,
			'user_password' => password_hash($password, PASSWORD_BCRYPT, array('cost'=> 12)),
			'verification_code' => $verification_code,
			'verified' => 0,
			'question_1' => $question_1,
			'question_2' => $question_2,
			'answer_1' => $answer_1,
			'answer_2' => $answer_2
		);
		if($this->db->insert('login', $data)){
			return $verification_code;
		}
	}

	public function verify_cookie($username, $code)
	{
		if($username == ''){
			return 0;
		}
		$query = $this->db->get_where('login', array('user_name' => $username));
		$row = $query->row(0);
		$result = md5(strtolower($row->user_name).$row->user_password);
		if ($code == $result ) {
			$user_data = array(
				'username' => strtolower($username),
				'logged_in' => true
			);
			$this->session->set_userdata($user_data);
			return 1;
		} else {
			return 0;
		}
	}

	public function verify_email($code){
		$query = $this->db->get_where('login', array('verification_code' => $code));
		if($query->num_rows()){
			$row = $query->row(0);
			$id = $row->id;
			$data = array(
				'verified' => 1
			);
			$this->db->where('id', $id);
			$this->db->update('login',$data);
			return 1;
		}
		return 0;
	}
	public function get_security_questions($email){
		$query = $this->db->get_where('login', array('user_email' => $email));
		$row = $query->row(0);
		$data['question_1'] = $row->question_1;
		$data['question_2'] = $row->question_2;
		$data['user_email'] = $email;
		
		return $data;
		
	}

	public function get_verification_code($user_email){
		$query = $this->db->get_where('login', array('user_email' => $user_email));
		$row = $query->row(0);
		$code = $row->verification_code;
		return $code;
	}

	public function check_security_questions($user_email,$answer_1,$answer_2){
		$query = $this->db->get_where('login', array('user_email' => $user_email, 'answer_1'=>$answer_1, 'answer_2'=> $answer_2));
		if (!empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	public function verify_reset_code($code){
		$query = $this->db->get_where('login', array('verification_code'=> $code));
		if (!empty($query->row_array())) {
			$row = $query->row(0);
			if($code == $row->verification_code){
				$data['check'] = true;
				$data['user_name'] = $row->user_name;
				$data['user_email'] = $row->user_email;
			}else{
				$data['check'] = false;
			}
		} else {
			$data['check'] = false;
		}
		return $data;
	}

	public function reset_password($user_name, $user_email, $password){
		$e_password = md5($password);
		$verification_code = md5(strtolower($user_name.$user_email.$e_password));
		$data = array(
			'user_password' => password_hash($e_password, PASSWORD_BCRYPT, array('cost'=> 12)),
			'verification_code' => $verification_code
		);
		$this->db->where('user_email', $user_email);
		$this->db->update('login',$data);
	}

	public function register_google_user($user_name, $user_email, $user_firstname,  $user_lastname, $user_picture)
	{
		
		$data = array(
			'user_name' => $user_name,
			'user_email' => $user_email,
			'first_name' => $user_firstname,
			'last_name' => $user_lastname,
			'google_picture' => $user_picture,
			'google_account' => true
		);
		if($this->db->insert('login', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function check_google_user_in_table($username){
		$query = $this->db->get_where('login', array('user_name' => $username, 'google_account' =>1));
		if (empty($query->row_array())) {
			return 0;
		} else {
			return 1;
		}
	}


}
