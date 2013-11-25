<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/teacher.css" />
<script src="__PUBLIC__/js/jquery.min.js"></script>
<title>公司页面</title>
</head>

<body style="overflow:hidden;">
<style>
body,html{
	overflow:hidden;
}

</style>
<div class="wrapper" id="TheadWrapper">
    <div class="inner">
        <div id="logo">企业大学人才库</div>
    </div>
</div>

<div class="wrapper" id="headerWrapper">
	<div class="inner">
    	<div id="Uname" class="f" > 
		<?php echo ($username); ?>
		</div>
        <div  class="f"> 
        	<br />
        	<div  class="UctrlItem">
            	<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
                <span id="change_password" >修改密码</span>
     		</div>
            <div class="UctrlItem">
            	<span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
                <span class="NavInfo">修改基本资料</span>
            </div>

        </div>
        <div class="f">
        	<br />
        	<div class="UctrlItem">
            	<span><img src="__PUBLIC__/img/settingUserLogin.png"  width="23"  height="21" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
                <span  id="logout">登出</span>
            </div>
        </div>
        <div id="NStudent" style="padding:0px;" >
                    <div style="  padding:5px; float:left;" >&nbsp;浏览&nbsp;</div>
                    <div class="switcher">+</div>
                    <div class="clear"></div>
                    <div class="item" ><a href="__URL__/talent_search.html">人才库</a></div>
                    <div class="item" ><a href="__URL__/mailbox">信息中心</a></div>
                    
                </div>
        <div class="clear"></div>
    </div>
</div>

<div class="wrapper" id="NavWrapper">
	<div class="inner">
    	<div id="nav">
        	<div class="navItem" id="navStudent">
            	<img src="__PUBLIC__/img/Mstudent.png" width="140" />
                <h2>人才库</h2>
            </div>
            <div class="navItem" id="navEmail" style="position:relative;">
            	<img src="__PUBLIC__/img/Memail.png" width="140" />
                <h2>信息中心</h2>
                <div class="hidden" style="" >
                	<p>未读信息:&nbsp;&nbsp;<label><?php echo ($stat_msg); ?></label></p>
                	<p>系统信息:&nbsp;&nbsp;<label><?php echo ($stat_ent_msg); ?></label></p>
                	<img src="__PUBLIC__/img/hiddenAngle.png"  style="position:absolute; bottom:-28px; left:10px;"/>
                </div>
            </div>
            <div class="navItem NavInfo">
            	<img src="__PUBLIC__/img/Minfo.png" width="140" />
                <h2>公司档案</h2>
            </div>
        </div>
    </div>
</div>
<br /><br /> 
 
<script>
					 $("#change_password").click(function(){
						window.location.href = "__URL__/change_password";
					 });
					 $("#navEmail").bind(
					 {
					  "mouseover":function(){ $("#navEmail .hidden").css("display","block"); },
					  "mouseout":function(){ $("#navEmail .hidden").css("display","none"); }
					  }).click(function(){
						  window.location.href="__URL__/mailbox";
					  });
					  $("#navStudent").click(function(){
						  window.location.href="__URL__/talent_search.html";
					  });
					  $(".NavInfo").click(function(){
						  window.location.href="__URL__/profile";
					  });
					  $("#logout").click(function(){
						window.location.href="__ROOT__";
					  });
					  $("#NStudent .switcher").toggle(
							function(){
								 console.log("sdfas");
								 $(this).parent().find(".item").show();
								 $(this).html("-");
							}
							,function(){
								 $(this).parent().find(".item").hide();
								 $(this).html("+");
							}
						);

</script>
</body>
</html>