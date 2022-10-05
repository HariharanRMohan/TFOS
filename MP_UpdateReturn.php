
<?php
//getting id from url
  $id = $_REQUEST['id'];
  $returnname = $_REQUEST['returnname'];
  $returncode = $_REQUEST['returncode'];
  $returnremark = $_REQUEST['returnremark'];

    // include dastabase connection file
  include_once("config.php");
  $connect = mysqli_connect("localhost", "root", "", "tfas");
  // update data
  $sql = "UPDATE tf_return_list SET TF_returnName ='$returnname' , TF_returnCode = '$returncode', 
  TF_returnRemark = '$returnremark' WHERE TF_returnID = $id";
  $result = mysqli_query($connect, $sql) or die (mysqli_error());

  //show message when user added
  if($result)
  {
    echo "Update Return Successfully.";
    header("location:MP_ViewReturn.php?id=$id");
  }
  else
  {
    echo "Update Return Not Successfully.";
  }
?>