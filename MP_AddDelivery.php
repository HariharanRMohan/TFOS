<?php
include 'header.php';
?>
<?php
    // including the database connection file
    require_once("config.php");

     // check if form submitted, insert form data into users table.
  if(isset($_POST['submit'])) {
    $deliveryname = strtoupper($_POST['deliveryname']);
    $deliverycode = strtoupper($_POST['deliverycode']);
    $deliverytotalcarton = strtoupper($_POST['deliverytotalcarton']);
    $deliverytotalproductioncarton = strtoupper($_POST['deliverytotalproductioncarton']);
    $deliverytotalproductioncard = strtoupper($_POST['deliverytotalproductioncard']);
    $deliveryremark = strtoupper($_POST['deliveryremark']);


      // include dastabase connection file
    include_once("config.php");
    
    // insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO tf_delivery_list (TF_deliveryName, TF_deliveryCode, TF_deliverytotalCarton, TF_deliverytotalproductionCarton, TF_deliverytotalproductionCard , TF_deliveryRemark ) VALUES('$deliveryname','$deliverycode', '$deliverytotalcarton', '$deliverytotalproductioncarton','$deliverytotalproductioncard','$deliveryremark')");
    
    //show message when user added
    if($result)
    {
      echo "Insert Delivery Successfully.";
    }
    else
    {
      echo "Insert Delivery Not Added Successfully.";
    }
    echo '<script type="text/javascript"> location="MP_ViewDelivery.php";</script>';
  }  
?>
</div>

  
    <h4>Add Delivery Form</h4>
  
<div class="containerform">
  <form action="" name="form" method="post">
    <div class="form-group">
      <label for="deliveryname">Delivery Name</label>
      <input type="text" class="form-control" id="deliveryname" placeholder="Enter delivery name" name="deliveryname" required="">
    </div>
    <div class="form-group">
      <label for="deliverycode">Delivery Code</label>
      <input type="text"  class="form-control" id="deliverycode" placeholder="Enter delivery code" name="deliverycode" required="">
    </div>
    <div class="form-group">
      <label for="deliverytotalcarton">Total Carton (Plan)</label>
      <input type="text" class="form-control" id="deliverytotalcarton" placeholder="Enter total carton (plan)" name="deliverytotalcarton" required="">
    </div>
    <div class="form-group">
      <label for="deliverytotalproductioncarton">Total Production (Carton)</label>
      <input type="text" class="form-control" id="deliverytotalproductioncarton" placeholder="Enter total production (carton)" name="deliverytotalproductioncarton" required="">
    </div>
    <div class="form-group">
      <label for="deliverytotalproductioncard">Total Production (Card)</label>
      <input type="text" class="form-control" id="deliverytotalproductioncard" placeholder="Enter total production (card)" name="deliverytotalproductioncard" required="">
    </div>
    <div class="form-group">
      <label for="deliveryremark">Delivery Remark</label>
      <input type="text" class="form-control" id="deliveryremark" placeholder="Enter delivery remark" name="deliveryremark" required="">
    </div>

    <input type="submit" name="submit" value="Save" onclick="fn_Submit();"/>
    <input type="reset" name="reset" value="Clear Form">
    <input type="button" name="button" value="View Delivery" onclick = "location.href='MP_ViewDelivery.php'">
    <input type="button" value="Back" onclick="location.href='index.php'">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Delivery Record Successfully Added</div>
          <div class="fail" id="fail">Something went wrong! Delivery Record cannot be added.</div>
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
  function fn_Submit(){
    var name   = document.getElementById("deliveryname").value;
    var remark    = document.getElementById("deliveryremark").value;
    var code    = document.getElementById("deliverycode").value;
    var plan    = document.getElementById("deliverytotalcarton").value;
    var carton  = document.getElementById("deliverytotalproductioncarton").value;
    var card    = document.getElementById("deliverytotalproductioncard").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');

    if (isNaN(code)) {
      alert("Delivery Code is Only allowed Numeric!");
      document.form.deliverycode.value ="";
      return;
    }
    else if (isNaN(plan)) {
      alert("Total Carton (Plan) is Only allowed Numeric!");
      document.form.deliverytotalcarton.value ="";
      return;
    }
    else if (isNaN(carton)) {
      alert("Total Production (Carton) is Only allowed Numeric!");
      document.form.deliverytotalproductioncarton.value ="";
      return;
    }
    else if (code === "" || plan === "" || carton === "" || card === "" || name === "" || remark === "") {
      fill.style.display = 'block';
      return;
    }
    else if (isNaN(card)) {
      alert("Total Production (Card) is Only allowed Numeric!");
      document.form.deliverytotalproductioncard.value ="";
      return;
    } else {
      let fn_Submit  = confirm("Are you sure to save this record?");
    if (fn_Submit) {
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