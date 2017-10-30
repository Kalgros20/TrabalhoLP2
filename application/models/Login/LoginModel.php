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
                
                return $funcionario->validaFunc($email,$senha);                
            }
            else
            {
                 echo validation_errors();
                 return false;
            }
        }

        public function carregaFuncionario($data){
            if(isset($data)){
                
                $funcionario = new Funcionario();
                return $funcionario->carregaFunc($data);

                
            }
        }

    }

?>