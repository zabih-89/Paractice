<?php 
require_once("conn.php");
if(isset($_POST["username"])) { 
    $username=$_POST["username"];
    $password=$_POST["password"];
    $query="SELECT * FROM user WHERE user_name='$username' && password='$password'";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if($result){
        header("location:index.php?loginSuccess=true");
    }
    else{
        header("location:login.php?loginError=true");
       
    }
}
if(isset($_GET["loginError"])){
    echo"<span style='color:red'>"."Invalid username or password"."</span>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<h2 class="text-center">Login Into Website</h2>
    <div class="container">
            
                <form method="POST" style="text-align:center;">
                    <table class="form-group">            
                        <tr><td>Username</td><td><input type="text"  placeholder="Enter your username" name="username" class="form-control"></td></tr>
                        <tr><td>Password</td><td><input type="password" placeholder="Enter your password" name="password" class="form-control"></td></tr>
                        <tr><td><input type="submit" value="Log In" name="submit" class="btn btn-success"></td></tr>
                    </table>
                </form>

            </div>
    
</body>
</html>