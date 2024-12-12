<?php
    require_once('../classes/autoload.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $permissao = isset($_POST['nivel_permissao']) ? $_POST['nivel_permissao'] : "";

        try{
            $permissao = Permissao::listar(1, $permissao)[0];
            $login = Login::efetuarLogin($email, $senha, $permissao);

            var_dump($login);
            session_start();
            $_SESSION['id_usuario'] = $login->getNivelPermissao()->getIdPermissao();
            $_SESSION['nome'] = $login->getNome();
            $_SESSION['sexo'] = $login->getSexo();

            if($login->getNivelPermissao()->getIdPermissao() == '1'){
                header('Location: ../inicio/index_administrador.php');
            } else if($login->getNivelPermissao()->getIdPermissao() == '2'){
                header('Location: ../inicio/index_eletricista.php');
            }
        } catch(Exception $e){ 
           echo "Erro ao efetuar login: ".$e->getMessage();
        }
    } else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        
        if($acao == 'sair'){
            session_start();
            session_destroy();
            header('Location: index.php');
        }
    }
?>