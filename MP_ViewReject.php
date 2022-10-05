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
<?php
include 'header.php';
?>
<?php
// including the database connection file
require_once("config.php");

?>
</div>
    <h4>List of Reject Information</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>Reject Name</th>
    <th>Reject Code</th>
    <th>Rejected Carton (Quantity)</th>
    <th>Reject Remark</th>
    <th class=noPrint>Edit</th>
    <th class=noPrint>Delete</th>
    <th class=noPrint>Print</th>
    
  </tr>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * from tf_reject_list";
  $result = $mysqli-> query($sql);
  while($row = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['TF_rejectName']."</td>";
    echo "<td style='text-align: center'>".$row['TF_rejectCode']."</td>";
    echo "<td style='text-align: right'>".$row['TF_rejecttotalCarton']."</td>";
    echo "<td>".$row['TF_rejectRemark']."</td>";
    echo "<td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='MP_EditReject.php?id=$row[TF_rejectID]'><i class='fa fa-edit' style='font-size:20px;color:black'></a></i></td>";
    echo "<td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to remove this record?');\" href='MP_DeleteReject.php?id=$row[TF_rejectID]'><i class='fa fa-trash' style='font-size:20px;color:black'></a></i></i></td>";
    //echo "<td class=\"noPrint\"><a onClick=\"window.print();\"><i class='fa fa-print' style='font-size:20px;color:black'></a></i></i></td>";
    echo "<td><a onClick=\"javascript: return true;\" href='MP_ViewRejectPrint.php?id=$row[TF_rejectID]'><i class='fa fa-print' style='font-size:20px;color:black'></a></td>";
    echo "</tr>";
  }
  ?>  
  
</table>
<br>
<center><input type=button onClick="location.href='index.php'" value='Back'></center>
      </div>
  </div>
</body>
</html>