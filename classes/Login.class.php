<?php
    require_once("../classes/autoload.php");
    
    class Login{
        private $email;
        private $senha;
        private $nivel_permissao;

        public function __construct($email = "", $senha = "", Permissao $nivel_permissao = null){
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setNivelPermissao($nivel_permissao);
        }

        public static function efetuarLogin($email, $senha, $nivel_permissao){
            $permissao_valor = $nivel_permissao->getIdPermissao();
            try {
                $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha AND nivel_permissao = :nivel_permissao";
                $parametros = [
                    ':email' => $email,
                    ':senha' => $senha,
                    ':nivel_permissao' => $permissao_valor
                ];
                $comando = Database::executar($sql, $parametros);
                if($comando){
                    while($registro = $comando->fetch()){
                        $permissao = Permissao::listar(1, $nivel_permissao->getIdPermissao())[0];
                        // $permissao = new Permissao($registro['id_permissao'], $registro['descricao']);
                        $login = new Login($registro['email'], $registro['senha'], $permissao);
                        $usuario = new Usuario($registro['id_usuario'], $registro['nome'], $registro['data_nasc'], $registro['sexo'], $registro['cpf'], $registro['celular'], $registro['email'], $registro['cep'], $registro['estado'], $registro['cidade'], $registro['bairro'], $registro['rua'], $registro['complemento'], $registro['numero'], $registro['senha'], $permissao, $login);
                        return $usuario;
                    }
                }
            } catch (Exception $e) {
                echo "Erro ao efetuar login: ".$e->getMessage();
            }
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of senha
         */
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         */
        public function setSenha($senha): self
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of permissao
         */
        public function getNivelPermissao()
        {
                return $this->nivel_permissao;
        }

        /**
         * Set the value of permissao
         */
        public function setNivelPermissao($nivel_permissao): self
        {
                $this->nivel_permissao = $nivel_permissao;

                return $this;
        }
    }
    // class Login{
    //     private $id_usuario;
    //     private $email;
    //     private $senha;
    //     private $permissao;

    //     public function __construct($id_usuario, $email = "null", $senha = "null", Permissao $permissao = null){
    //         $this->setIdUsuario($id_usuario); 
    //         $this->setEmail($email);
    //         $this->setSenha($senha);
    //         $this->setPermissao($permissao);
    //     }

    //     public static function efetuarLogin($email, $senha){
    //         $sql = 'SELECT * FROM usuario WHERE email = :email AND senha = :senha, permissao = :permissao';
    //         $parametros = [
    //             ':email' => $this->getEmail(),
    //             ':senha' => $this->getSenha(),
    //             ':permissao' => $this->getPermissao()
    //         ];
    //         $comando = Database::executar($sql, $parametros);

    //         if($comando){
    //             while($registro = $comando->fetch()){
    //                 $login = new Login($registro['id_usuario'], $registro['email'], $registro['senha']);
    //                 $permissao = new Permissao($registro['id_permissao'], $registro['descricao']);
    //                 $usuario = new Usuario($registro['id_usuario'], $registro['nome'], $registro['data_nasc'], $registro['sexo'], $registro['cpf'], $registro['celular'], $registro['email'], $registro['cep'], $registro['estado'], $registro['cidade'], $registro['bairro'], $registro['rua'], $registro['complemento'], $registro['numero'], $registro['senha'], $permissao, $login);
    //                 return $usuario;
    //             }
    //         }
    //         return false;
    //     }

    //     /**
    //      * Get the value of id_usuario
    //      */
    //     public function getIdUsuario(){
    //         return $this->id_usuario;
    //     }

    //     /**
    //      * Set the value of id_usuario
    //      */
    //     public function setIdUsuario($id_usuario): self{
    //         $this->id_usuario = $id_usuario;
    //         return $this;
    //     }

    //     /**
    //      * Get the value of email
    //      */
    //     public function getEmail(){
    //         return $this->email;
    //     }

    //     /**
    //      * Set the value of email
    //      */
    //     public function setEmail($email): self{
    //         $this->email = $email;
    //         return $this;
    //     }

    //     /**
    //      * Get the value of senha
    //      */
    //     public function getSenha(){
    //         return $this->senha;
    //     }

    //     /**
    //      * Set the value of senha
    //      */
    //     public function setSenha($senha): self{
    //         $this->senha = $senha;
    //         return $this;
    //     }

    //     /**
    //      * Get the value of permissao
    //      */
    //     public function getPermissao(){
    //         return $this->permissao;
    //     }

    //     /**
    //      * Set the value of permissao
    //      */
    //     public function setPermissao($permissao): self{
    //         $this->permissao = $permissao;
    //         return $this;
    //     }
    // }
?>