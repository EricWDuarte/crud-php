<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<?php
    require_once "../vendor/autoload.php";

    $a = new Usuarios();

    session_start();
    if($_SESSION["logado"] == "logar")
    {
        $a->verificaLogado($_SESSION["func"]);
    }
    else
    {
        header("Location: https://contosdecontos.com.br/front/eric/php/");
    }

?>

<form>
    <div class="container">
        <?php require_once "Includes/menu.php"; ?>
        <h2>Olá <?php echo $_SESSION["nome"] ?></h2>
        <?php require_once "Includes/rodape.php"; ?>
    </div>
</form>

</body>
</html>