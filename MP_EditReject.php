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
  $rejectname = strtoupper($_POST['rejectname']);
  $rejectcode =strtoupper( $_POST['rejectcode']);
  $rejecttotalcarton =strtoupper( $_POST['rejecttotalcarton']);
  $rejectremark = strtoupper($_POST['rejectremark']);

  // echo "$prodID | $prodname | $prodcode | $prodquantity | $prodtype";

  $query = "UPDATE tf_reject_list 
          SET TF_rejectName ='$rejectname' , TF_rejectCode = '$rejectcode', 
          TF_rejecttotalCarton = '$rejecttotalcarton', TF_rejectRemark = '$rejectremark' 
           WHERE TF_rejectID = $id";
  $result = mysqli_query($mysqli, $query);

  if ($result) {
    echo "Reject details has been updated.";
  }else {
    echo "Something went wrong! Reject details cannot be updated.";
  }
  echo '<script type="text/javascript"> location="MP_ViewReject.php";</script>';
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

<?php
//getting id from url
$id = $_REQUEST['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tf_reject_list WHERE TF_rejectID=$id");
$row = mysqli_fetch_array($result);
?>
</div>
    <h4>Edit Reject Form</h4>

  <div class="containerform">
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="rejectname">Reject Name</label>
      <input type="text" class="form-control" name="rejectname" class="txtField" value="<?php echo $row['TF_rejectName'];?>">
    </div>
    <div class="form-group">
      <label for="rejectcode">Reject Code</label>
      <input type="text" class="form-control" name="rejectcode" class="txtField" value="<?php echo $row['TF_rejectCode'];?>">
    </div>
    <div class="form-group">
      <label for="rejecttotalcarton">Rejected Carton (Quantity)</label>
      <input type="text" class="form-control" name="rejecttotalcarton" class="txtField" value="<?php echo $row['TF_rejecttotalCarton'];?>">
    </div>
    <div class="form-group">
      <label for="rejectremark">Reject Remark</label>
      <input type="text" class="form-control" name="rejectremark" class="txtField" value="<?php echo $row['TF_rejectRemark'];?>">
    </div>
				<input type="submit" name="update" value="Update" onclick="updatereject();">
        <input type="button" value="Back" onclick="history.back()">
    <div class="message">
     <div class="pass" id="pass">Reject Details Successfully Updated</div>
     <div class="fail" id="fail">Reject Details Not Successfully Updated</div>
    </div>
	</form>
  <script>
  function updatereject(){
    const pass = document.getElementById('pass');
    const fail = document.getElementById('fail');
    let updatereject  = confirm("Are you sure to save this record?");
    if (updatereject) {
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