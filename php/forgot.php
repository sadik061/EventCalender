<?php
    include 'database.php';
    include 'mail.php';
    $query = "SELECT * FROM user where email like '%".$_POST['email']."%'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $msg="No account found with this email address";
    foreach ($result as $row) {
        $msg="You pervious passowrd is ".$row["password"];
    }
    $subject="Recovery Password";
    sendEmail($_POST['email'],$subject,$msg);
    header('Location: ../login.php?type=alert&message=Please check your email');
?>