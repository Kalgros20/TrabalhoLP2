<?php
 
    class Usuario{
        private $db;
        private $id;
        private $email;
        private $senha;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        function __construct(){
            $ci = &get_instance();
            $this->db = $ci->db;
        }

        /**Função que valida se o usuario e senha no momento do login existe no banco
        * @param email e senha como parametros.
        */
        public function validaUser($email,$senha){
            $sql = "SELECT * FROM USUARIO WHERE  email = '$email'";
            $rs = $this->db->query($sql);
                
            $resultado = $rs->result();
            foreach($resultado AS $usuario)
            {
                if($email == $usuario->email && $senha == $usuario->senha)
                {
                    return $resultado;
                }
                else
                {
                    return false;
                }                    
            }
         }

         
        /**Função que cria o usuario com email e senha no banco de dados
        * @param dados um Array com os dados do form da pag de cadastro
        */
         public function criaUser($dados)
         {
            $data = array();
            $data["email"] = $dados["email"];
            $data["senha"] = $dados["senha"];
            $email = $data['email'];
            $this->db->insert('usuario',$data);         
            
            $sql = "Select Id_usuario from usuario where email = '$email'";
            $query = $this->db->query($sql);
            $id = $query->result();

            foreach($id as $row){
                $idUsuario =  $row->Id_usuario;
            }    
            return $idUsuario;
        }
    }
?>