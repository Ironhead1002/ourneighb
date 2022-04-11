<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}


$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

$user_id=$_SESSION['user_unique_id'];
$name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$contact = $_POST['user_contact_no'];
$flat = $_POST['flat'];

$query = "UPDATE users set user_name = '$name',email='$email',password = '$password',contact='$contact',flat_no='$flat' where user_id='$user_id'";
        $result   = mysqli_query($con, $query);
        if ($result) {
            ?>
                <script>
                    alert ('Update Successfully ');
                    location.replace('Account_Settings.php');
                </script>
            <?php
        }else {
          ?>
              <script>
                  alert ('Something Went Wrong');
                  location.replace('Account_Settings.php');
              </script>
          <?php
        }
?>
