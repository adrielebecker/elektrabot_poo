<?php
    require_once("../classes/autoload.php");

    class Usuario{
        private $id_usuario;
        private $nome;
        private $data_nasc;
        private $sexo;
        private $cpf;
        private $celular;
        private $email;
        private $cep;
        private $estado;
        private $cidade;
        private $bairro;
        private $rua;
        private $complemento;
        private $numero;
        private $senha;
        private $nivel_permissao;
        private $login;

        public function __construct($id_usuario = 0, $nome = "", $data_nasc = "", $sexo = "", $cpf = "", $celular = "", $email = "m", $cep = "", $estado = "", $cidade = "", $bairro = "", $rua = "", $complemento = "", $numero = "", $senha = "", Permissao $nivel_permissao = null, Login $login = null){
            $this->setIdUsuario($id_usuario);
            $this->setNome($nome);
            $this->setDataNasc($data_nasc);
            $this->setSexo($sexo);
            $this->setCpf($cpf);
            $this->setCelular($celular);
            $this->setEmail($email);
            $this->setCep($cep);
            $this->setEstado($estado);
            $this->setCidade($cidade);
            $this->setBairro($bairro);
            $this->setRua($rua);
            $this->setComplemento($complemento);
            $this->setNumero($numero);
            $this->setSenha($senha);
            $this->setNivelPermissao($nivel_permissao);  
            $this->setLogin($login);
        }
        
        public function inserir(){
            try {
                $sql = "INSERT INTO usuario(nome, data_nasc, sexo, cpf, celular, email, cep, estado, cidade, bairro, rua, complemento, numero, senha, nivel_permissao) VALUES (:nome, :data_nasc, :sexo, :cpf, :celular, :email, :cep, :estado, :cidade, :bairro, :rua, :complemento, :numero, :senha, :nivel_permissao)";
                $paramentros = [
                   ':nome' => $this->getNome(),
                   ':data_nasc' => $this->getDataNasc(),
                   ':sexo' => $this->getSexo(),
                   ':cpf' => $this->getCpf(),
                   ':celular' => $this->getCelular(),
                   ':email' => $this->getEmail(),
                   ':cep' => $this->getCep(),
                   ':estado' => $this->getEstado(),
                   ':cidade' => $this->getCidade(),
                   ':bairro' => $this->getBairro(),
                   ':rua' => $this->getRua(),
                   ':complemento' => $this->getComplemento(),
                   ':numero' => $this->getNumero(),
                   ':senha' => $this->getSenha(),
                   ':nivel_permissao' => $this->getNivelPermissao()->getIdPermissao()
                ];
                Database::executar($sql, $paramentros);
                echo "Usuário inserido com sucesso!";
            } catch (Exception $e) {
                echo "Erro ao inserir usuário: " . $e->getMessage();
            }
        }

        public function alterar(){
            try{
                $sql = "UPDATE usuario SET id_usuario = :id_usuario, nome = :nome, data_nasc = :data_nasc, sexo = :sexo, cpf = :cpf, celular = :celular, email = :email, cep = :cep, estado = :estado, cidade = :cidade, bairro = :bairro, rua = :rua, complemento = :complemento, numero = :numero, senha = :senha, nivel_permissao = :nivel_permissao WHERE id_usuario = :id_usuario";
                $paramentros = [
                    ':id_usuario' => $this->getIdUsuario(),
                    ':nome' => $this->getNome(),
                    ':data_nasc' => $this->getDataNasc(),
                    ':sexo' => $this->getSexo(),
                    ':cpf' => $this->getCpf(),
                    ':celular' => $this->getCelular(),
                    ':email' => $this->getEmail(),
                    ':cep' => $this->getCep(),
                    ':estado' => $this->getEstado(),
                    ':cidade' => $this->getCidade(),
                    ':bairro' => $this->getBairro(),
                    ':rua' => $this->getRua(),
                    ':complemento' => $this->getComplemento(),
                    ':numero' => $this->getNumero(),
                    ':senha' => $this->getSenha(),
                    ':nivel_permissao' => $this->getNivelPermissao()->getIdPermissao()
                ];
                Database::executar($sql, $paramentros);
            } catch (Exception $e) {
                echo "Erro ao alterar usuário: " . $e->getMessage();
            }    
        }

        public function excluir(){
            try{
                $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
                $paramentros = ['id_usuario' => $this->getIdUsuario()];
                Database::executar($sql, $paramentros);
            } catch (Exception $e) {
                echo "Erro ao excluir usuário: " . $e->getMessage();
            }
        }

        public static function listar($tipo = 0, $busca = ""):array{
            try{
                $sql = "SELECT * FROM usuario";
                if($tipo > 0){
                    switch($tipo){
                        case 1: 
                            $sql .= " WHERE id_usuario = :busca"; 
                            break;
                        case 2: 
                            $sql .= " WHERE cpf = :busca"; 
                            break;
                        case 3: 
                            $sql .= ' WHERE cor nome :busca';
                            $busca = "%{$busca}%";
                            break;  
                        default:
                            throw new Exception("Tipo de busca inválido.");
                   }
                }
                $parametros = array();
        
                if($tipo > 0){
                   $parametros = array(':busca' => $busca);
                }

                $comando = Database::executar($sql, $parametros);
                $usuarios = array();
        
                while($registro = $comando->fetch(PDO::FETCH_ASSOC)){
                    $permissao = Permissao::listar(1, $registro['nivel_permissao'])[0];
                    $login = new Login($registro['email'], $registro['senha'], $permissao);
                    $usuario = new Usuario($registro['id_usuario'], $registro['nome'], $registro['data_nasc'], $registro['sexo'], $registro['cpf'], $registro['celular'], $registro['email'], $registro['cep'], $registro['estado'], $registro['cidade'], $registro['bairro'], $registro['rua'], $registro['complemento'], $registro['numero'], $registro['senha'], $permissao, $login);
                    array_push($usuarios, $usuario);
                }
                return $usuarios;
            } catch (Exception $e) {
                echo "Erro ao listar usuário: " . $e->getMessage();
            }
        }

        /**
         * Get the value of id_usuario
         */
        public function getIdUsuario(){
            return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         */
        public function setIdUsuario($id_usuario): self{
            $this->id_usuario = $id_usuario;
            return $this;
        }

        /**
         * Get the value of nome
         */
        public function getNome(){
            return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome($nome): self{
            $this->nome = $nome;
            return $this;
        }

        /**
         * Get the value of data_nasc
         */
        public function getDataNasc(){
            return $this->data_nasc;
        }

        /**
         * Set the value of data_nasc
         */
        public function setDataNasc($data_nasc): self{
            $this->data_nasc = $data_nasc;
            return $this;
        }

        /**
         * Get the value of sexo
         */
        public function getSexo(){
            return $this->sexo;
        }

        /**
         * Set the value of sexo
         */
        public function setSexo($sexo): self{
            $this->sexo = $sexo;
            return $this;
        }

        /**
         * Get the value of cpf
         */
        public function getCpf(){
            return $this->cpf;
        }

        /**
         * Set the value of cpf
         */
        public function setCpf($cpf): self{
            $this->cpf = $cpf;
            return $this;
        }

        /**
         * Get the value of celular
         */
        public function getCelular(){
            return $this->celular;
        }

        /**
         * Set the value of celular
         */
        public function setCelular($celular): self{
            $this->celular = $celular;
            return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail(){
            return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self{
            $this->email = $email;
            return $this;
        }

        /**
         * Get the value of cep
         */
        public function getCep(){
            return $this->cep;
        }

        /**
         * Set the value of cep
         */
        public function setCep($cep): self{
            $this->cep = $cep;
            return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado(){
            return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado($estado): self{
            $this->estado = $estado;
            return $this;
        }

        /**
         * Get the value of cidade
         */
        public function getCidade(){
            return $this->cidade;
        }

        /**
         * Set the value of cidade
         */
        public function setCidade($cidade): self{
            $this->cidade = $cidade;
            return $this;
        }

        /**
         * Get the value of bairro
         */
        public function getBairro(){
            return $this->bairro;
        }

        /**
         * Set the value of bairro
         */
        public function setBairro($bairro): self{
            $this->bairro = $bairro;
            return $this;
        }

        /**
         * Get the value of rua
         */
        public function getRua(){
            return $this->rua;
        }

        /**
         * Set the value of rua
         */
        public function setRua($rua): self{
            $this->rua = $rua;
            return $this;
        }

        /**
         * Get the value of complemento
         */
        public function getComplemento(){
            return $this->complemento;
        }

        /**
         * Set the value of complemento
         */
        public function setComplemento($complemento): self{
            $this->complemento = $complemento;
            return $this;
        }

        /**
         * Get the value of numero
         */
        public function getNumero(){
            return $this->numero;
        }

        /**
         * Set the value of numero
         */
        public function setNumero($numero): self{
            $this->numero = $numero;
            return $this;
        }

        /**
         * Get the value of senha
         */
        public function getSenha(){
            return $this->senha;
        }

        /**
         * Set the value of senha
         */
        public function setSenha($senha): self{
            $this->senha = $senha;
            return $this;
        }

        /**
         * Get the value of nivel_permissao
         */
        public function getNivelPermissao(){
            return $this->nivel_permissao;
        }

        /**
         * Set the value of nivel_permissao
         */
        public function setNivelPermissao($nivel_permissao): self{
            $this->nivel_permissao = $nivel_permissao;
            return $this;
        }

        /**
         * Get the value of login
         */
        public function getLogin(){
            return $this->login;
        }
        
        /**
         * Set the value of login
         */
        public function setLogin($login): self{
            $this->login = $login;
            return $this;
        }
    }
?>