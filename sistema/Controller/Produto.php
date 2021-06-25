<?php

require_once __DIR__ . "/../../vendor/autoload.php";

Class Produto {
    private $nome;
    private $preco;
    private $categoria;
    private $foto;
    private $foto_tipo;
    private $foto_tamanho;
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
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getFotoTipo()
    {
        return $this->foto_tipo;
    }

    /**
     * @param mixed $foto_tipo
     */
    public function setFotoTipo($foto_tipo)
    {
        $this->foto_tipo = $foto_tipo;
    }

    /**
     * @return mixed
     */
    public function getFotoTamanho()
    {
        return $this->foto_tamanho;
    }

    /**
     * @param mixed $foto_tamanho
     */
    public function setFotoTamanho($foto_tamanho)
    {
        $this->foto_tamanho = $foto_tamanho;
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

    function queryInsert($dados)
    {
        try {

            $this->nome = $dados["nome"];
            $this->preco = $dados["preco"];
            $this->categoria = $dados["categoria"];
            $this->mensagem = $dados ["mensagem"];

            $md5 = md5(time());
            $this->foto = $md5 . $_FILES["foto"]["name"];
            $this->foto_tamanho = $_FILES["foto"]["size"];
            $this->foto_tipo = $_FILES["foto"]["type"];

            $caminho = __DIR__."/imagem/";

            if( strpos($this->foto_tipo, "png") && $this->foto_tamanho < 1000000 )
            {
                move_uploaded_file($_FILES["foto"]["tmp_name"], $caminho . $this->foto);

                $cst = $this->con->conectar()->prepare("INSERT INTO produto(nome,preco,categoria,foto,mensagem) VALUES(:nome,:preco,:categoria,:foto,:mensagem)");
                $cst->bindParam(":nome",$this->nome,PDO::PARAM_STR);
                $cst->bindParam(":preco",$this->preco,PDO::PARAM_INT);
                $cst->bindParam(":categoria",$this->categoria,PDO::PARAM_STR);
                $cst->bindParam(":foto",$this->foto,PDO::PARAM_STR);
                $cst->bindParam(":mensagem",$this->mensagem,PDO::PARAM_STR);

            }
            else
            {
                echo "<script>alert('Apenas imagens PNG e menores que 1 Mega');top.location.href='produtos.php';</script>";
            }

            if ($cst->execute())
            {
                return "OK";
            }
            else
            {
                return "Não deu";
            }

        }
        catch (PDOException $ex)
        {
            echo $ex;
        }
    }

    public function querySeleciona()
    {
        try
        {
            $cst = $this->con->conectar()->prepare("SELECT * FROM produto");
            $cst->execute();

            return $cst->fetchAll();
        }
        catch (PDOException $ex)
        {
            echo $ex;
        }
    }

}
