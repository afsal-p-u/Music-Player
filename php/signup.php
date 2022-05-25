<?php require_once "../control/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/signup.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
                rel="stylesheet" 
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
                crossorigin="anonymous">        
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup.php" method="post" autocomplete="off">
                    <h2 class="text-center">Signup form</h2>
                    <p class="text-center">It's quick and easy</p>

                    <?php
                        if(count($errors) == 1){
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                            ?>
                        </div>
                        <?php
                        }else if(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                                foreach($errors as $showerror){
                                    ?>
                                    <li><?php echo $showerror; ?></li>
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                        }
                    ?>

                    <div class="form-group">
                        <input type="text" name ="name" placeholder="Full Name" class="form-control" 
                        required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name ="email" placeholder="Email Address" class="form-control" 
                        required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name ="password" placeholder="Password" class="form-control" 
                        required>
                    </div>
                    <div class="form-group">
                        <input type="password" name ="cpassword" placeholder="Confirm Password" class="form-control" 
                        required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name ="signup" placeholder="Confirm Password" class="form-control button" 
                        value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member ? <a href="login.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous"></script>
</body>
</html>