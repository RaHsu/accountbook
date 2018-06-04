<?php
    require 'common.php';
    $action=isset($_GET['action'])?$_GET['action']:'';
    $cookie=isset($_COOKIE['identity'])?$_COOKIE['identity']:'';

    function reload($cookie){
        if($cookie == 1){
            echo '<script>location.href="both-management.php";</script>';
        }
        if($cookie == 2){
            echo '<script>location.href="user-management.php";</script>';
        }
        if($cookie == ''){
            echo '<script>alert("非法操作！");history.go(-1);</script>';

        }
    }

    //添加管理员
    if($action=="addAdmin"){
        $account = _POST('account');
        $password = md5(_POST('password'));
        $identity = 2;
        $realname = _POST('realname');

        connect_mydb();
        select_mydb();

        $sql="insert into 
                  user (account,password,identity,realname) 
                  VALUES ('$account','$password','$identity','$realname');";

        query($sql);

        mysqli_close($mydb);

        reload($cookie);
    }

    //添加用户
    else if($action == "addUser"){
        $account = _POST('account');
        $password = md5(_POST('password'));
        $identity = 3;
        $realname = _POST('realname');

        connect_mydb();
        select_mydb();

        $sql="insert into 
                  user (account,password,identity,realname) 
                  VALUES ('$account','$password','$identity','$realname');";

        query($sql);
        var_dump($realname);

        mysqli_close($mydb);

        reload($cookie);


    }

    //删除用户和管理员
    else if($action == "deleteUser"){
        $id=_POST('id');

        connect_mydb();
        select_mydb();

        $sql="delete from 
                  user
                  WHERE id='$id'";

        query($sql);

        mysqli_close($mydb);

        reload($cookie);


    }

    //修改用户和管理员
    else if($action == "modifyUser"){
        $id=_POST('id');
        $account = _POST('account');
        $password = md5(_POST('password'));
        $realname = _POST('realname');


        connect_mydb();
        select_mydb();

        $sql="update user
                  set account='$account',password='$password' , realname='$realname'
                  WHERE id='$id';";

        query($sql);


        mysqli_close($mydb);

        reload($cookie);


    }
    //查询管理员
    else if($action == "getAdmin"){

        connect_mydb();
        select_mydb();

        $sql="select * from 
              user
              WHERE IDENTITY =2;";

        $result=fetch_all($sql);
        $result=json_encode($result);

        mysqli_close($mydb);

        echo $result;

    }

    //查询用户
    else if($action == "getUser"){

        connect_mydb();
        select_mydb();

        $sql="select * from 
              user
              WHERE IDENTITY =3;";

        $result=fetch_all($sql);
        $result=json_encode($result);

        mysqli_close($mydb);

        echo $result;

    }

    //用户自己修改个人信息
    else if($action == "modifySelf"){
        $account=_POST('cookie');
        $password = md5(_POST('password'));
        $realname = _POST('realname');

        connect_mydb();
        select_mydb();

        $sql="update user
                  set password='$password' , realname='$realname'
                  WHERE account='$account';";

        query($sql);

        mysqli_close($mydb);

        echo '<script>location.href="me.php";</script>';

    }





?>