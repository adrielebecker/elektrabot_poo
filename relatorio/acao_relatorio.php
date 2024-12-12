<?php
    require_once('../classes/autoload.php');

    $id_relatorio = isset($_GET['id_relatorio']) ? $_GET['id_relatorio'] : 0;
    if($id_relatorio > 0){
        $relatorio = Relatorio::listar(1, $id_relatorio)[0];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_relatorio = isset($_POST['id_relatorio']) ? $_POST['id_relatorio'] : 0;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
        $cod_antigo = isset($_POST['cod_antigo']) ? $_POST['cod_antigo'] : "";
        $cod_novo = isset($_POST['cod_novo']) ? $_POST['cod_novo'] : "";
        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
        $acidente = isset($_POST['acidente']) ? $_POST['acidente'] : "";
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        try{
            $relatorio = new Relatorio($id_relatorio, $descricao, $cod_antigo, $cod_novo, $tipo, $acidente);
            if($acao == 'salvar'){
                if($id_relatorio > 0){
                    $relatorio->alterar();
                } else{
                    $relatorio->inserir();
                }
            } else if($acao == 'excluir'){
                $relatorio->excluir();
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    } else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $tipo_relatorio = isset($_GET['tipo_relatorio']) ? $_GET['tipo_relatorio'] : 0;
        $busca_relatorio = isset($_GET['busca_relatorio']) ? $_GET['busca_relatorio'] : "";
        $lista_relatorio = Relatorio::listar($tipo_relatorio, $busca_relatorio);
    }
?>