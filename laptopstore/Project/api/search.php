<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'laptop-store') or die('Connection error');

$searchQuery = '';
if (isset($_POST['query'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['query']);
}

$query = "SELECT * FROM laptops WHERE name LIKE '%$searchQuery%' OR processor LIKE '%$searchQuery%' OR ram LIKE '%$searchQuery%' OR display LIKE '%$searchQuery%'";
$result = mysqli_query($connection, $query);

$laptops = [];
if ($result) {
    $laptops = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
}

// Close the database connection
mysqli_close($connection);

// Output the HTML structure for displaying laptops
echo '<div class="row mt-4">';
foreach ($laptops as $laptop) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card">';
    echo '<img src="' . htmlspecialchars($laptop['image_url']) . '" class="card-img-top" alt="' . htmlspecialchars($laptop['name']) . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . htmlspecialchars($laptop['name']) . '</h5>';
    echo '<p class="card-text">';
    echo htmlspecialchars($laptop['processor']) . '<br>';
    echo htmlspecialchars($laptop['ram']) . '<br>';
    echo htmlspecialchars($laptop['display']);
    echo '</p>';
    echo '<a href="routes/' . htmlspecialchars($laptop['route']) . '.php" class="btn btn-primary">Full details</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
?>
