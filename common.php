<?php
//从表单获取数据
function _POST($value){
 		return $_POST[$value]=isset($_POST[$value])?$_POST[$value]:NULL;
 	}
//连接数据库
function connect_mydb(){
	global $mydb;
	$mydb = mysqli_connect("localhost","root","","accountbook");
	if (!$mydb)
 	{
  		die('链接不到数据库');
 	}
}

//选择数据库
function select_mydb(){
	global $mydb;
	mysqli_select_db($mydb,'accountbook');
	mysqli_query($mydb,'SET NAMES UTF8');

}

//执行sql语句
function query($sql){
	global $mydb;
 	$result= mysqli_query($mydb,$sql) or die('SQL执行失败'.mysqli_error($mydb).mysqli_errno($mydb));
 	return $result;
}

//查找数据all方法
function fetch_all($sql){
	global $mydb;
	$row=mysqli_fetch_all(query($sql),MYSQLI_ASSOC) or die('SQL执行失败'.mysqli_error($mydb).mysqli_errno($mydb));
	return $row;
}

//查找数据array方法
function fetch_array($sql){
	global $mydb;
	$row=mysqli_fetch_array(query($sql),MYSQLI_ASSOC) or die('SQL执行失败'.mysqli_error($mydb).mysqli_errno($mydb));
	return $row;
}

//查找数据row方法
function fetch_row($data){
    $row=mysqli_fetch_row($data);
    return $row;
}




?>