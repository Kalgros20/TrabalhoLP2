<?php

    include APPPATH.'libraries/Funcionario.php';
    
    class HomeModel extends CI_Model
    {
        public function getListaFunc($funcionario)
        {
            $func = new Funcionario();
            if($funcionario['Id_cargo'] == 4)
            {
                return $func->getListaTarefas($funcionario);
            }
            else
            {
                return $func->getListaFuncionario($funcionario);
            }
        }

        public function getColunas($funcionario)
        {
            $func = new Funcionario();
            return $func->getColumns($funcionario);
        }
    }

?>