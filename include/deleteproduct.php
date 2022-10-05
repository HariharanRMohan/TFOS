<?php

include '../config.php';

$prodID = $_GET['id'];

if ($prodID) {
  $query = "DELETE FROM tf_product WHERE TF_prodID = $prodID";
  $result = mysqli_query($mysqli, $query);

  echo '<script type="text/javascript">alert("Successfully delete!");location="../viewproduct.php";</script>';
}else {
  echo '<script type="text/javascript">alert("Oopss! Something went wrong.");location="../viewproduct.php";</script>';
}

?>
