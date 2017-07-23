<?php 

include("config.php");

if (isset($_POST['addbtn'])) {
	$title=$_POST['ptitle'];
	$description=$_POST['description'];
	$cost=$_POST['cost'];
	$length=$_POST['length'];
	$max=$_POST['max'];
	$services=$_POST['services'];
	$file = $_FILES['party_img']['name']; 
	$file_type = pathinfo($_FILES['party_img']['name'],PATHINFO_EXTENSION);
	
	if($file_type=="jpg" || $file_type=="gif" || $file_type=="png")
	{

	$sql="Insert into tbl_parties values ('','$title','$description','$cost','$length','$max','$services','$file')";
	$query=mysqli_query($connect,$sql);
	move_uploaded_file($_FILES['party_img']['tmp_name'],"partyPhotos/".$file);

	if ($query) {
			header("location:admin.php?added=Successfully!!!");
		}else{
			header("location:admin.php?erroradd=Unuccessful!!!");
		}
	
	}
	else
	{
	header("location:admin.php?invalid=file format!!!");
	}
		
}
 ?>