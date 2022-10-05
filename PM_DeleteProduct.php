<?php

include 'config.php';

$prodID = $_GET['id'];

if ($prodID) {
  $query = "DELETE FROM tf_product WHERE TF_prodID = $prodID";
  $result = mysqli_query($mysqli, $query);

  echo "Product Deleted Successfully";
  header("Location: PM_ViewProduct.php");
}else {
  echo "Oopss! Something went wrong.";
}

?>
