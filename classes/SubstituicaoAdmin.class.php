<?php
    require_once("../classes/autoload.php");
    
    class SubstituicaoAdmin{
        private $id_substituicao;
        private $data_substituicao;
        private $latitude;
        private $longitude;
        private $usuario;

        public function __construct($id_substituicao = 0, $data_substituicao = "", $latitude = "", $longitude = "", $usuario = 0){
           $this->setIdSubstituicao($id_substituicao);
           $this->setDataSubstituicao($data_substituicao);
           $this->setLatitude($latitude);
           $this->setLongitude($longitude);
           $this->setUsuario($usuario);
        }

        public function inserir(){
            try{
                $sql = "INSERT INTO substituicao (data_substituicao, latitude, longitude, usuario) VALUES (:data_substituicao, :latitude, :longitude, :usuario)";
                $parametros = [
                    ':data_substituicao' => $this->getDataSubstituicao(),
                    ':latitude' => $this->getLatitude(),
                    ':longitude' => $this->getLongitude(),
                    ':usuario' => $this->getUsuario()
                ];
                Database::executar($sql, $parametros);
            } catch(Exception $e){
                echo "Erro ao inserir: ".$e->getMessage();
            }
        }

        public function alterar(){
            try{
                $sql = "UPDATE substituicao SET data_substituicao = :data_substituicao, latitude = :latitude, longitude = :longitude, usuario = :usuario WHERE id_substituicao = :id_substituicao";
                $parametros = [
                    ':id_substituicao' => $this->getIdSubstituicao(),
                    ':data_substituicao' => $this->getDataSubstituicao(),
                    ':latitude' => $this->getLatitude(),
                    ':longitude' => $this->getLongitude(),
                    ':usuario' => $this->getUsuario()
                ];
                Database::executar($sql, $parametros);
            } catch(Exception $e){
                echo "Erro ao alterar: ".$e->getMessage();
            }
        }
 
        public function excluir(){
            try {
                $sql = 'DELETE FROM substituicao WHERE id_substituicao = :id_substituicao';
                $parametros = [':id_substituicao' => $this->getIdSubstituicao()];
                Database::executar($sql, $parametros);
            } catch (Exception $e) {
                echo "Erro ao excluir: ".$e->getMessage();
            }
        }

        public static function listar($tipo = 0, $busca = ""):array{
            try{
                $sql = "SELECT * FROM substituicao";
                if($tipo > 0){
                    switch($tipo){
                        case 1: 
                            $sql .= " WHERE id_substituicao = :busca"; 
                            break;
                        case 2: 
                            $sql .= " WHERE usuario = :busca"; 
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
                $substituicoes = array();
    
                while($registro = $comando->fetch(PDO::FETCH_ASSOC)){
                    $usuario = Usuario::listar(1, $registro['usuario'])[0];
                    $substituicao = new SubstituicaoAdmin($registro['id_substituicao'], $registro['data_substituicao'], $registro['latitude'], $registro['longitude'], $usuario);
                    array_push($substituicoes, $substituicao);
                }
                return $substituicoes;
            } catch (Exception $e) {
                echo "Erro ao listar substituição: ".$e->getMessage();
            }
        }

        /**
         * Get the value of id_admin
         */
        public function getIdSubstituicao(){
            return $this->id_substituicao;
        }

        /**
         * Set the value of id_admin
         */
        public function setIdSubstituicao($id_substituicao): self{
            $this->id_substituicao = $id_substituicao;
            return $this;
        }

        /**
         * Get the value of data_substituicao
         */
        public function getDataSubstituicao(){
            return $this->data_substituicao;
        }

        /**
         * Set the value of data_substituicao
         */
        public function setDataSubstituicao($data_substituicao): self{
            $this->data_substituicao = $data_substituicao;
            return $this;
        }

        /**
         * Get the value of latitude
         */
        public function getLatitude(){
            return $this->latitude;
        }

        /**
         * Set the value of latitude
         */
        public function setLatitude($latitude): self{
            $this->latitude = $latitude;
            return $this;
        }

        /**
         * Get the value of longitude
         */
        public function getLongitude(){
            return $this->longitude;
        }

        /**
         * Set the value of longitude
         */
        public function setLongitude($longitude): self{
            $this->longitude = $longitude;
            return $this;
        }

        /**
         * Get the value of Usuario
         */
        public function getUsuario(){
            return $this->usuario;
        }

        /**
         * Set the value of Usuario
         */
        public function setUsuario($usuario): self{
            $this->usuario = $usuario;
            return $this;
        }
    }
?>