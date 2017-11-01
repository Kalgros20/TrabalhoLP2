<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class LoginModel extends CI_Model{

        public function validaFuncionario(){
            if($_POST == 0) return false;

            $this->form_validation->set_rules('email', 'Email Funcionario', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[8]');
            
            if($this->form_validation->run()){
                $email = $this->input->post('email', TRUE);
                $senha = $this->input->post('senha', TRUE);
                $funcionario = new Funcionario();
                
                $usuario =  $funcionario->validaFunc($email,$senha);                
            }            
            
            if($usuario)
            {
                $funcionario = $funcionario->carregaFunc($usuario);
                $this->session->set_userdata($funcionario);
                return 'HomeController/Home';
            }
            else
            {
                echo  "<script>alert('Usuário ou senha inválido!');</script>";
                return 'Login/Index';
            }
        }

        public function insereFuncionario(){
            if($_POST == 0) return false;
            
            $email = $this->input->post('email', TRUE);
            $senha = $this->input->post('senha', TRUE);
            $nome = $this->input->post('senha', TRUE);

            $this->form_validation->set_rules('email', 'Email Funcionario', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[8]');
            $this->form_validation->set_rules('nome', 'Email Funcionario', 'required');
            
            
            
            if($this->form_validation->run()){
                $email = $this->input->post('email', TRUE);
                $senha = $this->input->post('senha', TRUE);
                $funcionario = new Funcionario();
                
                $usuario =  $funcionario->insertFunc($email,$senha,$nome);                
        }        
    }
}

?>