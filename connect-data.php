<?php
// Bước đăng kí SQL với server localhost

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnphp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Khai báo biến
$passlogin = $emaillogin = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['your-email'])) {
    $emaillogin = $_POST['your-email']; //Khôg tồn tại mà làm như vậy sẽ báo lỗi
  }
  if(isset($_POST['your-password'])) {
    $passlogin = $_POST['your-password']; //Khôg tồn tại mà làm như vậy sẽ báo lỗi
  }
}

// Khai báo SQL
$sql = "SELECT * FROM user WHERE Email='$emaillogin' "; // " SELECT * : lấy tất cả dữ liệu trong bảng"
 // $sql = "SELECT * FROM user WHERE Username='thansgd' "; //test WHERE xem có lọc kết quả ko
$result = $conn->query($sql);
// var_dump($result);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $idcus = $row["ID"];
    $usercus = $row["Username"];
    $passcus = $row["Password"];
    $emailcus = $row["Email"];
    $telcus = $row["Telephone"];

		if ($passlogin == $passcus) {
		      echo " Đăng nhập thành công"; 
		      header ('Location: http://learnphp/welcome.php?your-username='.$usercus. '&your-email='.$emailcus);
		      die();
		    } else {
		      echo '<script language="javascript">alert("Email hoặc Mật khẩu không đúng!"); window.location="sign-in.php";</script>';
		 //     header('Location: http://learnphp/create-new-account.php');
		      die();
		    }
		    }  
		} else {
		   echo '<script language="javascript">alert("Chưa có tài khoản, vui lòng tạo mới!"); window.location="create-new-account.php";</script>';
		//  echo "Chưa có tài khoản, vui lòng tạo mới";
		}
$conn->close();
?>   
?>