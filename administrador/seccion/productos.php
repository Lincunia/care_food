<?php include("../template/encabezado.php")?>
<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
include("../configuracion/basedatos.php");

switch($accion){
        case"Agregar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO productos (nombre,imagen,precio) VALUES (:nombre,:imagen,:precio);");
            $sentenciaSQL->bindParam(':nombre',$txtNombre);
            $sentenciaSQL->bindParam(':precio',$txtPrecio);
            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if($tmpImagen!=""){

                    move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();
            header("location:productos.php");
            break;

        case"Modificar":

            $sentenciaSQL= $conexion->prepare("UPDATE productos SET Nombre=:Nombre WHERE ID=:ID");
            $sentenciaSQL->bindParam(':Nombre',$txtNombre);
            $sentenciaSQL= $conexion->prepare("UPDATE productos SET precio=:precio WHERE ID=:ID");
            $sentenciaSQL->bindParam(':precio',$txtPrecio);
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM productos WHERE ID=:ID");
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if( isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg") ){

                if(file_exists("../../img/".$producto["Imagen"])){

                    unlink("../../img/".$producto["Imagen"]);
                }

            }


                $sentenciaSQL= $conexion->prepare("UPDATE productos SET Imagen=:Imagen WHERE ID=:ID");
                $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();
            }
            header("location:productos.php");
            break;

        case"Cancelar":
            header("location:productos.php");
            break;

        case"Seleccionar":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE ID=:ID");
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtNombre=$producto['Nombre'];
            $txtImagen=$producto['Imagen'];
            $txtPrecio=$producto['precio'];

            //echo "Presionado botón Seleccionar";
            break;

        case"Borrar":

            $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM productos WHERE ID=:ID");
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if( isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg") ){

                if(file_exists("../../img/".$producto["Imagen"])){

                    unlink("../../img/".$producto["Imagen"]);
                }

            }


                $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE ID=:ID");
                $sentenciaSQL->bindParam(':ID',$txtID);
                $sentenciaSQL->execute();
                header("location:productos.php");
                break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos del producto
        </div>

        <div class="card-body">
            
        <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?> "name="txtID" id="txtID" placeholder="ID">
    </div>

    <div class = "form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?> "name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
    </div>

    <div class = "form-group">
    <label for="txtPrecio">Precio:</label>
    <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?> "name="txtPrecio" id="txtPrecio" placeholder="Precio del producto">
    </div>

    <div class = "form-group">
    <label for="txtImagen">Imagen:</label>

    <br/>

    <?php   if($txtImagen!=""){    ?>

        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen;?>" width="65" alt="" srcset="">

    <?php   } ?>


    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del producto">
    </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

    </form>

        </div>
        
        
    </div>


    
    
    

</div>
<div class="col-md-7">

<table class="table table-bordered" id="tabla">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listaproductos as $producto) { ?>
        <tr>
            <td><?php echo $producto['ID'] ?></td>
            <td><?php echo $producto['Nombre'] ?></td>
            <td><?php echo $producto['precio'] ?></td>
            <td>

            <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['Imagen'] ?>" width="80" alt="" srcset="">
            

            </td>

            <td>
            <form  method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['ID'] ?>" />

                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>


            </form>

        
            </td>

        </tr>
        <?php } ?>
    </tbody>
</table>


</div>

<script>

    var tabla= document.querySelector("#tabla");

    var dataTable = new DataTable(tabla);

</script>

<?php include("../template/piepagina.php")?>