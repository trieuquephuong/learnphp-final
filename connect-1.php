<?php
//1. Liên kết đến file database
		require "database-1.php";

//2. Nhận biến từ file create-new-account
	$userlogin = $emaillogin = $passlogin = $tellogin = ' ';


	// $_SERVER -> bien global, array
	// post - để tạo private (sign-up form)
	// get - để tạo public

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['your-username'])) {
			$userlogin = $_POST['your-username'];
		}
		if(isset($_POST['your-email'])) {
			$emaillogin = $_POST['your-email'];
		}
		if(isset($_POST['your-password'])) {
			$passlogin = $_POST['your-password'];
		}
		if(isset($_POST['your-telephone'])) {
			$tellogin = $_POST['your-telephone'];
		}

		$sql ="SELECT * FROM user WHERE Email='$emaillogin'";
		$sqltable = new database();
		$resulttable = $sqltable->select($sql);


		// 3. Tạo dữ liệu cho database
		// 3.1 Viết câu lệnh SQL
			if ($resulttable != NULL) {
					header ('Location:http://learnphp/sign-in.php');
			}else {
					$sql = "INSERT INTO user (Username, Password, Email, Telephone)
					VALUES ('$userlogin', '$passlogin', '$emaillogin', '$tellogin' )";

		// 3.2 Khai báo Object bên database
					$sqltable->insert($sql);
			}		
	}


?>
