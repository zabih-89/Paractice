<?php 
    require_once("conn.php");
    if(isset($_POST["username"])){
        $username= $_POST["username"];
        $password= $_POST["password"];
        $insert=mysqli_query($conn,"INSERT INTO user VALUES(Null,'$username','$password')") or die(mysqli_error());
        if($insert){
            header("location:index.php?inserted=true");
        }else{
            header("location:createUser.php?insertError=true");
        }
    }
    if(isset($_GET["insertError"])){
        echo "Invalid username or password, please try again!";
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
<h2 class="text-center">Add New User</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

                <table class="form-group"> 
                    <form method="POST" style="text-align:center;">
                                    
                            <tr><td>Username</td><td><input type="text"  placeholder="Enter your username" name="username" class="form-control"></td></tr>
                            <tr><td>Password</td><td><input type="password" placeholder="Enter your password" name="password" class="form-control"></td></tr>
                            <tr><td><input type="submit" value="Add" name="submit" class="btn btn-primary"></td></tr>
                    
                    </form>
               </table>     
            </div>
        </div>
    </div>
</body>
</html>