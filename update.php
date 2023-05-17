<?php 
        require_once("conn.php");
        $id=$_GET["id"];
        $result=mysqli_query($conn,"SELECT * FROM pages WHERE id=$id");
        $row=mysqli_fetch_assoc($result);

    if(isset($_POST["subject-id"])){
        $subject_id =$_POST["subject-id"];
        $menu_name =$_POST["menu-name"];
        $postion=$_POST["position"];
        $visible=$_POST["visible"];
        $content=$_POST["content"];
        $updateResult=mysqli_query($conn,"UPDATE pages SET subject_id=$subject_id,menu_name='$menu_name',position=$postion,visible=$visible,content='$content' WHERE id=$id") or die(mysqli_error($conn));
        if($updateResult){
            header("location:index.php?updated=true");
        }
        else{
            header("location:update.php?updateError=true");
        }
    }
    if(isset($_GET["updateError"])){
        echo"Information has been not edited,please try again!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    input{
        border-top:none
    }
    </style>
</head>
<body>
<h2 class="text-center">Edit Page </h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <table>  
                    <form method="POST">
                        <tr><td>Subject_ID</td><td><input type="text" value="<?php echo $row["subject_id"]?>" class="form-control" name="subject-id"></td></tr>
                        <tr><td>Menu_Name</td><td><input type="text" value="<?php echo $row["menu_name"]?>" class="form-control" name="menu-name"></td></tr>
                        <tr><td>Position</td><td><input type="text" value="<?php echo $row["position"]?>" class="form-control" name="position"></td></tr>
                        <tr><td>Visible</td><td><input type="text" value="<?php echo $row["visible"]?>" class="form-control" name="visible"></td></tr>
                        <tr><td valign="top">Content</td><td><textarea name="content" id="" cols="30" rows="10"><?php echo $row["content"]?></textarea></td></tr>
                        <tr><td><input type="submit" class="btn btn-primary" name="submit" value="Update"></td></tr>

                    </form>  
                </table>  
            </div>
        </div>
    </div>
            
  
</body>
</html>