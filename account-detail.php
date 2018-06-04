<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>账目详情</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="js/jquery-3.0.0.js"></script>
    <script src="js/vue.min.js"></script>
    <link rel="stylesheet" href="css/sm.min.css">
    <link rel="stylesheet" href="css/sm-extend.min.css">
    <link rel="stylesheet" href="css/account-detail.css">
    <link rel="stylesheet" href="css/common.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<?php
    require 'common.php';
    $id=_POST('id');

    echo '<input type="hidden" id="id" value="'.$id.'">';

    /*if($action=='post'){


        connect_mydb();
        select_mydb();

        $sql="SELECT * FROM accounts WHERE id = '$id'";

        $result=fetch_array($sql);
        $result=json_encode($result);
    }
    if($action=='getData'){
        return $result;

    }



    mysqli_close($mydb);*/

?>
<div class="page">
    <header class="bar bar-nav">
        <button class="button button-link button-nav pull-left">
            <a href="#" onclick="javascript:history.go(-1)";>
            <span class="icon icon-left"></span>
            返回
            </a>
        </button>
        <h1 class="title">账目详情</h1>
    </header>

    <div class="content">
        <div class="list-block media-list">
            <ul id="detail-content">
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title-row item-title-big">
                                <div class="item-title">{{detail.title}}</div>
                                <input type="hidden" :value="detail.type">
                                <div class="item-after">￥ <span class="money">{{detail.money}}</span></div>
                            </div>
                            <div class="item-title-row">
                                <div class="item-subtitle">
                                    <i class="fa fa-calendar-check-o fa-fw"></i>
                                    支出时间
                                </div>
                                <div class="item-after">{{detail.time}}</div>
                            </div>
                            <div class="item-title-row">
                                <div class="item-subtitle">
                                    <i class="fa fa-user-o fa-fw" ></i>
                                    记录人
                                </div>
                                <div class="item-after">{{detail.recorder}}</div>
                            </div>
                            <div class="hr"></div>
                            <div class="item-subtitle">
                                <i class="fa fa-map-o fa-fw" ></i>详情</div>
                            <div class="item-text">{{detail.detail}}</div>
                            <div class="hr"></div>
                            <div class="item-subtitle">
                                <i class="fa fa-bookmark-o fa-fw" ></i>凭据</div>
                            <div class="item-media"><img src="http://gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i3/TB10LfcHFXXXXXKXpXXXXXXXXXX_!!0-item_pic.jpg_250x250q60.jpg" style='width: 100%;'></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>
    <script>
        var id=document.getElementById('id').value;
        jQuery.post('management-account.php?action=getDetail',{id:id},function (data) {
            console.log(data);
            jsonData=JSON.parse(data);
            var getData=new Vue({
               el:'#detail-content',
                data:{
                   detail:jsonData
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
        });
    </script>
</body>
</html>