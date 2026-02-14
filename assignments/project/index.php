<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMP1006 - Lab Four</title>
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

            <label class="form-label mt-3" for="email">Email Address</label>
            <input class="form-control" type="email" id="email" name="email">
<!-- Submits to process.php -->
            <button class="btn btn-primary mt-4" type="submit">Submit</button>
        </form>

        <p class="mt-4">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
<!-- 
        What was difficult: There was something wrong with php my admin I fixed to get the database workijng. Getting the databse functioning and learning to send and retrieve data was new and interesting
        What was easy: The general code structure was familir to  previous code in the clas, so I was able to refer to previous lessons to get this lab  functioning
-->
</body>

</html>