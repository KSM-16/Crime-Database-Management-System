<?php
    $con = mysqli_connect("127.0.0.1","root","","crimedatabase");
    $get_user="select * from c_user where type='users'";
    $run_user = mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    $email=$row['user'];
    $dlt="delete from c_user where user='$email'";
    $query = mysqli_query($con,$dlt);
    session_destroy();
    if($query){echo "<script>window.open('welcome.blade.php?email=$email', '_self')</script>";}
?>