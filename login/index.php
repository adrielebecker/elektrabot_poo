<!DOCTYPE html>
<?php
    require_once('../classes/autoload.php');
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include '../link/link_pasta.html'; ?>
</head>
<body>
    <nav class="navbar navbar-expand-sm border-bottom border-success sticky-top bg-white">
        <a href="../index.php#home" class="nav-link ms-2"><img src="../img/logo/logo-nav.png" alt="logo da elektrabot" width="80%"></a>
        <div class="col-5"></div>
        <ul class="navbar-nav justify-content-end mb-2">
            <li class="nav-item ms-3">
                <a href="../index.php#sobre" class="nav-link">SOBRE</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="../index.php#desenvolvedores" class="nav-link">DESENVOLVEDORES</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="../index.php#contato" class="nav-link">CONTATO</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="index.php" class="nav-link">LOGIN</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="../usuario/cadastro.php" class="nav-link">CADASTRO</a> 
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4 mt-5">
                <br><br>
                <img src="../img/login/eletricista.png" alt="" width="60%">
            </div>
            <div class="col-1"></div>
            <div class="col-6 card-login">
                <br><br><br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h4 class="titulo verde text-center">LOGIN</h4>
                    </div>
                </div>
                <form action="login.php" method="post">
                    <div class="row mt-3">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="email" class="form-label texto verde">E-MAIL:</label>
                            <input type="email" name="email" id="email" class="form-control border-success">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="nivel_permissao" class="form-label texto verde mt-2">NÍVEL DE PERMISSÃO:</label>
                            <select name="nivel_permissao" id="nivel_permissao" class="form-select border-success">
                                <option value="0">Selecione uma opção</option>
                                <?php   
                                    $permissoes = Permissao::listar();
                                    foreach($permissoes as $permissao){ 
                                        $str = "<option value='{$permissao->getIdPermissao()}'>{$permissao->getDescricao()}</option>";
                                        echo $str;
                                    }     
                                ?>       
                            </select>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6 ms-5">
                            <label for="senha" class="form-label texto verde mt-2">SENHA:</label>
                            <input type="password" name="senha" id="senha" class="form-control border-success">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-5"></div>
                        <div class="col-2 ms-2">
                            <button class="btn secundario border-success" type="submit" name="acao" id="acao" value="entrar">Entrar</button>
                        </div>
                    </div>
                    <div class="row mt-2 me-2">
                        <a href="../usuario/cadastro.php" class="text-end text-success">Cadastrar</a>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
    <script language="javascript">
        var cadastro = <?=$cadastro;?>;
        if(cadastro == true){
            alert("Cadastro efetuado com sucesso!");
            window.location.href = 'login.php';
        }
    </script>
    <script>
        var excluido = <?=$excluido?>;
        if(excluido == true){
            alert("A conta foi excluída com sucesso!");
            window.location.href = 'login.php';
        }
    </script>
    <script>
        var incorreto = <?=$incorreto?>;
        if(incorreto == true){
            alert("Usuário ou senha incorretos!");
            window.location.href = 'login.php';
        }
    </script>
</body>
</html>