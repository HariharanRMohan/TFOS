
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
<h4 align="center">Delivery List</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>Delivery Name</th>
    <th>Delivery Code</th>
    <th>Total Carton(Plan)</th>
    <th>Total Production(Carton)</th>
    <th>Total Production(Card)</th>
    <th>Delivery Remark</th>
 
  </tr>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * FROM tf_delivery_list WHERE TF_deliveryID=$id";
  $result = $mysqli-> query($sql);
  while($row = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['TF_deliveryName']."</td>";
    echo "<td>".$row['TF_deliveryCode']."</td>";
    echo "<td>".$row['TF_deliverytotalCarton']."</td>";
    echo "<td>".$row['TF_deliverytotalproductionCarton']."</td>";
    echo "<td>".$row['TF_deliverytotalproductionCard']."</td>";
    echo "<td>".$row['TF_deliveryRemark']."</td>";
    echo "</tr>";
  }
  
  ?>  
 
</table>
<br>
<center><input type=button onClick="location.href='MP_ViewDelivery.php'" value='Back'></center>
      </div>
  </div>
</body>
</html>



<!-- <style>
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
</style> -->