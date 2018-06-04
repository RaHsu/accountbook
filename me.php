<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>个人信息</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="js/common.js"></script>
    <link rel="stylesheet" href="css/sm.min.css">
    <link rel="stylesheet" href="css/sm-extend.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="page">
    <header class="bar bar-nav">
        <h1 class="title">个人信息</h1>
    </header>
    <?php
    $cookie = isset($_COOKIE['identity'])?$_COOKIE['identity']:null;
    if($cookie == null){
        echo '<script>alert("请先登录！");location.href="login.html"</script>';
    }
    else if($cookie == 1){
        echo '<nav class="bar bar-tab">
        <a class="tab-item external" href="home.php">
            <span class="icon icon-home"></span>
            <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external" href="account-management.php">
            <span class="icon icon-edit"></span>
            <span class="tab-label">账目</span>
        </a>
        <a class="tab-item external" href="both-management.php">
            <span class="icon icon-settings"></span>
            <span class="tab-label">管理</span>
        </a>
        <a class="tab-item external active" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
    }
    else if($cookie == 2){
        echo '<nav class="bar bar-tab">
        <a class="tab-item external" href="home.php">
            <span class="icon icon-home"></span>
            <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external" href="account-management.php">
            <span class="icon icon-edit"></span>
            <span class="tab-label">账目</span>
        </a>
        <a class="tab-item external" href="admin-management.php">
            <span class="icon icon-settings"></span>
            <span class="tab-label">管理</span>
        </a>
        <a class="tab-item external active" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
    }
    else if($cookie == 3){
        echo '<nav class="bar bar-tab">
        <a class="tab-item external" href="home.php">
            <span class="icon icon-home"></span>
            <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external active" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
    }
    ?>
    <div class="content">
        <div class="list-block">
            <form action="management-user.php?action=modifySelf" method="post" id="form">
            <ul>
                <!-- Text inputs -->
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-name"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">账号</div>
                            <div class="item-input">
                                <?php
                                $cookie=$_COOKIE['account'];
                                echo '<input type="hidden" id="cookie" name="cookie" value="'.$cookie.'">';
                                ?>
                                <input type="text" id="account" name="account" disabled style="cursor: not-allowed;color: gray">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-name"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">密码</div>
                            <div class="item-input">
                                <input type="password" placeholder="password" id="password" name="password">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-name"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">真实姓名</div>
                            <div class="item-input">
                                <input type="text" placeholder="请输入你的真实姓名" id="realname" name="realname">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </form>
            <div class="content-block">
                <div class="row">
                    <div class="col-100"><a href="#" class="button button-big button-fill button-success" onclick="submit()">保存修改</a></div>
                </div>
        </div>

    </div>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>
    <script>
        var cookie=document.getElementById('cookie').value;
        var account=document.getElementById('account');
        account.value=cookie;

        function submit(){
            var form=document.getElementById('form');
            var password = document.getElementById('password').value;
            var realname=document.getElementById('realname').value;
            if(isEmpty(password)===false){
                $.alert('密码不能为空！');
            }
            else if(isLegal(password) === false){
                $.alert('密码含有非法字符');
                return false;
            }
            else if(isLegal(realname) === false){
                $.alert('真实姓名含有非法字符');
                return false;
            }else {
                form.submit();
            }

        }


    </script>

</body>
</html>