<?php
ini_set('file_uploads','1');
include_once("connectDB.php");
$conn = new DB_conn;

$p_id = $_POST['id_p']; 
$p_name = $_POST['name']; 
$p_price = $_POST['price']; 
$p_category = $_POST['c_id']; //------File upload-----
$name = $_FILES['picture']['name']; #'test.jpg' 
$tmp_name = $_FILES['picture']['tmp_name'];

#-------------Finding file extension--------
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1); 
$fileextension= strtolower($fileextension); 
echo $fileextension;
if($fileextension == 'jpg' or $fileextension == 'png'){
    if (isset($name)) {
        $path = '../p_img/';
         if(!empty($name)){ 
            if(move_uploaded_file($tmp_name,$path.$name)){
            $path_img = $path.$name; 
            $sql = $conn->insert_product($p_id,$p_name,$p_price,$p_category,$path_img);
            if($sql){
                echo "<script>alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว')</script>"; 
                echo "<script>window.location='addproduct.php'</script>";
            }
            else { 
                echo "<script>alert('Error: " . $sql . ":-" . mysqli_error($conn) . "')</script>";
            }
            }
        }
    }
}
?>