<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>账目管理</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="css/sm.min.css">
    <link rel="stylesheet" href="css/sm-extend.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/account-management.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="page">
    <header class="bar bar-nav">
        <h1 class="title">账目管理</h1>
    </header>
    <?php
    $cookie = isset($_COOKIE['identity']) ? $_COOKIE['identity'] : null;
    if ($cookie == null) {
        echo '<script>alert("请先登录！");location.href="login.html"</script>';
    } else if ($cookie == 1) {
        echo '<nav class="bar bar-tab">
    <a class="tab-item external" href="home.php">
        <span class="icon icon-home"></span>
        <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external active" href="account-management.html">
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
    } else if ($cookie == 2) {
        echo '<nav class="bar bar-tab">
    <a class="tab-item external" href="home.php">
        <span class="icon icon-home"></span>
        <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external active" href="account-management.html">
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
    ?>
    <div class="content">
        <div class="content-block">
            <p><a href="#" class="open-popup button button-fill button-success button-big" data-popup=".popup-add">
                    <i class="fa fa-plus fa-fw"></i>
                    添加账目</a></p>
        </div>
        <div class="list-block media-list">
            <ul id="list">
                <li v-for="item in items">
                    <a class="item-link item-content">
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
                    <div class="content-button">
                        <input type="hidden" :value="item.id">
                        <input type="hidden" :value="item.title">
                        <input type="hidden" :value="item.time">
                        <input type="hidden" :value="item.type">
                        <input type="hidden" :value="item.money">
                        <input type="hidden" :value="item.detail">
                        <p class="buttons-row">
                            <a href="#" class="open-popup button button-fill modify-button" data-popup=".popup-modify">
                                <i class="fa fa-pencil fa-fw"></i>
                                编辑</a>
                        <form action="management-account.php?action=deleteAccount" method="post">
                            <input type="hidden" :value="item.id" name="id">
                            <a href="#" class="button button-danger button-fill delete-button">
                                <i class="fa fa-trash fa-fw"></i>
                                删除</a>
                        </form>
                        </p>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!--添加账目的popup-->
    <div class="popup popup-add">
        <div class="content-block">
            <form action="management-account.php?action=addAccount" id="addForm" method="post">
                <div class="list-block">
                    <ul>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目项目</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="account name" id="title" name="title">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">产生日期</div>
                                    <div class="item-input">
                                        <input type="text" class='datetime-picker' id="time" name="time">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目类型</div>
                                    <div class="item-input">
                                        <input type="text" class="picker" id="type" name="type">
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">金额</div>
                                    <div class="item-input">
                                        <input type="text" id="money" name="money">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="align-top">
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-comment"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目详情</div>
                                    <div class="item-input">
                                        <textarea name="detail" form="addForm"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                       <!-- <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label" style="width: 25%">凭据</div>
                                    <div class="item-input">
                                        <input type="file" class="" multiple>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a>
                        </div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success"
                                               onclick="submit()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--修改账目的popup-->
    <div class="popup popup-modify">
        <div class="content-block">
            <form action="management-account.php?action=modifyAccount" id="form-modify" method="post">
                <div class="list-block">
                    <ul>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目项目</div>
                                    <div class="item-input">
                                        <input type="hidden" name="id" id="id-modify">
                                        <input type="text" placeholder="account name" id="title-modify" name="title">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">产生日期</div>
                                    <div class="item-input">
                                        <input type="text" class='datetime-picker' id="time-modify" name="time">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目类型</div>
                                    <div class="item-input">
                                        <input type="text" class="picker" id="type-modify" name="type">
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">金额</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="金额" name="money" id="money-modify">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="align-top">
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-comment"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账目详情</div>
                                    <div class="item-input">
                                        <textarea name="detail" form="form-modify" id="detail-modify"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--<li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label" style="width: 25%">凭据</div>
                                    <div class="item-input">
                                        <input type="file" class="" multiple name="file" id="file">
                                    </div>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a>
                        </div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success"
                                               onclick="submitModify()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.0.0.js"></script>
    <script src="js/vue.min.js"></script>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>
    <script>
        window.$$=window.Zepto = Zepto;
        $$(".picker").picker({
            toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">账目类型</h1>\
  </header>',
            cols: [
                {
                    textAlign: 'center',
                    values: ['支出', '收入']
                }
            ]
        });

        $$(".datetime-picker").calendar({
            dateFormat: 'yyyy-mm-dd'
        });
    </script>
    <script>
        function submit() {
            var form = document.getElementById('addForm');
            form.submit();
        }
        function submitModify() {
            var form = document.getElementById('form-modify');
            form.submit();
        }
        //获取总览信息
        jQuery.get('management-account.php?action=getTotal',function (data) {
            if(data==='SQL执行失败0'){
                return false;
            }
            var totalData=JSON.parse(data);
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

            //给删除按钮绑定功能
            (function bindDelete() {
                var deleteButton=document.querySelectorAll('.delete-button');
                for(var i=0;i<deleteButton.length;i++){
                    deleteButton[i].onclick=function () {
                        var form=this.parentNode;
                        form.submit();
                    }
                }
            })();

            //给修改按键绑定功能
            (function () {
                //获取修改表单元素
                var id=document.getElementById('id-modify');
                var title=document.getElementById('title-modify');
                var time=document.getElementById('time-modify');
                var type=document.getElementById('type-modify');
                var money=document.getElementById('money-modify');
                var detail=document.getElementById('detail-modify');

                //获取点击元素的信息
                var modifyButton=document.getElementsByClassName('modify-button');
                for(var i=0;i<modifyButton.length;i++) {
                    modifyButton[i].onclick = function () {
                        var inputId = this.parentNode.parentNode.childNodes[0];
                        var inputTitle = this.parentNode.parentNode.childNodes[2];
                        var inputTime = this.parentNode.parentNode.childNodes[4];
                        var inputType = this.parentNode.parentNode.childNodes[6];
                        var inputMoney = this.parentNode.parentNode.childNodes[8];
                        var inputDetail = this.parentNode.parentNode.childNodes[10];

                        id.value = inputId.value;
                        title.value = inputTitle.value;
                        time.value = inputTime.value;
                        if(inputType.value==='1'){
                            type.value='收入';
                        }
                        else if(inputType.value==='0'){
                            type.value='支出';
                        }
                        money.value = inputMoney.value;
                        detail.innerText = inputDetail.value;
                    }
                }

            })();


        });
    </script>

</body>
</html>