<?php
require_once "connect.php";
$sql = "SELECT * FROM resumes ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$length = count($resumes);
?>
<main class="container mt-4">
  <h1>Resumes</h1>

  <?php if (count($resumes) === 0): ?>
    <p>No resumes yet.</p>
  <?php else: ?>
    <table class="table table-bordered mt-3">
      <thead>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <tr>
          <!-- Table headers -->
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Bio</th>
          <th>Skills</th>
          

        </tr>
      </thead>
      <tbody>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <!-- Loops through resumes in project -->
        <?php foreach ($resumes as $resume): ?>
          <tr>
        <!-- Echo each item in subscriber -->
            <td><?php echo htmlspecialchars($resume['id']); ?></td>
            <td><?php echo htmlspecialchars($resume['first_name']); ?></td>
            <td><?php echo htmlspecialchars($resume['last_name']); ?></td>
            <td><?php echo htmlspecialchars($resume['email']); ?></td>
            <td><?php echo htmlspecialchars($resume['phone']); ?></td>
            <td><?php echo htmlspecialchars($resume['bio']); ?></td>
            <td><?php echo htmlspecialchars($resume['skills']); ?></td>
          </tr>
        <?php endforeach; ?>
        <form action="process.php" method="post" class="mt-3">
            <label class="form-label" for="id">Select ID to Edit</label>
            <input class="form-control" type="text" id="id" name="id" maxlength length >

            <input class="form-control" type="checkbox" id="delete" name="delete">Delete Selected?</label>
            <label class="form-label" for="delete">Delete Selected?</label>
            
            <input class="form-control" type="text" id="first_name" name="first_name">
            <label class="form-label" for="first_name">First Name</label>

            <label class="form-label mt-3" for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" name="last_name">

            <label class="form-label mt-3" for="current_position">Current Position</label>
            <input class="form-control" type="text" id="current_position" name="current_position">

            <label class="form-label mt-3" for="email">Email Address</label>
            <input class="form-control" type="email" id="email" name="email">

            <label class="form-label mt-3">Skills</label>        
            <input type="text" name="skills[]" class="form-control mb-2" placeholder="Enter a skill">

            <button type="button" class="btn btn-secondary btn-sm" onclick="addSkill()">Add Another Skill</button>

            <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>

            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>
      </tbody>
    </table>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Form</a>
  </p>
</main>