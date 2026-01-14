<?php
declare(strict_types=1);

//1. Set Up & Start 


//2. Code Commenting 



//3. Variables, Data Tyoes, Concatenation, Conditional Statements & Echo

$firthName = "Name"; //python style, but close it
$age = 55;
$isPerson = true; // lower bool

echo "<p> Hello " . $firthName . ", you are " . $age . " years old. </p>";

if ($isPerson)
{
    echo "<p> Congrats, you are a person! </p>";
}
else
{
    echo "<p> Sorry, you are not a person! </p>";
}
//4. Loosely Typed Language Demo

$num1 = 1;
$num2 = "10";

function add($num1, $num2)
{
    return $num1 + (int)$num2;
}

echo "<p> The sum is: " . add($num1, $num2) . " </p>";
//5. Strict Types & Types Hints

//6. OOP with PHP 

