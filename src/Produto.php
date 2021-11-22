<?php
require_once "Banco.php";

class Produto {
    /* Propriedades/Atributo */
    private int $id;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private string $descricao;
    private int $fabricanteId;

    private PDO $conexao;

    public function __construct(){
        $this->conexao = Banco::conecta();
    }


    /* Getters */
    public function getId():int { return $this->id; }
    public function getNome():string { return $this->nome; }
    public function getPreco():float { return $this->preco; }
    public function getQuantidade():int { return $this->quantidade; }
    public function getDescricao():string { return $this->descricao; }
    public function getFabricanteId():int { return $this->fabricanteId; }

    /* Setters */
    public function setId(int $id) {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }
    public function setNome(string $nome) {
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }
    public function setPreco(float $preco) {
        $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }
    public function setQuantidade(int $quantidade) {
        $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);
    }
    public function setDescricao(string $descricao) {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_STRING);
    }
    public function setFabricanteId(int $fabricanteId) {
        $this->fabricanteId = filter_var($fabricanteId, FILTER_SANITIZE_NUMBER_INT);
    }


} // fim da classe Produto