<?php 
include '../config.php';
$admin=new Admin();
$jid=$_GET['jid'];
$stmt=$admin->cud("DELETE FROM `jobs` WHERE `job_id`='$jid'","delete");
echo "<script>alert('Deleted Successfully');window.location='../myjobs.php';</script>";
?>
