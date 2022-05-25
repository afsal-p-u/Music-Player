<?php require_once '../control/controllerUserData.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
                rel="stylesheet" 
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
                crossorigin="anonymous">        

                
</head>
<body>
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-4 offset-md-4 form login-form">
                <form action="login.php" method="post" autocomplete="off">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                        
                    
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
                        <input type="email" class="form-control" name="email" placeholder="Email Address"
                        required value="<?php $email ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password"
                        required value="<?php $password ?>">
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password? </a>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control button" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup.php">Signup Now</a></div>
                </form>
           </div>
       </div>
   </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
            crossorigin="anonymous"></script>
</body>
</html>