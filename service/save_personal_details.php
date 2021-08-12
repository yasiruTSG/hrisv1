<?php
include('util/database.php');

$id = 510;
$status = 'onboarding';

// $updated_by = 'gishan';
// date_default_timezone_set('Asia/Kolkata');
// $created_at = date('d-m-Y H:i');

$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$haveChildren = isset($_POST['haveChildren']) ? $_POST['haveChildren'] : '';
$maritalStatus = isset($_POST['maritalStatus']) ? $_POST['maritalStatus'] : '';
$nameWithInitials = isset($_POST['nameWithInitials']) ? $_POST['nameWithInitials'] : '';
$religion = isset($_POST['religion']) ? $_POST['religion'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$birthCertificate = isset($_POST['birthCertificate']) ? $_POST['birthCertificate'] : '';

$resultset = null;

if ($status === 'onboarding') {
    $query = "SELECT * FROM `personal_data` WHERE `id`='$id'";
    $resultset = mysqli_query($con, $query);

    if (mysqli_num_rows($resultset) > 0) {
        // user id - exsists -> update
        $query1 = "UPDATE `personal_data` SET `full_name`='$fullName',`name_with_initials`='$nameWithInitials',`first_name`='$firstName',`surname`='$surname',`gender`='$gender',`dob`='$dob',`birth_certificate`='$birthCertificate',`religion`='$religion',`marital_status`='$maritalStatus' WHERE `id`='$id'";
        $result1 = mysqli_query($con, $query1);

        $response = ["success" => true, "message" => "update done"];
        echo json_encode($response);
        // echo $resultset1;
    } else {
        // user id - not exsists -> create
        $create_user = "insert into users(`id`, `user_name`, `password`, `name`, `level`) values ('$id', 'gishan@thirdspaceglobal.com', '1234', '$firstName', '1')";
        mysqli_query($con, $create_user);

        $query1 = "INSERT INTO `personal_data`(`id`, `full_name`,`name_with_initials`,`first_name`,`surname`,`gender`,`dob`,`birth_certificate`,`religion`,`marital_status`)  VALUES ('$id', '$fullName', '$nameWithInitials', '$firstName', '$surname', '$gender', '$dob', '$birthCertificate', '$religion', '$maritalStatus')";
        $result1 = mysqli_query($con, $query1);

        $response = ["success" => true, "message" => "create done"];
        echo json_encode($response);
    }
} else {
    $query2 = "SELECT * FROM `personal_data_clone` WHERE `id`='$id'";

    $resultset2 = mysqli_query($con, $query, MYSQLI_USE_RESULT);

    if ($resultset2 === FALSE) {
        echo "query3";
        $query3 = "INSERT INTO `personal_data_clone`(`id`, `full_name`,`name_with_initials`,`first_name`,`surname`,`gender`,`dob`,`birth_certificate`,`religion`,`marital_status`)  VALUES ('$id', '$fullName', '$nameWithInitials', '$firstName', '$surname', '$gender', '$dob', '$birthCertificate', '$religion', '$maritalStatus')";
        $resultset3 = mysqli_query($con, $query3, MYSQLI_USE_RESULT);
    } else {
        $query4 = "UPDATE `personal_data_clone`(`id`, `full_name`,`name_with_initials`,`first_name`,`surname`,`gender`,`dob`,`birth_certificate`,`religion`,`marital_status`)  VALUES ('$id', '$fullName', '$nameWithInitials', '$firstName', '$surname', '$gender', '$dob', '$birthCertificate', '$religion', '$maritalStatus')";
        $resultset4 = mysqli_query($con, $query4, MYSQLI_USE_RESULT);
    }

    // if ($resultset) {
    //     $response = ["success" => $resultset, "message" => "create done", "data" => $resultset2];
    //     echo json_encode($response);
    // } else {
    //     $response = ["success" => $resultset, "error" => mysqli_error($con)];
    //     echo json_encode($response);
    // }
}


// check whether user id available on personal_data



