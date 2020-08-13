<?php

/**
 * User
 *
 * A person or entity that can log in to the site
 */
class User
{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * Unique username
     * @var string
     */
    public $username;

    /**
     * Password
     * @var string
     */
    public $password;

   

    /**
     * Authenticate a user by username and password
     *
     * @param object $conn Connection to the database
     * @param string $username Username
     * @param string $password Password
     *
     * @return boolean True if the credentials are correct, null otherwise
     */
    public static function authenticate($conn, $username, $password)
    {
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
               
        $stmt->execute();

        if ($user = $stmt->fetch()) {
            return $user->password == $password;
        }
    }

    public static function getUserByID($conn, $id, $columns = '*')
    {
        $sql = "SELECT $columns
                FROM user        
                WHERE id = :id";
               
        $stmt = $conn->prepare($sql);
       
    
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
          
        //it returns an object 
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
          if ($stmt->execute()){
            
    
                return $stmt->fetch();
               
        }
    }


    public static function getTotal($conn, $user_exists = false)
{
    $condition = $user_exists ? ' WHERE username IS NOT NULL' : '';

    return $conn->query("SELECT COUNT(*) FROM user$condition")->fetchColumn();
}




protected function validate()
{
    if ($this->username == '') {
        $this->errors[] = 'Please enter a username';
    }
    if ($this->password == '') {
        $this->errors[] = 'Please enter a password';
    }

   

    return empty($this->errors);
}




public function create($conn)
{
    if ($this->validate()) {

        $sql = "INSERT INTO user (username, password)
                VALUES (:username, :password)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);

       

        if ($stmt->execute()) {
            $this->id = $conn->lastInsertId();
            return true;
        }

    } else {
        return false;
    }
}
  



}
