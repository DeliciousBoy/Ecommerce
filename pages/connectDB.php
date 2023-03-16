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
            die("ERROR : Could not connect. " . mysqli_connect_error());
        } 
    }

    function insert_user($user, $pass, $first, $last, $tele)
    {
        $sql = "insert into user(username	,password	,first_name	,last_name	,telephone)
            values('$user', '$pass', '$first', '$last', '$tele')";
        return ($sql);
    }
    public function display_user()
    {
        $str = mysqli_query($this->conn, "SELECT * from user");
        return $str;
    }
    public function display_user_edit($id)
    {
        $str = mysqli_query($this->conn, "SELECT * from user where id = $id");
        return $str;
    }
    public function edit_user($fname, $lastname,$uname, $telephone, $id)
    {
        $str = mysqli_query($this->conn, "UPDATE user SET first_name = '$fname', last_name ='$lastname',username = '$uname',telephone = '$telephone' WHERE id = $id ");
        return $str;
    }
    public function del_user($id)
    {
        $str = mysqli_query($this->conn, "DELETE FROM user WHERE id = $id ");
        return $str;
    }
    // ---------------------products --------------------
    public function select_category(){
        $strSQL = "SELECT * FROM category ORDER BY c_name ASC";
        $str = mysqli_query($this->conn, $strSQL);
        return $str;
    }
    public function insert_product( $p_name,$p_details ,$p_price, $path_img,$p_category)
    {
    $strSQL = "INSERT INTO product( pName, pDetails,pPrice , pImage,c_id)
               VALUES ('$p_name', '$p_details',$p_price, '$path_img',$p_category)";
    // $sql = mysqli_query($this->conn, $strSQL);
    $str = mysqli_query($this->conn, $strSQL);
    return $str;
    }
}
?>