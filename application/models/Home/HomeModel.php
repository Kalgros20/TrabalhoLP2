<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class HomeModel extends CI_Model{
        public function getListaFuncionario(){
            $func = new Funcionario();
        }
    }

?>