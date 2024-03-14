<?php
include '../config.php';
$admin = new Admin();

if (isset($_GET['app_status']) && ($_GET['app_id'])) {
    $id = $_GET['app_id'];
        $status = "Rejected";
        $stmt = $admin->cud("UPDATE `application` SET `application_status`='$status' WHERE `application_id`='$id'", 
        "update");
        // $stmt = $admin->cud("DELETE FROM `application` WHERE `application_id`='$id'", "delete");
        echo "<script>alert('Application Rejected successfully');window.location='../view_application.php';</script>";

}