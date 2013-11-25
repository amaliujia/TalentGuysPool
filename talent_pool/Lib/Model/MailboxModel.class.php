<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * 
 */
class MailboxModel{
	/**
	 * Function getStatRcvMsg(): count the amount of unread message
	 * @param	sender's usertype
	 * @return int the amount of unread message sended by a certain usertype of users.
	 */
	public function getStatRcvMsg($objtype = "all"){
		$model = D("message");
		$condition["receiver_id"] = session("userid");
		$condition["unread"] = 1;
		if ($objtype != "all")
			$condition["sender_type"] = $objtype;

		$cnt = $model->where($condition)->count();		
		return $cnt;
	}
	/**
	 * Function getPageMsg() : get the message to show on the page.
	 *  
	 * @access public
	 * @param string define the msg_sender's usertype 
	 * @param int the page of message now
	 * @param int the amount of message on per page.
	 * @return array message list
	 */

	public function getPageMsg($objtype, $page, $num_perpage){
		$model = D("message");
		$condition["receiver_id"] = session("userid");
		if ($objtype != "all")
			$condition["sender_type"] = $objtype;
		$arr = $model->where($condition)->order("sendtime DESC")->limit(($num_perpage * ($page-1)).','.$num_perpage)->select();

		$i = 0;
		while (isset($arr[$i])){
			$model = D($arr[$i]["sender_type"]);
			$cond[$arr[$i]["sender_type"][0]."id"] = $arr[$i]["sender_id"];
			$row = $model->where($cond)->find();
			$arr[$i]["sender_name"] = $row[$arr[$i]["sender_type"][0]."name"];
			$i += 1;
		}

		return $arr;
	}

	/**
	 * Function getTotalPage() : get the amount of pages.
	 *  
	 * @access public
	 * @param string define the msg_sender's usertype 
	 * @param int the amount of message on per page.
	 * @return int total amount of the pages
	 */
	public function getTotalPage($objtype, $num_perpage){
		$condition["receiver_id"] = session("userid");
		if ($objtype != "all")
			$condition["sender_type"] = $objtype;
		$model = D("message");
		$cnt = $model->where($condition)->count();
		$x = (int)($cnt % $num_perpage);
		if ($x > 0) $x = 1;

		return (int)($cnt / $num_perpage) + $x;
	}

	/**
	 * Function showMsg() : get the detail of a piece of message.
	 *  
	 * @access public
	 * @param string message id
	 * @return array details of the certain message
	 */
	public function showMsg($msg_id){
		$condition["msg_id"] = $msg_id;
		$model = D("message");
		$arr = $model->where($condition)->find();
		$arr["unread"] = 0;
		$model->where($condition)->save($arr);
		return $arr;
	}

	/**
	 * Function sendMsg() : the action of sending a message.
	 *  
	 * @access public
	 * @param array message data
	 * 
	 */
	public function sendMsg($data){
		$model = D("message");
		$model->add($data);
	}

	/**
	 * Function sendMsgN() : send a piece of message to multi-people.
	 *  
	 * @param array the list of receivers' id
	 * @param string message title
	 * @param string message content
	 */
	public function sendMsgN($rcv_id_list, $title, $content){
		foreach ($rcv_id as $rcv_id_list){
			sendMsg($rcv_id, $title, $content);
		}
	}
	/**
	 * Function getStudents() : search specific student name by a keyword
	 *  
	 * @param string keyword to filter the users
	 * @return array the list of search result
	 * 
	 */
	public function getStudents($key){
		$model = D("student");
		$condition["sname"] = array('like', "%$key%");
		if (session("usertype") == "teacher")
			$condition["tid"] = session("userid");
		$arr = $model->where($condition)->select();
		//eliminate some msg in case of leaking
		$i = 0;
		while (isset($arr[$i])){
			$a = array();
			$a["name"] = $arr[$i]["sname"];
			$a["id"] = $arr[$i]["sid"];
			unset($arr[$i]);
			$arr[$i] = $a;

			$i += 1;
		}
		//return
		return $arr;
	}
	/**
	 * Function getTeachers() : search specific teacher name by a keyword
	 *  
	 * @param string keyword to filter the users
	 * @return array the list of search result
	 * 
	 */
	public function getTeachers($key){
		$model = D("teacher");
		$condition["tname"] = array('like', "%$key%");
		$arr = $model->where($condition)->select();
		//eliminate some msg in case of leaking
		$i = 0;
		while (isset($arr[$i])){
			$a = array();
			$a["name"] = $arr[$i]["tname"];
			$a["id"] = $arr[$i]["tid"];
			unset($arr[$i]);
			$arr[$i] = $a;

			$i += 1;
		}
		//return
		return $arr;
	}
	/**
	 * Function getEnterprise() : search specific enterprise name by a keyword
	 *  
	 * @param string keyword to filter the users
	 * @return array the list of search result
	 * 
	 */
	public function getEnterprise($key){
		$model = D("enterprise");
		$condition["ename"] = array('like', "%$key%");
		$arr = $model->where($condition)->select();
		//eliminate some msg in case of leaking
		$i = 0;
		while (isset($arr[$i])){
			$a = array();
			$a["name"] = $arr[$i]["ename"];
			$a["id"] = $arr[$i]["eid"];
			unset($arr[$i]);
			$arr[$i] = $a;

			$i += 1;
		}
		//return
		return $arr;
	}
	/**
	 * Function getCompanies() : search specific company name by a keyword
	 *  
	 * @param string keyword to filter the users
	 * @return array the list of search result
	 * 
	 */
	public function getCompanies($key){
		if (session("usertype") != "enterprise")
			throw_exception("无权限查看该信息！请返回！");
		$model = D("company");
		$condition["cname"] = array('like', "%$key%");
		$arr = $model->where($condition)->select();
		//eliminate some msg in case of leaking
		$i = 0;
		while (isset($arr[$i])){
			$a = array();
			$a["name"] = $arr[$i]["cname"];
			$a["id"] = $arr[$i]["cid"];
			unset($arr[$i]);
			$arr[$i] = $a;

			$i += 1;
		}

		//return
		return $arr;
	}
}
?>
