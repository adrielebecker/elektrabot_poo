<?php
    require_once("../classes/autoload.php");

    // var_dump($_POST);
    $id_permissao = isset($_GET['id_permissao']) ? $_GET['id_permissao'] : 0;
    if($id_permissao > 0){
        $permissao = Permissao::listar(1, $id_permissao)[0];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_permissao = isset($_POST['id_permissao']) ? $_POST['id_permissao'] : 0;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        try {
            $permissao = new Permissao($id_permissao, $descricao);
            if($acao == 'salvar'){
                if($id_permissao > 0){
                    $permissao->alterar();
                } else{
                    $permissao->inserir();
                }
            } elseif($acao == 'excluir'){
                $permissao->excluir();
            }
            header('Location: cadastro.php');
        } catch (\Throwable $th) {
            //throw $th;
        }
    } elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
        $tipo_permissao = isset($_GET['tipo_permissao']) ? $_GET['tipo_permissao'] : 0;
        $busca_permissao = isset($_GET['busca_permissao']) ? $_GET['busca_permissao'] : "";
        $lista_permissao = Permissao::listar($tipo_permissao, $busca_permissao);
    }
?>