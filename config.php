<?php

$con = mysqli_connect('localhost', 'root','mysql');

$sql = "CREATE DATABASE all_in_all";
if ($con->query($sql) === TRUE) {
} 

$conn = mysqli_connect('localhost', 'root','mysql','all_in_all');


?>