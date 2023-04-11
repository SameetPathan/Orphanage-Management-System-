<?php
ob_start();
session_start(); 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin | Manage Orphanage</title>
  
</head>

<?php

$host = 'localhost:3306';  
$user = 'root';  
$pass = '';  
$dbname = 'orphanage-master';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(! $conn )  
{  
    die('Could not connect: ' .  mysqli_connect_error()); 
} 


$sql1 = "SELECT COUNT(*) FROM adopter";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$adopter = $row1["COUNT(*)"];


$sql2 = "SELECT COUNT(*) FROM adopterrequest";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$adopterrequest = $row2["COUNT(*)"];

$sql3 = "SELECT COUNT(*) FROM donar";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$donar = $row3["COUNT(*)"];

$sql4 = "SELECT COUNT(*) FROM donation";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
$donation = $row4["COUNT(*)"];

$sql5 = "SELECT COUNT(*) FROM orphan_children";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
$orphan_children = $row5["COUNT(*)"];

?>


<body>

<nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-weight: bold;color:black">Orphanage Management System</a>

            <form class="d-flex">
            <a class="nav-link" href="Manage.php"><span style="font-weight: bold;color:green;">Manage Orphanage</span></a>
            <a class="nav-link" href="checkdonation.php"><span style="font-weight: bold;color:darkslategray;">Check Donation</span></a>
            <a class="nav-link" href="grantrequest.php"><span style="font-weight: bold;color:darkslategray;">Grant Request</span></a>
               
            </form>
            <form class="d-flex">
                
              <a href="logout.php" >  <button type="button" class="btn btn-outline-danger"  style="margin-right: 10px;">Logout</button></a>
              <span class="badge bg-success">USER <?php  echo $_SESSION["aadharcard"]; ?></span>
            </form>
           
        </div>
    </nav>
    <!--Navbar End-->


    <div class="d-flex justify-content-evenly mt-4">

    <div> 
    
        <button type="button" class="btn btn-primary" style="height: 100px;width:100px">
        Donars <span class="badge bg-success"><?php echo $donar; ?></span>
        </button>
    </div>

    <div> 
        <button type="button" class="btn btn-primary" style="height: 100px;width:100px">
        Adopters <span class="badge bg-success"><?php echo $adopter; ?></span>
        </button>
    </div>

    <div> 
        <button type="button" class="btn btn-primary" style="height: 100px;width:100px">
        Childrens <span class="badge bg-success"><?php echo $orphan_children; ?></span>
        </button>
    </div>

    <div> 
        <button type="button" class="btn btn-primary" style="height: 100px;width:100px">
        Requests <span class="badge bg-success"><?php echo $adopterrequest; ?></span>
        </button>
    </div>

    </div>

    

    



    

    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>