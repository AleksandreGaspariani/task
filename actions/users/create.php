<?php 

    include 'inc/Validator.php';
    function registerUser($data){

        $database = new Database();
        $db = $database->connect();

        $user = new User($db);

        $validation_rules = [
            'name' => ['required' => true, 'maxLength' => 20],
            'lastname' => ['required' => true, 'maxLength' => 20],
            'email' => ['required' => true],
            'birthday' => ['required' => true],
            'about' => ['required' => true, 'maxLength' => 500],
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
        
        $user->name = htmlspecialchars(strip_tags($data['name']));
        $user->lastname = htmlspecialchars(strip_tags($data['lastname']));
        $user->email = htmlspecialchars(strip_tags($data['email']));
        $user->birthday = htmlspecialchars(strip_tags($data['birthday']));
        $user->gender = htmlspecialchars(strip_tags($data['gender']));
        $user->about = htmlspecialchars(strip_tags($data['about']));
        // $user->image = htmlspecialchars(strip_tags($data['image']));
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->password = $hashed_password;

        // die(var_dump($user));


        // Handle file upload securely
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            
            $imagesDirectory = "public/images/";
            if (!is_dir($imagesDirectory)) {
                mkdir($imagesDirectory);
            }
            $fileName = basename($_FILES['image']['name']);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allowed file types
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($fileType), $allowedTypes)) {
                echo json_encode(['message' => 'Invalid file format. Allowed types: jpg, jpeg, png, gif.']);
                return;
            }

            // Generate unique file name to prevent overwriting
            $uniqueFileName = uniqid('user_', true) . '.' . $fileType;
            $imagePath = $imagesDirectory . $uniqueFileName;

            // Move uploaded file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $user->image = $uniqueFileName; // Save only the file name in the database
            } else {
                echo json_encode(['message' => 'Failed to upload the image.']);
                return;
            }
        } else {
            $user->image = null; // No image provided
        }

        // die(print_r($user));

        if($user->create()){
            header('Location: login.php');
        }else {
            header('Location: register.php');
        }
        
    }    
?>