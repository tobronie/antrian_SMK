<?php
function checkLogin()
{
	return isset($_SESSION['status_login']) && $_SESSION['status_login']['status'] == 1 ? true : false;
}
function checkLempar()
{
	if (checklogin() == false) {//jika kondisi login == false, maka
		header('location: ?halaman=login');
		exit();
	}
}
?>