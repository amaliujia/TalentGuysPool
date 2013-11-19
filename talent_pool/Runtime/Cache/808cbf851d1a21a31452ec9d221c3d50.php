<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/struct.css" />
<script src="__PUBLIC__/js/jquery-1.7.1.min.js"></script>
<title>公司首页</title>
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
            <span  ><a href="__URL__/company">首页</a></span>
        </div>
		<div class="navItem">
            <span><img src="__PUBLIC__/img/MInfo.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/talent_search">人才库</a></span>
        </div>
        <div class="navItem">
            <span><img src="__PUBLIC__/img/Memail.png" width="23"  height="" style="vertical-align:middle;" /></span>&nbsp;&nbsp;
            <span  ><a href="__URL__/mailbox">邮箱</a></span>
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
	color:#fa2924 ;
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
			<form class="sItemContent" id="Achievement" >
            	<div class="i"> 
					平均绩点>= <input type="number" name="gpa"  value="0"/>
				</div>
				<div class="i"> 
					年级排名<= <input type="number" name="rank" value="100"/>%
				</div>
				<div class="i"> 
                	<label>425为四六级及格成绩</label><br />
					四级成绩>= <input type="number" name="cet4" value="0"/>
				</div>
				<div class="i"> 
                	 <label>425为四六级及格成绩</label><br />
					六级排名>= <input type="number" name="cet6" value="0"/>
				</div>
			</form>
		</div>	
		<div class="sItem">
        	<h3>&nbsp;&nbsp;IT 技能  <label class="switch">展开</label></h3>
			<form class="sItemContent" id="ItSkill">
                <span><input type="checkbox" name="itSkill[]" />C</span>
                <span><input type="checkbox" name="itSkill[]"/>C++</span>
                <span><input type="checkbox" name="itSkill[]" />Java</span>
                <span><input type="checkbox" name="itSkill[]"/>Python</span>
                <span><input type="checkbox" name="itSkill[]" />PHP</span>
                <span><input type="checkbox" name="itSkill[]"/>Perl</span>
                <span> <input type="checkbox" name="itSkill[]"/>C#</span>
                <span> <input type="checkbox" name="itSkill[]"/>Cobol</span>
                <span> <input type="checkbox" name="itSkill[]" />JSP</span>
                <span> <input type="checkbox" name="itSkill[]" />XML</span>
                <span> <input type="checkbox" name="itSkill[]" />HTML</span>
                <span> <input type="checkbox" name="itSkill[]" />ASP</span>
                <span> <input type="checkbox" name="itSkill[]" />Haskell</span>
                <span> <input type="checkbox" name="itSkill[]" />Photoshop</span>
                <span> <input type="checkbox" name="itSkill[]" />ActionScript</span>
                <span> <input type="checkbox" name="itSkill[]" />JavaScript</span>
                <div class="clear"></div>
			</form>
		</div>
		<div class="sItem">
        	<h3>&nbsp;&nbsp;IBM获奖  <label class="switch">展开</label></h3>
			<form class="sItemContent" id="IBM">
				  <table>
							<tr>
								<td  ><input type="checkbox" name="ibm[]"/>博士生英才计划获奖者</td>
								<td ><input type="checkbox" name="ibm[]"/>参加“学生创新实验室”且合格</td>
							</tr>
							<tr>
								<td  ><input type="checkbox"  name="ibm[]"/>参加SUR项目</td>
								<td  ><input  type="checkbox"  name="ibm[]"/>参加“蓝色之桥”且合格</td>
							</tr>
							<tr>
								<td ><input  type="checkbox"  name="ibm[]"/>获IBM奖学金</td>
								<td  ><input  type="checkbox"   name="ibm[]"/>IBM俱乐部核心成员</td>
							</tr>
							<tr>
								<td ><input  type="checkbox"  name="ibm[]"/>获IBM全球专业课程结业证书（非核心课程）</td>
								<td ><input  type="checkbox"  name="ibm[]"/>获IBM全球专业课程结业证书（核心课程)</td>
							</tr>
							<tr>
								<td ><input  type="checkbox" name="ibm[]"/>获IBM全球专业认证</td>

							</tr>
				 </table>
			</form>
		</div>	
		<div class="sItem" >
        	<h3>&nbsp;&nbsp;项目相关 <label class="switch">收起</label></h3>
			<form class="sItemContent " id="ProjectExperience" style="display:block;">
				 <span><input type="checkbox" />web应用开发</span>
				 <span><input type="checkbox" />网站开发</span>
				 <span><input type="checkbox" />server端应用</span>
				 <span><input type="checkbox" />Android应用</span>
				 <span><input type="checkbox" />IOS应用</span>
				 <span><input type="checkbox" />Mac应用</span>
				 <span><input type="checkbox" />Linux开发</span>
				 <span><input type="checkbox" />windows软件</span>
				 <span><input type="checkbox" />WinPhone应用</span>
				 
			</form>
		</div>  
         <input type="button" id="FiltBtn" value="筛选" />&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="button" id="SendEmailBtn" value="发送邮件" />&nbsp;&nbsp;
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
			<div id="listContent">
			</div>
        </div> 
	</div>	
</div>
<script src="__PUBLIC__/js/base64.js"></script>
<script src="__PUBLIC__/js/json2.js"></script>
<script>

$(function(){
	var pattern = /filter$|filter\/$/g;
	var st = window.location.href;
	if (pattern.test(st))
		window.location.href = "__URL__/talent_search";

	var Filter = {
		namesJson:"", //from serverside
		sItems:$(".sItem"),
		itSkill:$("#ItSkill"),
		score:$("#Achievement"),
		ibm:$("#IBM"),
		filtBtn:$("#FiltBtn"),
		selectAllBtn:$("#SelectAllBtn"),
		sendEmailBtn:$("#SendEmailBtn")
		
	}
	Filter.init=function(){
		this.sItems.bind('click',function(ev){
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
		this.initTable();
		this.filtBtn.bind("click",$.proxy(this.filt,this));
	};
	Filter.filt = function(){
		var itSkill = this.itSkill.serializeArray();
		    itSkill.splice(itSkill.length-1,1);
		var score = this.score.serializeArray();
			score.splice(score.length-1,1);
		var ibm = this.ibm.serializeArray();
			ibm.splice(ibm.length-1,1);
			
		for(var i=0, l= itSkill.length; i<l;i++){
			itSkill[i].value=itSkill[i].value.replace(" ",'');
		}
	    var ajaxData = {
			 itSkill:itSkill,
			 scores:score,
			 ibm:ibm
		}
		var str = JSON.stringify(ajaxData);
		str = encode64(str);
	    //alert(str);
		//console.log(ajaxData);
		window.location.href="__URL__/talent_search/filter/"+str;
	}
	Filter.initTable = function(){
		//通过namesJson 初始化页面的学生表格
		//Add value to checkbox
		$("input:checkbox").each(function(){
			var content = $(this).parent().text();
			$(this).val(content);
		});
	}
	
	Filter.init(); 
	/***********************************************************************/
	var TalentEntry = (function(){
		function TalentEntry(obj){
			this.name = obj.sname;
			this.major = obj.major;
			this.university = obj.university;
			this.graduation_year = obj.graduation_year;
			this.build();
		}
		
		TalentEntry.prototype.build = function(){
			 var row = '<div class="listItem">';
                 row+='<div class="f name" style="width:40px; height:5px;"></div>';
                 row+='<div class="f name">'+this.name+'</div>';
                 row+='<div class="f major">'+this.major+'</div>';
                 row+='<div class="f school">'+this.university+"</div>";
                 row+='<div class="f graduateTime">'+this.graduation_year+"</div>";
                 row+='<div class="clear"></div> </div>';
		    row = $(row);
			row.appendTo($("#listContent"));
		};
		
		return TalentEntry;
	})();
	
	var json = <?php echo ($getJson); ?>;
	json = eval(json);
	for (x in json){
		var entry = new TalentEntry(json[x]);
	}
	
});
</script>
</body>
</html>