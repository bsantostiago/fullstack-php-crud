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
	    <p>
            <label for="nome">Nome:</label>
	        <input type="text" name="nome" id="nome" required>
        </p>

        <p>
            <label for="preco">Preço:</label>
	        <input type="number" name="preco" id="preco" min="0" max="15000" step="0.01" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
	        <input type="number" name="quantidade" id="quantidade" min="0" max="100" step="1" required></p>
	    
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
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

	    <p>
            <label for="descricao">Descrição:</label>
	        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required></textarea>
        </p>
	    
        <button name="inserir">Inserir produto</button>
	</form>	


</div>

</body>
</html>