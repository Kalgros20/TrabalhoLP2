<?php   
        class Funcionario{
            
            private $db;
            private  $nome;
            private  $cargo;
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

            public function getListaFuncionario($funcionario)
            {
            $Id_gerente = $funcionario['Id_gerente'];
            $cargo = $funcionario['Id_cargo'];
              switch($cargo){
                case 1: 
                  $sql = "SELECT cargo.Nome AS Cargo, funcionario.Nome AS Nome FROM funcionario INNER JOIN Cargo ON funcionario.Id_cargo= cargo.Id_cargo WHERE cargo.Nome != 'presidente'";                    
                  $query = $this->db->query($sql);
                    break;
                case 2:
                  
                  $sql = "SELECT Cargo.Nome AS Cargo, Funcionario.Nome AS Nome, gerente.Nome As GerenNome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo INNER JOIN Gerente ON funcionario.Id_gerente = gerente.Id_gerente WHERE funcionario.Id_supervisor= '$Id_gerente'";
                  $query = $this->db->query($sql);
                    break;
                case 3:
       
                  $sql = "SELECT Cargo.Nome AS Cargo, Funcionario.Nome AS Nome FROM Funcionario INNER JOIN Cargo ON Funcionario.Id_cargo = Cargo.Id_cargo where cargo.Id_cargo = 4 AND funcionario.Id_gerente = '$Id_gerente'"; 
                  $query = $this->db->query($sql);
                  break;
                case 4:
                    break;
              }           
              $html = '';
                    $m = $query->result();
                    foreach($m as $obj){
                    $html .= $this->listaFuncionario($obj);
                }
                return $html; 
            }
            
            public function listaFuncionario($obj)
            {                                
                $html = 
                '<tr class="text-center">
                <td>'.$obj->Nome.'</td>
                <td>'.$obj->Cargo.'</td>
                </tr>';
                
                return $html;
            }
            
            public function listaCabecalho($obj)
            {
                $html = 
                   '<thead class="mdb-color darken-3">
                        <tr class="text-white">
            
                            <th class="text-center">Nome</th>
                            <th class="text-center">Cargo</th>            
                        </tr>
                    </thead>';
                
                return $html;
           }
    }

?>