<?php

include 'database.php';


$query = "INSERT INTO test (name) VALUES ('abc')";

$statement = $connect->prepare($query);
$statement->execute();