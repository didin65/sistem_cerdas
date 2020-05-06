<?php
session_start();
error_reporting(0);
include 'koneksi/koneksi.php';
if ($_SESSION['password']) {
	header('location:siswa/index.php');
}

				//proses login 
				if (isset($_POST['login'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];

					$query = mysqli_query($koneksi, "SELECT * FROM login where username='$username' and password='$password'");
					$cek = mysqli_num_rows($query);

					if ($cek > 0) {
						$data = mysqli_fetch_assoc($query);
						$_SESSION['username'] = $data['username'];
						$_SESSION['password'] = $data['password'];

						if ($_SESSION['password'] == $password) {
							$_SESSION['username'] = $username;
							$_SESSION['password'] = $password;
							header('location:siswa/index.php');
						}
					} else { 
						echo "<div class='posisi-a'>
							  	<div class='alert alert-danger fade show' role='alert'>
							  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<strong><i>Maaf username dan password tidak valid!</i></strong>
								</div>
							  </div>


							  ";
					}
				}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/b.css">
</head>
<body>
<form action="" method="POST">
	<div class="card posisi">
		<table border="0" cellspacing="2" cellpadding="9">
			<tr>
				<th colspan="2"><img src="img/lg.jfif" width="130"></th>
			</tr>
			<tr>
				<td><i class="fas fa-user"></i></td>
				<td><input type="text" name="username" class="form-control" placeholder="Username"></td>
			</tr>
			<tr>
				<td><i class="fas fa-key"></i></td>
				<td><input type="password" name="password" class="form-control" placeholder="Password"></td>
			</tr>
			<tr>
				<td colspan="3"><center><input type="submit" name="login" value="Login" class="btn btn-primary btn-block"></center></td>
			</tr>
		</table>
	</div>
</form>
		
<script src="bootstrap/js/popper.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="font-awesome/js/all.min.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script>
								$(document).ready(function() {
									window.setTimeout(function() {
										$('.alert').fadeOut([500],[0]).slideUp(500, function() {
											$(this).remove();
										});
									}, 4000);
								});
					</script>	
</body>
</html>