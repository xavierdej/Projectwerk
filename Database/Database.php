<?php 
	error_reporting(E_ALL);
    ini_set('display_errors', 1);


    class Database
    {
        private static $db = NULL;

        const DSN = "mysql:host=10.246.16.200;port=3306;dbname=dejager.be";
        const USERNAME = "dejager_be@phpmyadmin01.local.one.com";
        const PASSWORD = "";

        public static function getInstance() 
        {
            if (self::$db) 
            {
                return self::$db;
            }
            try 
            {
                self::$db = new PDO(self::DSN, self::USERNAME, self::PASSWORD);
                echo 'Connection made!!'
                return self::$db;
            }
            catch (PDOException $e) 
            {
                echo 'Connection failed: ' . $e->getMessage();
                exit();
            }        

            return self::$db;
        }
    }

    function ValidateInput() //arguments should be params entered
        {
            //check if data is ok
            //if so submit to database
            //else ask user to edit data
            if (isset($_POST['sendToServer'])) 
            {
                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $username=$_POST['username'];
                $email=$_POST['email'];
                $passhash=hash('sha256', $_POST['password']);
                $url=$_POST['url'];
                $age=$_POST['age'];
                $active=0;

                $validPassword = (hash('sha256', $_POST['password']) == hash('sha256', $_POST['repeatPassword']));
                if (!$validPassword) 
                {
                    echo 'Passwords do not match!';
                }

                $query = "SELECT * FROM users WHERE username='$username'";
                $db = Database::getInstance()->prepare($query);
                $validUsername = false;
                if($db->execute())
                {
                    $fetch = $db->fetchAll();
                    $validUsername = count($fetch)<=0;
                }
                if (!$validUsername) 
                {
                    echo 'Not a valid usernamen already in use!';
                }

                $query = "SELECT * FROM users WHERE email='$email'";
                $db = Database::getInstance()->prepare($query);
                $validEmail = false;
                if($db->execute())
                {
                    $fetch = $db->fetchAll();
                    $validEmail = count($fetch)<=0;
                }
                if (!$validEmail) 
                {
                    echo 'Not a valid email, already in use!';
                }

                if($validPassword && $validUsername && $validEmail)
                {
                    $query = "INSERT INTO users(firstname, lastname, username, passhash, email, link_to_user_page, age, active) VALUES ('$firstname', '$lastname', '$username', '$passhash', '$email', '$url', '$age', '$active')";
                    $db = Database::getInstance()->prepare($query);
                    $db->execute();
                    echo "<p>Data written in database</p>";
                    $_POST['firstname']="";
                    $_POST['lastname']="";
                    $_POST['username']="";
                    $_POST['email']="";
                    $_POST['link_to_user_page']="";
                    $_POST['age']="";
                }

                //echo "Validator activated"; //for debug only
            }
        }
 ?>