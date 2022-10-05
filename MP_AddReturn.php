<?php
include 'header.php';
?>
<?php

    require_once("config.php");

     // check if form submitted, insert form data into users table.
  if(isset($_POST['submit'])) {
    $returnname = strtoupper($_POST['returnname']);
    $returncode = strtoupper($_POST['returncode']);
    $returnremark= strtoupper($_POST['returnremark']);


      // include dastabase connection file
    include_once("config.php");
    
    // insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO tf_return_list (TF_returnName, TF_returnCode, TF_returnRemark ) VALUES('$returnname','$returncode', '$returnremark')");
    
    //show message when user added
    if($result)
    {
      echo "Insert Return Successfully.";
    }
    else
    {
      echo "Insert Return Not Added Successfully.";
    }
    echo '<script type="text/javascript"> location="MP_ViewReturn.php";</script>';
  }  
?>

</div>
    <h4>Add Return Form</h4>

<div class="containerform">
  <form action="MP_AddReturn.php" name="form" method="post">
    <div class="form-group">
      <label for="returnname">Return Name</label>
      <input type="text" class="form-control" id="returnname" placeholder="Enter return name" name="returnname" required="">
    </div>
    <div class="form-group">
      <label for="returncode">Return Code</label>
      <input type="text"  class="form-control" id="returncode" placeholder="Enter return code" name="returncode" required="">
    </div>
    <div class="form-group">
      <label for="returnremark">Return Remark</label>
      <input type="text" class="form-control" id="returnremark" placeholder="Enter return remark" name="returnremark" required="">
    </div>

    <input type="submit" name="submit" value="Save"  onclick="fn_Submit();"/>
    <input type="reset" name="reset" value="Clear Form">
    <input type="button" name="button" value="View Return" onclick = "location.href='MP_ViewReturn.php'">
    <input type="button" value="Back" onclick="history.back()">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Return Details Successfully Added</div>
          <div class="fail" id="fail">Something went wrong! Return Details cannot be added.</div>
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
    var name = document.getElementById("returnname").value;
    var code = document.getElementById("returncode").value;
    var remark = document.getElementById("returnremark").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');

    if (isNaN(code)){
      alert("Return Code is Only allowed Numeric!");
      document.form.returncode.value ="";
      return;
    }
    else if (name === "" || code === "" || remark === "") {
      fill.style.display = 'block';
      return;
    }else {
      let fn_Submit = confirm ("Are you sure to save this record?");
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