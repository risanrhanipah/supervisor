<?php
	session_start();
	if(isset($_SESSION['super'])){

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<?php
if(isset($_GET['upload'])){
	if($_POST['radio'] == "terima"){
		require '../library/controller.php';
		$terima = new controller("localhost","root","","supervisor");
		$field = ['tanggal','nama','file','deskripsi'];
		$value = [$_POST['tanggal'],$_POST['nama'],$_POST['file'],$_POST['deskripsi']];
		$terima->insert("laporan",$field,$value,"","","");
		$status = ['status'=>'<h5 style="color : green">terima</h5>',"pesan"=>""];
		$terima->update("upload",$status,"file",$_POST['file'],"index.php","berhasil","gagal");
	}else{
		require '../library/controller.php';
		$tolak = new controller("localhost","root","","supervisor");
		$status = ['status'=>'<h5 style="color : red">tolak</h5>','pesan'=>$_POST['deskripsi']];
		$tolak->update("upload",$status,"file",$_POST['file'],"index.php","berhasil","gagal");
	}
}

?>
<body>
	<script src="../asset/js/jquery.js"></script> 
	<script src="../asset/js/popper.js"></script> 
	<script src="../asset/js/bootstrap.js"></script>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<a class="navbar-brand" href="index.php">SUPERVISOR | SMK WIKRAMA 1 GARUT</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link"><?php echo $_SESSION['super'] ?></a></li>
				<li class="nav-item"><a class="nav-link" onclick="return confirm('Logout?')" href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="card" style="margin : 3rem auto 8.1rem auto !important">
			<div class="card-header bg-info text-light">
				<h2>Dokumen Pembelajaran</h2>
			</div>
			<div class="card-body">
			<table class="table">
					<tr class="thead-dark">
						<th>tanggal</th>
						<th>nama pelajaran</th>
						<th>guru</th>
						<th>nilai</th>
						<th>file</th>
						<th>status</th>
						<th colspan="2">opsi</th>
					</tr>
					<?php
						require "../library/controller.php";
						$guru = new controller("localhost","root","","supervisor");
						$result = $guru->select("upload");
						while($data = mysqli_fetch_array($result)){

					?>
					<tr>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['mapel'] ?></td>
						<td><?php echo $data['guru'] ?></td>
						<td><?php echo $data['kkm'] ?></td>
						<td><?php echo $data['file'] ?></td>
						<td><?php echo $data['status'] ?></td>
						<td><a href="?laporan=<?php echo $data['file'] ?>"><button class="btn btn-info">Buat laporan</button></a></td>
						<td><a target="_blank" href="pdf.php?pdf=<?php echo $data['file'] ?>"><input type="button" value="lihat" class="btn btn-danger"></a></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
			<?php if(isset($_GET['laporan'])){ ?>
			<?php 
				$super = new controller("localhost","root","","supervisor");
				$where = $super->where("login","email",$_SESSION['super']);
				foreach($where as $key){
					$nama = $key['nama'];
				}
				?>
			<div class="card-body">
				<form action="?upload" method="post">
					<label for="">Tanggal</label>
					<input type="date" name="tanggal" id="tanggal" required class="form-control">
					<label for="">Nama</label>
					<input type="text" name="nama" id="nama" readonly value="<?php echo $nama ?>" required class="form-control">
					<label for="">File Guru</label>
					<input type="text" readonly name="file" class="form-control" value="<?php echo $_GET['laporan'] ?>">
					<label for="">pilihan</label>
					<div class="form-check">
						<input type="radio" required name="radio" id="terima" value="terima" class="form-check-input">
						<label for="terima" class="form-check-label">Terima</label>
					</div>
					<div class="form-check">
						<input type="radio" required name="radio" id="tolak" value="tolak" class="form-check-input">
						<label for="tolak" class="form-check-label">Tolak</label>
					</div>
					<label for="">deskripsi</label>
					<textarea name="deskripsi" id="" required class="form-control"></textarea>
					</div>
					<div class="card-footer">
						<center><input type="submit" class="btn btn-info" value="upload"></center>
					</div>
				</form>
			
			<?php } ?>
		</div>
	</div>
</body>
<script type="text/javascript">
	document.getElementById('tolak').addEventListener('click',()=>{
		document.getElementById('tanggal').required = false;
	})
	document.getElementById('terima').addEventListener('click',()=>{
		document.getElementById('tanggal').required = true;
	})
</script>
</html>
<?php
	}else{
		echo "<script>alert('Login Terlebih Dahulu');document.location.href='../'</script>";
	}
?>