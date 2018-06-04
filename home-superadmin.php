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
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php
    $identity=isset($_COOKIE['identity'])?$_COOKIE['identity']:0;
    if($identity!=1){
        echo "<script>$.alert('非法操作');history.go(-1);</script>";
    }
?>

<div class="page">
    <header class="bar bar-nav">
        <h1 class="title">主页</h1>
    </header>
    <nav class="bar bar-tab">
        <a class="tab-item external active" href="home-superadmin.php">
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
        <a class="tab-item external" href="#">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>
    <div class="content">
        <div class="card">
            <div class="card-content">
                <div class="card-content-inner">
                    <i class="fa fa-shopping-bag"></i>
                    账户余额
                    <span class="money-rest">￥ 1483.00</span>
                </div>
            </div>
        </div>
        <div class="content-block-title">最近账单</div>
        <div class="list-block media-list">
            <ul>
                <li>
                    <a href="#" class="item-link item-content">
                        <div class="item-inner">
                            <div class="item-subtitle">2017-05-23</div>
                            <div class="item-title-row">
                                <div class="item-title">电影票</div>
                                <div class="item-after">￥<span class="money-expend">-100</span></div>
                            </div>
                            <div class="item-text">一起去看了电影...</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item-link item-content">
                        <div class="item-inner">
                            <div class="item-subtitle">2017-05-25</div>
                            <div class="item-title-row">
                                <div class="item-title">项目收入</div>
                                <div class="item-after">￥<span class="money-income">+100</span></div>
                            </div>
                            <div class="item-text">来自于java项目...</div>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>

</body>
</html>