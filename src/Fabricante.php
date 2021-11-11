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

    public function lerFabricantes(){
        // 1) Montar a consulta SQL
        $sql = "SELECT * FROM fabricantes ORDER BY nome";

        try {
            // 2) Preparar a consulta para o PDO
            $consulta = $this->conexao->prepare($sql);

            // 3) Executar a consulta
            $consulta->execute();

            // 4) Capturar os resultados da consulta
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }

        return $resultado;
    } // fim lerFabricantes    
} // fim Fabricante