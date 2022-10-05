<?php
include 'header.php';
?>
<?php

require_once "config.php";

if (isset($_POST['addproduct'])) {
  $productname = strtoupper($_POST['pname']);
  $productcode = strtoupper($_POST['pcode']);
  $productquantity = strtoupper($_POST['pquantity']);
  $producttype = strtoupper($_POST['ptype']);

    $query = "INSERT INTO tf_product(TF_prodName, TF_prodCode, TF_prodQuantity, TF_prodType) VALUES ('$productname', '$productcode', '$productquantity', '$producttype')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
      echo "Product has been added.";
    }else {
      echo "Something went wrong! Product cannot be added.";
    }
    echo '<script type="text/javascript"> location="PM_ViewProduct.php";</script>';
  }

?>

</div>
   <h4>Manage Product</h4>
    <div class="containerform">
      <form action="" name="form" method="POST">
        <label for="pname">Product Name</label>
        <input type="text" id="pname" name="pname" placeholder="Enter product name" required="">

        <label for="pcode">Product Code</label>
        <input type="text" id="pcode" name="pcode" placeholder="Enter product code" required="">

        <label for="pquantity">Product Quantity</label>
        <input type="text" id="pquantity" name="pquantity" placeholder="Enter product quantity" required="">

        <label for="ptype">Product Type</label>
        <input type="text" id="ptype" name="ptype" placeholder="Enter product type" required="">

        <input type="submit" name="addproduct" value="Save" onclick="submitproduct();">
        <input type="reset" value="Clear Form">
        <input type="button" value="Back" onclick="history.back()">

        <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Product Successfully Added</div>
          <div class="fail" id="fail">Something went wrong! Product cannot be added.</div>
        </div>
      </form>
    </div>
  </div>

  <style>
    .message{
      width:100%
      position:relative;
      display: flex;
      justify-content: center;
    }

    .message .fail{
      font-size: 150%;
      color: green;
      position:absolute;
      font-weight: 900;
      transition: .3s;
      display: none;
    }

    .message .pass{
      font-size: 150%;
      color: green;
      position:absolute;
      font-weight: 900;
      transition: .3s;
      display: none;
    }

    .message .fill{
      font-size: 150%;
      color: green;
      position:absolute;
      animation: buttons .3s linear;
      font-weight: 900;
      transition: .3s;
      display: none;
    }

    @keyframes buttons{
      0%{
        transform: scale(0.1);
      }
      50%{
        transform: scale(0.5);
      }
      100%{
        transform: scale(1);
      }
    }
    </style>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
  <script>
  function submitproduct(){
    var code    = document.getElementById("pcode").value;
    var quantity    = document.getElementById("pquantity").value;
    var name    = document.getElementById("pname").value;
    var type    = document.getElementById("ptype").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');

    if (isNaN(quantity)) {
      alert("Quantity is Only allowed Numeric!");
      document.form.pquantity.value ="";
      return;
    } 
    else if (code === "" || quantity === "" || name === "" || type === "") {
      fill.style.display = 'block';
      return;
    }else {
      let submitproduct  = confirm("Are you sure to save this record?");
    if (submitproduct) {
      pass.style.display = 'block';
    } else {
      fail.style.display = 'block';
    }
    }
  }
  setTimeout(() => {
      fill.style.display = 'none';
      pass.style.display = 'none';
      fail.style.display = 'none';
    }, 4000);

</script>
</body>
</html>
