  <link href="<?php echo base_url('assets/cp/vendors/bower_components/dropify/dist/css/dropify.min.css')?>" rel="stylesheet" type="text/css"/>

<div class="wrapper theme-1-active pimary-color-red">
	<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Institutions</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li class="active"><span>Institutions</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
                                        	<?php 
	if(validation_errors()){
?>
<div class="alert alert-danger alert-dismissable">
  <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
  <b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
</div>

<?php  } ?>
				 <div class="col-sm-12 col-xs-12">
					 <div class="form-wrap">
                    <?php echo form_open_multipart('admin/institutions/add/'); ?>
						 <div class="form-horizontal input_fields_wrap">
							 <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">University</label>
								    <div class="col-sm-4">
									 <input class="form-control" name="university_name" type="text" placeholder="Enter University" required >
							        </div>
							 </div>

                             <div class="form-group">
                                 <label for="exampleInputuname_4" class="col-sm-2 control-label">University address</label>
                                 <div class="col-sm-4">
                                     <input class="form-control" name="university_address" type="text" placeholder="Enter university address" required >
                                 </div>
                             </div>


                             <div class="form-group">
								 <label for="exampleInputuname_4" class="col-sm-2 control-label">File</label>
								    <div class="col-sm-4">
									 <select name="university_type" class="form-control">
										<option value="0">--Choose institution type --</option>
										  <?php if(isset($services)):?>
                            					<?php $i=1;foreach ($services as $new){?>
											<option value="<?php echo $new->services_id; ?>"><?php echo $new->services_name; ?></option>
											
											    <?php $i++;}?>
                                          <?php endif;?>
										
									</select>
							        </div>
							       
							 </div>
							 </div>
							
							 <div class="form-group mb-0">
								 <div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn btn-info ">Save</button>
								 </div>
							 </div>
							  
				 <?php form_close()?>
				
		 </div>
	 </div>
	 </div>
</div>
							
 </div>
	 </div>
						
	 </div>	
					
					
 </div>
				
 </div>
				
			
</div>

<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="form-group"><label for="exampleInputuname_4" class="col-sm-2 control-label">Title</label><div class="col-sm-4"><input class="form-control" name="attachs_title[]" type="text" placeholder="Enter Title" ></div></div><div class="form-group"><label for="exampleInputuname_4" class="col-sm-2 control-label">File</label><div class="col-sm-4"><input class="form-control" name="attachs_file[]"  type="file"></div><a href="#" class="remove_field btn btn-danger">Remove</a></div></div>'); 
			$('.chzn').chosen({search_contains:true});
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});



</script>
