<?php
session_start();
if ($_SESSION['user_name'] == true) {
} else {
    header('location:index.php');
}

$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

if(isset($_POST['submit'])){
$new_val = $_POST['editnote'];

$type_id = $_GET['data'];
$sql = "UPDATE helprequest SET help_body = '$new_val' where help_id = $type_id";
$result   = mysqli_query($con, $sql);

if ($result)
{
  ?>
    <script>
        alert ("Edited Successfully");
        location.replace('Help_section.php');
    </script>
    <?php
}
else
{
  ?>
  <script>
      alert ('Something went wrong');
      location.replace('Help_section.php');
  </script>
  <?php
}


}

$type_id = $_GET['data'];
$sql = "SELECT help_body from helprequest where help_id = $type_id";
$quary = mysqli_query($con,$sql);

while($result = mysqli_fetch_array($quary))
{
  $val = $result['help_body'];
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
      <title>Edit Help</title>
      <style type="text/css">
          .alert-span{
              color: red;
          }
          textarea {
          border:2px solid black;
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

              <!--/Sidebar-->
              <!--/Main-->
              <div class="container mx-auto h-full flex flex-1 justify-center items-center p-5">
                  <div class="w-full max-w-lg">
                      <div class="leading-loose">
                          <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl"  method="POST" onsubmit="return validation()" name="myform" action="">
                              <p class="text-gray-800 font-medium text-center text-lg font-bold">Help Section</p>


                              <div class="mt-2"  id="add_field">
                                  <label class="block text-sm text-gray-00 font-weight-bold" for="cus_email">Discription</label>
                                  <textarea id="discription" name="editnote" rows="4"  cols="50" value="<?php echo $val ?>"><?php echo $val ?></textarea>
                                  <span class="alert-span" id="e_discription">
                              </div>

                              <div class="mt-4 items-center justify-between text-center">
                                  <input type="submit" class="px-4 py-1 mt-3 text-white font-light tracking-wider bg-gray-900 rounded" name="submit" value="Submit">
                                  <br>
                              </div>

                          </form>
                      </div>
                  </div>
              </div>
              <!--/Main-->

          </div>
          <!--Footer-->

          <!--/footer-->

      </div>

  </div>

  <script src="./main.js"></script>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
  </script>
  <script src="js/discription.js"></script>

  </body>

  </html>
<?php
}



?>
