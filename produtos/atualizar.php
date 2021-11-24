<?php
require_once "../src/Produto.php";
require_once "../src/Fabricante.php";

$produto = new Produto;
$fabricante = new Fabricante;

$listaDeFabricantes = $fabricante->lerFabricantes();

$produto->setId($_GET['id']);
$dados = $produto->lerUmProduto();

if(isset($_POST['atualizar'])){
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricanteId($_POST['fabricante']);

    $produto->atualizarProduto();
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | UPDATE - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | SELECT e UPDATE -
    <a href="listar.php">Listar</a> - 
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    <h2>Utilize o formulário abaixo para atualizar os dados de um produto.</h2>
    
    <form action="#" method="post">
        <!-- EXERCÍCIO: FAÇA OS DADOS DO PRODUTO
        APARECEM EM CADA CAMPO DO FORMULÁRIO -->
        <p>
            <label for="nome">Nome:</label>
	        <input value="<?=$dados['nome']?>" type="text" name="nome" id="nome" required>
        </p>

        <p>
            <label for="preco">Preço:</label>
	        <input value="<?=$dados['preco']?>" type="number" name="preco" id="preco" min="0" max="15000" step="0.01" required>
        </p>

        <p>
            <label for="quantidade">Quantidade:</label>
	        <input value="<?=$dados['quantidade']?>" type="number" name="quantidade" id="quantidade" min="0" max="100" step="1" required>
        </p>

        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
                <option value=""></option>

            <?php foreach($listaDeFabricantes as $dadosFabricante) { ?>
                <!-- Se a coluna ID da tabela fabricantes for igual a 
                coluna fabricante_id da tabela produtos, então habilite o 
                atributo selected para o option -->
                <option 
                <?php if( $dadosFabricante['id'] == $dados['fabricante_id'] ) echo "selected"; ?>
                value="<?=$dadosFabricante['id']?>">
                    <?=$dadosFabricante['nome']?>
                </option>
            <?php } ?>   
            </select>
        </p>
    
	    <p>
            <label for="descricao">Descrição:</label>
	        <textarea name="descricao" id="descricao" rows="3" cols="40" maxlength="500" required><?=$dados['descricao']?></textarea>
        </p>
	    
        <button name="atualizar">Atualizar produto</button>
	</form>	   



</div>

</body>
</html>