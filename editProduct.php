<?php 
        require_once 'connect.php';
        
        if(!empty($_POST['editProduct'])){
            try{
                $id = $_GET['id'];
            $data = [
                ":p_name" => $_POST['p_name'], 
                ":p_price" => $_POST['p_price'],
                ":p_desc" => $_POST['p_desc'],
                ":p_img" => $_POST['p_img'],
                ":id" => $id,
            ];

             print_r($id);
            $sql = "UPDATE products SET p_name = :p_name , p_price = :p_price, p_desc = :p_desc, p_img = :p_img WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute($data);

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