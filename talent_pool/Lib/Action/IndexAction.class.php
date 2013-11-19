<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

	//show index page
    public function index(){
		$this->clearSession();
     	$this->display();
    }
	
	private function clearSession(){
		session(null);
	}
	
	//DEBUG
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
	//END DEBUG
	
	private function gotoUserpage($usertype){
		$modul = $usertype;
		$modul[0] = strToUpper($modul[0]);
		$jumpUrl = "/$modul/$usertype";
		$jumpUrl = U($jumpUrl);
		header("Location: ".$jumpUrl);
	}
	
	//连接数据库进行用户登录，若不存在用户或密码错误则返回false
	private function linkDB($usertype, $userid, $passwd){
		$letter = $usertype[0];
		$model = D($usertype);
		
		$condition[$letter."id"] = $userid;
		$condition["password"] = $passwd;
		
		$row = $model->where($condition)->select();

		return $row;
	}
	
	//login handle function
	public function login(){
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