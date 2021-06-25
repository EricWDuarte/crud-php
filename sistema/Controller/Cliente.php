<?php

require_once __DIR__ . "/../../vendor/autoload.php";

class Cliente {
    private $nome;
    private $estado;
    private $mensagem;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

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

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function __construct()
    {
        $this->con = new Conexao();
        $this->objfcn = new Funcoes();
    }

    public function queryInsert($dados)
    {
        try {

            $this->nome = $dados["nome"];
            $this->estado = $dados["estado"];
            $this->mensagem = $dados ["mensagem"];

            $cst = $this->con->conectar()->prepare("INSERT INTO cliente (nome,estado,mensagem) VALUES(:nome,:estado,:mensagem)");
            $cst->bindParam(":nome",$this->nome,PDO::PARAM_STR);
            $cst->bindParam(":estado",$this->estado,PDO::PARAM_STR);
            $cst->bindParam(":mensagem",$this->mensagem,PDO::PARAM_STR);

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
            $cst = $this->con->conectar()->prepare("SELECT i.id, i.nome, i.mensagem, t.estado
                                                            FROM cliente i
                                                            JOIN estado t on t.id = i.estado");
            $cst->execute();

            return $cst->fetchAll();
        }
        catch (PDOException $ex)
        {
            echo $ex;
        }
    }

    public function selecionaEstado()
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

    public function querySelecionaId($dado)
    {
        try {
            $this->id = $this->objfcn->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT id, nome, estado, mensagem FROM cliente WHERE id = :idUser");
            $cst->bindParam(":idUser", $this->id, pdo::PARAM_INT);
            $cst->execute();

            return $cst->fetch();
        }
        catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function queryUpdate($dados)
    {
        try {
            $this->id = $this->objfcn->base64($dados['func'], 2);
            $this->nome = $dados["nome"];
            $this->estado = $dados["estado"];
            $this->mensagem = $dados["mensagem"];

            $cst = $this->con->conectar()->prepare("UPDATE cliente SET nome = :nome, estado = :estado, mensagem = :mensagem WHERE id = :idUser");

            $cst->bindParam(":idUser",$this->id,PDO::PARAM_INT);
            $cst->bindParam(":nome",$this->nome,PDO::PARAM_STR);
            $cst->bindParam(":estado",$this->estado,PDO::PARAM_STR);
            $cst->bindParam(":mensagem",$this->mensagem,PDO::PARAM_STR);

            if($cst->execute())
            {
                return "OK";
            }
            else
            {
                echo "<script>alert('Não alterou');top.location.href='cliente.php';</script>";
            }
        }
        catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function queryDelete($dado)
    {
        try {
            $this->id = $this->objfcn->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("DELETE FROM cliente WHERE id = :idUser");
            $cst->bindParam(":idUser", $this->id, PDO::PARAM_INT);

            if ($cst->execute()) {
                return "OK";
            } else {
                echo "<script>alert('Não deletou');top.location.href='cliente.php';</script>";
            }
        }
        catch (PDOException $ex)
        {
            echo $ex;
        }
    }

}