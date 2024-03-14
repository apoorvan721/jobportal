<?php
include '../../config.php';
$admin=new Admin();

if(isset($_GET['j_did'])){
    $id=$_GET['j_did'];
    
    $stmt=$admin->cud("DELETE FROM `provider` WHERE `job_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../jobs.php';</script>";
}
?>