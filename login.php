<!doctype html> 
  <html> 
  <head>   
  <meta charset="UTF-8">   
  <title>用户登录</title> 
  </head> 
  <body>   
	<?php     
	session_start();  
	$username=$_REQUEST["username"];     
	$password=$_REQUEST["password"];      
	$con=mysql_connect("localhost","root","123456");    
	if (!$con) {       
		die('数据库连接失败'.$mysql_error());     
	}     
	mysql_select_db("jianhua",$con);     
	$dbusername=null;     
	$dbpassword=null;     
	$result=mysql_query("select * from user_info where username ='{$username}'")or die(mysql_error());
	while ($row=mysql_fetch_array($result)) {     
		$dbusername=$row["username"];      
		$dbpassword=$row["password"];    
	}     
	if (is_null($dbusername)) { 
	?>   
	<script type="text/javascript">     
	alert("用户名不存在");    
	window.location.href="login.html";   
	</script>  
	<?php     
	}else {       
		if ($dbpassword!=$password){  
	?>   
	<script type="text/javascript">     
	alert("密码错误");     
	window.location.href="login.html";   
	</script>   
	<?php       
		}else {         
		$_SESSION["username"]=$username;         
		$_SESSION["code"]=mt_rand(0, 100000); 
	?>   
	<script type="text/javascript">    
	window.location.href="welcome.html";   
	</script>   
	<?php       
		}     
	}   
	mysql_close($con);
	?> 
</body> 
</html> 