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
    $returnname = strtoupper($_POST['returnname']);
    $returncode = strtoupper($_POST['returncode']);
    $returnremark = strtoupper($_POST['returnremark']);

  // update data
  $query = "UPDATE tf_return_list 
          SET TF_returnName ='$returnname' , TF_returnCode = '$returncode', 
          TF_returnRemark = '$returnremark' 
          WHERE TF_returnID = $id";
  $result = mysqli_query($mysqli, $query);

  //show message when user added
  if($result)
  {
    echo "Update Return Successfully.";
  }
  else
  {
    echo "Update Return Not Successfully.";
  }
  echo '<script type="text/javascript"> location="MP_ViewReturn.php";</script>';
}
?>
<?php
//getting id from url
$id = $_REQUEST['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tf_return_list WHERE TF_returnID=$id");
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
    <h4>Edit Return Form</h4>

  <div class="containerform">
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="returnname">Return Name</label>
      <input type="text" class="form-control" name="returnname" class="txtField" value="<?php echo $row['TF_returnName'];?>">
    </div>
    <div class="form-group">
      <label for="returncode">Return Code</label>
      <input type="text" class="form-control" name="returncode" class="txtField" value="<?php echo $row['TF_returnCode'];?>">
    </div>
    <div class="form-group">
      <label for="returnremark">Delivery Remark</label>
      <input type="text" class="form-control" name="returnremark" class="txtField" value="<?php echo $row['TF_returnRemark'];?>">
    </div>
			<input type="submit" name="update" value="Update" onclick="updatereturnn();">
      <input type="button"  value="Cancel"  onClick="location.href='MP_ViewReturn.php'">
    <div class="message">
      <div class="pass" id="pass">Return Details Successfully Updated</div>
       <div class="fail" id="fail">Return Details Not Successfully Updated</div>
    </div>
	</form>
  <script>
  function updatereturnn(){
    const pass = document.getElementById('pass');
    const fail = document.getElementById('fail');
    let updatereturnn  = confirm("Are you sure to save this record?");
    if (updatereturnn) {
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