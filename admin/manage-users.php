

<?php

//page to manage the users, create a new user, 
//TO DO: delete , view

require '../includes/init.php';

Auth::requireLogin();

$user = new User();

$conn = require '../includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $confirm_password = $_POST['confirm-password'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    
   
    if ($user->create($conn)) {
       

        Url::redirect("/PHPForBegginers/admin/manage-users.php?");

    }

   
 

    var_dump($user);
}

?>
<?php require '../includes/header.php'; ?>

<h2>Create a New User</h2>

<?php require '../includes/new-user-form.php'; ?>

<?php require '../includes/footer.php'; ?>
