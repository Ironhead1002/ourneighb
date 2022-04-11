<?php
$con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

$sql = "SELECT * from societies order by date_created desc";
$quary = mysqli_query($con,$sql);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .container {
                padding: 2rem 0rem;
                }

                h4 {
                margin: 2rem 0rem 1rem;
                }

                .table-image {
                td, th {
                  vertical-align: middle;
                }
                }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Sr.</th>
                <th scope="col">Date Created</th>
                <th scope="col">Society Name</th>
                <th scope="col">Application Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sr = 1;
              while($result = mysqli_fetch_array($quary))
              {
                $date = $result['date_created'];
                $s_name = $result['society_name'];
                $st = $result['application_status'];
                echo "<tr>
                  <th scope=\"row\">$sr</th>
                  <td>$date</td>
                  <td>$s_name</td>
                  <td>$st</td>
                  <td>
                    <a href=\"download.php?filename=".$result['file_name']."\"><button type=\"button\" name=\"download\" class=\"btn btn-primary\">Download Files</button></a>
                    <a href=\"approve.php?data=".$result['society_id']."\"><button type=\"button\" name=\"accept\" class=\"btn btn-success\">Accept</button></a>
                    <a href=\"reject.php?data=".$result['society_id']."\"><button type=\"button\" name=\"reject\" class=\"btn btn-danger\">Reject</button></a>
                  </td>
                </tr>";
                $sr += 1;
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </body>
</html>
