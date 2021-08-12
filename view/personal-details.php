<?php
include('components/header.php'); //header import
include('components/sidebar.php'); //sidebar import
?>

<?php
// $status = 'audit pending';

// before candidate submit - onboarding
// after candidate submit - audit pending
// after candidate submit - audit complete

$full_name = null;
$full_name_status = null;
$full_name_reject_reason = null;
$full_name_m_o = null;
$name_with_initials = null;
$name_with_initials_status = null;
$name_with_initials_reject_reason = null;
$name_with_initials_m_o = null;
$first_name = null;
$first_name_status = null;
$first_name_reject_reason = null;
$first_name_m_o = null;
$surname = null;
$surname_status = null;
$surname_reject_reason = null;
$surname_m_o = null;
$gender = null;
$gender_status = null;
$gender_reject_reason = null;
$gender_m_o = null;
$dob = null;
$dob_status = null;
$dob_reject_reason = null;
$dob_m_o = null;
$birth_certificate = null;
$birth_certificate_status = null;
$birth_certificate_reject_reason = null;
$birth_certificate_m_o = null;
$religion = null;
$religion_status = null;
$religion_reject_reason = null;
$religion_m_o = null;
$marital_status = null;
$marital_status_status = null;
$marital_status_reject_reason = null;
$marital_status_m_o = null;

$prev_full_name = null;
$prev_name_with_initials = null;
$prev_first_name = null;
$prev_surname = null;
$prev_gender = null;
$prev_dob = null;
$prev_birth_certificate = null;
$prev_religion = null;
$prev_marital_status = null;

$disabled = '';
// 1. when a candidate comes for the first time
// 2. when a recruited employee comes any time
// 3. when a auditor comes for auditing

// if ($audit) {
//     // 3. when a auditor comes for auditing
//     $query = "SELECT * FROM personal_data WHERE id='" . $id . "'";
//     $result = mysqli_query($con, $query) or die(mysqli_error($con));
//     while ($row = mysqli_fetch_array($result)) {
//         echo var_dump($row);

//         $full_name = $row['full_name'];
//         $name_with_initials = $row['name_with_initials'];
//         $first_name = $row['first_name'];
//         $surname = $row['surname'];
//         $gender = $row['gender'];
//         $dob = $row['dob'];
//         $birth_certificate = $row['birth_certificate'];
//         $religion = $row['religion'];
//         $marital_status = $row['marital_status'];
//         // $flag = TRUE;
//     }
// } else {
$query = "SELECT * FROM personal_data WHERE id='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

// 1. when a candidate comes for the first time => $result == false
// 2. 
//   i. when a recruited employee comes any time => $result == true
//   ii. have to show the status for each field as auditor might have audited the field
while ($row = mysqli_fetch_array($result)) {
    $full_name = $row['full_name'];
    $name_with_initials = $row['name_with_initials'];
    $first_name = $row['first_name'];
    $surname = $row['surname'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $birth_certificate = $row['birth_certificate'];
    $religion = $row['religion'];
    $marital_status = $row['marital_status'];
}

if ($result) {
    $query1 = "SELECT * FROM personal_data_clone WHERE id='" . $id . "'";
    $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
}

if ($status === 'audit pending') {
    $disabled = 'disabled';
}
// }
?>

<link rel="stylesheet" href="../styles/styles.css">

<section class="page-content container p-5 mt-4" id="content">
    <div class="page-body">
        <form class="row g-3" id="testForm" method="post">
            <div class="row mb-1">
                <div class="form-group col-12 col-md-12">
                    <label class="hris-label my-3" for="full-name">Full Name</label>
                    <?php echo textInput($audit, "Full Name", "fullName", "full-name", $full_name, null, $disabled, null, null) ?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="name-with-initial">Name with initials</label>
                    <?php echo textInput($audit, "Name with initials", "nameWithInitials", "name-with-initials", $name_with_initials, null, $disabled, null, null) ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="first-name">First Name</label>
                    <?php echo textInput($audit, "First Name", "firstName", "first-name", $first_name, null, $disabled, null, null) ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="surname">Surname</label>
                    <?php echo textInput($audit, "Surname", "surname", "surname", $surname, null, $disabled, null, null) ?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="gender">Gender</label>
                    <?php
                    $options = [
                        ['name' => 'Male', 'value' => 'male'],
                        ['name' => 'Female', 'value' => 'femal'],
                    ];
                    echo select($audit, "gender", 'gender', 'gender', $options, $gender, $prev_gender, $disabled);
                    ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="dob">DOB</label>
                    <?php echo dateInput($audit, "DOB", "dob", "dob", $dob, $prev_dob, $disabled) ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="surname">Birth Certificate</label>
                    <?php echo fileInput($audit, "Birth Certificate", "birthCerificate", "birth-certificate") ?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="religion">Religion</label>
                    <?php
                    $options = [
                        ['value' => 'buddhism', 'name' => 'Buddhism'],
                        ['value' => 'christianity', 'name' => 'Christianity'],
                        ['value' => 'hindu', 'name' => 'Hindu'],
                        ['value' => 'islam', 'name' => 'Islam']
                    ];
                    echo select($audit, "Religion", 'religion', 'religion', $options, $religion, $prev_religion, $disabled);
                    ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="religion">Marital Status</label>
                    <?php
                    $options = [
                        ['value' => 'single', 'name' => 'Single'],
                        ['value' => 'married', 'name' => 'married'],
                    ];
                    echo select($audit, "Marital Status", 'maritalStatus', 'marital-status', $options, $marital_status,  $prev_marital_status, $disabled);
                    ?>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label class="hris-label my-3" for="dob">Do you have children?</label>
                    <?php
                    $options = [
                        ['value' => 'yes', 'name' => 'Yes'],
                        ['value' => 'no', 'name' => 'No'],
                    ];
                    echo select($audit, "Have Children", 'haveChildren', 'have-children', $options, "no", "no", $disabled);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-outline-primary mt-3">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include('components/default-imports.php'); //import common js
?>
<!--Page js-->
<script src="../js/personal-details.js"></script>
</body>

</html>