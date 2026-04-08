<?php
    require_once "includes/connect.php";
    session_start();

    // Prevent standard browser/proxy caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- Bootstrap and meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP1006 - Project Phase 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <div class="g-recaptcha" data-sitekey="6LcmOqssAAAAAMFfnozsGkbQ7d8Hb7IER4ou29Yk"></div>
</head>

<?php
// Prevent standard browser/proxy caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");


// access the current session & check to see whether the user is logged in
<?php

if (empty($_SESSION["user_id"])) {
    ?>
    <h3>Please log in</h3>
    <a href="login.php">Log in</a>
    <?php
}
else{
    ?>
<body>
    <main class="container mt-4">
        <h1>Resume Builder</h1>
<!-- The form, retrieves values from the user -->
        <form action="process.php" method="post" class="mt-3">
        <form method="post" enctype="multipart/form-data" class="mt-3">
            <div class="g-recaptcha" data-sitekey="6LcmOqssAAAAAMFfnozsGkbQ7d8Hb7IER4ou29Yk"></div>

            <label class="form-label" for="first_name">First Name</label>
            <input class="form-control" type="text" id="first_name" name="first_name">

            <label class="form-label mt-3" for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" name="last_name">

            <label class="form-label mt-3" for="current_position">Current Position</label>
            <input class="form-control" type="text" id="current_position" name="current_position">

            <label for="phone"class = "form-label">Phone number</label>
            <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class = "form-control">

            <label class="form-label mt-3" for="email">Email Address</label>
            <input class="form-control" type="email" id="email" name="email">

            <label class="form-label mt-3" for="skills">Skills</label>        
            <textarea class="form-control mb-2" id="skills" name="skills" placeholder="Enter skills" rows = "5"></textarea>

            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
            
<!-- Submits to process.php -->
            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>
        <main class="container mt-4">
    <h1>Submit Image</h1>
    <!--enctype="multipart/form-data" required for uploads, will not send properly if not included -->
    <form method="post" enctype="multipart/form-data" class="mt-3">
        <label for="description" class="form-label">Description</label>
        <textarea
            id="description"
            name="description"
            class="form-control mb-3"
            rows="4"
            required></textarea>

            <label for="product_image" class="form-label">Image</label>
            <input
                type="file"
                id="product_image"
                name="product_image"
                class="form-control mb-4"
                accept=".jpg,.jpeg,.png,.webp">

            <label for="descrip" class="form-label">Image Description</label>
            <textarea
                id="descrip"
                name="descrip"
                class="form-control mb-3"
                rows="4"
                required></textarea>
<!-- Submits to process.php -->
            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>
        <main class="container mt-4">

        <p class="mt-4">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <a href="update.php">View Current Resumes</a>
            <a href="logout.php" class="ms-3">Logout</a>
        </p>
    </main>
</body>
<?php } ?>
</html>