<?php
# Connect to database
require_once "connect.php";

#Get all the submitted reviews
$sql = "SELECT * FROM reviews ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resumes = $stmt->fetchAll(PDO::FETCH_ASSOC);
$length = count($reviews);
?>
<main class="container mt-4">
    <!-- Show Reviews to USer -->
    <h1>Reviews</h1>

    <?php if (count($reviews) === 0): ?>
        <p>No Reviews Yet.</p>
    <?php else: ?>
            <table class="table table-bordered mt-3">
            <thead>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
                <tr>
                <!-- Table headers -->
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Rating</th>
                <th>Review</th>
                </tr>
            </thead>
            <tbody>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

                <!-- Loops through reviews in project -->
                <?php foreach ($reviews as $reviews): ?>
                    <tr>
                        <!-- Echo each item in reviews -->
                        <td><?php echo htmlspecialchars($resume['id']); ?></td>
                        <td><?php echo htmlspecialchars($resume['author']); ?></td>
                        <td><?php echo htmlspecialchars($resume['title']); ?></td>
                        <td><?php echo htmlspecialchars($resume['rating']); ?></td>
                        <td><?php echo htmlspecialchars($resume['review']); ?></td>
                    </tr>
                <?php endforeach; ?>


                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <title>Admin Page</title>
                    </head>
                        <body>

                            <h1>Edit a Book Review</h1>

                            <form action="process.php" method="POST">

                                <!-- Same format of form from index, but with an ID and Delete option -->
                                <label class="form-label mt-3" for="id">Review ID</label>
                                <input class="form-control" type="text" id="id" name="id">

                                <label for= "delete" class="form-label">Delete?</label>
                                <input type="checkbox" id="delete" name="delete">
                                <br>

                                <label for="title">Book Title:</label>
                                <input type="text" id="title" name="title">

                                <label for="author">Author:</label>
                                <input type="text" id="author" name="author">

                                <label for="rating">Rating (1 to 5):</label>
                                <input type="number" id="rating" name="rating" min="1" max="5">

                                <label for="review_text">Review:</label>
                                <textarea id="review_text" name="review_text" rows="6" cols="40"></textarea>

                                <button type="submit">Submit Changes</button>

                            </form>

                            <p>
                                    <!-- Return Home -->
                                    <a href="index.php">Go to Main Page</a>
                            </p>
                    </body>
            </tbody>
        </table>
    </main>
    </html>
<?php endif; ?>
<?php
