<?php require "includes/header.php" ;
$fname = $_GET['first_name'];
$lname = $_GET['last_name'];
$items = $_GET['items'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$email = $_GET['email'];
$comments = $_GET['comments'];
?>


<main>

    <h2> Order Processed </h2>
    <?php echo "<p>Thank you, ".$fname." ".$lname.", for your order!</p>"; ?>

    <h4>Order Summary: </h4>
<?php
    foreach ($items as $item) 
{
    echo '<p>'.$item.': '.$quantity.'</p>';
}
?>
</main>


<?php require "includes/footer.php";


?>