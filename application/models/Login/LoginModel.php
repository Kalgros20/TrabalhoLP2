<?php

    include APPPATH.'libraries/Funcionario.php';
   
    class LoginModel extends CI_Model
    {
        public function validaUsuario()
        {
            if($_POST == 0) return false;

            $this->form_validation->set_rules('email', 'Email Funcionario', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[8]');
            
            if($this->form_validation->run())
            {
                $email = $this->input->post('email', TRUE);
                $senha = $this->input->post('senha', TRUE);
                $usuario = new Usuario();
                $usuario =  $usuario->validaUser($email,$senha);                
            }            
            
            if($usuario == true)
            {
                $funcionario = new Funcionario();
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

        public function insereFuncionario()
        {
            if($_POST == 0) return false;

            $dados = array();
            $dados["email"] = $this->input->post('email', TRUE);
            $dados["nome"] = $this->input->post('nome', TRUE);
            $dados["senha"]= $this->input->post('senha', TRUE);
            $dados["cargo"] = $this->input->post('cargo', TRUE);
            $dados["supervisor"] = $this->input->post('supervisor', TRUE);
            $dados["gerente"] = $this->input->post('gerente', TRUE);

            $this->form_validation->set_rules('email', 'Email Funcionario', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[8]');
            $this->form_validation->set_rules('nome', 'Email Funcionario', 'required');
            $this->form_validation->set_rules('cargo', 'Cargo', 'required');
            
            
            if($this->form_validation->run())
            {
                $funcionario = new Funcionario();
                $usuario = new Usuario();
                $idUsuario =  $usuario->criaUser($dados);
                $funcionario->insertFunc($dados,$idUsuario);

                echo  "<script>alert('Funcionário Cadastrado com Sucesso!');</script>";
            }           
        }
    }

?>