<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crime Database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <h1>Crime Database</h1>
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
   <center> <h2>Update into Reporter Database</h2></center>
 <br>
<?php
$con = mysqli_connect("127.0.0.1","root","","crimedatabase");
$sr="select * from current_id where type='upreport'";
$run_sr = mysqli_query($con,$sr);
$row_s=mysqli_fetch_array($run_sr);
$id=$row_s['c_id'];
$qr="select * from report where r_id='$id'";
$run_qr = mysqli_query($con,$qr);
$row=mysqli_fetch_array($run_qr);
$cid = $row['id'];
$crid=$row['r_id'];
$age=$row['age'];
$ca=$row['address'];
$cp=$row['phn'];
$cn=$row['name'];
?>
<form class="contact100-form validate-form">
    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Name</span>
        <input class="input100" type="text" name="name" placeholder=<?php echo $cn;?>>
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" >
        <span class="label-input100">Age</span>
        <input class="input100" type="text" name="age" placeholder=<?php echo $age;?>>
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Contact No is required">
        <span class="label-input100">Contact No</span>
        <input class="input100" type="text" name="phn" placeholder=<?php echo $cp;?>>
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" >
        <span class="label-input100">Address</span>
        <input class="input100" type="text" name="adrs" placeholder=<?php echo $ca;?>>
        <span class="focus-input100"></span>
    </div>
    <div class="container-contact100-form-btn">
        <button class="contact100-form-btn" name="submit"> Submit</button>
        <?php
        $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
        if(isset($_GET['submit'])){
            $name=htmlentities(mysqli_real_escape_string($con,$_GET['name']));
            $age=htmlentities(mysqli_real_escape_string($con,$_GET['age']));
            $adrs=htmlentities(mysqli_real_escape_string($con,$_GET['adrs']));
            $phn=htmlentities(mysqli_real_escape_string($con,$_GET['phn']));
           /* echo "$c_date * $c_detail * $c_place";*/
            if(strlen($name)>0){
                $insert="UPDATE report SET name='$name'where r_id='$crid'";
                $query = mysqli_query($con, $insert);}
            if(strlen($age)>0){
                $insert="UPDATE report SET age='$age'where r_id='$crid'";
                $query = mysqli_query($con, $insert);}
            if(strlen($adrs)>0){
                $insert="UPDATE report SET address='$adrs'where r_id='$crid'";
                $query = mysqli_query($con, $insert);}
            if(strlen($phn)>0){
                $insert="UPDATE report SET phn='$phn'where r_id='$crid'";
                $query = mysqli_query($con, $insert);}
             $sr="delete from current_id where type='upreport'";
            $run_sr = mysqli_query($con,$sr);
            echo "<script>window.open('update.blade.php?id=$c_id', '_self')</script>"; 
        }
        ?>
    </div>
</form>
</div>
<?php include 'footer.blade.php'?>

