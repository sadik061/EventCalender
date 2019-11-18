<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel='icon' href='img/dgnm.png' type='image/x-icon'/ >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>DGNM</title>
</head>
<body data-gr-c-s-loaded="true">
<form class="form-signin" style="margin-left: 30%;margin-right: 30%;margin-top: 4%;" action="php/forgot.php" method="post">
    <div class="text-center mb-4">
    <img class="mb-4" src="img/logo.png"  width="100" height="100"><br>
    <img class="mb-4" src="img/dgnm.png" width="280" height="82" style="margin-top: -25px;">
        
        <p style="margin-top: -25px;">Enter your email address to recover password</p>
    </div>
    <?php if(isset($_GET["type"])){
    if($_GET["type"]=="alert"){?>
    <div class="alert alert-danger" role="alert">
       <?php echo $_GET["message"]; ?>
    </div>
    <?php }} ?>

    <div class="form-label-group">
    <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        
    </div>

  
<br>
  
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    <a href="login.php">Login page</a>

</form>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>