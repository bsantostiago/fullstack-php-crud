<?php
// Importamos a classe Fabricante
require_once "../src/Fabricante.php";

// Para poder usar recursos da classe, instanciamos um objeto
$fabricante = new Fabricante;

// Atribuimos ao objeto (via setter) o valor do ID vindo do parâmetro de URL
$fabricante->setId($_GET['id']);

// Executamos o método lerUmFabricante e guardamos o array com os dados retornados
$dados = $fabricante->lerUmFabricante();

if( isset($_POST['atualizar']) ){
    $fabricante->setNome($_POST['nome']);
    $fabricante->atualizarFabricante();
    header("location:listar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Fabricantes | UPDATE - CRUD com PHP e MySQL </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<header class="sticky-top border-bottom border-dark">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <h1 class="navbar-brand">Fabricantes | SELECT e UPDATE </h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">        
          <li class="nav-item">
              <a href="listar.php" class="nav-link">Listar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>        
        </ul>
      </div>
    </div>
  </nav>
</header>

<div class="container">

    <h2>Utilize o formulário abaixo para atualizar os dados de um fabricante.</h2>

    <form action="" method="post" class="w-50">
	    <p class="form-group">
            <label class="form-label" for="nome">Nome:</label><br>
	        <input class="form-control" value="<?=$dados['nome']?>"
             type="text" name="nome" id="nome" required>
        </p>   
        <button class="btn btn-primary" name="atualizar">Atualizar fabricante</button>
	</form>	

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>