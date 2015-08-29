  <?php 
  if(!isset($_SESSION)){session_start();}
  if(isset($_POST['postvalue']))
  	$seasonid=$_POST['postvalue'];
  if(!empty($seasonid)){
    include_once($_SERVER['DOCUMENT_ROOT']."/d2dconfig.php");  

    include_once(CLASSFOLDER."/season.php");
    $season=new seasonclass();
    if(!empty($seasonid)){
      $seasondata=$season->getSeasonById($seasonid);      
    }
  }
  else{
   $seasonid=0;
   $seasondata=array(
    'name'=>"",
    'id'=>"0",
    'description'=>""
    );
 }

 ?>
      <form  id="updateseason" name="updateseason" action="" method="post" novalidate="novalidate">  
       <input type="hidden" id="id" name="id" value="<?php  echo (!empty($seasonid))?$seasonid:0; ?>" />
       <div class="box box-primary">
       <div class='box-header'><h3 class='box-title'>Update Season</h3></div>
        <div class="box-body"> 
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group margin">
                <label><span class="text-error">*</span> Seaon Name</label>
                <input type="text"  id="name" name="name" value="<?php echo $seasondata['name']; ?>" maxlength="75" placeholder="Season Name" class="form-control" >
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group margin">
                <label><span class="text-error">*</span> Description</label>
                <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter ..."><?php echo $seasondata['description']; ?></textarea>
              </div>
            </div>
          </div>
        </div>
         <div class="savewizard">
        <div class="row">
          <div class="col-sm-12 " >           
            <button class="btn btn-primary pull-right"  type="submit">Save</button>           
            <a href="javascript:void(0);" onclick="getcontents('pages/configs/season/allseasons.php','content')" class="btn btn-primary pull-right">Close</a>  
          </div>
        </div>
      </div>
      </div>
    </form>
    
<script type="text/javascript">
    (function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
      setupFormValidation: function()
        {
        //form validation rules
            $("#updateseason").validate({
                rules: {
                    name: {
                      required:true,
                      minlength:3
                    },
                    description:"required"  
                },
                messages: {
                    name: {
                      required:"Please enter season name",
                      minlength: "Season name must be at least 3 characters long"
                  },
                    description:"Please provide description"
                },
                submitHandler: function(form) {
                    updateSeason();
                }
            });


        }
    }
 
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);
</script>