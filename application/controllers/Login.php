<?php

defined('BASEPATH') OR exit('No direct script access allowed');


     class Login extends CI_Controller{
        


        public function index(){
            
            $this->load->view('static/cabecalho');
            $this->load->view('static/header');
            
            $data['action'] = 'index.php/Login/Trigger';
            $this->load->view('login/form',$data);
            
            $this->load->view('static/footer');
            $this->load->view('static/scripts');
            
        }
         
        public function Trigger(){

            $this->load->model('Login/LoginModel','model');
            
            $user = $this->model->validaFuncionario();
            $funcionario = $this->model->carregaFuncionario($user);
            
            $this->session->set_userdata($funcionario);
            switch($funcionario['Cargo']){
                case "Presidente":
                    redirect('','refresh');
                    break;
                case "Colaborador":
                    redirect('Home/Colaborador','refresh');
                    break;
                case "Gerente":
                    redirect('','refresh');
                    break;
                case "Supervisor":
                    redirect('','refresh');
                    break;

                default:
                    echo "Usuário não encontrado";
            }
            
        }

        
    }
?>