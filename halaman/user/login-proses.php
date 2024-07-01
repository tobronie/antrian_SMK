<?php
//ambil post data
$postdata = $_POST;

$username = $postdata['usernameku'];
$password = md5($postdata['passwordku']); //di enkripsi

//lakukan query ke database umtuk mendapat data user
$query = $db->query("SELECT * FROM user WHERE myusername = '" . $username . "' AND mypassword = '" . $password . "'");
if ($db->connect_errno) {
	echo "Gagal terhubung ke database : " . $db->connect_eror;
	exit();
}

if ($query->num_rows > 0) {
	echo "ada";
	//mendapatkan data dari database
	$res = $query->fetch_object();

	//menambah session
	$_SESSION['status_login'] = [
		'status' => 1,
		'id' => $res->mylast_log,
		'username' => $res->myusername,
		'last_log' => $res->mylast_log,
	];

	//update terakhir login
	$db->query("UPDATE user SET mylast_log = NOW() WHERE myid = " . $res->myid . "; ");
	header('location: ?halaman=depan');
} else {
	header('location: ?halaman=depan');
}