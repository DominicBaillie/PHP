<?php 
// Import section, require header, footer and the connect php. Include the car php
require "header.php"; 
//echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
require "footer.php"; 
require_once "connect.php";

include "car.php";

// Create the car object, containing the brand/make, the modle and the year
$carObject = new car("Honda", "Civic", 2003);

echo "<br>"; // New line

// Call to getDescription function in echo
echo $carObject->getDescription();

/*  ----- What was diffictult?  -----

    Getting the database was quite a pain and what I spent most of my time working on. I found myself personally getting into the config file of the pphmyadmin configging it to work without a password, and with a costum port oppened to work alongside mysql in another class. With the project, outside of port issues and stuff, I know how to code objects and stuff already, but I did need to figure out how to  type stuff in php. I generally use c# or a bit of python, the constructor was different using '__', the this used -> rather than . and other stuff like that.

    As for what was easy, the general logic is similar to any python or c# program I've done before. So outside of learning the different way of wording(syntax) things it was quite a simple program once you get passed that.

*/