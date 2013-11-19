<?php
function getUsertype($id){
	function sliceId($userid){
		$arr = array(2);
		
		$pos = strpos($userid, '_');
		if (!$pos)
			return false;							//不存在 '_'的肯定是错账号
			
		$sub = substr($userid, 0, $pos);			//把账号分拆放入数组
		$arr[0] = $sub;
					
		$sub = substr($userid, $pos+1);
		$arr[1] = $sub;
		
		return $arr;
	}
	
	$arr = sliceId($id);
	if (!$arr)
		return false;
		
	$modelName = "";
	if ($arr[0] == "ENT"){
		$modelName = "enterprise";	
	}
	elseif ($arr[0] == "COM"){
		$modelName = "company";	
	}
	elseif (is_numeric($arr[1])){
		$modelName = "student";	
	}
	else {
		$modelName = "teacher";	
	}
	
	return $modelName;
}

function typenum($usertype){
	$mp = array(
		"enterprise"=>1,
		"company"=>2,
		"student"=>3,
		"teacher"=>4
	);
	if (isset($mp[$usertype]))
		return $mp[$usertype];
	else return false;
}
?>