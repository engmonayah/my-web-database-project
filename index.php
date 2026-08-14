<?php

$host = "sql204.infinityfree.com";
$user = "if0_42650939";
$password = "XXXXXXX";
$database = "if0_42650939_users";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed");
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];

    $sql = "INSERT INTO users (name, age, status)
            VALUES ('$name', '$age', 0)";

    mysqli_query($conn, $sql);
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<form method="post">
    Name:
    <input type="text" name="name" required>

    Age:
    <input type="number" name="age" required>

    <button type="submit" name="submit">Submit</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["age"]; ?></td>
        <td id="status-<?php echo $row['id']; ?>">
    <?php echo $row["status"]; ?>
    </td>
        <td>
            <button onclick="toggleStatus(<?php echo $row['id']; ?>)">Toggle</button>
        </td>
    </tr>

    <?php } ?>

</table>
    
<script src="script.js"></script>
    
</body>
</html>