<?php   
        class Funcionario{
            
            private $db;
            private  $nome;
            private  $idade;
            private  $cargo;

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

            public function setIdade($idade){
                $this->idade = $idade;
            }
            
            public function getIdade(){
                return $this->idade;
            }
            
            public function getCargo(){
                return $this->cargo;
            }
            public function setCargo($cargo){
                $this->cargo = $cargo;
            }

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
            public function carregaFunc($data){
              
                foreach($data as $row){
                    $id_usuario =  $row->id_usuario;
                }

                $sql = "SELECT * FROM FUNCIONARIO WHERE Id_funcionario = '$id_usuario'";
                $query = $this->db->query($sql);

                            
                foreach($query->result() as $rs){
                    $funcionario = array(
                        'Id' => $rs->Id_funcionario,
                        'Cargo' => $rs->Cargo,
                        'Nome' => $rs->Nome,
                    );
                }
                return $funcionario;
            }

            public function getListaFuncionario($){
                         
              $query = $this->db->get('funcionario');
              $html = '';
                foreach($query->result() as $obj){
                    $html .= listaFuncionario($obj);
                }
                return $html;
                                 
            }
            
            public function listaFuncionario($obj){
                echo '<tr>
                <th scope="row">'.$i.'</th>
                <td>'.$obj->Nome.'</td>
                <td>'.$obj->Cargo.'</td>
                <td>'.$obj->Supervisor.'</td>
                <td> </td>
                </tr>';
            }
    }

?>