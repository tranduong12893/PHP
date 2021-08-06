<?php

$maychu = "localhost";
$tendangnhap = "root";
$matkhau = "";
$tendb = "nhat_ky";

	$db = mysqli_connect($maychu, $tendangnhap, $matkhau, $tendb);
	$servername = $maychu;
	$username = $tendangnhap;
	$password = $matkhau;
	$dbname = $tendb;
	$conn = new mysqli($servername, $username, $password, $dbname);
	$DATABASE_HOST = $maychu;
	$DATABASE_USER = $tendangnhap;
	$DATABASE_PASS = $matkhau;
	$DATABASE_NAME = $tendb;
	$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Mã này giúp cho trang khỏi bị các ký tự Unicode kì lạ
	mysqli_set_charset($conn, 'UTF8');
	mysqli_set_charset($db, 'UTF8');
	mysqli_set_charset($con, 'UTF8');
?>