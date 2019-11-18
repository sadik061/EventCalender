<?php
// Start the session
session_start();
if(isset($_POST["user_name"])){
    setcookie("name", $_POST["user_name"], time() + (86400 * 30), "/");
        
}
?>
<?php
$target_dir = "../img/";
$target_file = $target_dir . date('dmYHis') . round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
$name = date('dmYHis') . round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        
        $uploadOk = 1;
    } else {
        
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    include 'database.php';
        $sql = "UPDATE user SET name='" . $_POST["user_name"] . "', email='" . strtolower($_POST["email"]) . "', password='" . $_POST["password"] . "' WHERE id=" . $_SESSION['userid'];
        $statement = $connect->prepare($sql);
            $statement->execute();
        header("Location: ../settings.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        setcookie("image", date('dmYHis') . round(microtime(true)) .basename($_FILES["fileToUpload"]["name"]), time() + (86400 * 30), "/");
        include 'database.php';
        $sql = "UPDATE user SET name='" . $_POST["user_name"] . "', email='" . strtolower($_POST["email"]) . "', password='" . $_POST["password"] . "', image='" . date('dmYHis') . round(microtime(true)) .basename($_FILES["fileToUpload"]["name"]). "' WHERE id=" . $_SESSION['userid'];
        $statement = $connect->prepare($sql);
            $statement->execute();
        header("Location: ../settings.php");
    } else {
       
    include 'database.php';
        
        $sql = "UPDATE user SET name='" . $_POST["user_name"] . "', email='" . strtolower($_POST["email"]) . "', password='" . $_POST["password"] . "' WHERE id=" . $_SESSION['userid'];
        $statement = $connect->prepare($sql);
            $statement->execute();
            
        header("Location: ../settings.php");
    }
}
?>



?>