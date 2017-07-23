<?php 

include("config.php");

if (isset($_POST['signup'])) {
		
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username_sql="select * from tbl_users where username='$username'";
		$username_query=mysqli_query($connect,$username_sql);
		$result=mysqli_fetch_array($username_query);
		if ($result[0]) {
			header("location:index.php?usernameexist=already");
		}else{
		$insert_sql="Insert into tbl_users values ('','$firstname','$lastname','$gender','$dob','$email','$username','$password','Standard')";

		$insert_query=mysqli_query($connect,$insert_sql);
			if ($insert_query) {
				header("location:index.php?registered=successfull");
			}
		}
		
}
?>