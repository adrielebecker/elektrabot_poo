<!DOCTYPE html>
<?php
    include 'acao_permissao.php';
    require_once("../classes/autoload.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de níveis de permissão</title>
</head>
<body>
    <form action="acao_permissao.php" method="post">
        <input type="hidden" name="id_permissao" value="<?=isset($permissao) ? $permissao->getIdPermissao() : 0?>">
        <label for="descricao">Nivel de permissão:</label> 
        <input type="text" name="descricao" id="descricao" value="<?=isset($permissao) ? $permissao->getDescricao() : ""?>">
        <button type="submit" name="acao" id="acao" value="salvar">Salvar</butt on>
        <button type="submit" name="acao" id="acao" value="excluir">Excluir</button>
    </form>

    <br><br>

    <div class="container mt-5 text-center">
        <table class="table table-hover border align-middle table-bordered">
            <tr class="table-dark">
                <th>Id</th>
                <th>Descrição</th>
                <th>Alterar</th>
            </tr>    
    
            <?php
                foreach($lista_permissao as $permissao){
                    echo "<tr>
                        <td>{$permissao->getIdPermissao()}</td>
                        <td>{$permissao->getDescricao()}</td>
                        <td><a href='cadastro.php?id_permissao={$permissao->getIdPermissao()}'>Alterar</a></td>
                    </tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>