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
            
            $user = $this->model->validaFuncionario();
            if($user)
            {
                $funcionario = $this->model->carregaFuncionario($user);
                $this->session->set_userdata($funcionario);
                redirect('HomeController/Home','refresh');
            }
            else
            {
                echo  "<script>alert('Usuário ou senha inválido!');</script>";
                redirect('Login/Index','refresh');
            }
        }

        public function Logout(){
            $this->session->unset_userdata("Id","Id_cargo","Id_supervisor","Nome");
            redirect('Login\Index','refresh');

        }
         
     }
?>