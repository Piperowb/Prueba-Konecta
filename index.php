<?php 
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getProductos();
    $get_ventas = $productos->getVentas();
    $get_max_stock = $productos->getProductoMayorStock();
    $get_max_ventas = $productos->getProductoMayorVentas();
 ?>

 
<?php include "templates/header.php"; ?>

    
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear producto</a>
      <hr>
    </div>
  </div>
</div>
    
    <!-- Tabla que imprime los datos de la tabla productos -->
    <h2>Inventario de productos</h2>
    <table class="table table-striped">
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
                  <a href="<?='venta.php?id='.$fila->prd_id; ?>">🛒Comprar</a>
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


    <!-- Tabla que imprime los datos de la tabla ventas -->
    <h2>Ventas realizadas</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id. Producto</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Ventas</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($get_ventas>0) {
            foreach ($get_ventas as $fila) {
              ?>
              <tr>
                <td><?php echo $fila->prd_id; ?></td>
                <td><?php echo $fila->prd_nombre; ?></td>
                <td><?php echo $fila->prd_referencia; ?></td>
                <td><?php echo $fila->prd_precio; ?></td>
                <td><?php echo $fila->prd_peso; ?></td>
                <td><?php echo $fila->prd_categoria; ?></td>
                <td><?php echo $fila->vnt_cantidad; ?></td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>

      <?php
          if ($get_max_stock>0) {
            foreach ($get_max_stock as $fila) {
              ?>
                  <p class="form-control"> EL PRODUCTO CON MAYOR CANTIDAD DE STOCK ES : "<?php echo $fila->prd_nombre; ?>" CON UNA CANTIDAD DE <?php echo $fila->stock; ?> STOCKS DISPONIBLES.</p>
              <?php
            }
          }
       ?>

       <?php
          if ($get_max_ventas>0) {
            foreach ($get_max_ventas as $fila) {
              ?>
                  <p class="form-control"> EL PRODUCTO MAS VENDIDO ES : "<?php echo $fila->prd_nombre; ?>" CON UNA CANTIDAD DE <?php echo $fila->ventas; ?> PRODUCTOS VENDIDOS.</p>
              <?php
            }
          }
       ?>

      

<?php include "templates/footer.php"; ?>