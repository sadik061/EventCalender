<?php include 'database.php';
        $sql = "INSERT INTO user (name, email, password,role) VALUES (:name,:email,:password,:role)";
            $statement= $connect->prepare($sql);
            $data = [
                ':name' => $_POST["auser_name"],
                ':email' => $_POST["aemail"],
                ':password' => $_POST["apassword"],
                ':role' => '0',
            ];
            $statement->execute($data);
        header("Location: ../settings.php"); 
?>