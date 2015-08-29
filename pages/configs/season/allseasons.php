<?php 
if(!isset($_SESSION)){session_start();}
include_once($_SERVER['DOCUMENT_ROOT']."/d2dconfig.php");
include_once(CLASSFOLDER."/season.php");
$season=new seasonclass();
$rows=20;
?>

</script>
<div class="actionWizard"><a title="Create Season" class="btn btn-primary pull-right btn-xs " href="javascript:void(0)" onclick="getcontents('pages/configs/season/updateseason.php','content');"><i class="glyphicon  glyphicon-plus-sign"></i>Add New Season</a>
</div>
<div id="gridcontent" class ="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Seasons</h3>
				</div>
				<div class="box-body">
					<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div>
					<?php
					$page=0;
					$seasonlist= $season->showAllSeason();
					if($seasonlist!=array()){ ?>


					<table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
						<thead><tr >
							<th> Id</th>
							<th >Season Name</th>	
							<th></th>	
						</tr></thead>
						<?php
						foreach ($seasonlist as $rowdata) {?>
						<tr ><td ><?php echo $rowdata['id']; ?> </td>
							<td><?php echo $rowdata['name']; ?></td>		 
							<td><?php echo $rowdata['description']; ?></td>
							<th><a href="javascript:void(0);" onclick ="getseasonbyid(<?php echo $rowdata['id']; ?>)"><i class="glyphicon  glyphicon-pencil"></i></a></th>
						</tr>
						<?php }
						?>
					</table>
					<?php }
					else
						{ ?>
					<div class="alert alert-warning"><strong>Message!</strong><br> No Records Found.</div>
					<?php } ?>		

					
