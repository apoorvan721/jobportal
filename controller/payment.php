<?php
include '../config.php';
$admin=new Admin();
// session_start();

require '../razor_config.php';
require '../vendor/autoload.php';

use Razorpay\Api\Api;

if(isset($_POST['spayment'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $price=$_POST['price'];
    $sid=$_SESSION['sid'];
    $api=new Api(API_KEY,API_SECRET);

    $stmt=$admin->cud("INSERT INTO `payment`(`seeker_id`,`payment_amt`)VALUES('$sid','$price')","save");

    //call api 
    $res=$api->order->create(
        array(
            'receipt' => '111',
            'amount' => $price.'00',
            'currency' => 'INR',
        )
        );

        if(!empty($res['id'])){
            $_SESSION['order_id']=$res['id'];
        ?>
<form action="<?php echo BASE_URL?>controller/success.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo API_KEY?>"
    data-amount="<?php echo $price?>"
    data-currency="INR"
    data-order_id="<?php echo $res['id'];?>"
    data-buttontext="Pay <?php echo $price?> with Razorpay"
    data-name="<?php echo COMPANY_NAME;?>"
    data-name="<?php echo COMPANY_LOGO_URL;?>"
    data-prefill.name="<?php echo $name;?>"
    data-prefill.email="<?php echo $email;?>"
    data-theme.color="#F37254">
    </script>
    <input type="hidden" custom="Hidden Element" name="hidden"/>
        </form>
        <?php 
        }
    }
?>
