<?php

    require_once "../vendor/autoload.php";

    $a = new Usuarios();

    session_start();

    if($_SESSION["logado"] == "logar")
    {
        $a->deslogarUsuarios();
    }
