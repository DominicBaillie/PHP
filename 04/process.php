<?php require "includes/header.php" ;
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$items = $_POST['items'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$comments = $_POST['comments'];
?>


<main>

    <h2> Order Processed </h2>
    <p><strong>Thank you <?php echo $fname . ' ' . $lname; ?> for your order!</strong></p>
    <h4>Contact Information:</h4>
    <p>Phone Number: <?php echo $phone; ?></p>
    <p>Address: <?php echo $address; ?></p>
    <p>Email: <?php echo $email; ?></p>

    <h4>Order Summary: </h4>
<?php
    foreach ($items as $item => $quantity) 
{
    echo '<li><p>'.$item.': '.$quantity.'</p></li>';
}
?>
</main>


<?php require "includes/footer.php";


?>