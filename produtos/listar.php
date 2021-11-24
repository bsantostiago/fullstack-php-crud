<?php
require_once "../src/Produto.php";
$produto = new Produto;
$listaDeProdutos = $produto->lerProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produtos | SELECT - CRUD com PHP e MySQL </title>
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Lendo e carregando todos os produtos</h2>
    <p><a href="inserir.php">Inserir</a></p>  

<?php foreach($listaDeProdutos as $dadosProduto) { ?>
    <ul>
        <li><b>Nome:</b> <?=$dadosProduto['nome']?> </li>
        <li><b>Preço:</b> 
        <?=$produto->formataPreco($dadosProduto['preco'])?> 
        </li>
        <li><b>Quantidade:</b> 
        <?=$dadosProduto['quantidade']?> </li>
        <li><b>Descrição:</b> 
        <?=$dadosProduto['descricao']?>  </li>
        <li><b>Fabricante:</b> 
        <?=$dadosProduto['fabricante']?> 
        </li>
    </ul>

    <a href="atualizar.php?id=<?=$dadosProduto['id']?>">Atualizar</a>

<?php } ?>

</div>


</body>
</html>