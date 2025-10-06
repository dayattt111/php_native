<?php
include '../config/database.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
     echo $row['username'] . "<br>";
}
?>
