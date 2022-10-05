<?php
include 'header.php';
?>

</div>
   <h4>Schedule Shifts Record Information</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th>SCHEDULE SHIFT</th>
    <th>WORKER NAME</th>
    <th>WORKCELL</th>
    <th>DATE</th>
    <tr style="width:50px"></tr>
    
  </tr>
  
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "tfas");
  if ($mysqli-> connect_error) {
    die("Connection failed:". $mysqli-> connect_error);
  }

  $sql = "SELECT * from staff_schedule";
  $result = $mysqli-> query($sql);
  while($user_data = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$user_data['SS_scheduleWorkshift']."</td>";
    echo "<td>".$user_data['SS_scheduleWorkersName']."</td>";
    echo "<td>".$user_data['SS_scheduleWorkcell']."</td>";
    echo "<td>".$user_data['SS_scheduleDate']."</td>";
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