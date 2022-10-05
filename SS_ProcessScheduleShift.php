<?php
include ('config.php');

$shift = strtoupper($_POST["SS_scheduleWorkshift"]);
$cell = strtoupper($_POST["SS_scheduleWorkcell"]);
$date = date('Y-m-d', strtotime($_POST["SS_scheduleDate"]));

if(isset($_POST["SM_staffName"]))
{
    $name = '';
    foreach($_POST["SM_staffName"] as $row)
    {
        $name .= $row . ', ';
    }
    $name = substr($name, 0, -2);
    $sql = "INSERT INTO schedule (SS_scheduleWorkersName) VALUES '".$name."')";
    if (mysqli_query($mysqli, $sql))
    {
        echo 'Data Inserted';
    }
}


$sql = "INSERT INTO staff_schedule (SS_scheduleWorkshift, SS_scheduleWorkersName, SS_scheduleWorkcell, SS_scheduleDate) VALUES "." ('$shift', '$name', '$cell', '$date')" or
die ("Error inserting data into table");

if ($mysqli->query($sql) === TRUE) {
    echo "Workshift details inserted successfully.";
    echo '<script type="text/javascript"> location="SS_ViewScheduleShift.php";</script>';
} else {
    echo "Something went wrong! Workshift details cannot be added.";
}

//Close specified connection
$mysqli->close();
?>