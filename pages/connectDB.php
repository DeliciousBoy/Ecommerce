<?php
session_start();
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
        } 
        
    }

    function insert_user($user, $pass, $first, $last, $tele)
    {   
        $stmt = mysqli_prepare($this -> conn, "SELECT * FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            $_SESSION['warning'] = "มีชื่อ user นี้ในระบบแล้ว";
            header('Location: signup.php');
        }else if(!filter_var($tele,FILTER_VALIDATE_INT)){
            $_SESSION['warning'] = 'เบอร์โทรต้องเป็นตัวเลขเท่านั้น';
            header('Location: signup.php');
        }
        // else if(strlen($_POST['pass']) > 4 || strlen($_POST['pass']) < 20){
        //     $_SESSION['warning'] = 'รหัสผ่านต้องมีความยาวตั้งแต่ 4-20 ตัวอักษร';
        //     header('Location: signup.php');
        // }
        else{
            $sql = "insert into user(username	,password	,first_name	,last_name	,telephone)
                values('$user', '$pass', '$first', '$last', '$tele')";
            $_SESSION['sucess'] = "สมัครสมาชิกเรียบร้อย <a href='login.php' class='alert-link'> คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
            header("location: signup.php");
        }    
        return ($sql);
    }

    function user_login($user,$pass){
        
        if(isset($_POST['login'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
    
            if(empty($user)){
                $_SESSION['warning'] = 'กรุณากรอกอีเมล';
                header('Location: login.php');
            }else if(empty($pass)){
                $_SESSION['warning'] = 'กรุณากรอกรหัสผ่าน';
                header('Location: login.php');
            }else{ 
                
                try{
                    $stmt = mysqli_prepare($this -> conn,"SELECT * FROM user WHERE username = ?");
                    mysqli_stmt_bind_param($stmt, "s", $user);
                    mysqli_stmt_execute($stmt);
                    // $row = mysqli_fetch_row($checkData);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result)>0){
                        $user_data = mysqli_fetch_assoc($result);
                        if($user_data['password'] == $pass){
                            
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("location: index.php");
                        }else{
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location : login.php");
                        }
                        
                    }else{
                        $_SESSION['error'] = 'ไม่มี user นี้ในระบบ';
                        header("location : login.php");
                    }
                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
        }
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
    public function select_product(){
        $strSQL = "SELECT * FROM product ORDER BY pPrice ASC";
        $str = mysqli_query($this->conn, $strSQL);
        return $str;
    }
}
?>