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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Produtos | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>

<div class="container">
    
    <h2>Lendo e carregando todos os produtos</h2>
    <p><a class="btn btn-primary" href="inserir.php">Inserir</a></p>  

<div class="row"> <!-- inicio da div row (habilitar o grid system) -->

<?php foreach($listaDeProdutos as $dadosProduto) { ?>

  <div class="col-sm-6 col-md-4"> <!-- inicio das colunas -->
    <ul class="list-group">
        <li class="list-group-item"><b>Nome:</b> <?=$dadosProduto['nome']?> </li>
        <li class="list-group-item"><b>Preço:</b> 
        <?=$produto->formataPreco($dadosProduto['preco'])?> 
        </li>
        <li class="list-group-item"><b>Quantidade:</b> 
        <?=$dadosProduto['quantidade']?> </li>
        <li class="list-group-item"><b>Descrição:</b> 
        <?=$dadosProduto['descricao']?>  </li>
        <li class="list-group-item"><b>Fabricante:</b> 
        <?=$dadosProduto['fabricante']?> 
        </li>
    </ul>

    <p class="text-center my-2">
        <a class="btn btn-warning"
         href="atualizar.php?id=<?=$dadosProduto['id']?>">Atualizar</a> 
        <a class="btn btn-danger"
        href="excluir.php?id=<?=$dadosProduto['id']?>">Excluir</a>
    </p>

  </div> <!-- fim das colunas -->

<?php } ?>

</div> <!-- fim da div row -->

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>