<?php
    require('config.php');
    if(isset($_POST['submit'])){
        $username = addslashes($_POST['username']);
        $password = md5(addslashes($_POST['password']));
        $verify_password = md5(addslashes($_POST['verify_password']));
        $email = addslashes($_POST['email']);
        if(!$username || !$password || !$verify_password || !$email){
            echo "Xin vui lòng nhập đầy đủ thông tin";
        }
        if($password != $verify_password){
            echo "Mật khẩu không giống nhau, vui lòng nhập lại";
        }
        $sql = "INSERT INTO users(username,	email ,pass) 
                VALUES('$username', '$email', '$password')
        ";
        $query = mysqli_query($conn, $sql);
        if(!$query){
            die();
        }else{
            header('location:login.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div>
        <h3 class="text-center text-white pt-5">Register form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Name:</label><br>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="verify_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit"  value="Đăng ký">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>