<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Orphanage Management System</title>
  </head>
  <body>

    <div class="container-fluid">
        <?php
        
        $host = 'localhost:3306';  
        $user = 'root';  
        $pass = '';  
        $dbname = 'orphanage-master';  
        $conn = mysqli_connect($host, $user, $pass,$dbname);  
        if(! $conn )  
        {  
            die('Could not connect: ' .  mysqli_connect_error()); 
        } 
            
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $aadharcard =  $_REQUEST['aadharcard'];
        $phone = $_REQUEST['phone'];
        $password = $_REQUEST['password'];
        $usertype= $_REQUEST['usertype'];
            
        // Performing insert query execution
    
        if($usertype=="donar"){
            $sql = "INSERT INTO donar VALUES ('$aadharcard','$name','$phone','$password','$address')";  
            if(mysqli_query($conn, $sql)){  
            echo "<div class='alert alert-success' role='alert'>
        Registration Successful Thank you ! 
        <a href='index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div>";  
      
            }else{  
                echo "<div class='alert alert-danger' role='alert'>
            Try Again Something went wrong ! May Already Register
            <a href='index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
        </div> ".mysqli_error($conn);  
    
            }  
        }
        else{
                $sql = "INSERT INTO adopter VALUES ('$aadharcard','$name','$phone','$address','$password')";  
                if(mysqli_query($conn, $sql)){  
                echo "<div class='alert alert-success' role='alert'>
            Registration Successful Thank you ! 
            <a href='index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
            </div>";  
                }else{  
                    echo "<div class='alert alert-danger' role='alert'>
                Try Again Something went wrong ! May Already Register
                <a href='index.php'> <button type='submit' class='btn btn-success'>Back To Home</button></a>
            </div> ".mysqli_error($conn);  
                }  
        }
       
        
	    
            
        // Close connection
        mysqli_close($conn);
        ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

   <!-- Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>