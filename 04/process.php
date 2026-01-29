<?php require "includes/header.php" ;
include 'send_email.php';
$fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$items = $_POST['items'] ?? [];
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);
$errors = [];

if ($fname === null || $fname === "") 
{
    $errors[] = "First name is required.";
}
if ($lname === null || $lname === "") 
{
    $errors[] = "Last name is required.";
}
if ($email === null || $email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email address is required.";
}elseif  (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address is not valid.";
}

if($phone === null || $phone === "") 
{
    $errors[] = "Phone number is required.";
}
if($address === null || $address === "") 
{
    $errors[] = "Address is required.";
}
if (empty($items)) 
{
    $errors[] = "At least one item must be ordered.";
}

if (!empty($errors)) 
    {
        echo "<h2>There were errors with your submission:</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>" .$error. "</li>";
        }
        exit;
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