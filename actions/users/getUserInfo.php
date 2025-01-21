<?php 

    function getUser($id){
        $database = new Database();
        $db = $database->connect();

        $user = new User($db);

        $user->id = $id;

        $data = $user->getData();

        echo json_encode($data);
    }
?>