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


<div class="wrapper" id="contentWrapper">
	<div class="inner">
    	<div class="left">
        	<div id="Mstudent" class="H">
                <h3 >学生管理 <img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                <li><a href="__URL__/recommandStudent" class="Student_Management">推荐学生入库>></a></li>
                <li><a href="__URL__/manage_page/type/pool" class="Student_Management">已入库的学生</a></li>
				<li><a href="__URL__/manage_page/type/temp" class="Student_Management">审核中的学生</a></li>
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
         .reg_time{
             width:200px !IMPORTANT;
         }

		</style>
        <div class="right">
        		<div id="searchStudent">
                    <input type="search" id="searchVal" placeholder="输入查找学生姓名" />
                    <input type="button"  id="searchButton" value="查找" />
                </div>
            <div id="StudentList">
                <div class="listHeader" style="display: none">
                    <div class="f name" style="width:40px; height:5px;"></div>
                    <div class="f name">姓名</div>
                    <div class="f major">专业</div>
                    <div class="f graduateTime">入学时间</div>
                    <div class="f checkinTime" style="width:100px;">入库时间</div>
                    <div class="f"></div>
                    <div class="f"></div>
                    <div class="clear"></div>
                </div>
                <div id="listContent">
                    <div class="listItem" id="Template" style="display:none;">
                        <div class="f " style="width:40px; height:5px;"></div>
                        <div class="f name"></div>
                        <div class="f major"></div>
                        <div class="f graduation_year"></div>
                        <div class="f reg_time"></div>
						<div class="f status"></div>
                        <div class="t del"></div>
                        <div class="clear"></div>
                    </div>
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
<script>
$(function(){
	(function(Export){
		var manager = {
			itemData:<?php echo ($getJson); ?>,
			itContainer:$("#StudentList"),
			searchBtn:$("#searchButton"),
			searchVal:$("#searchVal"),
			initItems:null,
			search:null
		}
		manager.init = function(){
			manager.initItems();
			this.searchBtn.bind("click",$.proxy(this.search,this));
            $(".del").click(function(){
            })
		}
		//set students 
		manager.initItems = function(){
			var its = this.itemData;
			for(var i=0,l = its.length;i<l;i++){
				var val = its[i];
                console.log(val);
				var temp = "";
				if (val.status != "") temp = "temp_";
				var sname = "<a href='__URL__/"+temp+"student/sid/"+val.sid+"'>"+val.sname+"</a>";
                var it =$("#Template").clone();
                it.find(".name").html(sname);
                it.find(".major").html(val.major);
                it.find(".graduation_year").html(val.graduation_year);
                it.find(".reg_time").html(val.reg_time);
				it.find(".status").html(val.status);
				it.find(".del").html("<a href='__URL__/delete_"+temp+"student/sid/"+val.sid+"'>删除</a>");
                it.show();
				this.itContainer.append(it);
			}
		}	
		manager.search=function(){
			var val =this.searchVal.val();
			val = val.replace(/[ ]*/g,"");
			if(val=="") return;
			var items = $(".sItem");
			items.each(function(){
				var name = $(this).find(".sname").text();
				name="*****"+name;
				if(name.indexOf(val)>0){
					$(this).show(200);
				}
				else{
					$(this).hide();
				}
			});
		}
		manager.init();
	})(window);
});
</script>
</body>
</html>