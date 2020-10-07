<?php
	include 'koneksi.php';

	function antiInjection($str) {
    $r = stripslashes(strip_tags(htmlspecialchars($str, ENT_QUOTES)));
    return $r;
  }
		session_start();
		$username = antiInjection($_POST['username']);
		$password = $_POST['password'];

		$query    = "SELECT * FROM user WHERE username='$username' and password='$password'";
		$sql = mysqli_query($connect, $query);
		$row    = mysqli_fetch_array($sql);
		if(mysqli_num_rows($sql) >0)
		{
			$_SESSION['id_user']       	=$row['id_user'];
			$_SESSION['username']		=$username;
			$_SESSION['fullname'] 		=$row['fullname'];
			$_SESSION['jenis_kelamin']  =$row['jenis_kelamin'];   
			$_SESSION['foto']     		=$row['foto'];
			$_SESSION['level']    		=$row['level'];
			header('location:index.php');
		}else{
			header("location:login.php?pesan=gagal")or die(mysql_error());
		}
?>
