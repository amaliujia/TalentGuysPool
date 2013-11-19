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
 

<div class="wrapper" id="contentWrapper">
	<div class="inner">
    	<div class="left">
        	<div id="MailNav" class="H">
                <h3>写信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                    <li><a href="__URL__/sendEmail/objtype/student">向学生发送信息</a></li>
                    <li><a href="__URL__/sendEmail/objtype/enterprise">向企业发送信息</a></li>
                </ul>
                <br /><br />
                <h3>收信<img  src="__PUBLIC__/img/sidebar-arrow.png"  style="position:absolute; right:-9px; top:0px; " /></h3>
                <ul>
                   <li><a href="__URL__/mailbox/objtype/all">所有信息</a><label><?php echo ($stat_msg); ?></label> </li>
                    <li><a href="__URL__/mailbox/objtype/enterprise">企业信息</a> <label><?php echo ($stat_ent_msg); ?></label></li>
                    <li><a href="__URL__/mailbox/objtype/student">学生信息</a> <label><?php echo ($stat_std_msg); ?></label></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div style="padding:10px;">
				<style>
				#contentWrapper>.inner>.right input[type=text]{
					width:550px;
				}
				#contentWrapper>.inner>.right textarea{
					width:550px;
					height:300px;
				}
				#SelectBox {
					width:550px;
					height:200px;
					overflow-y:scroll;
					overflow-x:hidden;
					padding:10px;
					background:#F1F1F1;
					position:relative;
				}
				#SelectBox .item{
					border: solid 1px #CACACA;
					background-color: #CFCFCF;
					float: left;
					margin-right: 20px;
					margin-bottom: 5px;
					color: #292424;
					text-align: center;
					padding: 5px;
				}
				#SelectBox .item label{
					color:#FFF;
				}
				#SelectBox input[value=全选]{
					float:left; 
				}
				#SelectedBox{
					height: 30px;
					border: solid 1px #C0BFBF;
					padding: 2px;
					width: 570px;
					overflow:hidden;
				}
				.selected-item{
					font-size:xx-small;
					display:inline-block;
					text-align:center;
					padding:1px 2px ;
					margin:2px;
					margin-right:15px;
					background:#ccc;
					color:#888;
					float:left;
					position:relative;
				}
				.selected-item .delete{
					position: absolute;
					top: 5px;
					right: -17px;
					color: #1F1D1D;
					font-size: 10px;
					cursor: pointer;
					width: 20px;
					line-height: 12px;
					word-spacing: 10px;
				}
				.selected-item .delete:hover{
					color:#900;
				}
				.clear{clear:both;} 
				
				</style>
                <form method="post"  id="MailBox" action="">
				<table>
					<tbody>
						<tr>
							<td>收件人</td>
							<td><div id="SelectedBox"> </div></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div id="SelectBox">
								<input type="button" value="全选" class="selectAll" />
                                <input type="button" value="显示全部" class="showAll" />
								<input type="search" placeholder="查找" class="searchValue" />
								<input type="button" value="搜索" class="searchName" />
                                <input type="button" value="添加" class="addName" style="float:right;" />
								<br /> 
                                <!--<span class="item"><input type="checkbox"  data-id="2" value="name"/><label>胡灵</label></span>
                                <span class="item"><input type="checkbox"  data-id="3" value="name"/><label>张冰</label></span>
                                <span class="item"><input type="checkbox"  data-id="4"  value="name"/><label>小夏</label></span>
                                <span class="item"><input type="checkbox"  data-id="5" value="name"/><label>春水</label></span>
                                <span class="item"><input type="checkbox"  data-id="6" value="name"/><label>刘琦</label></span>-->
							 </div>
							</td>
						</tr>
						<tr>
							<td>主题</td>
							<td><input id="MailTitle" type="text" width="400px;" /></td>
						</tr>
						<tr>
							<td style="text-align:start;"> </td>
							<td> <textarea id="MailInfo" style="vertical-align:text-top;"> </textarea></td>
						</tr>
					</tbody>
				</table>
                	<input type="submit" id="SUBMIT" value="发送" style="float:right; margin-right:30px;" />
                    <div class="clear"></div>
                </form>
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
(function(){
	var mailBox ={ 
		//propertites elements
		el:$("#MailBox"),
		selected:$("#SelectedBox"),
		selector:$("#SelectBox"),
		title:$("#MailTitle"),
		msg:$("#MailInfo"),
		contacts:[],
		nameData:<?php echo ($getJson); ?>,
		submitBTN:$("#SUBMIT"),
		
		//methods
		addName:null,
		initNames:null,
		searchName:null,
		selectAll:null,
		sbmit:null,
		init:null
	};
	mailBox.init=function(){
		this.initNames();
		this.selector.find(".addName").bind("click",$.proxy(this.addName,this));
		this.selector.find(".searchName").bind("click",$.proxy(this.searchName,this));
		this.selector.find(".selectAll").bind("click",$.proxy(this.selectAll,this));
		this.selector.find(".showAll").bind("click",$.proxy(this.showAll,this));
		this.submitBTN.bind("click",$.proxy(this.sbmit,this));
		this.selected.delegate("label","click",function(ev){
			var target = $(ev.currentTarget);
			target.parent().remove();
		});
		this.setContacts();
	}
	//init the name box
	mailBox.initNames = function(){
		var names = this.nameData;
		for(var i=0 , l=names.length; i<l ;i++){
			var val = names[i];
			var it=$("<span class=\"item\"><input type=\"checkbox\" name=\"	[]\" data-id=\""+val.id+"\"/><label>"+val.name+"</label></span>");
			this.selector.append(it);
		}
		var clr =$("<div class='clear'></div>");
		this.selector.append(clr);
	}
	//add name to the slectedBox
	mailBox.addName = function(){
		var items = this.selector.find(".item");
		var selectedNames = [];
		//find all the checked items in the selector box
		items.each(function(){
			var el = $(this).find("input");//.attr("checked");
			var name = $(this).find("label").html();
			if(el.attr("checked")== "checked" ){
				var it = { 
				 id: el.data().id,
				 name: name
				}
			   selectedNames.push(it);
 			}
		}); 
		 //add these item to the selected Box
		for(var i=0,l=selectedNames.length;i<l;i++){
			var val=selectedNames[i];
			 var id = val.id;
			 var name= val.name;
			 if(!this.checkValid(id)) continue;
			 var it = $("<div class='selected-item' data-id='"+id+"'>"+name+" <label class='delete'>X</label></div>");
			 //check  the id repeatment then append
			 this.selected.append(it.clone());	 
		}
		
				
	};
	//check if  there are the same name in the box
	mailBox.checkValid = function (id){
		var selected = this.selected.find(".selected-item");
		var response = true ;
		for(var i=0,l=selected.length; i<l;i++){
			if(id==selected[i].dataset.id){
				response=false;
				break;
			}
		}
		return response;
	}
	//find names from the search box
	mailBox.searchName = function(){
		var str = this.selector.find(".searchValue").val();
		str = str.replace(" ","");
		if(str=="") return;
		console.log(str);
		var contacts = this.contacts;
		for(var i=0,l=contacts.length; i<l;i++){
			var it = contacts[i];
			 var name="*****"+it.name;
			if(name.indexOf(str) >4){
				it.el.show();
			}
			else{
				it.el.hide();
			}
		}
		
		
	}
	//store the reference of items in the contacts array
	mailBox.setContacts = function(){
		var items = this.selector.find(".item");
		var contacts = this.contacts;
		items.each(function(){
			var el=$(this);
			var id = $(this).find("input").data().id;//.attr("checked");
			var name = $(this).find("label").html();
			contacts.push({ el:el, id:id ,name:name });
		});
		
	}
	//select all
	mailBox.selectAll = function(){
		if(typeof(this.switcher)=="undefined")  this.switcher = true;
		var contacts = this.contacts;
		if(this.switcher == true){
			for(var i=0,l=contacts.length;i<l;i++){
				var it = contacts[i];
				it.el.show();
				it.el.find("input").attr("checked","checked");
			}
		}
		else{
			console.log(this.switcher);
			for(var i=0,l=contacts.length;i<l;i++){
				var it = contacts[i];
				it.el.show();
				it.el.find("input").attr("checked",null);
			}
		}
		this.switcher = (!this.switcher);	
	}
	//show all
	mailBox.showAll = function(){
		var contacts = this.contacts;
		for(var i=0,l=contacts.length;i<l;i++){
			var it = contacts[i];
			it.el.show();
		}
		
	}
	//sbmit
	mailBox.sbmit = function(){
		var items = this.selected.find(".selected-item");
		if(items.length == 0){
			 alert("没有选择任何收信人");
			 return false;
		}
		var data = { rec_list:[],title:"",content:"" };
		items.each(function(){
			var id = $(this).data().id;
			var name = $(this).find("label").text();
			data.rec_list.push({id:id,name:name});
		});
		data.title = $("#MailTitle").val();
		data.content = $("#MailInfo").val();
		//console.log(data);
		var addr = "__URL__/_sendEmail";
		$.post(addr, data, function(data){
			window.location.href = "__URL__/mailbox";
		});
		
		return false;
	}
	//start  the ctrller
	mailBox.init();
})();
	
	
	
});
</script>
</body>
</html>