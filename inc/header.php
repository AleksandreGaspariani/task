<?php 
    session_start();    
    // die(var_dump($_SESSION));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Register</title>
</head>
<body>
    <navbar class='d-flex w-100 py-2 px-5 bg-dark text-white justify-content-between align-items-center'>
        <h1 class='display-6'>Task</h1>
        <?php if(isset($_SESSION['user']['id'])): ?>
            <div class='d-flex justify-content-between align-items-center'>
                <a href="logout.php" class='btn btn-danger'>Logout</a>
            </div>
        <?php else: ?>
        <div class='d-flex justify-content-between align-items-center'>
            <a href="register.php" class='btn btn-outline-info'>Register</a>
            <a href="login.php" class='btn btn-outline-success ms-2'>Login</a>
        </div>
        <?php endif ?>
    </navbar>
    <div class='container p-5 mx-5'>