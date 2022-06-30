<?php
  session_start();
  require '../library/controller.php';
  if(@$_SESSION['kurikulum'] === "login"){
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<?php
  if(isset($_GET['hapus'])){
    $hapus = new controller("localhost","root","","supervisor");
    $hapus->delete("jadwal","id",$_GET['hapus'],"jadwal.php","berhasil","gagal");
  }
  if(isset($_GET['upload'])){
    $upload = new controller("localhost","root","","supervisor");
    $field = ["id","nama_mapel","nama","username","password","kelas"];
    $value = [$_POST['id'],$_POST['mapel'],$_POST['guru'],$_POST['username'],$_POST['password'],$_POST['kelas']];
    $upload->insert("jadwal",$field,$value,"jadwal.php","Berhasil","Gagal");
  }
  if(isset($_GET['update'])){
    $update = new controller("localhost","root","","supervisor");
    $data = ["nama_mapel"=>$_POST['nama_mapel'],"nama"=>$_POST['guru'],"username"=> $_POST['username'],"password"=>$_POST['password'],"kelas"=>$_POST['kelas']];
    $update->update("jadwal",$data,"id",$_POST['id'],"jadwal.php","berhasil","gagal");
  }
?>
<body>
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
	<div class="container">
		<div class="card" style="margin : 3rem auto 8.1rem auto !important">
      <div class="card-header">
        <h1>Jadwal Guru</h1>
      <a href="?tambah"><input type="button" value="Tambah" class="btn btn-info"></a>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tr class="thead-dark">
            <th>Id</th>
            <th>Nama Mapel</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Kelas</th>
            <th colspan="2">opsi</th>
          </tr>
          <?php
            $jadwal = new controller("localhost","root","","supervisor");
            $result = $jadwal->select("jadwal");
            foreach($result as $key){
          ?>
          <tr>
            <td><?php echo $key['id'] ?></td>
            <td><?php echo $key['nama_mapel']?></td>
            <td><?php echo $key['nama'] ?></td>
            <td><?php echo $key['username']?></td>
            <td><?php echo $key['password']?></td>
            <td><?php echo $key['kelas'] ?></td>
            <td><a href="?edit=<?php echo $key['id'] ?>"><input type="button" class="btn btn-info" value="Edit" name=""></a></td>
            <td><a href="?hapus=<?php echo $key['id'] ?>"><input type="button" class="btn btn-danger" value="Hapus" name=""></a></td>
          </tr>
          <?php
            }
          ?>
        </table>
      </div>
          <?php if(isset($_GET['tambah'])){ ?>
            
        <div class="card body">
            <form action="?upload" method="post">
            <label for="id">Id</label>
            <input type="text" name="id" class="form-control">
            <label for="nama_mapel">Nama Mapel</label>
            <input type="text" name="mapel" class="form-control">
            <label for="guru">Nama Guru</label>
            <input type="text" name="guru" class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
            <label for="Password">Password</label>
            <input type="text" name="password" class="form-control">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" class="form-control">
        <div>
        <div class="card body">
            <center><input type="submit" value="update" class="btn btn-info"></center>
        </div>
        </form>
      </div>
      <?php } ?>
          <?php 
            if(isset($_GET['edit'])){  
            $edit = new controller("localhost","root","","supervisor");
            $key = $edit->edit("jadwal","id",$_GET['edit']);
          ?>
          
        <div class="card-body">
            <form action="?update" method="post">
            <label for="id">Id</label>
            <input type="text" readonly name="id" value="<?php echo $key['id'] ?>" class="form-control">
            <label for="nama_mapel">Nama Mapel</label>
            <input type="text" name="nama_mapel" value="<?php echo $key['nama_mapel'] ?>" class="form-control">
            <label for="guru">Nama Guru</label>
            <input type="text" name="guru" value="<?php echo $key['nama'] ?>" class="form-control">
            <label for="guru">Username</label>
            <input type="text" name="username" value="<?php echo $key['username'] ?>" class="form-control">
            
            <label for="">Password</label>
            <input type="text" value="<?php echo $key['password'] ?>" name="password" class="form-control">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" value="<?php echo $key['kelas'] ?>" class="form-control">
        <div>
        <div class="card-footer">
            <center><input type="submit" value="update" class="btn btn-success"></center>
        </div>
        </form>
            <?php } ?>
      </div>
	</div>
</body>
</html>
<?php
  }else{
    echo "<script>alert('Login dahulu');document.location.href='../index.php'</script>";
  }
?>