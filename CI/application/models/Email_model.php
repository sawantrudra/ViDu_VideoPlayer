<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //load this to send emails
        $this->load->library('email');
    }

    function send_verification_email($email, $verification_code)
    {

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
        $this->email->subject("Email Verification");
        $this->email->message("Dear User,\n\nPlease click on below URL or paste into your browser to verify your Email Address\n\n http://localhost/CI/verify/" . $verification_code . "\n" . "\n\nThanks\nAdmin Team");
        $this->email->send();
    }
}
