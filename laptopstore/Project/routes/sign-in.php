
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <title>Tech Topia</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/stylesheet.css">
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<div id="headerSection">
    <div class="container" >
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
                <a href="sign-up.php"><h5><i class="fa fa-book"></i> Register</h5></a>
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
                        <center><h3>Login</h3></center>
                        <br>
                        <form action="../api/login.php" method="POST"> 
                            <input class="form-control" type="text" name="id" placeholder="Enter Email / Mobile" required>
                            <br>
                            <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                            <br>
                            <center><button type="submit" name="login" class="form-control btn btn-primary">Login</button></center>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <img src="../uploads/laptops.jpeg" class="img-fluid">
                    </div>
                    
                </div>
            </div>

            <div class="col-md-1"></div>

        </div>

</div>

</body>

</html>