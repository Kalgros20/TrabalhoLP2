<?php

defined('BASEPATH') OR exit('No direct script access allowed');

     class Login extends CI_Controller{
        
        public function index(){
            
            $this->load->view('static/cabecalho');
            $this->load->view('static/header');
            
            $this->load->view('login/form');
            
            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
        }
    }
?>