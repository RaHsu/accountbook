<?php
require 'common.php';
$action=isset($_GET['action'])?$_GET['action']:'';

//获取余额的接口
if($action == 'getRest'){
    connect_mydb();
    select_mydb();

    $sql = "SELECT * FROM accounts";

    $result=fetch_all($sql);

    $sum=0;
    for($i=0;$i<count($result);$i++){
        if($result[$i]['type'] == 1){
            $sum+=$result[$i]['money'];
        }
        elseif ($result[$i]['type']==0){
            $sum-=$result[$i]['money'];
        }
    }

    echo $sum;
    mysqli_close($mydb);

}

//查询账目
else if($action=='getTotal'){
    connect_mydb();
    select_mydb();

    $sql = "SELECT * FROM accounts";

    $result=fetch_all($sql);
    $result=json_encode($result);

    echo $result;
    mysqli_close($mydb);
}

//查询账目细节
else if($action=='getDetail'){
    connect_mydb();
    select_mydb();

    $id=_POST('id');

    $sql = "SELECT * FROM accounts WHERE id='$id'";

    $result=fetch_array($sql);
    $result=json_encode($result);
    mysqli_close($mydb);

    echo $result;
}

//添加账目
else if($action == 'addAccount'){
    $title=_POST('title');
    $time=_POST('time');
    $recorder=$_COOKIE['realname'];
    $detail=_POST('detail');
    $type = _POST('type');
    $money = _POST('money');


    if($type == '支出'){
        $type = 0;
    }
    elseif ($type == '收入'){
        $type = 1;
    }


    connect_mydb();
    select_mydb();

    $sql = "insert into
                  accounts (title,time,recorder,detail,type,money) 
                  VALUES ('$title','$time','$recorder','$detail','$type','$money');";

    query($sql);

    echo '<script type="text/javascript">window.location.href="account-management.php"</script>';

    mysqli_close($mydb);
}

//删除账目
    else if($action=='deleteAccount'){
        $id=_POST('id');

        connect_mydb();
        select_mydb();

        $sql="delete from 
                  accounts
                  WHERE id='$id'";

        query($sql);

        mysqli_close($mydb);

        echo '<script type="text/javascript">window.location.href="account-management.php"</script>';

}

//修改账目
    else if($action=='modifyAccount'){
        $id=_POST('id');
        $title=_POST('title');
        $time=_POST('time');
        $recorder=$_COOKIE['account'];
        $detail=_POST('detail');
        $type = _POST('type');
        $money = _POST('money');

        if($type == '支出'){
            $type = 0;
        }
        elseif ($type == '收入'){
            $type = 1;
        }

        $sql = "update accounts
                  set title='$title',time='$time', recorder='$recorder',detail='$detail',
                      type = '$type',money='$money'
                  WHERE id='$id';";

        connect_mydb();
        select_mydb();
        query($sql);

        mysqli_close($mydb);
        echo '<script type="text/javascript">window.location.href="account-management.php"</script>';

    }
?>