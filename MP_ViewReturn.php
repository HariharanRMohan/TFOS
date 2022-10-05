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
       <h4>List of Return Information</h4>

<div class="containerform">
<table id="staffs">
  <tr >
    <th>Return Name</th>
    <th>Return Code</th>
    <th>Return Remark</th>
    <th  class=noPrint>Edit</th>
    <th  class=noPrint>Delete</th>
    <th class=noPrint>Print</th>
    
  </tr>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * from tf_return_list";
  $result = $mysqli-> query($sql);
  while($row = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['TF_returnName']."</td>";
    echo "<td style='text-align: center'>".$row['TF_returnCode']."</td>";
    echo "<td>".$row['TF_returnRemark']."</td>";
    echo " <td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='MP_EditReturn.php?id=$row[TF_returnID]'><i class='fa fa-edit' style='font-size:20px;color:black'></a></i></td>";
    echo "<td class=\"noPrint\"><a onClick=\"javascript: return confirm('Are you sure to remove this record?');\" href='MP_DeleteReturn.php?id=$row[TF_returnID]'><i class='fa fa-trash' style='font-size:20px;color:black'></a></i></i></td>";
    echo "<td><a onClick=\"javascript: return true;\" href='MP_ViewReturnPrint.php?id=$row[TF_returnID]'><i class='fa fa-print' style='font-size:20px;color:black'></a></td>";
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
