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
$sql = "SELECT maintenance.amount, maintenance.description, users.user_name, users.flat_no from users
        JOIN maintenance
        ON users.user_id = maintenance.user_id
        where users.society_id=$s_id order by maintenance.date_created desc";
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
              <div class="form-outline mb-4">
                <input type="search" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search...">
              </div>
              <div id='printable'>
                  <?php
                  while($result = mysqli_fetch_array($quary))
                  {
                      $u_name = $result['user_name'];
                      $flat = $result['flat_no'];
                      $amount = $result['amount'];
                      $des = $result['description'];

                      echo "<div id=\"impdiv\" class=\"bg-white border mt-2 impdiv\">
                        <div>
                            <div class=\"d-flex flex-row justify-content-between align-items-center p-2 border-bottom\">
                                <div class=\"d-flex flex-row align-items-center feed-text px-2\"><img class=\"rounded-circle\" src=\"https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg\" width=\"45\">
                                    <div id=\"impdivagain\" class=\"d-flex flex-column flex-wrap ml-2 impdivagain\"><span class=\"font-weight-bold\">".$u_name." ".$flat." ".$amount." Rs</span></div>
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
                  echo "<center><a href=\"#null\" class=\" px-4 py-2  text-white font-light  bg-gray-900 rounded\" onclick=\"printContent('printable')\">Print</a></center>";
                  ?>
                </div>
                </main>
            <!--/Main-->

        </div>
        <!--Footer-->

        <!--/footer-->

    </div>

</div>


<!-- <script src="js/Maintenance_Input.js"></script> -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toLowerCase();
  tr = document.getElementsByClassName('impdivagain');
  for (i = 0; i < tr.length; i++) {
      if (tr[i].innerText.toLowerCase().includes(filter))
      {
        console.log(tr[i].innerText);
        document.getElementsByClassName("impdiv")[i].style.display = "block";
      }
      else
      {
        console.log('Else');
        document.getElementsByClassName("impdiv")[i].style.display = "none";
      }
    }
  }

  function printContent(id){
  str=document.getElementById(id).innerHTML
  newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
  newwin.document.write('<HTML>\n<HEAD>\n')
  newwin.document.write('<link rel=\"stylesheet\" href=\"./dist/styles.css\">')
  newwin.document.write('<link rel=\"stylesheet\" href=\"./dist/all.css\">')
  newwin.document.write('<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">')
  newwin.document.write('<link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i\" rel=\"stylesheet\">')
  newwin.document.write('<TITLE>Print Page</TITLE>\n')
  newwin.document.write('<script>\n')
  newwin.document.write('function chkstate(){\n')
  newwin.document.write('if(document.readyState=="complete"){\n')
  newwin.document.write('window.close()\n')
  newwin.document.write('}\n')
  newwin.document.write('else{\n')
  newwin.document.write('setTimeout("chkstate()",2000)\n')
  newwin.document.write('}\n')
  newwin.document.write('}\n')
  newwin.document.write('function print_win(){\n')
  newwin.document.write('window.print();\n')
  newwin.document.write('chkstate();\n')
  newwin.document.write('}\n')
  newwin.document.write('<\/script>\n')
  newwin.document.write('</HEAD>\n')
  newwin.document.write('<BODY onload="print_win()">\n')
  newwin.document.write(str)
  newwin.document.write('</BODY>\n')
  newwin.document.write('</HTML>\n')
  newwin.document.close()
  }
  //-->

</script>
</body>
</html>
