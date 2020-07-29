<?php

class Article{

    /*Get all articles 
@param object $conn Connection to the database
@return array An associative array of all article records

    */
    public static function getAll($conn){
        $sql = "SELECT *
        FROM article
        ORDER BY published_at;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

/**
 * Get the article record based on the ID
 *
 * @param object $conn Connection to the database
 * @param integer $id the article ID
 * @param string $columns Optional list of columns for the select, defaults to *
 *
 * @return mixed An associative array containing the article with that ID, or null if not found
 */
public static function getByID($conn, $id, $columns = '*')
{//PDO allows you to use named parameter replacing the ?
    $sql = "SELECT $columns
            FROM article        
            WHERE id = :id";
            //WHERE id = ?";

    $stmt = $conn->prepare($sql);
    //$stmt = mysqli_prepare($conn, $sql);

    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
      //  mysqli_stmt_bind_param($stmt, "i", $id);

      if ($stmt->execute()){
        //if (mysqli_stmt_execute($stmt)) {

            return $stmt->fetch(PDO::FETCH_ASSOC);
           // $result = mysqli_stmt_get_result($stmt);
           // return mysqli_fetch_array($result, MYSQLI_ASSOC);
        
    }
}



}