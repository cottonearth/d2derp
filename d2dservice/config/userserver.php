<?php
include_once($_SERVER['DOCUMENT_ROOT']."/d2dconfig.php");
session_start();
include_once(CLASSFOLDER."/common.php");
include_once(CLASSFOLDER."/user.php");
$user = new userclass();

//ob_start("ob_gzhandler");
switch($_POST['action']){
	/*--------------------------------------------------------------*/
	case "saveuser":
	if(!empty($_POST['userdetails'])){
		$params = array();
		parse_str($_POST['userdetails'], $params);
		$response= $user->saveuser($params);
		if(empty($response['Exception'])
			$response['Message']="User details saved Succesfully"
			return json_encode($response);
	}
	else{
		$response['Exception']="Please specify valid user details");
			$response['Severity']="high";
		return json_encode($response);
	}
	break;
}