<?php require_once("navbar.html");  ?>
<?php if(isset($_GET["insert"])){?>
    <div class="alert alert-success" id="insertsuccess" role="alert">
        Data has been successfully inserted! 
    </div>
<?php }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.c">
    
</head>
<body >
    <div class="container-fluid ">
        <div class="row">
            <!-- Student Information -->
            <div class="col-md-8 text-center">
                <h2 class="display4 mb-4">Students Information</h2>
            <div class="table-responsive"> 
                    <table class="table align-middle">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>LastName</th>
                            <th>FatherName</th>
                            <th>Gender</th>
                            <th>DoB</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                <?php 
                require_once("StudentDBConnection.php");
                 $rows=mysqli_query($conn,"SELECT * FROM student");
                $row=mysqli_fetch_assoc($rows);
                do{?>
              
                        <tbody>
                        <tr>
                            <td><?php echo $row["FirstName"] ?></td>
                            <td><?php echo $row["LastName"] ?></td>
                            <td><?php echo $row["FatherName"] ?></td>
                            <td><?php echo $row["Gender"] ?></td>
                            <td><?php echo $row["DoB"] ?></td>
                            <td><?php echo $row["Address"] ?></td>
                            <td><?php echo $row["Phone"] ?></td>
                            <td><?php echo $row["Email"] ?></td>
                            <td><img src="<?php echo $row["Photo"] ?>" class="img-fluid" alt=""></td>
                            <td><img src="images/edit.png" class="img-responsive" alt=""></td>
                            <td><img src="images/cancel1.png" class="img-responsive" alt=""></td>
                            
                        </tr>
                        </tbody>
                 
                <?php }while( $row=mysqli_fetch_assoc($rows));?>
                 </table>
                </div>
            </div>
            <!-- Student Information -->
            <!-- right sidebar -->
            <div class="col">
                <h3 class="diplay3 mb-4">Recent Students</h3>
                <?php
                require_once("StudentDBConnection.php");
                $rows=mysqli_query($conn,"SELECT * FROM student");
                $row=mysqli_fetch_assoc($rows);
                 do{?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?php echo $row["Photo"] ?>" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["FirstName"] ?></h5>
                            <p class="card-text"></p>
                            <a href="#" class="card-link  text-decoration-none"><?php echo $row["Email"] ?></a>
                        </div>
                        </div>
                    </div>
                </div>
                <?php }while($row=mysqli_fetch_assoc($rows)) ?>
            </div>
            <!-- right sidebar -->
        </div>
    </div>
    
     <!--script part  -->
    <script>
        $('document').ready(function(){
            $('submitbtn').click(function(){
                $('div#inserterror').fade(3000);
                $('div#insertsuccess').fade(3000);
                $('div#fileerror').fade(3000);
            });
        });
    </script>
     <!--script part  -->
    <script src="js/jquery-3.6.4.min.js"></script>
</body>
</html>