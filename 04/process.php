<?php require "includes/header.php" ;
$fname = $_GET['first_name'];
$lname = $_GET['last_name'];
$items = $_POST['items'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$comments = $_POST['comments'];
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