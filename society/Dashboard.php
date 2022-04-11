<?php
session_start();

if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}

$id = $_SESSION['user_unique_id'];
$s_id = $_SESSION['society_unique_id'];
$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

$sql = "SELECT user_name, flat_no, user_id from users where society_id=$s_id order by flat_no desc";
$quary = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet"> -->
    <title>Society Dashboard</title>
    <style>
        .span {
            color: red;
        }

        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <?php
            include('header.php');
            ?>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <?php
                include('Sidebar.php');
                ?>
                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                      <p class="text-gray-800 font-medium text-center text-lg font-bold">Society Members</p>
                      <?php
                      while($result = mysqli_fetch_array($quary))
                        {
                            echo "<a href=\"maintenance.php?data=".$result['user_id']."\">
                            <div class=\"bg-white border mt-2\">
                              <div>
                                  <div class=\"d-flex flex-row justify-content-between align-items-center p-2 border-bottom\">
                                      <div class=\"d-flex flex-row align-items-center feed-text px-2\"><img class=\"rounded-circle\" src=\"https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg\" width=\"45\">
                                          <div class=\"d-flex flex-column flex-wrap ml-2\"><span class=\"font-weight-bold text-dark\">".$result['user_name']." ".$result['flat_no']."</span></div>
                                      </div>
                                  </div>
                              </div>
                              </div>
                              </a>";
                        }
                      ?>
                        <br>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->

            <!--/footer-->

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript" src="js/addFlatDetails.js"></script>

</body>

</html>
