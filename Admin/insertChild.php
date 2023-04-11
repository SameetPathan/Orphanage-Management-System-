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

<body>
    <!----->

    <!----->

    <!--Navbar--->
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
    <!--Navbar End--->
    <div class="container-fluid">
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

        $aadharcard = $_POST['aadharcard'];
        $full_name = $_POST['full_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $adopter = $_POST['adopter'];
        $guardian_name  = $_POST['guardian_name'];
        $guardian_phone = $_POST['guardian_phone'];
        $admission_date = $_POST['admission_date'];
        $status = $_POST['status'];
        $medical_history = $_POST['medical_history'];
        $education_level = $_POST['education_level'];

        $sql = "INSERT INTO orphan_children (aadharcard, full_name, date_of_birth, gender, address,adopter,guardian_name, guardian_phone, admission_date, status, medical_history, education_level)
        VALUES ('$aadharcard', '$full_name', '$date_of_birth', '$gender', '$address','$adopter','$guardian_name', '$guardian_phone', '$admission_date', '$status', '$medical_history', '$education_level')";  
           if(mysqli_query($conn, $sql)){  
           echo "<div class='alert alert-success' role='alert'>
               Added Successfully
            </div>";  
                }else{  
                    echo "<div class='alert alert-danger' role='alert'>
                Try Again Something went wrong ! 
            </div> ";  
           }  
               
        // Close connection
        mysqli_close($conn);
        ?>
    </div>

    <!---->

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>