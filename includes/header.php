<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$link = mysqli_connect("localhost", "root", "", "carefood") or die('Esto no funciona, conoce los detalles de esto: '.mysqli_error($mysqli));

function input_queries($link, $sql){
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo $sql;
        die("Petición fallida, posibles motivos:
	    <ol>
		<li> El usuario ya existe </li>
		<li> Error en el codigo interno</li>
	    </ol>
	    ".mysqli_error($link));
    }
}
function prepare_data($data, $link) {
    return mysqli_real_escape_string($link, stripslashes(htmlspecialchars($data)));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS BOOSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS CUSTOM -->
    <link rel="stylesheet" href="./includes/custom.css">
    <title>Care-Food</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img class="logo" src="./img/logo.png">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		    <a class="nav-link" href=".">Inicio <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
		    <a class="nav-link" href="./products.php">Productos</a>
		</li>
		<li class="nav-item">
		    <a class="nav-link" href="./us.php">Nosotros</a>
		</li>
    <!--
		<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
			Dropdown
		    </a>
		    <div class="dropdown-menu">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#">Something else here</a>
		    </div>
		</li>
		<li class="nav-item">
		    <a class="nav-link disabled">Disabled</a>
		</li>
    -->
	    </ul>
    <!--
	    <form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
    -->
	    <button type="button" class="btn btn-primary">Registrarse</button>
	    <button type="button" class="btn btn-secondary">Loguearse</button>
	</div>
    </nav>
