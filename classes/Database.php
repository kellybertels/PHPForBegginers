<?php

/* Database
A connection to the database 
*/

class Database
{
/* get the dabase connection
 *
 * 
 * @ return PDO object Connection to the database server 
 *  
 */




    public function getConn()
    {
        $db_host = "localhost";
        $db_name = "cms";
        $db_user = "kelly_cms";
        $db_pass ="v6JEVTv3aDKBehUT";
   
        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
    
        try{
            $db = new PDO($dsn, $db_user, $db_pass);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   catch(PDOException $e)  {
        echo $e->getMessage();
        exit;
        }


    }


}