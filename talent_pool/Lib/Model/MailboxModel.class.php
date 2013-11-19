<?php
	class MailboxModel{
		//ͳ��δ�����յ���Ϣ������
		//$objtype	������Ϣ�˵����
		public function getStatRcvMsg($objtype = "all"){
			$model = D("message");
			$condition["receiver_id"] = session("userid");
			$condition["unread"] = 1;
			if ($objtype != "all")
				$condition["sender_type"] = $objtype;
			
			$cnt = $model->where($condition)->count();		
			return $cnt;
		}
		
		//��ʾ������Ϣ
		//$objtype	������Ϣ�˵����, $page Ҫ��ʾ��Ϣ��ҳ��, $num_perpage ÿҳ��Ϣ��Ĭ��20
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
		
		//��ʾ��Ϣ����ҳ��
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
		
		//��ʾĳһ��������Ϣ����
		public function showMsg($msg_id){
			$condition["msg_id"] = $msg_id;
			$model = D("message");
			$arr = $model->where($condition)->find();
			$arr["unread"] = 0;
			$model->where($condition)->save($arr);
			return $arr;
		}
		
		//������Ϣ����
		//@param	������id�� ��Ϣ���⣬ ��Ϣ����
		public function sendMsg($data){
			$model = D("message");
			$model->add($data);
		}
		
		//�������Ͳ���
		//@param	������id�����飬 ��Ϣ���⣬ ��Ϣ����
		public function sendMsgN($rcv_id_list, $title, $content){
			foreach ($rcv_id as $rcv_id_list){
				sendMsg($rcv_id, $title, $content);
			}
		}

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
		
		public function getCompanies($key){
			if (session("usertype") != "enterprise")
				throw_exception("��Ȩ�޲鿴����Ϣ���뷵�أ�");
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