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


<link rel="stylesheet" href="__PUBLIC__/css/mailbox.css" /> 
<div class="wrapper" id="contentWrapper">
	<div class="inner">
    	<div class="left">
        	<div id="MailNav" class="H">
                <h3>写信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                    
                    <li><a href="__URL__/sendEmail/objtype/company">向公司发送信息</a></li>
					<li><a href="__URL__/sendEmail/objtype/teacher">向教师发送信息</a></li>
					<li><a href="__URL__/sendEmail/objtype/student">向学生发送信息</a></li>
                </ul>
                <br /><br />
                <h3>收信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
               <ul>
                   <li><a href="__URL__/mailbox">所有信息</a><label><?php echo ($stat_msg); ?></label> </li>
                    <li><a href="__URL__/mailbox/objtype/company">公司信息</a> <label><?php echo ($stat_com_msg); ?></label></li>
					<li><a href="__URL__/mailbox/objtype/teacher">教师信息</a> <label><?php echo ($stat_tch_msg); ?></label></li>
                    <li><a href="__URL__/mailbox/objtype/student">学生信息</a> <label><?php echo ($stat_std_msg); ?></label></li>
                </ul>
            </div>
        </div>
        <div class="right" style="position:relative;">
           <div >
                <table id="maillist">  
					<tr class="title">
						<td></td>
						<td>
							发信人
						</td>
						<td>
							信息主题
						</td>
						<td>
							发信时间
						</td>
					</tr>
                </table>
           </div>
            
           <div style="position:absolute; bottom:10px; left:20px;">
                 <div class="Mctrl">
                 <!--<input id="delete" type="button"  value="删除"   />-->
                 <span style="width:100px; height:10px;"></span>
                 <span id="pagenum"><?php echo ($page); ?></span>/<span id="totalpage"><?php echo ($totalpage); ?></span>页
                 <input id="prev" type="button" value="上一页"/> 
                 <input id="next" type="button"  value="下一页"/> 
                 <input id="jumppage" type="number"  style="width:50px" value="1" min=1 max=<?php echo ($totalpage); ?>  />
                 <input id="jump" type="button" value="跳转"/>  
                 </div>
           <div>
        </div>
        <div class="clear"></div>
    </div>
</div>
    </div>
</div>
<script>
//======================CLASS MailEntry
MailEntry = (function(){
	function MailEntry(obj, color){
		this.title = obj["title"];
	//	this.content = obj["content"];
		this.sender_id = obj["sender_id"];
		this.sender_name = obj["sender_name"];
		this.sendtime = obj["sendtime"];
		this.msgid = obj["msg_id"];
		this.unread = obj["unread"];
		this.build(color);
	}
	
	MailEntry.prototype.build = function(color){
		var tr = $("<tr></tr>");
		tr.css("background-color", color);
		tr.append($("<td name=\"maillist[]\"><input type=\"checkbox\" /></td>"));
		tr.append("<td delta-id=\"" + this.sender_id + "\">"+this.sender_name+"</td>");
		tr.append("<td><a href=\"__URL__/message/msgid/" + this.msgid + "\">" + this.title + "</a></td>");
		tr.append("<td>"+this.sendtime+"</td>");
		
		if (this.unread > 0)
			tr.css("font-weight","bold");
		
		tr.appendTo($("#maillist"));
	};
	
	return MailEntry;
})();

//======================MAIN
$(document).ready(function(){
	//generate mail list
	var json = <?php echo ($getJson); ?>;
	var color = "#ccddee";
	var flag = true;
	
	for (var x in json){
		var obj = json[x];
		var entry = new MailEntry(obj, color);
		
		flag = !flag;
		if (flag) color = "#ccddee";
		else color = "#eeddcc";
	}
	
	var valid = function(x, mx){
		if (x>=1 && x<=mx)
			return true;
		return false;
	};
	
	//buttons
	var page = Number($("#pagenum").html());
	var mx = Number($("#totalpage").html());
	var per = <?php echo ($num_perpage); ?>;
	var objtype = "<?php echo ($objtype); ?>";
	
	$("#prev").click(function(){
		page--;
		if (valid(page, mx))
			window.location.href="__ACTION__/objtype/"+objtype+"/page/"+page+"/num_perpage/"+per;
		else
			page = 1;
	});
	$("#next").click(function(){
		page++;
		if (valid(page, mx))
			window.location.href="__ACTION__/objtype/"+objtype+"/page/"+page+"/num_perpage/"+per;
		else 
			page = mx;
	});
	$("#jump").click(function(){
		var val = Number($("#jumppage").val());
		if (valid(val)){
			page = val;
			window.location.href="__ACTION__/objtype/"+objtype+"/page/"+page+"/num_perpage/"+per;
		}
	});
});
</script>
<br />
</body>
</html>