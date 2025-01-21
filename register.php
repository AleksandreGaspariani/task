
<?php 

    include 'inc/header.php';

  // Headers
//   header('Access-Control-Allow-Origin: *');
//   header('Content-Type: application/json');
//   header('Access-Control-Allow-Methods: POST');
//   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'config/Database.php';
  include_once 'models/User/User.php';
  include_once 'actions/users/create.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate user object
  $user = new User($db);

  // Get raw posted data
  if (isset($_POST['register'])) {
    registerUser($_POST);
  }

  ?>

<form class='w-50' method='POST' action='register.php' enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="" placeholder="Enter your name" name='name'>
    </div>
    <div class="form-group">
        <label for="">Lastname</label>
        <input type="text" class="form-control" id="" placeholder="Enter your lastname" name='lastname'>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="">Birthday</label>
        <input type="date" class="form-control" id="" placeholder="Enter your name" name='birthday'>
    </div>
    <fieldset>
        <legend>Select your gender:</legend>

        <div class='d-flex' style='gap: 8px'> 
            <div>
                <input type="radio" id="male" name="gender" value="0" checked />
                <label for="">Male</label>
            </div>

            <div>
                <input type="radio" id="female" name="gender" value="1" />
                <label for="">Female</label>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label for="">About</label>
        <textarea class="form-control" id="" placeholder="About me..." name='about'></textarea>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" id="" placeholder="Enter your name" name='image' accept="image/*">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
    </div>
    <div class='d-flex' style='gap: 8px'>
        <button type="submit" name='register' class="btn btn-primary my-2">Register</button>
    </div>
</form>

<?php include 'inc/footer.php'; ?>

    