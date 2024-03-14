<?php 
include '../config.php';
$admin=new Admin();
$pid=$_SESSION['pid'];
$stmt=$admin->ret("SELECT * FROM `provider` WHERE `provider_id`='$pid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['job'])){
$name=$_POST['jname'];
$location=$_POST['jlocation'];
$type=$_POST['jtype'];
$category=$_POST['jcategory'];
$salary=$_POST['jsalary'];
$exp=$_POST['jexp'];
$website=$_POST['jwebsite'];
$desc=$_POST['jdesc'];
$provider_id=$pid;
$ldate=$_POST['jlast_date'];
$path1=$row['provider_img'];

    $stmt=$admin->cud("INSERT INTO `jobs`(`jcategory_id`, `provider_id`, `job_role`, `job_desc`, `job_exp`, `job_location`,`job_salary`, `job_site`,`job_type`,`job_img`,`last_date`) VALUES ('$category','$provider_id','$name','$desc','$exp','$location','$salary','$website','$type','$path1','$ldate')","save");
    echo "<script>alert('Inserted Successfully');window.location='../employer_index.php';</script>";
}

if(isset($_POST['ujob'])){
    $name=$_POST['jname'];
    $location=$_POST['jlocation'];
    $type=$_POST['jtype'];
    $category=$_POST['jcategory'];
    $salary=$_POST['jsalary'];
    $exp=$_POST['jexp'];
    $website=$_POST['jwebsite'];
    $desc=$_POST['jdesc'];
    $provider_id=$pid;
    $ldate=$_POST['jlast_date'];
    $path1=$row['provider_img'];
    $id=$_POST['job_id'];
    
        $stmt=$admin->cud("UPDATE `jobs` SET `jcategory_id`='$category',`provider_id`='$pid',`job_role`='$name',`job_desc`='$desc',`job_exp`='$exp',`job_location`='$location',`job_type`='$type',`job_salary`='$salary',`job_site`='$website',`last_date`='ldate' WHERE `job_id`='$id'","update");
        echo "<script>alert('Updated Successfully');window.location='../myjobs.php';</script>";
    }


?>