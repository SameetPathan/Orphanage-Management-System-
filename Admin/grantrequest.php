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
            <a class="nav-link" href="Manage.php"><span style="font-weight: bold;color:darkslategray;">Manage Orphanage</span></a>
            <a class="nav-link" href="checkdonation.php"><span style="font-weight: bold;color:green;">Check Donation</span></a>
            <a class="nav-link" href="grantrequest.php"><span style="font-weight: bold;color:darkslategray;">Grant Request</span></a>
               
            </form>
            <form class="d-flex">
                
              <a href="logout.php" >  <button type="button" class="btn btn-outline-danger"  style="margin-right: 10px;">Logout</button></a>
              <span class="badge bg-success">USER <?php  echo $_SESSION["aadharcard"]; ?></span>
            </form>
           
        </div>
    </nav>
    <!--Navbar End-->

    
  

<div class="container mt-2">

    <!-- HTML code to display the donor data -->
    <table class="table table-bordered mt-5 container">
    <thead class="table-dark">
        <tr>
        <th>Request ID</th>
        <th>Adopter Aadharcard</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Requested Date</th>
        <th>Adoption Date</th>
        <th>Child Aadharcard</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Update</th>
        </tr>
    </thead>
    <tbody>
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

        // Retrieve the donor data from the database
        $sql = "SELECT * FROM adopterrequest";
        $result = mysqli_query($conn, $sql);

        // Loop through the result set and display the data in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['request_id'] . "</td>";
            echo "<td>" . $row['adopter_aadharcard'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['request_date'] . "</td>";
            echo "<td>" . $row['adoption_date'] . "</td>";
            echo "<td>" . $row['child_adopted'] . "</td>";
            echo "<td>" . $row['reason'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            ?>
            <td><form action="UpdateRequest.php" method="post">
            <input type="text" name="request_id" hidden value="<?php echo $row['request_id']??''; ?>">
            <button type="submit" class="btn btn-outline-info my-2 my-sm-0" >Update</button>
            </form></td>
            <?php 
            echo "</tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </tbody>
    </table>


</div>




    

    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>