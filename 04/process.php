<?php require "includes/header.php" ;
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$items = $_POST['items'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$comments = $_POST['comments'];




if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
    echo "Email address '$email' is considered valid.\n";
} else {
    echo "Email address '$email' is considered invalid.\n";
}

if (filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) 
{
    echo "Phone number '$phone' is considered valid.\n";
} else {
    echo "Phone number '$phone' is considered invalid.\n";
}

if (filter_var($fname, FILTER_DEFAULT)) 
{
    echo "First name '$fname' is considered valid.\n";
} else {
    echo "First name '$fname' is considered invalid.\n";
}
if (filter_var($lname, FILTER_DEFAULT)) 
{
    echo "Last name '$lname' is considered valid.\n";
} else {
    echo "Last name '$lname' is considered invalid.\n";
}

if (filter_var($address, FILTER_DEFAULT)) 
{
    echo "Address '$address' is considered valid.\n";
} else {
    echo "Address '$address' is considered invalid.\n";
}

if (filter_var($comments, FILTER_DEFAULT)) 
{
    echo "Comments '$comments' is considered valid.\n";
} else {
    echo "Comments '$comments' is considered invalid.\n";
}

if (filter_var($items, FILTER_VALIDATE_INT)) 
{
    echo "Items '$items' is considered valid.\n";
} else {
    echo "Items '$items' is considered invalid.\n";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo "Email address '$email' is considered valid.\n";
} else {
    echo "Email address '$email' is considered invalid.\n";
}

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