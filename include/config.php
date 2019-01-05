<?php 

	// Nếu không có hằng số được xác định gọi là __CONFIG__, không tải tệp này
	if(!defined('__CONFIG__')) {
		exit('You do not have a config file');
	}

	// Phiên luôn được bật
	if(!isset($_SESSION)) {
		session_start();
	}

	// Cấu hình của chúng tôi ở bên dưới
	// Cho phép lỗi
	error_reporting(-1);
	ini_set('display_errors', 'On');
	

	// Include the DB.php file;
	include_once "db.php";
	include_once "sessions.php";
	$con = DB::getConnection();

?>
