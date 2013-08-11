<?php
// Create connection
$con=mysqli_connect("mysql.markwoo.i-xo.net","mukk88","dbPa$$w0rd","markwoo");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{
  	echo "connected";
  }
?>