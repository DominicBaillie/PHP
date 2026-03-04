<?php
require_once "connect.php";

# Sanatize Inputs
$author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_SPECIAL_CHARS);
$review = filter_input(INPUT_POST, 'review_text', FILTER_SANITIZE_SPECIAL_CHARS);

# Admin Inputs
$delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$errors[] = [];

# Generic Run, index.php
if (empty($delete))
{

    # Check That User Sent Required Data
    if ($author === null or $author === "")
    {
        $errors[] = "Author required";
    }
    if ($title === null or $title === "")
    {
        $errors[] = "Author required";
    }
    if ($rating === null or $rating === "")
    {
        $errors[] = "Author required";
    }
    if ($review === null or $review === "")
    {
        $errors[] = "Author required";
    }

    # Ask for input if not recieved
    if (!empty($errors))
    {
        echo "<h2>There were errors with your submission:</h2><ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        exit;
    }
}

# Admin Run

else if ($delete)
{
    # Drop review where asked
    $sql = "DELETE FROM reviews WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

if(!empty($id)) 
{
    # Overwrite review info where asked
    $sql = "UPDATE reviews SET author = :author, title = :title, rating = :rating, review = :review WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

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
        <main class="container mt-4">
            <!-- Display Info For User -->
            <h2>Review Submitted</h2>
            <p>Author: <?php echo $author; ?></p>
            <p>Title: <?php echo $title; ?></p>
            <p>Rating: <?php echo $rating; ?></p>
            <p>Review Summary: <?php echo $review; ?></p>
        </main>
    </body>
</html>