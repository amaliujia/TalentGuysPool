<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @todo The modification and deletion of other accounts; Process for the deletion request.
 */
class EnterpriseManageModel extends Model{
	/**
	 * Function createUser() : create a new user account
	 * 
	 * @param string usertype
	 * @param array user information
	 * @return boolean create success or not
	 */
	public function createUser($type, $data){
		$model = D($type);
		$data["reg_time"] = date("Y-m-d H:i:s");
		$data["eid"] = session("userid");
		/*
		$reg = $this->generateID($type, $data);
		if (!reg)
			return false;
		$data[$type[0]."id"] = $reg;
		*/
		if ($this->checkID($type, $data))
		{
			$result = $model->add($data);
			return $result;
		}
		else return false;
	}

	/**
	 * Function getUid() : get uid by a given uname.
	 * 
	 * @param string university name
	 * 
	 */
	public function getUid($uname){
		$mod = D("university");
		$cond["uname"] = $uname;
		$row = $mod->where($cond)->find();
		return $row["uid"];
	}
	/**
	 * Function deleteUser() : delete a user from Database
	 * 
	 * @param string usertype
	 * @param string user id
	 * @return boolean delete success or not
	 */
	public function deleteUser($type, $id){
		$model = D($type);
		$condition[$type[0]."id"] = $id;
		$result = $model->where($condition)->delete();
		return $result;
	}
	/**
	 * Function modifyUser() : modify a user's information
	 * 
	 * @param string usertype
	 * @param array user data
	 * @return boolean modify success or not
	 */
	public function modifyUser($type, $data){
			$id_name = $type[0]."id";
			$model = D($type);
			$condition[$id_name] = $data[$id_name];
			$model->where($condition)->save($data);
			return true;
	}
	
	/**
	 * Function isUserExisted() : check if the given user is already existed
	 * @access private
	 * @param string usertype
	 * @param string user id
	 * @return boolean true if exist
	 */
	private function isUserExisted($type, $id){
		$model = D($type);
		$condition[$type[0]."id"] = $id;
		$result = $model->where($condition)->find();
		if (!$result) return false;
			else return true;
	}
	/**
	 * Function generateID() : auto generate the new userid
	 * @access protected
	 * @param string usertype
	 * @param array user data
	 * @return boolean true if exist
	 */
	protected function generateID($type, $data){
		if ($type == "student"){
			$id =  $data["uid"].'_'.$data["std_no"];
		}
		elseif ($type == "company"){
			$id = "COM_".$data["cid"];
		}
		elseif ($type == "teacher"){
			$id = $data["uid"].'_'.$data["pinyin_tname"];
			$cnt = 0;
			$tid = $id;
			while ($this->isUserExisted($type, $tid)){
				$tid = $id.$cnt;
				$cnt += 1;
			}
			$id = $tid;
		}elseif ($type == "university"){
			$id = $data["uid"];
			$cnt = 0;
			$uid = $id;
			while ($this->isUserExisted($type, $uid)){
				$uid = $id.$cnt;
				$cnt += 1;
			}
			$id = $uid;
		}
		
		if ($this->isUserExisted($type, $id)) return false;
			return strToLower($id);
	}
	/**
	 * Function checkID() : check if the given user is already existed
	 * 
	 * @param string usertype
	 * @param array user data
	 * @return boolean true if exist
	 */
	protected function checkID($type, $data){
		if ($type == "student"){
			$id =  $data["sid"];
		}
		elseif ($type == "company"){
			$id = $data["cid"];
		}
		elseif ($type == "teacher"){
			$id = $data["tid"];
			$cnt = 0;
			$tid = $id;
			while ($this->isUserExisted($type, $tid)){
				$tid = $id.$cnt;
				$cnt += 1;
			}
			$id = $tid;
		}elseif ($type == "university"){
			$id = $data["uid"];
			$cnt = 0;
			$uid = $id;
			while ($this->isUserExisted($type, $uid)){
				$uid = $id.$cnt;
				$cnt += 1;
			}
			$id = $uid;
		}
		
		if ($this->isUserExisted($type, $id)) return false;
			return $id;
	}
	
	/**
	 * Function readUser() : read user's information from Database
	 * 
	 * @param string usertype
	 * @param string user id
	 * @return array user information
	 */
	public function readUser($type, $id){
		$model = D($type);
		$condition[$type[0]."id"] = $id;
		$arr = $model->where($condition)->find();
		if (isset($arr["password"]))
				unset($arr["password"]);
		
		if (isset($arr["uid"])){
			$model = D("university");
			$cond["uid"] = $arr["uid"];
			$row = $model->where($cond)->find();
			$arr["university"] = $row["uname"];
		}
		return $arr;
	}
	/**
	 * Function readAllTemp() : read all the student data in the temporary pool.
	 * 
	 * @return array all the temp_student information
	 * 
	 */
	public function readAllTemp(){
		$model = D("temp_student");
		$result = $model->where($cond)->order("status DESC")->select();
		return $result;
	}
	/**
	 * Function readTemp() : read a student data in the temporary pool by a given id.
	 * 
	 * @return array the corresponding temp_student information
	 * @param string temp_student id
	 */
	public function readTemp($id){
		$model = D("temp_student");
		$cond["sid"] = $id;
		$result = $model->where($cond)->find();
		return $result;
	}
	/**
	 * Function rejectTemp() : reject a request from temporary pool.
	 * 
	 * @param string remp_student id
	 * @param string reject reason
	 */
	public function rejectTemp($id, $reason){
		$model = D("temp_student");
		$cond["sid"] = $id;
		$data = $model->where($cond)->find();
		$data["status"] = -1;
		$data["reason"] = $reason;
		$result = $model->where($cond)->save($data);
		return $result;
	}
	/**
	 * Function passTemp() : accept a request from temporary pool.
	 * 
	 * @param string remp_student id
	 * 
	 */
	public function passTemp($id){
		$model = D("temp_student");
		$cond["sid"] = $id;
		$data = $model->where($cond)->find();
		$data["password"] = $data["sid"];
		$data["reg_time"] = date("Y-m-d H:i:s");
		unset($data["temp_reg_time"]);
		$model->where($cond)->delete();
		
		$model = D("student");
		$result = $model->add($data);
		
		$result &= $this->_move($id);
		return $result;
	}
	
	private function _move($sid){
		$cond["sid"] = $sid;
		
		# move data from temp_itskill to itskill
		$model1 = D("temp_itskill");
		$model2 = D("itskill");
		$data = $model1->where($cond)->$select();
		foreach ($data as $x){
			$model2->add($data[$x]);
			$cond["skillname"] = $data[$x]["skillname"];
			$model1->where($cond)->delete();
		}
		unset($cond["skillname"]);
		
		# move data from temp_ibmprize to ibmprize
		$model1 = D("temp_ibmprize");
		$model2 = D("ibmprize");
		$data = $model1->where($cond)->$select();
		foreach ($data as $x){
			$model2->add($data[$x]);
			$cond["prizename"] = $data[$x]["prizename"];
			$model1->where($cond)->delete();
		}
		unset($cond["prizename"]);
		
		# move data from temp_scores to scores
		$model1 = D("temp_scores");
		$model2 = D("scores");
		$data = $model1->where($cond)->find();
		$model2->add($data);
		$model1->where($cond)->delete();
		
		return true;
	}
}
?>