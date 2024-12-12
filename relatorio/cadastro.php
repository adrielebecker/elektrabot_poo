<!DOCTYPE html>
<?php
    include "acao_relatorio.php";
    require_once("../classes/autoload.php");
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Relatório</title>
</head>
<body>
    <form action="acao_relatorio.php" method="post">
        <input type="hidden" name="id_relatorio" id="id_relatorio" value="<?=isset($relatorio) ? $relatorio->getIdRelatorio() : ""?>">

        <label for="descricao">Informações importantes sobre a troca:</label>
        <textarea name="descricao" id="descricao"><?=isset($relatorio) ? $relatorio->getDescricao() : ""?>
        </textarea>

        <label for="cod_antigo">Código Antigo:</label>
        <input type="text" name="cod_antigo" id="cod_antigo" value="<?=isset($relatorio) ? $relatorio->getCodAntigo() : ""?>">

        <label for="cod_novo">Código Novo:</label>
        <input type="text" name="cod_novo" id="cod_novo" value="<?=isset($relatorio) ? $relatorio->getCodNovo() : ""?>">

        <label for="tipo">Tipo do Medidor:</label>
        <input type="radio" name="tipo" id="tipo" value="M" <?php if(isset($relatorio)) if($relatorio->getTipo() == "M") echo "checked"; else ""?>> Monofásico
        <input type="radio" name="tipo" id="tipo" value="B" <?php if(isset($relatorio)) if($relatorio->getTipo() == "B") echo "checked"; else ""?>> Bifásico
        <input type="radio" name="tipo" id="tipo" value="T" <?php if(isset($relatorio)) if($relatorio->getTipo() == "T") echo "checked"; else ""?>> Trifásico

        <label for="acidente">Aconteceu algum acidente?</label>
        <input type="radio" name="acidente" id="acidente" value="S" <?php if(isset($relatorio)) if($relatorio->getAcidente() == "S") echo "checked"; else ""?>> Sim
        <input type="radio" name="acidente" id="acidente" value="N" <?php if(isset($relatorio)) if($relatorio->getAcidente() == "N") echo "checked"; else ""?>> Não

        <button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
        <button name="acao" id="acao" value="excluir">Excluir</button>
    </form>


    <table border="1">
        <tr>
            <th>ID</th>
            <th>desc</th>
            <th>antigo</th>
            <th>novo</th>
            <th>tipo</th>
            <th>acidente</th>
        </tr>

        <tr>
            <?php
                foreach($lista_relatorio as $relatorio){
                    echo "<tr>
                        <td>{$relatorio->getIdRelatorio()}</td>
                        <td>{$relatorio->getDescricao()}</td>
                        <td>{$relatorio->getCodAntigo()}</td>
                        <td>{$relatorio->getCodNovo()}</td>
                        <td>{$relatorio->getTipo()}</td>
                        <td>{$relatorio->getAcidente()}</td>
                        <td><a href='cadastro.php?id_relatorio={$relatorio->getIdRelatorio()}'>Alterar</a></td>
                    </tr>";
                }
            ?>
        </tr>
    </table>
</body>
</html>