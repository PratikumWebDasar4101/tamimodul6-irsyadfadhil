<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
<center><h1>REGISTRASI</h1></center>
<hr>
<table align="center">
	<form action="login.php" method="POST" enctype="multipart/form-data">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username"placeholder="Buat username anda" required></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="text" name="username"placeholder="Buat password anda" required></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" maxlength="35" placeholder="Masukkan Nama anda" required></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" minlength="10" maxlength="10" pattern="\d*" placeholder="Masukkan NIM anda" required></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><input type="radio" name="kelas" value="4101">41-01
				<input type="radio" name="kelas" value="4102">41-02
				<input type="radio" name="kelas" value="4103">41-03
				<input type="radio" name="kelas" value="4104">41-04</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jeniskelamin" value="Laki-Laki">Laki-Laki
				<input type="radio" name="jeniskelamin" value="Perempuan">Perempuan</td>
		</tr>
		<tr>
			<td>Hobi</td>
			<td>:</td>
			<td><input type="checkbox" name="hobi[]" value="Membaca">Membaca<br>
				<input type="checkbox" name="hobi[]" value="Nonton">Nonton<br>
				<input type="checkbox" name="hobi[]" value="Menulis">Menulis<br>
				</td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
				<option value="FIT">FIT</option>
				<option value="FIK">FIK</option>
				<option value="FEB">FEB</option>
				<option value="FKB">FKB</option>
				<option value="FRI">FRI</option>
				<option value="FTE">FTE</option>
			</select></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><textarea name="alamat" rows="5"></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="3"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</form>
</table>
<hr>
</body>
<?php
if (isset($_POST['username'])) {
    $username   = $_POST['username'];
    $pass       = $_POST['password'];
    $nama       = $_POST['nama'];
    $nim        = $_POST['nim'];
    $kelas      = $_POST['kelas'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $hobi       = $_POST['hobi'];
    $fakultas   = $_POST['fakultas'];
    $alamat     = $_POST['alamat'];
    $list_hobi = implode(", ", $hobi);

    $input_user = mysqli_query($conn, "INSERT INTO user(username, password) 
                                                VALUES ('$username', '$pass')");

    $ambil_id = mysqli_query($conn, "SELECT id FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($ambil_id);
    $id = $row['id'];

    $input_mahasiswa = "INSERT INTO mahasiswa(id, nama, nim, kelas, jeniskelamin, hobi, fakultas, alamat) 
                        VALUES ('$id', '$nama', '$nim', '$kelas', '$jeniskelamin', '$list_hobi', '$fakultas', '$alamat')";
    
    if (mysqli_query($conn, $input_mahasiswa)) {
        echo "	<script>
                alert('Data berhasil di tambah');
                location='login.php';
                </script>";
    }else {
        echo "Error: " . $input_mahasiswa . "<br?" . mysqli_error($conn);
    }
}
?>
</html>
