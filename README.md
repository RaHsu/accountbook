## accountbook

accountbook是基于php的账本webapp，并使用[vue.js](https://cn.vuejs.org/)和[framework7](http://framework7.taobao.org/)框架，你可以在自己的服务器上部署它。

### 功能
accountbook是一个适合群体使用的账本，账户属于一个群体，群体中的成员可以发布账目。页面采用移动端app的结构设计，适合移动端用户访问。在桌面端的用户体验就不如移动端了。

- 超级管理员
    - 发布，查看，删除，修改账目
    - 添加，修改，删除，查看管理员信息
    - 审核由普通用户提交的账目
    - 修改自己的信息

- 管理员
    - 发布，查看，删除，修改账目
    - 审核由普通用户提交的账目
    - 修改自己的信息

- 普通用户
    - 查看账目信息
    - 提交账目申请
    - 修改自己的信息

你可以[在这里](http://123.207.226.113/accountbook/login.html)查看示例app。（账号：superadmin，密码：111111，请不要修改superadmin的信息，superadmin的身份为超级管理员）

### 在服务器上部署
###### 首先将整个项目克隆到本地
请将项目放在你的服务器文件夹中，并自行为其创建路由。
```
$ git clone git://github.com/RaHsu/accountbook.git
```

###### 导入数据库
新建一个数据库，名执行`accountbook.sql`脚本。这个app所需要的数据表就会导入到你的数据库中。（脚本中包含一个超级管理员的账号信息作为初始设置）

###### 修改文件中的配置信息
打开`common.php`文件，在第`9`行中填写你的路由，数据库用户名，数据库密码，数据库名称。
```php
$mydb = mysqli_connect("localhost","username","password","dbname");
```
在第`19`行再次填写你的数据库名称。
```php
mysqli_select_db($mydb,'dbname');
```

接下来就可以在浏览器中输入项目主页`login.php`的路由,使用默认超级管理员的账号登录页面（用户名：superadmin，密码：111111）。部署完成。

### License
MIT
