<!DOCTYPE html>
<?php
    // require_once('../login/validalogin.php');
    include "acao_usuario.php";
    require_once("../classes/autoload.php");
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="acao_usuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?=isset($usuario) ? $usuario->getIdUsuario() : 0?>">
        
        <label for="nome">Nome Completo:</label>
        <input type="text" name="nome" id="nome" value="<?=isset($usuario) ? $usuario->getNome() : ""?>">
        
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" name="data_nasc" id="data_nasc" value="<?=isset($usuario) ? $usuario->getDataNasc() : ""?>">
        
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" id="sexo" value="F" <?php if(isset($usuario)) if($usuario->getSexo() == "F") echo "checked"; else ""?>> Feminino
        <input type="radio" name="sexo" id="sexo" value="M" <?php if(isset($usuario)) if($usuario->getSexo() == "M") echo "checked"; else ""?>> Masculino
        <input type="radio" name="sexo" id="sexo" value="O" <?php if(isset($usuario)) if($usuario->getSexo() == "O") echo "checked"; else ""?>> Outro
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?=isset($usuario) ? $usuario->getCpf() : ""?>">
        
        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" value="<?=isset($usuario) ? $usuario->getCelular() : ""?>">
        
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?=isset($usuario) ? $usuario->getEmail() : ""?>">
        
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" value="<?=isset($usuario) ? $usuario->getCep() : ""?>">
        
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" class="form-select border-success text-center">
            <option value="">Selecione um estado...</option>
            <?php
                foreach ($estados as $sigla => $estado) {
                    $str = "<option value='{$sigla}' ";
                    if(isset($usuario)) 
                        if ($usuario->getEstado() == $sigla) 
                            $str .= " selected ";
                    $str .= ">{$estado}</option>";
                    echo $str;
                }
            ?>
        </select>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?=isset($usuario) ? $usuario->getCidade() : ""?>">
        
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" id="bairro" value="<?=isset($usuario) ? $usuario->getBairro() : ""?>">
        
        <label for="rua">Rua:</label>
        <input type="text" name="rua" id="rua" value="<?=isset($usuario) ? $usuario->getRua() : ""?>">
        
        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" id="complemento" value="<?=isset($usuario) ? $usuario->getComplemento() : ""?>">
        
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" value="<?=isset($usuario) ? $usuario->getNumero() : ""?>">
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?=isset($usuario) ? $usuario->getSenha() : ""?>">
        
        <label for="confirma">Confirme a sua senha:</label>
        <input type="password" name="confirma" id="confirma">
        
        <label for="permissao">Nivel Permissão:</label>
        <select name="permissao" id="permissao">
            <option value="0">Selecione uma opção</option>
            <?php   
                $permissoes = Permissao::listar();
                foreach($permissoes as $permissao){ 
                    $str = "<option value='{$permissao->getIdPermissao()}' ";
                    if(isset($usuario)) 
                        if ($usuario->getNivelPermissao()->getIdPermissao() == $permissao->getIdPermissao()) 
                            $str .= " selected ";
                    $str .= ">{$permissao->getDescricao()}</option>";
                    echo $str;
                }     
            ?>       
        </select>
        <button type="submit" name="acao" id="acao" value="salvar">Salvar</button>
        <button type="submit" name="acao" id="acao" value="excluir">Excluir</button>
    </form>

    <table class="table table-hover border align-middle table-bordered">
            <tr class="table-dark">
                <th>Id</th>
                <th>sexo</th>
                <th>cpf</th>
                <th>Estado</th>
                <th>permissao</th>
                <th>Alterar</th>
            </tr>    
    
            <?php
                foreach($lista_usuario as $usuario){
                    echo "<tr>
                        <td>{$usuario->getIdUsuario()}</td>
                        <td>{$usuario->getSexo()}</td>
                        <td>{$usuario->getCpf()}</td>
                        <td>{$usuario->getEstado()}</td>
                        <td>{$usuario->getNivelPermissao()->getDescricao()}</td>
                        <td><a href='cadastro.php?id_usuario={$usuario->getIdUsuario()}'>Alterar</a></td>
                    </tr>";
                }
            ?>
        </table>
</body>
</html>