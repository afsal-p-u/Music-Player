<?php require_once "../control/controllerUserData.php"; ?>
<?php
    $email = $_SESSION['email'];
    if($email == false){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
                rel="stylesheet" 
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
                crossorigin="anonymous">        
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 form">
                    <form action="reset-code.php" method="post" autocomplete="off">
                        <h2 class="text-center">Code Verification</h2>
                        

                        <?php
                            if(isset($_SESSION['info'])){
                        ?>
                            <div class="alert alert-success text-center">
                                <?php
                                    echo $_SESSION['info']
                                ?>
                            </div>
                            <?php
                            }
                            ?>

                        <?php
                            if(count($errors) > 0){
                        ?>
                            <div class="text-center alert alert-danger">
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
                            <input type="number" name="otp" placeholder="Enter Code" class="form-control"
                            required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" name="check-reset-otp" class="form-control button">
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