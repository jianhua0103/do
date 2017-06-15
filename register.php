<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8">  
<title>注册用户</title> 
</head> 
<body>  
<?php     
session_start();     
$username=$_REQUEST["username"];    
$password=$_REQUEST["password"];      
$con=mysql_connect("192.1681.102","root","123456");    
if (!$con) {       
	die('数据库连接失败'.$mysql_error());     
}     
mysql_select_db("jianhua",$con);     
$dbusername=null;    
$dbpassword=null;    
$result=mysql_query("select * from user_info where username ='{$username}'") or die(mysql_error());    
while ($row=mysql_fetch_array($result)) {       
	$dbusername=$row["username"];       
	$dbpassword=$row["password"];     
}     
if(!is_null($dbusername)){   
?>   
<script type="text/javascript">     
alert("用户已存在");     
window.location.href="index.html";   
</script> 
<?php 
}else{
mysql_query("insert into user_info (username,password) values('{$username}','{$password}')") or die("存入数据库失败".mysql_error()) ;    
mysql_close($con);
?>
<script type="text/javascript">     
alert("注册成功");     
window.location.href="login.html";  
</script>
<?php
} 
?>
</body>
</html> 
