<?php

require_once __DIR__ . "/../../vendor/autoload.php";

class Estado {
    private $estado;

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function __construct()
    {
        $this->con = new Conexao();
        $this->objfcn = new Funcoes();
    }

    public function queryInsert($dados)
    {
        try {

            $this->estado = $dados["estado"];

            $cst = $this->con->conectar()->prepare("INSERT INTO estado (estado) VALUES(:estado)");
            $cst->bindParam(":estado",$this->estado,PDO::PARAM_STR);

            if ($cst->execute())
            {
                return "OK";
            }
            else {
                return "Não deu";
            }
        }catch (PDOException $ex)
        {
            echo $ex;
        }
    }

    public function querySeleciona()
    {
        try
        {
            $cst = $this->con->conectar()->prepare("SELECT * FROM estado");
            $cst->execute();

            return $cst->fetchAll();
        }
        catch (PDOException $ex)
        {
            echo $ex;
        }
    }

}