<?php 
  class User {
    // DB stuff
    private $conn;
    private $table = 'users';

    // User properties
    public $id;
    public $name;
    public $lastname;
    public $birthday;
    public $gender;
    public $about;
    public $image;
    public $password;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // login
    public function login() {
          // Create query
          $query = 'SELECT * FROM `' . $this->table . '` WHERE email = :email';

          // Prepare statement
          $stmt = $this->conn->prepare($query);
         
          // bind email
          $stmt->bindParam(':email', $this->email);
          // Execute query
          $stmt->execute();

          if ($stmt->rowCount() == 0) {
            echo json_encode(['errors' => ['Email not found']]);
            exit;
          }
          
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // die(print_r(password_verify($this->password, $row['password'])));

          if(password_verify($this->password, $row['password'])){
            $_SESSION['user'] = [
              'id' => $row['id'],
              'name' => $row['name'],
              'lastname' => $row['lastname'],
              'email' => $row['email'],
              'about' => $row['about'],
              'image' => $row['image'],
              'birthday' => $row['birthday'],
              'gender' => $row['gender'],
            ];
            
            Header('Location: index.php');
            $_SESSION['authorized'] = true;
          }else {
            echo "<p class='text-danger'> Password was incorrect </p> ";
          }
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' 
                    SET name = :name, lastname = :lastname, email = :email, 
                    birthday = :birthday , gender = :gender , about = :about , 
                    image = :image , password = :password';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->lastname = htmlspecialchars(strip_tags($this->lastname));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->birthday = htmlspecialchars(strip_tags($this->birthday));
          $this->gender = htmlspecialchars(strip_tags($this->gender));
          $this->about = htmlspecialchars(strip_tags($this->about));
          $this->image = htmlspecialchars(strip_tags($this->image));
          $this->password = htmlspecialchars(strip_tags($this->password));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':lastname', $this->lastname);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':birthday', $this->birthday);
          $stmt->bindParam(':gender', $this->gender);
          $stmt->bindParam(':about', $this->about);
          $stmt->bindParam(':image', $this->image);
          $stmt->bindParam(':password', $this->password);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET title = :title, body = :body, author = :author, category_id = :category_id
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }