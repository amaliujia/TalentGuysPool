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


<link rel="stylesheet" href="__PUBLIC__/css/recommandStudent.css" /> 
<style>
	tr{
		height: 40px;
	}
	#basicinfo{
		text-align:center;
	}
	table{
		text-align: left;
	}
</style>
<div class="wrapper" id="contentWrapper">
	<div class="inner" style="float:none; margin:auto;width:80%;">
		<div>
			<div style="padding:10px; width:80%; margin:auto; background: white;padding: 1px 20px 50px 20px;border-radius: 5px;" id="RightDiv">
			<div id="basicinfo">
				<form id="basic" method="post" action="__URL__/recommandNow">
				<h2 align="center">基本信息</h2>
					<table>  
						<tr>
							<td> 姓名:</td>
							<td><input type="text" name="sname" /></td>
						</tr>

						<tr>
							<td>生日:</td>
							<td  ><input type="date" name="birthday"/></td>
						</tr>

						<tr>
							<td>性别:</td>
							<td >  
								<select name="sex">
									<option value="1" selected>男</option>
									<option value="0" >女</option>
								</select> 
							</td>
						</tr>

						<tr>
							<td>电话:</td>
							<td>
								<input name="tel" />
							</td>
						</tr>

						<tr>
							<td>邮箱:</td>
							<td>
								<input name="email" />
							</td>
						</tr>

						<tr>
							<td>专业:</td>
							<td>
								<input name="major" />
							</td>
						</tr>
						
						<tr>
							<td>学历:</td>
							<td>
								<select name="degree">  
									<option selected value="本科">本科</option> 
									<option value="硕士">硕士</option>
									<option value="博士">博士</option>
								</select>
							</td>
						</tr>

						<tr>
							<td>
								毕业年份:
							</td> 
							<td>
								<input type="text" name="graduation_year"/>
							</td>
						</tr>
						
					</table>
					<br class="position" />
					<br />
					</div>
					
				
				
					<div  id="ibmscholar">
						<h2 align="center">IBM相关技能</h2>
						<div id="IBM">
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
								<td ><input  type="checkbox"/>获IBM全球专业认证</td>

							</tr>
						</table>
						</div>
						<br />
					</div>	

			
				
				
					<div id="itskill" class="position">
					<h2 align="center">专业技能</h2>
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
					</div>
					<br />
				
				
				
					<div id="scores">
					<h2 align="center">荣誉</h2>
						<table>
							<tr>
								<td>
									平均绩点：
								</td>
								<td>
									<input type="text" size="3" name="gpa"/> 
								</td>
								<td>
									(满绩点 4.0 折算)
								</td>
							</tr>
							<tr>
								<td>
									年级排名：
								</td>
								<td>
									<span><input type="text" size="3"  name="rank"/></span>
									<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</span>
								</td>
								<td>
									 (即您的排名在全年级中的百分比)
								</td>
							</tr>
							<tr>
								<td>
									英语四级成绩：
								</td>
								<td>
									<input type="text" size="5"  name="cet4"/> 
								</td>
							</tr>
							<tr>
								<td>
									英语六级成绩：
								</td>
								<td>
									<input type="text" size="5"  name="cet6"/> 
								</td>
							</tr>
							<tr>
								<td>
									最高获得奖学金:
								</td>
								<td >
									<select name="fellowship">
										<option value="NULL" selected>无</option>
										<option value="国家奖学金">国家奖学金</option>
										<option value="一等奖学金">一等奖学金</option>
										<option value="二等奖学金">二等奖学金</option>
										<option value="三等奖学金">三等奖学金</option>
										<option value="专项奖学金">专项奖学金</option>
									</select>
								</td>
							</tr>
						</table>           
					</div>
                    <h2 align="center">个人简介</h2>
                    <div style="text-align:center;">
                    <textarea name="profile" rows=15 cols=87 placeholder="请输入学生个人简介信息"></textarea>
                    </div>
					<br class="position"/>
					<br />
                    <div style="text-align:center;">
					<input type="submit">
                    </div>
				</form>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
<br />
<div class="wrapper" id="footerWrapper">
</div>
<script>
$(document).ready(function(){
	//Add value to checkbox
	$("input:checkbox").each(function(){
		var content = $(this).parent().html();
		for (var i=content.length-1;i>=0;i--){
			if (content[i] == '>') break;
		}
		content = content.slice(i+1, content.length);
		$(this).val(content);
	});
	//Add data to the page
	var info = <?php echo ($basic_info); ?>;
	var scores = <?php echo ($scores); ?>;
	var it = <?php echo ($itskill); ?>;
	var ibm = <?php echo ($ibmprize); ?>;
	
	function fill(vals){
		for (name in vals){
			$("[name='"+name+"']").val(vals[name]);
		}
	}
	
	function checkon(vals){
		for (x in vals){
			$("input[value='"+vals[x]["skillname"]+"']").attr("checked","true");
			$("input[value='"+vals[x]["prizename"]+"']").attr("checked","true");
		}
	}
	
	fill(info);
	fill(scores);
	checkon(it);
	checkon(ibm);
});
</script>
</body>
</html>