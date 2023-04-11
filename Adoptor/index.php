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
$user=$_SESSION["aadharcard"];

$sql = "SELECT * FROM adopterrequest WHERE adopter_aadharcard='$user'";
$retval=mysqli_query($conn, $sql);  
$conn->close();



?>
    
  
    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;">Orphanage Management System</a>


       
            <form class="d-flex">
            <a class="nav-link" href="search.php"><span style="font-weight: bold;color:green;">Find Your Happiness</span></a>
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
                <th>Request ID </th>
                <th>Request Date/Time </th>
                <th>Adoption Date </th>
                <th>child AadharCard</th>
                <th>Reason</th>
                <th>status</th>
            </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
          
            <td><?php echo $row['request_id']??''; ?></td>
            <td><?php echo $row['request_date']??''; ?></td>
            <td><?php echo $row['adoption_date']??''; ?></td>
            <td><?php echo $row['child_adopted']??''; ?></td>
            <td><?php echo $row['reason']??''; ?></td>
            <td><?php echo $row['status']??''; ?></td>
            

        
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