<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" enctype="multipart/form-data" class="form" action="" >
                    <div class="form-group input-group ">
                         <input type="file" name="photo" class="form-control">
                        <input type="hidden" value="upload" name="f" class="form-control">
                        <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST["f"]) ){
        echo $_FILES["photo"]["name"]."<br>";
        echo $_FILES["photo"]["tmp_name"]."<br>";
        echo $_FILES["photo"]["type"]."<br>";
        echo $_FILES["photo"]["size"];
        move_uploaded_file($_FILES["photo"]["tmp_name"],$_FILES["photo"]["name"]);
       
        //MIME:Mulit purpose Internet Mail Extention
        // Original Name,Temporary Name,Type,Size
        //name,tmp_name,type,size
    }

?>