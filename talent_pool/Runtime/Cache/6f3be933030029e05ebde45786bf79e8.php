<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/struct.css" />
<script src="__PUBLIC__/js/jquery-1.7.1.min.js"></script>
<title>学生页面</title>
</head>

<body>
<div class="wrapper" id="TheadWrapper">
	<div class="inner">
    	<div id="logo">企业大学人才库</div>
    </div>
</div>

<div class="wrapper" id="headerWrapper">
	<div class="inner">
    	<div id="Uname" class="f"> <?php echo ($username); ?> </div>
         <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/settingUserLogin.png"  width="23"  height="21" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span id="logout">登出</span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span id="change_password">修改密码</span>
        </div>

    <div class="clear"></div>
    </div>
</div>

<div class="wrapper" id="NavWrapper">
	<div class="inner">
    	<div class="navItem">
            <span><img src="__PUBLIC__/img/homeIcon.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/student" target="_self">首页</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/mailbox" target="_self">邮箱</a></span>
        </div>
    	<div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/student" target="_self">个人档案</a></span>
        </div>
        <div class="clear"></div>
    </div>
</div>
		<script>
			$(document).ready(function(){
				$("#logout").click(function(){
					window.location.href="__ROOT__";
				});
				$("#change_password").click(function(){
					window.location.href="__URL__/change_password";
				});
			});
		</script>
<br /> 
<style>
#contentWrapper{
	margin-bottom:20px;
	border-bottom:none;
}
#contentWrapper .inner{
	height: 460px;
	padding:15px;
}
#contentWrapper .inner form{
	width: 430px;
	height: 330px;
	padding: 20px 9px 70px 90px;
	background: white;
	color: #A39999;
	border: solid #F3F3F3 1px;
	border-radius: 10px;
	margin: auto;
	margin-top: 10px;
	font-size: 18px;
	position:relative;
}
#contentWrapper .inner form input[type=password]{
	color: #979B9C;
	font-size: 20px;
	background: #FCFCFC;
	border: solid #CECECE 1px;
	width: 300px;
	margin-top: 18px;
	border-radius: 3px;
	outline: none;
	padding: 5px;
	
}
#contentWrapper .inner form input[type=button]{
	position: absolute;
	bottom: 20px;
	right: 20px;
	padding: 5px 17px;
	font-size: 20px;
	color: #9BC9EE;
	background: white;
	font-weight: bold;
	cursor: pointer;
	border-radius: 30px;
}
#contentWrapper .inner form input[type=button]:hover{
	background-color:#09F;
	color:white;
}
</style>
<div class="wrapper" id="contentWrapper">
 	<div class="inner">
    	<form method="post" action="__URL__/modify_password">
            <p>您现在的密码:<br /><input name="old_password" type="password" /></p>
            <p>请输入新密码:<br /><input id="new_password" name="new_password" type="password" /></p>
            <p>请再次输入新密码:<br /><input id="new_password_again" type="password" /></p>
            <br />
            <input id="check" type="button" value="更改"/>
			<input style="display:none" id="submit" type="submit" value="更改"/>
    	</form>
    </div>
</div>
<div class="wrapper" id="footerWrapper">
	<div class="inner">
    </div>
</div>
<script>
	$(document).ready(function(){
	$("#check").click(function(){
		var bo = ($("#new_password").val() == $("#new_password_again").val());
		if (!bo) 
			alert("您两次输入的新密码不一致!");
		var boo = ($("#new_password").val().length >= 6);
		if (!boo) 
			alert("请将密码设定为长度大于等于6");
		if (bo&&boo){
			$("#submit").click();
		}
	});
	});
</script>
</body>
</html>