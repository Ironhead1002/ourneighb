<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}

$person_id = $_GET['data'];
$id = $_SESSION['user_unique_id'];
$s_id = $_SESSION['society_unique_id'];
$status = $_SESSION['status'];
$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
$sql = "SELECT maintenance.amount, maintenance.description, users.user_name, users.flat_no from users
        JOIN maintenance
        ON users.user_id = maintenance.user_id
        where users.society_id=$s_id and users.user_id=$person_id order by maintenance.date_created desc";
$quary = mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Maintenance</title>
    <style type="text/css">
        .alert-span{
            color: red;
        }

    </style>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <?php
            include('header.php');
        ?>
        <!--/Header-->

        <div class="flex flex-1 d-flex">
            <!--Sidebar-->
            <?php
                include('Sidebar.php');
            ?>
            <!--/Sidebar-->
            <!--/Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                  <?php
                  if($status == 'admin'){
                    echo "<form class=\"\" method=\"post\" onkeyup=\"return validation()\" action=\"mainback.php\" name=\"myform\">
                        <p class=\"text-gray-800 font-medium text-center text-lg font-bold\">Maintenance</p>
                        <div class=\"row\">
                            <div class=\"col-lg-2 col-md-2 col-sm-2 m-1\">
                                <input class=\"w-full  px-5 py-2 text-gray-700 bg-gray-200 rounded\" id=\"amount\" name=\"amount\" type=\"text\" required=\"\" placeholder=\"Amount\">
                                <span class=\"alert-span\" id=\"e_amount\"></span>
                            </div>
                            <div class=\"col-lg-2 col-md-2 col-sm-2 m-1\">
                                <input class=\"w-full  px-5 py-2 text-gray-700 bg-gray-200 rounded\" id=\"person_id\" name=\"person_id\" type=\"text\" required=\"\" placeholder=\"person_id\" value=\"$person_id\">
                                <span class=\"alert-span\" id=\"e_person_id\"></span>
                            </div>
                            <div class=\"col-lg-2 col-md-2 col-sm-2 m-1\">
                                <textarea id=\"note\" class=\"w-full  text-gray-700 bg-gray-200 rounded\" name=\"note\" rows=\"2\" placeholder=\"Note\" cols=\"40\"></textarea>
                            </div>
                            <div class=\"col-lg-2 col-md-2 col-sm-2 m-1\">
                                <button class=\" px-4 py-2  text-white font-light  bg-gray-900 rounded\" name=\"maintenance_submit\" id=\"add_member\" type=\"submit\">Submit</button>
                            </div>
                        </div>
                    </form><br><hr>";
                  }

                  while($result = mysqli_fetch_array($quary))
                  {
                      $u_name = $result['user_name'];
                      $flat = $result['flat_no'];
                      $amount = $result['amount'];
                      $des = $result['description'];

                      echo "<div class=\"bg-white border mt-2\">
                        <div>
                            <div class=\"d-flex flex-row justify-content-between align-items-center p-2 border-bottom\">
                                <div class=\"d-flex flex-row align-items-center feed-text px-2\"><img class=\"rounded-circle\" src=\"https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg\" width=\"45\">
                                    <div class=\"d-flex flex-column flex-wrap ml-2\"><span class=\"font-weight-bold\">".$u_name." ".$flat." ".$amount." Rs</span></div>
                                </div>
                            </div>
                        </div>
                        <div class=\"p-2 px-3\"><span>".$des."</span></div>";

                        if ($_SESSION['status'] == 'admin')
                        {
                          echo "<div class=\"d-flex justify-content-end socials p-2 py-3\"><button class=\"btn btn-danger\">Edit</button></div>";
                        }
                        echo "</div>
                      <br>";
                  }
                  ?>

                </main>
            <!--/Main-->

        </div>
        <!--Footer-->

        <!--/footer-->

    </div>

</div>


<!-- <script src="js/Maintenance_Input.js"></script> -->

</body>

</html>
