<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class HomeModel extends CI_Model{
        public function getListaFunc($funcionario){
            $func = new Funcionario();
            return $func->getListaFuncionario($funcionario);
        }
    }

?>