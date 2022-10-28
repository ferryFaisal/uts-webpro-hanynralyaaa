<?php
require "database.php";

$id = $_GET['id'];
$sql2 = "UPDATE products SET name='$name', description='$desc', price='$price', photo='$photo', modified = sysdate() WHERE id='$id'";

if ($conn->query($sql2) === TRUE) {
    echo "<br>";
    // echo "New Record created successfully";
    header('Location: read_data.php');
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
