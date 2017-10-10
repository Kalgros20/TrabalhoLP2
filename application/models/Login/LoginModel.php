<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class LoginModel extends CI_Model{

        public function validaFuncionario(){
            if($_POST == 0) return false;
            
            $email = $this->input->post('email', TRUE);
            $senha = $this->input->post('senha', TRUE);
            $funcionario = new Funcionario();
            
            return $funcionario->validaFunc($email,$senha);
        }

        public function carregaCargo($data){
            if(isset($data)){
                
                $funcionario = new Funcionario();
                $funcionario->carregaCar($data);
                
            }
        }

    }

?>