
<?php

require_once("config.php");
include "SM_ViewStaff.php";
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM staff_management WHERE SM_staffID=$id");

//show message when user added
echo "Staff Deleted Successfully.";

?>

<script type="text/javascript">
window.location="SM_ViewStaff.php";

</script>