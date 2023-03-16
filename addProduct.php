<?php 


    require_once 'connect.php';
    if(!empty($_POST['addProduct'])){
        try{

            
            $sql = "INSERT INTO products (p_name, p_price, p_desc, p_img) VALUES (:p_name, :p_price, :p_desc, :p_img)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ":p_name" => $_POST['p_name'], 
                ":p_price" => $_POST['p_price'],
                ":p_desc" => $_POST['p_desc'],
                ":p_img" => $_POST['p_img'],
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