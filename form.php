<!DOCTYPE html>
<html>
<head>
	<title>TAWEBDAS5</title>
</head>
<body>
	<form action="" method="post">
	<center>
		<h1>Aplikasi Pendaftaran Mahasiswa</h1>
		NIM: <input type="text" name="nim"><br><br>
		Nama: <input type="text" name="nama"><br><br>
		Email: <input type="text" name="email"><br><br>
		Tanggal Lahir: <input type="date" name="tgllahir"><br><br>
		Jenis Kelamin : 
			<input type="Radio" name="jk">Perempuan
			<input type="Radio" name="jk">Laki-Laki
			<br><br>

		Program Studi: 
		<select name="prodi" required="">
				<option value="Sistem Informasi"> Sistem Informasi</option>
				<option value="Komputerisasi Akuntansi"> Komputerisasi Akuntansi</option>
				<option value="MBTI">MBTI</option>
				<option nvalue="Telekomunikasi"> Teknik Telekomunikasi </option>
				<option value="Perhotelan"> Perhotelan</option>
				<option value="Manajemen Pemasaran"> Manajemen Pemasaran</option>
		</select><br><br>

		Fakultas: 
		<select name="fakultas" required="">
			<option value="FIK">FIK</option>
			<option value="FEB">FEB</option>
			<option value="FKB">FKB</option>
			<option value="FTE">FTE</option>
			<option value="FRI">FRI</option>
			<option value="FIT">FIT</option>
		</select>
		<br><br>
		KOMENTAR : <textarea name="komentar"></textarea><br><br>

		<input type="submit" name="submit" value="SUBMIT"><br>
	</center>
	</form>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];

	$check = true;

	if(empty($nim)){
		echo "NIM tidak boleh kosong! <br>";
	$check = false;
	}
	else{
		if (strlen($nim)!=10 && ! is_numeric($nim)){
			echo "NIM harus berupa angka dan 10 digit! <br>";
			$check = false;
		}
	}

	if(empty($nama)){
		echo "Nama tidak boleh kosong! <br>";
	$check = false;
	}
	else{
		if (strlen($nama)>20){
			echo "Nama maksimal 20 karakter! <br>";
			$check = false;
		}
	}

	if(empty($email)){
		echo "Email tidak boleh kosong! <br>";
	$check = false;
	}
	else{
		if (!strpos($email, '@') || !strpos($email, '.com')){
			echo "Format email harus ada @ dan .com !<br>";
			$check = false;
		}
	}

	$tgllahir = $_POST['tglahir'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		if(isset($_POST['jk'])) {
			$jk = $_POST['jk'];
		}

		if ($_POST['komentar']>50 || $_POST['komentar']=="") {
			echo "SEBELUM KIRIM ISI KOMENTAR DULU";
		} else {
			$komentar = $_POST['komentar'];
		}


	if ($check) {
			$conn = mysqli_connect('localhost','root','','d_ta5');

			$sql = "INSERT INTO t_ta5 values ('$nim','$nama','$email', '$tgllahir','jk,'prodi','fakultas','$komentar') ";
			mysqli_query($conn, $sql);
			session_start();
			$_SESSION['pk'] = $nim;
			header("location:tampilan.php");
		}
}

 ?>
