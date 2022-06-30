<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<title>supervisor</title>
	<style type ="text/css">
	body{
		background: whitesmoke;
		padding: 0;
		margin: 0;
	}
	</style>

</head>
<body>
	<div class="container">
		<div class="card col-5" style="margin : 4rem auto">
			<div class="">
				<center><img src=""></center>
			</div>

		<center>
			</br>
		
      <h5>SUPERVISOR</h5>
      <h6></h6> </center>

			<div class="card-body">
			<style>
			body{
				background color: white;
				padding: 0;
				margin: 0;
			}
			</style>
			<form action="role.php" method="post">
			<label for="">Username</label>
				<input type="text" placeholder="Username" name="username" class="form-control">
				<label for="">Password</label>
				<input type="password" placeholder="Password" name="password" class="form-control">
				<label for="">Role</label>
				<select name="role" id="" class="form-control">
					<option value="guru">guru</option>
					<option value="kepala">kepala sekolah</option>
					<option value="kurikulum">kurikulum</option>
					<option value="super">supervisor</option>
				</select>
			</div>
			<div class="card bg-info">
				<center><input type="submit" class="btn btn-blue" value="login"></center>
			</div>
			<br>
			<br>
			</form>
		</div>
	</div>
</body>
</html>