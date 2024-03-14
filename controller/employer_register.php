<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['eregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $registered_no = $_POST['registered_no'];
    $headquater = $_POST['headquater'];
    $year = $_POST['year'];
    $size = $_POST['size'];
    $status = "Pending";
    $path1 = "images/" . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $path1);

    $stmt = $admin->ret("SELECT * FROM `provider` WHERE `provider_email`='$email'");
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo "<script>alert('Email already exits');window.location='../employer_register.php';</script>";
    } else {
        $secpass = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $admin->cud("INSERT INTO `provider`(`provider_name`, `provider_email`, `provider_pass`, `provider_contact`, `provider_size`, `provider_regno`, `provider_headquater`, `provider_founded`,`provider_img`,`provider_status`) VALUES ('$name','$email','$secpass','$phone','$size','$registered_no','$headquater','$year','$path1','$status')", "save");
        echo "<script>alert('Registered Successfully');window.location='../employer_login.php';</script>";
    }

}

if (isset($_POST['e_edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $registered_no = $_POST['registered_no'];
    $headquater = $_POST['headquater'];
    $year = $_POST['year'];
    $size = $_POST['size'];
    $path1=$_POST['img_text'];
    $path2 = "images/" . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $path2);

    if($path2="images/"){
        $stmt = $admin->cud("INSERT INTO `provider`(`provider_name`, `provider_email`, `provider_contact`, `provider_size`, `provider_regno`, `provider_headquater`, `provider_founded`,`provider_img`,`provider_status`) VALUES ('$name','$email','$phone','$size','$registered_no','$headquater','$year','$path1')", "save");
    echo "<script>alert('Registered Successfully');window.location='../employer_login.php';</script>";

    }else{

    $stmt = $admin->cud("INSERT INTO `provider`(`provider_name`, `provider_email`, `provider_contact`, `provider_size`, `provider_regno`, `provider_headquater`, `provider_founded`,`provider_img`,`provider_status`) VALUES ('$name','$email','$phone','$size','$registered_no','$headquater','$year','$path2')", "save");
    echo "<script>alert('Registered Successfully');window.location='../employer_login.php';</script>";
}
}

?>