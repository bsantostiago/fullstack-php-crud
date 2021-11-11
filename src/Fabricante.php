<?php
require_once "Banco.php";

class Fabricante {
    // Propriedades/atributos para Fabricante
    private int $id;
    private string $nome;

    private PDO $conexao;

    public function __construct(){
        // Acessando o método estático de conexão via classe Banco
        $this->conexao = Banco::conecta();
    }
    
} // fim Fabricante