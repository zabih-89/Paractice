<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body dir="">


    <div class="container-fluid">
        <div class="row">
            <div  class=" text-white col-sm-12 bg-primary">
                <h3 class="text-center">Khoshal Khan High School Students Information </h3>
            </div>
            <div class="row">
            <?php if(isset($_GET["deleted"])){ ?>
                <div class=" collapse" id="deleteAlert">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data deleted!</strong><span>Data deleted successfully.</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                    </div>
                
          
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- <?php 

        $file=fopen("info.txt","w");
        $date="Last Visit: " .date("l d M Y -- H:i:s");
        echo $date;
        fclose($file);

        include("jdf.php");
        echo "<div class='btn btn-info'>".jdate(" d p Y"), "</div>";
        echo "<br>";
        date_default_timezone_set('Asia/kabul'); 
        $file=fopen("info.txt","w");
        $date="Current Visit: " .date("l d M Y -- H:i:s");
        echo $date;
        fwrite($file,$date."\r\n");
        fclose($file);
    
    ?> -->
   <?php 
    require_once("conn.php");
    $query="SELECT * FROM pages;" 
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                <table  style="border:1px " class="table-hover">
                            <tr>
                                <th >ID </th>
                                <th>Subject_id</th>
                                <th>Menu_name</th>
                                <th>Position</th>
                                <th>Visible</th>
                                <th>Content</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>    
                    <?php 
                        $rows= mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($rows);
                        do{
                    ?> 
                            <tr>
                                <td><?php echo $row["id"]  ?></td>
                                <td><?php echo $row["subject_id"]  ?></td>
                                <td><?php echo $row["menu_name"]  ?></td>
                                <td><?php echo $row["position"]  ?></td>
                                <td><?php echo $row["visible"]  ?></td>
                                <td><?php echo $row["content"]  ?></td>
                                <td  style="text-align:center">
                                    <a data-bs-toggle='collapse' data-bs-target='#deleteAlert' href="delete.php?id=<?php echo $row['id']?>">
                                        <img  src="images/cancel1.png" alt="cancel">
                                    </a>
                                </td>
                                <td style="text-align:center">
                                    <a href="update.php?id=<?php echo $row['id']?>">
                                        <img  src="images/edit.png" alt="cancel">
                                    </a>
                                </td>
                            </tr>
                <?php  }while( $row = mysqli_fetch_assoc($rows));  ?>
                </table>
            <a  class="btn btn-primary" href="add.php"> Add New</a>                
            </div>
            <div class="col-sm-3 bg-warning">       
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 bg-black text-white text-center" style="padding:1em 0" >
                Copy Rights &copy; <?php  echo date("Y"); ?> All rights reserved!
            </div>
        </div>
    </div>
</body>
</html>