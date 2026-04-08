<?php
require_once "includes/connect.php";
require_once "includes/auth.php";
$sql = "SELECT * FROM resumes ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$length = count($resumes);
?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!-- Bootstrap and meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP1006 - Project Phase 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<main class="container mt-4">
  <h1>Resumes</h1>

  <?php if (count($resumes) === 0): ?>
    <p>No resumes yet.</p>
  <?php else: ?>
    <div class="container mt-4">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

        <form action="process.php" method="post" class="mt-3">
<!-- The form, retrieves values from the user -->
            <label class="form-label" for="first_name">First Name</label>
            <input class="form-control" type="text" id="first_name" name="first_name">

            <label class="form-label mt-3" for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" name="last_name">

            <label class="form-label mt-3" for="current_position">Current Position</label>
            <input class="form-control" type="text" id="id" name="id">

            <label for= "delete" class="form-label">Delete</label>
            <input type="checkbox" id="delete" name="delete">
            <br>

            <label for="phone"class = "form-label">Phone number</label>
            <input type="tel" id="phone" name="phone" placeholder="555-123-4567" class = "form-control">

            <label class="form-label mt-3" for="email">Email Address</label>
            <input class="form-control" type="email" id="email" name="email">

            <label class="form-label mt-3" for="skills">Skills</label>        
            <textarea class="form-control mb-2" id="skills" name="skills" placeholder="Enter skills" rows = "5"></textarea>

            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
            <h1>Submit Image</h1>
                    <label for="image_path" class="form-label">Image</label>
                    <input
                        type="file"
                        id="image_path"
                        name="image_path"
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
        </div>
        <!-- Loops through resumes in project -->
        <?php foreach ($resumes as $resume): ?>
          <tr>
        <!-- Echo each item in subscriber -->
          <?php if (!empty($resume['image_path'])): ?>
              <div class="col-md-4 mb-4">
                      <img
                        src="<?= htmlspecialchars($resume['image_path']); ?>"
                        class="card-img-top"
                        alt="<?= htmlspecialchars($resume['descrip']); ?>"
                      >
                  </div>
            <?php endif; 
            echo "<p><strong>ID:</strong> " . htmlspecialchars($resume['id']) . "</p>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($resume['first_name']) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($resume['last_name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($resume['email']) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($resume['phone']) . "</p>";
            echo "<p><strong>Bio:</strong> " . htmlspecialchars($resume['bio']) . "</p>";
            $skillsarray = explode(",", $resume['skills']);
             foreach ($skillsarray as $skill) {
                echo "<ul><li>" . $skill . "</li></ul>";
            } ?>
        <?php endforeach; ?>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Form</a>
  </p>
</main>