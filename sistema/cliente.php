<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="Includes/ValidarCliente.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>


</head>
<body>

<?php
require_once "../vendor/autoload.php";
require_once  "acoes/acoesCliente.php";

$a = new Cliente();
$objfn = new Funcoes();
$b = new Usuarios();

?>

<div class="container">
    <?php require_once "Includes/menu.php"; ?>
    <h2>Cadastro cliente</h2>

    <form method="post" action="" autocomplete="off" onsubmit="return validarCampos() ? true : false">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do cliente:</label>
            <input type="text" name="nome" class="form-control" id="nome"
                   value="<?= (isset($func["nome"]) ? ($func["nome"]) : ("")) ?>" placeholder="cliente">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Estado:</label>
            <select class="form-control" name="estado" id="estado">
                <?php
                foreach ($a->selecionaEstado() as $rst) { ?>
                    <option value="<?php echo $rst["id"] ?>" <?= ((isset($func["estado"])) && ($func["estado"] == $rst["id"]) ? (" selected") : ("")) ?> >
                        <?php echo $rst["estado"]; ?>
                    </option>;
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="mensagem"
                      rows="3"><?= (isset($func["mensagem"]) ? ($func["mensagem"]) : ("")) ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary"
               name="<?= (isset($_GET["acao"]) == "edit" ? ("btAlterar") : ("btCadastrar")) ?>"
               value="<?= (isset($_GET["acao"]) == "edit" ? ("Alterar") : ("Cadastrar")) ?>">
        <input type="hidden" name="func" value="<?= (isset($func["id"]) ? $objfn->base64($func["id"], 1) : " ") ?>">
    </form>

    <table class="table" style="margin-top: 30px">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Estado</th>
            <th scope="col">Mensagem</th>
            <th scope="col">Editar</th>
            <th scope="col">Deletar</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $contagem = 1;
        foreach ($a->querySeleciona() as $rst) {
            ?>
            <tr>
                <th scope="row"><?php echo $contagem++ ?></th>
                <td><?php echo $rst["nome"]; ?></td>
                <td><?php echo $rst["estado"]; ?></td>
                <td><?php echo $rst["mensagem"]; ?></td>
                <td><a class="btn btn-info" href="?acao=edit&func=<?= $objfn->base64($rst["id"], 1) ?>">Editar</a></td>
                <td><a class="btn btn-danger" href="?acao=delete&func=<?= $objfn->base64($rst["id"], 1) ?>">Deletar</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

    <?php require_once "Includes/rodape.php"; ?>
</div>

</body>
</html>