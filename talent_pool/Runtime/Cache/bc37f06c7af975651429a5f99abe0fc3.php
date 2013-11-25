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

<style>
#contentWrapper{
	margin-top:100px;
	margin-bottom:50px;
}
/*style for Info*/
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
	position:relative;
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
	font-size: 16px;
}
#basic {
	padding-top:20px;
}
#basic>p{
	width:45%;
	margin:auto;
	height:40px;
	float:left;
}
#basic>p input,#basic>p select{
	margin-left:28px;
 
}
#basic>p input[type=text]{
	width:200px;
}


/*IBM*/
#IBM table td {
width: 267px;
text-align: left;
height: 60px;
color: #244475
}
/*CS_SKILL*/
#CS_skill span {
padding: 5px 10px 5px 10px;
background: #CDE2F3;
color: #3D3D3D;
margin: 10px;
float: left;
border: solid 1px #C8E9F7;
}
/*MailNAv*//*
#logout:hover, #mailbox:hover {
color: #F73D96;
background-color: #EEE;
}
#logout, #mailbox{
position: absolute;
font-size: 20px;
padding: 5px 15px;
top:-40px;
right:100px;
background-color: #F3F3F3;
color: #BDBDBD;
cursor: pointer;
box-shadow: 0 2px 2px #F0F0F0 inset;
border-radius: 5px;
text-shadow: white 0px 0px 2px;
}

#logout{
	right: 0px;
}
*/
.ctrl{
position: absolute;
width: 100px;
padding: 5px;
bottom: 0px;
right: 40px;
background:gray;
color: white;
 display:none;
}
.change,.submit{
float: left;
width: 45%;
margin-left: 5px;
text-align:center;
cursor:pointer;

}
.change:hover,.submit:hover{
	color:#E942C8;
}
.hide{
	color:#8D8A8A;
}
.hide:hover{
	color:#8D8A8A;
}
#Logo{
	position:absolute;
top: -90px;
left: -10px;
	z-index:10;
}
</style>
<div class="wrapper" id="contentWrapper" style="border-bottom:none;">
 
 <div class="inner" style="padding:0px; position:relative; ">
 	<div id="Logo"><img src="__PUBLIC__/img/logo.png" width="120px;" /></div>	
 <!--	<div id="mailbox">邮箱</div>
	<div id="logout">登出</div>-->
 	<div id="Info">
    	 <!--basic-->
           
         <div class="infoItem">
            <div class="infoName">
                <h3>基本信息</h3>
            </div>
            <div class="infoContent"> 
               <form id="basic" method="post" action="">
                        <p >
                            <label for="usrname" class="Label"> 姓名:</label>
                            <span id="sname"></span>
                         </p>
						 <p>
                            <label  class="Label"  for="ID">学号:</label>
 							<span id="std_no"></span>               
                         </p>
                       
                        <p>
                            <label class="Label"> 性别:</label>
                            <span id="sex"></span>
                             &nbsp;&nbsp;<label class="Label" for="education">学历:</label>
							 <span id="degree"></span>
                        </p>
						<p >
 					       <label for="end">指导老师:</label>
							<span id="tname"></span>  
                         </p>
                       
                        <p>
                            <label  class="Label" for="mailbox">邮箱:</label>
                            <span id="email"></span>
                             
                         </p>
                        <p>
                            <label  class="Label" for="collage">专业:</label>
                            <span id="major"></span>
                         </p>
                         <p>
                            <label  class="Label" for="cellphone">电话:</label>
                            <span id="tel"></span>
                             
                         </p>
                        <p >
 					       <label for="end">毕业年份:</label>
							<span id="graduation_year"></span>  
                         </p>
						  <p>
                            <label class="Label"for="birthday">生日:</label>
                            <span id="birthday"></span>
                        </p>
						 
						 <p >
 					       <label for="end">学校:</label>
							<span id="uname"></span>  
                         </p>
                         <div class="clear"></div>
               </form>
            </div>
            <div class="clear"></div>
      <!--      <div class="ctrl">
            	<div class="change">更改</div>
                <div class="submit">提交</div>
                <div class="clear"></div>
            </div>-->
         </div> 
           
         <!--detail-->
        
         <div class="infoItem">
            <div class="infoName">
                <h3>个人详细简介</h3>
            </div>
            <div class="infoContent"><p><span id="profile"></span></p></div>
            <div class="clear"></div>
          <!--  <div class="ctrl">
            	<div class="change">更改</div>
                <div class="submit">提交</div>
                <div class="clear"></div>
            </div>-->
         </div> 
         
		  <div class="infoItem">
            <div class="infoName">
                <h3>在校成绩</h3>
            </div>
            <div id="scores" class="infoContent">
            	<p>
					GPA:
					<span id="gpa"></span>  
                </p>
				<p>
					排名:
					<span id="rank"></span>%
                </p>
				<p>
					四级成绩:
					<span id="cet4"></span>  
                </p>
				<p>
					六级成绩:
					<span id="cet6"></span>  
                </p>
				<p>
					最高奖学金:
					<span id="fellowship"></span>  
                </p>
            </div>
            <div class="clear"></div>
     <!--       <div class="ctrl">
            	<div class="change">更改</div>
                <div class="submit">提交</div>
                <div class="clear"></div>
            </div>-->
         </div> 
		 
         <!--IBM-->
		   
         <div class="infoItem">
            <div class="infoName">
               <h3>IBM相关技能</h3>
            </div>
            <div id="ibm" class="infoContent">
            	
            </div>
            <div class="clear"></div>
    <!--        <div class="ctrl">
            	<div class="change">更改</div>
                <div class="submit">提交</div>
                <div class="clear"></div>
            </div>-->
         </div>
         
         
         <!--CS-SKILL-->
         
         <div class="infoItem">
            <div class="infoName">
                <h3>专业技能</h3>
            </div>
            <div id="itskill" class="infoContent">
            	
            </div>
            <div class="clear"></div>
     <!--       <div class="ctrl">
            	<div class="change">更改</div>
                <div class="submit">提交</div>
                <div class="clear"></div>
            </div>-->
         </div> 
         
    </div>
 </div>
</div>
<script>
/*
$(function(){
	$(".submit").addClass("hide");
	$("#Info").delegate(".infoItem","mouseover",function(){
	
		$(this).find(".ctrl").show();	
	});
	$("#Info").delegate(".infoItem","mouseout",function(){

		$(this).find(".ctrl").hide();	
	});
	/*切换模式，开始的时候提交为hide，点击更改过后更改为hide*//*
	$(".submit,.change").bind("click",function(){
		$(this).toggleClass("hide");
	});
	
	
	
});
*/
$(document).ready(function(){
	var info = <?php echo ($basic_info); ?>;
	var scores = <?php echo ($scores); ?>;
	var it = <?php echo ($itskill); ?>;
	var ibm = <?php echo ($ibmprize); ?>;
	
	function fill(vals){
		for (name in vals){
			if (name == "sex"){
				if (vals[name] == 1)
					vals[name] = "男";
				else
					vals[name] = "女";
			}
			$("#"+name).html(vals[name]);
		}
	}
	
	function fill2(vals,name1,name2){
		for (x in vals){
			$("#"+name1).append($("<div>"+vals[x][name2]+"</div>"));
		}
	}
	
	fill(info);
	fill(scores);
	fill2(it,"itskill","skillname");
	fill2(ibm,"ibm","prizename");
	$("#logout").click(function(){
		window.location.href="__ROOT__";
	});
	$("#mailbox").click(function(){
		window.location.href="__URL__/mailbox";
	});
});
</script>
</body>
</html>