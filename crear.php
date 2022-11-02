<?php 
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getProductos();
 ?>

 
<?php include "templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un producto</h2>
      <hr>
      <form action="crear.php" method="post">
        <div class="form-group">
          <label for="nombre">Nombre del producto:</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="referencia">Referencia:</label>
          <input type="text" name="referencia" id="referencia" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="precio">Precio:</label>
          <input type="number" name="precio" id="precio" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="peso">Peso</label>
          <input type="number" name="peso" id="peso" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="stock">stock</label>
          <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Guardar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>


            <?php 

                //print_r($_POST);

                if (isset($_POST['nombre'])) {                 
                    $post = [
                    'nombre'                   => $_POST['nombre'],
                    'referencia'               => $_POST['referencia'],
                    'precio'                   => $_POST['precio'],
                    'peso'                     => $_POST['peso'],
                    'categoria'                => $_POST['categoria'],
                    'stock'                    => $_POST['stock'],

                ];

                $productos->postCrear($post);
                header('Location: index.php');
                } 

                ?>

<?php include "templates/footer.php"; ?>