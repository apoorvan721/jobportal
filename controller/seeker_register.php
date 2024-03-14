<?php
include '../config.php';
$admin = new Admin();

if (isset($_POST['sregister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $degree = $_POST['qualification'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $city = $_POST['city'];
    $allowedExtensions = array('pdf'); // Add other allowed extensions if needed
    $uploadedFileExtension = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));

    if (in_array($uploadedFileExtension, $allowedExtensions)) {
        // Proceed with file upload
        $path1 = "resumes/" . basename($_FILES['resume']['name']);
        move_uploaded_file($_FILES['resume']['tmp_name'], $path1);
        $secpass = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $admin->ret("SELECT * FROM `seeker` WHERE `seeker_email`='$email'");
        $count = $stmt->rowCount();
        if ($count > 0) {
            echo "<script>alert('Email already exits');window.location='../login.php';</script>";
        } else {

            $stmt = $admin->cud("INSERT INTO `seeker`(`seeker_name`, `seeker_email`, `seeker_password`, `seeker_phone`, `seeker_city`, `seeker_gender`, `seeker_degree`, `seeker_skills`, `seeker_resume`, `seeker_exp`) VALUES ('$name','$email','$secpass','$phone','$city','$gender','$degree','$skills','$path1','$experience')", "save");
            echo "<script>alert('Registered successfully');window.location='../login.php';</script>";

        }
    } else {
        echo "Invalid file format. Please upload a PDF file.";
    }

}
if (isset($_POST['sapply'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sid = $_SESSION['sid'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $degree = $_POST['qualification'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $city = $_POST['city'];

    $sid = $_SESSION['sid'];
    $status = "Application sent";
    $job_id = $_POST["job_id"];
    $path1 = $_POST["resume_text"];

    $path2 = "resumes/" . basename($_FILES['resume']['name']);
    move_uploaded_file($_FILES['resume']['tmp_name'], $path2);


    $stmt = $admin->ret("SELECT * FROM `application` WHERE `job_id`='$job_id' AND `seeker_id`='$sid'");
    if ($stmt->rowCount() > 0) {
        echo "<script>alert('You have already applied to this job');window.location='../myapplication.php';</script>";
    } else {
        if ($path2 == "resumes/") {

            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path1',`seeker_exp`='$experience' WHERE `seeker_id`='$sid'", "update");

            $stmt = $admin->cud("INSERT INTO `application`(`job_id`, `seeker_id`,`application_status`) VALUES ('$job_id','$sid','$status')", "save");

            echo "<script>alert('Application sent successfully');window.location='../myapplication.php';</script>";

        } else {

            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path2',`seeker_exp`='$experience' WHERE `seeker_id`='$sid'", "update");

            $stmt = $admin->cud("INSERT INTO `application`(`job_id`, `seeker_id`,`application_status`) VALUES ('$job_id','$sid','$status')", "save");

            echo "<script>alert('Application sent successfully');window.location='../myapplication.php';</script>";

        }

    }
}

if (isset($_POST['sedit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $degree = $_POST['qualification'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $city = $_POST['city'];
    $sid = $_SESSION['sid'];
    $path1 = $_POST['resume_text'];
    $img_path = $_POST['img_text'];
    // $allowedExtensions = array('pdf'); // Add other allowed extensions if needed

    // Proceed with file upload
    $path2 = "resumes/" . basename($_FILES['resume']['name']);
    move_uploaded_file($_FILES['resume']['tmp_name'], $path2);

    $img_path1 = "images/" . basename($_FILES['profile']['name']);
    move_uploaded_file($_FILES['profile']['tmp_name'], $img_path1);

    if ($path2 == "resumes/") {
        if ($img_path1 == "images/") {
            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path1',`seeker_exp`='$experience',`seeker_img`='$img_path' WHERE `seeker_id`='$sid'", "update");
            echo "<script>alert('Updated successfully');window.location='../job-listings.php';</script>";

        } else {
            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path1',`seeker_exp`='$experience',`seeker_img`='$img_path1' WHERE `seeker_id`='$sid'", "update");
            echo "<script>alert('Updated successfully');window.location='../job-listings.php';</script>";
        }

        echo "<script>alert('Updated successfully');window.location='../job-listings.php';</script>";
    } else {
        if ($img_path == "images/") {
            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path2',`seeker_exp`='$experience',`seeker_img`='$img_path1' WHERE `seeker_id`='$sid'", "update");
            echo "<script>alert('Updated successfully');window.location='../job-listings.php';</script>";

        } else {
            $stmt = $admin->cud("UPDATE `seeker` SET `seeker_name`='$name',`seeker_email`='$email',`seeker_phone`='$phone',`seeker_city`='$city',`seeker_gender`='$gender',`seeker_degree`='$degree',`seeker_skills`='$skills',`seeker_resume`='$path2',`seeker_exp`='$experience',`seeker_img`='$img_path' WHERE `seeker_id`='$sid'", "update");
        }
    }

}


?>