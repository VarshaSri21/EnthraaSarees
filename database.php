<?php 

session_start();

// access details
$host="localhost";
$username="root";
$password="";
$db="project";

// try to connect database using mysqli connection
$mysqli = new mysqli($host,$username,$password,$db);

// checking connection if it's  not through error
