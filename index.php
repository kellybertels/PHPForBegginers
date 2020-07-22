
<?php
$db_host = "localhost";
$db_name = "cms";
$db_user = "";
$db_pass ="";


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 // this code shows an error if cannot connect to the database
if (mysqli_connect_error()){
  echo mysql_connect_error();
  exit;
}
echo "Connected Sucessfully.";
/*

// this code selects the data from the database
$sql = "SELECT *
FROM article
ORDER BY published_at;";

$results = mysqli_query($conn, $sql);
 // this piece will show an error if there is a problem retrieving the data
if ($results === false){
echo mysqli_error($conn);
} else{
  $articles = mysqli_fetch_all(results);
  var_dump($articles);
}
*/
