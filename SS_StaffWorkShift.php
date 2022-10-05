<?php
include 'header.php';
?>

<style>
    .message{
      width:100%
      position:relative;
      display: flex;
      justify-content: center;
    }

    .message .fail{
      font-size: 150%;
      color: green;
      position:absolute;
      font-weight: 700;
      transition: .3s;
      display: none;
    }

    .message .pass{
      font-size: 150%;
      color: green;
      position:absolute;
      font-weight: 700;
      transition: .3s;
      display: none;
    }

    .message .fill{
      font-size: 150%;
      color: green;
      position:absolute;
      animation: buttons .3s linear;
      font-weight: 700;
      transition: .3s;
      display: none;
    }

    @keyframes buttons{
      0%{
        transform: scale(0.1);
      }
      50%{
        transform: scale(0.5);
      }
      100%{
        transform: scale(1);
      }
    }
    </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
</head>
<body>
    </div>
    <div class="left">
    <h4>Working Shift</h4>

<div class="containerform">
<form method="post" action="SS_ProcessScheduleShift.php">
  
    
 <!--working shift-->
   
    <label for="SS_scheduleWorkshift">Schedule Shift : </label>
    <label class="container">&nbsp;&nbsp;&nbsp;8:30AM
    <input type="radio" id="radioshiftAM" name="SS_scheduleWorkshift" value="8:30AM" required>
    <span class="checkmark"></span>
    </label>

    <label class="container">&nbsp;&nbsp;&nbsp;2:00PM
    <input type="radio" id="radioshiftPM" name="SS_scheduleWorkshift" value="2:00PM" required>
    <span class="checkmark"></span>
   </label>

    <!--staff name-->
     <div class="form-group">
    <label for="SS_scheduleWorkersName"> Workers Name : </label>
    <select id="SM_staffName" name="SM_staffName[]" multiple class="form-control" id="SM_staffName" required>
                            <?php
                            include ('config.php');

                            $sql = "SELECT SM_staffName FROM staff_management";
                            $result = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    # code
                                    echo '<option>' .$row["SM_staffName"].'</option>';
                                }
                               
                                ?>
                                </select>
    </select>
     </div>
     <script>
$(document).ready(function(){
 $('#SM_staffName').multiselect({
  nonSelectedText: 'Select Workers Name',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#SM_staffName').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"SS_ProcessScheduleShift.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#SM_staffName option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#SM_staffName').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>


    <!--staff name-->
     <label for="SS_scheduleWorkcell">Workers Workcell : </label>

    <!--work cell-->
    <select id="SS_scheduleWorkcell" name="SS_scheduleWorkcell" id="SS_scheduleWorkcell" required>>
    <option value="" disabled selected>Select Workcell</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
    <option value="F">F</option>
    </select>

    <!--date-->
    <label for="Date">Select Date</label>
    
    <input type="date" id="date" name="SS_scheduleDate" class="form-control" required /><br><br>

    <input type="submit" name="submit" id="submit" value="Save" onclick="submittedshift();">
    <input type="reset" value="Clear Form">
    <input type=button onClick="location.href='SS_ViewScheduleShift.php'" value='View Schedule Record'>
    <input type="button" value="Back" onclick="history.back()">

    <div class="message">
          <div class="fill" id="fill">Please Fill Up The Form</div>
          <div class="pass" id="pass">Attendance successfully submitted</div>
          <div class="fail" id="fail">Something went wrong! Attendance details cannot be submitted.</div>
        </div>
  </form>
</div>
      
  </div>
  <script>
  function submittedshift(){
    var shiftam = document.getElementById("radioshiftAM").value;
    var shiftpm = document.getElementById("radioshiftPM").value;
    var name = document.getElementById("SM_staffName").value;
    var workcell = document.getElementById("SS_scheduleWorkcell").value;
    var date = document.getElementById("date").value;
    const fail = document.getElementById('fail');
    const pass = document.getElementById('pass');
    const fill = document.getElementById('fill');

    if (shiftam === "" || shiftpm === "" || name === "" ||  workcell === "" ||  date === "") {
      fill.style.display = 'block';
      return;
    }else {
      let submittedshift = confirm ("Are you sure to save this record?");
      if (submittedshift){
        pass.style.display = 'block';
      } else {
        fail.style.display = 'block';
      }
      }
  }
  setTimeout(() => {
      fill.style.display = 'none';
      pass.style.display = 'none';
      fail.style.display = 'none';
    }, 4000);
  </script>
</body>
</html>