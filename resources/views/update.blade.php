<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Crime Database</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<!-- Custom styles for this template -->
<link href="landingpage.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>


<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Criminal Database</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav"> 
    <?php
    $_GET['email']="admin@gmail.com";
    $email=$_GET['email'];
     if(isset($_GET['email'])){
      echo "
      <li class='nav-item'>
      <a class='nav-link' href='page.blade.php?email=$email'>Home</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='search.blade.php?email=$email'>Show Database</a>
      </li>";
      if($_GET['email']=="admin@gmail.com"){
      echo"
      <li class='nav-item'>
      <a class='nav-link' href='insert.blade.php?email=$email'>insert</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='update.blade.php'>update</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='delete.blade.php?email=$email'>delete</a>
      </li>" ;
        }
      }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.blade.php">Logout</a>
      </li> 
    </ul>
    </nav>
<div class="container mt-3">
   <center> <h2>Update into Crime Database</h2></center>
 <br>
</div>
 <div class="container">
  <h2>Crime Data :</h2>
  <form>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime id</th>
        <th>Crime detail</th>
        <th>Location</th>
        <th>Date</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from crime";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $cd = $row['detail'];
        $c_id=$row['c_id'];
        $dt=$row['c_date'];
        $pl=$row['place'];
     echo "<tr>
        <td>$c_id</td>
        <td>$cd</td>
        <td>$pl</td>
        <td>$dt</td>
        <td><input type='radio' name='radio' value='$c_id' ></td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
  <input style='float:right' class='btn btn-secondary' type='submit' name='update' value='update'>
  <?php if(isset($_GET['update'])){
   if(isset($_GET['radio'])){ echo $_GET['radio'];
   $cid=$_GET['radio'];
   $ins="insert into current_id(c_id,type) values('$cid','upcrime')";
   $run=mysqli_query($con,$ins);
   if($run){
   echo "<script>window.open('ucrime.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>

<div class="container">
  <h2>Criminal Data :</h2>
  <form>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime id</th>
        <th>Criminal id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from criminal";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $crid = $row['c_id'];
        $c_id=$row['id'];
        $age=$row['age'];
        $ca=$row['address'];
        $cj=$row['job'];
        $cp=$row['phn'];
        $cn=$row['name'];
     echo "<tr>
        <td>$c_id</td>
        <td>$crid</td>
        <td>$cn</td>
        <td>$age</td>
        <td>$cj</td>
        <td>$cp</td>
        <td>$ca</td>
        <td><input type='radio' name='radio1' value='$crid' ></td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
  <input style='float:right' class='btn btn-secondary' type='submit' name='update1' value='update'>
  <?php if(isset($_GET['update1'])){
   if(isset($_GET['radio1'])){ echo $_GET['radio1'];
   $cid=$_GET['radio1'];
   $ins="insert into current_id(c_id,type) values('$cid','upcriminal')";
   $run=mysqli_query($con,$ins);
   if($run){
    echo "<script>window.open('ucriminal.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>

<div class="container">
  <h2>Victim Data :</h2>
  <form>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime id</th>
        <th>Victim id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from victim";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $vid = $row['v_id'];
        $c_id=$row['id'];
        $age=$row['age'];
        $ca=$row['address'];
        $cj=$row['job'];
        $cp=$row['phn'];
        $cn=$row['name'];
     echo "<tr>
        <td>$c_id</td>
        <td>$vid</td>
        <td>$cn</td>
        <td>$age</td>
        <td>$cj</td>
        <td>$cp</td>
        <td>$ca</td>
        <td><input type='radio' name='radio2' value='$vid' ></td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
  <input style='float:right' class='btn btn-secondary' type='submit' name='update2' value='update'>
  <?php if(isset($_GET['update2'])){
   if(isset($_GET['radio2'])){ echo $_GET['radio2'];
   $cid=$_GET['radio2'];
   $ins="insert into current_id(c_id,type) values('$cid','upvictim')";
   $run=mysqli_query($con,$ins);
   if($run){
    echo "<script>window.open('uvictim.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>
<div class="container">
  <h2>Suspect Data :</h2>
  <form>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime id</th>
        <th>Suspect id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from suspect";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $sid = $row['s_id'];
        $c_id=$row['id'];
        $age=$row['age'];
        $ca=$row['address'];
        $cj=$row['job'];
        $cp=$row['phn'];
        $cn=$row['name'];
     echo "<tr>
        <td>$c_id</td>
        <td>$sid</td>
        <td>$cn</td>
        <td>$age</td>
        <td>$cj</td>
        <td>$cp</td>
        <td>$ca</td>
        <td><input type='radio' name='radio3' value='$sid' ></td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
  <input style='float:right' class='btn btn-secondary' type='submit' name='update3' value='update'>
  <?php if(isset($_GET['update3'])){
   if(isset($_GET['radio3'])){ echo $_GET['radio3'];
   $cid=$_GET['radio3'];
   $ins="insert into current_id(c_id,type) values('$cid','upsuspect')";
   $run=mysqli_query($con,$ins);
   if($run){
    echo "<script>window.open('ususpect.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>
<div class="container">
  <h2>Crime Reporter Data :</h2>
  <form>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime id</th>
        <th>Report id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from report";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $rid = $row['r_id'];
        $c_id=$row['id'];
        $age=$row['age'];
        $ca=$row['address'];
        $cp=$row['phn'];
        $cn=$row['name'];
     echo "<tr>
        <td>$c_id</td>
        <td>$rid</td>
        <td>$cn</td>
        <td>$age</td>
        <td>$cp</td>
        <td>$ca</td>
        <td><input type='radio' name='radio4' value='$rid' ></td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
  <input style='float:right' class='btn btn-secondary' type='submit' name='update4' value='update'>
  <?php if(isset($_GET['update4'])){
   if(isset($_GET['radio4'])){ echo $_GET['radio4'];
   $cid=$_GET['radio4'];
   $ins="insert into current_id(c_id,type) values('$cid','upreport')";
   $run=mysqli_query($con,$ins);
   if($run){
    echo "<script>window.open('ureport.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>
<?php include 'footer.blade.php'?>
</html>
