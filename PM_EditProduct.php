<?php
include 'header.php';
?>
<?php
require_once('config.php');

if (isset($_POST['update'])) {
  $prodID = $_GET['id'];

  $prodname = strtoupper($_POST['pname']);
  $prodcode = strtoupper($_POST['pcode']);
  $prodquantity = strtoupper($_POST['pquan']);
  $prodtype = strtoupper($_POST['ptype']);

  // echo "$prodID | $prodname | $prodcode | $prodquantity | $prodtype";

  $query = "UPDATE tf_product
            SET TF_prodName = '$prodname', TF_prodCode = '$prodcode', TF_prodQuantity = '$prodquantity', TF_prodType = '$prodtype'
            WHERE TF_prodID = '$prodID';";
  $result = mysqli_query($mysqli, $query);

  if ($result) {
    echo "Product updated successfully.";
  }else {
    echo "Something went wrong! Product cannot be updated.";
  }
  echo '<script type="text/javascript"> location="PM_ViewProduct.php";</script>';
}

?>
<style>
   .message{
      width:100%
      position:relative;
      display: flex;
      justify-content: center;
    }

    .message .pass{
      font-size: 150%;
      color: green;
      position:absolute;
      animation: buttons .3s linear;
      font-weight: 900;
      transition: .3s;
      display: none;
    }

    .message .fail{
      font-size: 150%;
      color: green;
      position:absolute;
      animation: buttons .3s linear;
      font-weight: 900;
      transition: .3s;
      display: none;
    }
  </style>


</div>
    <h4>Update Product</h4>

    <?php

    require_once('config.php');

    $prodID = $_GET["id"];

    $product_query = "SELECT * FROM tf_product WHERE TF_prodID = $prodID";
    $product_result = mysqli_query($mysqli, $product_query);

    if(mysqli_num_rows($product_result) > 0){
      while($row = mysqli_fetch_array($product_result)){
        $prodname = $row["TF_prodName"];
        $prodcode = $row["TF_prodCode"];
        $prodquantity = $row["TF_prodQuantity"];
        $prodtype = $row["TF_prodType"];
      }
    }

    echo '<div class="containerform">
            <form action="" method="POST">
              <label>Product Name:</label>
              <input type="text" id="pname" name="pname" value='.$prodname.' required="">

              <label>Product Code:</label>
              <input type="text" id="pcode" name="pcode" value='.$prodcode.' required="">

              <label>Product Quantity:</label><br>
              <input type="number" id="pquan" name="pquan" value='.$prodquantity.' required=""><br><br>

              <label>Product Type:</label>
              <input type="text" id="ptype" name="ptype" value='.$prodtype.' required="">

              <input type="submit" name="update" value="Update" onclick="updateproduct();">
              <input type="button" value="Back" onclick="history.back()">

              <div class="message">
              <div class="pass" id="pass">Product Successfuly Updated</div>
              <div class="fail" id="fail">Product Not Successfully Updated </div>
            </div>
            </form>
          </div>';

    ?>
  </div>
  <script>
  function updateproduct(){
    const pass = document.getElementById('pass');
    let updateproduct  = confirm("Are you sure to save this record?");
    if (updateproduct) {
      pass.style.display = 'block';
    } else {
      fail.style.display = 'block';
    }
    }
    setTimeout(() => {
      fill.style.display = 'none';
      pass.style.display = 'none';
      fail.style.display = 'none';
    }, 4000);
  </script>
</body>
