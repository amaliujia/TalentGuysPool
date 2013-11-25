<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @description The action of user student, just extends CommonUserAction.
 */
class StudentAction extends CommonUserAction{
	/**
	 * Function sendEmail() : the controller of template sendEmail.html.
	 * 
	 * @access public
	 * @param string the receiver's usertype
	 */
	public function sendEmail(){
		if (!isset($_GET["objtype"]))
			$objtype = "teacher";
		else
			$objtype = $_GET["objtype"];
		$json = $this->getRecList($objtype, false);
		$this->assign("getJson", $json);
		$this->assign("objtype", $objtype);
		$this->assign("username", session("username"));
		$this->display();
	}
}
?>