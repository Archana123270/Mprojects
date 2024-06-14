<?php
$servername = "localhost:3309";
$username = "root";
$password = "";
$dbname = "project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $sql = "INSERT INTO signup(id,username,email) VALUES ('$id','$username','$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["read"])) {
        $sql = "SELECT * FROM signup";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Id: " . $row["id"] . " - Name: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    } elseif (isset($_POST["update"])) {
        $eid = $_POST["id"];
        $ename = $_POST["username"];
        $sql = "UPDATE signup SET username='$username' WHERE id='$eid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["delete"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM signup WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<html>
<head>
    <title>CRUD Operations</title>
</head>
<body>
<h1>CRUD Operations</h1>
<form method="post">
    <label for="id"> ID:</label>
    <input type="number" name="id" required><br><br>

    <label for="username"> Name:</label>
    <input type="text" name="username" required><br><br>

    <label for="email"> Email:</label>
    <input type="text" name="email" required><br><br>

    <input type="submit" name="create" value="Create">
    <input type="submit" name="read" value="Read">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete">
</form>
</body>
</html>
