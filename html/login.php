<?php

$name=($_POST['Name']);
$email=($_POST['email']);
$phone=($_POST['tel']);
$location=($_POST['resident building']);

$conn = mysqli_connect('localhost','root','pxf2000320');
mysqli_select_db($conn, 'test');
mysqli_set_charset($conn, 'utf8');
$sql="insert into user ( name,email,phonenumber,location) values ('$name','$email,'$phone','$location')";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);


if($row){echo "<script> alert('you have already sign up!'');location.href='frontPage.html';</script>";}
else{
	$sql1 ="insert into user ( name,email,phonenumber,location) values ('$name','$email','$phone','$location')";
	$result = mysqli_query($sql1);
    if ($row){
		echo "<script> alert('account failed, please try again');location.href='frontPage';</script>";}
	else{echo "<script> alert('account sucessed!');location.href='uploadVideo.html';</script>";}
}
mysqli_close($conn);

?>
