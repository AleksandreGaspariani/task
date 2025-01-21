<?php 
    
    function loginUser($data){
        $database = new Database();
        $db = $database->connect();

        $user = new User($db);

        $validation_rules = [
            'email' => ['required' => true],
            'password' => ['required' => true],
        ];

        $errors = [];

        foreach ($validation_rules as $field => $rules) {
            $error = validate_input($field, $_POST, $rules['required'], $rules['maxLength'] ?? null);
            if ($error) {
                $errors[] = $error;
            }
        }

        if (!empty($errors)) {
            echo json_encode(['errors' => $errors]);
            exit;
        }

        $user->email = htmlspecialchars(strip_tags($data['email']));
        $user->password = htmlspecialchars(strip_tags($data['password']));

        $user->login();
    }
?>