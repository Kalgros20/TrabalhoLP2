<?php   
        class Funcionario{
            
            private $db;
            private $nome;
            private $cargo;
            private $email;
            private $senha;

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
            /**Função que valida se o usuario e senha no momento do login existe no banco
             * @param email e senha como parametros.
             */
            public function validaFunc($email,$senha){
                $sql = "SELECT * FROM USUARIO WHERE  email = '$email'";
                $rs = $this->db->query($sql);
                
                $resultado = $rs->result();
                foreach($resultado AS $usuario){
                    if($email == $usuario->email && $senha == $usuario->senha){
                        return $resultado;
                    }else{
                        return false;
                    }                    
                }
            }
            /**Função que carrega todos os dados do funcionario para jogar na variavel session
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
                        'Id_gerente' => $rs->Id_gerente,
                        'Id_supervisor' => $rs->Id_supervisor,
                        'Nome' => $rs->Nome
                      
                    );
                }                
      
                return $funcionario;
            }

            /**Função que lista os Funcionarios de acordo com o que foi carregado anteriormente
             * @param array com os dados do funcionario
             */

            public function getListaFuncionario($funcionario)
            {
            $Nome =  $funcionario['Nome'];
            $Id_gerente = $funcionario['Id_gerente'];
            $cargo = $funcionario['Id_cargo'];
              switch($cargo){
                case 1: 
                  $sql = "SELECT cargo.Nome AS Cargo, funcionario.Nome AS Nome FROM funcionario INNER JOIN Cargo ON funcionario.Id_cargo= cargo.Id_cargo WHERE cargo.Nome != 'presidente'";                    
                  $query = $this->db->query($sql);
                  break;
                case 2:
                  $sql = "SELECT Cargo.Nome AS Cargo, Funcionario.Nome AS Nome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo INNER JOIN Gerente ON funcionario.Id_gerente = gerente.Id_gerente WHERE funcionario.Id_supervisor= 1 AND funcionario.nome != '$Nome'";
                  $query = $this->db->query($sql);
                  break;
                case 3:
                  $sql = "SELECT Cargo.Nome AS Cargo, Funcionario.Nome AS Nome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo where cargo.Id_cargo = 4 AND funcionario.Id_gerente = '$Id_gerente'"; 
                  $query = $this->db->query($sql);
                  break;
            }           
              $html = '';
                    $m = $query->result();
                    foreach($m as $obj)
                    {
                    $html .= $this->listaFuncionario($obj);
                    }
                return $html; 
            }
            
            /**Função que gera o html de acordo com a linha que foi feita o select na tabela
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

            /**Função que lista as Tarefas caso o usuário seja colaborador
             * @param array com todos os dados da linha da tabela funcionario
             */

            public function listaTarefas($obj){
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

           public function getListaTarefas($funcionario)
           {
                $idFunc = $funcionario['Id'];
                $sql = "Select descricao,DataLimite from tarefas where Id_funcionario = '$idFunc'";
                $query = $this->db->query($sql);

                $html = '';
                $m = $query->result();
                foreach($m as $obj)
                {
                $html .= $this->listaTarefas($obj);
                }
                return $html; 
           }

           public function insertFunc($email,$senha,$nome,$cargo){
                
           }
    }

?>