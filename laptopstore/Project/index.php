<?php
    session_start();

    // Database connection
    $connection = mysqli_connect('localhost','root','','laptop-store') or die('connection error');

    $query = "SELECT * FROM laptops";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        $laptops = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        // get unique Brands
        $uniqueBrands = array_unique(array_column($laptops, 'brand'));
        // Get unique RAMs
        $uniqueRAMs = array_unique(array_column($laptops, 'ram'));

        // Get unique Storages
        $uniqueStorages = array_unique(array_column($laptops, 'storage'));
    } else {
        // Handle the case where the query failed
        $laptops = [];
        $uniqueBrands = [];
        $uniqueRAMs = [];
        $uniqueStorages = [];
    }

    if(isset($_SESSION['user_id'])){
        // user id
        $uid = $_SESSION['user_id'];

        // check my-orders detail
        $check = mysqli_query($connection, "select * from order_detail where uid='$uid'");
                        
        if($check){
            if(mysqli_num_rows($check)>0){
                
                // get my-orders detail
                $get_orders = mysqli_fetch_all($check, MYSQLI_ASSOC);
                mysqli_free_result($check);

                $orders_count = count($get_orders);
            }
            else{
                $orders_count = ''; 
            }
        }
        else{
            $orders_count = '';            
        }
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
  <link rel="stylesheet" href="resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/stylesheet.css">
    <script src="resources/Bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        <script>
    $(document).ready(function () {
        $('#searchButton').click(function () {
            searchLaptops();
        });

        $('#searchInput').keypress(function (e) {
            if (e.which == 13) { // Enter key pressed
                searchLaptops();
            }
        });

        function searchLaptops() {
            var searchQuery = $('#searchInput').val();

            // AJAX request to get search results
            $.ajax({
                type: 'POST',
                url: 'search.php', // You'll need to create a PHP file to handle the search logic
                data: { query: searchQuery },
                success: function (data) {
                    // Update the content of the bodySection with the search results
                    $('#bodySection').html(data);
                }
            });
        }
    });
</script>


</head>

<body>

<div id="headerSection">
    <div class="container" >
        <div class="row align-items-center">
            <div class="col-md-6">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <center>
                    <a class="navbar-brand" id="brand" href=".">Tech Topia</a>
                    </center>
                </nav>
            </div>
            
            <?php
                if(isset($_SESSION['user_id'])){
                ?>
                    <div class="col-md-2">
                        <a href="."><h5><i class="fa fa-shopping-cart"></i> Store</h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="routes/my-orders.php"><h5> <i class="fa fa-shopping-cart"></i> My orders <span class="badge badge-pill badge-danger"><?php echo $orders_count ?></span></h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="routes/logout.php"><h5> <i class="fa fa-user"></i> Logout</h5></a>
                    </div>
                <?php
                }
                else{
                    ?>
                    <div class="col-md-2">
                        <a href="."><h5><i class="fa fa-shopping-cart"></i> Store</h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="routes/sign-in.php"><h5> <i class="fa fa-user"></i> Log in</h5></a>
                    </div>
                    <div class="col-md-2">
                        <a href="routes/sign-up.php"><h5> <i class="fa fa-book"></i> Register</h5></a>
                    </div>
                <?php
                }
                
            ?>
             <div class="col-md-6">
                <!-- Search Bar -->
                <input type="text" id="searchInput" class="form-control mb-2" placeholder="Search laptops...">
                <button id="searchButton" class="btn btn-primary">Search</button>
                <a href="index.php" class="btn btn-secondary">Clear Search</a>

            </div>

                <div class="row">
                <!-- Filter Section -->
                    <div class="col-md-2" id="filterSection">
                    <h4>Filter by RAM:</h4>
                    <?php foreach ($uniqueRAMs as $ram): ?>
                        <label><input type="checkbox" class="filter" value="ram<?php echo $ram; ?>"> <?php echo $ram; ?> RAM</label><br>
                    <?php endforeach; ?>

                    <h4>Filter by Storage:</h4>
                    <?php foreach ($uniqueStorages as $storage): ?>
                        <label><input type="checkbox" class="filter" value="storage<?php echo $storage; ?>"> <?php echo $storage; ?> Storage</label><br>
                    <?php endforeach; ?>

                    <button id="applyFilters" class="btn btn-primary">Apply Filters</button> <br>
                    <a href="index.php" class="btn btn-secondary">Clear Search</a>
                    </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bodySection">

                            
                    
                        
                        <div class="container-fluid">
                    <div class="row">

                        
                    </div>
                    
                </div>



        <div class="row mt-4">
        
            <?php foreach ($laptops as $laptop): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $laptop['image_url']; ?>" class="card-img-top" alt="<?php echo $laptop['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $laptop['name']; ?></h5>
                            <p class="card-text">
                                <?php echo $laptop['brand']; ?><br>
                                <?php echo $laptop['processor']; ?><br>
                                <?php echo $laptop['ram']; ?><br>
                                <?php echo $laptop['storage']; ?><br>
                                <?php echo $laptop['display']; ?>
                            </p>
                            <a href="routes/<?php echo $laptop['route']; ?>.php" class="btn btn-primary">Full details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="resources/Bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchButton').click(function () {
            searchLaptops();
        });

        $('#searchInput').keypress(function (e) {
            if (e.which == 13) { // Enter key pressed
                searchLaptops();
            }
        });

       

        function searchLaptops() {
            var searchQuery = $('#searchInput').val();
            $.ajax({
                type: 'POST',
                url: 'api/search.php', // Ensure this points to the correct location of your search.php file
                data: { query: searchQuery },
                success: function (data) {
                    $('#bodySection').html(data);
                }
            });
        }
    });
    $('#applyFilters').click(function () {
            var selectedFilters = $('.filter:checked').map(function() {
                return this.value;
            }).get();
            
            $.ajax({
                type: 'POST',
                url: 'api/filter.php', // Ensure this points to the correct location of your filter.php file
                data: { filters: selectedFilters },
                success: function(response) {
                    $('#bodySection').html(response);
                }
            });
    });

</script>



</body>

</html>