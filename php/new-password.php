<?php require_once "../control/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/new-password.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Create a New Password</h2>


                    <?php
                        if(isset($_SESSION['info'])){
                    ?>
                        <div class="alert alert-success text-center">
                            <?php
                                echo $_SESSION['info'] ;
                            ?>
                        </div>
                        <?php
                        }
                        ?>

                    <?php
                        if(count($errors) > 0){
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                        
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create a New Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
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