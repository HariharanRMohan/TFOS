<?php
include 'header.php';
?>

<?php
require_once 'config.php'; 
if (isset($_POST['update'])) {
  $id = $_GET['id'];

  $staffname = strtoupper($_POST['name']);
	$staffmatriccard = strtoupper($_POST['mcard']);
	$staffmykad = strtoupper($_POST['icard']);
	$staffphonenumber = strtoupper($_POST['phone']);
	$staffgender = strtoupper($_POST['gender']);
	$staffemail = $_POST['email'];
	$stafffaculty = strtoupper($_POST['faculty']);
  $staffbankname = strtoupper($_POST['bankname']);
	$staffbankaccount = strtoupper($_POST['bankaccount']);

  $query = "UPDATE staff_management 
            SET SM_staffName='$staffname' , SM_staffMatric='$staffmatriccard' , SM_staffIC='$staffmykad' , SM_staffPhoneNo='$staffphonenumber',
            SM_staffGender='$staffgender' , SM_staffEmail='$staffemail' , SM_staffFaculty='$stafffaculty',
            SM_staffBankAccName='$staffbankname' , SM_staffBankAccNo='$staffbankaccount' 
            wHERE SM_staffID=$id";

  $result = mysqli_query($mysqli, $query);

  if($result)
  {
    echo "Update staff Details Successfully.";
  }
  else
  {
    echo "Staff Details Can't Added.";
  }
  echo '<script type="text/javascript"> location="SM_ViewStaff.php";</script>';
}
?>

<?php  
$id= $_GET['id'];

$staffname ="";
$staffmatriccard ="";
$staffmykad ="";
$staffphonenumber ="";
$staffgender ="";
$staffemail ="";
$stafffaculty ="";
$staffbankname ="";
$staffbankaccount ="";

$mysqli = mysqli_query($mysqli, "SELECT * FROM staff_management WHERE SM_staffID=$id");
while($row = mysqli_fetch_array($mysqli))
{
	$staffname = $row['SM_staffName'];
	$staffmatriccard = $row['SM_staffMatric'];
	$staffmykad = $row['SM_staffIC'];
	$staffphonenumber = $row['SM_staffPhoneNo'];
	$staffgender = $row['SM_staffGender'];
	$staffemail = $row['SM_staffEmail'];
	$stafffaculty = $row['SM_staffFaculty'];
  $staffbankname = $row['SM_staffBankAccName'];
	$staffbankaccount = $row['SM_staffBankAccNo'];
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

</div>
    <h4>Update Staff Details</h4>

<div class="containerform">
  <form action="" method="post">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $staffname; ?>">

    <label for="mcard">Matric Card</label>
    <input type="text" id="mcard" name="mcard" placeholder="Enter Your Matric Card Number" value="<?php echo $staffmatriccard; ?>">

    <label for="icard">Identification Card Number</label>
    <input type="text" id="icard" name="icard" placeholder="Enter Your Identification Card Number" value="<?php echo $staffmykad; ?>">

    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $staffphonenumber; ?>">

    <!--gender-->

    <label for="gender">Gender</label>
    <label class="container">Male
    <input type="radio" id="radiogendermale" name="gender" value="MALE" <?php if ($staffgender == 'MALE') echo 'checked="checked"'; ?>">
    <span class="checkmark"></span>
    </label>

    <label class="container">Female 
    <input type="radio" id="radiogenderfemale" name="gender" value="FEMALE" <?php if ($staffgender == 'FEMALE') echo 'checked="checked"'; ?>">
    <span class="checkmark"></span>
   </label>


    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter Your Email" value="<?php echo $staffemail; ?>">

    <label for="facultyy">Faculty</label>

    <select id="faculty" name="faculty">
    <!-- <option value="" disabled selected>Choose Faculty</option> -->
    <option value="FTMK"<?php if($stafffaculty == "FTMK") echo 'selected = "selected"'; ?>>FTMK</option>
    <option value="FKP"<?php if($stafffaculty == "FKP") echo 'selected = "selected"'; ?>>FKP</option>
    <option value="FKE"<?php if($stafffaculty == "FKE") echo 'selected = "selected"'; ?>>FKE</option>
    <option value="FKEKK"<?php if($stafffaculty == "FKEKK") echo 'selected = "selected"'; ?>>FKEKK</option>
    <option value="FTK"<?php if($stafffaculty == "FTK") echo 'selected = "selected"'; ?>>FTK</option>
    <option value="FKM"<?php if($stafffaculty == "FKM") echo 'selected = "selected"'; ?>>FKM</option>
    <option value="FPTT"<?php if($stafffaculty == "FPTT") echo 'selected = "selected"'; ?>>FPTT</option>
    <option value="FTKEE"<?php if($stafffaculty == "FTKEE") echo 'selected = "selected"'; ?>>FTKEE</option>
    <option value="FTKMP"<?php if($stafffaculty == "FTKMP") echo 'selected = "selected"'; ?>>FTKMP</option>
    </select>

    <label for="banks">Bank Name</label>

    <select id="bank" name="bankname">
    <!-- <option value="" disabled selected>Choose Bank Name</option> -->
    <option value="BANKISLAM"<?php if($staffbankname == "BANKISLAM") echo 'selected = "selected"'; ?>>BANK ISLAM</option>
    <option value="MAYBANK" <?php if($staffbankname == "MAYBANK") echo 'selected = "selected"'; ?>>MAYBANK</option>    
    <option value="CIMB" <?php if($staffbankname == "CIMB") echo 'selected = "selected"'; ?>>CIMB</option>
    <option value="BSN" <?php if($staffbankname == "BSN") echo 'selected = "selected"'; ?>>BSN</option>
    <option value="AFFINBANK" <?php if($staffbankname == "AFFINBANK") echo 'selected = "selected"'; ?>>AFFIN BANK</option>
    <option value="RHB" <?php if($staffbankname == "RHB") echo 'selected = "selected"'; ?>>RHB</option>
    <option value="HONGLEONG" <?php if($staffbankname == "HONGLEONG") echo 'selected = "selected"'; ?>>HONG LEONG</option>
    <option value="HSBC" <?php if($staffbankname == "HSBC") echo 'selected = "selected"'; ?>>HSBC</option>
    <option value="AMBANK" <?php if($staffbankname == "AMBANK") echo 'selected = "selected"'; ?>>AMBANK</option>
    <option value="STANDARDCHARTERED" <?php if($staffbankname == "STANDARDCHARTERED") echo 'selected = "selected"'; ?>>STANDARD CHARTERED</option>
    <option value="PUBLICBANK" <?php if($staffbankname == "PUBLICBANK") echo 'selected = "selected"'; ?>>PUBLIC BANK</option>
    <option value="ALLIANCEBANK" <?php if($staffbankname == "ALLIANCEBANK") echo 'selected = "selected"'; ?>>ALLIANCE BANK</option>
    <option value="UOB" <?php if($staffbankname == "UOB") echo 'selected = "selected"'; ?>>UOB</option>
    <option value="OCBCBANK" <?php if($staffbankname == "OCBCBANK") echo 'selected = "selected"'; ?>>OCBC BANK</option>
    <option value="EXIMBANK" <?php if($staffbankname == "EXIMBANK") echo 'selected = "selected"'; ?>>EXIM BANK</option>
    </select>

    <label for="Bank">Bank Account</label>
    <input type="text" id="bank" name="bankaccount" placeholder="Enter Your Bank Account Number" value="<?php echo $staffbankaccount; ?>">

    <input type="submit" name="update" value="Update" onclick="updatestaff();">
    <input type="button" value="Back" onClick="location.href='SM_ViewStaff.php'">

    <div class="message">
        <div class="pass" id="pass">Attendance Successfuly Updated</div>
        <div class="fail" id="fail">Attendance Not Successfully Updated </div>
    </div>

  </form>
</div>
      
  </div>
</body>
<script>
  function updatestaff(){
    const pass = document.getElementById('pass');
    const fail = document.getElementById('fail');
    let updatestaff  = confirm("Are you sure to save this record?");
    if (updatestaff) {
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