<?php
$connection = mysqli_connect('localhost', 'root', '', 'laptop-store') or die('Connection error');

$term = mysqli_real_escape_string($connection, $_POST['term']);

$query = "SELECT DISTINCT name FROM laptops WHERE name LIKE '%$term%'";
$result = mysqli_query($connection, $query);

$suggestions = [];
if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['name'];
    }
}

echo json_encode($suggestions);
mysqli_close($connection);
?>
