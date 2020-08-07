<?php

class Article{
//@var integer
public $id;
//@var string
public $title;
//@var string
public $content;
//@var datetime
public $published_at;

public $image_file;

public $errors = [];

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


    /* Get article and separate them based on a limit, its add pages. */
    public static function getPage($conn, $limit, $offset, $only_published = false)
    {

    $condition = 'WHERE published_at IS NOT NULL'; 

        $sql = "SELECT a.*, category.name AS category_name
                FROM (SELECT *
                FROM article
                $condition
                ORDER BY published_at
                LIMIT :limit
                OFFSET :offset) AS a
                LEFT JOIN article_category2
                ON a.id = article_category2.article_id
                LEFT JOIN category
                ON article_category2.category_id = category.id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];

        $previous_id = null;

        foreach ($results as $row) {

            $article_id = $row['id'];

            if ($article_id != $previous_id) {
                $row['category_names'] = [];

                $articles[$article_id] = $row;
            }

            $articles[$article_id]['category_names'][] = $row['category_name'];

            $previous_id = $article_id;
        }
//var_dump($articles);
        return $articles;
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
{
    $sql = "SELECT $columns
            FROM article        
            WHERE id = :id";
           
    $stmt = $conn->prepare($sql);
   

    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
      
    //it returns an object 
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
      if ($stmt->execute()){
        

            return $stmt->fetch();
           
    }
}
/**
 * Get the article record based on the ID along with associated categories
 * @param object $conn Connection to the database
 * @param integer $id the article ID
 * 
 * @return array the article data with categories
 */
public static function getWithCategories($conn, $id, $only_published = false)
    {
        $sql = "SELECT article.*, category.name AS category_name
                FROM article
                LEFT JOIN article_category2
                ON article.id = article_category2.article_id
                LEFT JOIN category
                ON article_category2.category_id = category.id
                WHERE article.id = :id";

        if ($only_published){
            $sql .= 'AND article.published_at IS NOT NULL';
        }

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the article's categories
     *
     * @param object $conn Connection to the database
     *
     * @return array The category data
     */
    public function getCategories($conn)
    {
        $sql = "SELECT category.*
                FROM category
                JOIN article_category2
                ON category.id = article_category2.category_id
                WHERE article_id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function update($conn)
    {
if($this->validate()){

    $sql = "UPDATE article
    SET title = :title,
    content =:content,
    published_at = :published_at
    where id = :id";

$stmt = $conn->prepare($sql);

$stmt ->bindValue(':id',$this->id,PDO::PARAM_INT);
$stmt ->bindValue(':title',$this->title,PDO::PARAM_STR);
$stmt ->bindValue(':content',$this->content,PDO::PARAM_STR);

if ($this->published_at ==''){
    $stmt -> bindValue(':published_at',null,PDO::PARAM_NULL);

}else{
    $stmt->bindValue(':published_at',$this->published_at,PDO::PARAM_STR);
}
return $stmt->execute();

    }else   {
return false;
    }


}

public function setCategories($conn, $ids)
    {
        if ($ids) {

            $sql = "INSERT IGNORE INTO article_category2 (article_id, category_id)
                    VALUES ";

            $values = [];

            foreach ($ids as $id) {
                $values[] = "({$this->id}, ?)";
            }

            $sql .= implode(", ", $values);

            $stmt = $conn->prepare($sql);

            foreach ($ids as $i => $id) {
                $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
            }

            $stmt->execute();
        }
        $sql = "DELETE FROM article_category2
        WHERE article_id = {$this->id}";

        if($ids){
            $placeholders = array_fill(0,count($ids), '?');
            $sql .=" AND category_id NOT IN (" . implode (", ", $placeholders) . ")";

        }

       
        $stmt =$conn->prepare($sql);

        foreach ($ids as $i => $id) {
            $stmt->bindValue($i + 1, $id, PDO::PARAM_INT);
        }


        $stmt->execute();
    }














    /**
 * Validate the article properties
 *
 * @param string $title Title, required
 * @param string $content Content, required
 * @param string $published_at Published date and time, yyyy-mm-dd hh:mm:ss if not blank
 *
 * @return array boolean true if the current properties are valid false otherwise
 */
protected function validate()
{
    if ($this->title == '') {
        $this->errors[] = 'Title is required';
    }
    if ($this->content == '') {
        $this->errors[] = 'Content is required';
    }

    if ($this->published_at != '') {
        $date_time = date_create_from_format('Y-m-d H:i:s', $this->published_at);

        if ($date_time === false) {

            $this->errors[] = 'Invalid date and time';

        } else {

            $date_errors = date_get_last_errors();

            if ($date_errors['warning_count'] > 0) {
                $this->errors[] = 'Invalid date and time';
            }
        }
    }

    return empty($this->errors);
}
/**
 * Delete the current article
 * @param object $conn connection to the database
 * @return boolean True if the delete is sucessfull false otherwise
 * 
 */
public function delete($conn){
    $sql = "DELETE FROM article 
            WHERE id = :id;";

$stmt = $conn->prepare($sql);

$stmt ->bindValue(':id',$this->id,PDO::PARAM_INT);

return $stmt->execute();
}
/*insert a new article with this current property values
@param object $conn connection to the database
@return boolean true if the insert was sucessfull false otherwise
*/
public function create($conn)
{
    if ($this->validate()) {

        $sql = "INSERT INTO article (title, content, published_at)
                VALUES (:title, :content, :published_at)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($this->published_at == '') {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
        }

        if ($stmt->execute()) {
            $this->id = $conn->lastInsertId();
            return true;
        }

    } else {
        return false;
    }
}
/**
 * Get a count of the total number of records
 * @param object $conn Connection to the database
 * @return integer the total number of records
 */
public static function getTotal($conn)
{
    //COUNT THE TOTAL NUMBER OF ARTICLES and return the value directly using fetch
return $conn->query('SELECT COUNT(*)FROM article') -> fetchColumn();
}

/**
 * Update the image file property
 * @param object $conn Connection to the database
 * @param string $filename The filename of the image file
 * 
 * @return boolean True if it was sucessful, false otherwise
 */

public function setImageFile($conn, $filename)
    {
       $sql = "UPDATE article
               SET image_file = :image_file
               WHERE id = :id";

       $stmt = $conn->prepare($sql);

       $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
       $stmt->bindValue(':image_file', $filename, $filename == null ? PDO::PARAM_NULL : PDO::PARAM_STR);

       return $stmt->execute();
    }


}