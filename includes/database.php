<?php
//the code to acess the database
$db_host = "localhost";
$db_name = "cms";
$db_user = "kelly_cms";
$db_pass ="v6JEVTv3aDKBehUT";


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 // this code shows an error if cannot connect to the database
if (mysqli_connect_error()){
  echo mysql_connect_error();
  exit;
}
