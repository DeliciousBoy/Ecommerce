<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'minishop');

class DB_conn
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->conn = $conn;

        if ($conn === false) {
            die("ERROR : Could not connect. " . mysqli_connect_error());;
        } else {
            echo "Connect Success!";
        }
    }

    function insert_user(/*$fname, $lname, $mname, $email, $username, $password, $type*/ $id, $user, $pass, $first, $last, $tele)
    {
        $sql = "insert into user(	id	,username	,password	,first_name	,last_name	,telephone)
            values('$id', '$user', '$pass', '$first', '$last', '$tele')";
        return ($sql);
    }
}

?>