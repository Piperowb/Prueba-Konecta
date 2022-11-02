<?php
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getEditarProductos($_GET['id']);


if (isset($_POST['cantidad'])) {
        $post = [
            'id_producto'                 => $_POST['id_producto'],
            'cantidad'                    => $_POST['cantidad'],
            'stock'                       => $_POST['stock'],

        ];

        $productos->postComprar($post);
        header('Location: index.php');
  ?>

  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          La venta ha sido realizada correctamente
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
      <h2 class="mt-4">Comprar un producto</h2>
      <hr>
      <form action="venta.php?id=<?=$_GET['id']?>" method="post">
        <div class="form-group">
          <label hidden for="id_producto">Id del producto:</label>
          <input type="text" name="id_producto" id="id_producto" class="form-control" value="<?= $fila->prd_id; ?>" hidden required>
        </div>
        <div class="form-group">
          <label>Nombre del producto:</label>
          <p class="form-control"> <?= $fila->prd_nombre; ?> </p>
        </div>
        <div class="form-group">
          <label>Precio:</label>
          <p class="form-control"><?= $fila->prd_precio; ?> </p>
        </div>
        <div class="form-group">
          <label>Cantidad disponible:</label>
          <p class="form-control"><?= $fila->prd_stock; ?> </p>
          <input type="number" name="stock" id="stock" value="<?= $fila->prd_stock; ?>" hidden required>
        </div>
        <div class="form-group">
          <label for="cantidad">Cantidad a comprar</label>
          <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Comprar">
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