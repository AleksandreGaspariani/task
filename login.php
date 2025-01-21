<?php 
  include 'inc/header.php';

  
  include_once 'config/Database.php';
  include_once 'models/User/User.php';
  include_once 'actions/users/create.php';
  include_once 'actions/users/login.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate user object
  $user = new User($db);

  // Get raw posted data
  if(isset($_POST['login'])){
    loginUser($_POST);
  }
  
?>

<form class='w-50' method='POST' action='login.php'>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
    </div>
    <div class='d-flex' style='gap: 8px'>
      <button type="submit" class="btn btn-primary my-2" name='login'>Submit</button>
      <a href="register.php" class='btn btn-outline-info my-2'>Register</a>
    </div>
</form>

<?php 
  include 'inc/footer.php';
?>