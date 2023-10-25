<?php include("../Back-end/conection.php")?> <!--va a requerir o incluir db la cual esta llamando--> 
<?php include("includes/header.php")?><!--va a requerir o incluir header la cual esta llamando -->

<?php
$query_categorias = "SELECT id, nomCategoria FROM categoria";
$result_categorias = mysqli_query($conexion, $query_categorias);
?>

<div class="container p-4">
          <!-- apartado de mensajes -->
          <?php if(isset($_SESSION['message'])){ ?><!--si al comprobar la sesion, ya esta definida ara lo siguiente para almacenar en mensajes--> 
               <div class="alert alert-success" role="alert" id="success-alert">
               Se guardó el producto correctamente 
               <button type="button" class="close" id="close-success-alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
          <?php=$_SESSION['message']?><!--Los datos dal entrar en sesion se almacenan en los mensajes conforme la accion-->
          </div>
          </div>
     <!--se liberan todas las variables de sesión actualmente registradas, no destruye la sesión por lo que la sesión aún estaría activa.-->
          <?php session_unset(); } ?> 

<div class="container p-4"><!--div, para crear un contenedor y dentro de esto...-->
          <div class="col-md-4 mx-auto" > 

          <!--añadir tareas al formulario --> 
               <div class="card card-body"><!--se crea un contenedor, este sera el cuerpo--> 

                    <form action="../Back-end/guardar.php" method="POST" enctype="multipart/form-data"><!--Se hace un formulario dentro del contenedor que tendra finalidad de enviar datos--> 

                    <div class="form-group"><!--Contenedor--> 
                         <!--Se hace un inpunt (cuadro) donde indicaremos que se va a escribir, en este caso titulo de la actividad--> 
                         <input type="text" name="Nombre" class="form-control" placeholder="Nombre Producto" autofocus>
                    </div>

                    <div class="form-group"><!--Contenedor--> 
                         <!--Se hace un area de texto (cuadro) donde indicaremos que se va a escribir, en este caso Descripcion de la actividad--> 
                         <textarea name="Descripcion" rows="2" name="titulo" class="form-control" placeholder="Descripcion Producto"></textarea>
                    </div>
                    <div class="form-group"><!--Contenedor--> 
                         <!--Se hace un inpunt (cuadro) donde indicaremos que se va a escribir, en este caso titulo de la actividad--> 
                         <input type="text" name="Precio" class="form-control" placeholder="Precio" autofocus>
                    </div>
                    <div class="form-group"><!--Contenedor--> 
                         <!--Se hace un inpunt (cuadro) donde indicaremos que se va a escribir, en este caso titulo de la actividad--> 
                         <input type="text" name="Cantidad" class="form-control" placeholder="Cantidad" autofocus>
                    </div>

                    
                    <div class="form-group">
                    <label for="Categoria" class="form-label">Categoría *</label>
                    <select name="Categoria" class="form-control">
                    <?php while ($row_categoria = mysqli_fetch_assoc($result_categorias)) { ?>
                         <option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nomCategoria']; ?></option>
                    <?php } ?>
                    </select>
                    </div>



                    <div class="form-group">
                         <label for="imagen" class="form-label">Imagen *</label>
                         <input type="file" id="setImg" name="Imagen" class="form-control">
                    </div>

                    <!--Se hace un input (cuadro), este sera nuestro boton para guardar--> 
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
                    
                    </form>
                </div>

             
             <script>
          document.addEventListener("DOMContentLoaded", function () {
          const closeSuccessAlertButton = document.getElementById("close-success-alert");
          const successAlert = document.getElementById("success-alert");

          if (closeSuccessAlertButton && successAlert) {
               closeSuccessAlertButton.addEventListener("click", function () {
                    successAlert.style.display = "none"; // Oculta el div de alerta al hacer clic en el botón "close"
               });
          }
          });
</script>



