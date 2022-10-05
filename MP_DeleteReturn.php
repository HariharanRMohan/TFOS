<?php
$require = ('config.php');
$connect = mysqli_connect("localhost", "root", "", "tfas");
$id =$_REQUEST['id'];
$sql = "DELETE FROM tf_return_list WHERE TF_returnID =$id";
$result = mysqli_query($connect, $sql) or die (mysqli_error());

//show message when user added
echo "Delivery Deleted Successfully.";
header("Location: MP_ViewReturn.php");
?>