<!DOCTYPE html>
<?php
    session_start();
    $nome = explode(" ", $_SESSION['nome']);
    // var_dump($nome);
    if($_SESSION['sexo'] == "F"){
        $pagina = "Bem Vinda, ".ucWords($nome[0])."!";
    } else{
        $pagina = "Bem Vindo, ".ucWords($nome[0])."!";
    }
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <?php include "../link/link_pasta.html";?>
    <!-- <link rel="stylesheet" href="../css/estilo.css"> -->
</head>
<body>
    <nav class="navbar border-bottom border-success sticky-top bg-white">
        <div class="container-fluid">
            <div class="col-2">
                <a href="../index.php" class="nav-link ms-2"><img src="../img/logo/logo-nav.png" alt="logo da elektrabot" width="100%"></a>
            </div>
            <div class="col-8 mt-4 text-center">
                <p class="texto verde fs-5"><?= $pagina ?></p>
            </div>
            <div class="col-1"></div>
            <div class="col-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header border-bottom border-success mt-2">
                        <h4 class="titulo ms-5 mt-1">O que você deseja?</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>MINHA CONTA</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>GRAVAÇÕES</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>RELATÓRIOS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>DESIGNAR SUBSTITUIÇÕES</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>VISUALIZAR SUBSTITUIÇÕES</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>ELETRICISTAS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mt-4 text-white" aria-current="page" href=""><b>PÁGINA INICIAL</b></a>
                        </li>
                        <li class="nav-item">
                            <a href="../login/login.php?acao=sair" class="btn text-white texto" name="acao" id="acao">Logoff</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <img src="../img/logo/logo-grande.png" alt="" width="100%">
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <a href="../substituicao/cadastro-substituicao.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/designar.png" alt="designar" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">Designar Substituição</h5>
                            <p class="texto branco text-center sobre-tam mt-3 mb-2">
                                O gerente pode designar um ou mais eletricistas a uma substituição e adicionar mais 
                                informações sobre a mesma.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="../gravacao/gravacao-gerente.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/gravacoes.png" alt="gravações" width="50%" class="rounded mx-auto d-block">
                        <div class="card-body">
                            <h5 class="titulo branco text-center">GRAVAÇÕES</h5>
                            <p class="texto branco text-center sobre-tam mt-4 mb-3">
                                Esta funcionalidade armazena todos os procedimentos feitos em tempo real <br>
                                As gravações podem ser visualizadas pelo gerente.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="../relatorio/relatorios-gerente.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/relatorio.png" alt="Relatórios" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center mt-2">RELATÓRIOS</h5>
                            <p class="texto branco text-center sobre-tam mt-4">
                                O gerente pode visualizar os relatórios criados pelos eletricistas. <br>
                                É permitido que o gerente adicione comentários sobre o procedimento.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="../substituicao/substituicoes-gerente.php" class="link">
                    <div class="card secundario border-success rounded-4">
                        <img src="../img/icones/medidor-eletrico.png" alt="notificações" width="40%" class="rounded mx-auto d-block mt-3">
                        <div class="card-body">
                            <h5 class="titulo branco text-center mt-2">SUBSTITUIÇÕES</h5>
                            <p class="texto branco text-center sobre-tam mt-4">
                                Todas as substituições, concluídas ou pendentes, poderam ser visualizadas nesta página. Além disso, o gerente pode editar ou excluir substituições.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <br><br><br><br>
    </div>
    <?php include "footer.html";?>
</body>
</html>