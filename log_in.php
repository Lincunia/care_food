<?php
include('./includes/header.php');
?>
<div class="container p-4">
    <div class="row">
	<div class="col-md-4 mx-auto">
	    <div class="card">
		<div class="card-body">
		    <form action="./functions/read.php" method="POST">
                <h1>Iniciar sesión</h1>
                <div class="form-group">
                    <input type="number" class="form-control" name="" placeholder="Identificación">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="" placeholder="Identificación">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" name="check_out">Guargar información</button>
                </div>
		    </form>
		</div>
	    </div>
	</div>
    </div>
</div>
<?php
include('./includes/footer.php');
?>