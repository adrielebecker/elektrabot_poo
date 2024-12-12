<?php
    require_once("../classes/autoload.php");

    $estados = [
        "AC" => "Acre",
        "AL" => "Alagoas",
        "AP" => "Amapá",
        "AM" => "Amazonas",
        "BA" => "Bahia",
        "CE" => "Ceará",
        "DF" => "Distrito Federal",
        "ES" => "Espirito Santo",
        "GO" => "Goiás",
        "MA" => "Maranhão",
        "MT" => "Mato Grosso",
        "MS" => "Mato Grosso do Sul",
        "MG" => "Minas Gerais",
        "PA" => "Pará",
        "PB" => "Paraíba",
        "PR" => "Paraná",
        "PE" => "Pernambuco",
        "PI" => "Piauí",
        "RJ" => "Rio de Janeiro",
        "RN" => "Rio Grande do Norte",
        "RS" => "Rio Grande do Sul",
        "RO" => "Rondônia",
        "RR" => "Rorraima",
        "SC" => "Santa Catarina",
        "SP" => "São Paulo",
        "SE" => "Sergipe",
        "TO" => "Tocantins",
        "EX" => "Estrangeiro"
    ];
    
    $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : 0;
    if($id_usuario > 0){
        $usuario = Usuario::listar(1, $id_usuario)[0];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

        try {
            $permissao = Permissao::listar(1, $permissao)[0];
            $usuario = new Usuario($id_usuario, $nome, $data_nasc, $sexo, $cpf, $celular, $email, $cep, $estado, $cidade, $bairro, $rua, $complemento, $numero, $senha, $permissao);

            echo "<pre>";
            var_dump($usuario->getEmail());
            echo "</pre>";

            if($acao == 'salvar'){
                if($id_usuario > 0){
                    $usuario->alterar();
                } else{
                    $usuario->inserir();
                }
            } elseif($acao == 'excluir'){
                $usuario->excluir();
            }
        } catch (Exception $e) {
            echo "erro: ".$e->getMessage();
        }
    } else if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $tipo_usuario = isset($_GET['tipo_usuario']) ? $_GET['tipo_usuario'] : 0;
        $busca_usuario = isset($_GET['busca_usuario']) ? $_GET['busca_usuario'] : "";
        $lista_usuario = Usuario::listar($tipo_usuario, $busca_usuario);
    }
?>  