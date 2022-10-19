<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareFood </title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />

</head>
<body>
 
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">

        <ul class="nav navbar-nav">

        <img width="80" src="../img/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        &nbsp;&nbsp;
            <li class="nav-item">
                <a class="nav-link text-light" href="usuarios/bienvenido.php">Inicio</a>
            </li>
            &nbsp;&nbsp;
            <li class="nav-item">
                <a class="nav-link text-light" href="../productos.php">Productos</a>
            </li>
            &nbsp;&nbsp;
            <li class="nav-item">
                <a class="nav-link text-light" href="../usuarios/nosotros_iniciada.php">Nosotros</a>
            </li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <form class="form-inline my-5 my-lg-0" method="post">
            <input class="form mr-sm-2" type="search" name="busqueda" id="busqueda" placeholder="¿Qué producto buscas?" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" name="enviar" id="enviar" type="submit">Buscar</button>
            </form>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
                <a class="btn btn-primary" href="usuarios/menu_reserva.php">Quiero reservar</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-light" href="/usuarios/cerrar_sesion">Cerrar sesion</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    <br/><br/>
        <div class="row">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </head>
<body>
<div class="jumbotron">
  <h1 class="display-4">Productos</h1>
  <p class="lead">Bienvenido a los productos CAREFOOD, donde podras visualizar todos los productos de la cafeteria, cuando estes listo, pulsa en el menu, la opcion <strong>"Quiero reservar"</strong>.</p>
  <hr class="my-4">
</div>
<?php

include("administrador/configuracion/basedatos.php");

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

foreach($listaproductos as $producto) { 
?>

<div class="col-md-3">
<div class="card w-60">
<img class="card-img-top" src="./img/<?php echo $producto ['Imagen']; ?>" alt="">
<div class="card-body">
    <h4 class="card-title"><?php echo $producto ['Nombre']; ?></h4>
</br>
    <h5 class="card-tite" ><b>$<?php echo number_format($producto ['precio'], 3, '.', '.'); ?></b></h5>
</br>
</br>


</div>
</div>
</div>


<?php } ?>
  </body>
  <?php include("template/piepagina.php"); 
  include("usuarios/info_adicional.php")
  ?>
</html>
