<!DOCTYPE html>
<?php
    include "acao_substituicao.php";
    require_once("../classes/autoload.php");
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de substituições</title>
</head>
<body>
    <form action="acao_substituicao.php" method="post">
        <input type="hidden" name="id_substituicao" id="id_substituicao" value="<?=isset($substituicao) ? $substituicao->getIdSubstituicao() : 0?>">

        <label for="data_substituicao">Data da Substituição</label>
        <input type="date" name="data_substituicao" id="data_substituicao" value="<?=isset($substituicao) ? date('Y-m-d', strtotime($substituicao->getDataSubstituicao())) : ""?>">

        <label for="lat">Latitude:</label>
        <input type="text" name="lat" id="lat" value="<?=isset($substituicao) ? $substituicao->getLatitude() : ""?>">

        <label for="log">Longitude:</label>
        <input type="text" name="log" id="log" value="<?=isset($substituicao) ? $substituicao->getLongitude() : ""?>">

        <label for="usuario">Usuário:</label>
        <select name="usuario" id="usuario">
            <?php
                $usuarios = Usuario::listar();
                foreach($usuarios as $usuario){
                    if($usuario->getNivelPermissao()->getIdPermissao() == 2){
                        $str = "<option value='{$usuario->getIdUsuario()}' ";
                        if(isset($substituicao)){
                            if($substituicao->getUsuario()->getIdUsuario() == $usuario->getIdUsuario()){
                                $str .= " selected";
                            }
                        }
                        $str .= ">{$usuario->getNome()}</option>";
                        echo $str;

                    }
                }
            ?>
        </select>
        <button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
    </form>
    <table class="table table-hover border align-middle table-bordered">
            <tr class="table-dark">
                <th>Id</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Usuario</th>
                <th>permissao</th>
                <th>Alterar</th>
            </tr>    
    
            <?php
                foreach($lista_substituicao as $substituicao){
                    echo "<tr>
                        <td>{$substituicao->getIdSubstituicao()}</td>
                        <td>{$substituicao->getLatitude()}</td>
                        <td>{$substituicao->getLongitude()}</td>
                        <td>{$substituicao->getUsuario()->getIdUsuario()}</td>
                        <td><a href='cadastro.php?id_substituicao={$substituicao->getIdSubstituicao()}'>Alterar</a></td>
                    </tr>";
                }
            ?>
        </table>
</body>
</html>