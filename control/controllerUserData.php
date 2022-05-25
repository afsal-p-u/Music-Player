<?php
    session_start();
    require "connection.php";
    $email = "";
    $name = "" ;
    $errors = array();

if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);

    if($password != $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM datas WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

if(count($errors) === 0){
    $enpass = password_hash($password, PASSWORD_BCRYPT);
    $code = rand(999999, 111111);
    $status = "notVerified";
    $insert_data = "INSERT INTO datas (name, email, password, code, status)
                    values('$name','$email','$enpass','$code','$status')";
    $data_check = mysqli_query($conn, $insert_data);

    if($data_check){
        $subject = "Email Verification Code";
        $message = "Your verification code is $code";
        $sender = "From: sampleclgprojectafsal@gmail.com";
        if(mail($email, $subject, $message, $sender)){
            $info = "We've sent a verification code to your email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location: ../php/otp.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while sending code !";
        }
    }else{
        $errors['db-error'] = "Failed while inserting data into database!";
    }
  }
}


if(isset($_POST["check"])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST["otp"]);
    $check_code = "SELECT * FROM datas WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = "Verified";
        $update_otp = "UPDATE datas SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);

        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: ../home.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}



if(isset($_POST["login"])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $check_email = "SELECT * FROM datas WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        $code = $fetch['code'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'Verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ../home.php');
            }else{
                $info = "It's looks like you haven't verified your email - $email";
                $_SESSION['info'] = $info;

                $subject = "Email Verification Code";
                $message = "Your verification code is $code";
                $sender = "From: sampleclgprojectafsal@gmail.com";
                mail($email, $subject, $message, $sender);
                header('location: ../php/otp.php');
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's looks like you're not yet a member! Click on the bottom link to Signup.";
    }
}



if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM datas WHERE email = '$email'";
    $run_sql = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE datas SET code = $code WHERE email = '$email'";
        $run_query = mysqli_query($conn, $insert_code);

        if($run_query){
            $subject = "Password Reset Code ";
            $message = "Your password reset code is $code";
            $sender = "From: sampleclgprojectafsal@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent password reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: ../php/reset-code.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }else{
        $errors['db-error'] = "This email does not exist!";
    }
}


if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code =  "SELECT * FROM datas WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);

    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other websites";
        $_SESSION['info'] = $info;
        header('location: ../php/new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}



if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email'];
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE datas SET code =$code, password = '$encpass' WHERE email='$email'";
        $update_res = mysqli_query($conn, $update_pass);

        if($update_res){
            $info = "Your password changed, Now you can login with your new password";
            $_SESSION['info'] = $info;
            header('location: ../php/password-changed.php');
            exit();
        }else{

            $errors['db-error'] = "Failed to change your password!";
        }
    }
}


if(isset($_POST['login-now'])){
    header('location: ../php/login.php');
}