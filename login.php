<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php
	require_once("config.php");
	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from users where email = '$username' and pass = '$password'";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
                $rememember = isset($_POST['remember_me']) ? 1 : 0;
                if($rememember == 1){
                    $name = 'email';
                    $value = $username;
                    $exprice = time()+ 3600;
                    $path = '/';
                    setcookie($name, $value, $exprice, $path);
                    # setcookie cho password
                    $name = 'pass';
                    $value = $_POST["password"];
                    $exprice = time()+ 36000;
                    $path = '/';
                    setcookie($name, $value, $exprice, $path);
                }else{
                    header('location:login.php');
                }
				$_SESSION['username'] = $username;
                header('location: view_product.php');
                
			}
		}
	}
    $user = "";
    $pass = "";
    $check = false;
    if(isset($_COOKIE["email"]) && isset($_COOKIE["pass"])){
        $user = $_COOKIE["email"];
        $pass = $_COOKIE["pass"];
        $check = true;
    }
?>

    <div>
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input value="<?php echo $user?>" type="email" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input value="<?php echo $pass?>" type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input <?php echo ($check) ?"checked" : ""?> name="remember_me" value="1" type="checkbox"></span></label><br>
                                <input  type="submit" name="submit"  value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>