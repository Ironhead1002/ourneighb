<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}

$id = $_SESSION['user_unique_id'];
$s_id = $_SESSION['society_unique_id'];
$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

$sql = "SELECT users.user_name, users.user_id, users.flat_no, helprequest.help_id, helprequest.help_body from users
        JOIN helprequest
        ON users.user_id=helprequest.user_id
        where helprequest.society_id = $s_id
        order by helprequest.date_created desc";

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
    <title>Help Section</title>
    <style type="text/css">
        .alert-span {
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
                    <form class="" method="post" onsubmit="return validation()" action="mainback.php" name="myform">
                        <p class="text-gray-800 font-medium text-center text-lg font-bold">Helpdesk</p>
                        <div class="row">

                            <div class="col-lg-6 col-md-2 col-sm-2 m-1">
                                <textarea id="discription" class="w-full  text-gray-700 bg-gray-200 rounded" name="help" rows="3" placeholder=" Description" cols="40"></textarea>
                                <span class="alert-span" id="e_discription">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 m-1">
                                <button class=" px-4 py-2  text-white font-light  bg-gray-900 rounded" name="help_submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form><br>

                    <hr>

                    <?php
                    while($result = mysqli_fetch_array($quary))
                      {
                          $des = $result['help_body'];
                          $u_name = $result['user_name'];
                          $flat = $result['flat_no'];

                          echo "<div class=\"bg-white border mt-2\">
                            <div>
                                <div class=\"d-flex flex-row justify-content-between align-items-center p-2 border-bottom\">
                                    <div class=\"d-flex flex-row align-items-center feed-text px-2\"><img class=\"rounded-circle\" src=\"https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg\" width=\"45\">
                                        <div class=\"d-flex flex-column flex-wrap ml-2\"><span class=\"font-weight-bold\">".$u_name." ".$flat."</span><span class=\"text-black-50 time\">40 minutes ago</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"p-2 px-3\"><span>".$des."</span></div>";

                          if ($result['user_id'] == $id)
                          {
                            echo "<a href=\"Edithelp.php?data=".$result['help_id']."&data2=help\"><div class=\"d-flex justify-content-end socials p-2 py-3\"><button class=\"btn btn-danger\">Edit</button></div></a>";
                          }
                          echo "</div>";
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

    <script src="./main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="js/discription.js"></script>

</body>

</html>
