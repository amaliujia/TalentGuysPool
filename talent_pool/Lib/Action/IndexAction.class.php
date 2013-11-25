<?php
/**
 * @version 1.0
 * @copyright SYSU_WxW
 * @author SYSU_WxW
 * @description Index page & Login part
 */
class IndexAction extends Action {

	/**
	 * Function index() : the controller of template index.html.
	 * Show the index login page. 
	 *
	 * @access public
	 * 
	 */
    public function index(){
		$this->_clearSession();
     	$this->display();
    }
	/**
	 * Function _clearSession() : clear the session while entering the index page.
	 *
	 * @access private
	 * 
	 */
	private function _clearSession(){
		session(null);
	}
	
	/*/DEBUG
	//test session
	public function session(){
		// 由于直接在操作里输出，为避免乱码
		header("Content-Type:text/html; charset=utf-8");
		session("username", "喵咪");
		if(session('?username')){
			echo session('username').' 你好';
		}else{
			echo 'session 未注册';
		}
	}
	//END DEBUG*/
	/**
	 * Function gotoUserpage() : jump to corresponding user page by juding the usretype
	 *
	 * @access private
	 * @param string usertype of the user
	 */
	private function gotoUserpage($usertype){
		$modul = $usertype;
		$modul[0] = strToUpper($modul[0]);
		$jumpUrl = "/$modul/$usertype";
		$jumpUrl = U($jumpUrl);
		header("Location: ".$jumpUrl);
	}
	
	/**
	 * Function linkDB() : link Databse to login and get the user information
	 *
	 * @access private
	 * @param string usertype of the user
	 * @param string login id input by user
	 * @param string login password by user
	 * @return array the user information, if login error then return false
	 */
	private function linkDB($usertype, $userid, $passwd){
		$letter = $usertype[0];
		$model = D($usertype);
		
		$condition[$letter."id"] = $userid;
		$condition["password"] = $passwd;
		
		$row = $model->where($condition)->select();

		return $row;
	}
	
	/**
	 * Function login() : login handle function
	 * determine the usertype
	 *
	 * @access public
	 * @param string login id by user
	 * @param string login password input by user
	 */
	public function login(){
		if (!isset($_POST["username"]))
			$this->redirect("_ROOT_");
		$userid = $_POST["username"];
		$passwd = md5($_POST["password"]);
		
		try{
			$usertype = getUsertype($userid);
			if (!$usertype)
				throw new Exception("对不起，您的用户名不存在!");
				
			$result = $this->linkDB($usertype, $userid, $passwd);
			if (!$result)
				throw new Exception("对不起，您的用户名不存在或密码错误!");
				
			session("userid", $userid);
			session("usertype", $usertype);
			$this->gotoUserpage($usertype);
		}catch (Exception $err){
			//ajax 显示登陆不成功的错误提示	
			$this->assign("jumpUrl", "__ROOT__");
			$this->error($err->getMessage(), false);
		}	
	}
	
	
}