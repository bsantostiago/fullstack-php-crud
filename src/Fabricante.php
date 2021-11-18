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

    public function lerFabricantes():array {
        // 1) Montar a consulta SQL
        $sql = "SELECT * FROM fabricantes ORDER BY nome";

        try {
            // 2) Preparar a consulta para o PDO
            $consulta = $this->conexao->prepare($sql);

            // 3) Executar a consulta
            $consulta->execute();

            // 4) Capturar os resultados da consulta como array
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }

        return $resultado;
    } // fim lerFabricantes   
    

    
    public function inserirFabricante(){
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

        /* Prepared Statements (Declarações/Processos preparados) */
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
    } // fim inserirFabricante

    
    public function lerUmFabricante(){
        $sql = "SELECT * FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }

        return $resultado;
    } // fim lerUmFabricante


    public function atualizarFabricante(){
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch(Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    } // fim atualizarFabricante




    /* Getters e Setters para o acesso das propriedades */
    public function getId():int{
        return $this->id;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setId(int $id){
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setNome(string $nome){
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }

} // fim Fabricante