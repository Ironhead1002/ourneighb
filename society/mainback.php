<?php
session_start();

class RegisterLogin
{

  function loginUser()
  {
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="select * from users where email='$email' and password='$password' ";
    $quary = mysqli_query($con,$sql);
    $cnt = mysqli_num_rows($quary);

    if ($cnt>0)
    {
       while($row = mysqli_fetch_assoc($quary))
        {
              $so = $row['society_id'];
              $sql1="select * from societies where society_id=$so";
              $quary1 = mysqli_query($con,$sql1);
              $cnt1 = mysqli_num_rows($quary1);

              while($row1 = mysqli_fetch_assoc($quary1))
              {
                if($row1['application_status'] == 'Approved')
                {
                  $name = $row["user_name"];
                  $user_id = $row["user_id"];
      						$society_id = $row["society_id"];
                  $status = $row["authorization"];
                  $_SESSION['status']=$status;
      						$_SESSION['society_unique_id']=$society_id;
                  $_SESSION['user_unique_id'] = $user_id;
                  $_SESSION['user_name']=$name;
                  header("location:Dashboard.php");
                }
                else
                {
                  ?>
                  <script>
                   alert("Your society is not approved");
                    location.replace('index.php');
                  </script>
                  <?php
                }
              }
        }
    }
    else
    {
      ?>
      <script>
       alert("Something went wrong");
        location.replace('index.php');
      </script>
      <?php
    }
  }

  function registerUser()
  {
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $society_name = $_POST['society_name'];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
    $phone = $_POST['phoneNo'];
    $flat = $_POST['flatNo'];
    $password = $_POST['password'];
    $i_name = $_FILES['files']['name'];
    $fname = date("YmdHis").'_'.$i_name;
    $i_size=$_FILES['files']['size'];
    $i_type = $_FILES['files']['type'];
    $image = $_FILES['files']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $status = 'admin';

    $query  ="INSERT into societies(society_name,society_file,file_name,file_type) VALUES ('$society_name','$imgContent','$i_name','$fname')";
    $result   = mysqli_query($con, $query);

    if ($result)
    {
      $move =  move_uploaded_file($image,"upload/".$i_name);
      $society_id = mysqli_insert_id($con);
      $query = "INSERT into users(society_id,user_name,email,password,flat_no,contact,authorization) VALUES ($society_id,'$name','$email','$password','$flat','$phone','$status')";
      $result1   = mysqli_query($con, $query);

      if ($result)
      {
        ?>
        <script>
            alert ('You are Successfully Registered');
            location.replace('index.php');
        </script>
        <?php

      }
      else
      {
        ?>
        <script>
            alert ('Something Went Wrong!!');
            location.replace('register.php');
        </script>
        <?php
      }
    }
  }
}


class Complaints{
  function launch_complaint()
  {
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $des = $_POST['complaint'];
    $society_id = $_SESSION['society_unique_id'];
    $user_id = $_SESSION['user_unique_id'];

    $query  = "INSERT into complaints(society_id,body,user_id) VALUES ($society_id,'$des',$user_id)";
    $result   = mysqli_query($con, $query);

    if ($result)
    {
    ?>
        <script>
            alert ('Complaint created Successfully');
            location.replace('anonymous_Complaint.php');
        </script>
    <?php
    }
    else
    {
      ?>
      <script>
          alert ('Something Went wrong');
          location.replace('anonymous_Complaint.php');
      </script>
      <?php
    }
  }
}


class Notice{
  function createNotice(){
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $des = $_POST['notice'];
    $user_id = $_SESSION['user_unique_id'];
    $society_id = $_SESSION['society_unique_id'];

    $query  = "INSERT into noticies(society_id,user_id,description) VALUES ($society_id,$user_id,'$des')";
    $result   = mysqli_query($con, $query);

    if ($result)
    {
      ?>
        <script>
            alert ('Notice created Successfully');
            location.replace('Make_notice.php');
        </script>
        <?php
    }
    else
    {
      ?>
      <script>
          alert ('Something Went wrong');
          location.replace('Make_notice.php');
      </script>
      <?php
    }
  }
}


class HelpSection{
  function askForHelp(){
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $des = $_POST['help'];
    $user_id = $_SESSION['user_unique_id'];
    $society_id = $_SESSION['society_unique_id'];

    $query  = "INSERT into helprequest(user_id,society_id,help_body) VALUES ($user_id,$society_id,'$des')";
    $result   = mysqli_query($con, $query);

    if ($result)
    {
      ?>
        <script>
            alert ("Don't Worry Someone will help you soon");
            location.replace('Help_section.php');
        </script>
        <?php
    }
    else
    {
      ?>
      <script>
          alert ('Opps looks like we need help');
          location.replace('Help_section.php');
      </script>
      <?php
    }
  }
}


class Expense{
  function addExpense(){
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $des = $_POST['note'];
    $amt = $_POST['amount_spend'];

    $i_name = $_FILES['expense_bill']['name'];
    $fname = date("YmdHis").'_'.$i_name;
    $i_size=$_FILES['expense_bill']['size'];
    $i_type = $_FILES['expense_bill']['type'];
    $image = $_FILES['expense_bill']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $user_id = $_SESSION['user_unique_id'];
    $society_id = $_SESSION['society_unique_id'];


    $move =  move_uploaded_file($image,"upload/".$i_name);
    if($move){
      $query  = "INSERT into expenses(society_id,user_id,amount,description,expense_bill,bill_name,bill_type) VALUES ($society_id,$user_id,$amt,'$des','$imgContent','$i_name','$fname')";
      $result   = mysqli_query($con, $query);

      if ($result)
      {
        ?>
          <script>
              alert ("Expense Added Successfully");
              location.replace('Expense_input.php');
          </script>
          <?php
      }
      else
      {
        ?>
        <script>
            alert ('Something is wrong please try again');
            location.replace('Expense_input.php');
        </script>
        <?php
      }
    }
  }
}


class Maintenance{
  function addMaintenance(){
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $des = $_POST['note'];
    $amt = $_POST['amount'];
    $person_id = $_POST['person_id'];
    $user_id = $_SESSION['user_unique_id'];
    $society_id = $_SESSION['society_unique_id'];

    $query  = "INSERT into maintenance(society_id,user_id,amount,description) VALUES ($society_id,$person_id,$amt,'$des')";
    $result   = mysqli_query($con, $query);

    if ($result)
    {
      ?>
        <script>
            alert ("Maintenance Added Successfully");
            location.replace('Maintenance_input.php');
        </script>
        <?php
    }
    else
    {
      ?>
      <script>
          alert ('Something is wrong please try again');
          location.replace('Maintenance_input.php');
      </script>
      <?php
    }
  }
}


class Flats{
  function addFlats(){
    $con = mysqli_connect("localhost","root","","ourneighb") or die("connection failed");
    $names = $_POST['name'];
    $emails = $_POST['email'];
    $phones = $_POST['phoneNo'];
    $flats = $_POST['flatNo'];
    $passwords = $_POST['password'];
    $user_id = $_SESSION['user_unique_id'];
    $society_id = $_SESSION['society_unique_id'];
    $flag = 0;
    // print_r($names);
    // print_r($emails);
    // print_r($phones);
    // print_r($flats);
    // print_r($passwords);
    for($i=0, $count = count($names);$i<$count;$i++){
      $query  = "INSERT into users(society_id,user_name,email,password,flat_no,contact) VALUES ($society_id,'$names[$i]','$emails[$i]','$passwords[$i]','$flats[$i]','$phones[$i]')";
      $result   = mysqli_query($con, $query);

      if($result)
      {
        $flag = 1;
      }
      else
      {
        $flag = 0;
        break;
      }
   }

   if ($flag == 1)
   {
     ?>
       <script>
           alert ("Flats Added Successfully");
           location.replace('Maintenance_input.php');
       </script>
       <?php
   }
   else
   {
     ?>
     <script>
         alert ('Something is wrong please try again');
         location.replace('Maintenance_input.php');
     </script>
     <?php
   }
}
}


if(isset($_POST['submit'])){
  $logedin_user = new RegisterLogin();
  $logedin_user->loginUser();
}

if(isset($_POST['register_submit'])){
  $register_user = new RegisterLogin();
  $register_user->registerUser();
}

if(isset($_POST['complaint_submit'])){
  $user_complaint = new Complaints();
  $user_complaint->launch_complaint();
}

if(isset($_POST['notice_submit'])){
  $user_notice = new Notice();
  $user_notice->createNotice();
}

if(isset($_POST['help_submit'])){
  $user_help = new HelpSection();
  $user_help->askForHelp();
}

if(isset($_POST['expense_submit'])){
  $user_expense = new Expense();
  $user_expense->addExpense();
}

if(isset($_POST['maintenance_submit'])){
  $user_maintenance = new Maintenance();
  $user_maintenance->addMaintenance();
}


if(isset($_POST['flat_submit'])){
  $user_flat = new Flats();
  $user_flat->addFlats();
}
?>
