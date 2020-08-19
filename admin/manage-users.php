

<?php

//page to manage the users, create a new user, 
//TO DO: delete , view

require '../includes/init.php';
require '../classes/User.php';
Auth::requireLogin();




$user = new User();

$conn = require '../includes/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    
    
//    if('password' !== 'confirm_password'){
//     echo "Password and Confirm pasword need to be the same";
 
// }
    if ($user->create($conn)) {
       

        Url::redirect("/PHPForBegginers/admin/manage-users.php?");

    }

    

   
 

    var_dump($user);
}







Auth::requireLogin();
$conn = require '../includes/db.php';


$paginator = new Paginator ($_GET['page'] ?? 1, 6, Article::getTotal($conn) );
$users = User::getAll($conn);
var_dump($users);


$paginator = new Paginator ($_GET['page'] ?? 1, 6, User::getTotal($conn) );


?>
<?php require '../includes/header.php'; ?>

<h2>Create a New User</h2>
<?php require '../includes/new-user-form.php'; ?>






    <table class="table">
    <thead>
        <tr>
    <th>User</th>
    <th>Delete</th>
    
</tr>
    </thead>
    <tbody>

    <?php if (empty($users)) : ?>
    <p>No Users found.</p>
<?php else : ?>

   
        <?php foreach ($users as $user) : ?>
            
            <tr>
                    <td>
                              

                    <h2><?= htmlspecialchars($user['username']); ?></h2>
                   
                    </td>
                   
<td> 
 
<form method="post" action="delete-user.php?id=<?php echo$user['id']; ?>">
        <button class= 'delete2'>Delete</button>
    </form>
                         
</td>
<?php endforeach;?> 

        

        </tr>       
           
           
      
       
<td>                            
</td>
        
   


   
<?php endif; ?>




</tbody>
    </table>

  <?php require '../includes/pagination.php';?>



<?php require '../includes/footer.php'; ?>

   

