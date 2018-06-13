<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"C:\xampp\htdocs\AirTicketReservation\public/../application/index\view\admin\index.html";i:1528880101;s:76:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\base.html";i:1528804382;s:78:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\header.html";i:1528849477;s:76:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\anav.html";i:1528878383;s:78:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\footer.html";i:1528644870;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>机票预订系统</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="/AirTicketReservation/public/static/bootstrap/css/bootstrap.min.css" />-->
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo url('index/admin/index'); ?>">ATR</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">机票查询</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(!USER_ID): ?>
                <li class=""><a href="<?php echo url('admin/login'); ?>">管理员登陆</a></li>
                <?php else: ?>
                <li><a href="<?php echo url('admin/index'); ?>">
                    <?php echo session('user_info.username'); ?>
                </a>
                </li>
                <li><a href="<?php echo url('admin/logout'); ?>">退出登录</a></li>
                <?php endif; ?>
                <ul/>

                <!--<ul class="nav navbar-nav navbar-right">-->
                <!--<li><a href="<?php echo url('Admin/login'); ?>">管理员登录</a></li>-->
                <!--<li><a href="<?php echo url('User/login'); ?>">用户登录</a></li>-->
                <!--<li><a href="<?php echo url('User/reg'); ?>">注册</a></li>-->
                <!--</ul>-->
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header"><h3>查询航班</h3></div>
            <div class="">
                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation"><a id="select" href="#">刷新</a></li>
                        <li role="presentation"><a id="create" href="#">增加</a></li>
                        <li role="presentation"><a id="update" href="#">修改</a></li>
                        <li role="presentation"><a id="delete" href="#">删除</a></li>
                    </ul>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4 id="flight_title" style="align-content: center">所有航班</h4></div>
                    <div class="panel-body">
                        <!--警告框  正确-->
                        <div class="alert alert-danger" role="alert" style="display: none"></div>
                        <!--警告框 错误-->
                        <div class="alert alert-info"   role="alert" style="display: none"></div>

                        <!--表单 刷新 默认状态 隐藏-->
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputName2">Name</label>
                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                            </div>
                            <button type="submit" class="btn btn-default">Send invitation</button>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                            </div>
                        </form>

                        <form id="fselect_form" style="display: none">
                            <table  class="table table-striped table-hover">
                                <tr>
                                    <th>多选</th>
                                    <th>航班号</th>
                                    <th>起飞地</th>
                                    <th>目的地</th>
                                    <th>价格</th>
                                    <th>状态</th>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                </tr>
                            </table>
                        </form>

                        <!--表单 增加 默认状态 隐藏-->
                        <form id="fcreate_form" class="form" method="post" style="display: none" >
                            <table class="table table-striped table-hover table-condensed">
                                <tr>
                                    <th>字段</th>
                                    <th>值</th>
                                </tr>
                                <tr>
                                    <td>航班</td>
                                    <td><label><input type="text" name="flight_name"></label></td>
                                </tr>
                                <tr>
                                    <td>起飞地</td>
                                    <td><label><input type="text" name="departurePlace"></label></td>
                                </tr>
                                <tr>
                                    <td>目的地</td>
                                    <td><label><input type="text" name="destination"></label></td>
                                </tr>
                                <tr>
                                    <td>起飞时间</td>
                                    <td><label><input type="text" name="fly_time" placeholder="2000-01-01 00:00:00"></label></td>
                                </tr>
                                <tr>
                                    <td>价格</td>
                                    <td><label><input type="text" name="price"></label></td>
                                </tr>
                                <tr>
                                    <td>状态</td>
                                    <td><label><input type="text" name="status"></label></td>
                                </tr>
                            </table>
                            <div>
                                <button type="button" class="create_btn btn btn-default btn-lg" style="width:49.5%">提交</button>
                                <button type="reset" class="btn btn-default btn-lg" style="width:49.5%">重置</button>
                            </div>
                        </form>

                        <!--表单 修改 默认状态 隐藏-->
                        <form id="fupdate_form" style="display: none">
                            <table class="table table-striped table-hover table-condensed">
                                <tr>
                                    <th>字段</th>
                                    <th>值</th>
                                </tr>
                                <tr>
                                    <td>航班</td>
                                    <td><label><input type="text" name="flight_name"></label></td>
                                </tr>
                                <tr>
                                    <td>起飞地</td>
                                    <td><label><input type="text" name="departurePlace"></label></td>
                                </tr>
                                <tr>
                                    <td>目的地</td>
                                    <td><label><input type="text" name="destination"></label></td>
                                </tr>
                                <tr>
                                    <td>起飞时间</td>
                                    <td><label><input type="text" name="fly_time" placeholder="2000-01-01 00:00:00"></label></td>
                                </tr>
                                <tr>
                                    <td>价格</td>
                                    <td><label><input type="text" name="price"></label></td>
                                </tr>
                                <tr>
                                    <td>状态</td>
                                    <td><label><input type="text" name="status"></label></td>
                                </tr>
                            </table>
                            <div>
                                <button type="button" class="create_btn btn btn-default btn-lg" style="width:49.5%">提交</button>
                                <button type="reset" class="btn btn-default btn-lg" style="width:49.5%">重置</button>
                            </div>
                        </form>

                        <!--表单 删除 默认状态 隐藏-->
                        <form id="fdelete_form" style="display: none"></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-header"><h3>查询订单</h3></div>
        </div>
    </div>
</div>

<!--按钮的js脚本-->


<!--要将jquery的引入放到js代码之前-->
<script type="text/javascript" src="/AirTicketReservation/public/static/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/AirTicketReservation/public/static/bootstrap/js/bootstrap.min.js"></script>


<script>
//    刷新
    $("#select").click(function(){
        $("#flight_title").html('所有航班');
        $("#fselect_form").show();
        $("#fcreate_form").hide();
        $("#fupdate_form").hide();
        $("#fdelete_form").hide();
        $(".alert-danger").hide();
        $(".alert-info").hide();

    });
//    增加
    $("#create").click(function(){
        $("#flight_title").html('添加航班');
        $("#fcreate_form").show();
        $("#fselect_form").hide();
        $("#fupdate_form").hide();
        $("#fdelete_form").hide();
        $(".alert-danger").hide();
        $(".alert-info").hide();
    });

//    修改
    $("#update").click(function(){
        $("#flight_title").html('修改航班');
        $("#fupdate_form").show();
        $("#fselect_form").hide();
        $("#fcreate_form").hide();
        $("#fdelete_form").hide();
        $(".alert-danger").hide();
        $(".alert-info").hide();
    });

//    删除
    $("#delete").click(function(){
        $("#flight_title").html('删除航班');
        $("#fdelete_form").show();
        $("#fselect_form").hide();
        $("#fcreate_form").hide();
        $("#fupdate_form").hide();
        $(".alert-danger").hide();
        $(".alert-info").hide();
    });

//    ajax增加请求
    $(".create_btn").click(function(){

        $.ajax({
            type: 'post',
            url: "<?php echo url('index/admin/addFlight'); ?>",
            data: $("#fcreate_form").serialize(),
            success: function(data) {
                if(data.status){
                    $('.alert-info').show().html(data.msg);
                    $('.alert-danger').hide();
                    setTimeout(function(){
                        window.location.href = "<?php echo url('index/admin/index'); ?>";
                    },1000);
                }
                else{
                    $('.alert-danger').show().html(data.msg);
                    $('.alert-info').hide();
                }
            }
        });
    });
</script>


</body>
</html>