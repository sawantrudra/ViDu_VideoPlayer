<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paypal_page extends CI_Controller
{
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('paypal');
        $this->load->view('templates/footer');
    }
}