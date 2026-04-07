<?php
require_once "connect.php";  
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}
# Sanatize
$fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$skills = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$bio  = trim(filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS));
$delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$images = filter_input(INPUT_POST, 'images', FILTER_SANITIZE_SPECIAL_CHARS);
# Make into a list
$skillsarray = explode(", ", $skills);

$errors = [];

# Validation / I don't expect a name and such if it's being deleted
if (empty($delete))
{
    if ($fname === null || $fname === "") 
    {
        $errors[] = "First name is required.";
    }
    if ($lname === null || $lname === "") 
    {
        $errors[] = "Last name is required.";
    }
    if ($email === null || $email === "") 
    {
        $errors[] = "Email is required.";
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
}
# IF update.php has delete checked, delete
if ($delete) 
{
    # Sql to delete on ID
    $sql = "DELETE FROM resumes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    ?>
    <h4>Resume Deleted:</h4>
    <p>ID: <?php echo $id; ?></p>
    <?php
    exit;
}
# Update database if update.php sends an id
if(!empty($id)) 
{
    $sql = "UPDATE resumes SET first_name = :first_name, last_name = :last_name, bio = :bio, skills = :skills, email = :email, phone = :phone WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':first_name', $fname);
    $stmt->bindParam(':last_name', $lname);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':skills', $skills);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    ?>
    <h4>Resume Updated:</h4>
    <p>ID: <?php echo $id; ?></p>
    <?php
    exit;
}
# Insert into database
$sql = "INSERT INTO resumes (first_name, last_name, bio, skills, email, phone)VALUES (:first_name, :last_name, :bio, :skills, :email, :phone)";

# Prepare and execute
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':first_name', $fname);
$stmt->bindParam(':last_name', $lname);
$stmt->bindParam(':bio', $bio);
$stmt->bindParam(':skills', $skills);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
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
            <h2>Information Submitted</h2>
            <p><strong>Thank you <?php echo $fname . ' ' . $lname; ?> for submitting your information</strong></p>
            <main class="container mt-4">
            <?php if (empty($images)): ?>
                <p>Upload an Image</p>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($images as $image): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if (!empty($image['image_path'])): ?>
                                    <img
                                        src="<?= htmlspecialchars($image['image_path']); ?>"
                                        class="card-img-top"
                                    >
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

</main>
            <h4>Contact Information:</h4>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone: <?php echo $phone; ?></p>
            <h4>Bio:</h4>
            <p><?php echo $bio; ?></p>
            <!-- List skills provided -->
            <h4>Skills:</h4>
            <?php foreach ($skillsarray as $skill) { ?>
                <ul><li>Skill: <?php echo $skill; ?></li></ul>
            <?php } ?>
            <p class="mt-3">
                <a href="update.php">View Submissions</a>
            </p>
        </main>
    </body>

</html>