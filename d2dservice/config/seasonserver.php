<?php
include_once($_SERVER['DOCUMENT_ROOT']."/d2dconfig.php");
session_start();
include_once(CLASSFOLDER."/common.php");
include_once(CLASSFOLDER."/season.php");
$season = new seasonclass();

//ob_start("ob_gzhandler");
switch($_POST['action']){
	case "updateseason":
	$response=array();
	if(!empty($_POST['seasondetails'])){
		$params = array();
		parse_str($_POST['seasondetails'], $params);
		$response= $season->updateseason($params);
		if(!empty($response['id']))
			$response['Message']="Season updated successfully";
		return json_encode($response);
	}
	else{
		$response['Exception']="Please specify season details";
		$response['Severity']="high";
		return json_encode($response);
	}
	break;
}