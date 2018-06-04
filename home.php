<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>主页</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="css/sm.min.css">
    <link rel="stylesheet" href="css/sm-extend.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/jquery-3.0.0.js"></script>
    <script src="js/vue.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="page">
    <header class="bar bar-nav">
        <h1 class="title">主页</h1>
    </header>
    <?php
        $cookie = isset($_COOKIE['identity'])?$_COOKIE['identity']:null;
        if($cookie == null){
            echo '<script>alert("请先登录！");location.href="login.html"</script>';
        }
        else if($cookie == 1){
            echo '<nav class="bar bar-tab">
        <a class="tab-item external active" href="home.php">
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
        <a class="tab-item external" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
        }
        else if($cookie == 2){
            echo '<nav class="bar bar-tab">
        <a class="tab-item external active" href="home.php">
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
        <a class="tab-item external" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
        }
        else if($cookie == 3){
            echo '<nav class="bar bar-tab">
        <a class="tab-item external active" href="home.php">
            <span class="icon icon-home"></span>
            <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>';
        }
    ?>
    <div class="content">
        <div class="card">
            <div class="card-content">
                <div class="card-content-inner">
                    <i class="fa fa-shopping-bag"></i>
                    账户余额
                    <span class="money-rest">￥ <span id="restMoney"></span></span>
                </div>
            </div>
        </div>
        <div class="content-block-title">最近账单</div>
        <div class="list-block media-list">
            <ul id="list">
                <li v-for="item in items">
                    <form action="account-detail.php" method="post">
                    <a class="item-link item-content submit">
                        <input type="hidden" :value="item.id" name="id">
                        <div class="item-inner">
                            <div class="item-subtitle">{{item.time}}</div>
                            <div class="item-title-row">
                                <div class="item-title">{{item.title}}</div>
                                <input type="hidden" :value="item.type">
                                <div class="item-after">￥<span class="money">{{item.money}}</span></div>
                            </div>
                            <div class="item-text detail">{{item.detail}}</div>
                        </div>
                    </a>
                    </form>
                </li>

            </ul>
        </div>
    </div>


    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>
    <script>
        //获取余额并显示
        jQuery('#restMoney').load('management-account.php?action=getRest');

        //获取总览信息
        jQuery.get('management-account.php?action=getTotal',function (data) {
            if(data==='SQL执行失败0'){

                return false;
            }
            console.log(data);
            var totalData=JSON.parse(data);
            console.log(totalData);
            var getData=new Vue({
                el:'#list',
                data:{
                    items:totalData
                }
            });




            //过滤金额颜色及正负
            function filter() {
                var items=document.getElementsByClassName('money');
                for(var i=0;i<items.length;i++){
                    if(items[i].parentNode.previousSibling.previousSibling.value==='1'){
                        items[i].className='money money-income';
                        items[i].innerText='+ '+items[i].innerText;
                    }
                    else{
                        items[i].className='money money-expend';
                        items[i].innerText='- '+items[i].innerText;
                    }
                }

            }
            filter();

            //简介截取一定字符显示
            (function () {
                var items = document.getElementsByClassName('detail');
                for(var i = 0;i<items.length;i++){
                    if(items[i].innerText.length>12){
                        items[i].innerText=items[i].innerText.substring(0,12)+'....';
                    }
                }
            })();


            //给所有项目加上提交功能
            (function () {
                var items = document.getElementsByClassName('submit');
                for(var i = 0;i<items.length;i++){
                    items[i].onclick=function () {
                        console.log("in");
                        this.parentNode.submit();
                    }
                }
            })();


        });




    </script>


</body>
</html>