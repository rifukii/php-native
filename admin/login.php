<?php

$host = "localhost";
$database = "fasumsum_sig";
$user = "fasumsum_rifky";
$password = "0804031991";
$link=mysql_connect($host,$user,$password);
mysql_select_db($database,$link);
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select * from admin where username='$username' and password=md5('$password')";
$res=mysql_query($sql,$link);
if(mysql_num_rows($res)==1){ 
$data=mysql_fetch_array($res);
session_start();
$_SESSION['username']=$data['username']; 
$_SESSION['sudahlogin']=true;
header("Location: home.php");
}
else {
header("Location: gagallogin.php");
}
?>