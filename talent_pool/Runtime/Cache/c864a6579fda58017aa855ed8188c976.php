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
					<span  ><a href="__ROOT__/" title="" target="_blank">登出</a></span>
				</div>
				<div class="UctrlItem">
					<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/change_password" title="" target="_blank">修改密码</a></span>
				</div>
				<div class="UctrlItem">
					<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/edit_profile" title="" target="_blank">修改基本资料</a></span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wrapper" id="NavWrapper">
			<div class="inner">
				<div class="navItem">
					<span><img src="__PUBLIC__/img/homeIcon.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/teacher.html">首页</a></span>
				</div>
				<div class="navItem">
					<span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/mailbox.html">邮箱</a></span>
				</div>
				<div class="navItem">
					<span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
					<span  ><a href="__URL__/profile">个人档案</a></span>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<br /> 


<div class="wrapper" id="contentWrapper">
	<div class="inner">
    	<div class="left">
        	<div id="MailNav" class="H">
                <h3>写信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                    <li><a href="__URL__/sendEmail.html">向学生发送信息</a></li>
                    <li><a href="__URL__/sendEmail.html">向系统发送信息</a></li>
                </ul>
                <br /><br />
                <h3>收信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                    <li><a href="__URL__/mailbox.html">所有信息</a><label>21</label> </li>
                    <li><a href="__URL__/mailbox.html">系统信息</a> <label>5</label></li>
                    <li><a href="__URL__/mailbox.html">学生信息</a> <label>6</label></li>
                    <li><a href="__URL__/mailbox.html">垃圾箱</a>	<label>20</label></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div style="padding:10px;">
				<style>
               
                #Minfo{
                    height:100px;
                    background-color:#CCC;	
                    padding:5px;
                }
                #Mcontent{
                    padding:20px;
                }
                </style>
                <div id="Mctrl">
                  <a href="__URL__/mailbox.html"><input   type="button"   value="<<返回"  /></a>
                 <input   type="button"   value="彻底删除"  />
                 <input   type="button"  value="删除"   />
                </div>
                
                <div id="Minfo">
                <div id="Mtitle" style="font-weight:bold;"><?php echo ($title); ?></div>
                <br />
                <div id="Msender"><span style="color:#999;">发件人：</span> <span><?php echo ($sender_name); ?></span> </div>
                <br />
                <div id="Msender"><span style="color:#999;"><time> <?php echo ($sendtime); ?> </time> </span> </div>
                </div>
                
                <div id="Mcontent">
                <p>
                <?php echo ($content); ?>
                </p>
                </div>
                
                </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<br />
<div class="wrapper" id="footerWrapper">
	<div class="inner">
    </div>
</div>
</body>
</html>