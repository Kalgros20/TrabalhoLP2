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
            
            $this->load->view('login/cadastro');

            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
            
        }
         
        public function Trigger(){

            $this->load->model('Login/LoginModel','model');
            $result = $this->model->validaFuncionario();
            redirect("$result",'refresh');

        }

        public function Logout(){
            $this->session->unset_userdata("Id","Id_cargo","Id_supervisor","Nome");
            redirect('Login\Index','refresh');

        }
         
     }
?>