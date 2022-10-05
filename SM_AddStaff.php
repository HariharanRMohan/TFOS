<?php
include 'header.php';
?>
<?php

    require_once("config.php");

     // check if form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
		$staffname = strtoupper($_POST['name']);
		$staffmatriccard = strtoupper($_POST['mcard']);
		$staffmykad = strtoupper($_POST['icard']);
		$staffphonenumber = strtoupper($_POST['phone']);
		$staffgender = strtoupper($_POST['gender']);
		$staffemail = $_POST['email'];
		$stafffaculty = strtoupper($_POST['faculty']);
    $staffbankname = strtoupper($_POST['bankname']);
		$staffbankaccount = strtoupper($_POST['bankaccount']);
		
		// insert user data into table
    $query = "INSERT INTO staff_management (SM_staffName, SM_staffMatric, SM_staffIC, SM_staffPhoneNo, SM_staffGender, SM_staffEmail, SM_staffFaculty, SM_staffBankAccName, SM_staffBankAccNo) VALUES('$staffname','$staffmatriccard','$staffmykad','$staffphonenumber','$staffgender','$staffemail','$stafffaculty', '$staffbankname', '$staffbankaccount')";
		$result = mysqli_query($mysqli, $query);
		
		//show message when user added
		if($result)
		{
			echo "Staff details has been added.";
		}
		else
		{
			echo "Something went wrong! Staff details cannot be added.";
		}
		echo '<script type="text/javascript"> location="SM_ViewStaff.php";</script>';
	}  
?>
<style>
.wrapper2{
	background: url(tf_background.jpg) repeat;
	opacity: 100%;
	background-size:  cover;
	height:  1400px;

}
</style>
</div>
<h4>Staff Registration Form</h4>
<div class="wrapper2">
<div class="containerform">
  <form action="" method="post">
    <label for="name">Name SatissRaj</label>
    <input type="text" id="name" placeholder="Enter your name" name="name" required="">

    <label for="mcard">Matric Card</label>
    <input type="text" id="mcard" name="mcard" placeholder="Enter matric number" required="">

    <label for="icard">Identification Card Number</label>
    <input type="text" id="icard" name="icard" placeholder="Enter your identification card number without (-)" required="">

    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Enter your phone number without (-)"  required="">

<!--gender-->

    <label for="gender">Gender</label>
    <label class="container">Male
    <input type="radio" id="radiogendermale" name="gender" value="MALE">
    <span class="checkmark"></span>
    </label>

    <label class="container">Female 
    <input type="radio" id="radiogenderfemale" name="gender" value="FEMALE">
    <span class="checkmark"></span>
   </label>


    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter your E-mail">

    <label for="facultyy">Faculty</label>

    <select id="faculty" name="faculty">
    <option value="" disabled selected>Choose faculty</option>
    <option value="FTMK">FTMK</option>
    <option value="FKP">FKP</option>
    <option value="FKE">FKE</option>
    <option value="FKEKK">FKEKK</option>
    <option value="FTK">FTK</option>
    <option value="FKM">FKM</option>
    <option value="FPTT">FPTT</option>
    <option value="FTKEE">FTKEE</option>
    <option value="FTKMP">FTKMP</option>
    </select>

    <label for="banks">Bank Name</label>

    <select id="bank" name="bankname">
    <option value="" disabled selected>Choose bank name</option>
    <option value="BankIslam">Bank Islam</option>
    <option value="Maybank">Maybank</option>
    <option value="CIMB">CIMB</option>
    <option value="BSN">BSN</option>
    <option value="AffinBank">Affin Bank</option>
    <option value="RHB">RHB</option>
    <option value="HongLeong">Hong Leong</option>
    <option value="HSBC">HSBC</option>
    <option value="AmBank">AmBank</option>
    <option value="StandardChartered">Standard Chartered</option>
    <option value="PublicBank">Public Bank</option>
    <option value="AllianceBank">Alliance Bank</option>
    <option value="UOB">UOB</option>
    <option value="OCBCBank">OCBC Bank</option>
    <option value="EximBank">Exim Bank</option>
    </select>

    <label for="Bank">Bank Account</label>
    <input type="text" id="bankaccount" name="bankaccount" placeholder="Enter bank account number" required="">

    <input type="submit" name="submit" value="Submit" onclick="fn_Submit();"/>
    <input type="reset" value="Clear Form">
    <input type="button" value="Back" onclick="history.back()">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Staff details added successfully</div>
          <div class="fail" id="fail">Something went wrong! Staff details cannot be added.</div>
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
    // The function below will start the confirmation dialog
    function fn_Submit(){
    var names          = document.getElementById("name").value;
    var mcards         = document.getElementById("mcard").value;
    var icards         = document.getElementById("icard").value;
    var phones         = document.getElementById("phone").value;
    var genderm        = document.getElementById("radiogendermale").value; 
    var genderf        = document.getElementById("radiogenderfemale").value; 
    var emails         = document.getElementById("email").value;
    var facultyyy      = document.getElementById("faculty").value;
    var banknamee      = document.getElementById("bank").value;
    var bankaccountt  = document.getElementById("bankaccount").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');
    
    if (isNaN(icards)) {
      alert("Identification Card Number is Only allowed Numeric!");
      document.form.icard.value ="";
      return;
    }
    else if (isNaN(phones)) {
      alert("Phone Number is Only allowed Numeric!");
      document.form.phone.value ="";
      return;
    } 
    else if (isNaN(bankaccountt)) {
      alert("Bank Account Number is Only allowed Numeric!");
      document.form.bankaccount.value ="";
      return;
    }
    else if (names === "" || mcards === "" || icards === "" || phones === "" || genderm === "" || genderf === "" || emails === "" || facultyyy === "" || banknamee === "" || bankaccountt === "") {
      fill.style.display = 'block';
      return;
    }else {
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
  <!-- <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script> -->
</body>
</html>
