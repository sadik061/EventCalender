<?php
// Start the session
session_start();
?>
<?php include 'database.php';
$sql = "SELECT * FROM user where email='".$_POST["email"]."' and password='".$_POST["password"]."'";
$statement = $connect->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
if ($statement->rowCount() > 0) {
    // output data of each row
    foreach($result as $row)
    {
        $_SESSION["login"] = "true";
        $_SESSION["userid"] = $row["id"];
        $_SESSION["role"] = $row["role"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["image"] = $row["image"];
        setcookie("remember", "true", time() + (86400 * 30), "/");
        setcookie("id", $row["id"], time() + (86400 * 30), "/");
        setcookie("role", $row["role"], time() + (86400 * 30), "/");
        setcookie("name", $row["name"], time() + (86400 * 30), "/");
        setcookie("image", $row["image"], time() + (86400 * 30), "/");
       header('Location: ../index.php');
    }
} else {
    header('Location: ../login.php?type=alert&message=invalid username or password');
}

?>
