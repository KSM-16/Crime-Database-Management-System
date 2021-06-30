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
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
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
   <center> <h2>Insert into Crime Database</h2></center>
 <br>
<form class="contact100-form validate-form">
    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Name</span>
        <input class="input100" type="text" name="name" placeholder="Enter Suspect's name">
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" >
        <span class="label-input100">Age</span>
        <input class="input100" type="text" name="age" placeholder="Enter suspect's age">
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Contact No is required">
        <span class="label-input100">Contact No</span>
        <input class="input100" type="text" name="v_phn" placeholder="Enter mobile no">
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" >
        <span class="label-input100">Job</span>
        <input class="input100" type="text" name="job" placeholder="Suspect's job">
        <span class="focus-input100"></span>
    </div>
    <div class="wrap-input100 rs1-wrap-input100 validate-input" >
        <span class="label-input100">Address</span>
        <input class="input100" type="text" name="v_adrs" placeholder="Suspect's address">
        <span class="focus-input100"></span>
    </div>
    <div class="container-contact100-form-btn">
        <button class="contact100-form-btn" name="submit"> Submit</button>
    </div><br><br><br>
    <div class="container-contact100-form-btn">
        <div><h3>Any more Suspect?</h3></div><br> <br>
       <span> <button class="contact100-form-btn" name="no">no</button></span>
    </div>
        <?php
        $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
        if(isset($_GET['no'])){
          global $con;
          $get_user="delete from current_id where type='sinsert'";
          $run_user = mysqli_query($con,$get_user);
          echo "<script>window.open('criminal.blade.php', '_self')</script>";
        }
        $get_user="select * from current_id where type='insert' or type='sinsert'";
        $run_user = mysqli_query($con,$get_user);
        $row=mysqli_fetch_array($run_user);
        $c_id=$row['c_id'];
        if(isset($_GET['submit'])){
            $s_name=htmlentities(mysqli_real_escape_string($con,$_GET['name']));
            $s_age=htmlentities(mysqli_real_escape_string($con,$_GET['age']));
            $s_job=htmlentities(mysqli_real_escape_string($con,$_GET['job']));
            $s_phn=htmlentities(mysqli_real_escape_string($con,$_GET['v_phn']));
            $s_adrs=htmlentities(mysqli_real_escape_string($con,$_GET['v_adrs']));
            if(strlen($s_name)>0 and strlen($s_age)>0 and strlen($s_phn)>10 and strlen($s_adrs) and strlen($s_job)>0){
                $insert="insert into suspect(id,name,address,phn,age,job) 
                values('$c_id','$s_name','$s_adrs','$s_phn','$s_age','$s_job')";
                $query = mysqli_query($con, $insert);
                if($query){
                  if(isset($_GET['no'])){
                    $get_user="delete from current_id where type='sinsert'";
                    $run_user = mysqli_query($con,$get_user);
                    echo "<script>window.open('criminal.blade.php', '_self')</script>";
                  }
                    else{echo "<script>window.open('suspect.blade.php', '_self')</script>";}
                }
            }
        }
        ?>
</form>
</div>
<?php include 'footer.blade.php'?>
</html>
