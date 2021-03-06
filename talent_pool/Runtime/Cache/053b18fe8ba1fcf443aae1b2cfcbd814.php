<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/struct.css" />
		<script src="__PUBLIC__/js/jquery-1.7.1.min.js"></script>
		<title>教师页面</title>
	</head>

	<body>
		<div class="wrapper" id="TheadWrapper">
			<div class="inner">
				<div id="logo">企业大学人才库</div>
			</div>
		</div>

		<div class="wrapper" id="headerWrapper">
			<div class="inner">
				<div id="Uname" class="f"><?php echo ($username); ?></div>
				<div class="UctrlItem">
					<span><img src="__PUBLIC__/img/settingUserLogin.png"  width="23"  height="21" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a href="__ROOT__/" title="" target="_self">登出</a></span>
				</div>
				<div class="UctrlItem">
					<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/change_password" title="" target="_self">修改密码</a></span>
				</div>
				<div class="UctrlItem">
					<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/edit_profile" title="" target="_self">修改基本资料</a></span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wrapper" id="NavWrapper">
			<div class="inner">
				<div class="navItem">
					<span><img src="__PUBLIC__/img/homeIcon.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a target="_self" href="__URL__/teacher.html">首页</a></span>
				</div>
				<div class="navItem">
					<span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a target="_self" href="__URL__/mailbox.html">邮箱</a></span>
				</div>
				<div class="navItem">
					<span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a target="_self" href="__URL__/profile">个人档案</a></span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<br /> 


<style>

#Info{
	width:100%;
	border: 1px solid #EBEBEB;
	background: white;
}
#Info>div{
	border-bottom: 1px solid #EBEBEB;
	min-height:30px;
	padding: 1px;
	padding:5px 30px 20px 30px;
	background:url(__PUBLIC__/img/20120825104630.png) repeat-y;
}
#Info .infoName,#Info .infoContent{
	float:left;
	height:100%;
}
#Info .infoName{
	width: 83px;
	color: #494747;
	font-size: 16px;
	font-weight: normal;
	
}
#Info .infoContent{
	width:808px;
	height:100%;
	padding-left: 40px;
	color: gray;
	font-size: 15px;
}
#table_title{
	margin-right: 50px;
}
tr{
	height:40px;
}
td{
	padding-right:50px;
}
.td_title{
	font-weight:bold;
}
</style>
<div class="wrapper" id="contentWrapper" style="border-bottom:none;">
 <div class="inner" style="padding:0px; ">
 	<div id="Info">
         <div>
            <div class="infoName" id="table_title">
                <h3>基本信息</h3>
            </div>
			<div class="infocontent" id="basicinfo">
			<table>
				<tr>
					<td class="td_title">
						姓名：
					</td>
					<td id="tname">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						职位：
					</td>
					<td id="position">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						学校：
					</td>
					<td id="university">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						地址：
					</td>
					<td id="address">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						电话：
					</td>
					<td id="tel">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						邮箱：
					</td>
					<td id="email">
					</td>
				</tr>
				<tr>
					<td class="td_title">
						注册时间：
					</td>
					<td id="reg_time">
					</td>
				</tr>
			</table>
			</div>
            <div class="clear"></div>
         </div> 
         <div>
            <div class="infoName">
                <h3>个人简介</h3>
            </div>
            <div class="infoContent" id="profile">
			</div>
            <div class="clear"></div>
         </div> 
       <!--  <div>
            <div class="infoName">
                <h3>其他</h3>
            </div>
            <div class="infoContent">
			</div>
            <div class="clear"></div>
         </div> -->
    </div>
 </div>
</div>
<script>
	$(document).ready(function(){
		var json = <?php echo ($getJson); ?>;
		json = eval(json);
		var names = new Array("tname", "position", "university", "address", "tel", "email", "reg_time", "profile");
		
		for (var x in names){
			var name = names[x];
			$("#"+name).html(json[name]);
		}
	});
</script>
</body>
</html>