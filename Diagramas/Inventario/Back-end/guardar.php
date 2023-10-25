
<?php
include('conection.php');

if (isset($_POST['guardar'])) {
    $name = $_POST['Nombre'];
    $description = $_POST['Descripcion'];
    $price = $_POST['Precio'];
    $cantidad = $_POST['Cantidad'];
    $cat = $_POST['Categoria'];

    // Procesar la imagen
    $imgDir = '../Back-end/productos'; // Ruta donde se guardarán las imágenes
    $imgName = $_FILES['Imagen']['name']; // Nombre del archivo de imagen
    $imgPath = $imgDir . $imgName;

    if (move_uploaded_file($_FILES['Imagen']['tmp_name'], $imgPath)) {
        // La imagen se ha cargado con éxito, ahora puedes guardar la información en la base de datos

        $query = "INSERT INTO producto_db(NombreProducto, DetalleProducto, Precio, CantidadProducto, Categoria, imagenProducto) VALUES ('$name', '$description', '$price', '$cantidad', '$cat', '$imgName')";

        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            $_SESSION['message'] = 'Producto guardado correctamente';
            $_SESSION['message_type'] = 'success';

            header('Location: ../Front-end/home.php');
        } else {
            // Maneja el caso en el que la inserción falló
        }
    } else {
        // Maneja el caso en el que la carga de la imagen falló
        header('Location: ../Front-end/index.php');
    }
}
?>
