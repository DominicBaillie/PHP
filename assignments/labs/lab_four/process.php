<?php
require "includes/header.php";
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

# If errors found, display and exit
if (!empty($errors)) 
{
    echo "<h2>There were errors with your submission:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    exit;
}
# Insert into database
$sql = "INSERT INTO orders (first_name, last_name, email)VALUES (:first_name, :last_name, :email)";

# Prepare and execute
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':first_name', $fname);
$stmt->bindParam(':last_name', $lname);
$stmt->bindParam(':email', $email);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Head for process page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<!-- Thank you conformation message to user -->
    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>
        <h2> Order Processed </h2>
        <p><strong>Thank you <?php echo $fname . ' ' . $lname; ?> for your order!</strong></p>
        <h4>Contact Information:</h4>
        <p>Email: <?php echo $email; ?></p>

        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>