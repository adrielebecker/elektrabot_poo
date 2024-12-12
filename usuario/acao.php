<?php
session_start();
require_once("../classes/autoload.php");
require_once("../config/config.inc.php");


if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
    $id_usuario =  isset($_GET['id_usuario'])?$_GET['id_usuario']:0;

    $formulario = file_get_contents('templates/cadastro.html');

    if ($id_usuario > 0){
        $usuario = Usuario::listar(1,$id_usuario)[0];
        $formulario = str_replace('{id_usuario}',$usuario->getIdUsuario(),$formulario); 
        $formulario = str_replace('{nome}',$usuario->getNome(),$formulario); 
        $formulario = str_replace('{data_nasc}',$usuario->getDataNasc(),$formulario); 
        $formulario = str_replace('{cpf}',$usuario->getCpf(),$formulario); 
        $formulario = str_replace('{celular}',$usuario->getCelular(),$formulario); 
        $formulario = str_replace('{email}',$usuario->getEmail(),$formulario); 
        $formulario = str_replace('{cep}',$usuario->getCep(),$formulario); 
        $formulario = str_replace('{estado}',$usuario->getEstado(),$formulario); 
        $formulario = str_replace('{cidade}',$usuario->getCidade(),$formulario); 
        $formulario = str_replace('{bairro}',$usuario->getBairro(),$formulario); 
        $formulario = str_replace('{rua}',$usuario->getRua(),$formulario); 
        $formulario = str_replace('{complemento}',$usuario->getComplemento(),$formulario); 
        $formulario = str_replace('{numero}',$usuario->getNumero(),$formulario); 
        $formulario = str_replace('{senha}',$usuario->getSenha(),$formulario); 
    } else{
        $formulario = str_replace('{id_usuario}','0',$formulario); 
        $formulario = str_replace('{nome}','',$formulario); 
        $formulario = str_replace('{data_nasc}','',$formulario); 
        $formulario = str_replace('{cpf}','',$formulario); 
        $formulario = str_replace('{celular}','',$formulario); 
        $formulario = str_replace('{email}','',$formulario); 
        $formulario = str_replace('{cep}','',$formulario); 
        $formulario = str_replace('{estado}','',$formulario); 
        $formulario = str_replace('{cidade}','',$formulario); 
        $formulario = str_replace('{bairro}','',$formulario); 
        $formulario = str_replace('{rua}','',$formulario); 
        $formulario = str_replace('{complemento}','',$formulario); 
        $formulario = str_replace('{numero}','',$formulario); 
        $formulario = str_replace('{senha}','',$formulario); 
    }
    
    print($formulario);
    // include "listaunidades.php";
    
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : 0;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : "";
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $celular = isset($_POST['celular']) ? $_POST['celular'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
    $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : "";
    $rua = isset($_POST['rua']) ? $_POST['rua'] : "";
    $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : "";
    $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $confirma = isset($_POST['confirma']) ? $_POST['confirma'] : "";
    $permissao = isset($_POST['permissao']) ? $_POST['permissao'] : "";
    $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; 
    
    try{
        $permissao = Permissao::listar(1, $permissao)[0];
        $usuario = new Usuario($id_usuario, $nome, $data_nasc, $sexo, $cpf, $celular, $email, $cep, $estado, $cidade, $bairro, $rua, $complemento, $numero, $senha, $permissao);
    
        if($acao == 'salvar'){
            if($id_usuario > 0)
                $usuario->alterar();
            else                     
                $usuario->inserir();
        } elseif ($acao == 'excluir'){
           $usuario->excluir();
        }
        $_SESSION['MSG'] = "Dados inseridos/Alterados com sucesso!";
    }catch(Exception $e){ 
        $_SESSION['MSG'] = 'ERRO: '.$e->getMessage();
    }finally{
        header('Location: index.php'); 
    }
}