<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['srefer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $degree = $_POST['qualification'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $city = $_POST['city'];
    $sid= $_SESSION['sid'];
    $pid= $_POST['pid'];
    $role=$_POST['role'];
    $allowedExtensions = array('pdf'); // Add other allowed extensions if needed
    $uploadedFileExtension = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));

    if (in_array($uploadedFileExtension, $allowedExtensions)) {
        // Proceed with file upload
        $path1 = "resumes/" . basename($_FILES['resume']['name']);
        move_uploaded_file($_FILES['resume']['tmp_name'], $path1);
        // $secpass = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $admin->ret("SELECT * FROM `refer` WHERE `refer_email`='$email'");
        $count = $stmt->rowCount();
        if ($count > 0) {
           echo "<script>alert('Already Reffered');window.location='../job-listings.php';</script>";
        } else {

            $stmt = $admin->cud("INSERT INTO `refer`(`refer_name`,`refer_role`,`provider_id`,`seeker_id`,`refer_email`, `refer_phone`, `refer_city`, `refer_gender`, `refer_qualification`, `refer_skills`, `refer_resume`, `refer_experience`) VALUES ('$name','$role','$pid','$sid','$email','$phone','$city','$gender','$degree','$skills','$path1','$experience')", "save");
          echo "<script>alert('Reffered successfully');window.location='../job-listings.php';</script>";

        }
    } else {
        echo "Invalid file format. Please upload a PDF file.";
    }

}