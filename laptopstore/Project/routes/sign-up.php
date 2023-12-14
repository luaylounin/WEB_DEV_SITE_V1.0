<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tech Topia</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../resources/css/stylesheet.css">
</head>
<body>

<div id="headerSection">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" id="brand" href="../">Tech Topia</a>
                </nav>
            </div>
            <div class="col-md-2">
                <a href="../"><h5><i class="fa fa-shopping-cart"></i> Store</h5></a>
            </div>
            <div class="col-md-3">
                <h5><a href="sign-in.php"><i class="fa fa-user"></i> Log in</a></h5>
            </div>
        </div>
    </div>
</div>
<hr>

<div id="bodySection">
    <div class="row p-3">
       <div class="col-md-1"></div>
       <div class="col-md-11">
            <div class="row">
                <div class="col-md-4">
                    <center><h3>Create New Account</h3></center>
                    <br>
                    <form action="../api/register.php" method="post" id="registrationForm">
                        <input class="form-control mb-3" type="text" name="name" placeholder="Enter Name" required>
                        <input class="form-control mb-3" type="email" name="email" placeholder="Enter Email" required>
                        <input class="form-control mb-3" type="text" name="mobile" placeholder="Enter Mobile" required>
                        <input class="form-control mb-3" type="password" name="password" placeholder="Enter Password" required>
                        <input class="form-control mb-3" type="password" name="cpassword" placeholder="Confirm Password" required>
                        <input class="form-control mb-3" type="text" name="address" placeholder="Address">
                        <center><button type="submit" name="register" class="btn btn-primary">Register</button></center>
                    </form>
                    <br>
                </div>
                <div class="col-md-8">
                    <img src="../uploads/laptops.jpeg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
