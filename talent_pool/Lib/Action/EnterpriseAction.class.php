<?php
class EnterpriseAction extends CommonUserAction{
	private $model;

	public function enterprise(){
		$this->$model = new EnterpriseManageModel();
		$this->init("enterprise");
		$this->basic_mailbox();
		$this->assign("username", session("username"));
		$this->display();
	}	
    public function header(){
   		$this->assign("username", session("username"));
   		$this->display();
    }

    public function edit_enterprise_page(){
        //assign json
        $this->assign("username", session("username"));
        $this->display();
    }
    
	public function sendEmail(){
        if (!isset($_GET["objtype"]))
            $objtype = "enterprise";
        else
            $objtype = $_GET["objtype"];
        $json = $this->getRecList($objtype, false);
        $this->assign("getJson", $json);
        $this->assign("objtype", $objtype);
        $this->assign("username", session("username"));
        $this->display();
    }

	public function approve_page(){
		$this->$model = new EnterpriseManageModel();	
		$arr = $this->$model->readAllTemp();
		#var_dump($arr);
		$i = 0;
		while (isset($arr[$i])){
			$arr[$i]['tname'] = $this->_getTname($arr[$i]['tid']);
			$arr[$i]['uname'] = $this->_getUname($arr[$i]['uid']);
			$arr[$i]['status'] = $this->_getStatus($arr[$i]['status']);
			$date = date_create($arr[$i]['temp_reg_time']);
			$arr[$i]['temp_reg_time'] = date_format($date, 'Y-m-d');

			unset($arr[$i]["tid"]);
			unset($arr[$i]["uid"]);
			$i++;
		}		
		
		$json = json_encode($arr);
		
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

	public function approve(){
		$id = $_POST["sid"];
		$cond["sid"] = $id;
		$model = D("temp_student");
		$data =$model->where($cond)->find();
		
		$this->$model = new EnterpriseManageModel();
		
		if ($data["status"] == 3)
			$this->$model->delete_user("student", $id);
		else
			$this->$model->passTemp($id);
		echo $id;
	}

	public function reject(){
		$id = $_POST["sid"];
		$reason = $_POST["reason"];
		$this->$model = new EnterpriseManageModel();
		$this->$model->rejectTemp($id, $reason);
		#$this->redirect('__URL__/approve_page', '', 1, "该学生修改请求已被拒绝");
	}

	public function manage_page(){
		if (!isset($_GET["objtype"]))
			$_GET["objtype"] = "student";
		$objtype = $_GET["objtype"];
		$model = D($objtype);
		$arr = $model->select();
		
		$i = 0;
		while(isset($arr[$i])){
			unset($arr[$i]["password"]);
			$date = date_create($arr[$i]['reg_time']);
			$arr[$i]['reg_time'] = date_format($date, 'Y-m-d');
			if ($objtype == "student"){
				$arr[$i]["tname"] = $this->_getTname($arr[$i]["tid"]);
				$arr[$i]["uname"] = $this->_getUname($arr[$i]["uid"]);
			}
			if ($objtype == "teacher"){
				$arr[$i]["uname"] = $this->_getUname($arr[$i]["uid"]);
			}
			$i++;
		}
		
		#var_dump($arr);
		
		$json = json_encode($arr);
		$this->assign("objtype", $objtype);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

		/*
		public function createStudent(){
			$this->assign("username", session("username"));
			$this->display();
		}

		public function _createStudent($data){

		} */

		
		
	public function createTeacher(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function _createTeacher(){
		$condition = $_POST;
		$condition["uid"] = $this->$model->getUid($_POST["uname"]);
		$condition["tid"] = $condition["uid"]."_".$_POST["tid"];
		$condition["reg_time"] = date("Y-m-d H:i:s");
		$condition["password"] = md5($condition["tid"]);
		$result = $this->$model->createUser("teacher", $condition);


		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success($condition["tname"]."老师信息添加成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createTeacher");
			$this->error($condition["tname"]."老师信息添加失败！", false);
		}
	}

	public function createCompany(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function _createCompany(){
		$condition = $_POST;
		$condition["cid"] = "COM_".$_POST["cid"];
		$condition["password"] = md5($condition["cid"]);

		$result = $this->$model->createUser("company", $condition);

		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success($condition["cname"]."客户信息添加成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createCompany");
			$this->error($condition["cname"]."客户信息添加失败！", false);
		}
	}

	public function createUniversity(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function _createUniversity(){
		$data = $_POST;

		$result = $this->$model->createUser("university", $data);

		if ($result > 0){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success($condition["uname"]."信息添加成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createUniversity");
			$this->error("该学校ID信息已存在于库中，数据重复", false);
		}
	}

	public function deleteTeacher(){
		$id = $_POST["tid"];
		$result = $this->$model->deleteUser("teacher", $id);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("教师删除成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->error("教师删除失败！", false);
		}
	}

	public function deleteStudent(){
		$id = $_POST["sid"];
		$result = $this->$model->deleteUser("student", $id);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("学生删除成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->error("学生删除失败！", false);
		}
	}

	public function deleteCompany(){
		$id = $_POST["cid"];
		$result = $this->$model->deleteUser("company", $id);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("客户公司删除成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->error("客户公司删除失败！", false);
		}
	}

	public function deleteUniversity(){
		$id = $_POST["uid"];
		$result = $this->$model->deleteUser("university", $id);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("合作大学删除成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->error("合作大学删除失败！", false);
		}
	}

	public function edit_teacher_page(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function edit_company_page(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function edit_student_page(){
		$this->assign("username", session("username"));
		$this->display();
	}

	public function edit_teacher(){
		$data = $_POST;
		$result = $this->$model->modifyUser("teacher", $data);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("该教师信息修改成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/edit_teacher_page");
			$this->error("修改失败！", false);
		}
	}

	public function edit_company(){
		$data = $_POST;
		$result = $this->$model->modifyUser("company", $data);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("该客户公司信息修改成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/edit_company_page");
			$this->error("修改失败！", false);
		}
	}

	public function edit_student(){
		$data = $_POST;
		$result = $this->$model->modifyUser("student", $data);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("该学生人才信息修改成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/edit_student_page");
			$this->error("修改失败！", false);
		}
	}

	public function teacher(){
		$this->$model = new EnterpriseManageModel();
		$id = $_GET["tid"];
		$arr = $this->$model->readUser("teacher", $id);
		$json = json_encode($arr);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

	public function company(){
		$this->$model = new EnterpriseManageModel();
		$id = $_GET["cid"];
		$arr = $this->$model->readUser("company", $id);
		$json = json_encode($arr);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

	public function university(){
		$this->$model = new EnterpriseManageModel();
		$id = $_GET["uid"];
		$arr = $this->$model->readUser("university", $id);
		$json = json_encode($arr);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}
	}
?>
