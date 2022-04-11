<?php

  $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
  $s_id = $_GET['data'];
  $sqlaccept = "UPDATE societies set application_status = 'Approved' where society_id = $s_id";
  $quaryaccept = mysqli_query($con,$sqlaccept);

  if($quaryaccept)
  {
    ?>
    <script>
        alert ('Society Approved Successfully');
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
