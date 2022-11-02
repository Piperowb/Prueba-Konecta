<?php
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getEditarProductos($_GET['id']);


if (isset($_POST['nombre'])) {
        $post = [
            'nombre'                   => $_POST['nombre'],
            'referencia'               => $_POST['referencia'],
            'precio'                   => $_POST['precio'],
            'peso'                     => $_POST['peso'],
            'categoria'                => $_POST['categoria'],
            'stock'                    => $_POST['stock'],
            'id'                       => $_POST['id'],
        ];

        $productos->postEditar($post);
        header('Location: index.php');
  ?>

  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          El producto ha sido actualizado correctamente
        </div>
      </div>
    </div>
  </div>
<?php  
}
?>

 <?php include "templates/header.php"; ?>

<?php
if ($get_productos>0) {
    foreach ($get_productos as $fila) {
  ?>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Editar un producto</h2>
      <hr>
      <form action="editar.php?id=<?=$_GET['id']?>" method="post">
        <div class="form-group">
          <label hidden for="id">Id del producto:</label>
          <input type="text" name="id" id="id" class="form-control" value="<?= $fila->prd_id; ?>" hidden required>
        </div>
        <div class="form-group">
          <label for="nombre">Nombre del producto:</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $fila->prd_nombre; ?>"  required>
        </div>
        <div class="form-group">
          <label for="referencia">Referencia:</label>
          <input type="text" name="referencia" id="referencia" class="form-control" value="<?= $fila->prd_referencia; ?>"  required>
        </div>
        <div class="form-group">
          <label for="precio">Precio:</label>
          <input type="number" name="precio" id="precio" class="form-control" value="<?= $fila->prd_precio; ?>"  required>
        </div>
        <div class="form-group">
          <label for="peso">Peso</label>
          <input type="number" name="peso" id="peso" class="form-control" value="<?= $fila->prd_peso; ?>"  required>
        </div>
        <div class="form-group">
          <label for="categoria">Categoria</label>
          <input type="text" name="categoria" id="categoria" class="form-control" value="<?= $fila->prd_categoria; ?>"  required>
        </div>
        <div class="form-group">
          <label for="stock">stock</label>
          <input type="number" name="stock" id="stock" class="form-control" value="<?= $fila->prd_stock; ?>"  required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Actualizar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php
   }
}
?>

<?php require "templates/footer.php"; ?>