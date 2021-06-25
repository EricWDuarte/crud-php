<?php

require_once "../vendor/autoload.php";

$a = new Produto();
$b = new Usuarios();

$objfn = new Funcoes();

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
        header("Location: https://contosdecontos.com.br/front/eric/php/sistema/produtos.php");
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
