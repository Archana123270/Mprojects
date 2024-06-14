<?php
require("connections.php");
?>
<html>
<head>
<title>Admin Login Panel</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<link rel="stylesheet" type="text/css" href="mycss.css">
<style>
        body{
            margin:0px;
        }
        div.header{
            font-family:poppins;
            display:flex;
            justify-content: space-between;
            align-items:center;
            padding:0px 60px;
            h1{
                text-align: center;
                color: white
            }
background-color: #204969;
        }
        div.header button{
            background-color: #f0f0f0;
            font-weight:550;
            font-size:16px;
            padding:8px 12px;
            border:2px solid black;
            border-radius:5px;
        }
        </style>
</head><body><center>
<div class="header">
<marquee width="60%" direction="right" height="60px"><h1 >ADMIN PAGE</h1></marquee>

    </div></center>


<div class="login-form">
<h2>ADMIN LOGIN PANEL</h2>
<form method="POST">
<div class="input-field">
<input type="text" placeholder="Admin Name" name="AdminName">
</div>
<div class="input-field">
<input type="password" placeholder="Password" name="AdminPassword">
</div>
<button type="submit" name="Signin">Sign In</button>
<div class="extra">
<a href="#"> Forgot Password ?</a>
</div>
</form>
</div>
<?php
if(isset($_POST['Signin']))
{
  $query= "SELECT * FROM `admin_login` WHERE Admin_Name='$_POST[AdminName]' AND Admin_Password='$_POST[AdminPassword]'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)==1)
{
    session_start();
    $_SESSION['AdminLoginId']=$_POST['AdminName'];
    header("location: admin_panel.php");
}
else{
    echo"<script>alert('Incorrect password');</script>";
}
}
?>
</body>
</html>