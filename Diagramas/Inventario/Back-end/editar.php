<?php
include("conection.php");

$name='';//se difine la variable que se estara enviando al cuerpo del codigo (index.php)
$description='';
$price='';
$cantidad='';
$cat='';
$img='';

if(isset($_GET['id'])){ //vinculas los datos externos con los internos
    $id=$_GET['id'];
    $query="SELECT * FROM producto_db WHERE id = $id";
    $result=mysqli_query($conexion, $query);
       
       if(mysqli_num_rows($result)==1){//se hace la vinculacion de los datos de la base de datos
           $row=mysqli_fetch_array($result);//determinar el número de filas del resultado
           $name=$row['NombreProducto'];
           $description=$row['DetalleProducto'];
           $price=$row['Precio'];
           $cantidad=$row['CantidadProducto'];
           $cat=$row['Categoria'];
           $img=$row['imagenProducto'];
       }
}

if(isset($_POST['update'])){ //igualacion de variables y actualizar variables
    $id = $_GET['id'];//se obtienen los datos de $id
    $name = $_POST['Nombre'];//se envian los datos de $title
    $description = $_POST['descripcion'];
    $price=$_POST['Precio'];
    $cantidad=$_POST['Cantidad'];
    $cat=$_POST['Categoria'];
    $img=$_POST['Imagen'];

     // Procesar la imagen
     if ($_FILES['Imagen']['error'] === 0) {
        $img = $_FILES['Imagen']['name'];
        $img_path =  $img;
        move_uploaded_file($_FILES['Imagen']['tmp_name'], $img_path);
    }

    // Realizar la actualización en la base de datos
    $query = "UPDATE producto_db SET NombreProducto = '$name', DetalleProducto = '$description', Precio = '$price', CantidadProducto = '$cantidad', Categoria = '$cat', imagenProducto = '$img_path' WHERE id = $id";



    mysqli_query($conexion, $query);//indica que lo ara en mysql con ayuda o bien, basandose en $conexion y query

    $_SESSION['message'] = 'El producto actualizada correctamente';//evalua el resultado para almacenarlo como el sig. mensaje
    $_SESSION['message_type'] = 'Error al actualizar';//no evalua el resultado, se almacena directamente como mensaje.
    header('Location: ../Front-end/index.php');//se dirige a index despues de actualizar

}
?>
<?php
include('../Front-end/includes/header.php');
?>

<div class="container p-4">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                     <input name="Nombre" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                     <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $description; ?> </textarea>
                   </div>
                   <div class="form-group">
                     <input name="Precio" type="text" class="form-control" value="<?php echo $price; ?>" placeholder="Precio">
                    </div>
                    <div class="form-group">
                     <input name="Cantidad" type="text" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                     <input name="Categoria" type="text" class="form-control" value="<?php echo $cat; ?>" placeholder="Categoria">
                    </div>
                    <div class="form-group">
                        <label name="" type="text" class="form-control" placeholder="Imagen">Imagen anterior:<?php echo $img; ?></label>
                        <label for="imagen" class="form-label">Nueva Imagen</label>
                        <input type="file" name="Imagen" class="form-control" value="<?php echo $img; ?>">
                    </div>

                  
                  <button class="btn-success" name="update" value="Actualizar">Actualizar </button>
                </form>
            </div>
        </div>
    </div>
</div>

                