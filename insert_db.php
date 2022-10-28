<?php
require "database.php";

$sql = "INSERT INTO products (id, name, description, price, photo, created, modified) 
VALUES ('$id', '$name', '$desc', '$price', '$photo', SYSDATE(), SYSDATE())";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: read_data.php');
