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

    <title>Adopter | Orphanage Management System</title>
  
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
$conn->close();



?>
    
  
    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;">Orphanage Management System</a>


            <form class="d-flex">
            <a class="nav-link" href="index.php"><span style="font-weight: bold;color:green;">Dashboard</span></a>
                <a href="logout.php" >  <button type="button" class="btn btn-outline-danger"  style="margin-right: 10px;">Logout</button></a>

            </form>
        </div>
    </nav>
    <!--Navbar End-->

    
  
    <div class="d-flex justify-content-evenly mt-4">

    </div>

    <div class="container-fluid mt-2 table-responsive">
        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr>
            
                <th>AadharCard</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Adoptor Aadharcard</th>
                <th>Guardian Name</th>
                <th>Guardian Phone</th>
                <th>Admission Date</th>
                <th>Status</th>
                <th>Medical History</th>
                <th>Education Level</th>
                <th>Request For Adoption</th>
            </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
          
            <td><?php echo $row['aadharcard']??''; ?></td>
            <td><?php echo $row['full_name']??''; ?></td>
            <td><?php echo $row['date_of_birth']??''; ?></td>
            <td><?php echo $row['gender']??''; ?></td>
            <td><?php echo $row['address']??''; ?></td>
            <td><?php echo $row['adopter']??''; ?></td>
            <td><?php echo $row['guardian_name']??''; ?></td>
            <td><?php echo $row['guardian_phone']??''; ?></td>
            <td><?php echo $row['admission_date']??''; ?></td>
            <td><?php echo $row['status']??''; ?></td>
            <td><?php echo $row['medical_history']??''; ?></td>
            <td><?php echo $row['education_level']??''; ?></td>

        
            <td><form action="RequestAdoption.php" method="post">
            <input type="text" name="aadharcard" hidden value="<?php echo $row['aadharcard']??''; ?>">
            <button type="submit" class="btn btn-outline-info my-2 my-sm-0">Request For Adoption</button>
            </form></td>

        
            </tr>
            <?php  }   }else{  echo "0 results";  
           }   
            ?>
           
            </tbody>
            </table>
      
        </div>




    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>