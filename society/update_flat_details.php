<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}

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

                    <div class="flex flex-col">
                        <form class="" method="post" onkeyup="return validation()" action="mainback.php" name="myform">
                            <p class="text-gray-800 font-medium text-center text-lg font-bold">Add Flat</p>
                            <div id="addDetails">
                                <div class="row pt-3">
                                    <div class="col-lg-4 col-md-4 col-sm-6 m-1">
                                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="username" name="name[]" type="text" placeholder="User Name">
                                        <span class="span" id="c_name"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 m-1">
                                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email[]" type="email" placeholder="Email">
                                        <span class="span" id="c_email"></span>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 m-1">
                                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="phoneNo" name="phoneNo[]" type="text" placeholder="Phone No">
                                        <span class="span" id="c_phone"></span>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-lg-4 col-md-4 col-sm-6 m-1">
                                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="flayNo" name="flatNo[]" type="text" placeholder="Flat No">
                                        <span class="span" id="c_flatNO"></span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 m-1">
                                        <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password[]" type="password" required="" placeholder="*******" aria-label="password">
                                        <span class="span" id="c_pass"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-6 m-1 d-flex justify-content-between pt-4">
                                    <button class=" px-4 py-2 pl-5 pr-5 text-white font-light mr-2  bg-gray-900 rounded" name="submit" id="add_flat" value=$data type="button">Add</button>
                                    <button class=" px-4 py-2 pl-5 pr-5 text-white font-light ml-2  bg-gray-900 rounded"  id="remove_flat"  type="button">Remove</button>
                                </div>

                            </div>
                            <br>
                            <input type="submit" name="flat_submit" class=" px-4 py-2 pl-5 pr-5 text-white font-light mr-2  bg-gray-900 rounded" value="Submit">
                        </form><br>
                    </div>
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
