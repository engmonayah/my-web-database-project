<?php

$host = "sql204.infinityfree.com";
$user = "if0_42650939";
$password = "XXXXXXX";
$database = "if0_42650939_users";

$conn = mysqli_connect($host, $user, $password, $database);

$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT status FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($row["status"] == 0) {
    $newStatus = 1;
} else {
    $newStatus = 0;
}

mysqli_query($conn, "UPDATE users SET status=$newStatus WHERE id=$id");

echo $newStatus;

?>