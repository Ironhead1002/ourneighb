
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Society Details</title>
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
                    <!-- Stats Row Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 d-flex">

                      

                        
                    </div>
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
</body>

</html>