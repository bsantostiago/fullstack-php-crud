<?php
require_once "../src/Produto.php";
require_once "../src/Fabricante.php";

$produto = new Produto;
$fabricante = new Fabricante;
$listaDeFabricantes = $fabricante->lerFabricantes();

if( isset($_POST['inserir']) ){
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);

    $produto->inserirProduto();

    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | INSERT - CRUD com PHP e MySQL </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | INSERT -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Utilize o formulário abaixo para cadastrar um produto.</h2>    		
    
	<form action="#" method="post">
	    <p class="form-group">
            <label class="form-label" for="nome">Nome:</label>
	        <input class="form-control" type="text" name="nome" id="nome" required>
        </p>

        <p class="form-group">
            <label class="form-label" for="preco">Preço:</label>
	        <input class="form-control" type="number" name="preco" id="preco" min="0" max="15000" step="0.01" required>
        </p>

        <p class="form-group">
            <label class="form-label" for="quantidade">Quantidade:</label>
	        <input class="form-control" type="number" name="quantidade" id="quantidade" min="0" max="100" step="1" required></p>
	    
        <p class="form-group">
            <label class="form-label" for="fabricante">Fabricante:</label>
            <select class="custom-select" name="fabricante" id="fabricante" required>
                <!-- Primeiro option é estático e vazio
                (deixa do jeito que está) -->
                <option value=""></option>

                <?php foreach( $listaDeFabricantes as $dadosFabricante ) { ?>
                    <option value="<?=$dadosFabricante['id']?>">
                    <?=$dadosFabricante['nome']?>
                    </option>
                <?php } ?>
                
            </select>
        </p>

	    <p class="form-group">
            <label class="form-label" for="descricao">Descrição:</label>
	        <textarea class="form-control" name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required></textarea>
        </p>
	    
        <button class="btn btn-primary" name="inserir">Inserir produto</button>
	</form>	


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>