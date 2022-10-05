<?php
include 'header.php';
?>
</div>
   <h4>List of Staff Information</h4>

<div class="containerform">
<table id="staffs">
  <tr>
    <th style='text-align: center'>Name</th>
    <th style='text-align: center'>Matric Card</th>
    <th style='text-align: center'>Identification Card Number</th>
    <th style='text-align: center'>Phone Number</th>
    <th style='text-align: center'>Gender</th>
    <th style='text-align: center'>Email</th>
    <th style='text-align: center'>Faculty</th>
    <th style='text-align: center'>Bank Name</th>
    <th style='text-align: center'>Bank Account Number</th>
    <th style='text-align: center'>Edit</th>
    <th style='text-align: center'>Delete</th>
    
  </tr>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "tfas");
  if ($conn-> connect_error) {
    die("Connection failed:". $conn-> connect_error);
  }

  $sql = "SELECT * from staff_management";
  $result = $conn-> query($sql);
  while($user_data = $result-> fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$user_data['SM_staffName']."</td>";
    echo "<td>".$user_data['SM_staffMatric']."</td>";
    echo "<td>".$user_data['SM_staffIC']."</td>";
    echo "<td>".$user_data['SM_staffPhoneNo']."</td>";
    echo "<td>".$user_data['SM_staffGender']."</td>";
    echo "<td>".$user_data['SM_staffEmail']."</td>";
    echo "<td>".$user_data['SM_staffFaculty']."</td>";
    echo "<td>".$user_data['SM_staffBankAccName']."</td>";
    echo "<td>".$user_data['SM_staffBankAccNo']."</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure to edit this record?');\" href='SM_EditStaff.php?id=$user_data[SM_staffID]'><i class='fa fa-edit' style='font-size:20px;color:black'></a></i></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure to remove this record?');\" href='SM_DeleteStaff.php?id=$user_data[SM_staffID]'><i class='fa fa-trash' style='font-size:20px;color:black'></a></i></td>";
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

