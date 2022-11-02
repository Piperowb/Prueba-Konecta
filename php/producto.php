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


            $sql = "INSERT INTO productos (prd_nombre, prd_referencia, prd_precio, prd_peso, prd_categoria, prd_stock, prd_creado) VALUES (:prd_nombre, :prd_referencia, :prd_precio, :prd_peso, :prd_categoria, :prd_stock, :prd_creado)"; 
            
            $statement = $connect->prepare($sql);

            $statement->bindParam(':prd_nombre', $data['nombre'], PDO::PARAM_STR);
            $statement->bindParam(':prd_referencia', $data['referencia'], PDO::PARAM_STR);
            $statement->bindParam(':prd_precio', $data['precio'], PDO::PARAM_INT);
            $statement->bindParam(':prd_peso', $data['peso'], PDO::PARAM_INT);
            $statement->bindParam(':prd_categoria', $data['categoria'], PDO::PARAM_STR);
            $statement->bindParam(':prd_stock', $data['stock'], PDO::PARAM_INT);
            $statement->bindParam(':prd_creado', $creado, PDO::PARAM_STR);
            $statement->execute();           

            $resultado = $connect->lastInsertId();
            //print_r($resultado);
            $connect = null;
			
		}

        function getEditarProductos($id) {

            //$creado = date("Y-m-d");
            $db = new DB();
            $connect = $db->connect();
            $productos = [];
            $sql = "SELECT * FROM productos WHERE prd_id = :prd_id"; 
            $query = $connect -> prepare($sql); 
            $query -> execute([
            'prd_id' => $id
            ]); 
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            if($query -> rowCount() > 0)   { 
                foreach($results as $result) { 
                    array_push($productos, $result);
               }
            }

            return $productos;
        }

        function postEditar($data) {

            /*print_r($data);
            exit;*/

            $creado = date("Y-m-d");
            $db = new DB();
            $connect = $db->connect();


            $sql = "UPDATE productos SET prd_nombre = :prd_nombre, prd_referencia = :prd_referencia, prd_precio = :prd_precio, prd_peso = :prd_peso, prd_categoria = :prd_categoria, prd_stock = :prd_stock WHERE prd_id = :prd_id"; 
            
            $statement = $connect->prepare($sql);

            $statement->bindParam(':prd_nombre', $data['nombre'], PDO::PARAM_STR);
            $statement->bindParam(':prd_referencia', $data['referencia'], PDO::PARAM_STR);
            $statement->bindParam(':prd_precio', $data['precio'], PDO::PARAM_INT);
            $statement->bindParam(':prd_peso', $data['peso'], PDO::PARAM_INT);
            $statement->bindParam(':prd_categoria', $data['categoria'], PDO::PARAM_STR);
            $statement->bindParam(':prd_stock', $data['stock'], PDO::PARAM_INT);
            //$statement->bindParam(':prd_creado', $creado, PDO::PARAM_STR);
            $statement->bindParam(':prd_id', $data['id'], PDO::PARAM_INT);
            $statement->execute();           

            $resultado = $connect->lastInsertId();
            //print_r($resultado);
            $connect = null;
            
        }


        //Funcion para traer los datos de las ventas realizadas
        function getVentas() {

            //$creado = date("Y-m-d");
            $db = new DB();
            $connect = $db->connect();
            $productos = [];
            $sql = "SELECT * FROM ventas INNER JOIN productos
            ON ventas.vnt_prd_id = productos.prd_id"; 
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


        function postComprar($data) {

            /*print_r($data);
            exit;*/

            $creado = date("Y-m-d");
            $db = new DB();
            $connect = $db->connect();

            if ($data['cantidad']>$data['stock']){
                return 0;
            }else{
                $stock = $data['stock'] - $data['cantidad'];

                $sql = "INSERT INTO ventas (vnt_prd_id, vnt_cantidad) VALUES (:vnt_prd_id, :vnt_cantidad)";  
                $statement = $connect->prepare($sql);
                $statement->bindParam(':vnt_prd_id', $data['id_producto'], PDO::PARAM_INT);
                $statement->bindParam(':vnt_cantidad', $data['cantidad'], PDO::PARAM_INT);
                $statement->execute();    

                $sql2 = "UPDATE productos SET prd_stock = :prd_stock WHERE prd_id = :prd_id"; 
                $statement = $connect->prepare($sql2);
                $statement->bindParam(':prd_stock', $stock, PDO::PARAM_INT);
                $statement->bindParam(':prd_id', $data['id_producto'], PDO::PARAM_INT);
                $statement->execute();        

                $resultado = $connect->lastInsertId();
            //print_r($resultado);
                $connect = null;
            }

            
            
        }

	}

 ?>
