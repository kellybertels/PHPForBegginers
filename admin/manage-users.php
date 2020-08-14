

<?php

//page to manage the users, create a new user, 
//TO DO: delete , view

require '../includes/init.php';

Auth::requireLogin();




$user = new User();

$conn = require '../includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

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






<table class="table">

    <thead>
<tr>
    <th>User</th>
    <th>id-Action-delete?</th>
</tr>
    </thead>
    <tbody>



        </tbody>
    </table>




   

<?php require '../includes/footer.php'; ?>