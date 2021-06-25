<?php

require_once "../vendor/autoload.php";

$a = new Usuarios();
$objfn = new Funcoes();

session_start();
if($_SESSION["logado"] == "logar")
{
    $a->verificaLogado($_SESSION["func"]);
}
else
{
    header("Location: https://contosdecontos.com.br/front/eric/php/");
}

if (isset($_POST["btCadastrar"])) {
    if ($a->queryInsert($_POST) == "OK") {
        header("location: https://contosdecontos.com.br/front/eric/php/sistema/usuarios.php");
    } else {
        echo "ndeu insert";
    }
} else {
    //echo "Não clicou no botão cadastrar";
}

if (isset($_POST["btAlterar"])) {
    if ($a->queryUpdate($_POST) == "OK") {
        header("Location: ?acao=edit?func" . $objfn->base64($_POST["func"], 1));
    } else {
        echo "Erro ao editar";
    }
}

if (isset($_GET["acao"])) {
    switch ($_GET["acao"])
    {
        case "edit":
            $func = $a->querySelecionaId($_GET["func"]);
            break;
        case "delete":
            if ($a->queryDelete($_GET["func"]) == "OK")
            {
                header("location: https://contosdecontos.com.br/front/eric/php/sistema/usuarios.php");
            }
            else
            {
                echo "Erro ao deletar";
            }
            break;
    }
}
