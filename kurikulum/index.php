<?php
  session_start();
  if(@$_SESSION['kurikulum'] === "login"){
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kurikulum</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">

  </head>
  <body background="../wallpaper.jpg">
    <script src="../asset/js/jquery.js"></script> 
    <script src="../asset/js/popper.js"></script> 
    <script src="../asset/js/bootstrap.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="index.php">KURIKULUM | SMK WIKRAMA 1 GARUT</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="jadwal.php">Kelola Jadwal</a></li>
          <li class="nav-item"><a class="nav-link" href="super.php">Kelola Supervisor</a></li>
          <li class="nav-item"><a class="nav-link" href="laporan.php">Buat Laporan</a></li>
          <li class="nav-item"><a class="nav-link" onclick="return confirm('Anda Yakin?')" href="logout.php">Logout</a></li>
        </ul>
       
      </div>
    </nav>
<?php
  }else{
    echo "<script>alert('Login dahulu');document.location.href='../index.php'</script>";
  }
?>