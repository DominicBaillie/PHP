<?php
# Variable initialization and sanitization
$fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);

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
?>
<main>
    <h2> Order Processed </h2>
    <p><strong>Thank you <?php echo $fname . ' ' . $lname; ?> for your order!</strong></p>
    <h4>Contact Information:</h4>
    <p>Phone Number: <?php echo $phone; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Comments: <?php echo $comments; ?></p>

</main>
