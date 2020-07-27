<?php
require 'includes/url.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if ($_POST['username'] == 'kelly' && $_POST['password'] =='**123'){
    $_SESSION['is_logged_in'] = true;

    die("login CORRECT");

  }else {
  die("boo");

  }
}
?>
<?php require 'includes/header.php'; ?>
<h2>LOGIN</h2>



<form method="post">
<div>
  <label for = "username">Username</label>
<input name= "username" id="username">
</div>

<div>
<label for="password">Password</label>
<input type="password" name="password" id="password">
</div>

<button>Log In</button>

</form>

<?php require 'includes/footer.php';?>
