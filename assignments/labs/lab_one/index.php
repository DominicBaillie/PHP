<?php 
// Import section, require header, footer and the connect php. Include the car php
require "header.php"; 
//echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
require "footer.php"; 
require_once "connect.php";

include "car.php";

// Create the car object, containing the brand/make, the modle and the year
$carObject = new car(" Honda", "Civic", 2003);

// Call to getDescription function in echo
echo $carObject->getDescription();