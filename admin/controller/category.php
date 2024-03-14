<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['cinsert'])){
    $name=$_POST['cname'];

    $stmt=$admin->cud("INSERT INTO `category`(`category_name`) VALUES ('$name')","save");
    echo "<script>alert('Inserted Successfully');window.location='../category.php';</script>";
}
else if(isset($_POST['cupdate'])){
    $name=$_POST['cname'];
    $id=$_POST['cid'];
    
    $stmt=$admin->cud("UPDATE `category` SET `category_name`='$name' WHERE `category_id`='$id'","update");
    echo "<script>alert('Update Successfully');window.location='../category.php';</script>";
}
else if(isset($_GET['did'])){
    $id=$_GET['did'];
    
    $stmt=$admin->cud("DELETE FROM `category` WHERE `category_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../category.php';</script>";
}
?>