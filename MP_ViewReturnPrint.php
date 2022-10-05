
<?php
// including the database connection file
require_once("config.php");
$id = $_REQUEST['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TFOS Website</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
<div class="wrapper">
    <div class="navigation">
    <img align="left" class="logo" src="tflogo.png"> 
    </div>

<body onload="window.print()">
<div class="left">
<h4 align="center">Return List</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>Return Name</th>
    <th>Return Code</th>
    <th>Return Remark</th>

  </tr>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * from tf_return_list WHERE TF_returnID=$id";
  $result = $mysqli-> query($sql);
  while($row = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['TF_returnName']."</td>";
    echo "<td>".$row['TF_returnCode']."</td>";
    echo "<td>".$row['TF_returnRemark']."</td>";
    echo "</tr>";
  }
  ?>  
  
</table>
<br>
<center><input type=button onClick="location.href='MP_ViewReturn.php'" value='Back'></center>
      </div>
  </div>
</body>
</html>

<style>
  @media screen{
		.noPrint{}
		.noScreen{display:none;}
		thead { display: normal; }  
		tfoot { display: normal; }
	}

	@media print{
		.noPrint{display:none;}
		.noScreen{}
		thead { display: table-header-group; }
		tfoot { display: table-footer-group; }
		#printPageButton {
		display: none;
		}
	}
</style>