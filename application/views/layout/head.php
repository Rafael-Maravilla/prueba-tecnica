<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('resources/css/bootstrap.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('resources/vendor/datatable/css/jquery.dataTables.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('resources/vendor/datatable/css/dataTables.bootstrap5.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('resources/vendor/sweetalert/css/sweetalert2.css') ?>" rel="stylesheet">
    <title><?php echo $titulo ?></title>
</head>
<body>
    <header>
    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#" id="banner">Empresa</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="<?php echo base_url('index.php/Maquina') ?>">Máquina</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="<?php echo base_url('index.php/Tipo') ?>">Tipo</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link" href="<?php echo base_url('index.php/Maquina/vista') ?>">Vista Máquinas</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
    </header>

    <main>

