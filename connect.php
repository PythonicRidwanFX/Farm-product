<?php 
$conn = mysqli_connect('localhost', 'root', '', 'farm_store');

if(!$conn){
    echo "Database not connected";
}