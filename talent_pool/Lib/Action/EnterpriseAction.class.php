<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @description The action of user enterprise.
 * @todo The modification and deletion of other accounts; The profile module of enterprise; Process for the deletion request.
 */
class EnterpriseAction extends CommonUserAction{
	/**
	 * Function enterprise() : the index page of enterprise user.
	 * 
	 * @access public
	 * 
	 */
	public function enterprise(){
		$this->init("enterprise");
		$this->basic_mailbox();
		$this->assign("username", session("username"));
		$this->display();
	}	

    /**
	 * Function sendEmail() : the controller of template sendEmail.html.
	 * 
	 * @access public
	 * @param string the receiver's usertype
	 */
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
	/**
	 * Function approve_page() : the controller of template approve_page.html.
	 * The page that enterprise user can check and determine some request like talent creation, talent deletion and talent modification.
	 * @access public
	 * 
	 */
	public function approve_page(){
		$model = new EnterpriseManageModel();	
		$arr = $model->readAllTemp();
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
	/**
	 * Function approve() : accept the request
	 * 
	 * @access public
	 * @todo cannot process the deletion request yet
	 */
	public function approve(){
		$id = $_POST["sid"];
		$cond["sid"] = $id;
		$model = D("temp_student");
		$data =$model->where($cond)->find();
		
		$model = new EnterpriseManageModel();
		
		if ($data["status"] == 3)
			$model->deleteUser("student", $id);
		else
			$model->passTemp($id);
		echo $id;
	}
	/**
	 * Function approve() : reject the request
	 * 
	 * @access public
	 *
	 */
	public function reject(){
		$id = $_POST["sid"];
		$reason = $_POST["reason"];
		$model = new EnterpriseManageModel();
		$model->rejectTemp($id, $reason);
		#$this->redirect('__URL__/approve_page', '', 1, "该学生修改请求已被拒绝");
	}
	/**
	 * Function manage_page() : the controller of template manage_page.html.
	 * The page for enterprise's managing other accounts including teacher, company and student.
	 *
	 * @access public
	 * @param string the type of user. Enum{student, company, teacher}
	 */
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

		
	/**
	 * Function createTeacher() : create a new teacher account
	 * The page for user to input message
	 * @access public
	 * 
	 */	
	public function createTeacher(){
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function _createTeacher() : create a new teacher account
	 * The action of creation.
	 * @access public
	 * 
	 */
	public function _createTeacher(){
		$condition = $_POST;
		$model = new EnterpriseManageModel();
		$condition["uid"] = $model->getUid($_POST["uname"]);
		$condition["tid"] = $condition["uid"]."_".$_POST["tid"];
		$condition["reg_time"] = date("Y-m-d H:i:s");
		$condition["password"] = md5($condition["tid"]);
		$result = $model->createUser("teacher", $condition);


		if ($result != false){
			$this->assign("jumpUrl", "__URL__/manage_page");
			$this->assign("waitSecond", 300);
			$this->success($condition["tname"]."老师信息添加成功！请将此保存，账户与密码均为".$condition["tid"], false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createTeacher");
			$this->error($condition["tname"]."老师信息添加失败！", false);
		}
	}
	/**
	 * Function createCompany() : create a new company account
	 * The page for user to input message
	 * @access public
	 * 
	 */
	public function createCompany(){
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function _createCompany() : create a new company account
	 * The action of creation.
	 * @access public
	 * 
	 */
	public function _createCompany(){
		$condition = $_POST;
		$condition["cid"] = "COM_".$_POST["cid"];
		$condition["password"] = md5($condition["cid"]);
		$model = new EnterpriseManageModel();
		$result = $model->createUser("company", $condition);

		if ($result != false){
			$this->assign("jumpUrl", "__URL__/manage_page");
			$this->assign("waitSecond", 300);
			$this->success($condition["cname"]."客户信息添加成功！请将此保存，账户与密码均为".$condition["cid"], false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createCompany");
			$this->error($condition["cname"]."客户信息添加失败！", false);
		}
	}
	/**
	 * Function createUniversity() : create a new university data
	 * The page for user to input message
	 * @access public
	 * 
	 */
	public function createUniversity(){
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function _createUniversity() : create a new university data
	 * The action of creation.
	 * @access public
	 * 
	 */
	public function _createUniversity(){
		$data = $_POST;
		$model = new EnterpriseManageModel();
		$result = $model->createUser("university", $data);

		if ($result > 0){
			$this->assign("jumpUrl", "__URL__/manage_page");
			$this->assign("waitSecond", 5);
			$this->success($condition["uname"]."信息添加成功！学校代号为  ".$condition["uid"], false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/createUniversity");
			$this->error("该学校ID信息已存在于库中，数据重复", false);
		}
	}
	/*
	public function deleteTeacher(){
		$id = $_POST["tid"];
		$result = $model->deleteUser("teacher", $id);
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
		$result = $model->deleteUser("student", $id);
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
		$result = $model->deleteUser("company", $id);
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
		$result = $model->deleteUser("university", $id);
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
		$result = $model->modifyUser("teacher", $data);
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
		$result = $model->modifyUser("company", $data);
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
		$result = $model->modifyUser("student", $data);
		if ($result != false){
			$this->assign("jumpUrl", "__URL__/all_accounts");
			$this->success("该学生人才信息修改成功！", false);
		}
		else{
			$this->assign("jumpUrl", "__URL__/edit_student_page");
			$this->error("修改失败！", false);
		}
	}*/
	/**
	 * Function teacher() : show the teacher profile for enterprise user
	 * 
	 * @access public
	 * 
	 */
	public function teacher(){
		$model = new EnterpriseManageModel();
		$id = $_GET["tid"];
		$arr = $model->readUser("teacher", $id);
		$json = json_encode($arr);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function company() : show the company profile for enterprise user
	 * 
	 * @access public
	 * 
	 */
	public function company(){
		$model = new EnterpriseManageModel();
		$id = $_GET["cid"];
		$arr = $model->readUser("company", $id);
		$json = json_encode($arr);
		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}

}
?>
