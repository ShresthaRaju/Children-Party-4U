<?php 
session_start();
include("config.php");

if (isset($_POST['btnlogin'])) {
	$login_username=$_POST['loginUsername'];
	$login_password=$_POST['loginPassword'];

	$login_sql="Select * from tbl_users where username='$login_username' and password ='$login_password'";
	$login_query=mysqli_query($connect,$login_sql);
	$count=mysqli_num_rows($login_query);

	if ($count>0) {

		$data=mysqli_fetch_array($login_query);
		$usertype=$data['usertype'];
		$user_id=$data['user_id'];
		
		if ($usertype=='Admin') {
			$_SESSION['admin']=$login_username;
			header("location:admin.php");
		}else{
			$_SESSION['standard']=$login_username;
			$_SESSION['user_id']=$user_id;
			header("location:userPanel.php");
		}
	}
	else{
		if(!isset($_COOKIE['count_cookie']))
		{
		setcookie('count_cookie',0,time()+10*60);
		}
		else
		{
		$cookie_count = $_COOKIE['count_cookie']+1;
		setcookie('count_cookie',$cookie_count,time()+10*60);
		}
		header("location:index.php?nousername=login");
		}
}
 ?>