<?php
	require 'common.php';


	connect_mydb();
	select_mydb();


 	$account=_POST('account');
 	$password=md5(_POST('password'));

 	 //检查用户名是否存在
 	$result = mysqli_fetch_all(mysqli_query($mydb,"select * from user where account = '$account'"));
 	if(!$result){
 		echo"<script>alert('账号不存在');history.go(-1);</script>";
 	}

 	//检查用户名与密码是否匹配
 	else{
 		$row=mysqli_query($mydb,"select password from user where account ='$account'");
 		$row=mysqli_fetch_array($row,MYSQLI_ASSOC);
   		$mypassword=$row['password'];

 		if($mypassword!=$password){
 			echo"<script>alert('密码错误');history.go(-1);</script>";
 		}
 		else{
 		 	$row=mysqli_query($mydb,"select * from user where account ='$account'");
 		    $row=mysqli_fetch_array($row,MYSQLI_ASSOC);
            $identity=$row['identity'];
            $realname=$row['realname'];
 			setcookie('account',$account,0);
 			setcookie('identity',$identity,0);
 			setcookie('realname',$realname,0);

            echo '<script type="text/javascript">window.location.href="home.php"</script>';

        }
 	}
 	mysqli_close($mydb);
?>