<?php

include '../config.php';

if (isset($_POST['update'])) {
  $prodID = $_GET['id'];

  $prodname = $_POST['pname'];
  $prodcode = $_POST['pcode'];
  $prodquantity = $_POST['pquan'];
  $prodtype = $_POST['ptype'];

  // echo "$prodID | $prodname | $prodcode | $prodquantity | $prodtype";

  $query = "UPDATE tf_product
            SET TF_prodName = '$prodname', TF_prodCode = '$prodcode', TF_prodQuantity = '$prodquantity', TF_prodType = '$prodtype'
            WHERE TF_prodID = '$prodID';";
  $result = mysqli_query($mysqli, $query);

  if ($result) {
    echo '<script type="text/javascript">alert("Product updated successfully!");location="../viewproduct.php";</script>';
  }else {
    echo '<script type="text/javascript">alert("Product cannot update. Something went wrong!");location="../viewproduct.php";</script>';
  }
}

?>
