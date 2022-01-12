

<?php

// Bước đăng kí SQL với server localhost

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Kết thúc Bước đăng kí SQL với server localhost

// File đăng kí connect
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
	}



// Kiểm tra email đăng kí đã tồn tại chưa

$sqlcheck = "SELECT * FROM user WHERE Email='$emaillogin' "; // " SELECT * : lấy tất cả dữ liệu trong bảng"
 // $sql = "SELECT * FROM user WHERE Username='thansgd' "; //test WHERE xem có lọc kết quả ko
$result = $conn->query($sqlcheck);
// var_dump($result);
if ($result->num_rows > 0) {	
  	echo '<script language="javascript">alert("Email này đã được đăng kí!"); window.location="create-new-account.php";</script>';
		}
		else {
			// Nếu email chưa tồn tại thì nhập data 

			$sql = "INSERT INTO user (Username, Password, Email, Telephone)
			VALUES ('$userlogin', '$passlogin', '$emaillogin', '$tellogin' )";

			if ($conn->query($sql) === TRUE) {
					header ('Location: http://learnphp/welcome.php?your-username=' .$userlogin. '&your-email=' .$emaillogin);
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
$conn->close();
?>