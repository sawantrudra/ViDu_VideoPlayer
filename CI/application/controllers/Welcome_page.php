<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('email');
        $this->load->model('login_db');
    }
    /**
     * Show First page of the website 
     * Option to Login or Sign Up
     */
    public function index()
    {
        //weclome message and design
        //login form
        $username_cookie = get_cookie('vidu_cookie_username');
        $code_cookie = get_cookie('vidu_cookie_code');
        $result = $this->login_db->verify_cookie(strtolower($username_cookie), $code_cookie);
        if (!$result) {
            $this->login();
        } else {
            redirect('Home_page');
        }
    }
    public function login()
    {
        $this->load->view('templates/welcome_header');
        if (!$this->session->userdata('logged_in')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = md5($password);
            $remember = $this->input->post('remember_me');
	    $recaptha = $this->input->post('recaptha');
		$google_url="https://www.google.com/recaptcha/api/siteverify";
  $secret='6Ldjbv4UAAAAAA03aCY-z8HVKsmJ86BxfFTaj1uA';
  $ip=$_SERVER['REMOTE_ADDR'];
  $url=$google_url."?secret=".$secret."&response=".$recaptha."&remoteip=".$ip;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_TIMEOUT, 10);
  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
  $res = curl_exec($curl);
  curl_close($curl);
  $res= json_decode($res, true);
            if ($remember) {
                $cookie1 = array(
                    'name'   => 'vidu_cookie_username',
                    'value'  => $username,
                    'expire' => '3600',
                );
                set_cookie($cookie1);
                $cookie2 = array(
                    'name'   => 'vidu_cookie_code',
                    'value'  => md5(strtolower($username) . $password),
                    'expire' => '3600',
                );
                set_cookie($cookie2);
            }

            if (($this->login_db->login($username, $password))&&($res['success'])) {
                // Create session
                $user_data = array(
                    'username' => strtolower($username),
                    'logged_in' => true,
                    'google_user' => false
                );
                $this->session->set_userdata($user_data);
                // Set message

                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                // $data['title'] = 'Home';
                // $this->load->view('home', $data)
                redirect('Home_page/');
            } else {
                if ($username) {
                    $this->session->set_flashdata('user_loggedin', 'Login Fail!');
                    redirect('');
                }
                $data['title'] = "Please log in";
                $this->load->view('login', $data);
            }
        } else {
            $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            // $data['title'] = 'Home';
            // $this->load->view('home', $data);
            redirect('Home_page/');
        }
        $this->load->view('templates/footer');
    }
    public function check_username()
    {
        $username = $_GET["str"];
        $response = $this->login_db->check_username_exists($username);
        echo $response;
    }
    public function check_email()
    {
        $email = $_GET["str"];
        $response = $this->login_db->check_email_exists($email);
        echo $response;
    }
    public function register()
    {
        if (!$this->session->userdata('logged_in')) {
            $username = $this->input->post('username');
            $useremail = $this->input->post('useremail');
            $password = $this->input->post('password');
            $c_password = $this->input->post('confirm_password');
            $question_1 = $this->input->post('question_1');
            $question_2 = $this->input->post('question_2');
            $answer_1 = $this->input->post('answer_1');
            $answer_2 = $this->input->post('answer_2');

            if ($this->login_db->check_username_exists($username) && $username != NULL) {

                if ($c_password == $password) {
                    $password = md5($password);
                    $verification_code = $this->login_db->register_user($username, $useremail, $password, $question_1, $question_2, $answer_1, $answer_2);
                    $this->send_verification_email($useremail, $verification_code);
                    $data['title'] = 'User registered Successfully';
                    redirect('Welcome_page');
                } else {
                    $data['title'] = 'Passwords do not match';
                    $this->load->view('register', $data);
                }
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                // $data['title'] = 'Home';
                // $this->load->view('home', $data)
                redirect('Home_page');
            } else {

                $data['title'] = 'User name exists';
                $this->load->view('register', $data);
            }
        } else {
            $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            // $data['title'] = 'Home';
            // $this->load->view('home', $data);
            redirect('Home_page');
        }
        $this->load->view('templates/footer');
    }

    public function google_login()
    {
	$this->load->model('login_db');
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $user_firstname = $this->input->post('user_firstname');
        $user_lastname = $this->input->post('user_lastname');
        $user_picture = $this->input->post('user_picture');
        if ($this->login_db->check_google_user_in_table($user_name)) {
            $user_data = array(
                'username' => strtolower($user_name),
                'logged_in' => true,
                'google_user' => true
            );
            $this->session->set_userdata($user_data);
            // Set message

            $this->session->set_flashdata('user_loggedin', 'You are now logged in');

            redirect('Home_page/');
        } else {
            $this->login_db->register_google_user($user_name, $user_email, $user_firstname, $user_lastname, $user_picture);
            $user_data = array(
                'username' => strtolower($user_name),
                'logged_in' => true,
                'google_user' => true
            );
            $this->session->set_userdata($user_data);
            // Set message

            $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            redirect('Home_page/');
        }
    }

    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('google_user');
        $this->session->unset_userdata('remember_me');
        delete_cookie('vidu_cookie_username');
        delete_cookie('vidu_cookie_code');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('');
    }

    public function verify_email($code)
    {
        $result = $this->login_db->verify_email($code);
        if ($result) {
            $this->session->set_flashdata('email_verify', 'Your email has been verified!');
        } else {
            $this->session->set_flashdata('email_verify', 'Your email could not be verified!');
        }
        redirect('');
    }

    public function send_verification_email($email, $verification_code)
    {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mailhub.eait.uq.edu.au',
            'smtp_port' => 25,
           /* 'starttls' => TRUE,
            'smtp_timeout' => 5,
            'smtp_user' => 'viduvideoplayer@gmail.com', // change it to yours
            'smtp_pass' => 'gkmonisgsvmjxfcj', // change it to yours
            'smtp_crypto' => 'tls',*/
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        //$this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('viduvideoplayer@gmail.com', "Admin Team");
        $this->email->to($email);
        $this->email->subject("Email Verification");
        $this->email->message("Dear User,\n\nPlease click on below URL or paste into your browser to verify your Email Address\n\n https://infs3202-1806ecce.uqcloud.net/CI/verify/" . $verification_code . "\n" . "\n\nThanks\nAdmin Team");
        $this->email->send();
    }

    public function forgot_password()
    {

        if ($this->input->post('user_email')) {
            $user_email = $this->input->post('user_email');
            $data = $this->login_db->get_security_questions($user_email);
            $this->load->view('templates/simple_header');
            $this->load->view('security_questions', $data);
            $this->load->view('templates/simple_header');
            return;
        }
        $this->load->view('templates/simple_header');
        $this->load->view('forgot_password');
        $this->load->view('templates/footer');
    }

    public function answer_security_questions()
    {
        if ($this->input->post('answer_1')) {
            $user_email = $this->input->post('user_email');
            $answer_1 = $this->input->post('answer_1');
            $answer_2 = $this->input->post('answer_2');
            //echo "no reset".$user_email.$answer_1.$answer_2;
            $this->load->view('templates/simple_header');
            if ($this->login_db->check_security_questions($user_email, $answer_1, $answer_2)) {

                $this->load->view('email_redirect_message');
                $this->send_reset_password_email($user_email);
            } else {
                echo "unsucess reset";
                // redirect('Welcome_page');
            }
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/simple_header');
            $this->load->view('security_questions');
            $this->load->view('templates/footer');
        }
        return;
    }

    public function send_reset_password_email($email)
    {
        // echo $email.'hehehehehehe';
        $verification_code = $this->login_db->get_verification_code($email);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'starttls' => TRUE,
            'smtp_timeout' => 5,
            'smtp_user' => 'viduvideoplayer@gmail.com', // change it to yours
            'smtp_pass' => 'gkmonisgsvmjxfcj', // change it to yours
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        //$this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('viduvideoplayer@gmail.com', "Admin Team");
        $this->email->to($email);
        $this->email->subject("Reset Password");
        $this->email->message("Dear User,\n\nPlease click on below URL or paste into your browser to reset your password\n\n http://localhost/CI/reset_password/" . $verification_code . "\n" . "\n\nThanks\nAdmin Team");
        $this->email->send();
    }

    public function verify_reset_password($code)
    {
        $result = $this->login_db->verify_reset_code($code);
        // if($result['check']){
        $this->load->view('templates/simple_header');
        $this->load->view('reset_password', $result);
        $this->load->view('templates/footer');
        // }else{
        //     $this->load->view('templates/simple_header');
        //    echo "error in verification!!";
        //    $this->load->view('templates/simple_header');
        // }
        //redirect('Welcome_page/login');
    }

    public function reset_password()
    {
        if ($this->input->post('password')) {
            $user_name = $this->input->post('user_name');
            $user_email = $this->input->post('user_email');
            $password = $this->input->post('password');
            $c_password = $this->input->post('confirm_password');
            if ($password == $c_password) {
                $this->login_db->reset_password($user_name, $user_email, $password);
                redirect('Welcome_page');
            }
        }
    }

	public function play_video($video_id)
    {
	$this->load->model('player_db');
	$this->load->model('profile_db');

        $data = $this->player_db->get_video_details($video_id);
        $this->load->view('templates/player_header');
        $this->load->view('video_player', $data);
        if ($this->session->userdata('username')) {
            $userdata = $this->profile_db->get_user_details($this->session->userdata('username'));
            $user_id = $userdata['user_id'];
            $data['liked'] = $this->player_db->check_if_liked($user_id, $video_id);
            $data['wishlisted'] = $this->player_db->check_if_wishlisted($user_id, $video_id);

        } else {
            $data['liked'] = 0;
            $data['wishlisted'] = 0;
        }
        $data['comments_data'] = $this->display_comments($video_id);
        $this->load->view('video_description', $data);
        $this->load->view('templates/footer');
    }
	public function display_comments($video_id){
$this->load->model('player_db');

        if($this->player_db->display_comments($video_id)){
            return $this->player_db->display_comments($video_id);
        }else{
            return 'No Comments!';
        }
    }

}
