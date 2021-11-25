<?php
// Importando a classe Fabricante
require "../src/Fabricante.php";

// Criando um objeto para fabricante
$fabricante = new Fabricante;

// Obtendo a relação de fabricantes via método
$listaDeFabricantes = $fabricante->lerFabricantes();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | SELECT - CRUD com PHP e MySQL </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Fabricantes | SELECT -
    <a href="../index.php">Home</a> </h1>
</div>
      

<div class="container">
    
    <h2>Lendo e carregando todos os fabricantes</h2>
    <p><a class="btn btn-primary" href="inserir.php">Inserir</a></p>    

    <table class="table table-striped table-hover">
        <caption> Lista de Fabricantes </caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="text-center">Operação</th>
            </tr>
        </thead>
                
        <tbody>

<?php foreach( $listaDeFabricantes as $arrFabricante ){ ?>
            <tr>
                <td> <?=$arrFabricante['id']?> </td>
                <td> <?=$arrFabricante['nome']?> </td>
                <td class="text-center">
    <a class="btn btn-warning" href="atualizar.php?id=<?=$arrFabricante['id']?>">Atualizar</a>
    <a class="btn btn-danger" href="excluir.php?id=<?=$arrFabricante['id']?>">Excluir</a>
                </td>
            </tr>
<?php } ?>

        </tbody>

    </table>
 
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>