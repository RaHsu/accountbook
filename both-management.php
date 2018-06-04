<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户管理</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="js/jquery-3.0.0.js"></script>
    <script src="js/vue.min.js"></script>
    <link rel="stylesheet" href="css/sm.min.css">
    <link rel="stylesheet" href="css/sm-extend.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/account-management.css">
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
        <h1 class="title">用户管理</h1>
    </header>
    <nav class="bar bar-tab">
        <a class="tab-item external" href="home-superadmin.php">
            <span class="icon icon-home"></span>
            <span class="tab-label">主页</span>
        </a>
        <a class="tab-item external" href="account-management.php">
            <span class="icon icon-edit"></span>
            <span class="tab-label">账目</span>
        </a>
        <a class="tab-item external active" href="both-management.php">
            <span class="icon icon-settings"></span>
            <span class="tab-label">管理</span>
        </a>
        <a class="tab-item external" href="me.php">
            <span class="icon icon-me"></span>
            <span class="tab-label">我</span>
        </a>
    </nav>
    <div class="content">
        <div class="buttons-tab">
            <a href="#admin" class="tab-link active button">管理员管理</a>
            <a href="#user" class="tab-link button">用户管理</a>
        </div>
        <div class="content-block">
            <div class="tabs">
                <div id="admin" class="tab active">
                    <p><a href="#" class="open-popup button button-fill button-success button-big" data-popup=".popup-add-admin">
                        <i class="fa fa-plus fa-fw" ></i>
                        添加管理员</a></p>
                    <div class="list-block media-list">
                        <ul id="adminList">
                            <li v-for="item in items">
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">{{item.account}}</div>
                                            <div class="item-after">{{item.realname}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-button">
                                    <p class="buttons-row">
                                        <input type="hidden" :value="item.id" name="id">
                                        <a class="open-popup button button-fill modify-admin-button" data-popup=".popup-modify-admin">
                                            <i class="fa fa-pencil fa-fw" ></i>
                                            编辑</a>
                                    <form action="management-user.php?action=deleteUser" method="post">
                                        <input type="hidden" :value="item.id" name="id">
                                        <a href="#" class="button button-danger button-fill delete-button">
                                            <i class="fa fa-trash fa-fw" ></i>
                                            删除</a>
                                    </form>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="user" class="tab">
                    <p><a href="#" class="open-popup button button-fill button-success button-big" data-popup=".popup-add-user">
                        <i class="fa fa-plus fa-fw" ></i>
                        添加用户</a></p>
                    <div class="list-block media-list">
                        <ul id="userList">
                            <li v-for="item in items">
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">{{item.account}}</div>
                                            <div class="item-after">{{item.realname}}</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="content-button">
                                    <p class="buttons-row">
                                        <input type="hidden" :value="item.id" name="id">
                                        <a href="#" class="open-popup button button-fill modify-user-button" data-popup=".popup-modify-user">
                                            <i class="fa fa-pencil fa-fw" ></i>
                                            编辑</a>
                                    <form action="management-user.php?action=deleteUser" method="post">
                                        <input type="hidden" :value="item.id" name="id">
                                        <a href="#" class="button button-danger button-fill delete-button">
                                            <i class="fa fa-trash fa-fw" ></i>
                                            删除</a>
                                    </form>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--添加管理员的popup-->
    <div class="popup popup-add-admin">
        <div class="content-block">
            <form action="management-user.php?action=addAdmin" id="form0" method="post">
                <div class="list-block">
                    <ul>

                        <!-- Text inputs -->
                        <li>

                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账号</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="account name" name="account" id="account0">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密码</div>
                                    <div class="item-input">
                                        <input type="password" placeholder="password" name="password" id="password0">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">真实姓名</div>
                                    <div class="item-input">
                                        <input type="text" name="realname" id="realname0">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a></div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success" onclick="submit0()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--修改管理员的popup-->
    <div class="popup popup-modify-admin">
        <div class="content-block">
            <form action="management-user.php?action=modifyUser" id="form1" method="post">
                <div class="list-block">
                    <ul>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账号</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="account name" name="account" id="account1">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密码</div>
                                    <div class="item-input">
                                        <input type="password" placeholder="password" name="password" id="password1">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">真实姓名</div>
                                    <div class="item-input">
                                        <input type="text" name="realname" id="realname1">
                                        <input type="hidden" name="id" id="id1">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a></div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success" onclick="submit1()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--添加用户的popup-->
    <div class="popup popup-add-user">
        <div class="content-block">
            <form action="management-user.php?action=addUser" id="form2" method="post">
                <div class="list-block">
                    <ul>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账号</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="account name" name="account" id="account2">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密码</div>
                                    <div class="item-input">
                                        <input type="password" placeholder="password" name="password" id="password2">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">真实姓名</div>
                                    <div class="item-input">
                                        <input type="text" name="realname" id="realname2">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a></div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success" onclick="submit2()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--修改用户的popup-->
    <div class="popup popup-modify-user">
        <div class="content-block">
            <form action="" id="form">
                <div class="list-block">
                    <ul>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账号</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="account name" id="account3" name="account">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Date -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密码</div>
                                    <div class="item-input">
                                        <input type="password" placeholder="password" id="password3" name="password">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-password"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">真实姓名</div>
                                    <div class="item-input">
                                        <input type="text" name="realname" id="realname3">
                                        <input type="hidden" id="id3" name="id">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-block">
                    <div class="row">
                        <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a></div>
                        <div class="col-50"><a href="#" class="button button-big button-fill button-success" onclick="submit()">提交</a></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm.js' charset='utf-8'></script>
    <script type='text/javascript' src='js/sm-extend.min.js' charset='utf-8'></script>
    <script src="js/common.js"></script>
    <script>
        $.noConflict();

        function submit0() {
            var form = document.getElementById("form0");
            var account = document.getElementById('account0').value;
            var password = document.getElementById('password0').value;
            var realname = document.getElementById('realname0').value;
            if(isEmpty(account) === false){
                $.alert('用户名不能为空');
                return false;
            }
            else if(isLegal(account) === false){
                $.alert('用户名含有非法字符');
                return false;
            }
            else if(isEmpty(password) === false){
                $.alert('密码不能为空');
                return false;
            }
            else if(isLegal(password) === false){
                $.alert('密码含有非法字符');
                return false;
            }
            else if(isEmpty(realname) === false){
                $.alert('真实姓名不能为空');
                return false;
            }
            else if(isLegal(realname) === false){
                $.alert('真实姓名含有非法字符');
                return false;
            }
            else{
                form.submit();
            }
        }
        function submit1() {
            var form = document.getElementById("form1");
            var account = document.getElementById('account1').value;
            var password = document.getElementById('password1').value;
            var realname = document.getElementById('realname1').value;
            if(isEmpty(account) === false){
                $.alert('用户名不能为空');
                return false;
            }
            else if(isLegal(account) === false){
                $.alert('用户名含有非法字符');
                return false;
            }
            else if(isEmpty(password) === false){
                $.alert('密码不能为空');
                return false;
            }
            else if(isLegal(password) === false){
                $.alert('密码含有非法字符');
                return false;
            }
            else if(isEmpty(realname) === false){
                $.alert('真实姓名不能为空');
                return false;
            }
            else if(isLegal(realname) === false){
                $.alert('真实姓名含有非法字符');
                return false;
            }
            else{
                form.submit();
            }
        }
        function submit2() {
            var form = document.getElementById("form2");
            var account = document.getElementById('account2').value;
            var password = document.getElementById('password2').value;
            var realname = document.getElementById('realname2').value;
            if(isEmpty(account) === false){
                $.alert('用户名不能为空');
                return false;
            }
            else if(isLegal(account) === false){
                $.alert('用户名含有非法字符');
                return false;
            }
            else if(isEmpty(password) === false){
                $.alert('密码不能为空');
                return false;
            }
            else if(isLegal(password) === false){
                $.alert('密码含有非法字符');
                return false;
            }
            else if(isEmpty(realname) === false){
                $.alert('真实姓名不能为空');
                return false;
            }
            else if(isLegal(realname) === false){
                $.alert('真实姓名含有非法字符');
                return false;
            }
            else{
                form.submit();
            }
        }
        function submit3() {
            var form = document.getElementById("form3");
            var account = document.getElementById('account3').value;
            var password = document.getElementById('password3').value;
            var realname = document.getElementById('realname3').value;
            if(isEmpty(account) === false){
                $.alert('用户名不能为空');
                return false;
            }
            else if(isLegal(account) === false){
                $.alert('用户名含有非法字符');
                return false;
            }
            else if(isEmpty(password) === false){
                $.alert('密码不能为空');
                return false;
            }
            else if(isLegal(password) === false){
                $.alert('密码含有非法字符');
                return false;
            }
            else if(isEmpty(realname) === false){
                $.alert('真实姓名不能为空');
                return false;
            }
            else if(isLegal(realname) === false){
                $.alert('真实姓名含有非法字符');
                return false;
            }
            else{
                form.submit();
            }
        }

        /*vue获取数据*/

        //json获取admin后台数据
        jQuery.get('management-user.php?action=getAdmin',function (data) {
            if(data==='SQL执行失败0'){
                var adminDiv=jQuery('.list-block')[0];
                var adminList=jQuery('#adminList')[0];

                adminDiv.removeChild(adminList);

                var tip=document.createElement('h2');
                tip.innerText='你还没有设置管理员哦！';
                adminDiv.appendChild(tip);

                return false;
            }
            var adminData=JSON.parse(data);
            var admin=new Vue({
                el:'#adminList',
                data:{
                    items:adminData
                }
            });


            /*给修改管理员按钮绑定事件*/
            var modifyButton=document.getElementsByClassName('modify-admin-button');
            for(var i=0;i<modifyButton.length;i++){
                modifyButton[i].onclick=function(){
                    var formAccount=document.getElementById('account1');
                    var formRealname=document.getElementById('realname1');
                    var formId=document.getElementById('id1');
                    console.log(formId);

                    var inputAccount = this.parentNode.parentNode.previousSibling.previousSibling.firstChild.firstChild.firstChild;
                    var inputRealname = this.parentNode.parentNode.previousSibling.previousSibling.firstChild.firstChild.childNodes[2];
                    var inputID = this.previousSibling.previousSibling;

                    //对input框赋值
                    formAccount.value=inputAccount.innerText;
                    formRealname.value=inputRealname.innerText;
                    formId.value=inputID.value;
                }
            }

        });

        //json获取user后台数据
        jQuery.get('management-user.php?action=getUser',function (data) {
            if(data==='SQL执行失败0'){
                var userDiv=jQuery('.list-block')[1];
                var userList=jQuery('#userList')[0];

                userDiv.removeChild(userList);

                var tip=document.createElement('h2');
                tip.innerText='现在还没有任何用户哦!';
                userDiv.appendChild(tip);

                return false;
            }
            var userData=JSON.parse(data);
            var user=new Vue({
                el:'#userList',
                data:{
                    items:userData
                }
            });

            /*给删除按键绑定事件*/
            (function bindDelete() {
                var deleteButton=document.querySelectorAll('.delete-button');
                for(var i=0;i<deleteButton.length;i++){
                    deleteButton[i].onclick=function () {
                        var form=this.parentNode;
                        form.submit();
                    }
                }
            })();

            /*给修改用户按钮绑定事件*/
            var modifyButton=document.getElementsByClassName('modify-user-button');
            for(var i=0;i<modifyButton.length;i++){
                modifyButton[i].onclick=function(){
                    var formAccount=document.getElementById('account3');
                    var formRealname=document.getElementById('realname3');
                    var formId=document.getElementById('id3');

                    var inputAccount = this.parentNode.parentNode.previousSibling.previousSibling.firstChild.firstChild.firstChild;
                    var inputRealname = this.parentNode.parentNode.previousSibling.previousSibling.firstChild.firstChild.childNodes[2];
                    var inputID = this.previousSibling.previousSibling;

                    //对input框赋值
                    formAccount.value=inputAccount.innerText;
                    formRealname.value=inputRealname.innerText;
                    formId.value=inputID.value;
                }
            }

        });




    </script>

</body>
</html>