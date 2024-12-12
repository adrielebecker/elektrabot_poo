<?php
    require_once("../classes/autoload.php");

    class Relatorio{
        private $id_relatorio;
        private $descricao;
        private $cod_antigo;
        private $cod_novo;
        private $tipo;
        private $acidente;
        private $substituicao;

        public function __construct($id_relatorio = 0, $descricao = "", $cod_antigo = "", $cod_novo = "", $tipo = "", $acidente = "", $substituicao = ""){
            $this->setIdRelatorio($id_relatorio);
            $this->setDescricao($descricao);
            $this->setCodAntigo($cod_antigo);
            $this->setCodNovo($cod_novo);
            $this->setTipo($tipo);
            $this->setAcidente($acidente);
            $this->setSubstituicao($substituicao);
        }

        public function inserir(){
            try{
                $sql = "INSERT INTO relatorio (descricao, cod_antigo, cod_novo, tipo, acidente, id_substituicao) VALUES (:descricao, :cod_antigo, :cod_novo, :tipo, :acidente, :substituicao)";
                $parametros = [
                    ':descricao' => $this->getDescricao(),
                    ':cod_antigo' => $this->getCodAntigo(),
                    ':cod_novo' => $this->getCodNovo(),
                    ':tipo' => $this->getTipo(),
                    ':acidente' => $this->getAcidente(),
                    ':substituicao' => $this->getSubstituicao()
                ];
                Database::executar($sql, $parametros);
            } catch(Exception $e){
                echo "Erro ao inserir usuário: ".$e->getMessage();
            }
        }

        public function alterar(){
            try{
                $sql = "UPDATE relatorio SET descricao = :descricao, cod_antigo = :cod_antigo, cod_novo = :cod_novo, tipo = :tipo, acidente = :acidente, substituicao = :substituicao, WHERE id_relatorio = :id_relatorio";
                $parametros = [
                    ':id_relatorio' => $this->getIdRelatorio(),
                    ':descricao' => $this->getDescricao(),
                    ':cod_antigo' => $this->getCodAntigo(),
                    ':cod_novo' => $this->getCodNovo(),
                    ':tipo' => $this->getTipo(),
                    ':acidente' => $this->getAcidente(),
                    ':substituicao' => $this->getSubstituicao()

                ];
                Database::executar($sql, $parametros);
            } catch(Exception $e){
                echo "Erro ao alterar usuário: ".$e->getMessage();
            }
        }

        public function excluir(){
            try{
                $sql = 'DELETE FROM relatorio WHERE id_relatorio = :id_relatorio';
                $parametros = [':id_relatorio' => $this->getIdRelatorio()];
                Database::executar($sql, $parametros);
            } catch(Exception $e){
                echo "Erro ao exlcuir usuário: ".$e->getMessage();
            }
        }

        public static function listar($tipo = 0, $busca = ""):array{
            try{
                $sql = "SELECT * FROM relatorio";
                if($tipo > 0){
                    switch($tipo){
                        case 1: 
                            $sql .= " WHERE id_relatorio = :busca"; 
                            break;
                        case 2: 
                            $sql .= " WHERE acidente = :busca"; 
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
                $relatorios = array();
    
                while($registro = $comando->fetch(PDO::FETCH_ASSOC)){
                    $relatorio = new Relatorio($registro['id_relatorio'], $registro['descricao'], $registro['cod_antigo'], $registro['cod_novo'], $registro['tipo'], $registro['acidente'], $registro['substituicao']);
                    array_push($relatorios, $relatorio);
                }
                return $relatorios;
            } catch (Exception $e) {
                echo "Erro ao listar permissão: " . $e->getMessage();
            }
        }

        /**
         * Get the value of id_relatorio
         */
        public function getIdRelatorio(){
            return $this->id_relatorio;
        }

        /**
         * Set the value of id_relatorio
         */
        public function setIdRelatorio($id_relatorio): self{
            $this->id_relatorio = $id_relatorio;
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

        /**
         * Get the value of cod_antigo
         */
        public function getCodAntigo(){
            return $this->cod_antigo;
        }

        /**
         * Set the value of cod_antigo
         */
        public function setCodAntigo($cod_antigo): self{
            $this->cod_antigo = $cod_antigo;
            return $this;
        }

        /**
         * Get the value of cod_novo
         */
        public function getCodNovo(){
            return $this->cod_novo;
        }

        /**
         * Set the value of cod_novo
         */
        public function setCodNovo($cod_novo): self{
            $this->cod_novo = $cod_novo;
            return $this;
        }

        /**
         * Get the value of tipo
         */
        public function getTipo(){
            return $this->tipo;
        }

        /**
         * Set the value of tipo
         */
        public function setTipo($tipo): self{
            $this->tipo = $tipo;
            return $this;
        }

        /**
         * Get the value of acidente
         */
        public function getAcidente(){
            return $this->acidente;
        }

        /**
         * Set the value of acidente
         */
        public function setAcidente($acidente): self{
            $this->acidente = $acidente;
            return $this;
        }
          /**
         * Set the value of acidente
         */
        public function setSubstituicao($substituicao): self{
            $this->substituicao = $substituicao;
            return $this;
        }

        /**
         * Get the value of id_substituicao
         */ 
        public function getSubstituicao(){
            return $this->substituicao;
        }

    }
?>