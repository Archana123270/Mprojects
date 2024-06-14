<?php
session_start();
unset($_SESSION["user"]);
header("location:http://localhost/MProject/start.html");
?>