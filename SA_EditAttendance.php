<?php
include 'header.php';
?>

<?php  
include 'config.php'; 
$id= $_GET['id'];

$name ="";
$shift ="";
$remark ="";


$mysqli = mysqli_query($mysqli, "SELECT * FROM staff_attendance WHERE SA_staffID=$id");
while($row = mysqli_fetch_array($mysqli))
{
	$name = $row['SA_staffName'];
	$shift= $row['SA_staffWorkshift'];
	$remark = $row['SA_remark'];
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
      font-weight: 700;
      transition: .3s;
      display: none;
    }

    .message .fail{
      font-size: 150%;
      color: green;
      position:absolute;
      animation: buttons .3s linear;
      font-weight: 700;
      transition: .3s;
      display: none;
    }
  </style>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    </div>
    <div class="left">
    <h4>Edit Staff Attendance</h4>

<div class="containerform">

<html lang="en">
  <head>
    <title>Edit Attendance Staff</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <form action="" name="editform" method="post">
        <div class="form-group">
          <label for="SA_staffName">STAFF NAME : </label>
          <input type="text" class="form-control" id="SA_staffName" placeholder="Enter Your Name" name="SA_staffName" value=" <?php echo $name; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput7">WORKING SHIFT : </label>
        <div class="form-check">
          <!--<input class="form-check-input" type="radio" name="SA_staffWorkshift" value="8:30AM" id="flexRadioWorking Shift1">-->
          <input class="form-check-input" type="radio" name="SA_staffWorkshift" id="flexRadioWorking Shift1"  value="8:30AM" <?php if ($shift == '8:30AM') echo 'checked="checked"'; ?>" />
          <label class="form-check-label" for="flexRadioWorking Shift1">8:30AM</label>
        </div>
        <div class="form-check">
          <!--<input class="form-check-input" type="radio" name="SA_staffWorkshift" value="2:00PM" id="flexRadioWorking Shift">-->
          <input class="form-check-input" type="radio" name="SA_staffWorkshift" disable id="flexRadioWorking Shift2" value="2:00PM" <?php if ($shift == '2:00PM') echo 'checked="checked"'; ?>" />
          <label class="form-check-label" for="flexRadioWorking Shift2">2:00PM</label>
        </div><br>
        
        <div class="form-group">
            <label for="formGroupExampleInput7">REMARK : </label>
        <div class="form-check">
          <!--<input class="form-check-input" type="radio" name="SA_remark" value="None" id="flexRadioRemark1">-->
          <input class="form-check-input" type="radio" name="SA_remark" id="flexRadioRemark1" value="NONE" <?php if ($remark == 'NONE') echo 'checked="checked"'; ?>">
          <label class="form-check-label" for="flexRadioRemark1">NONE</label>
        </div>
        <div class="form-check">
          <!--<input class="form-check-input" type="radio" name="SA_remark" value="Emergency" id="flexRadioRemark2">-->
          <input class="form-check-input" type="radio" name="SA_remark" id="flexRadioRemark2" value="EMERGENCY" <?php if ($remark == 'EMERGENCY') echo 'checked="checked"'; ?>">
          <label class="form-check-label" for="flexRadioRemark2">EMERGENCY</label>
        </div>
        </div>

         <input type="submit"  name="update" value="Update" onclick="updateatt();">
         <input type="button"  value="Cancel"  onClick="location.href='SA_ViewAttendance.php'">

        <div class="message">
              <div class="pass" id="pass">Attendance Successfuly Updated</div>
              <div class="fail" id="fail">Attendance Not Successfully Updated </div>
</div>
        </div>
</div>
              
        </form>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

    <?php
    include 'config.php'; 
    if(isset($_POST['update']))
    {
      mysqli_query($mysqli, "UPDATE staff_attendance SET SA_staffName='$_POST[SA_staffName]',SA_staffWorkshift='$_POST[SA_staffWorkshift]',SA_remark='$_POST[SA_remark]' where SA_staffID=$id");
      
      ?>
      <script type="text/javascript">
      window.location="SA_ViewAttendance.php";
      </script>
      <?php 
    }
    ?>

<script>
  function updateatt(){
    const pass = document.getElementById('pass');
    const fail = document.getElementById('fail');
    let updateatt  = confirm("Are you sure to save this record?");
    if (updateatt) {
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
</html>