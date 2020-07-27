<?php

session_start();

?>
<?php require 'includes/header.php'; ?>
<h2>LOGIN</h2>

<form>
<div>
  <label for = "username">Username</label>
<input name ="username" id"username">
</div>

<div>
<label for="password">Password</label>
<input type="password" name="username" id="username">
</div>

<button>Log In</button>

</form>

<?php require 'includes/footer.php';?>
