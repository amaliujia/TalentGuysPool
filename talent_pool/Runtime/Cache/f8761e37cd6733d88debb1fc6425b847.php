<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <span  ><a href="__URL__/" title="" target="_blank">登出</a></span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/change_password" title="" target="_blank">修改密码</a></span>
        </div>
        <div class="UctrlItem">
            <span><img src="__PUBLIC__/img/setting.png" width="23"  style="vertical-align:middle;"/></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/profile" title="" target="_blank">修改基本资料</a></span>
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
        	<div id="Mstudent" class="H">
                <h3 >学生管理 <img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                <li><a href="Student_info.html" class="Student_Management">推荐学生</a></li>
                <li><a href="Recommand_Students.html" class="Student_Management">已推荐学生</a></li>
                </ul>
            </div>
        </div>
        <style>
		 #searchStudent{
			height: 60px;
			padding: 20px;
			width: 60%;
			margin: auto;
		 }
		 #searchButton {
			border-radius: 0px;
			border: solid 1px #7C7B7B;
			color: white;
			padding: 7px;
			background: #89898A;
			margin-left: -3px;
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
		 }
		 #searchButton:hover{
			 background: #06F;	
		 }
		 input[type=search]{
			color: #2289A3;
			font-size: 18px;
			background: #FCFCFC;
			border:solid #009FDC 5px;
			width: 300px;
			margin-top: 18px;
			border-radius: 10px;
			outline: none;
			padding: 5px;
			margin-left: 20px;
		 }
		 #items{
			background:#EDEFF3;
			width:95%;
			margin:auto;
			min-height:400px;
			margin-top:20px;
			padding:10px 0px 30px 0px;
			
		 }
		 .sItem{
			padding: 5px;
			margin: 5px;
			width: 190px;
			height: 70px;
			background: white;
			float: left;	 
		 }
		 .face{
			 width:32%;
			 float:left;
			 height:45px;
			 background:#666;
		 }
		 .info{
			 float:left;
			 height:70px;
			 width:64%;
			 margin-left:5px;
			 position:relative;
		  }
		  .handler{
			  position: absolute;
				font-size: 12px;
				color: #666;
				bottom: -5px;
				right: 5px;
		  }
		  .sinfo{
			font-size: 12px;
			color: #CCC;
			line-height: 16px;
		  }
		  .sname{
			 color: #00A3FF;
			line-height: 25px;
			position: absolute;
			bottom: 0px;
			left: -60px;
		  }
		</style>
        <div class="right">
        		<div id="searchStudent">
                    <input type="search" placeholder="输入查找学生姓名" />
                    <input type="button"  id="searchButton" value="查找" />
                </div>
                <div id="items">
                	<div class="sItem">
                    	<div class="face"></div>
                        <div class="info">
                        	<div class="sname">陈学家</div>
                            <div class="sinfo">
                            	<span>年级:2010级</span><br /> <span>学校:中山大学</span><br /><span>入库时间:2012-8-16</span>
                            </div>
                            <div class="handler">
                            	<span>删除</span> <span>修改</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="sItem">
                    	<div class="face"></div>
                        <div class="info">
                        	<div class="sname">吴文杰</div>
                            <div class="sinfo">
                            	<span>年级:2010级</span><br /> <span>学校:中山大学</span><br /><span>入库时间:2012-8-16</span>
                            </div>
                            <div class="handler">
                            	<span>删除</span> <span>修改</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="sItem">
                    	<div class="face"></div>
                        <div class="info">
                        	<div class="sname">陈学家</div>
                            <div class="sinfo">
                            	<span>年级:2010级</span><br /> <span>学校:中山大学</span><br /><span>入库时间:2012-8-16</span>
                            </div>
                            <div class="handler">
                            	<span>删除</span> <span>修改</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="sItem">
                    	<div class="face"></div>
                        <div class="info">
                        	<div class="sname">陈学家</div>
                            <div class="sinfo">
                            	<span>年级:2010级</span><br /> <span>学校:中山大学</span><br /><span>入库时间:2012-8-16</span>
                            </div>
                            <div class="handler">
                            	<span>删除</span> <span>修改</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="sItem">
                    	<div class="face"></div>
                        <div class="info">
                        	<div class="sname">陈学家</div>
                            <div class="sinfo">
                            	<span>年级:2010级</span><br /> <span>学校:中山大学</span><br /><span>入库时间:2012-8-16</span>
                            </div>
                            <div class="handler">
                            	<span>删除</span> <span>修改</span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                     
                    <div class="clear">
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