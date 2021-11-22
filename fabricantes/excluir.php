<?php
require_once "../src/Fabricante.php";
$fabricante = new Fabricante;
$fabricante->setId( $_GET['id'] );
$fabricante->excluirFabricante();
header("location:listar.php");