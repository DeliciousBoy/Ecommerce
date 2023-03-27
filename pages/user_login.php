<?php
    
    include("connectDB.php");
    $conndb = new DB_conn; 
    $con = $conndb->conn; 

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
             
            $stmt = mysqli_prepare($con,"SELECT * FROM user WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result)>0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] == $pass){
                    if($user_data['role']=='admin'){
                        $_SESSION['admin_login'] = $user_data['username'];
                        header("location: admin.php");
                    }else{
                        $_SESSION['user_login'] = $user_data['username'];
                        header("location: index.php");
                    }
                }else{
                    $_SESSION['warning'] = 'รหัสผ่านผิด';
                    header("location: login.php");
                }
                
            }else{
                $_SESSION['warning'] = 'ไม่มี user นี้ในระบบ';
                header("location: login.php");
            }
            
        }
    }
    
?>