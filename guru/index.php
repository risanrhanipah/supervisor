<?php
	session_start();
	if(isset($_SESSION['guru'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="index.php">GURU | SMK WIKRAMA 1 GARUT</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
		  	<li class=x"nav-item"><a class="nav-link"><?php echo $_SESSION['guru'] ?></a></li>
          <li class="nav-item"><a class="nav-link" onclick="return confirm('anda yakin')" href="logout.php">Logout</a></li>
        </ul>
       
      </div>
    </nav>
	<div class="container">
		<div class="card" style="margin : 3rem auto !important">
			<div class="card-header text-light bg-info">
				<h2>Form Upload Nilai/Tugas</h2>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<tr class="thead-dark">
						<th>tanggal</th>
						<th>nama pelajaran</th>
						<th>guru</th>
						<th>nilai</th>
						<th>file</th>
						<th>status</th>
						<th>pesan</th>
						<th colspan="3">opsi</th>
					</tr>
					
					<?php
						require "../library/controller.php";
						$guru = new controller("localhost","root","","supervisor");
					
						$where = $guru->where('jadwal',"username",$_SESSION['guru']);
						foreach($where as $key){
							$mapel =  $key['nama_mapel'];
							$nama = $key['nama'];
						}

						$result = $guru->where("upload","guru",$nama);
						foreach($result as $data){
					?>
					<tr>
						<td><?php echo $data['tanggal'] ?></td>
						<td><?php echo $data['mapel'] ?></td>
						<td><?php echo $data['guru'] ?></td>
						<td><?php echo $data['kkm'] ?></td>
						<td><?php echo $data['file'] ?></td>
						<td onchange="return status()"><?php echo $data['status'] ?></td>
						<td><?php echo $data['pesan'] ?></td>
						<td><a target="_blank" href="pdf.php?pdf=<?php echo $data['file'] ?>"><input type="button" value="lihat" class="btn btn-info"></a></td>
						<td><a href="?edit=<?php echo $data['file'] ?>"><button class="btn btn-warning">Edit</button></a></td>
						<td><a href="data.php?delete=<?php echo $data['file'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
						
					</tr>
					<?php
						}
					?>
				</table>
				<hr>
				<?php
					if(isset($_GET['edit'])){
						$edit = new controller("localhost","root","","supervisor");
						$key = $edit->edit("upload","file",$_GET['edit']);
				?>
				<a href="index.php"><input type="button" class="btn btn-info" value="Add"></a>
				<center><h2>Edit</h2></center>
				<form action="data.php?update" method="post" enctype="multipart/form-data">
				<input type="hidden" name="file_hapus" value="<?php echo $_GET['edit'] ?>">
				<label for="tanggal">Tanggal</label>
				<input type="date" value="<?php echo $key['tanggal'] ?>" class="form-control" required="" name="tanggal">
				<label>Nama Pelajaran</label>
				<input type="text" name="mapel" value="<?php echo $key['mapel'] ?>" class="form-control">
				<label>Nama Guru</label>
				<input type="text" class="form-control" readonly value="<?php echo $key['guru'] ?>" name="guru">
				<label for="">Nilai Kkm</label>
				<input type="number" class="form-control" value="<?php echo $key['kkm'] ?>" name="kkm">
				<label for="foto">File</label>
				<input type="file" id="foto" name="file" class="form-control">
				<label for="" class="text-info">File Sebelumnya : <?php echo $key['file'] ?></label>
			</div>
			<div class="card-footer">
				<center><input type="submit" class="btn btn-success" value="Update"></center>
			</div>
				</form>
		</div>
				<?php
					}else{
				?>
				<center><h2>Add</h2></center>
				<form action="data.php?upload" method="post" enctype="multipart/form-data">
				<label for="tanggal">Tanggal</label>
				<input type="date" required class="form-control" required="" name="tanggal">
				<label>Nama Pelajaran</label>
				<input type="text" required name="mapel" value="<?php echo $mapel ?>" class="form-control">
				<label>Nama Guru</label>
				<input type="text" class="form-control" readonly value="<?php echo $nama ?>" name="guru">
				<label for="">Nilai Kkm</label>
				<input type="number" required class="form-control" name="kkm">
				<label for="foto">File</label>
				<input type="file" required="" id="foto" name="file" class="form-control">
			</div>
			<div class="card-footer">
				<center><input type="submit" class="btn btn-info" value="Upload"></center>
			</div>
				</form>
		</div>
		<?php } ?>
	</div>
</body>
</html>
<?php
	}else{
		echo "<script>alert('Login Terlebih Dahulu');document.location.href='../'</script>";
	}
?>