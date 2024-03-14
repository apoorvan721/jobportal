<?php
include '../../config.php';
$admin=new Admin();
$eid=$_GET['em_id'];
$stmt=$admin->ret("SELECT * FROM `provider` where `provider_id`='$eid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);    
if(isset($_GET['em_id']) && isset($_GET['em_status']) ){
    if($row['provider_status']=="Pending"){
        $status="Approved";
    }
    else{
        $status="Pending";
    }
$stmt=$admin->cud("UPDATE `provider` SET `provider_status`='$status' WHERE `provider_id`='$eid'","update");
echo "<script>window.location='../company.php'</script>";
}

if(isset($_GET['d_id'])){
    $id=$_GET['d_id'];
    
    $stmt=$admin->cud("DELETE FROM `provider` WHERE `provider_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../company.php';</script>";
}
?>