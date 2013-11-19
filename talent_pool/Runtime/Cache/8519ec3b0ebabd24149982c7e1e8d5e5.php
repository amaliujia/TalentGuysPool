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


<div class="wrapper" id="contentWrapper">
    <div class="inner">
        <div class="left">
            <div id="MailNav" class="H">
                <h3>审批管理<img src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
				<ul>
					<li><a href="__URL__/approve_page">审批</a></li>
				</ul>
                <h3>账户管理<img src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                    <li><a href="__URL__/manage_page/objtype/student">人才账户</a></li>
                    <li><a href="__URL__/manage_page/objtype/teacher">合作教师账户</a></li>
                    <li><a href="__URL__/manage_page/objtype/company">客户公司账户</a></li>
                </ul>
                <h3>账户修改<img src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul >
                    <li><a href="__URL__/createTeacher">新建学校教师</a></li>
                    <li><a href="__URL__/createCompany">新建客户公司</a></li>
                    <li><a href="__URL__/createUniversity">新建合作学校</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <style>
                #StudentList .listHeader{
                    background: #666161;
                    padding: 5px;
                    color: white;
                    font-size: 14px;
                    font-weight: bold;;
                }
                #StudentList  .f{
                    float:left;
                    width:13%;
                }
                #StudentList .t{
                    float:right;
                    width:30px;
                }
                #StudentList .listItem{
                    padding:5px;
                    font-size: 12px;
                    font-weight: 100;
                    font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
                    color: #505153;
                    line-height: 30px;
                }
                #StudentList .listItem:nth-child(2n+1){
                    background: #F3F3F3;
                }
            </style>
            <div id="StudentList">
                <div class="listHeader" style="display:none">
                    <div class="f name" style="width:40px; height:5px;"></div>
                    <div class="f name">姓名</div>
                    <div class="f major">专业</div>
                    <div class="f school">学校</div>
                    <div class="f graduateTime">入学时间</div>
                    <div class="f checkinTime">入库时间</div>
                    <div class="f"></div>
                    <div class="f"></div>
                    <div class="clear"></div>
                </div>
                <div id="listContent">
<!--                    <div class="listItem">
                        <div class="f name" style="width:40px; height:5px;"></div>
                        <div class="f name">吴文杰</div>
                        <div class="f major">软件工程</div>
                        <div class="f school">中山大学</div>
                        <div class="f graduateTime">2014-2-12</div>
                        <div class="f checkinTime">2012-2-13</div>
                        <div class="t check"><a href="">查看</a></div>
                        <div class="clear"></div>
                    </div>
                    <div class="listItem">
                        <div class="f name" style="width:40px; height:5px;"></div>
                        <div class="f name">陈学家</div>
                        <div class="f major">计算机应用</div>
                        <div class="f school">中山大学</div>
                        <div class="f graduateTime">2014-2-23</div>
                        <div class="f checkinTime">2011-4-13</div>
                        <div class="t check"><a href="">查看</a></div>
                        <div class="clear"></div> </div> -->
                </div>
            </div>
         <!--   <div class="NavAcount" >
                <input type="button" value="删除" />
                <input type="button" value="全部标记"/>
            </div>-->
        </div>

        <div class="clear"></div>
    </div>
</div>
<script>
var Talent = (function(){
		function Talent(talent){
			this.sid = talent.sid;
			this.sname = talent.sname;
			this.reg_time = talent.reg_time;
			this.uname = talent.uname;
			this.graduation_year = talent.graduation_year;
			this.tname = talent.tname;
			this.major = talent.major;
			//this.status = talent.status;
			this.build();
		}
		
		Talent.prototype.build = function(){
			
			var entry = $('<div class="listItem"><div class="f name" style="width:40px; height:5px;"></div>  <div class="f name"><a targer="_blank" href="__URL__/student/sid/'+this.sid+'">'+this.sname+'</a></div><div class="f major">'+this.major+'</div><div class="f school">'+this.uname+'</div><div class="f graduateTime">'+this.graduation_year+'</div><div class="f checkinTime">'+this.reg_time+'</div><div id="id" style="display:none">'+this.sid+'</div><div class="clear"></div>');
			
			entry.appendTo($('#listContent'));
		}
		
		return Talent;
})();

var Teacher = (function(){
		function Teacher(talent){
			this.tid = talent.tid;
			this.tname = talent.tname;
			this.reg_time = talent.reg_time;
			this.uname = talent.uname;
		
			//this.status = talent.status;
			this.build();
		}
		
		Teacher.prototype.build = function(){
			var entry = $('<div class="listItem"><div class="f name" style="width:40px; height:5px;"></div>  <div class="f name"><a targer="_blank" href="__URL__/teacher/tid/'+this.tid+'">'+this.tname+'</a></div><div class="f school">'+this.uname+'</div><div class="f checkinTime">'+this.reg_time+'</div><div id="id" style="display:none">'+this.tid+'</div><div class="clear"></div>');
			
			entry.appendTo($('#listContent'));
		}
		
		return Teacher;
})();

var Company = (function(){
		function Company(talent){
			this.cid = talent.cid;
			this.cname = talent.cname;
			this.class = talent.class;
			this.reg_time = talent.reg_time;
		
			//this.status = talent.status;
			this.build();
		}
		
		Company.prototype.build = function(){
			var entry = $('<div class="listItem"><div class="f name" style="width:40px; height:5px;"></div>  <div class="f name"><a targer="_blank" href="__URL__/company/cid/'+this.cid+'">'+this.cname+'</a></div><div class="f school">'+this.class+'</div><div class="f checkinTime">'+this.reg_time+'</div><div id="id" style="display:none">'+this.cid+'</div><div class="clear"></div>');
			
			entry.appendTo($('#listContent'));
		}
		
		return Company;
})();

$(document).ready(function(){
	var objtype = "<?php echo ($objtype); ?>";
	var json = <?php echo ($getJson); ?>;
	$("#listContent").empty();
	if (objtype == "student"){
		for (var i=0;i<json.length;i++){
			var entry = new Talent(json[i]);
		}
	}
	else if(objtype=="teacher"){
		for (var i=0;i<json.length;i++){
			var entry = new Teacher(json[i]);
		}
	}
	else{
		for (var i=0;i<json.length;i++){
			var entry = new Company(json[i]);
		}
	}
});
</script>
</body>
</html>