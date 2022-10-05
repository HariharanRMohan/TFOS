
<?php
//getting id from url
  $id = $_REQUEST['id'];
  $rejectname = $_REQUEST['rejectname'];
  $rejectcode = $_REQUEST['rejectcode'];
  $rejecttotalcarton = $_REQUEST['rejecttotalcarton'];
  $rejectremark = $_REQUEST['rejectremark'];

    // include dastabase connection file
  include_once("config.php");
  $connect = mysqli_connect("localhost", "root", "", "tfas");
  // update data
  $sql = "UPDATE tf_reject_list SET TF_rejectName ='$rejectname' , TF_rejectCode = '$rejectcode', 
  TF_rejecttotalCarton = '$rejecttotalcarton', TF_rejectRemark = '$rejectremark' WHERE TF_rejectID = $id";
  $result = mysqli_query($connect, $sql) or die (mysqli_error());

  //show message when user added
  if($result)
  {
    echo "Update Reject Successfully.";
    header("location:MP_ViewReject.php?id=$id");
  }
  else
  {
    echo "Update Reject Not Successfully.";
  }
?>