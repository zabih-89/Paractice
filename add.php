<?php
    require_once("conn.php");
    if(isset($_POST["submit"])){
        $subject_id=$_POST["subject-id"];
        $menu_name=$_POST["menu-name"];
        $position=$_POST["position"];
        $visible=$_POST["visible"];
        $content=$_POST["content"];

        $inserted=mysqli_query($conn,"INSERT INTO pages VALUES(Null,$subject_id,'$menu_name',$position,$visible,'$content')") or die(mysqli_error($conn));
        if($inserted){
            header("location:index.php?added=true");
        }
        else{
            header("location:add.php?NotAdded=true");
        }
    }
    else{
        echo "form has been not sumbitted, please try again! " or die(mysqli_error($conn));
    }
?>
<?php 
    if(isset($_GET["NotAdded"])){
        echo "<span style='red'>"." Data has been not added, please try again!"."<span>" or die(mysqli_error($conn));
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
<h2 class="text-center">Add new page</h2>
<div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form method="POST" style="text-align:center;">
                    <table class="form-group">            
                        <tr><td>Subject_ID</td><td><input type="text" name="subject-id" class="form-control"></td></tr>
                        <tr><td>Menu_Name</td><td><input type="text" name="menu-name" class="form-control"></td></tr>
                        <tr><td>Position</td><td><input type="text" name="position" class="form-control"></td></tr>
                        <tr><td>Visible</td><td><input type="text" name="visible" class="form-control"></td></tr>
                        <tr><td valign="top">Content</td><td><textarea  class="form-control" name="content" id="content" cols="30" rows="10"></textarea></td></tr>
                        <tr><td><input type="submit" value="Add" name="submit" class="btn btn-primary"></td></tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>
