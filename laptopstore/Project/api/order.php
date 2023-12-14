<?php

    // Start session
    session_start();

    // Database connection
    $connection = mysqli_connect('localhost','root','','laptop-store') or die('connection error');

    // Order logic
    if(isset($_POST['order'])){

        // Check whether login or not
        if(isset($_SESSION['user_id'])){

            // user id 
            $uid = $_SESSION['user_id'];

            // today's date
            $date = date('d-m-y');

            // Form data collection
            $card_no = $_POST['card_no'];
            $expiry = $_POST['expiry'];
            $cvv = $_POST['cvv'];
            $name = $_POST['laptop-name'];
            $model = $_POST['laptop-model'];
            $price = $_POST['laptop-price'];
            $memory = $_POST['laptop-memory'];
            $storage = $_POST['laptop-storage'];
            $graphics = $_POST['laptop-graphics'];
            $processor = $_POST['laptop-processor'];
            $display = $_POST['laptop-display'];
            $os = $_POST['laptop-os'];
            $image = $_POST['laptop-image'];

            // check card no length
            if(strlen($card_no)!=12){
                echo "<script> 
                    alert('12 digits required in Card no!');
                    window.location='../';
                </script>"; 
            }
            // check cvv no length
            else if(strlen($cvv)!=3){
                echo "<script> 
                        alert('CVV 3 digits required!');
                        window.location='../';
                    </script>"; 
            }
            else{
                // insert order details
                $query = mysqli_query($connection, "insert into order_detail (uid, name, model, price, memory, storage, graphics, processor, os, display, image, date) values('$uid','$name','$model','$price','$memory','$storage','$graphics','$processor','$os','$display','$image','$date')");
 
                // check data inserted or not
                if($query){
                    echo "<script> 
                        alert('Thank you! Your order is placed successfully!');
                        window.location='../';
                    </script>"; 
                }
                else{
                    echo "<script> 
                        alert('There is some error!');
                    </script>"; 
                }
            }
        }
        else{
            echo "<script> 
                    alert('Login is required!');
                </script>";            
        }
        
    }
?>