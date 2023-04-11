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

    <title>Admin | Orphanage Management System</title>
  
</head>


<body>

 <!----->
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
        <!----->

	

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
        <button class="btn btn-outline-dark my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Child</button>
    </div>

    </div>

    <div class="container-fluid mt-2 table-responsive">
        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr>
                <th>ID</th>
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
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
        <?php
            if(mysqli_num_rows($retval) > 0){  
                while($row = mysqli_fetch_assoc($retval)){   
            ?>
            <tr>
            <td><?php echo $row['id']??''; ?></td>
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

        
            <td><form action="UpdateChild.php" method="post">
            <input type="text" name="id" hidden value="<?php echo $row['id']??''; ?>">
            <button type="submit" class="btn btn-outline-info my-2 my-sm-0">Update</button>
            </form></td>

            <td><form action="DeleteChild.php" method="post">
            <input type="text" name="id" hidden value="<?php echo $row['id']??''; ?>">
            <button type="submit" class="btn btn-outline-danger my-2 my-sm-0">Delete</button>
            </form></td>
    
            
        
            </tr>
            <?php  }   }else{  echo "0 results";  
           }   
            ?>
           
            </tbody>
            </table>
      
        </div>






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Child</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form class="container" action="insertChild.php" method="post">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Aadharcard</span>
               <input type="text" class="form-control" name="aadharcard" required><br><br>
                </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Full Name</span>
                 <input type="text" class="form-control" name="full_name" required><br><br>
            </div>
            
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Date of Birth</span>
                 <input type="date" class="form-control" name="date_of_birth" required><br><br>
                </div>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Gender</span>
                <select name="gender" class="form-control" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br><br>
                </div>

            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Address</span>
                <input type="text" class="form-control" name="address" required><br><br>
                </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Adopter Aadharcard</span>
             <input type="number" class="form-control" name="adopter" required><br><br>
                </div>
           
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Guardian Name</span>
                <input type="text" class="form-control" name="guardian_name" required><br><br>
                </div>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Guardian Phone</span>
              <input type="text" class="form-control" name="guardian_phone" required><br><br>
                </div>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Admission Date</span>
                 <input type="date" class="form-control" name="admission_date" required><br><br>
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
                 <textarea class="form-control" name="medical_history"></textarea><br><br>
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







    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>

</html>