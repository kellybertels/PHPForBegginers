


  <?php

require '../includes/init.php';


Auth::requireLogin();
$conn = require '../includes/db.php';





if (isset($_GET['id'])) {

    $user = User::getUserByID($conn, $_GET['id']);

    if ( ! $user) {
      die("user not found");
  }

} else {
  die("id not supplied, user not found");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if($user->delete($conn)){

          Url::redirect("/PHPForBegginers/admin/manage-users.php");

      } 
  }
