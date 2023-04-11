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

    <title>Donar | Orphanage Management System</title>
  
</head>


<body>
    
  
    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;">Orphanage Management System</a>
            <form class="d-flex">
          
                <a href="logout.php" >  <button type="button" class="btn btn-outline-danger"  style="margin-right: 10px;">Logout</button></a>

            </form>
        </div>
    </nav>
    <!--Navbar End-->


    <div class="d-flex justify-content-evenly mt-4">

    <div> 
        <button class="btn btn-outline-dark my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#exampleModal3">Give Donation</button>
    </div>

    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Give Donation Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form class="container" action="insertdonation.php" method="post">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Aadharcard</span>
               <input type="text" class="form-control" name="aadharcard" required><br><br>
                </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Full Name</span>
                 <input type="text" class="form-control" name="full_name" required><br><br>
            </div>
            
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone</span>
                 <input type="number" class="form-control" name="phone" required><br><br>
                </div>
                

            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Address</span>
                <input type="text" class="form-control" name="address" required><br><br>
                </div>
         
           
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Donation Amount</span>
                <input type="text" class="form-control" name="donation_amount" required><br><br>
                </div>

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Transaction Id</span>
              <input type="text" class="form-control" name="transaction_id" required><br><br>
                </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Donation Date</span>
                 <input type="date" class="form-control" name="donation_date" required><br><br>
                </div>
          
           
            <div class="input-group mb-3">
                <input type="submit" class="form-control btn btn-success" value="Submit">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-2">

    <!-- HTML code to display the donor data -->
    <table class="table table-bordered mt-5 container">
    <thead class="table-dark">
        <tr>
        <th>Donation ID</th>
        <th>Aadharcard</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Donation Amount</th>
        <th>Transaction ID</th>
        <th>Donation Date</th>
        <th>Status</th>
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
        $user=$_SESSION["aadharcard"];
        $sql = "SELECT * FROM donation WHERE aadharcard = '$user' ";
        $result = mysqli_query($conn, $sql);

        // Loop through the result set and display the data in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['donation_id'] . "</td>";
            echo "<td>" . $row['aadharcard'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['donation_amount'] . "</td>";
            echo "<td>" . $row['transaction_id'] . "</td>";
            echo "<td>" . $row['donation_date'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
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