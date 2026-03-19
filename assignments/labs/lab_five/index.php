<?php
// Connect to the database
require "includes/connect.php";
// Show the admin-style header/navigation
// Array for validation errors
$errors = [];
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error']  !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error With Upload";
        } else { 
            $allowedType = ['image/jpeg', 'image/png', 'image/webp', 'image/jpg']; 
            $detectedType = mime_content_type($_FILES['product_image']['tmp_name']);
            if (!in_array($detectedType, $allowedType, true)) {
                $errors[] = "Invalid File Type";
            } else {
                $extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
                $safeFilename = uniqid('product_', true) . '.' . strtolower($extension);
                $destination = __DIR__ . '/uploads/' . $safeFilename;
                if (move_uploaded_file($_FILES['product_image']['tmp_name'], $destination)) {
                    $imagePath = 'uploads/' . $safeFilename;
                } else {
                    $errors[] = "Upload Failed";
                }
            }
        }
    }

    if (empty($errors)) {
        $sql = "INSERT INTO images (image_path)
                VALUES (:image_path)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':image_path', $imagePath);
        $stmt->execute();

        $success = "Image Uploaded";
    }
}
?>

<main class="container mt-4">
    <h1>Add Profile Picture</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <h3>We Found the Following Errors:</h3>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" class="mt-3">
        <label for="product_image" class="form-label">Profile Image</label>
        <input
            type="file"
            id="product_image"
            name="product_image"
            class="form-control mb-4"
            accept=".jpg,.jpeg,.png,.webp">

        <button type="submit" class="btn btn-primary">Add Image</button>
    </form>
    <p class="mt-4">
            <a href="profile.php">View Images</a>
    </p>
</main>

                <!--  Reflection Questions

                    1. The $_FILES superglobal in php is what handles file types in PHP. It allows collection of file type data, like size and type (JPG, PNG), which is why it is used over other superglobals like $_POST which can handle text type data.

                    2. Without special settings the form cannot send data on files. As stated in the setting, forms use a different data type than text and needs to be sent in chunks so without this setting nothing will be sent.

                    3. move_uploaded_file() As the name suggests this moves the file, which is required to get the file out of the temp location and into an uploads folder

                    4. The file does not ny defualt go into an uploads file, the temp location will not permenately store data so for further use it needs to be moved to a more permenate locations. 


                -->

<?php require "includes/footer.php"; ?>