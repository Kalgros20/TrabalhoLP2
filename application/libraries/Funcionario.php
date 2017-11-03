<?php   
        defined('BASEPATH') OR exit('No direct script access allowed');
        include APPPATH.'libraries/Usuario.php';
        
        class Funcionario extends Usuario{
            private $db;
            private $nome;
            private $cargo;

            function __construct(){
                $ci = &get_instance();
                $this->db = $ci->db;
            }

            public function setNome($nome){
                $this->nome = $nome;
            }
            
            public function getNome(){
                return $this->nome;
            }
                     
            public function getCargo(){
                return $this->cargo;
            }
            public function setCargo($cargo){
                $this->cargo = $cargo;
            }

            /** Função que carrega todos os dados do funcionario para jogar na variavel session
             * @param Array com os dados da tabela usuario.
             */
            public function carregaFunc($data)
            {
              
                foreach($data as $row){
                    $id_usuario =  $row->Id_usuario;
                }          

                $sql = "SELECT * FROM FUNCIONARIO WHERE Id_usuario = '$id_usuario'";
                $query = $this->db->query($sql);
                                
                foreach($query->result() as $rs){
             
                    $funcionario = array(
                        'Id' => $rs->Id_funcionario,
                        'Id_cargo' => $rs->Id_cargo,
                        'Gerente' => $rs->Gerente,
                        'Supervisor' => $rs->Supervisor,
                        'Nome' => $rs->Nome
                    );
                }                
      
                return $funcionario;
            }

            /** Função que lista os Funcionarios de acordo com o que foi carregado anteriormente
             * @param array com os dados do funcionario
             */

            public function getListaFuncionario($funcionario)
            {
            $idFunc = $funcionario['Id'];
            $nome =  $funcionario['Nome'];
            $gerente = $funcionario['Nome'];
            $cargo = $funcionario['Id_cargo'];
            $supervisor = $funcionario['Nome'];
            
            
            switch($cargo)
            {
              case 1: 
                $sql = "SELECT cargo.Nome AS Cargo, funcionario.Nome AS Nome FROM funcionario INNER JOIN Cargo ON funcionario.Id_cargo= cargo.Id_cargo WHERE cargo.Nome != 'presidente'";                    
                $query = $this->db->query($sql);
                break;
              case 2:
                $sql = "SELECT cargo.Nome AS Cargo, funcionario.Nome AS Nome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo where Funcionario.Supervisor like '$supervisor'"; 
                $query = $this->db->query($sql);
                break;
              case 3:
                $sql = "SELECT Cargo.Nome AS Cargo, Funcionario.Nome AS Nome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo where cargo.Id_cargo = 4 AND funcionario.Gerente = '$gerente'"; 
                $query = $this->db->query($sql);
                break;
              case 4:
                $sql = "Select descricao,DataLimite from tarefas where Id_funcionario = '$idFunc'";
                $query = $this->db->query($sql);
            }           
              $html = '';
                    $m = $query->result();
                    foreach($m as $obj)
                    {
                        if($cargo == 4)
                        {
                            $html .= $this->listaTarefas($obj);
                        }
                        else
                        {
                            $html .= $this->listaFuncionario($obj);
                        }
                    }
                return $html; 
            }
            
            /** Função que gera o html de acordo com a linha que foi feita o select na tabela
             * @param array com todos os dados da linha da tabela funcionario
             */
            
            public function listaFuncionario($obj)
            {                                
                $html = 
                '<tr class="text-center">
                <td>'.$obj->Nome.'</td>
                <td>'.$obj->Cargo.'</td>
               
                </tr>';
                
                return $html;
            }

            /** Função que lista as Tarefas caso o usuário seja colaborador
             * @param Array com todos os dados da linha da tabela funcionario
             */

            public function listaTarefas($obj)
            {
                $html = 
                '<tr class="text-center">
                <td>'.$obj->descricao.'</td>
                <td>'.$obj->DataLimite.'</td>
                </tr>';
                
                return $html;
            }

            /** Função que retorna a coluna a ser apresentada de acordo com o cargo
             * @param Array Funcionario com todos os dados.
             */
            
            public function getColumns($funcionario)
            {
                if($funcionario['Id_cargo'] == 4){
                    $colunas = array
                    (
                        0 => 'Descricao',
                        1 => 'DataLimite'
                    );
                    return $colunas;
                }
                else
                {
                    $colunas = array
                    (
                        0 => 'Nome',
                        1 => 'Cargo'
                    );
                    return $colunas;
                }
           }
           
            /** Função que insere os dados do funcionário pelos forms
            * da página de cadastro
            * @param dados,id Usuario um Array com os dados do form da pag de cadastro
            */
           public function insertFunc($dados,$idUsuario)
           {
             $id = $idUsuario;
             var_dump($idUsuario);
             $funcionario = array();
             $funcionario["Id_cargo"] = $dados["cargo"];
             $funcionario["supervisor"] = $dados["supervisor"];
             $funcionario["gerente"] = $dados["gerente"];
             $funcionario["Id_usuario"] = intval($id);
             $funcionario["nome"] = $dados["nome"];
             $nome = $funcionario["nome"];
             $this->db->insert('funcionario', $funcionario); 
        

             return true;
           }

    }


?>