<?php
session_start();

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'laptop-store') or die('Connection error');

$searchQuery = '';
if (isset($_POST['query'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['query']);
}

$filters = $_POST['filters'] ?? [];
$ramFilters = [];
$storageFilters = [];
$brandFilters = [];

foreach ($filters as $filter) {
    if (strpos($filter, 'ram') !== false) {
        $ramFilters[] = str_replace('ram', '', $filter);
    } else if (strpos($filter, 'storage') !== false) {
        $storageFilters[] = str_replace('storage', '', $filter);
    } else if (strpos($filter, 'brand') !== false) {
        $brandFilters[] = str_replace('brand', '', $filter);
    }
}

$ramQueryPart = '';
$storageQueryPart = '';
$brandQueryPart = '';

if (!empty($ramFilters)) {
    $ramQueryPart = " AND ram IN ('" . implode("','", $ramFilters) . "')";
}

if (!empty($storageFilters)) {
    $storageQueryPart = " AND storage IN ('" . implode("','", $storageFilters) . "')";
}

if (!empty($brandFilters)) {
    $brandQueryPart = " AND brand IN ('" . implode("','", $brandFilters) . "')";
}

$query = "SELECT * FROM laptops WHERE name LIKE '%$searchQuery%' " . $ramQueryPart . $storageQueryPart . $brandQueryPart;
$result = mysqli_query($connection, $query);

$laptops = [];
if ($result) {
    $laptops = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
}

foreach ($laptops as $laptop) {
    echo '<div id="headerSection">';
    echo '<div class="container" >';
    
        echo'<div class="row align-items-center">';
            echo'<div class="row mt-4">';
                echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                        echo '<img src="' . htmlspecialchars($laptop['image_url']) . '" class="card-img-top" alt="' . htmlspecialchars($laptop['name']) . '">';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . htmlspecialchars($laptop['name']) . '</h5>';
                            echo '<p class="card-text">';
                                echo htmlspecialchars($laptop['brand']) . '<br>';
                                echo htmlspecialchars($laptop['processor']) . '<br>';
                                echo htmlspecialchars($laptop['ram']) . '<br>';
                                echo htmlspecialchars($laptop['storage']) . '<br>';
                                echo htmlspecialchars($laptop['display']);
                            echo '</p>';
                            echo '<a href="routes/' . htmlspecialchars($laptop['route']) . '.php" class="btn btn-primary">Full details</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            } echo '</div>';
        echo '</div>';
    echo '</div>';

mysqli_close($connection);
?>
