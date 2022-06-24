<?php
	session_start();
	//Lấy thông tin từ đăng nhập_xuly.php gửi qua
	if(isset($_POST['uid'])&& isset($_POST['email']))
	{
		//Đăng ký SESSION
		$_SESSION['uid']=$_POST['uid'];
		$_SESSION['email']=$_POST['email'];
		return true;
	}
	else
	{
		return false;
	}
?>