<?php 
if(isset($_GET["id"])){
require_once("conn.php");
$id=$_GET["id"];
$result= mysqli_query($conn,"DELETE FROM pages where id=$id");
if($result){
    header("location:index.php?deleted=true");
}
else{
    header("location:index.php?NotDeleted=true");
}

mysqli_close($conn);
}
else{
    header("location:login.php");
}
?>