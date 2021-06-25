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

        $a = new Estado();
        $b = new Usuarios();

        session_start();
        if($_SESSION["logado"] == "logar")
        {
            $b->verificaLogado($_SESSION["func"]);
        }
        else
        {
            header("Location: https://contosdecontos.com.br/front/eric/php/");
        }

        if(isset($_POST["btCadastrar"]))
        {
            if($a->queryInsert($_POST) == "OK")
            {
                header("location: https://contosdecontos.com.br/front/eric/php/sistema/estado.php");
            }
            else
            {
                echo "ndeu insert";
            }
        }
        else
        {
            //echo "Não clicou no botão cadastrar";
        }
    ?>

    <div class="container">
        <?php require_once "Includes/menu.php"; ?>
        <h2>Cadastro cliente</h2>
        <form method="post" action="" autocomplete="off">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do estado:</label>
                <input type="text" name="estado" class="form-control" id="exampleFormControlInput1" placeholder="Estado">
            </div>
            <button type="submit" name="btCadastrar" class="btn btn-primary">Cadastrar Estado</button>
        </form>

        <table class="table" style="margin-top: 30px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome do estado</th>
                <th scope="col">Editar</th>

            </tr>
            </thead>
            <tbody>
            <?php
                $contagem = 1;
                foreach ( $a->querySeleciona() as $rst )
                {
            ?>
            <tr>
                <th scope="row"><?php echo $contagem++ ?></th>
                <td><?php echo $rst["estado"]; ?></td>
                <td><button type="button" class="btn btn-info">Editar</button></td>
            </tr>
            <?php } ?>

            </tbody>
        </table>

        <?php require_once "Includes/rodape.php"; ?>
    </div>

</body>
</html>