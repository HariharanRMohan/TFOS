<?php

require_once "../config.php";

if (isset($_POST['addproduct'])) {
  $productname = $_POST['pname'];
  $productcode = $_POST['pcode'];
  $productquantity = $_POST['pquantity'];
  $producttype = $_POST['ptype'];

  if ($productname == '' || $productcode == '' || $productquantity == '' || $producttype == "") {
    echo '<script type="text/javascript">alert("Something went wrong! Product cannot be added.");location="../PM_AddProduct.php";</script>';
  }
  else {
    $query = "INSERT INTO tf_product(TF_prodName, TF_prodCode, TF_prodQuantity, TF_prodType) VALUES ('$productname', '$productcode', '$productquantity', '$producttype')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
      echo '<script type="text/javascript">alert("Product has been added.");location="../PM_ViewProduct.php";</script>';
    }else {
      echo '<script type="text/javascript">alert("Something went wrong! Product cannot be added.");location="../PM_ViewProduct.php";</script>';
    }
  }
}

?>
