<?php require_once "vendor/autoload.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Armazém do Pano</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para este template -->

    <link href="css/album.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Sobre</h4>
                    <p class="text-muted">Adicione alguma informação sobre o álbum abaixo (autor ou qualquer outro
                        background). Faça essas informações terem algumas frases, para a galera ter algumas informações
                        que besliscar. Além disso, use link nelas para as redes sociais ou informações de contato.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contato</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Me siga no Twitter</a></li>
                        <li><a href="#" class="text-white">Curta no Facebook</a></li>
                        <li><a href="#" class="text-white">Me envie um e-mail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>Seja bem vinda(o) ....</strong>
            </a>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Empresa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contato">Contato</a>
        </li>
    </ul>
</header>

<main role="main">

    <section class="jumbotron text-center"
             style="background-image:url(https://images.pexels.com/photos/1057313/pexels-photo-1057313.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
        <div class="container">
            <h1 class="jumbotron-heading" style="color:#fff;">Galeria de Produtos</h1>
            <p class="lead" style="color:#fff;">Aqui você encontra peças diferenciadas que podem ser customizadas e com
                preço adaptável! Brinque e se divirta! Dê um lance e veja se consegue levar para a sua casa a peça!</p>
            <p>
                <a href="#" class="btn btn-secondary my-2">Dê um lance</a>
                <a href="#" class="btn btn-secondary my-2">Veja sua mala de compras</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">

                    <div class="col-md-12">
                        <h2>Enviar email</h2><br>

                        <form method="post" action="esqueci.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Assunto</label>
                                <input type="text" name="assunto" class="form-control" id="exampleInputPassword1" placeholder="Assunto">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mensagem:</label>
                                <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Voltar ao topo</a>
        </p>
        <p>Este é o site de compras da Loja Virtual Armazém do Pano, onde você pode customizar as suas roupas e oferecer
            lances para um leilão.</p>

    </div>
</footer>

<!-- Principal JavaScript do Bootstrap
================================================== -->
<!-- Foi colocado no final para a página carregar mais rápido -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
</body>
</html>