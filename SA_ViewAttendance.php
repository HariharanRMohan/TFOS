<?php
include 'header.php';
?>
</div>
   <h4>Attendance Information</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>STAFF NAME</th>
    <th>WORKING SHIFT</th>
    <th>DATE</th>
    <th>REMARK</th>
    <th>EDIT</th>
    
  </tr>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "tfas");
  if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
  }

  $sql = "SELECT * from staff_attendance";
  $result = $conn-> query($sql);
  while($user_data = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$user_data['SA_staffName']."</td>";
    echo "<td>".$user_data['SA_staffWorkshift']."</td>";
    echo "<td>".$user_data['SA_staffAttendanceDate']."</td>";
    echo "<td>".$user_data['SA_remark']."</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='SA_EditAttendance.php?id=$user_data[SA_staffID]'><i class='fa fa-edit' style='font-size:20px;color:black'></a></i></td>";
    echo "</tr>";
  }
  ?>  
  
</table>
<div>
    <center><input type=button onClick="location.href='index.php'" value='Back'></center>
        </div>
      </div>
  </div>
</body>
</html>