<?php
class CommonUserAction extends Action{

	protected function init($typ){			//实例类初始化对象
		session("usertype", $typ);
		$this->linkDB("username");
	}

	protected function linkDB($attr){			//连接数据库获取用户信息
		$typ = session("usertype");
		$condition[$typ[0]."id"] = session("userid");
		$model = D($typ);
		$row = $model->where($condition)->find();
		if (!$row)
			return false;

		session("username", $row[$typ[0]."name"]);
		return $row[$attr];
	}

	public function change_password(){		//修改密码页面	
		$this->assign("username", session("username"));
		$this->display();			
	}

	public function modify_password(){		//修改密码脚本
		header("Content-Type:text/html; charset=utf-8");
		$old_password = md5($_POST["old_password"]);
		$new_password = md5($_POST["new_password"]);
		$typ = session("usertype");

		$pwd = $this->linkDB("password");

		$err = new Exception("您的原密码输入有误!");
		if ($pwd == $old_password){
			//插入新的密码至数据库
			$model = D($typ);
			$condition[$typ[0]."id"] = session("userid");
			$data["password"] = $new_password;
			$model->where($condition)->save($data);
			//ajax 修改成功
			$this->assign("jumpUrl", "__URL__/change_password");
			$this->success("密码修改成功！", false);
		}
		else{
			//ajax 密码错误
			$this->assign("jumpUrl", "__URL__/change_password");
			$this->error($err->getMessage(), false);
		}
	}

	public function profile(){				//个人简介页面
		$typ = session("usertype");
		$this->assign("username", session("username"));
		$model = D($typ);
		$condition[$typ[0]."id"] = session("userid");
		$arr = $model->where($condition)->find();

		if (isset($arr["uid"])){
			$model = D("university");
			$cond["uid"] = $arr["uid"];
			$row = $model->where($cond)->find();
			$arr["university"] = $row["uname"];
		}

		$this->assign("username", session("username"));
		$json = json_encode($arr);	
		$this->assign("getJson",$json);
		$this->display();		
	}

	public function student_profile(){
		try{
			if (!isset($_GET["sid"]))
				throw new Exception();

			$condition["sid"] = $_GET["sid"];
			$model = D("student");
			$arr = $model->where($condition)->find();

			if (!$arr)
				throw new Exception();

			$arr["uname"] = $this->_getUname($arr["uid"]);
			$arr["tname"] = $this->_getTname($arr["tid"]);
			unset($arr["password"]);
			unset($arr["tid"]);
			unset($arr["uid"]);


			$json = json_encode($arr);
			$this->assign("basic_info", $json);

			$model = D("scores");
			$arr = $model->where($condition)->find();
			$json = json_encode($arr);
			$this->assign("scores", $json);

			$model = D("itskill");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("itskill", $json);

			$model = D("ibmprize");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("ibmprize", $json);
			$this->assign("username", session("username"));
		}
		catch(Exception $e){
			if (session("usertype") == "company")
				$this->redirect("__URL__/talent_search");
			else
				$this->redirect("__URL__/manage_page");
		}
		$this->display();
	}

	public function edit_profile(){
		$typ = session("usertype");
		$model = D($typ);
		$condition[$typ[0]."id"] = session("userid");
		$arr = $model->where($condition)->find();

		if (isset($arr["uid"])){
			$model = D("university");
			$cond["uid"] = $arr["uid"];
			$row = $model->where($cond)->find();
			$arr["university"] = $row["uname"];
		}

		if (isset($arr["password"]))
			unset($arr["password"]);
		$json = json_encode($arr);	

		$this->assign("username", session("username"));
		$this->assign("getJson", $json);
		$this->display();
	}

	public function modify_profile(){		//修改个人简介脚本
		$typ = session("usertype");
		$model = D($typ);
		$condition[$typ[0]."id"] = session("userid");

		$data = $_POST;

		$model->where($condition)->save($data);

		$this->assign("jumpUrl", "__URL__/profile");
		$this->success("您的基本资料修改成功！", false);
	}

	public function student(){
			$condition = array();
			if (session("usertype") == "student"){
				$this->init("student");
				$condition["sid"] = session("userid");
			}
			else{
				$condition["sid"] = $_GET["sid"];
			}
			
			$model = D("student");
			$arr = $model->where($condition)->find();

			if (!$arr)
				throw_exception("在人才库里查找不到您所请求的学生，请返回首页。。");

			$arr["uname"] = $this->_getUname($arr["uid"]);
			$arr["tname"] = $this->_getTname($arr["tid"]);
			unset($arr["password"]);
			unset($arr["tid"]);
			unset($arr["uid"]);


			$json = json_encode($arr);
			$this->assign("basic_info", $json);

			$model = D("scores");
			$arr = $model->where($condition)->find();
			$json = json_encode($arr);
			$this->assign("scores", $json);

			$model = D("itskill");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("itskill", $json);

			$model = D("ibmprize");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("ibmprize", $json);
			$this->assign("username", session("username"));
			$this->display();
		}
	
		public function temp_student(){
			if (!isset($_GET["sid"]))
				$this->redirect("__URL__/".session("usertype"));
		
			$condition["sid"] = $_GET["sid"];
			$model = D("temp_student");
			$arr = $model->where($condition)->find();

			if (!$arr)
				throw new Exception();

			$arr["uname"] = $this->_getUname($arr["uid"]);
			$arr["tname"] = $this->_getTname($arr["tid"]);
			#unset($arr["password"]);
			unset($arr["tid"]);
			unset($arr["uid"]);


			$json = json_encode($arr);
			$this->assign("basic_info", $json);

			$model = D("temp_scores");
			$arr = $model->where($condition)->find();
			$json = json_encode($arr);
			$this->assign("scores", $json);

			$model = D("temp_itskill");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("itskill", $json);

			$model = D("temp_ibmprize");
			$arr = $model->where($condition)->select();
			$json = json_encode($arr);
			$this->assign("ibmprize", $json);
			$this->assign("username", session("username"));
			$this->display();
		}
	
		protected function _getUname($uid){
			$model = D("university");
			$cond["uid"] = $uid;
			$row = $model->where($cond)->find();
			return $row["uname"];
		}
		
		protected function _getTname($tid){
			$model = D("teacher");
			$cond["tid"] = $tid;
			$row = $model->where($cond)->find();
			return $row["tname"];
		}
		
		protected function _getStatus($status){
			switch ($status){
				case 1: return "人才申请";
				case 2: return "信息更改";
				case 3: return "删除请求";
				case -1: return "已被拒绝";
				case 0: return "正常在库";
				default: return "未知状态";
			}
		}
	
	public function basic_mailbox(){		//基本邮箱功能
		$model = new MailboxModel;

		$this->assign("stat_msg", $model->getStatRcvMsg());
		$this->assign("stat_ent_msg", $model->getStatRcvMsg("enterprise"));
		$this->assign("stat_std_msg", $model->getStatRcvMsg("student"));
		$this->assign("stat_tch_msg", $model->getStatRcvMsg("teacher"));
		$this->assign("stat_com_msg", $model->getStatRcvMsg("company"));
	}

	public function mailbox($objtype = "all", $page = 1, $num_perpage = 20){
		$model = new MailboxModel();

		$this->basic_mailbox();

		$arr = $model->getPageMsg($objtype, $page, $num_perpage);
		$json = json_encode($arr);		
		$totalpage = $model->getTotalPage($objtype, $num_perpage);
		$this->assign("totalpage", $totalpage);
		$this->assign("objtype", $objtype);
		$this->assign("page", $page);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

	public function message(){
		if (!isset($_GET["msgid"]))
			$this->redirect("__URL__/mailbox");
		$msgid = $_GET["msgid"];
		$model = new MailboxModel();
		$arr = $model->showMsg($msgid);

		$model = D($arr["sender_type"]);
		$cond[$arr["sender_type"][0]."id"] = $arr["sender_id"];
		$row = $model->where($cond)->find();
		$arr["sender_name"] = $row[$arr["sender_type"][0]."name"];

		$this->assign("title", $arr["title"]);
		$this->assign("content", $arr["content"]);
		$this->assign("sendtime", $arr["sendtime"]);
		$this->assign("sender_name", $arr["sender_name"]);
		$this->assign("username", session("username"));
		$this->display();
	}

	public function _sendEmail(){
		$model = new MailboxModel();
		$data["title"] = $_POST["title"];
		$data["content"] = $_POST["content"];
		$data["sendtime"] = date("Y-m-d H:i:s");
		$data["sender_id"] = session("userid");
		$data["sender_type"] = session("usertype");
		$data["unread"] = 1;

		$reclist = $_POST["rec_list"];

		foreach ($reclist as $rec){
			$data["receiver_id"] = $rec["id"];
			$model->sendMsg($data);
		}

		$this->redirect("__URL__/mailbox");
	}

	public function getRecList($objtype, $ajax=true){
		if ($objtype == null)
			throw_exception("请定义信息接收者对象类型！");

		$userid = session("userid");
		$key =$_POST["keyword"] ;
		$model = new MailboxModel();
		$arr = array();

		switch ($objtype){
			case "student": $arr = $model->getStudents($key); break;
			case "enterprise": $arr = $model->getEnterprise($key); break;
			case "teacher": $arr = $model->getTeachers($key); break;
			case "company": $arr = $model->getCompanies($key); break;
			default: throw_exception("错误的对象给该用户发送消息！");;
		}
		
		$json = json_encode($arr);

		if ($ajax)
			echo $json;
		//	return $json;
		else
			return $json;
	}
}
?>
