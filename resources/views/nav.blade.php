<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crime Database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
<body>

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
    $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
    $get_user="select * from c_user where type='users'";
    $run_user = mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    $email=$row['user'];
     if(strlen($email)>1){
      echo "
      <li class='nav-item'>
      <a class='nav-link' href='page.blade.php?email=$email'>Home</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='search.blade.php?email=$email'>Show Database</a>
      </li>";
      if($email=="admin@gmail.com"){
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
  </div>  
</nav>