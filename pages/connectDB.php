<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'minishop');

// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=minishop", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
 
class DB_conn
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $this->conn = $conn;

        if ($conn === false) {
            die("ERROR : Could not connect. " . mysqli_connect_error());;
        } 
        
    }

    function insert_user($user, $pass, $first, $last, $tele)
    {
        // ------------- ส่วนเดิม --------------------
        // $sql = "insert into user(username	,password	,first_name	,last_name	,telephone)
        //     values('$user', '$pass', '$first', '$last', '$tele')";
        // return ($sql);
        // ------------------------------------------
        // $user = $_POST['username'];
        // if (isset($_POST['signup'])){
        //     $user= $_POST['username'];
        //     $pass = $_POST['password'];
        //     $fname = $_POST['first_name'];
        //     $lname = $_POST['last_name'];
        //     $phone = $_POST['telephone'];
        //     $role = 'normal_user';
        // }

        // $check_username = "SELECT * FROM user WHERE username = $user";
        $username = $_POST['username'];
        $stmt = mysqli_prepare($this -> conn, "SELECT * FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            // echo "Data is duplicated!";
            echo "<script>alert('user ซ้ำกัน')</script>";
            echo "<script>window.location.href='signup.php' </script>";
        }else{
            $sql = "insert into user(username	,password	,first_name	,last_name	,telephone)
            values('$user', '$pass', '$first', '$last', '$tele')";
            
        }
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
    public function insert_product($p_name,$p_details,$p_price,$p_category,$path_img){
        $strSQL = "INSERT INTO product (pName, pDetails, pPrice,id, pImage)
        values ('$p_name', '$p_details',$p_price,$p_category,'$path_img')";
        $str = mysqli_query($this->conn,$strSQL);
        return $str;
    }
    

    
    

}

?>