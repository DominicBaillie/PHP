<!DOCTYPE html>
<html lang="en">

<head>
<!-- Bootstrap and meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP1006 - Project Phase 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <main class="container mt-4">
        <h1>Resume Builder</h1>
<!-- The form, retrieves values from the user -->
        <form action="process.php" method="post" class="mt-3">
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

            <label class="form-label mt-3">Skills</label>        
            <textarea class="form-control mb-2" id="skills" name="skills" placeholder="Skill1, Skill2, Skill3" rows = "1"></textarea>

            <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
            
<!-- Submits to process.php -->
            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>

        <p class="mt-4">
            <a href="update.php">View Current Resumes</a>
        </p>
    </main>
<!-- 
        Difficult: Learning to add multi functionality to process.php was new and cool. I had multiple pages able to submit and get different results, such as; editing, deleting, or the base functionality. Also for some reason printing skills was a pain, gave up and just used a ', ' sperator
        Easy: We learned the base setup for forms and processing in class, so that didn't take up too much time to alter for this project

-->
</body>

</html>