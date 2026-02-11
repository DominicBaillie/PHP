<?php
# Variable initialization and sanitization
require_once "includes/connect.php";  
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}
$fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$comments  = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS));

$errors = [];

# Validation
if ($fname === null || $fname === "") 
{
    $errors[] = "First name is required.";
}
if ($lname === null || $lname === "") 
{
    $errors[] = "Last name is required.";
}
if ($phone === null || $phone === "") 
{
    $errors[] = "Phone number is required.";
}

# If errors found, display and exit
if (!empty($errors)) 
{
    echo "<h2>There were errors with your submission:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    exit;
}
# Diplay to user

$sql = "INSERT INTO orders (first_name, last_name, phone, address, email, comments)VALUES (:first_name, :last_name, :phone, :address, :email, :comments)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':first_name', $fname);
$stmt->bindParam(':last_name', $lname);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':comments', $comments);
$stmt->execute();
?>
<main>
    <h2> Order Processed </h2>
    <p><strong>Thank you <?php echo $fname . ' ' . $lname; ?> for your order!</strong></p>
    <h4>Contact Information:</h4>
    <p>Phone Number: <?php echo $phone; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Comments: <?php echo $comments; ?></p>

</main>
