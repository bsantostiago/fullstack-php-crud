<?php
require_once "../src/Produto.php";
$produto = new Produto;
$produto->setId($_GET['id']);
$produto->excluirProduto();
header("location:listar.php");