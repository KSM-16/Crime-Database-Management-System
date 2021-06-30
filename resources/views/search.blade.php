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
  
  </style>
</head>
<?php include 'nav.blade.php'?>
<body>
<br>
<div class="container">
  <h2>Crime Data :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime</th>
        <th>Criminal</th>
        <th>Victim</th>
        <th>Location</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
    /*  $qr="select crime.c_id,detail,criminal.name as cname,criminal.age as cage,victim.age as vage,victim.name as vname
      ,place,c_date from( crime ,victim ,criminal )  where (crime.c_id=victim.id and crime.c_id=criminal.id)";*/
      $qr="call demo()";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $cd = $row['detail'];
        $va=$row['vage'];
        $ca=$row['cage'];
        $vn=$row['vname'];
        $cn=$row['cname'];
        $dt=$row['c_date'];
        $pl=$row['place'];
     echo" <tr>
        <td>$cd</td>
        <td>$cn ($ca)</td>
        <td>$vn ($va)</td>
        <td>$pl</td>
        <td>$dt</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Crime & Criminal Data :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
      <th>Crime</th>
        <th>Location</th>
        <th>Date</th>
        <th>Criminal</th>
        <th>Age</th>
        <th>Address</th>
        <th>Contact No</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select id,criminal.c_id as criminal_id,name,detail,place,c_date,age,address,phn from crime inner join criminal 
      on crime.c_id=criminal.id order by c_date desc ";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $cd = $row['detail'];
        $cad=$row['address'];
        $ca=$row['age'];
        $cp=$row['phn'];
        $cn=$row['name'];
        $dt=$row['c_date'];
        $pl=$row['place'];
     echo" <tr>
        <td>$cd</td>
        <td>$pl</td>
        <td>$dt</td>
        <td>$cn</td>
        <td>$ca</td>
        <td>$cad</td>
        <td>$cp</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Victim & Suspect Data :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Victim</th>
        <th>Victim's address</th>
        <th>Victim's phone no</th>
        <th>Suspect</th>
        <th>Suspect's address</th>
        <th>Suspect's phone no</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select id,s.name as sn,s.age as sa,s.address as sd,s.phn as sp,v.name as vn,v.age as va,v.address as vd,
      v.phn as vp from suspect as s join victim as v using(id)";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $vd=$row['vd'];
        $va=$row['va'];
        $vp=$row['vp'];
        $vn=$row['vn'];
        $sd=$row['sd'];
        $sa=$row['sa'];
        $sp=$row['sp'];
        $sn=$row['sn'];
     echo" <tr>
        <td>$vn ($va) </td>
        <td>$vd</td>
        <td>$vp</td>
        <td>$sn ($sa)</td>
        <td>$sd</td>
        <td>$sp</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Victim under 18 :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Victim</th>
        <th>Age</th>
        <th>Address</th>
        <th>Contact no</th>
        <th>Job</th>
        <th>Affectded</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select id,detail,v.name as vn,v.age as va,v.address as vd,job,
      v.phn as vp from crime join victim as v on crime.c_id=v.id where age<=18 order by age asc ";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $vd=$row['vd'];
        $va=$row['va'];
        $vp=$row['vp'];
        $vn=$row['vn'];
        $cd=$row['detail'];
        $vj=$row['job'];
     echo" <tr>
        <td>$vn</td>
        <td>$va</td>
        <td>$vd</td>
        <td>$vp</td>
        <td>$vj</td>
        <td>$cd</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Criminal of max age and min age :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Criminal</th>
        <th>Age</th>
        <th>Address</th>
        <th>Contact no</th>
        <th>Job</th>
        <th>Crime</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select * from criminal where age=(select max(age) from criminal)";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $id=$row['id'];
        $vd=$row['address'];
        $va=$row['age'];
        $vp=$row['phn'];
        $vn=$row['name'];
        $vj=$row['job'];
        $sr="select detail from crime where c_id='$id'";
        $run_sr = mysqli_query($con,$sr);
        $run=mysqli_fetch_array($run_sr);
        $cd=$run['detail'];
     echo" <tr>
        <td>$vn</td>
        <td>$va</td>
        <td>$vd</td>
        <td>$vp</td>
        <td>$vj</td>
        <td>$cd</td>
      </tr>";
      }
      $qr="select * from criminal where age=(select min(age) from criminal)";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $id=$row['id'];
        $vd=$row['address'];
        $va=$row['age'];
        $vp=$row['phn'];
        $vn=$row['name'];
        $vj=$row['job'];
        $sr="select detail from crime where c_id='$id'";
        $run_sr = mysqli_query($con,$sr);
        $run=mysqli_fetch_array($run_sr);
        $cd=$run['detail'];
     echo" <tr>
        <td>$vn</td>
        <td>$va</td>
        <td>$vd</td>
        <td>$vp</td>
        <td>$vj</td>
        <td>$cd</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Cases having more than one suspect :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime</th>
        <th>Place</th>
        <th>Date</th>
        <th>No of Suspect</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select COUNT(id) as ci,id from suspect GROUP BY id HAVING COUNT(id)>1 ORDER BY id;";
      $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $ci=$row['ci'];
        $id=$row['id'];
        $sr="select * from crime where c_id='$id'";
        $run_sr = mysqli_query($con,$sr);
        $run=mysqli_fetch_array($run_sr);
        $vn=$run['c_date'];
        $cd=$run['detail'];
        $vj=$run['place'];
     echo" <tr>
        <td>$cd</td>
        <td>$vj</td>
        <td>$vn</td>
        <td>$ci</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Criminal & Suspect :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Contact no</th>
        <th>Address</th>
        <th>Job</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select DISTINCT name,phn,address,age,job from suspect union select DISTINCT name,phn,address,age,job 
      from criminal";
      $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $vd=$row['address'];
        $va=$row['age'];
        $vp=$row['phn'];
        $vn=$row['name'];
        $vj=$row['job'];
     echo" <tr>
     <td>$vn</td>
     <td>$va</td>
     <td>$vp</td>
     <td>$vd</td>
     <td>$vj</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h2>Time since reporting :</h2>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Crime detail</th>
        <th>Location</th>
        <th>Date</th>
        <th>Year difference</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
      $qr="select detail,c_date,place,fnc(c_date) as fy from crime";
       $run_qr = mysqli_query($con,$qr);
      while($row=mysqli_fetch_array($run_qr)){
        $cd = $row['detail'];
        $dt=$row['c_date'];
        $pl=$row['place'];
        $dy=$row['fy'];
     echo "<tr>
        <td>$cd</td>
        <td>$pl</td>
        <td>$dt</td>
        <td>$dy</td>
      </tr>";
    }
    ?>
    </tbody>
  </table>
</div>
<br>
</body>
<?php include 'footer.blade.php'?>
</html>
