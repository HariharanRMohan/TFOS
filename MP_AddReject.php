<?php
include 'header.php';
?>
<?php

    require_once("config.php");

     // check if form submitted, insert form data into users table.
  if(isset($_POST['submit'])) {
    $rejectname = strtoupper($_POST['rejectname']);
    $rejectcode =strtoupper( $_POST['rejectcode']);
    $rejecttotalcarton =strtoupper( $_POST['rejecttotalcarton']);
    $rejectremark = strtoupper($_POST['rejectremark']);

    // insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO tf_reject_list (TF_rejectName, TF_rejectCode, TF_rejecttotalCarton, TF_rejectRemark) VALUES('$rejectname','$rejectcode', '$rejecttotalcarton','$rejectremark')");
    
    //show message when user added
    if($result)
    {
      echo "Reject Details Added Successfully.";
    }
    else
    {
      echo "Reject Details Cannot Be Added.";
    }
    echo '<script type="text/javascript"> location="MP_ViewReject.php";</script>';
  }  
?>

</div>
    <h4>Add Reject Form</h4>

<div class="containerform">
  <form action="MP_AddReject.php" name="form" method="post">
    <div class="form-group">
      <label for="rejectname">Reject Name</label>
      <input type="text" class="form-control" id="rejectname" placeholder="Enter reject name" name="rejectname" required="">
    </div>
    <div class="form-group">
      <label for="rejectcode">Reject Code</label>
      <input type="text"  class="form-control" id="rejectcode" placeholder="Enter reject code" name="rejectcode" required="">
    </div>
    <div class="form-group">
      <label for="rejecttotalcarton">Rejected Carton (Quantity)</label>
      <input type="text"  class="form-control" id="rejecttotalcarton" placeholder="Enter quantity carton rejected" name="rejecttotalcarton" required="">
    </div>
    <div class="form-group">
      <label for="rejectremark">Reject Remark</label>
      <input type="text" class="form-control" id="rejectremark" placeholder="Enter reject remark" name="rejectremark" required="">
    </div>

    <input type="submit" name="submit" value="Save"  onclick="fn_Submit();"/>
    <input type="reset" name="reset" value="Clear Form">
    <input type="button" name="button" value="View Reject" onclick = "location.href='MP_ViewReject.php'">
    <input type="button" value="Back" onclick="history.back()">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Reject details added successfully</div>
          <div class="fail" id="fail">Something went wrong! Reject details cannot be added</div>
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
    var name        = document.getElementById("rejectname").value;
    var remark        = document.getElementById("rejectremark").value;
    var code        = document.getElementById("rejectcode").value;
    var quantity    = document.getElementById("rejecttotalcarton").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');
    
    if (isNaN(code)) {
      alert("Reject Code is Only allowed Numeric!");
      document.form.rejectcode.value ="";
      return;
    }
    else if (isNaN(quantity)) {
      alert("Rejected Carton (Quantity) is Only allowed Numeric!");
      document.form.rejecttotalcarton.value ="";
      return;
    } 
    else if (name === "" || remark === "" || code === "" || quantity === "") {
      fill.style.display = 'block';
      return;
    }else {
      let fn_Submit = confirm("Are you sure to save this record?");
    if (fn_Submit){
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