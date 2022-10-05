<?php
include 'header.php';
?>
  

<?php

include_once "config.php";

?>
</div>
<h4>List of Product</h4>
<div class="containerform">
    <table id="staffs">
      <thead>
        <tr>
          <th scope="col">Product Name</th>
          <th scope="col">Product Code</th>
          <th scope="col">Product Type</th>
          <th scope="col">Quantity</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>

      <?php
      $product_query = "SELECT * FROM tf_product";
      $product_result = mysqli_query($mysqli, $product_query);

      if(mysqli_num_rows($product_result) > 0){
        while($row = mysqli_fetch_array($product_result)){
          $prodID = $row["TF_prodID"];
          $prodname = $row["TF_prodName"];
          $prodcode = $row["TF_prodCode"];
          $prodquantity = $row["TF_prodQuantity"];
          $prodtype = $row["TF_prodType"];

          $i = 0;

          echo "
          <tbody>
            <tr>
              <td>$prodname</td>
              <td style='text-align: center'>$prodcode</td>
              <td>$prodtype</td>
              <td style='text-align: right'>$prodquantity</td>
              <td><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='PM_EditProduct.php?id=$prodID'><i class='fa fa-edit' style='font-size:20px;color:black'></a></i></td>
              <td><a onClick=\"javascript: return confirm('Are you sure to remove this record?');\" href='PM_DeleteProduct.php?id=$prodID'><i class='fa fa-trash' style='font-size:20px;color:black'></a></i></td>
            </tr>
          </tbody>";
          
        }
      }
      ?>
    </table>
    <div>
    <center><input type=button onClick="location.href='index.php'" value='Back'></center>
        </div>
  </div>
</div>
</body>
</html>
