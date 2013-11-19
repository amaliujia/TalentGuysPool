<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link  rel="stylesheet" type="text/css" href="__PUBLIC__/css/struct.css" />
<link  rel="stylesheet" type="text/css" href="__PUBLIC__/css/acounts_admin.css" />
<title>账号管理</title>

</head>

<body>

<div class="wrapper" id="TheadWrapper">
	<div class="inner">
    	<div id="logo">企业大学人才库</div>
    </div>
</div>


<div class="wrapper" id="headerWrapper">
	<div class="inner">
    	<div id="Uname" class="f"> 陈学家 </div>
         <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/settingUserLogin.png"  width="23"  height="21" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span id="logout">登出</span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span id="change_password">修改密码</span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span id="edit_profile">修改基本资料</span>
        </div>
    	<div class="clear"></div>
    </div>
</div>


<div class="wrapper" id="NavWrapper">
	<div class="inner">
    	 <div class="navItem">
            <span><img src="__PUBLIC__/img/homeIcon.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/enterprise">首页</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/mailbox">邮箱</a></span>
        </div>
    	<div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/profile">个人档案</a></span>
        </div>
        <div class="clear"></div>
		 
    </div>
</div>

<script>
	$("#logout").click(function(){
							window.location.href="__ROOT__";
	});
</script>

<div class="wrapper" id="contentWrapper">
	<div class="Oinner">
    	<div class="left">
        	  <div id="MailNav" class="H">
                <h3>账户管理<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul >
                    <li><a href="">人才账户</a></li>
                    <li><a href="">合作教师账户</a></li>
                    <li><a href="">客户公司账户</a></li>
                </ul>
                <h3>账户修改<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul >
                    <li><a href="__URL__/createTeacher">新建学校教师</a></li>
					<li><a href="__URL__/createCompany">新建客户公司</a></li>
					<li><a href="__URL__/createUniversity">新建合作学校</a></li>
                </ul>
              </div>
        </div>
        
        

        <div class="right">
        	<div class="NavAcount" >
            <input type="button" value="删除" />
            <input type="button" value="全部标记"/>
            </div>
            
            <div>
            	<table>
            		<tbody>
            			<tr>
            				<td class="TCheck"><input type="checkbox"/></td>
            				<td class="TName">山猪</td>
            				<td class="TSex">男</td>
            				<td class="TIdentifier">学生</td>
            				<td class="TSchool">中山大学</td>
            				<td class="TMajor">软件工程</td>
            				<td class="TDel"><span>删除</span></td>
                            <td class="TLabel"><span>标记</span></td>
            			<tr>
            				<tr>
            				<td class="TCheck"><input type="checkbox"/></td>
            				<td class="TName">山猪</td>
            				<td class="TSex">男</td>
            				<td class="TIdentifier">学生</td>
            				<td class="TSchool">中山大学</td>
            				<td class="TMajor">软件工程</td>
            				<td class="TDel"><span>删除</span></td>
                            <td class="TLabel"><span>标记</span></td>
            			<tr>
            				<tr>
            				<td class="TCheck"><input type="checkbox"/></td>
            				<td class="TName">山猪</td>
            				<td class="TSex">男</td>
            				<td class="TIdentifier">学生</td>
            				<td class="TSchool">中山大学</td>
            				<td class="TMajor">软件工程</td>
            				<td class="TDel"><span>删除</span></td>
                            <td class="TLabel"><span>标记</span></td>
            			<tr>
            	</table>
            </div>
        </div>
    </div>
</div>
</body>
</html>