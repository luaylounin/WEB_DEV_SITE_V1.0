<?php

    // Start session
    session_start();

    // Database connection
    $connection = mysqli_connect('localhost','root','','laptop-store') or die('connection error');

    // Login logic
    if(isset($_POST['login'])){

        $id = $_POST['id'];
        $password = $_POST['password'];

        $query = mysqli_query($connection, "select id, name, mobile from user_detail where (mobile='$id' or email='$id') and password='$password'");
        
        if($query){
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    $_SESSION['user_id'] = $row['id'];
                }
                echo "<script> 
                            window.location='../';
                    </script>";
            }
            else{
                echo "<script> 
                            alert('Invalid credentials!');
                            window.location='../routes/sign-in.php';
                    </script>";
            }
        }
        else{
            echo "<script> 
                        alert('Some error occured!')
                        window.location='../routes/sign-in.php';
                </script>";            
        }
    }
?>