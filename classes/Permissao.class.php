<?php
    require_once("../classes/autoload.php");
    class Permissao{
        private $id_permissao;
        private $descricao;

        public function __construct($id_permissao = 0, $descricao = ""){
            $this->setIdPermissao($id_permissao);
            $this->setDescricao($descricao);
        }

        public function inserir(){
            try{
                $sql = 'INSERT INTO nivelPermissao(descricao) VALUES (:descricao)';
                $parametros = [':descricao' => $this->getDescricao()];
                Database::executar($sql, $parametros);
            } catch (Exception $e) {
                echo "Erro ao inserir permissão: " . $e->getMessage();
            }
        }

        public function alterar(){
            try{
                $sql = 'UPDATE nivelPermissao SET descricao = :descricao WHERE id_permissao = :id_permissao';
                $parametros = [
                    ':id_permissao' => $this->getIdPermissao(),
                    ':descricao' => $this->getDescricao()
                ];
                Database::executar($sql, $parametros);
            } catch (Exception $e) {
                echo "Erro ao alterar permissão: " . $e->getMessage();
            }
        }
        
        public function excluir(){
            try{
                $sql = 'DELETE FROM nivelPermissao WHERE id_permissao = :id_permissao';
                $parametros = [':id_permissao' => $this->getIdPermissao()];
                Database::executar($sql, $parametros);
            } catch (Exception $e) {
                echo "Erro ao excluir permissão: " . $e->getMessage();
            }
        }

        public static function listar($tipo = 0, $busca = ""):array{
            try{

                $sql = "SELECT * FROM nivelPermissao";
                if($tipo > 0){
                    switch($tipo){
                        case 1: 
                            $sql .= " WHERE id_permissao = :busca"; 
                            break;
                        case 2: 
                            $sql .= " WHERE descricao = :busca"; 
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
                $nivel = array();
    
                while($registro = $comando->fetch(PDO::FETCH_ASSOC)){
                    $permissao = new Permissao($registro['id_permissao'], $registro['descricao']);
                    array_push($nivel, $permissao);
                }
                return $nivel;
            } catch (Exception $e) {
                echo "Erro ao listar permissão: " . $e->getMessage();
            }
        }

        /**
         * Get the value of id_permissao
         */
        public function getIdPermissao(){
            return $this->id_permissao;
        }

        /**
         * Set the value of id_permissao
         */
        public function setIdPermissao($id_permissao): self{
            $this->id_permissao = $id_permissao;
            return $this;
        }

        /**
         * Get the value of descricao
         */
        public function getDescricao(){
            return $this->descricao;
        }

        /**
         * Set the value of descricao
         */
        public function setDescricao($descricao): self{
            $this->descricao = $descricao;
            return $this;
        }

        
    }
?>