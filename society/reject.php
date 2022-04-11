<?php

  $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
  $s_id = $_GET['data'];
  $sqlreject = "UPDATE societies set application_status = 'Rejected' where society_id = $s_id";
  $quaryreject = mysqli_query($con,$sqlreject);

  if($quaryreject)
  {
    ?>
    <script>
        alert ('Society Rejected Successfully');
        location.replace('approve_or_reject.php');
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
        alert ('Something went wrong');
        location.replace('approve_or_reject.php');
    </script>
    <?php
  }
 ?>
