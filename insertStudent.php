<?php 
     require_once("navbar.html"); 
    require_once("StudentDBConnection.php");
    // Data Insertion.....
    if(isset($_POST["firstname"])){
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $fathername=$_POST["fathername"];
        $gender=$_POST["gender"];
        $dob=$_POST["dob"];
        $address=$_POST["address"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $photo="images/".$_FILES["photo"]["name"];
        
        
       $fileuploade= move_uploaded_file($_FILES["photo"]["tmp_name"],"images/".$_FILES["photo"]["name"]);
       if(!$fileuploade){
        header("location:insertStudent.php?notuploaded=true");
       }
       
        $query=$conn->query("INSERT INTO student VALUES(null,'$firstname','$lastname','$fathername','$gender','$dob','$address',$phone,'$email','$photo')") or mysqli_connect_error();
        if($query){
            header("location:stdinfo.php?insert=done");
        }
        else{
            header("location:insertStudent.php?error=occured");
        }

      
    }
    if(!$conn){
        echo mysqli_connect_error();
    }
   $conn->close();
?>

<?php if(isset($_GET["notuploaded"])){?>
    <div class="alert alert-warning" id="fileerror" role="alert">
       please select your photo! 
    </div>
<?php }?>
<?php if(isset($_GET["error"])){?>
    <div class="alert alert-danger" id="inserterror" role="alert">
        Data has been not inserted! <a href="#" class="alert-link">Need Help?</a>
    </div>
<?php }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <h2 class="h2 text-center"> Add Student </h2>
                <form action="#" class="form" method="post" enctype="multipart/form-data">
                    <div class=" mb-2 form-group">
                        <label for="firstname" class="form-label">FirstName</label>
                        <input type="text" name="firstname" class="form-control">
                    </div>
                    <div class="mb-2 form-group">
                        <label for="lastname" class="form-label">LastName</label>
                        <input type="text" name="lastname" class="form-control">
                    </div>
                    <div class="mb-2 form-group">
                        <label for="fathername" class="form-label">FatherName</label>
                        <input type="text" name="fathername" class="form-control">
                    </div>
                    <div class="mb-2 form-group">
                        <label for="gender" class="form-label">Male</label>
                        <input type="radio" value="male" name="gender" class="form-check-input">
                        <label for="gender" class="form-label">Female</label>
                        <input type="radio" value="female" name="gender" class="form-check-input">
                    </div>
                    <div class="mb-2 form-group">
                        <label for="dob" class="lable">DoB</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="mb-2 form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>  
                    <div class="mb-2 form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control">
                    </div> 
                    <div class="mb-2 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div> 
                    <div class="mb-2 form-group">
                        <input type="file" class="form-control" name="photo" placeholder="Username">
                    </div> 
                    <div class="mb-2 form-group">
                        <input type="submit" id="submitbtn" class="btn btn-primary form-control" value="Add" name="submit" >
                    </div>                 
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>