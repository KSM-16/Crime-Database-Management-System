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

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="landingpage.min.css" rel="stylesheet">
  <style>
   <?php include 'landingpage.min.css' ?> 
   <?php include 'landingpage.css'?>

  </style>

</head>

<body>
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Crime Database</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-sm-12">
                <input type="email" name="email" class="form-control form-control-lg" required="required"
                 placeholder="Enter your email..."><br>
                <input type="password" name="pass" class="form-control form-control-lg" required="required"
                placeholder="Enter your password..."><br>
                <button type="submit"  name="login" class="btn btn-lg btn-primary">Sign in</button>
                <?php
                if (isset($_GET['login'])) {
                  $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
                  $email = htmlentities(mysqli_real_escape_string($con, $_GET['email']));
                  $pass = htmlentities(mysqli_real_escape_string($con, $_GET['pass']));
                  $select_user = "select * from users where email='$email' AND password='$pass'";
                  $query= mysqli_query($con, $select_user);
                  $check_user = mysqli_num_rows($query);
                  if($check_user == 1){
                    session_start();
                    $_SESSION['email'] = $email;
                    $_GET['email'] = $email;
                    $insert="insert into c_user(user,type) values('$email','users')";
                    $run_user = mysqli_query($con,$insert);
                    echo "<script>window.open('page.blade.php?email=$email', '_self')</script>";
                  }
                  else{
                    echo "<script>alert('Your Email or Password is incorrect')</script>";
                  }
                  }
                ?>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Search Crime Data</h3>
            <p class="lead mb-0">Look for datbase!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Bring Justice</h3>
            <p class="lead mb-0">Find criminals!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Stop Crime</h3>
            <p class="lead mb-0">prevent crime!</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer bg-light">
  <section class="call-to-action text-white text-center">
  <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <section>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\project\resources\views/welcome.blade.php ENDPATH**/ ?>