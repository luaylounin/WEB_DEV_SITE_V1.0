<?php
    session_start();
?>


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
            <div class="col-md-6">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" id="brand" href="../">Tech Topia</a>
                </nav>
            </div>
            <?php
                if(isset($_SESSION['user_id'])){
                ?>
                    <div class="col-md-3">
                        <a href="my-orders.php"><h5> <i class="fa fa-shopping-cart"></i> My orders</h5></a>
                    </div>
                    <div class="col-md-3">
                        <a href="../api/logout.php"><h5> <i class="fa fa-user"></i> Logout</h5></a>
                    </div>
                <?php
                }
                else{
                    ?>
                    <div class="col-md-2">
                        <a href="../"><h5><i class="fa fa-shopping-cart"></i> Store</h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="sign-in.php"><h5> <i class="fa fa-user"></i> Sign in</h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="sign-up.php"><h5> <i class="fa fa-book"></i> Sign up</h5></a>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</div>
<hr>
<div id="bodySection">

        <div class="row p-3">

            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="row">
                    <div class="col-md-6">
                        <img src="../uploads/asus vivobook.jpg" height="500" width="500">
                    </div>
                    <div class="col-md-6">
                        <h1 id="title">Asus Vivobook 15</h1>
                        <br>
                        <p>
                            <b>Processor: </b><br>
                            Intel Dual Core <br>

                            <b>Graphics Card: </b><br>
                            Integrated <br> 

                            <b>RAM: </b><br>
                            4GB DDR4 RAM<br>

                            <b>Storage: </b><br>
                            256GB SSD <br>

                            <b>Display: </b><br>
                            HD Display
                        </p>
                        <h2 id="title"><i class="fa fa-eur" aria-hidden="true"></i>560.00</h2><br>
                        <div id="buy-now">
                            <a href="#order-now"><button class="btn btn-warning"><b>Buy Now</b></button></a>
                        </div>
                    </div>
                </div>
        
            </div>
            <div class="col-md-1"></div>
        </div>

        <div class="row p-3">

           <div class="col-md-1"></div>

            <div class="col-md-10">
                <h4>Technical details</h4>
                <div class="p-4">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th>Brand</th>
                            <td>ASUS</td>
                            <th>Model Name</th>
                            <td>ASUS Vivobook 15</td>
                            </tr>
                            <tr>
                            <th>Model No</th>
                            <td>ASVB5422</td>
                            <th>Model Year</th>
                            <td>2022</td>
                            </tr>
                            <tr>
                            <th>RAM Memory</th>
                            <td>4 GB</td>
                            <th>Maximum RAM</th>
                            <td>12 GB</td>
                            </tr>
                            <tr>
                            <th>Processor Brand</th>
                            <td>Intel</td>
                            <th>Processor Type</th>
                            <td>Dual Core</td>
                            </tr>
                            <tr>
                            <th>Graphics Card</th>
                            <td>Integrated</td>
                            <th>Graphics Memory</th>
                            <td>Integrated</td>
                            </tr>
                            <tr>
                            <th>Storage Type</th>
                            <td>SSD</td>
                            <th>Storage Size</th>
                            <td>256GB SSD</td>
                            </tr>
                            <tr>
                            <th>Display size</th>
                            <td>15.6 inches</td>
                            <th>Resolution</th>
                            <td>1080 x 720</td>
                            </tr>
                            <tr>
                            <th>Operating System</th>
                            <td>Windows 11</td>
                            <th>Battery</th>
                            <td>100W</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
               
            </div>

            <div class="col-md-1"></div>
        </div>

        <div class="row p-3">

           <div class="col-md-1"></div>

            <div class="col-md-10">
                <h4>Photos</h4>
                <div class="row p-4">
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 1.jpg" height="300" width="300">
                    </div>
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 2.jpg" height="300" width="300">
                    </div>
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 3.jpg" height="300" width="300">
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 4.jpg" height="300" width="300">
                    </div>
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 5.jpg" height="300" width="300">
                    </div>
                    <div class="col-md-4">
                        <img src="../uploads/asus vivobook 6.jpg" height="300" width="300">
                    </div>
                </div>
               
            </div>

            <div class="col-md-1"></div>
        </div>
        <hr>
        <div class="row p-3">

           <div class="col-md-1"></div>

            <div class="col-md-11">

                <div class="row">
                    <div class="col-md-4">
                        <div data-bs-spy="scroll" data-bs-target="#buy-now" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                            <center><h3 id="order-now">Order Now</h3></center>
                        </div>
                        <br>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Laptop Name</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    ASUS Vivobook 15
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Model</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    ASVB5422
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Brand</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    ASUS
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Price</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-eur" aria-hidden="true"></i>560.00
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>18% VAT</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-eur" aria-hidden="true"></i>100.80
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Shipping charges</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-eur" aria-hidden="true"></i>25.00
                                </div>
                        </div>
                        <div class="row p-1">
                                <div class="col-md-5">
                                    <b>Total</b>
                                </div>
                                <div class="col-md-1">
                                    <b>:</b>
                                </div>
                                <div class="col-md-6">
                                    <h5><b><i class="fa fa-eur" aria-hidden="true"></i>685.80</b></h5>
                                </div>
                        </div>
                        <br>
                        <form action="../api/order.php" method="post">
                            <input class="form-control mb-3" type="number" name="card_no" placeholder="Enter Card No" required>
                            <input class="form-control mb-3" type="text" name="expiry" placeholder="Enter Expiry Date" required>
                            <input class="form-control mb-3" type="number" name="cvv" placeholder="Enter CVV" required>
                            <input type="hidden" name="laptop-name" value="ASUS Vivobook 15">
                            <input type="hidden" name="laptop-model" value="ASVB5422">
                            <input type="hidden" name="laptop-price" value="685.80">
                            <input type="hidden" name="laptop-memory" value="4 GB">
                            <input type="hidden" name="laptop-storage" value="256 GB SSD">
                            <input type="hidden" name="laptop-graphics" value="Integrated">
                            <input type="hidden" name="laptop-processor" value="Intel Dual Core">
                            <input type="hidden" name="laptop-os" value="Windows 11">
                            <input type="hidden" name="laptop-display" value="HD (1080 x 720)">
                            <input type="hidden" name="laptop-image" value="asus vivobook.jpg">
                            <center><button type="submit" name="order" class="btn btn-warning"><b>Pay and Order</b></button></center>
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

</body>

</html>