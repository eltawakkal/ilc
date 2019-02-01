<?php $admin = $this->session->userdata('admin');
$admin_role= $admin['admin_role'];
$admin_guid= $admin['admin_guid'];
$admin_email= $admin['admin_email'];
?>
<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css"/>
<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
          <?php if($admin_role == 1 ||  $admin_role == 4){ ?>
				<div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-red">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                            <a href="<?php echo site_url('admin/application/list_admin');?>">
                                                                <span class="txt-light block counter"><span >
                                                                <?php echo count($all_applications) ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">All applications</span>
                                                            </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="ti-user txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-yellow">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/list_admin');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($new_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">New applications</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-star txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box btn-info">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/list_admin');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($submit_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block  font-13">Submitted apps.</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="ti-briefcase txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-blue">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/list_admin');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($enroll_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">Enrolled student</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-graduation-cap txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <div class="row">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-green">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                              <a href="<?php echo site_url('admin/application/list_admin');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($students); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">All students </span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-trophy txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-blue">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                              <a href="<?php echo site_url('admin/agent/list_agent');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($agents); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">All agents </span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                                                  <i class="fa fa-building txt-light data-right-rep-icon "></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-pink">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                              <a href="<?php echo site_url('admin/institutions');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($institution); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">Institutions </span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-trophy txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-grey">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                              <a href="<?php echo site_url('admin/receipts');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($receipts); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">Receipts </span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-html5 txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                 </div>
           <?php  } else if($admin_role == 2) {  ?>
           <div class="row">
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-green">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                            <a href="<?php echo site_url('admin/application/lists');?>">
                                                                <span class="txt-light block counter"><span >
                                                                <?php echo count($all_applications) ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">All applications</span>
                                                            </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="ti-user txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-yellow">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/lists');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($new_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">New applications</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-star txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box btn-info">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/lists');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($submit_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block  font-13">submitted apps.</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="ti-briefcase txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                    <div class="panel panel-default card-view pa-0">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body pa-0">
                                                <div class="sm-data-box bg-blue">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                             <a href="<?php echo site_url('admin/application/lists');?>">
                                                                <span class="txt-light block counter"><span class="counter-anim"><?php echo count($enroll_applications); ?></span></span>
                                                                <span class="weight-500 uppercase-font txt-light block font-13">Enrolled student</span>
                                                               </a>
                                                            </div>
                                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                                <i class="fa fa-graduation-cap txt-light data-right-rep-icon"></i>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                
           
           
            <?php  } else {?>
           	<h2>Welcome,<?php echo $admin_email;?>  </h2>
           
           <?php } ?>
	
            <?php if ($admin_role == 1 || $admin_role == 2 || $admin_role == 4) {?>	 
				<!-- Row -->
				<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Recent 15 applications</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover table-bordered display mb-30 dataTable" >
												<thead>
													<tr>
														<th>#</th>
														<th style="display: none">App no.</th>
														<th>App no.</th>
                                                        <th>App date</th>
                                                        <th>Full name</th>
                                                        <th>Program</th>
                                                        <th>WhatsApp</th>
                                                        <th>App status</th>
													</tr>
												</thead>
                                                 <?php if(isset($applications)):?>
                        						<tbody>
                            						<?php $i=1;foreach ($applications as $new){?>
													<tr>
														 <td> <?php echo $i?></td>
                                                         <td style="display: none" id="users_id<?php echo $i ?>"> <?php echo $new->users_id?></a></td>
                                                         <td> <a style="text-decoration: underline" href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id?></a></td>
                                                         <td> <?php echo $new->users_created_on;?></td>
                                                         <td> <?php echo $new->users_fullname;?></td>
                                                         <td> <?php echo $new->users_program;?></td>
                                                         <td> <?php echo $new->users_whatapp;?></td>
                                                         <td> <?php  if($new->users_status == 1){
															 			echo 'New ';
																		}else if($new->users_status == 2){
															 			echo 'submitted ';
																		} else  if($new->users_status == 3){ 
																		   echo 'Processing';
																	   } else  if($new->users_status == 4){ 
																		   echo 'Not submit';
																	   }else  if($new->users_status == 5){ 
																		   echo 'Other';
																	   }else  if($new->users_status == 6){ 
																		   echo 'Offered';
																	   }else  if($new->users_status == 7){ 
																		   echo 'Val';
																	   }else  if($new->users_status == 8){ 
																		   echo 'Enrolled';
																	   }else  if($new->users_status == 9){ 
																		   echo 'payment processing';
																	   }else  if($new->users_status == 10){ 
																		   echo 'Canceled';
																	   }else  if($new->users_status == 11){ 
																		   echo 'Rejected';
																	   }
															 ?></td>
                                                       
                                                        
                                                         
                              
										
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
					<?php } if ($admin_role == 1 || $admin_role == 4){ ?>
					<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
					   <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Applications status</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<canvas id="chart_7" height="200"></canvas>
								</div>	
							</div>
						</div>
						
						
						
						 <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Registration status</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<?php if($setting->is_register == 1){ ?>
									<input type="hidden" value="<?php echo $setting->is_register ?>" id="ccc" />
									<div class="make-switch switch-small">
									 Status:  <input type="checkbox"  data-checkbox="VALUE1" class="alert-status">
									</div>
									
									
									
									<?php } else { ?>
									
									
									<div class="make-switch switch-small">
									Status:   <input type="checkbox" checked="true" data-checkbox="VALUE1" class="alert-status-false">
									</div>
									
									<?php } ?>
									
									
									
									
								</div>	
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
                <?php if ($admin_role == 10 || $admin_role == 11 || $admin_role == 12 ) { ?>
                <div class="row">
                <div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">احصائيات المدرسة</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_bar_chart" class="morris-chart"></div>
								</div>
							</div>
						</div>
					</div>
				   <!--<div class="col-lg-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">line Chart</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_line_chart" class="morris-chart"></div>
								</div>
							</div>
						</div>
					</div>-->
					
				</div>
                <?php }  ?>
				<!-- /Row -->
				
				
			</div>
			
			<!-- Footer -->
			
			<!-- /Footer -->
			
		</div>
        <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>
          <script src="<?php echo base_url('assets/cp/vendors/bower_components/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('assets/cp/vendors/bower_components/morris.js/morris.min.js')?>"></script>
 <!--   <script src="<?php echo base_url('assets/cp/dist/js/morris-data.js')?>"></script>-->
 
  <script src="<?php echo base_url('assets/cp/vendors/chart.js/Chart.min.js')?>"></script>
  
  <script src="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js')?>"></script>

 	
    
    
    <script type="text/javascript">
	
	
	/*Morris Init*/
$(function() {
	"use strict";



   
	if($('#morris_bar_chart').length > 0)
	   // Bar Chart
		Morris.Bar({
			element: 'morris_bar_chart',
			data: [{
				device: 'المعلمين',
				geekbench: <?php echo count($submit_applications); ?>
			}, {
				device: 'المشرفين',
				geekbench: <?php echo count($submit_applications); ?>
			}, {
				device: 'الطلاب الموهوبين',
				geekbench: <?php echo count($submit_applications); ?>
			}, {
				device: 'جوائز المدرسة',
				geekbench: <?php echo count($submit_applications); ?>
			}, {
				device: 'مرافق المدرسة',
				geekbench: <?php echo count($submit_applications); ?>
			}],
			xkey: 'device',
			ykeys: ['geekbench'],
			labels: ['Geekbench'],
			barRatio: 0.4,
			xLabelAngle: 35,
			pointSize: 1,
			pointStrokeColors:['#fec107'],
			behaveLikeLine: true,
			gridLineColor: '#878787',
			gridTextColor:'#878787',
			hideHover: 'auto',
			barColors: ['#fec107'],
			resize: true,
			gridTextFamily:"aaa"
		});


});
	</script>
    
    <script type="text/javascript">
$( document ).ready(function() {
    "use strict";	
	if( $('#chart_7').length > 0 ){
		var ctx7 = document.getElementById("chart_7").getContext("2d");
		var data7 = {
			 labels: [
			"Submitted",
			"Enroll",
			"Offer",
			"Processing",
			"val",
			"payment",
			"cancel",
			"reject",
		],
		datasets: [
			{
				data: [<?php echo count($submit_applications); ?>, <?php echo count($enroll_applications); ?>, <?php echo count($get_offer_applications); ?>, <?php echo count($get_processing_applications); ?>,<?php echo count($get_val_applications); ?>,<?php echo count($payment); ?>,<?php echo count($canceled_applications); ?>,<?php echo count($rejected); ?>],
				backgroundColor: [
					"rgba(254,193,7,.8)",
					"rgba(1,200,83,.8)",
					"rgba(255,42,0,.8)",
					"rgba(120,255,63,.8)",
					"rgba(36,96,255,.8)",
					"rgba(30,255,200,.8)",
					"rgba(96,155,155,.8)",
					"rgba(40,121,255,.8)"
				],
				hoverBackgroundColor: [
					"rgba(254,193,7,.8)",
					"rgba(1,200,83,.8)",
					"rgba(255,42,0,.8)",
					"rgba(120,255,63,.8)",
					"rgba(36,96,255,.8)",
					"rgba(30,255,200,.8)",
					"rgba(96,155,155,.8)",
					"rgba(40,121,255,.8)"
				]
			}]
		};
		
		var doughnutChart = new Chart(ctx7, {
			type: 'doughnut',
			data: data7,
			options: {
				animation: {
					duration:	3000
				},
				responsive: true,
				legend: {
					labels: {
					fontFamily: "aaa",
					fontColor:"#878787"
					}
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'aaa'"
				},
				elements: {
					arc: {
						borderWidth: 0
					}
				}
			}
		});
	}	
});
		
		


		var ccc = $('#ccc').val();
		if(ccc == 1){
		$('.alert-status').bootstrapSwitch('state', true);


$('.alert-status').on('switchChange.bootstrapSwitch', function (event, state) {

    $.ajax({
		url: '<?php echo site_url('admin/dashboard/change_status_false') ?>',
		type:'POST',
		data:{},
		success:function(result){
			alert("Registration stopped");
			location.reload();
		 }
	  });
});	
		} 
		else {
		
		
		
$('.alert-status-false').bootstrapSwitch('state', false);


$('.alert-status-false').on('switchChange.bootstrapSwitch', function (event, state) {
	
	$.ajax({
		url: '<?php echo site_url('admin/dashboard/change_status_true') ?>',
		type:'POST',
		data:{},
		success:function(result){
			alert("Registration activated");
			location.reload();
		 }
	  });
	

});	
			}
		
		
		
		
		
		
		

	</script>