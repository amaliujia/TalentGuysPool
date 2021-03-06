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
                .pass,.reject{
                    cursor: pointer;
                }
            </style>
            <div id="StudentList">
                <div class="listHeader">
                    <div class="f name" style="width:40px; height:5px;"></div>
                    <div class="f name">姓名</div>
                    <div class="f major">专业</div>
                    <div class="f school">学校</div>
                    <div class="f raiser">提交人</div>
                    <div class="f type">类型</div>
                    <div class="f graduateTime">申请时间</div>
                    <div class="f"></div>
                    <div class="f"></div>
                    <div class="clear"></div>
                </div>
                <div class="talent_list" id="listContent">
				<!--
                    <div class="listItem">
                        <div class="f name" style="width:40px; height:5px;"></div>
                        <div class="f name">吴文杰</div>
                        <div class="f major">软件工程</div>
                        <div class="f school">中山大学</div>
                        <div class="f raiser">王变琴</div>
                        <div class="f type">信息更改</div>
                        <div class="f graduateTime">2014-2-12</div>
                        <div class="t reject">拒绝</div>
                        <div class="t pass">通过 </div>
                        <div class="clear"></div>
                    </div>
                    <div class="listItem">
                        <div class="f name" style="width:40px; height:5px;"></div>
                        <div class="f name">陈学家</div>
                        <div class="f major">计算机应用</div>
                        <div class="f school">中山大学</div>
                        <div class="f raiser">王变琴</div>
                        <div class="f type">人才申请</div>
                        <div class="f graduateTime">2014-2-23</div>

                        <div class="t reject">拒绝</div>
                        <div class="t pass">通过 </div>
                        <div class="clear"></div> 
					</div>-->
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
<script>
    $(function(){
        (function(){
            var ctr = {
                el:$("#StudentList"),
                items:$(".listItem"),
                pass:$(".pass"),
                reject:$(".reject")
            }
            ctr.init=function(){
                this.pass.click(this.passHandle);
                this.reject.click(this.rejectHandle);
            }
            ctr.passHandle = function(){
                if(confirm("是否确认通过此请求？")){
                    this.parent().remove();
                }
            }
            ctr.rejectHandle = function(){
                if(confirm("是否确认拒绝此请求？")){
					var reason = prompt("请简要填写拒绝请求的原因：");
                    this.parent().remove();	
                }
            }
            ctr.init();
    
            var json = <?php echo ($getJson); ?>;
            for (var i=0;i<json.length;i++){
				var entry = new Talent(json[i]);
			}
			
			$('.pass').click(function(){
				if(confirm("是否确认通过此请求？")){
					var sid = $(this).siblings(".sid").html();
					var data = {"sid":sid};
					var _this = $(this);
					$.post("__URL__/approve", data, function(str){
						//alert(str);
						_this.parent().remove();
					}).error(function(){
						alert("通过审批失败！");
					});
				}
			});
	
			$('.reject').click(function(){
				if(confirm("是否确认拒绝此请求？")){
					var reason = prompt("请简要填写拒绝请求的原因：");
					var sid = $(this).siblings(".sid").html();
					var data = {"sid":sid,"reason":reason};
					//console.log(data);
					var _this = $(this);
					$.post("__URL__/reject", data,function(){
						_this.parent().remove();
					}).error(function(){
						alert("拒绝审批失败！");
					});	
				}
			});
        })()
		
    })
	
	
	
	var Talent = (function(){
		function Talent(talent){
			this.sid = talent.sid;
			this.sname = talent.sname;
			this.reg_time = talent.temp_reg_time;
			this.uname = talent.uname;
			this.graduation_year = talent.graduation_year;
			this.tname = talent.tname;
			this.major = talent.major;
			this.status = talent.status;
			this.build();
		}
		
		Talent.prototype.build = function(){
			entry = $('<div class="listItem"><div class="f name" style="width:40px; height:5px;"></div><div class="f name"><a target="_blank" href="__URL__/temp_student/sid/'+this.sid+'">'+this.sname+'</a></div><div class="f major">'+this.major+'</div> <div class="f school">'+this.uname+'</div>  <div class="f raiser">'+this.tname+'</div> <div class="f type">'+this.status+'</div>  <div class="f graduateTime">'+this.reg_time+'</div> <div class="sid" style="display:none">'+this.sid+'</div></div>');
			cond1 = $('<div class="t reject">拒绝</div><div class="t pass">通过 </div>');
			cond2 = $('<div class="t pass">通过 </div>');
			if (this.status == '已被拒绝')
				entry.append(cond2);
			else entry.append(cond1);
			entry.append($('<div class="clear"></div>')).appendTo($('.talent_list'));
		}
		
		return Talent;
	})();
	
</script>

</body>
</html>