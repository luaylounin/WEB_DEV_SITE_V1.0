<?php
// Start session
session_start();

// Database connection
$connection = mysqli_connect('localhost','root','','laptop-store') or die('connection error');

// Registration logic
if(isset($_POST['register'])){

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];

    // Your mailboxlayer API key
    $apiKey = 'ec1d12d5b784d4b8da836085be2efc28';
    // Prepare the URL
    $validationUrl = "http://apilayer.net/api/check?access_key=$apiKey&email=$email&smtp=1&format=1";

    // Use file_get_contents() or cURL to make the API request
    $response = file_get_contents($validationUrl);
    // Decode the JSON response
    $result = json_decode($response, true);

    if ($result && $result['format_valid'] && $result['smtp_check']) {
        // Email is valid and exists
        // Proceed with user registration if password matches
        if($password == $cpassword){
            $query = mysqli_query($connection, "insert into user_detail (name, mobile, email, password, address) values('$name','$mobile','$email','$password','$address')");
            if($query){
                echo "<script> 
                            alert('Registration successful!');
                            window.location='../routes/sign-in.php';
                     </script>";
            }
            else{
                echo "<script> 
                            alert('Some error occurred!');
                            window.location='../routes/sign-up.php';
                     </script>";
            }  
        }
        else{
            echo "<script> 
                        alert('Password and confirm password do not match!');
                        window.location='../routes/sign-up.php';
                 </script>";
        }
    } else {
        // Email is not valid
        echo "<script> 
                alert('Please enter a valid email address.');
                window.location='../routes/sign-up.php';
             </script>";
    }
}
?>
