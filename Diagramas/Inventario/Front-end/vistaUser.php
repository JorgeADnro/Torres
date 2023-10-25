<?php include("../Back-end/conection.php") ?>
<?php include("includes/header.php") ?>

<div class="card-container">
  <?php
  $query = "SELECT * FROM producto_db";
  $result_producto_db = mysqli_query($conexion, $query);
  while ($row = mysqli_fetch_assoc($result_producto_db)) {
  ?>
    <div class="card">
      <?php if (!empty($row['imagenProducto'])) { ?>
        <img src="../Back-end/productos<?php echo $row['imagenProducto']; ?>" alt="Imagen del Producto" class="card-img-top">
      <?php } ?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['NombreProducto']; ?></h5>
        <p class="card-text"><?php echo $row['DetalleProducto']; ?></p>
        <p class="card-text">Categoria: <?php echo $row['Categoria']; ?></p>
        <p class="card-text">Precio: <?php echo $row['Precio']; ?></p>
        
        <a href="?id=<?php echo $row['id']; ?>" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        Añadir al carrito
        </a>
      </div>
    </div>
  <?php } ?>
</div>

<style>
  .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .card {
    width: 18rem; /* Ajusta el ancho de la tarjeta según tus necesidades */
    margin: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
  }

  .card:hover {
    transform: scale(1.05);
  }

  .card-img-top {
    max-height: 200px; /* Ajusta el tamaño de la imagen según tus necesidades */
    object-fit: cover;
  }

  .card-title {
    font-size: 1.25rem;
    font-weight: bold;
  }

  .btn {
    margin: 5px;
  }
</style>
