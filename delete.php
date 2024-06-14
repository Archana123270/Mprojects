<?php
include "connection.php";
$id = $_GET["id"];
$query = "DELETE FROM `signup` WHERE `id` = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
  header("Location: indexx.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}