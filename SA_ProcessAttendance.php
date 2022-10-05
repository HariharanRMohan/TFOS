<?php
include ('config.php');

$name = strtoupper($_POST["SM_staffName"]);
$shift = strtoupper($_POST["SA_staffWorkshift"]);
$remark = strtoupper($_POST["SA_remark"]);


$sql = "INSERT INTO staff_attendance ( SA_staffName, SA_staffWorkshift, SA_remark) VALUES "." ('$name', '$shift', '$remark')" or
die ("Error inserting data into table");

if ($mysqli->query($sql) === TRUE) {
    echo "Attendance details inserted successfully.";
    echo '<script type="text/javascript"> location="SA_ViewAttendance.php";</script>';
} else {
    echo "Something went wrong! Attendance details cannot be added.";
    echo '<script type="text/javascript"> location="SA_ViewAttendance.php";</script>';
}

//Close specified connection
$mysqli->close();
?>
