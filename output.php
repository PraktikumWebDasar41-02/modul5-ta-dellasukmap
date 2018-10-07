<?php

	session_start();
	$conn = mysqli_connect('localhost','root','','d_ta5');

	$pk = $_SESSION['pk'];

	$sql = "SELECT * FROM t_ta5 WHERE nim = '$pk' ";
	$query = mysqli_query($conn, $sql);
	$hasil = mysqli_fetch_array($query);

	echo "Nim :".$hasil['nim']."<br><br>";	
	echo "Nama : ".$hasil['Nnma']."<br>";
	echo "Email : ".$hasil['email']."<br>";
	echo "Tanggal Lahir :".$hasil['tgllahir']."<br><br>";
	echo "Jenis Kelamin :".$hasil['jk']."<br>";
	echo "Program Studi :".$hasil['prodi']."<br><br>";
	echo "Fakultas :".$hasil['fakultas']."<br><br>";
	echo "Komentar :".$hasil['komentar']."<br><br>";

	

	session_destroy();
?>

