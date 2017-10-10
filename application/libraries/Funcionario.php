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
            public function carregaCar($data){
              
                foreach($data as $row){
                    $id_usuario =  $row->id_usuario;
                }

                $sql = "SELECT Cargo FROM FUNCIONARIO WHERE id_funcionario = '$id_usuario'";
                $query = $this->db->query($sql);

                
                foreach($query->result() as $rs){
                    $cargo = $rs->Cargo;
                }
                return $cargo;
                
            }
            
    }

?>