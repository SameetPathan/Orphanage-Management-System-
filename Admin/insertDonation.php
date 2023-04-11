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

    <?php
        // Connect to the database
        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = '';  
        $dbname = 'orphanage-master';  
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
            die('Could not connect: ' .  mysqli_connect_error()); 
        } 

        // Get the form data
        $aadharcard = $_POST['aadharcard'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $donation_amount = $_POST['donation_amount'];
        $transaction_id = $_POST['transaction_id'];
        $donation_date = $_POST['donation_date'];
        

        // Insert the data into the database
        $sql = "INSERT INTO donation (aadharcard, full_name, phone, address, donation_amount,transaction_id, donation_date)
        VALUES ('$aadharcard', '$full_name', '$phone', '$address', '$donation_amount', '$transaction_id', '$donation_date')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>
               Added Successfully 
               <a class='nav-link' href='index.php'><span style='font-weight: bold;color:green;'>Home</span></a>
            </div>
            ";  
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                Try Again Something went wrong ! 
            </div> ";  
        }

        // Close the database connection
        mysqli_close($conn);
        ?>




    

    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>