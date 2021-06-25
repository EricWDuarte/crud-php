<?php

require_once __DIR__ . "/../../vendor/autoload.php";

class Usuarios
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel;
    private $mensagem;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
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
            $this->email = $dados["email"];
            $this->senha = sha1($dados["senha"]);
            $this->nivel = $dados["nivel"];
            $this->mensagem = $dados ["mensagem"];

            $cst = $this->con->conectar()->prepare("INSERT INTO usuarios (nome,email,senha,nivel,mensagem) VALUES(:nome,:email,:senha,:nivel,:mensagem)");
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nivel", $this->nivel, PDO::PARAM_INT);
            $cst->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

            if ($cst->execute()) {
                return "OK";
            } else {
                return "Não deu";
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function querySeleciona()
    {
        try {
            $cst = $this->con->conectar()->prepare("SELECT * FROM usuarios");
            $cst->execute();

            return $cst->fetchAll();
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function querySelecionaId($dado)
    {
        try {
            $this->id = $this->objfcn->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("SELECT id, nome, senha, email, nivel, mensagem FROM usuarios WHERE id = :idUser");
            $cst->bindParam(":idUser", $this->id, pdo::PARAM_INT);
            $cst->execute();

            return $cst->fetch();
        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function queryUpdate($dados)
    {
        try {
            $this->id = $this->objfcn->base64($dados['func'], 2);
            $this->nome = $dados["nome"];
            $this->email = $dados["email"];
            $this->senha = $dados["senha"];
            $this->nivel = $dados["nivel"];
            $this->mensagem = $dados["mensagem"];

            $cst = $this->con->conectar()->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel, mensagem = :mensagem WHERE id = :idUser");

            $cst->bindParam(":idUser", $this->id, PDO::PARAM_INT);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nivel", $this->nivel, PDO::PARAM_INT);
            $cst->bindParam(":mensagem", $this->mensagem, PDO::PARAM_STR);

            if ($cst->execute()) {
                return "OK";
            } else {
                echo "<script>alert('Não alterou');top.location.href='usuarios.php';</script>";
            }
        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function queryDelete($dado)
    {
        try {
            $this->id = $this->objfcn->base64($dado, 2);
            $cst = $this->con->conectar()->prepare("DELETE FROM usuarios WHERE id = :idUser");
            $cst->bindParam(":idUser", $this->id, PDO::PARAM_INT);

            if ($cst->execute()) {
                return "OK";
            } else {
                echo "<script>alert('Não deletou');top.location.href='usuarios.php';</script>";
            }
        } catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function logarUsuarios($dados)
    {
        $this->email = $dados["email"];
        $this->senha = sha1($dados["senha"]);

        if (empty(trim($this->email))) {
            echo "<script>alert('Campo email em branco')</script>";
        } else if (empty(trim($dados["senha"]))) {
            echo "<script>alert('Campo senha em branco')</script>";
        } else {
            try {
                $cst = $this->con->conectar()->prepare("SELECT id, email, senha FROM usuarios WHERE email = :email AND senha = :senha");
                $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
                $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);

                $cst->execute();

                if ($cst->rowCount() == 0) {
                    header("Location: https://contosdecontos.com.br/front/eric/php/");
                } else {
                    session_start();
                    $rst = $cst->fetch();
                    $_SESSION["logado"] = "logar";
                    $_SESSION["func"] = $rst["id"];
                    header("Location: https://contosdecontos.com.br/front/eric/php/sistema/index.php");
                }
            } catch (PDOException $ex) {
                echo $ex;
            }
        }
    }

    public function verificaLogado($dado)
    {
        $cst = $this->con->conectar()->prepare("SELECT id, nome, email, nivel FROM usuarios WHERE id = :id");
        $cst->bindParam(":id", $dado, PDO::PARAM_INT);
        $cst->execute();

        $rst = $cst->fetch();

        $_SESSION["nome"] = $rst["nome"];
        $_SESSION["nivel"] = $rst["nivel"];

    }

    public function deslogarUsuarios()
    {
        session_destroy();
        header("Location: https://contosdecontos.com.br/front/eric/php/");
    }

}