<?php
include_once($_SERVER['DOCUMENT_ROOT']."/d2dconfig.php");
session_start();
include_once(CLASSFOLDER."/common.php");
include_once(CLASSFOLDER."/role.php");
$role = new roleclass();

//ob_start("ob_gzhandler");
switch($_POST['action']){	
	case "saverole":
	if(!empty($_POST['rolename'])){
		$response= $role->CreateRole($_POST['rolename']);
		if(empty($response['Exception']))
			$response['Message']="Role details saved successfully";
		return json_encode($response);
	}
	else{
		$response['Exception']="Please specify valid role details";
		$response['Severity']="high";
		return json_encode($response);
	}
	break;
}