<?php
class TeacherManageModel extends ManageModel{
	
	public function recommandStudent($data){
		$id = $data["uid"].'_'.$data["std_no"];
		$data["sid"] = session("userid");
		$model = D("temp_student");
		$model -> add($data);
	}
	
	public function updateStudent($data){
		$id = $data["uid"].'_'.$data["std_no"];
		$this->modify("teacher", "student", $id, $data);
	}
	
	public function deleteStudent($sid, $reason){
		$this->delete("teacher", "student", $sid, $reason);
	}
	
	public function readStudent($sid){
		return $this->getUserInfo("student" ,$sid);
	}
}
?>