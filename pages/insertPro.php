<!---6430250318 rawee sinbumrung--->
<?php
ini_set('file_uploads','1');
include_once("connectDB.php");
$conn = new DB_conn;
// $con = $conndb->conn;

$p_name = $_POST['name']; 
$p_details = $_POST['details']; 
$p_price = $_POST['price']; 
$p_category = $_POST['category']; //------File upload-----
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
            $sql = $conn->insert_product($p_name,$p_details,$p_price,$path_img,$p_category);
            if($sql){
                echo "<script>alert('Your product has been saved!')</script>"; 
                echo "<script>window.location='add_product.php'</script>";
            }
            else { 
                echo "<script>alert( Error: " . $sql . ":-" . mysqli_error($conn).")</script>";
                }
            }
        }
    }
}
?>