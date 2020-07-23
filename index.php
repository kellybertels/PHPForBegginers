
<?php
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



// this code selects the data from the database
$sql = "SELECT *
        FROM article
        ORDER BY published_at;";

$results = mysqli_query($conn, $sql);
 // this piece will show an error if there is a problem retrieving the data
 if ($results === false) {
     echo mysqli_error($conn);
 } else {
     $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
 }

 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title>My blog</title>
     <meta charset="utf-8">
 </head>
 <body>

     <header>
         <h1>My blog</h1>
     </header>

     <main>
         <?php if (empty($articles)): ?>
             <p>No articles found.</p>
         <?php else: ?>

             <ul>
                 <?php foreach ($articles as $article): ?>
                     <li>
                         <article>
                             <h2><?= $article['title']; ?></h2>
                             <p><?= $article['content']; ?></p>
                         </article>
                     </li>
                 <?php endforeach; ?>
             </ul>

         <?php endif; ?>
     </main>
 </body>
 </html>
