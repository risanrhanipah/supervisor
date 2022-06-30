<?php
  session_start();
  if(@$_SESSION['kurikulum'] === "login"){
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<?php
if(isset($_GET['upload'])){
	if(isset($_FILES['file'])){
		echo $_FILES['file']['tmp_name'];
		require "../library/controller.php";
		$tambah = new controller("localhost","root","","supervisor");
		$rand = rand();
		$upload = $rand."_".$_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],'../dokumen/'.$upload);
		$fieldProduct = array("tanggal","file","deskripsi");
		$valueProduct = array($_POST['tanggal'],$upload,$_POST['deskripsi']);
		$asd = $tambah->insert("kepala",$fieldProduct,$valueProduct,"laporan.php","Berhasil","Gagal");

	}else{
		echo $_FILES['file']['name'];
	}
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
	<?php
		if(isset($_GET['delete'])){
			require '../library/controller.php';
			$delete = new controller("localhost","root","","supervisor");
			$delete->delete("laporan","file",$_GET['delete'],"laporan.php","Berhasil Dihapus","Gagal");
		}
	?>
	<div class="container">
		<div class="card" style="margin : 3rem auto 8.1rem auto !important">
			<div class="card-header">
				<h1>Laporan</h1>
			</div>
			<div class="card-body">
			<table class="table">
					<tr class="thead-dark">
						<th>tanggal</th>
						<th>nama supervisor</th>
						<th>file</th>
						<th>deskripsi</th>
						<th colspan="2">opsi</th>
					</tr>
					<?php
						require "../library/controller.php";
						$guru = new controller("localhost","root","","supervisor");
						$result = $guru->select("laporan");
						while($data = mysqli_fetch_array($result)){

					?>
					<tr>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['nama'] ?></td>
						<td><?php echo $data['file'] ?></td>
						<td><?php echo $data['deskripsi'] ?></td>
						<td><a target="_blank" href="../guru/pdf.php?pdf=<?php echo $data['file'] ?>"><input type="button" value="lihat" class="btn btn-info"></a></td>
						<td><a href="?delete=<?php echo $data['file'] ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
				<form action="?upload" method="post" enctype="multipart/form-data">
			<div class="card-body">
				<label>Tanggal</label>
				<input type="date" required class="form-control" name="tanggal">
				<label>File</label>
				<input type="file" required class="form-control" required name="file">
				<label>Deskripsi</label>
				<textarea class="form-control" required name="deskripsi"></textarea>
			</div>
			<div class="card-footer">
				<center><input type="submit" value="Upload" name="" class="btn btn-info"></center>
			</div> 
			</form>
		</div>
	</div>
</body>
</html>
<?php
  }else{
    echo "<script>alert('Login dahulu');document.location.href='../index.php'</script>";
  }
?>