<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/struct.css" />
    <script src="__PUBLIC__/js/jquery-1.7.1.min.js"></script>
    <title>企业首页</title>
</head>

<body>
<div class="wrapper" id="TheadWrapper">
    <div class="inner">
    </div>
</div>
<style>
    .UctrlItem{
        margin-top:20px;
    }
</style>
<div class="wrapper" id="headerWrapper">
    <div class="inner" style="height:67px;">
        <div id="Uname" class="f" style="text-align: center; padding-top: 20px;"><?php echo ($username); ?></div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/settingUserLogin.png"  width="23"  height="21" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__ROOT__/" title="" target="_self">登出</a></span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/change_password" title="" target="_blank">修改密码</a></span>
        </div>
      <!--  <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/edit_profile" title="" target="_self">修改基本资料</a></span>
        </div>-->
        <div class="clear"></div>
    </div>
</div>
<div class="wrapper" id="NavWrapper">
    <div class="inner">
        <div class="navItem">
            <span><img src="__PUBLIC__/img/homeIcon.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/enterprise" target="_self">首页</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/manage_page" target="_blank">人才库</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/mailbox" target="_blank">邮箱</a></span>
        </div>
    <!--    <div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/profile" target="_blank">公司档案</a></span>
        </div>-->
        <div class="clear"></div>
    </div>
</div>
<br />

 
<link  rel="stylesheet" href="__PUBLIC__/css/enterprise.css" type="text/css"/>
<div class="container" >
	<div class="table">
		<h2 align="center">创建公司账号</h2>
		<form method="post" action="__URL__/_createCompany">
			<table>
					<tr>
						<td>账号ID：</td>
						<td>COM_<input id="name" type="text" name="cid" class="text" /></td>
					</tr>
					
					<tr>
						<td>名称：</td>
						<td><input type="text" name="cname" class="text"/></td>
					</tr>
					<tr>
						<td>电话：</td>
						<td><input  type="text" name="tel" class="text" /></td>
					</tr>
					<tr>
						<td>邮箱：</td>
						<td><input type="text" name="email" class="text" /></td>
					</tr>
					<tr>
						<td>地址：</td>
						<td><input type="text" name="address" class="text" /></td>
					</tr>
					<tr>
						<td>网站：</td>
						<td><input type="text" name="net_addr" class="text" /></td>
					</tr>
					<tr>
						<td>类别：</td>
						<td>
							<select name="class">
										<option value="互联网/IT服务" selected>互联网/IT服务</option>
										<option value="电子商务">电子商务</option>
										<option value="通信/硬件">通信/硬件</option>
										<option value="银行/金融">银行/金融</option>
										<option value="会计/审计">会计/审计</option>
										<option value="管理/物流">管理/物流</option>
										<option value="出版/广告">出版/广告</option>
										<option value="政府/机构">政府/机构</option>
										<option value="医疗/卫生">医疗/卫生</option>
										<option value="娱乐/服务">娱乐/服务</option>
										<option value="科研/学校">科研/学校</option>
							</select>
						</td>
					</tr>
			</table>
			 <br/>
				 <br />
				 <input type="button" id="submit" class="submit" value="提交"/> 
				 <input type="submit" style="display:none" id="final_submit"/>
		</form>
	</div>

</div>
<script>
$(document).ready(function(){
	$("#submit").click(function(){
		var submit = true;
		$("td>input").each(function(){
			if (!submit) return;
			if ($(this).val() == "")
			{
				alert("请将信息填写完整再提交！");
				submit = false;
				return;
			}
		});
		if (submit)
			$("#final_submit").click();
	});
});
</script>
</body>
</html>