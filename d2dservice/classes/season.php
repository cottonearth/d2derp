	<?php
	include_once(CLASSFOLDER."/dbconnection.php");
	$dbconnect=null;
	class seasonclass extends dbconnection {
	function seasonclass() // Constructor 
	{
		parent::__construct();
	}
	/* -----------------------------------------------------------------------------*/
	function updateseason($seasondetails)
	{

		$response=array();	
		try{
			if($seasondetails['id']!=0)	
				$seasonId=$this->internalDB->queryFirstField("SELECT id FROM seasons where name ='".$seasondetails['name']."' and id !=".$seasondetails['id']);	

			else
				$seasonId=$this->internalDB->queryFirstField("SELECT id FROM seasons where name ='".$seasondetails['name']."'");	

			if($seasonId==null){
				$this->internalDB->insert('seasons',array(
					'name'=>$seasondetails['name'],
					'description'=>$seasondetails['description']));
				$response['id']=$this->internalDB->insertId();
				
			}
			else{
				$response['Exception']='Specified season name already exists';				
			}
		}
		catch(Exception $ex){
			$response['Exception']=$ex->getMessage();
			$response['Severity']="high";
			
		}
		return $response;
	}
	/*---------------------------------------------------------------*/
	function showAllSeason(){	
		$sql="SELECT * FROM seasons ";
		$seasonlist = $this->internalDB->query("$sql");
		return $seasonlist;
	}
	/*---------------------------------------------------------------*/
	function getSeasonById($seasonId){	
		$sql="SELECT * FROM seasons  where id=$seasonId";
		$entity = $this->internalDB->queryFirstRow($sql);
		return $entity;
	}
}
