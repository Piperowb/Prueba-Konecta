<?php 
	require_once 'conexion.php';

    class _productos {

        

		function getProductos() {

            //$creado = date("Y-m-d");
            $db = new DB();
			$connect = $db->connect();
			$productos = [];
			$sql = "SELECT * FROM productos"; 
			$query = $connect -> prepare($sql); 
			$query -> execute(); 
			$results = $query -> fetchAll(PDO::FETCH_OBJ);
			if($query -> rowCount() > 0)   { 
				foreach($results as $result) { 
					array_push($productos, $result);
			   }
			}

			return $productos;
		}

        function postCrear($data) {

            

            $creado = date("Y-m-d");
            $db = new DB();
			$connect = $db->connect();


            $sql = "INSERT INTO `productos` (`prd_nombre`, `prd_referencia`, `prd_precio`, `prd_peso`, `prd_categoria`, `prd_stock`, `prd_creado`) VALUES (':prd_nombre', ':prd_referencia', ':prd_precio', ':prd_peso', ':prd_categoria', ':prd_stock', ':prd_creado')"; 
            
            $statement = $connect->prepare($sql);

            $statement->bindParam(':prd_nombre', $data['nombre'], PDO::PARAM_STR);
            $statement->bindParam(':prd_referencia', $data['referencia'], PDO::PARAM_STR);
            $statement->bindParam(':prd_precio', $data['precio'], PDO::PARAM_INV);
            $statement->bindParam(':prd_peso', $data['peso'], PDO::PARAM_INV);
            $statement->bindParam(':prd_categoria', $data['categoria'], PDO::PARAM_STR);
            $statement->bindParam(':prd_stock', $data['stock'], PDO::PARAM_INV);
            $statement->bindParam(':prd_creado', $creado, PDO::PARAM_STR);
            $statement->execute();

            /*$params = [
                'prd_nombre'=>$data['nombre'],
                'prd_referencia'=>$data['referencia'],
                'prd_precio'=>$data['precio'],
                'prd_peso'=>$data['peso'],
                'prd_categoria'=>$data['categoria'],
                'prd_stock'=>$data['stock'],
                'prd_creado'=>$creado,
            ];

            print_r($params);*/

            

            $resultado = $connect->lastInsertId();
            print_r($resultado);
            $connect = null;
			
		}

	}

 ?>
