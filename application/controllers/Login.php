<?php

defined('BASEPATH') OR exit('No direct script access allowed');

     class Login extends CI_Controller{
        
        public function index(){
            
            $this->load->view('static/cabecalho');
            $this->load->view('static/header');
            
            $data['action'] = site_url('Login/Trigger');
            $this->load->view('login/form','$data');
            
            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
        }
         
        public function Trigger(){
            
        }
    }
?>