<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}


$id = $_SESSION['user_unique_id'];
$s_id = $_SESSION['society_unique_id'];
$status = $_SESSION['status'];
$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

$sql = "SELECT amount,description,user_id,expense_id,expense_bill,bill_type,bill_name from expenses where society_id=$s_id order by date_created desc";
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
    <title>Expense</title>
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
                  <p class="text-gray-800 font-medium text-center text-lg font-bold">Expense</p>
                  <?php
                  $data = "Filename";
                  if($status == 'admin'){
                    echo "<form class=\"\" method=\"post\" onkeyup=\"return validation()\" name=\"myform\" action=\"mainback.php\" enctype=\"multipart/form-data\">
                        <div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-3 m-1\">
                                <input class=\" w-full px-5 py-2 text-gray-700 bg-gray-200 rounded\" id=\"expense\" name=\"amount_spend\" type=\"text\" required=\"\" placeholder=\"Amount\" aria-label=\"Name\">
                                <span class=\"alert-span\" id=\"e_expense\"></span>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 m-1\">
                                <textarea id=\"note\" class=\"w-full  text-gray-700 bg-gray-200 rounded\" name=\"note\" rows=\"2\" placeholder=\"Description\" cols=\"40\"></textarea>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 m-1\">
                                <input class=\"w-full  px-5 py-2 text-gray-700 bg-gray-200 rounded\" id=\"cus_name\" name=\"expense_bill\" type=\"file\" required=\"\" placeholder=\"\" aria-label=\"Name\">
                            </div>
                            <div class=\"col-lg-2 col-md-3 col-sm-3 m-1\">
                                <button class=\" px-4 py-2  text-white font-light  bg-gray-900 rounded\" name=\"expense_submit\" id=\"add_member\" value=\"".$data."\" type=\"submit\">Submit</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <hr>";
                  }
                  ?>

                  <?php
                  while($result = mysqli_fetch_array($quary))
                  {

                  echo "<div class=\"bg-white border mt-2\">
                    <div>
                        <div class=\"d-flex flex-row justify-content-between align-items-center p-2 border-bottom\">
                            <div class=\"d-flex flex-row align-items-center feed-text px-2\"><img class=\"rounded-circle\" src=\"https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg\" width=\"45\">
                                <div class=\"d-flex flex-column flex-wrap ml-2\"><span class=\"font-weight-bold\">".$result['amount']."Rs</span></div>
                            </div>
                        </div>
                    </div>
                    <div class=\"p-2 px-3\">".$result['description']."</span></div>
                    <div class=\"d-flex justify-content-end socials p-2 py-3\">";
                    if($status == 'admin'){
                      echo "<span><button class=\"btn btn-danger\">Edit</button></span>";
                    }
                    echo "<span class=\"pl-2\"><a class=\"btn btn-info\" href=\"download.php?filename=".$result['bill_name']."\">Download Bill</a></span></div>
                    </div>
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


    <script src="js/Expense_input.js"></script>

</body>

</html>
