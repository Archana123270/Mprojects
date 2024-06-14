<?php
$con=mysqli_connect("localhost:3309","root",'', "testing");
if(mysqli_connect_error())
{
echo "Cannot Connect";
exit();
}
else{
echo "Connected";
}
?>