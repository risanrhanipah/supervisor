<?php
	session_start();
	if($_SESSION['kepala'] === "login"){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<body>
	<div class="container">
		
		<div class="card" style="margin : 3rem auto">
			<div class="card-header">
				<h2>Laporan</h2>
			</div>
			<div class="card-body">
				<table class="table">
					<tr>
						<th>id</th>
						<th>tanggal</th>
						<th>deskripsi</th>
						<th>opsi</th>
					</tr>
					<?php
						require '../library/controller.php';
						$kepala = new controller("localhost","root","","supervisor");
						$result = $kepala->select("kepala");
						foreach($result as $key){
					?>
					<tr>
						<td><?php echo $key['tanggal'] ?></td>
						<td><?php echo $key['file'] ?></td>
						<td><?php echo $key['deskripsi'] ?></td>
						<td><a target="_blank" href="../guru/pdf.php?pdf=<?php echo $key['file'] ?>"><input type="button" class="btn btn-info" value="Lihat"></a></td>
					</tr>
					<?php 
						}
					?>
				</table>
				<label>tanggal</label>
				<input type="date" class="form-control" value="<?php  ?>" name="">
				<label>Deskripsi</label>
				<textarea class="form-control" value="<?php  ?>" readonly=""></textarea>
			</div>
			<div class="card-footer">

			</div>
		</div>
	</div>
</body>
</html>
<?php
	}else{
		echo "<script>alert('Login Dahulu');document.location.href='../'</script>";
	}
?>