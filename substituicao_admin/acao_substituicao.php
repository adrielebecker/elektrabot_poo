<?php
    require_once("../classes/autoload.php");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id_substituicao = isset($_GET['id_substituicao']) ? $_GET['id_substituicao'] : 0;
        
        if ($id_substituicao > 0) {
            $substituicao = SubstituicaoAdmin::listar(1, $id_substituicao)[0];
            if (!$substituicao) {
                echo "Substituição não encontrada!";
            }
        }
    
        $tipo_substituicao = isset($_GET['tipo_substituicao']) ? $_GET['tipo_substituicao'] : 0;
        $busca_substituicao = isset($_GET['busca_substituicao']) ? $_GET['busca_substituicao'] : "";
        $lista_substituicao = SubstituicaoAdmin::listar($tipo_substituicao, $busca_substituicao);
    } 
    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_substituicao = isset($_POST['id_substituicao']) ? $_POST['id_substituicao'] : 0;
        $data_substituicao = isset($_POST['data_substituicao']) ? $_POST['data_substituicao'] : "";
        $latitude = isset($_POST['lat']) ? $_POST['lat'] : "";
        $longitude = isset($_POST['log']) ? $_POST['log'] : "";
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        try {
            $substituicao = new SubstituicaoAdmin($id_substituicao, $data_substituicao, $latitude, $longitude, $usuario);
            if($acao == "salvar"){
                if($id_substituicao > 0){
                    $substituicao->alterar();
                } else {
                    $substituicao->inserir();
                }
            } else if($acao == "excluir"){
                $substituicao->excluir();
            }
        } catch (Exception $e) {
            echo "Erro: ".$e->getMessage();
        }   
    } 
?>