<?php
include 'header.php';
?>
<?php
// including the database connection file
require_once("config.php");

?>
<?php
if (isset($_POST['update'])) {
  $id = $_GET['id'];

  $deliveryname = strtoupper($_POST['deliveryname']);
  $deliverycode = strtoupper($_POST['deliverycode']);
  $deliverytotalcarton = strtoupper($_POST['deliverytotalcarton']);
  $deliverytotalproductioncarton = strtoupper($_POST['deliverytotalproductioncarton']);
  $deliverytotalproductioncard = strtoupper($_POST['deliverytotalproductioncard']);
  $deliveryremark = strtoupper($_POST['deliveryremark']);

  $query = "UPDATE tf_delivery_list
            SET TF_deliveryName ='$deliveryname' , TF_deliveryCode = '$deliverycode', 
            TF_deliverytotalCarton = '$deliverytotalcarton', TF_deliverytotalproductionCarton = '$deliverytotalproductioncarton', 
            TF_deliverytotalproductionCard = '$deliverytotalproductioncard', TF_deliveryRemark = '$deliveryremark' 
            WHERE TF_deliveryID = $id";
  $result = mysqli_query($mysqli, $query);

  if($result)
  {
    echo "Update Delivery Successfully.";
  }
  else
  {
    echo "Update Delivery Not Successfully.";
  }
  echo '<script type="text/javascript"> location="MP_ViewDelivery.php";</script>';
}
?>

<?php
//selecting data associated with this particular id
$id = $_REQUEST['id'];
$result = mysqli_query($mysqli, "SELECT * FROM tf_delivery_list WHERE TF_deliveryID=$id");
$row = mysqli_fetch_array($result);
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
    <h4>Edit Delivery Form Of The Delivery</h4>

  <div class="containerform">
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="deliveryname">Delivery Name</label>
      <input type="text" class="form-control" name="deliveryname" class="txtField" value="<?php echo $row['TF_deliveryName'];?>">
    </div>
    <div class="form-group">
      <label for="deliverycode">Delivery Code</label>
      <input type="text" class="form-control" name="deliverycode" class="txtField" value="<?php echo $row['TF_deliveryCode'];?>">
    </div>
    <div class="form-group">
      <label for="deliverytotalcarton">Total Carton (Plan)</label>
      <input type="text" class="form-control" name="deliverytotalcarton" class="txtField" value="<?php echo $row['TF_deliverytotalCarton'];?>">
    </div>
    <div class="form-group">
      <label for="deliverytotalproductioncarton">Total Production (Carton)</label>
      <input type="text" class="form-control" name="deliverytotalproductioncarton" class="txtField" value="<?php echo $row['TF_deliverytotalproductionCarton'];?>">
    </div>
    <div class="form-group">
      <label for="deliverytotalproductioncard">Total Production (Card)</label>
      <input type="text" class="form-control" name="deliverytotalproductioncard" class="txtField" value="<?php echo $row['TF_deliverytotalproductionCard'];?>">
    </div>
    <div class="form-group">
      <label for="deliveryremark">Delivery Remark</label>
      <input type="text" class="form-control" name="deliveryremark" class="txtField" value="<?php echo $row['TF_deliveryRemark'];?>">
    </div>
  
		<input type="submit" name="update" value="Update" onclick="updatedelivery();">
    <input type="button" value="Back" onclick="location.href='MP_ViewDelivery.php'">

    <div class="message">
      <div class="pass" id="pass">Delivery Updated Added</div>
      <div class="fail" id="fail">Delivery Not Successfully Updated</div>
      </div>
	</form>
  
  <script>
  function updatedelivery(){
    const pass = document.getElementById('pass');
    const pass = document.getElementById('fail');
    let updatedelivery  = confirm("Are you sure to save this record?");
    if (updatedelivery) {
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
</html>