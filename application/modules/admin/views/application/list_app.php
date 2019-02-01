<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>


	<!-- Bootstrap Colorpicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Datetimepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Daterangepicker CSS -->
<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet" type="text/css"/>
		
	<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Applications</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Applications</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                            
                            <?php // if(check_admin_role(43)==1){?>	
                             <!--<div class="row" style="margin-bottom:10px;">
                                <div class="col-xs-12">
                                    <div class="btn-group pull-right">
                                        <a class="btn btn-primary" href="<?php echo site_url('admin/Attachments/add/'); ?>"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>    
                            </div>-->	
							<?php // } ?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								
								
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">From date</label>
											<div class='input-group date' id='datetimepicker1'>
												<input type='text' class="form-control" placeholder="Enter From Date" id="from_date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">To date</label>
											<div class='input-group date' id='datetimepicker2'>
												<input type='text' class="form-control" placeholder="Enter To Date" id="to_date" />
												<span class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</span>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Status app.</label>
											<div>
												<select class="selectpicker" data-style="form-control btn-default btn-outline" id="type_agent" name="type_agent">
												    <option value="0">- Select Option -</option>
													<option value="1">Agent by Enter</option>
													<option value="2">Coupon by</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="col-sm-3">
										<div class="form-group">
										
											<button class="btn  btn-primary" style="position:relative; top: 34px" id="btn_search">Search</button>
										</div>
									</div>
								</div>
											
											
												
										<br><br>		
									<div class="table-wrap">
										<div class="table-responsive" id="ajax_table">
											<table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th>App no.</th>
                                                        <th>App date</th>
                                                        <th>Full name</th>
                                                        <th>Program</th>
                                                        <th>Comission</th>
                                                        <th>Comission status</th>
														<th style="width:10%">Release</th>
														<th style="width:10%">Action</th>
													</tr>
												</thead>
                                                 <?php if(isset($applications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($applications as $new){?>
													<tr>
														 <td> <?php echo $i?></td>
                                                          <td style="display: none" class="notifications_app_id<?php echo $i ?>"> <?php echo $new->users_app_guid?></a></td>
                                                           <td style="display: none" class="users_id<?php echo $i ?>"> <?php echo $new->users_id?></a></td>
                                                          <td style="display: none" class="notifications_to_id<?php echo $i ?>"> <?php echo $new->users_admin_id?></a></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->users_program;?></td>
                                                         <td> <?php echo $new->users_accured_com;?></td>
                                                         <td> <?php   if($new->users_status == 8){ 
																		   echo 'Yes';
																	   }
																	   else {
																		   echo 'No';
																	   }
															 ?></td>
                                                        <td><?php

                                                            $CI = get_instance();
                                                            $CI->load->model("application_model");
		                                                    $count_receipt = $CI->application_model->get_count_receipt($new->users_id);
		                                                   // echo count($count_receipt);
		                                                    if(count($count_receipt) > 0 && $count_receipt->receipts_fund_status == 1 && $new->users_is_release == 0){ ?>
                                                                <a class="btn btn-primary" onClick="btn_send(<?php echo  $i ?>)" title="<?php echo $new->users_admin_id?>">Release now</a>
                                                                <?php } else {
                                                                ?>
                                                                <a class="btn btn-primary" title="<?php echo $new->users_admin_id?>" disabled >Release now</a>
<?php }?>


                                                       </td>
                                                        <td><a class="btn btn-success" href="<?php echo site_url('admin/application/edit/'.$new->users_id); ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                                         
                              
										
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
            
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dataTables-data.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/dist/js/jquery.slimscroll.js')?>"></script>
	<script src="<?php echo base_url('assets/cp/dist/js/dropdown-bootstrap-extended.js')?>"></script>
    
     <script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/moment/min/moment-with-locales.min.js')?>"></script>
		
		<!-- Bootstrap Colorpicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')?>"></script>
				
		<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
		
		<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
		
		<!-- Form Picker Init JavaScript -->
	<script src="<?php echo base_url('assets/cp/dist/js/form-picker-data.js')?>"></script>
	
	
			
<script type="text/javascript">			
function btn_send(i){
	
	//var notifications_to_id = $(this).attr('title');
	var notifications_to_id = $('.notifications_to_id'+i).html();
	var notifications_app_id = $('.notifications_app_id'+i).html();
	var users_id = $('.users_id'+i).html();
	 $.ajax({
    url: '<?php echo site_url('admin/application/send_notif_release') ?>',
    type:'POST',
    data:{notifications_to_id:notifications_to_id,
		 notifications_app_id:notifications_app_id,
		 users_id:users_id},
    success:function(result){
      alert("Your application has been received, and we will contact you shortly");
//		location.reload();
	 
	 }
  });
}
</script>	



<script type="text/javascript">
   $(document).on('click', '#btn_search', function(){
	var from_date = $('#from_date').val();
	var to_date = $('#to_date').val();
    var type_agent = $('#type_agent').val();
	
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/application/get_app_by_type_agent') ?>',
    type:'POST',
    data:{from_date       : from_date,
	      to_date           : to_date,
		  type_agent    : type_agent},
    success:function(result){
	  $('#ajax_table').html(result);
	  $('#load_search').hide();
		location.reload();
	 }
  });
});
</script>
		