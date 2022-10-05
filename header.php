<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style2.css">
<!-- letak dekat header home-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.wrapper{
	background: url(tf_background.jpg) repeat;
	opacity: 100%;
	background-size:  cover;
	height:  1000px;

}
h4{
	color: white;
	font-family: sans-serif;
	font-size: 50px;
	font-weight: bold;
	width: 885px;
	margin: 10px;
	position: center;
}
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial;
    padding: 0px;
}

.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 30px 40px;
  text-decoration: none;
  
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 30px 40px;
  background-color: inherit;
  font-family: Arial;
  margin: 0;
  font-weight: 600;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: darkcyan;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}

.logo {
	width: 95px;
	height: auto;
    padding: 0px 0px;
    margin-left: 30px
}
</style>
</head>
<body>
  
<div class="wrapper">
<div class="navbar">
    <img src="logo.png" class= "logo" >
  
  <a href="about.php">About</a>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Manage Staff
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    <a href="SM_AddStaff.php">Add Staff</a>
    <a href="SM_ViewStaff.php">View Staff</a>
  </div>
  </div> 
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction2()">Manage Product
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown2">
    <a href="PM_AddProduct.php">Add Product</a>
    <a href="PM_ViewProduct.php">View Product</a>
  </div>
  </div>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction3()">Staff Scheduling
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown3">
    <a href="SA_StaffAttendance.php">Attendance</a>
    <a href="SS_StaffWorkShift.php">Working Shift Schedule</a>
  </div>
  </div>
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction4()">Monitoring Product
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown4">
    <a href="MP_AddDelivery.php">Delivery List</a>
    <a href="MP_AddReturn.php">Return List</a>
    <a href="MP_AddReject.php">Reject List</a>
  </div>
  </div>
  <a href="index.php">Home</a>
  </body>
<script>
    
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

function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown2");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown3");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

function myFunction4() {
  document.getElementById("myDropdown4").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown4");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>