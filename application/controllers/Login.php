<?php

defined('BASEPATH') OR exit('No direct script access allowed');


     class Login extends CI_Controller{
       
        public function index(){
            $data['action1'] = 'index.php/Login/cadastro';

            $this->load->view('static/cabecalho');
            $this->load->view('static/header');
            
            $data['action'] = 'index.php/Login/Trigger';
            $data['action1'] = 'index.php/Login/cadastro';
            
            $this->load->view('login/form',$data);
            
            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
        }

        public function Cadastro(){
               
            $this->load->view('static/cabecalho');
            $this->load->view('static/header');
            $this->load->model('Login/LoginModel','model');
            $data['action'] = 'cadastro';
             
            $this->load->view('Login/Cadastro',$data);
            $result = $this->model->insereFuncionario();

            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
            
        }
         
        public function Trigger(){

            $this->load->model('Login/LoginModel','model');
            $result = $this->model->validaUsuario();
            redirect("$result",'refresh');

        }
                
        public function Sobre(){
            $this->load->view('static/cabecalho');
            $this->load->view('static/header');

            $this->load->view('static/sobre');
            
            $this->load->view('static/footer');
            $this->load->view('static/scripts');
        }
    
        public function Logout(){
            $this->session->sess_destroy();
            redirect('Login\Index','refresh');

        }
         
     }
?>