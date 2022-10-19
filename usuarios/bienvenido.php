<?php include("cabecera.php"); ?>

<?php

session_start();

if(!isset($_SESSION['usuario'])){
    echo'
        <script>
            alert("Por favor debe iniciar sesion");
            window.location = "menu_login.php";
        </script>
    ';
    session_destroy();
    die();

}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/product/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=xpCMziV1pKbF49xIZt9tCoDWPYAefLyUB0yuwpX5GGi2KStY27gt6l8FPpLYTvoYQnmktlnbSI4DdX-uTr8B5JV0ug9kCNDOnFLeqzxAUfY" charset="UTF-8"></script><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles -->
    <link href="product.css" rel="stylesheet">
  </head>
  <body>
    
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Bienvenido/a</h1>
    <p class="lead font-weight-normal">Con Carefood podrás reservar alimentos en la cafeteria. <strong>¿Estas listo/a?</strong></p>
    <a class="btn btn-primary" href="../productos.php">Estoy listo/a </a>
  </div>
</div>