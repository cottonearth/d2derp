/*------------------------------------------------------------------------*/
function saverole(){
	var rolename=$('#rolename').val();
	if(!rolename || rolename=='' || rolename.length<=1){
		notifyDanger('Please specify rolename')	;
	}
	else{

		var POSTDATA="action=saverole&rolename="+encodeURIComponent(rolename);
		callservicebyajax(POSTDATA,"d2dservice/config/roleserver.php",function(){savedataresponse(refreshRoleGrid)});
	}
}


function saveuserform()
{
	userDetails = $("#update-userform").serialize();
	var POSTDATA="action=saveuser&userdetails="+encodeURIComponent(userDetails);
	callservicebyajax(POSTDATA,"d2dservice/config/userserver.php",function(){savedataresponse()});
}


function getseasonbyid(postvalue){
	getcontents('pages/configs/season/updateseason.php','content',postvalue);
}

function updateSeason(){
	seasondetails = $("#updateseason").serialize();
	var POSTDATA="action=updateseason&seasondetails="+encodeURIComponent(seasondetails);
	callservicebyajax(POSTDATA,"d2dservice/config/seasonserver.php",function(){savedataresponse(refreshSeasonGrid)});
}
function refreshSeasonGrid(){	
getcontents('pages/configs/season/allseasons.php','content');
}
function refreshRoleGrid(){	
getcontents('pages/configs/roles/role.php','content');
}