<?php
    include 'database.php';
    $query = "INSERT INTO institute (namee, area, contact, address) VALUES (:namee, :area, :contact, :address)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':namee'  => $_POST['namee'],
            ':area'  => $_POST['area'],
            ':contact' => $_POST['contact'],
            ':address' => $_POST['address'],
        )
    );
?>