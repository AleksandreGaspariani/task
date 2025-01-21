<?php 
    require_once 'inc/header.php';

    $user = $_SESSION['user'];

    // die(print_r($user))

?>

<div class='container'>
    <div class='d-flex justify-content-between align-items-center'>
        <h1 class='display-4'>Welcome to the Task App <?php echo $user['name'] ?></h1>
    </div>
    <hr>
    <p class='lead'> Your information is down below: </p>
    <div class='d-flex justify-content-between align-items-center'>
        <div class='d-flex flex-column'>
            <p class='lead'>Name: <?php echo $user['name'] ?></p>
            <p class='lead'>Lastname: <?php echo $user['lastname'] ?></p>
            <p class='lead'>Email: <?php echo $user['email'] ?></p>
            <p class='lead'>Birthday: <?php echo $user['birthday'] ?></p>
            <p class='lead'>About me: <?php echo $user['about'] ?></p>
            <p class='lead'>Gender: <?php echo $user['gender'] == 0 ? 'Male' : 'Female' ?></p>
        </div>
        <div>
            <img src="public/images/<?php echo $user['image'] ?>" alt="User Image" class='img-fluid' style='max-width: 300px'>
        </div>
    </div>
    
</div>

<?php require_once 'inc/footer.php'?>