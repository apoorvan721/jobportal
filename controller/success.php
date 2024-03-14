<?php
require '../razor_config.php';
include '../config.php';
$admin=new Admin();
if(!empty($_POST)){
    $order_id=$_SESSION['order_id'];
    $razorpay_order_id=$_POST['razorpay_order_id'];
    $razorpay_signature=$_POST['razorpay_signature'];
    $razorpay_payment_id=$_POST['razorpay_payment_id'];
    $sid=$_SESSION['sid'];
    $status="success";

    $generated_signature=hash_hmac('sha256',$order_id . "|" . $razorpay_payment_id,API_SECRET);
    if($generated_signature==$razorpay_signature){
        echo "Payment is successful";
        $stmt=$admin->cud("UPDATE `payment` SET `transaction_id`='$razorpay_payment_id', `payment_status`='$status' WHERE `seeker_id`='$sid'","UPDATE");
        
    }else{
        echo "Payment failed";
        $stmt=$admin->cud("UPDATE `payment` SET `payment_status`='failed' WHERE `seeker_id`='$sid'","UPDATE");
    }
}
?>