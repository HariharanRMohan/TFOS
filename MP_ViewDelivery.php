<?php
include 'header.php';
?>
<?php
// including the database connection file
require_once("config.php");

?>
</div>
   <h4>List of Delivery Information</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>Delivery Name</th>
    <th>Delivery Code</th>
    <th>Total Carton (Plan)</th>
    <th>Total Production (Carton)</th>
    <th>Total Production (Card)</th>
    <th>Delivery Remark</th>
    <th class=noPrint>Edit</th>
    <th class=noPrint>Delete</th>
    <th class=noPrint>Print</th>
   
  </tr>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * from tf_delivery_list";
  $result = $mysqli-> query($sql);
  while($row = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['TF_deliveryName']."</td>";
    echo "<td style='text-align: center'>".$row['TF_deliveryCode']."</td>";
    echo "<td style='text-align: right'>".$row['TF_deliverytotalCarton']."</td>";
    echo "<td style='text-align: right'>".$row['TF_deliverytotalproductionCarton']."</td>";
    echo "<td style='text-align: right'>".$row['TF_deliverytotalproductionCard']."</td>";
    echo "<td>".$row['TF_deliveryRemark']."</td>";
    echo "<td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='MP_EditDelivery.php?id=$row[TF_deliveryID]'><i class='fa fa-edit' style='font-size:20px;color:black;text-align: center'></a></i></td>";
    echo "<td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to remove this record?');\" href='MP_DeleteDelivery.php?id=$row[TF_deliveryID]'><i class='fa fa-trash' style='font-size:20px;color:black;text-align:center'></a></i></i></td>";
    echo "<td><a onClick=\"javascript: return true;\" href='MP_ViewDeliveryPrint.php?id=$row[TF_deliveryID]'><i class='fa fa-print' style='font-size:20px;color:black'></a></td>";
    echo "</tr>";
  }
  ?>  
  
</table>
<br>
<center><input type=button onClick="location.href='index.php'" value='Back'></center>
      </div>
  </div>

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
</body>
</html>
