<?php
include('./includes/header.php');
?>
<div class="container p-4">
    <div class="row">
	<div class="col-md-4 mx-auto">
	    <div class="card">
		<div class="card-body">
		    <form action="" method="POST">
                <h1>Pestaña de registro</h1>
                <div class="form-group">
                    <input type="number" class="form-control" name="id" placeholder="Identificación" min="1000000000" max="9999999999" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="surname" placeholder="Apellido de usuario">
                </div>
                <div class="form-group mb-3">
                    <select class="custom-select" name="level_num">
                        <option disabled selected>Curso</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <select class="custom-select" name="level_let">
                        <option disabled selected>Salón</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="phone_num" placeholder="Teléfono" min="1000000000" max="9999999999">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico">
                </div>
<?php if(isset($_POST['insert_info'])){
    if(
        empty($_POST['level_num']) ||
        empty($_POST['level_let']) ||
        empty($_POST['id']) ||
        empty($_POST['name']) ||
        empty($_POST['surname']) ||
        empty($_POST['phone_num']) ||
        empty($_POST['email'])
    ){
?>
        <div class="alert alert-danger" role="alert">
            Inserta todos los campos
        </div>
<?php }
    else{
        input_queries($link, "INSERT INTO users (id, name, surname, lev, phone_num, email) VALUES
        ({$_POST['id']},
        '{$_POST['name']}',
        '{$_POST['surname']}',
        '{$_POST['level_num']}{$_POST['level_let']}',
        '{$_POST['phone_num']}',
        '{$_POST['email']}');");
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}
?>
                <div class="form-group">
                    <button class="btn btn-success btn-block" name="insert_info">Guargar información</button>
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