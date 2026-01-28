<?php

$fname = $_GET['first_name'];
$lname = $_GET['last_name'];
echo 'Hello, '.$fname.' '.$lname.'! Your order has been received.';
echo "<h4> Order Summary: </h4>";
$items = $_GET['items'];
foreach ($items as $item => $quantity) {
    
    if ($quantity > 0) {
        echo '<p>'.$item.': '.$quantity.'</p>';
    }
}





?>