<?php 

    require_once 'inc/header.php';

    if (isset($_SESSION['user']) && $_SESSION['authorized'] === true) {
        include 'home.php';
    }

    require_once 'inc/footer.php';
?>

