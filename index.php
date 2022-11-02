<?php 
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getProductos();
 ?>

 
<?php include "templates/header.php"; ?>

    
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
    </div>
  </div>
</div>


    <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>Fecha creacion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($get_productos>0) {
            foreach ($get_productos as $fila) {
              ?>
              <tr>
                <td><?php echo $fila->prd_id; ?></td>
                <td><?php echo $fila->prd_nombre; ?></td>
                <td><?php echo $fila->prd_referencia; ?></td>
                <td><?php echo $fila->prd_precio; ?></td>
                <td><?php echo $fila->prd_peso; ?></td>
                <td><?php echo $fila->prd_categoria; ?></td>
                <td><?php echo $fila->prd_stock; ?></td>
                <td><?php echo $fila->prd_creado; ?></td>
                <td>
                  <a href="<?='borrar.php?id='.$fila->prd_id; ?>">🗑️Borrar</a>
                  <a href="<?='editar.php?id='.$fila->prd_id; ?>">✏️Editar</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>


<?php include "templates/footer.php"; ?>