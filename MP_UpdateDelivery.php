
<?php
//getting id from url
  $id = $_REQUEST['id'];
  $deliveryname = $_REQUEST['deliveryname'];
  $deliverycode = $_REQUEST['deliverycode'];
  $deliverytotalcarton = $_REQUEST['deliverytotalcarton'];
  $deliverytotalproductioncarton = $_REQUEST['deliverytotalproductioncarton'];
  $deliverytotalproductioncard = $_REQUEST['deliverytotalproductioncard'];
  $deliveryremark = $_REQUEST['deliveryremark'];

    // include dastabase connection file
  include_once("config.php");
  $connect = mysqli_connect("localhost", "root", "", "tfas");
  // update data
  $sql = "UPDATE tf_delivery_list SET TF_deliveryName ='$deliveryname' , TF_deliveryCode = '$deliverycode', 
  TF_deliverytotalCarton = '$deliverytotalcarton', TF_deliverytotalproductionCarton = '$deliverytotalproductioncarton', 
  TF_deliverytotalproductionCard = '$deliverytotalproductioncard', TF_deliveryRemark = '$deliveryremark' WHERE TF_deliveryID = $id";
  $result = mysqli_query($connect, $sql) or die (mysqli_error());

  //show message when user added
  if($result)
  {
    echo "Update Delivery Successfully.";
    header("location:MP_ViewDelivery.php?id=$id");
  }
  else
  {
    echo "Update Delivery Not Successfully.";
  }
?>