<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @description The action of user company.
 * @todo The filter function of choosing talents is uncompleted; The auto-email module that can send message and email the chosen students automatically.
 */
class CompanyAction extends CommonUserAction{
	/**
	 * Function company() : the index page of company user.
	 * 
	 * @access public
	 * 
	 */
	public function company(){
		$this->init("company");
		$this->basic_mailbox();
		$this->assign("username", session("username"));
		$this->display();
	}
	/**
	 * Function talent_search() : search talents for the company by some special filters.
	 * 
	 * @access public
	 * @param array the certain conditions of the filter
	 */
	public function talent_search(){
		$filter = array();

		if (isset($_GET["filter"])){
			$filter = json_decode(base64_decode($_GET["filter"]));
		}
		else{
			$filter = "";
		}
		#var_dump($filter);
		$arr = $this->_filter($filter);
		
		$arr = $this->_unset($arr);

		$json = json_encode($arr);
		$this->assign("getJson", $json);
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
	 * Function _unset(): clear some unuseful and unsafe information after reading data from Database.
	 * 
	 * @access private
	 * @return array the data after filtering unsafe information
	 */
	private function _unset($arr){
		$i = 0;
		while(isset($arr[$i])){
			$arr[$i]["university"] = $this->_getUname($arr[$i]["uid"]);
			unset($arr[$i]["password"]);
			unset($arr[$i]["profile"]);
			unset($arr[$i]["uid"]);
			unset($arr[$i]["tid"]);
			unset($arr[$i]["tel"]);
			unset($arr[$i]["email"]);

			$i += 1;
		}
		return $arr;
	}
	/**
	 * Function _filter(): read students from Database and filter them.
	 * 
	 * @access private
	 * @return array the list of students who suit the conditions
	 */
	private function _filter($filter){
		if ($filter == ""){
			$model = D("student");
			$result = $model->limit("0,30")->select();
			return $result;
		}

		$arr = array();
		
		function getScores($filter_scores){
			$condition["gpa"] = array("egt", $filter_scores[0]->value);
			$condition["rank"] = array("elt", $filter_scores[1]->value);
			$condition["cet4"] = array("egt", $filter_scores[2]->value);
			$condition["cet6"] = array("egt", $filter_scores[3]->value);

			$model = D("scores");
			$row = $model->where($condition)->field("sid")->select();
			#$row = $model->field("sid")->select();
			#print_r($row);
			$result = array();
			foreach ($row as $x){
				array_merge($result, $x);
			}
			#var_dump($result);
			return $result;
			
		}
	
		function getITSkill($filter_itskill){
			$model = D("itskill");
			$arr = array();
			
			foreach($filter_itskill as $val){
				$v = $val->value;
				$condition["skillname"] = $v;
				$a = $model->where($condition)->field("sid")->select();
				
				if (count($arr) == 0)
					$arr = $a;
				else
					$arr = array_intersect($arr, $a);
				
			}
			
			return $arr;
		}
		
		function getIBM($filter_ibm){
			$model = D("ibmprize");
			$arr = array();
			foreach($filter_ibm as $val){
				$v = $val->value;
				$cond["prizename"] = $v;
				$a = $model->where($cond)->field("sid")->select();
				if (count($arr) == 0)
					$arr = $a;
				else
					$arr = array_intersect($arr, $a);
			}
			#var_dump($arr);
			return $arr;
		}
	
		//scores module
		$arr = getScores($filter->scores);
		
		//itskill module
		if (count($filter->itSkill) > 0){
			$a =  getITSkill($filter->itSkill);
		
			if (count($arr) == 0){
				$arr = $a;
			}else{
				$arr = array_intersect($a, $arr);
				
			}
			
		}
		
		//ibm module
		#var_dump($filter);
		if (count($filter->ibm) > 0){
			$a = getIBM($filter->ibm);
			if (count($arr) == 0)
				$arr = $a;
			else
				$arr = array_intersect($arr, $a);
		}

		//project module
		#pass
		//competetion module
		#pass
		
		//return students
		
		$result = array();
		$model = D("student");
		foreach ($arr as $a){
			$condition["sid"] = $a["sid"];
			$row = $model->where($condition)->find();
			array_push($result, $row);
		}
		#print_r($result);
		return $result;
	}
}

?>
