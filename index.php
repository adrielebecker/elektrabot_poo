<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <?php include 'link/link.html';?>
</head>
<body>
    <nav class="navbar navbar-expand-sm border-bottom border-success sticky-top bg-white">
        <a href="index.php#home" class="nav-link ms-2"><img src="img/logo/logo-nav.png" alt="logo da elektrabot" width="80%"></a>
        <div class="col-5"></div>
        <ul class="navbar-nav justify-content-end mb-2">
            <li class="nav-item ms-3">
                <a href="index.php#sobre" class="nav-link">SOBRE</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="index.php#desenvolvedores" class="nav-link">DESENVOLVEDORES</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="index.php#contato" class="nav-link">CONTATO</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="login/index.php" class="nav-link">LOGIN</a> 
            </li>
            <li class="nav-item ms-3">
                <a href="usuario/cadastro.php" class="nav-link">CADASTRO</a> 
            </li>
        </ul>
    </nav>

    <section id="home">
        <div class="container mt-5">
            <figure>
                <img src="img/logo/logo-grande.png" alt="logo da elektrabot" width="90%">
            </figure>
        </div>
    </section>

    <section id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-5 ms-4">
                    <div class="row text-center mt-4">
                        <h3 class="titulo branco sobre-margin">SOBRE A ELEKTRABOT</h3>
                    </div>
                    <div class="row text-center mt-4">
                        <p class="texto branco sobre-tam">O principal objetivo deste projeto
                            é desenvolver um robô capaz de aumentar a segurança dos eletricistas 
                            durante o processo de substituição de medidores de energia elétrica, 
                            minimizando os riscos de acidentes. <br>
                            O trabalho foi desenvolvido na disciplina de Prática
                            Profissionalizante Orientada, interno ao Instituito
                            Federal Catarinense - Campus Rio do Sul.
                        </p>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-4 mt-5">
                    <img src="img/sobre/sobre-img.png" alt="imagem ilustrativa de eletricista" width="150%">
                </div>
                <div class="row mt-5">
                    <img src="img/sobre/raios.png" alt="raios decorativos" width="100%">
                </div> 
            </div>
            <br><br>
        </div>
    </section>

    <section id="desenvolvedores">
        <div class="container mt-5">
            <br><br>
            <div class="row">
                <h3 class="titulo verde mt-5">DESENVOLVEDORAS</h3>
            </div>

            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="card border-light" style="width: 20rem;">
                    <img src="img/desenvolvedores/img-adriele.png" class="card-img-top" alt="Adriele Becker desenvolvedora">
                    <div class="card-body">
                        <h5 class="card-title text-center"><b>ADRIELE BECKER</b></h5>
                        <p class="card-text text-center texto">
                            Estudante do Curso Técnico em Informática para Internet, no IFC, <i>campus</i> Rio do Sul. <br>
                            17 anos. <br>
                            Braço do Trombudo, SC.
                        </p>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="card border-light" style="width: 20rem;">
                    <img src="img/desenvolvedores/img-camilly.png" class="card-img-top" alt="Camilly Vitoria desenvolvedora">
                    <div class="card-body">
                        <h5 class="card-title text-center"><b>CAMILLY VITÓRIA ALMEIDA DOS SANTOS</b></h5>
                        <p class="card-text text-center texto">
                            Estudante do Curso Técnico em Informática para Internet, no IFC, <i>campus</i> Rio do Sul. <br>
                            18 anos. <br>
                            Rio do Sul, SC.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <section id="contato">
        <br>
        <div class="container">
            <div class="row mt-3">
                <h3 class="titulo branco">INFORMAÇÕES DE CONTATO</h3>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <h6 class="branco text-center titulo">Adriele Becker</h6>
                    <p class="branco text-center texto mt-4">
                        E-mail: 
                        <a href="mailto:adrielebecker14@gmail.com" class="link branco">adrielebecker14@gmail.com</a>
                    </p>
                    <p class="branco text-center texto">
                        Instagram: 
                        <a href="https://www.instagram.com/adriele_becker14/" class="link branco">@adriele_becker14</a>
                    </p>
                </div>
                <div class="col-4">
                    <h6 class="branco text-center titulo">Camilly Vitória</h6>
                    <p class="branco text-center texto mt-4">
                        E-mail: 
                        <a href="mailto:almeidacamillyvitoria398@gmail.com" class="link branco">almeidacamillyvitoria398@gmail.com</a>
                    </p>
                    <p class="branco text-center texto">
                        Instagram: 
                        <a href="https://www.instagram.com/camilly_vitoriax/" class="link branco">@camilly_vitoriax</a>
                    </p>
                </div>
                <div class="col-4">
                    <h6 class="branco text-center titulo">ElektraBot</h6>
                    <p class="branco text-center texto mt-4">
                        E-mail: 
                        <a href="mailto:elektrabotifc@gmail.com" class="link branco">elektrabotifc@gmail.com</a>
                    </p>
                    <p class="branco text-center texto">
                        Instagram: 
                        <a href="https://www.instagram.com/elektrabot_ifc/" class="link branco">@elektrabot_ifc</a>
                    </p>
                </div>
            </div>
        </div>
        <br>
    </section>
    <br><br>

    <div class="container mt-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-3">
            <img src="img/logo/logo-nav.png" alt="">
        </div>
        <div class="col-2"></div>
        <div class="col-3">
            <img src="img/logo/logoIf.png" alt="" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col-1 ms-5"></div>
        <div class="col-9">
            <p class="copyright text-center">Copyright ©2023 Todos os direitos reservados a ElektraBot 
                | Institituto Federal Catarinenese - Campus Rio do Sul 
            </p>
        </div>
    </div>
</div>  
</body>
</html>