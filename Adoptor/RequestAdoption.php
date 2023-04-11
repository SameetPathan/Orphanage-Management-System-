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

    <title>Update | Manage Orphanage</title>
  
</head>


<body>

<?php

        //for sql connection
        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = '';  
        $dbname = 'orphanage-master';  
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
            die('Could not connect: ' . mysqli_connect_error());  
        }  

    
        
        ?>

<nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;color:black">Orphanage Management System</a>

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

    <div class="container mt-3 p-5">

<?php 
        $aadharcard=$_POST['aadharcard'];
        $user=$_SESSION["aadharcard"];
        $result = mysqli_query($conn, "SELECT * FROM adopter WHERE aadharcard = '$user'");
        while($row = mysqli_fetch_array($result))
        {
    ?>

    <form class="container" action="responseAdoption.php" method="post">

    <input type="text" name="childaadhard" hidden value="<?php echo $aadharcard ?>">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Adopter Aadharcard</span>
        <input type="text" class="form-control" value="<?php echo $row['aadharcard']; ?>" name="adopter_aadharcard" required><br><br>
            </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Full Name</span>
            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="full_name" required><br><br>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone</span>
            <input type="text" class="form-control" value="<?php echo $row['phone']; ?>" name="phone" required><br><br>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Address</span>
            <input type="text" class="form-control" value="<?php echo $row['address']; ?>" name="address" required><br><br>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Adoption Date</span>
            <input type="date" class="form-control"  name="adoption_date" required><br><br>
        </div>


            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Reason</span>
        <input type="text" class="form-control" name="reason" required><br><br>
            </div>
    
      
        <div class="input-group mb-3">
            <input type="submit" class="form-control btn btn-success" value="Request">
            </div>
        </form>
        <?php } ?>
</div>






    

    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>