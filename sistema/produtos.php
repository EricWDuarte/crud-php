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
            require_once "acoes/acoesProduto.php";

            $a = new Produto();
            $b = new Usuarios();

    ?>


    <div class="container">
        <?php require_once "Includes/menu.php"; ?>
        <h2>Cadastro de Produto</h2>

        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do produto:</label>
                <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Produto">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Preço do produto:</label>
                <input type="text" name="preco" class="form-control" id="exampleFormControlInput1" placeholder="Preço">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Categoria:</label>
                <select class="form-control" name="categoria" id="categoria">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem do produto:</label>
                <input type="file" class="form-control-file" name="foto" id="foto">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem:</label>
                <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="btCadastrar" class="btn btn-primary">Cadastrar produto</button>
        </form>
            <table class="table" style="margin-top: 30px">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Mensagem</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>

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
                        <td><?php echo $rst["nome"]; ?></td>
                        <td><?php echo $rst["preco"]; ?></td>
                        <td><?php echo $rst["categoria"]; ?></td>
                        <td><?php echo "<img width='100' src='Controller/imagem/" . $rst["foto"] . "' />" ?></td>
                        <td><?php echo $rst["mensagem"]; ?></td>
                        <td><a class="btn btn-info" href="?acao=edit&func=<?= $objfn->base64($rst["id"], 1) ?>">Editar</a></td>
                        <td><a class="btn btn-danger" href="?acao=delete&func=<?= $objfn->base64($rst["id"], 1) ?>">Deletar</a></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        <?php require_once "Includes/rodape.php"; ?>
    </div>

</body>
</html>