<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class LoginModel extends CI_Model{

        public function validaFuncionario($email,$senha){
            $funcionario = new Funcionario();
            return $funcionario->validaFunc($email,$senha);
        }

    }

?>