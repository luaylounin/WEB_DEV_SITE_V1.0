<?php
    // Start session
    session_start();

    if(!isset($_SESSION['user_id'])){
        header("location:../");
    }

    // Database connection
    $connection = mysqli_connect('localhost','root','','laptop-store') or die('connection error');

    // user id
    $uid = $_SESSION['user_id'];
    
    // check my-orders detail
    $query = mysqli_query($connection, "select * from order_detail where uid='$uid'");
    
    if($query){
        if(mysqli_num_rows($query)>0){
            
            // get my-orders detail
            $orders = mysqli_fetch_all($query, MYSQLI_ASSOC);
            mysqli_free_result($query);
        }
        else{
            $orders = 0;
        }
    }
    else{
        $orders = 'There is some error!';            
    }
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                <a href="../api/logout.php"><h5><i class="fa fa-user"></i> Logout</h5></a>
            </div>
        </div>
    </div>
</div>
<hr>
<div id="headersection">

        <div class="row p-3">

           <div class="col-md-1"></div>

            <div class="col-md-10">
                <center><h3>My Orders</h3></center>
                <br>
                <?php
                    if($orders!=0){
                        for($i=0; $i<count($orders); $i++){
                            ?>
                            <div id="orders">
                                <div class="row">
                                    <div class="col-md-1 text-center"><h3><?php echo $i+1 ?></h3></div>
                                    <div class="col-md-4 text-center">
                                        <img src="../uploads/<?php echo $orders[$i]['image'] ?>" class="img-fluid" height="200" width="200">
                                        <h4><?php echo $orders[$i]['name'] ?></h4>
                                        <h5 id="title"><i class="fa fa-eur" aria-hidden="true"></i><?php echo $orders[$i]['price'] ?></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <b>Name: </b> <br><?php echo $orders[$i]['name'] ?> <br>
                                        <b>Model: </b> <br><?php echo $orders[$i]['model'] ?> <br>
                                        <b>Processor: </b> <br><?php echo $orders[$i]['processor'] ?> <br>
                                        <b>Graphics Card: </b> <br><?php echo $orders[$i]['graphics'] ?> <br>
                                        <b>Memory: </b> <br><?php echo $orders[$i]['memory'] ?> <br>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <b>Storage: </b> <br><?php echo $orders[$i]['storage'] ?> <br>
                                        <b>Operating System: </b> <br><?php echo $orders[$i]['os'] ?> <br>
                                        <b>Display: </b> <br><?php echo $orders[$i]['display'] ?> <br>
                                        <b>Order date: </b> <br><?php echo $orders[$i]['date'] ?> <br><br>
                                        <h3><span class="badge badge-success p-2">Ordered</span></h3> 
                                        <button class="btn btn-danger delete-order" data-orderid="<?php echo $orders[$i]['id']; ?>">Delete Order</button>

                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php
                            }
                    }
                    else{
                        ?>
                            <h5><center> You have no orders yet. </center></h5>
                            <h5><center> ): </center></h5>
                        <?php
                    }
                    
                ?>
                
            </div>

            <div class="col-md-1"></div>
            <div class="text-center">
            
          </div>
        </div>
        <script>
$(document).ready(function() {
    $('.delete-order').click(function() {
    var orderId = $(this).data('orderid');
    if(confirm('Are you sure you want to delete this order?')) {
        $.ajax({
            type: 'POST',
            url: '/laptopstore/project/api/delete_order.php', // Correct relative path
            data: { 'order_id': orderId },
            success: function(response) {
                alert(response); // Show the response from the server
                location.reload(); // Reload the page to update the order list
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting order: ' + textStatus + ', ' + errorThrown);
            }
        });
    }
});

});
</script>
</div>

</body>

</html>