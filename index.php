<?php
include('./includes/header.php');
?>

<link rel="stylesheet" href="./includes/custom.css">

<div class="content-center-lg">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
	<ol class="carousel-indicators">
	    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
	    <div class="carousel-item active">
		<img src="img/1.jpg" class="d-block w-100 h-50" alt="banner 1">
		<div class="carousel-caption d-none d-md-block">
		    <h5>Tu reserva</h5>
		    <a type="button" class="btn btn-secondary" href="./know_more.php">Conoce mas</a>
		</div>
	    </div>
	    <div class="carousel-item">
		<img src="img/2.jpg" class="d-block w-100" alt="banner 2">
	    </div>
	    <div class="carousel-item">
		<img src="img/3.jpg" class="d-block w-100" alt="banner 3">
	    </div>
	</div>
	<button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only"></span>
	</button>
	<button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only"></span>
	</button>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<?php
include('./includes/footer.php');
?>
