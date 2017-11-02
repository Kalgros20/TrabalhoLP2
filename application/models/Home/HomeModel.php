<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include APPPATH.'libraries/Funcionario.php';
    
    class HomeModel extends CI_Model
    {
        public function getListaFunc($funcionario)
        {
            $func = new Funcionario();
            return $func->getListaFuncionario($funcionario);
        }

        public function getColunas($funcionario)
        {
            $func = new Funcionario();
            return $func->getColumns($funcionario);
        }
    }

?>