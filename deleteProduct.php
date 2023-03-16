<?php 
require_once 'connect.php';
    if(!empty($_POST['deleteProduct'])){
        try{
            $id = $_GET['id'];
            print_r($id);
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ":id" => $id,
            ]);

            if(!empty($result)){
                header("location: index.php");
            } else {
                echo "Error";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




?>