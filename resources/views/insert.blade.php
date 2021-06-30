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
<?php include 'nav.blade.php'?>

<div class="container mt-3">
   <center> <h2>Insert into Crime Database</h2></center>
 <br>
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
        <th>Add</th>
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
  <input class='btn btn-secondary' type='submit' name='upcr' value='Add criminal'>
  <input class='btn btn-secondary' type='submit' name='upsu' value='Add suspect'>
  <input class='btn btn-secondary' type='submit' name='upvi' value='Add victim'>
  <input class='btn btn-secondary' type='submit' name='upre' value='Add reporter'>
  <?php if(isset($_GET['upcr'])){
   if(isset($_GET['radio'])){ echo $_GET['radio'];
   $cid=$_GET['radio'];
   $ins="insert into current_id(c_id,type) values('$cid','cinsert')";
   $run=mysqli_query($con,$ins);
   if($run){
   echo "<script>window.open('criminal.blade.php', '_self')</script>";}
   }/* else {echo "nnn "; }*/
}
if(isset($_GET['upvi'])){
    if(isset($_GET['radio'])){ echo $_GET['radio'];
    $cid=$_GET['radio'];
    $ins="insert into current_id(c_id,type) values('$cid','vinsert')";
    $run=mysqli_query($con,$ins);
    if($run){
    echo "<script>window.open('victim.blade.php', '_self')</script>";}
    }/* else {echo "nnn "; }*/
 }
 if(isset($_GET['upsu'])){
    if(isset($_GET['radio'])){ echo $_GET['radio'];
    $cid=$_GET['radio'];
    $ins="insert into current_id(c_id,type) values('$cid','sinsert')";
    $run=mysqli_query($con,$ins);
    if($run){
    echo "<script>window.open('suspect.blade.php', '_self')</script>";}
    }/* else {echo "nnn "; }*/
 }
 if(isset($_GET['upre'])){
    if(isset($_GET['radio'])){ echo $_GET['radio'];
    $cid=$_GET['radio'];
    $ins="insert into current_id(c_id,type) values('$cid','rinsert')";
    $run=mysqli_query($con,$ins);
    if($run){
    echo "<script>window.open('reporter.blade.php', '_self')</script>";}
    }/* else {echo "nnn "; }*/
 }
/* else {echo "**** "; }*/?>
 </form>
</div>
<br>
<br>
<h3>Insert new crime : </h3> <br>
<form class="contact100-form validate-form">
    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="date is required">
        <span class="label-input100">Crime date</span>
        <input class="input100" type="text" name="crime_date" placeholder="Enter crime date">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 rs1-wrap-input100 validate-input">
        <span class="label-input100">Location</span>
        <input class="input100" type="text" name="c_place" placeholder="Where did the crime occur?">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Description is required">
        <span class="label-input100">Details</span>
        <textarea class="input100" name="details" placeholder="Describe the crime"></textarea>
        <span class="focus-input100"></span>
    </div>

    <div class="container-contact100-form-btn">
        <button class="contact100-form-btn" name="submit"> Submit</button>
        <?php
        $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
        if(isset($_GET['submit'])){
            $c_date=htmlentities(mysqli_real_escape_string($con,$_GET['crime_date']));
            $c_place=htmlentities(mysqli_real_escape_string($con,$_GET['c_place']));
            $c_detail=htmlentities(mysqli_real_escape_string($con,$_GET['details']));
            if(strlen($c_date)>0 and strlen($c_detail)>0 and strlen($c_place)>0){
                $insert="insert into crime(place,detail,c_date) values('$c_place','$c_detail','$c_date')";
                $query = mysqli_query($con, $insert);
                if($query){
                    $get_user="select c_id from crime where place='$c_place' and detail='$c_detail'";
                    $run_user = mysqli_query($con,$get_user);
                    $row=mysqli_fetch_array($run_user);
                    $c_id=$row['c_id'];
                    $ins="insert into current_id(c_id,type) values('$c_id','insert')";
                    $run_user = mysqli_query($con,$ins);
                    echo "<script>window.open('reporter.blade.php?id=$c_id', '_self')</script>";
                }else{
                    echo "<script>alert('Data insertion failed! Try again.')</script>";
                }
            }
        }
        ?>
    </div>
</form>
</div>
<?php include 'footer.blade.php'?>

