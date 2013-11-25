<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @description The action of user teacher.
 * @todo a teacher delete student in pool cannot be satisfied now.
 */
class TeacherAction extends CommonUserAction{
	/**
	 * Function teacher() : the index page of teacher user.
	 * 
	 * @access public
	 * 
	 */
	public function teacher(){
		$this->init("teacher");
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
			$objtype = "student";
		else
			$objtype = $_GET["objtype"];
		$json = $this->getRecList($objtype, false);
		$this->assign("getJson", $json);
		$this->assign("objtype", $objtype);
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function manage_page() : the controller of template manage_page.html.
	 * The page for teacher's managing students.
	 *
	 * @access public
	 * @param string the type of student. Enum{pool, temp}
	 */
	public function manage_page(){
		if (!isset($_GET["type"]))
			$type = 'pool';
		else $type = $_GET["type"];
		if ($type == 'pool') $type = "";
			else $type = $type.'_';
		
		$model = D($type."student");
		$condition["tid"] = session("userid");
		$arr = $model->where($condition)->select();

		$i = 0;
		while(isset($arr[$i])){
			if (isset($arr[$i]["temp_reg_time"]))
				$arr[$i]["reg_time"] = $arr[$i]["temp_reg_time"];
			if (isset($arr[$i]["password"]))
				unset($arr[$i]["password"]);
			unset($arr[$i]["profile"]);
			unset($arr[$i]["uid"]);
			unset($arr[$i]["tid"]);
			unset($arr[$i]["tel"]);
			if (isset($arr[$i]["status"]))
				$arr[$i]["status"] = $this->_getStatus($arr[$i]["status"]);
			else $arr[$i]["status"] = "";

			$i += 1;
		}

		$json = json_encode($arr);

		$this->assign("getJson", $json);
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function delete_temp_student() : teacher can directly delete the temp profile of his/her own student, as the temp profile is created by this teacher.
	 * 
	 * @access public
	 * 
	 * @param string the temp_student id
	 */
	public function delete_temp_student(){
		function _del($sid, $dbname){
			$model = D($dbname);
			$cond["sid"] = $sid;
			$model->where($cond)->delete();
		}
		try{
			$this->assign("jumpUrl", "__URL__/manage_page/type/temp");
			
			$sid = $_GET["sid"];
			_del($sid, "temp_ibmprize");
			_del($sid, "temp_itskill");
			_del($sid, "temp_scores");
			_del($sid, "temp_student");
			
		}
		catch(Exception $e){
			$this->error("删除请求发送不成功！数据库可能出了问题，请联系企业管理员进行删除！");
		}
		$this->success("删除请求已发送！请耐心等待企业管理员进行审批确认以正式删除！");
	}
	/**
	 * Function delete_student() : teacher propose a request to enterprise manager about deleting a student in pool.
	 * 
	 * @access public
	 * @param string the student id
	 * @todo This is uncompleted.
	 */
	public function delete_student(){
	/*	function _mov($sid, $dbname){
			$model1 = D($dbname);
			$model2 = D("temp_".$dbname);
			$cond["sid"] = $sid;
			$data = $model1->where($cond)->select();
			foreach($data as $i){
				$model2->add();
			}
		}*/
		try{
			$this->assign("jumpUrl", "__URL__/manage_page");
			$model = D("student");
			$condition["sid"] = $_GET["sid"];
			$data = $model->where($condition)->find();

			if (!$data)
				throw new Exception();

			$model = D("temp_student");
			$data["status"] = 3;
			unset($data["password"]);
			unset($data["reg_time"]);
			$data["temp_reg_time"] = date("Y-m-d H:i:s");
			$result = $model->add($data);
			
		}
		catch(Exception $e){
			$this->error("删除请求发送不成功！数据库可能出了问题，请联系企业管理员进行删除！");
		}

		$this->success("删除请求已发送！请耐心等待企业管理员进行审批确认以正式删除！");
	}
	/**
	 * Function modify_student() : teacher propose a request to enterprise manager about modifying a student in pool.
	 * This is the page of modify_student.html
	 * @access public
	 * @param string the student id
	 * 
	 */
	public function modify_student(){
		try{
			if (!isset($_GET["sid"]))
				throw new Exception();

			$condition["sid"] = $_GET["sid"];
			$model = D("student");
			$arr = $model->where($condition)->find();

			if (!$arr)
				throw new Exception();

			unset($arr["password"]);
			unset($arr["tid"]);
			unset($arr["uid"]);
			unset($arr["std_no"]);

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
		}
		catch(Exception $e){
			$this->redirect("__URL__/student_profile");
		}
		$this->display();
	}
	/**
	 * Function modify_student() : teacher propose a request to enterprise manager about modifying a student in pool.
	 * This is the action of modify_student.html
	 * @access public
	 *
	 * 
	 */
	public function _modify_student(){

		//submit basic student info
		date_default_timezone_set ("Asia/Shanghai");  
		$condition["sid"] = $_POST["sid"];
		$condition["sname"] = $_POST["sname"];
		$condition["birthday"] = $_POST["birthday"];
		$condition["sex"] = $_POST["sex"];
		$condition["tel"] = $_POST["tel"];
		$condition["email"] = $_POST["email"];
		$condition["major"] = $_POST["major"];
		$condition["profile"] = $_POST["profile"];
		$condition["temp_reg_time"] = date("Y-m-d H:i:s");
		$condition["graduation_year"] = $_POST["graduate_year"];
		$condition["degree"] = $_POST["degree"];
		$condition["status"] = 2;

		$this->_submit_basic($condition, false);

		$sid = $condition["sid"];
		unset($condition);

		//submit scores
		$condition["sid"] = $sid;
		$condition["gpa"] = $_POST["scores_gpa"];
		$condition["rank"] = $_POST["scores_rank"];
		$condition["cet4"] = $_POST["scores_cet4"];
		$condition["cet6"] = $_POST["scores_cet6"];
		$condition["fellowship"] = $_POST["scores_fellowship"];
		$this->_submit_scores($condition);

		//submit itskill
		unset($condition);
		$itskill = $_POST["itSkill"];
		$this->_submit_itskill($sid, $itskill);

		//submit IBM prize
		unset($condition);
		$ibm = $_POST["ibm"];
		$this->_submit_ibm($sid, $ibm);

		//SUCCESS jump
		$this->assign("jumpUrl", "__URL__/manage_page");
		$this->success("您的学生入库请求已提交，请耐心等候企业审批。");
	}
	
	/**
	 * Function recommandStudent() : teacher can recommand a student to enter the talent_pool.
	 * This is the page of recommandStudent.html
	 * @access public
	 * 
	 * 
	 */
	public function recommandStudent(){
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function recommandNow() : the action of recommanding a student.
	 * 
	 * @access public
	 * 
	 * 
	 */
	public function recommandNow(){
		//submit basic student info
		date_default_timezone_set ("Asia/Shanghai");  
		$condition["sname"] = $_POST["sname"];
		$condition["birthday"] = $_POST["birthday"];
		$condition["sex"] = $_POST["sex"];
		$condition["tel"] = $_POST["tel"];
		$condition["email"] = $_POST["email"];
		$condition["uid"] = $this->_getUid();
		$condition["major"] = $_POST["major"];
		$condition["profile"] = $_POST["profile"];
		$condition["temp_reg_time"] = date("Y-m-d H:i:s");
		$condition["tid"] = session("userid");
		$condition["graduation_year"] = $_POST["graduate_year"];
		$condition["degree"] = $_POST["degree"];
		$condition["std_no"] = $_POST["std_no"];
		$condition["sid"] = $condition["uid"].'_'.$condition["std_no"];
		$condition["status"] = 1;
		$flag = $this->_submit_basic($condition);

		//clear $condition && get the sid
		if (!$flag){
			throw_exception('学生基本信息模块新增数据失败，数据重复');
		}
		$sid = $condition["sid"];
		unset($condition);

		//submit scores
		$condition["sid"] = $sid;
		$condition["gpa"] = $_POST["scores_gpa"];
		$condition["rank"] = $_POST["scores_rank"];
		$condition["cet4"] = $_POST["scores_cet4"];
		$condition["cet6"] = $_POST["scores_cet6"];
		$condition["fellowship"] = $_POST["scores_fellowship"];
		$this->_submit_scores($condition);

		//submit itskill
		unset($condition);
		$itskill = $_POST["itSkill"];
		$this->_submit_itskill($sid, $itskill);

		//submit IBM prize
		unset($condition);
		$ibm = $_POST["ibm"];
		$this->_submit_ibm($sid, $ibm);

		//SUCCESS jump
		$this->assign("jumpUrl", "__URL__/manage_page");
		$this->success("您的学生入库请求已提交，请耐心等候企业审批。");
	}

	//=============PRIVATE function=================

	private function _getUid(){
		$model = D("teacher");
		$cond["tid"] = session("userid");
		$row = $model->where($cond)->find();
		return $row["uid"];
	}


	private function _submit_basic($condition, $create=true){
		//Find if this student has already been in the talent pool.
		//Return false if existed.
		$sid["sid"] = $condition["sid"];
		$model = D("student");
		$row = $model->where($sid)->find();
		if ($row != false && $create) 
			return false;

		//Find if this student has already been in the temp talent pool.
		//Delete the old record to update it if existed.
		$model = D("temp_student");
		$row = $model->where($sid)->find();
		if ($row != false && $create)
			$model->where($sid)->delete();
		//Insert the new record to temp pool.
		$model->add($condition);

		return true;
	}

	private function _submit_scores($condition){
		$model = D("temp_scores");
		$result = $model->where($condition)->find();
		if ($result != false)
			throw_exception('学生成绩模块新增数据失败，数据重复');
		$model->add($condition);
	}

	private function _submit_itskill($sid, $itskill){
		$model = D("temp_itskill");
		$condition["sid"] = $sid;
		foreach($itskill as $skill){
			$condition["skillname"] = $skill;
			$result = $model->where($condition)->find();
			if ($result != false)
				throw_exception('学生IT技能模块新增数据失败，数据重复。');
			else
				$model->add($condition);
		}	
	}

	private function _submit_ibm($sid, $ibm){
		$model = D("temp_ibmprize");
		$condition["sid"] = $sid;
		foreach($ibm as $prize){
			$condition["prizename"] = $prize;
			$result = $model->where($condition)->find();
			if ($result != false)
				throw_exception('学生IBM奖项模块新增数据失败，数据重复。');
			else
				$model->add($condition);
		}	
	}
}
?>
