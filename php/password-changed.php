<?php require_once "../control/controllerUserData.php"; ?>
<?php 
$session = $_SESSION['info'];
if($session == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/password-changed.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">

                <?php 
                    if(isset($_SESSION['info'])){
                ?>
                    <div class="alert alert-success text-center">
                        <?php
                            echo $_SESSION['info'];
                        ?>
                    </div>
                    <?php
                    }
                    ?>



                <form action="login.php" method="POST" autocomplete="off">

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous"></script>

</body>
</html>