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

    <div class="container mt-3 p-5">

<?php 
        $request_id=$_POST['request_id'];
        $result = mysqli_query($conn, "SELECT * FROM adopterrequest WHERE request_id = '$request_id'");
        while($row = mysqli_fetch_array($result))
        {
    ?>

    <form class="container" action="responseRequest.php" method="post">


        <input type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
            <div class="input-group mb-3">
               
               <span class="input-group-text" id="basic-addon1"> Status</span>
               <select name="status" class="form-control" required>
                   <option value="Pending">Pending</option>
                   <option value="Received">Received</option>
                   <option value="Visit to Orphanange Home">Visit to Orphanange Home</option>
                   <option value="Document Verification">Document Verification</option>
                   <option value="Background Verification">Background Verification</option>
                   <option value="Verified">Verified</option>
               </select><br><br>
               </div>
        <div class="input-group mb-3">
            <input type="submit" class="form-control btn btn-success" value="Update">
            </div>
        </form>
        <?php } ?>
</div>






    

    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>