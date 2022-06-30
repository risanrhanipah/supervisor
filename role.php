<?php
require 'library/controller.php';
session_start();
$login = new controller("localhost","root","","supervisor");
if($_POST['role'] == "guru"){
   $auth = ['username'=>$_POST['username'],'password'=>$_POST['password']];
   $log = $login->login("jadwal",$auth);
   if($log > 0){
      $_SESSION['guru'] = $_POST['username'];
      echo "<script>alert('berhasil');document.location.href='guru'</script>";
   }else{
      echo "<script>alert('gagal');document.location.href='index.php'</script>";
   }
}elseif($_POST['role'] == "kepala"){
   $auth = ['username'=> $_POST['username'],"password"=>$_POST['password']];
   $log = $login->login("admin",$auth);
   if($log > 0){
      $_SESSION['kepala'] = "login";
      echo "<script>alert('berhasil');document.location.href='kepala'</script>";
   }else{
      echo "<script>alert('gagal');document.location.href='index.php'</script>";
   }
}elseif($_POST['role'] == "kurikulum"){
   $auth = ['username'=> $_POST['username'],"password"=>$_POST['password']];
   $log = $login->login("admin",$auth);
   if($log > 0){
      $_SESSION['kurikulum'] = "login";
      echo "<script>alert('berhasil');document.location.href='kurikulum'</script>";
   }else{
      echo "<script>alert( 'gagal');document.location.href='index.php'</script>";
   }
}elseif($_POST['role'] == "super"){
   $auth = ['email'=> $_POST['username'],"password"=>$_POST['password']];
   $log = $login->login("login",$auth);
   if($log > 0){
      $_SESSION['super'] = $_POST['username'];
      echo "<script>alert('berhasil');document.location.href='supervisor'</script>";
   }else{
      echo "<script>alert('gagal');document.location.href='index.php'</script>";
   }
}
?>