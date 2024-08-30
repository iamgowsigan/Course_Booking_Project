<?php
$con = mysqli_connect("localhost", "root", "", "coursebooking");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT courses.*, subcategory.* FROM courses JOIN subcategory ON subcategory.sub_id = courses.sub_id WHERE co_active = 1 ORDER BY co_id DESC LIMIT 8";
$result = mysqli_query($con, $query);

$courses = array();
while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = array(
        "co_id" => $row['co_id'],
        "co_name" => $row['co_name'],
        // ... (other course attributes)
    );
}

header('Content-Type: application/json');
echo json_encode($courses);

mysqli_close($con);
?>
