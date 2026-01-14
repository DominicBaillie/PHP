<?php 
require "header.php"; 
//echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
require "footer.php"; 
require_once "connect.php";

include "car.php";

$carObject = new car("Honda", "Civic", 2003);

echo $carObject->getDescription();