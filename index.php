<?php 
    require_once 'php/producto.php';
    $productos = new _productos();
    $get_productos = $productos->getProductos();
 ?>

 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form action="index.php" method="post">
        <p>
            <label for="nombre">Nombre del producto:</label>
            <input id="nombre" type="text" name="nombre">
        </p>
        <p>
            <label for="referencia">Autor</label>
            <input id="referencia" type="text" name="referencia">
        </p>
        <p>
            <label for="precio">Precio</label>
            <input id="precio" type="number" name="precio">
        </p>
        <p>
            <label for="peso">Peso</label>
            <input id="peso" type="number" name="peso">
        </p>
        <p>
            <label for="categoria">Categoria:</label>
            <input id="categoria" type="text" name="categoria">
        </p>
        <p>
            <label for="stock">Stock:</label>
            <input id="stock" type="number" name="stock">
        </p>

        <p>
            <input type="submit" value="Guardar">
        </p>
    </form>

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
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>

            <?php 

                print_r($_POST);

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

                } 

                ?>

</body>
</html>