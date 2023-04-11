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

    <title>Orphanage Management System</title>

</head>


<body>
    <!-- Navbar Start-->
    <?php

    $host = 'localhost:3306';
    $user = 'root';
    $pass = '';
    $dbname = 'orphanage-master';
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die('Could not connect: ' .  mysqli_connect_error());
    }



    if (isset($_POST['login'])) {

        $aadharv = $_POST['aadharcard'];
        $passwordv = $_POST['password'];

        //start main loop

        if ($user = $_POST['usertype'] == 'admin') {

            $sql = "SELECT * FROM admin WHERE aadharcard = '$aadharv' AND password = '$passwordv'";
            $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['aadharcard'] = $aadharv;
                echo "Logging You In....";
                header('Refresh: 2; URL = ./Admin/index.php');
            } else {
                echo "Check Your Username and Password";
            }
        }

        if ($user = $_POST['usertype'] == 'adoptor') {
            $sql = "SELECT * FROM adopter WHERE aadharcard = '$aadharv' AND password = '$passwordv'";
            $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['aadharcard'] = $aadharv;
                echo "Logging You In....";
                header('Refresh: 2; URL = ./Adoptor/index.php');
            } else {
                echo "Check Your Username and Password";
            }
        }

        if ($user = $_POST['usertype'] == 'donar') {
            $sql = "SELECT * FROM donar WHERE aadharcard = '$aadharv' AND password = '$passwordv'";
            $result = $conn->query($sql);

            if (mysqli_num_rows($result) > 0) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['aadharcard'] = $aadharv;
                echo "Logging You In....";
                header('Refresh: 2; URL = ./Donar/index.php');
            } else {
                echo "Check Your Username and Password";
            }
        }

        //end main loop  
    }
    $conn->close();
    ?>

    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: bold;">Orphanage Management System</a>
            <form class="d-flex">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right: 10px;">Register</button>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="margin-right: 10px;">Login</button>
            </form>
        </div>
    </nav>
    <!--Navbar End-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Src/h1.jpg" class="d-block w-100" height="540px" alt="...">
            </div>

        </div>

    </div>

    <!--Modal register-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Full Name as per Aadhar Card:</label>
                            <input type="text" class="form-control" name="name" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="phone" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Aadhar Card Number:</label>
                            <input type="text" class="form-control" name="aadharcard" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Address:</label>
                            <textarea class="form-control" name="address" id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <select name="usertype" class="form-select" aria-label="Default select example">
                                <option selected>User Type</option>
                                <option value="adoptor">Adoptor</option>
                                <option value="donar">Donar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" name="password" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-success">Register</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!---->

    <!--Modal login-->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                    ?>" method="post">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Aadhar Card Number:</label>
                            <input type="text" class="form-control" name="aadharcard" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="usertype" aria-label="Default select example">
                                <option selected>User Type</option>
                                <option value="adoptor">Adoptor</option>
                                <option value="donar">Donar</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" name="password" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-success" name="login">Login</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!---->


    <footer class="bg-dark p-1 fixed-bottom">
        <div class="container">
            <p class="text-center text-white">Copyright &copy; Orphanage Home 2023</p>
        </div>
    </footer>






    <!-- Optional JavaScript -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>