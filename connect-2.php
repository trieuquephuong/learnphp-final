<?php
//1. Liên kết đến file database
		require "database-1.php";

//2. Nhận biến từ file login
$passlogin = $emaillogin = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['your-email'])) {
    $emaillogin = $_POST['your-email']; //Khôg tồn tại mà làm như vậy sẽ báo lỗi
  }
  if(isset($_POST['your-password'])) {
    $passlogin = $_POST['your-password']; //Khôg tồn tại mà làm như vậy sẽ báo lỗi
  }
}

// 3. Lấy dữ liệu từ database và kiểm tra xem tk có tồn tại chưa
// 3.1 Viết câu lệnh SQL
$sql = "SELECT * FROM user WHERE Email='$emaillogin' and password='$passlogin' ";
// 3.2 Khai báo Object bên database
$sqlconnect = new database();
$resultconnect = $sqlconnect->select($sql); //trả về 1 kết quả $row[ID] ... z->xyz
//$sqlconnect->insert($sql); //thông báo đã insert

if ($resultconnect != NULL) {
	header ('Location: http://learnphp/welcome.php?userid=' .$resultconnect['ID']);
} else {
	header ('Location: http://learnphp/create-new-account.php');
}

//var_dump($resultconnect);
?>