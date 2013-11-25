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
    </div>
</div>
<style>
.UctrlItem{
margin-top:20px;
}
</style>
<div class="wrapper" id="headerWrapper">
	<div class="inner" style="height:67px;">
    	 <div id="Uname" class="f"><img src=" __PUBLIC__/img/IBM.jpg " width="140"/></div>
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
            <span  ><a href="__URL__/company">首页</a></span>
        </div>
		<div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/findStudent">人才库</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/basic_mailbox">邮箱</a></span>
        </div>
    	<div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/profile">公司档案</a></span>
        </div>
        <div class="clear"></div>
    </div>
</div>
<br /> 
 

<style>
#Main{
	min-height:670px;
	height:auto;
	background:url(__PUBLIC__/img/20120825104630.png);
	width:1000px;
	padding:0px;
}
.sItem{
height: auto;
background: #E0E0E0;
margin: auto;
padding:0 10px 0 10px;
position: relative;
overflow:hidden;
margin-bottom:1px;
}
.sItemContent{
min-height: 140px;
width: 91%;
margin: auto;
margin-top: 10px;
display: none;
color: #1F5D7A;
font-size: 14px;
}
.sItemContent label{
	color: #FA1B1B;
font-size: 12px;
}
h3{
color: #3C3C3C;
margin: 10px;
font-size: 17px;
font-weight: 400;
}
h3 label{
float: right;
font-size: 1px;
padding: 5px;
font-weight: 300;
color: #868686;
background: #CFCECE;
cursor:pointer;
}
#StudentList .listHeader{
background: #666161;
padding: 5px;
color: white;
}
#left{
	float:left;
	width:29%;
}
#StudentList{
	width:70%;
	float:right;
}
#StudentList  .f{
	float:left;
    width:20%;
}
#StudentList .listItem{
	padding:5px;
	font-size: 14px;
	font-weight: 100;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	color: #505153;
	line-height: 30px;
}
#StudentList .listItem:nth-child(2n+1){
	background: #D3EEF7;
}
.clear{
	clear:both;
}
#ItSkill span{
padding: 2px;
background: #BDBDBD;
line-height: 30px;
}
#ItSkill span input{
	border:#FFF solid 1px;
}
</style>
<div class="wrapper">
	<div class="inner" id="Main"> 
    	<div id="left">  
		<div class="sItem" >
        	<h3>&nbsp;&nbsp;在校成绩  <label class="switch">展开</label></h3>
			<div class="sItemContent" >
				<div class="i"> 
					年级排名>= <input type="number"/>%
				</div>
				<div class="i"> 
                	<label>425为四六级及格成绩</label><br />
					四级成绩>= <input type="number"/>% 
				</div>
				<div class="i"> 
                	 <label>425为四六级及格成绩</label><br />
					六级排名>= <input type="number"/>%
				</div>
			</div>
		</div>	
		<div class="sItem">
        	<h3>&nbsp;&nbsp;IT 技能  <label class="switch">展开</label></h3>
			<div class="sItemContent" id="ItSkill">
				 <span><input type="checkbox" />C</span>
                     <span><input type="checkbox" />C++</span>
                     <span><input type="checkbox" />Java</span>
                     <span><input type="checkbox" />Python</span>
                     <span><input type="checkbox" />PHP</span>
                     <span><input type="checkbox" />Perl</span>
                     <span> <input type="checkbox" />C#</span>
                     <span> <input type="checkbox" />VB</span>
                     <span> <input type="checkbox" />JSP</span>
                     <span><input type="checkbox" />VC++</span>
                     <span><input type="checkbox" />MySQL</span>
                     <span><input type="checkbox" />Oracle</span>
                     <span><input type="checkbox" />HTML</span>
                     <span><input type="checkbox" />JavaScript</span>
                     <span><input type="checkbox" />Linux</span>
                     <span> <input type="checkbox" />Windows</span>
                     <span><input type="checkbox" />3DMAX</span>
                     <span><input type="checkbox" />OpenGL</span>
                     <span> <input type="checkbox" />Pro/E</span>
                     <span><input type="checkbox" />Photoshop</span>
                     <span> <input type="checkbox" />Word</span>
                     <span> <input type="checkbox" />Excel</span>
                     <span><input type="checkbox" />PowerPoint</span>
                     <span><input type="checkbox" />Flash</span>
                     <span><input type="checkbox" />Illustrator</span>
                     <span><input type="checkbox" />Matlab</span>
                     <span><input type="checkbox" />ASP</span>
                     <span><input type="checkbox" />.Net</span>
                     <span><input type="checkbox" />delphi</span>
                     <span><input type="checkbox" />CSS</span>
                     <span><input type="checkbox" />VBscript</span>
                     <span> <input type="checkbox" />SPSS</span>
                     <span> <input type="checkbox" />SQL Server</span>
                     <span><input type="checkbox" />Access</span>
                     <span> <input type="checkbox" />SAS</span>
                     <span> <input type="checkbox" />用友</span>
                     <span> <input type="checkbox" />MAYA</span>
                     <span><input type="checkbox" />Premiere</span>
                     <span> <input type="checkbox" />XML</span>
			</div>
		</div>
		<div class="sItem">
        	<h3>&nbsp;&nbsp;IBM获奖  <label class="switch">展开</label></h3>
			<div class="sItemContent">
				 <table>
                             <tbody>
                                    <tr>
                                        <td  ><input type="checkbox" />博士生英才计划获奖者</td>
                                        <td ><input type="checkbox" />参加“学生创新实验室”且合格</td>
                                    </tr>
                                    <tr>
                                        <td  ><input type="checkbox" />参加SUR项目</td>
                                        <td  ><input  type="checkbox" />参加“蓝色之桥”且合格</td>
                                    </tr>
                                    <tr>
                                        <td ><input  type="checkbox" />获IBM奖学金</td>
                                        <td  ><input  type="checkbox"  />IBM俱乐部核心成员</td>
                                    </tr>
                                    <tr>
                                        <td ><input  type="checkbox" />获IBM全球专业课程结业证书（非核心课程）</td>
                                        <td ><input  type="checkbox" />获IBM全球专业课程结业证书（核心课程)</td>
                                    </tr>
                                    <tr>
                                        <td ><input  type="checkbox"/>获IBM全球专业认证</td>
                                         
                                    </tr>
                            </tbody>
                 </table>
			</div>
		</div>	
		<div class="sItem" >
        	<h3>&nbsp;&nbsp;项目相关 <label class="switch">收起</label></h3>
			<div class="sItemContent" style="display:block;">
				 <span><input type="checkbox" />web应用开发</span>
				 <span><input type="checkbox" />网站开发</span>
				 <span><input type="checkbox" />server端应用</span>
				 <span><input type="checkbox" />Android应用</span>
				 <span><input type="checkbox" />IOS应用</span>
				 <span><input type="checkbox" />Mac应用</span>
				 <span><input type="checkbox" />Linux开发</span>
				 <span><input type="checkbox" />windows软件</span>
				 <span><input type="checkbox" />WinPhone应用</span>
				 
			</div>
		</div>  
         <input type="button" value="筛选" />&nbsp;&nbsp;
         <input type="button" value="全选" />&nbsp;&nbsp;
         <input type="button" value="发送邮件" />&nbsp;&nbsp;
        </div>  
       
        <!--student List  -->
	    <div id="StudentList">
        	<div class="listHeader">
            	<div class="f name" style="width:40px; height:5px;"></div>
            	<div class="f name">姓名</div>
                <div class="f major">专业</div>
                <div class="f school">学校</div>
                <div class="f graduateTime">毕业时间</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
             <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
            <div class="listItem">
            	<div class="f " style="width:40px;"><input type="checkbox" value="studentId" /></div>
            	<div class="f name">Jsama</div>
                <div class="f major">软件工程</div>
                <div class="f school">中山大学</div>
                <div class="f graduateTime">2014年6月7日</div>
                <div class="clear"></div>
            </div>
        </div> 
	</div>	
</div>
<script>
$(function(){
	var Filter = {
		el:$(".sItem")
	}
	Filter.init=function(){
		this.el.bind('click',function(ev){
			var target=ev.target;
			//context is el
			var el = $(this);
			var sw = el.find(".switch");
			var content = el.find(".sItemContent");
			var val = sw.html();
			if(target!==sw[0]) return;
			if(val == "展开"){
				sw.html("收起");
				content.show(500);
			}
			else{
				sw.html("展开");
				content.hide();
			}		
		});
	};
	Filter.init(); 
});
</script>
</body>
</html>