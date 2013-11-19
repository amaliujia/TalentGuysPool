<?php
	class ManageModel{
		public function getUserList($usertype, $obj){
			$model = D($obj);
		
			if ($usertype == "student")
				return false;
			
			$condition = array();
			
			if ($usertype == "teacher")
				$condition["tid"] = session("userid");
			
			$arr = $model->where($condition)->order("reg_time DSC")->select();	
			
			return $arr;
		}
		
		public function getUserInfo($obj, $id){
			$model = D($obj);
			$condition[$obj[0]."id"] = $id;
			$row = $model->where($condition)->find();
			
			return $row;
		}
	}
?>