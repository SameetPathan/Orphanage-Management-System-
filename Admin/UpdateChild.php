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

        $sql = 'SELECT * FROM orphan_children';
        $retval=mysqli_query($conn, $sql);  
       


        
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
        $id=$_POST['id'];
        $result = mysqli_query($conn, "SELECT * FROM orphan_children WHERE id = '$id'");
        while($row = mysqli_fetch_array($result))
        {
    ?>

    <form class="container" action="responseChild.php" method="post">


        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Aadharcard</span>
        <input type="text" class="form-control" value="<?php echo $row['aadharcard']; ?>" name="aadharcard" required><br><br>
            </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Full Name</span>
            <input type="text" class="form-control" value="<?php echo $row['full_name']; ?>" name="full_name" required><br><br>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Date of Birth</span>
            <input type="date" class="form-control" value="<?php echo $row['date_of_birth']; ?>" name="date_of_birth" required><br><br>
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Gender</span>
            <select name="gender" class="form-control" required>
            <option value="NotSpecified">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br><br>
            </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Address</span>
            <input type="text" class="form-control" value="<?php echo $row['address']; ?>" name="address" required><br><br>
            </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Adopter Aadharcard</span>
        <input type="number" class="form-control" value="<?php echo $row['adopter'] ?>"  name="adopter" required><br><br>
            </div>

        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Guardian Name</span>
            <input type="text" class="form-control" value="<?php echo $row['guardian_name'] ?>" name="guardian_name" required><br><br>
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Guardian Phone</span>
        <input type="text" class="form-control" value="<?php echo $row['guardian_phone'] ?>" name="guardian_phone" required><br><br>
            </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Admission Date</span>
            <input type="date" class="form-control" value="<?php echo $row['admission_date'] ?>" name="admission_date" required><br><br>
            </div>
        <div class="input-group mb-3">
        
            <span class="input-group-text" id="basic-addon1"> Status</span>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select><br><br>
            </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> Medical History</span>
            <textarea class="form-control" value="<?php echo $row['medical_history'] ?>" name="medical_history"></textarea><br><br>
            </div>
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> Education Level</span>
            
            <select name="education_level" class="form-control" required>
                <option value="none">None</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="higher">Higher</option>
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