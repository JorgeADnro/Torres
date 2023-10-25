<?php include("../Back-end/conection.php") ?>
<?php include("includes/header.php") ?>

<div class="btn-container">
  <a type="button" class="btn btn-primary" href="home.php">Añadir Producto</a>
</div>
<div class="tabla-container">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Categoria</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Imagen</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM producto_db";
      $result_producto_db = mysqli_query($conexion, $query);
      while ($row = mysqli_fetch_assoc($result_producto_db)) {
      ?>
        <tr>
          <td><?php echo $row['NombreProducto']; ?></td>
          <td><?php echo $row['DetalleProducto']; ?></td>
          <td><?php echo $row['Categoria']; ?></td>
          <td><?php echo $row['Precio']; ?></td>
          <td><?php echo $row['CantidadProducto']; ?></td>
          <td>
            <?php if (!empty($row['imagenProducto'])) { ?>
              <img src="../Back-end/productos<?php echo $row['imagenProducto']; ?>" alt="Imagen del Producto" style="max-width: 100px; max-height: 100px;">
            <?php } ?>
          </td>
          <td>
            <center>
              <a href="../Back-end/editar.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
                <i class="fas fa-marker"></i>Editar
              </a>
              <a href="../Back-end/borrar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>Eliminar
              </a>
              <a href="../Back-end/baja.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                <i class="fas fa-trash-alt"></i>Agotado
              </a>
            </center>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<style>
  .btn-container {
    position: absolute;
    top: 100px; /* Espacio de 100px arriba */
    bottom: none;
    left: 55px;
  }

  .tabla-container {
    display: flex;
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    height: 70vh; /* Altura del contenedor, ajusta según sea necesario */
    margin: 55px; /* Centra horizontalmente en el contenedor padre */
  }
</style>
