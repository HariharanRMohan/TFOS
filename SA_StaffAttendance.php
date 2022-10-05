<?php
include 'header.php';
?>

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
                         

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 
</head>
<body>
    </div>
    <div class="left">
    <h4>Attendance</h4>

<div class="containerform">
  <form method="post" action="SA_ProcessAttendance.php">
    
    <!--staff name-->
    <?php
    /* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tfas');
 
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   
    if(mysqli_connect_errno())
    {
      echo "Connection Failed" .mysqli_connect_error();

    }
    $result=mysqli_query($mysqli, "select *from staff_management");
    echo "<label for='SA_staffName'>Workers Name : </label>";
    echo "<select id='SM_staffName' name='SM_staffName' id='SM_staffName' class='form-control' required>";
    echo "<option></option>";
    while($row=mysqli_fetch_array($result))
    {
      echo "<option>$row[SM_staffName]</option>";
    }
    echo "</select>";
    mysqli_close($mysqli);
    ?>
     <p><span class="error">* Required field</span></p>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>

    <script>
      $("#SM_staffName").chosen();
      </script>

<!--working shift-->
    <br><br>
    <label for="SA_staffWorkshift">Working Shift : </label>
    <label class="container">8:30AM
    <input type="radio" id="radioshiftAM" name="SA_staffWorkshift" value="8:30AM" required>
    <span class="checkmark"></span>
    </label>

    <label class="container">2:00PM
    <input type="radio" id="radioshiftPM" name="SA_staffWorkshift" value="2:00PM" required>
    <span class="checkmark"></span>
   </label>

   <br>
     <!--remark-->
    <label for="SA_remark">Remarks :</label>
    <label class="container">NONE
    <input type="radio" id="SA_remark" name="SA_remark" value="NONE"  required>
    <span class="checkmark"></span>
    </label>

    <label class="container">EMERGENCY 
    <input type="radio" id="SA_remark" name="SA_remark" value="EMERGENCY"  required>
    <span class="checkmark"></span>
   </label>

    <input type="submit" name="submit" id="submit" value="Save" onclick="submitted();">
    <input type="reset" value="Clear Form">
    <input type=button onClick="location.href='SA_ViewAttendance.php'" value='View Attendance Record'>
    <input type="button" value="Back" onclick="location.href='index.php'">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Attendance successfully submitted</div>
          <div class="fail" id="fail">Something went wrong! Attendance details cannot be submitted.</div>
        </div>
  </form>
</div>
  </div>

  <script>
  function submitted(){
    var name = document.getElementById("SM_staffName").value;
    var shiftam = document.getElementById("radioshiftAM").value;
    var shiftpm = document.getElementById("radioshiftPM").value;
    var remark = document.getElementById("SA_remark").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');

    if (name === "" || shiftam === "" || shiftpm === "" ||  remark === "") {
      fill.style.display = 'block';
      return;
    }else {
      let submitted = confirm ("Are you sure to save this record?");
      if (submitted){
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