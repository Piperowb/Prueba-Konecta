<?php 
    require_once 'php/producto.php';
    $productos = new _productos();
 ?>

 
 <?php include "templates/header.php"; ?>

 <?php 

//print_r($_POST);

 if (isset($_GET['id'])) {                 
    $post = [
        'id'  => $_GET['id'],

    ];

    $productos->postEliminar($post);
    header('Location: index.php');
} 

?>

<?php include "templates/footer.php"; ?>