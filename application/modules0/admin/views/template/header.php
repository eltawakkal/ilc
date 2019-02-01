<?php
$CI = get_instance();
$CI->load->model('setting_model');
$CI->load->model('students_model');
$CI->load->model('application_model');
$CI->load->model('notifications_model');

$admin = $this->session->userdata('admin');
$settings = $CI->setting_model->get_setting();

//$notifications   = $CI->setting_model->get_notifications();

$first = $this->uri->segment(1);
$second = $this->uri->segment(2);
$third = $this->uri->segment(3);
$fourth = $this->uri->segment(4);
$count_inbox = $CI->students_model->get_count_inbox();
$admin = $CI->session->userdata('admin');
$admin_role= $admin['admin_role'];
if($admin_role == 1 || $admin_role == 4){
$count_notifiacation = $CI->notifications_model->get_count_notifiacation_admin();
} else{
$count_notifiacation = $CI->notifications_model->get_count_notifiacation();	
}

$admin = $this->session->userdata('admin');
$admin_id= $admin['admin_id'];
$admin_role= $admin['admin_role'];

	$ff=$this->session->userdata('admin');
	$CI->db->order_by('A.name','asc');
	$CI->db->select('A.name action');
	$CI->db->join('actions A', 'A.id = RRA.action_id', 'LEFT');
	$CI->db->where('RRA.role_id',$ff['admin_role']);
	$actions = $CI->db->get('rel_role_action RRA')->result();
	//echo '<pre>';print_r($actions);exit;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <title>.:: <?php echo $settings->name;?> ::.</title>
        
        <style type="text/css">
			.control-label{text-transform:none !important}
			h1,h2,h3,h4,h5,h6{text-transform:none !important}
		</style>
    	    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		    <link href="<?php echo base_url('assets/cp/vendors/bower_components/morris.js/morris.css')?>" rel="stylesheet" type="text/css"/>
	
	        <link href="<?php echo base_url('assets/cp/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')?>" rel="stylesheet" type="text/css"/>
	
	       <link href="<?php echo base_url('assets/cp/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')?>" rel="stylesheet" type="text/css">
		
        
        	<link href="<?php echo base_url('assets/cp/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet" type="text/css"/>
		
		<!-- Bootstrap Datetimepicker CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" type="text/css"/>
		
		<!-- Bootstrap Daterangepicker CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>" rel="stylesheet" type="text/css"/>

           	<link href="<?php echo base_url('assets/cp/vendors/bower_components/select2/dist/css/select2.min.css')?>" rel="stylesheet" type="text/css"/>
		
	<link href="<?php echo base_url('assets/cp/vendors/bower_components/switchery/dist/switchery.min.css')?>" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-select CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')?>" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-tagsinput CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')?>" rel="stylesheet" type="text/css"/>
		
		<!-- bootstrap-touchspin CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')?>" rel="stylesheet" type="text/css"/>
        
		<!-- multi-select CSS -->
		<link href="<?php echo base_url('assets/cp/vendors/bower_components/multiselect/css/multi-select.css')?>" rel="stylesheet" type="text/css"/>
        
	       <link href="<?php echo base_url('assets/cp/dist/css/style.css')?>" rel="stylesheet" type="text/css">
    
    
    <script type="text/javascript">
		setInterval(function(){
			$.ajax({
				url:"<?php echo site_url('admin/dashboard/get_count_nt') ?>" ,
				type:"GET",
				dataType:"html",
				success:function(data){
					if(data >= 1){  //Only append data if there are some new
						timestamp = Math.round((new Date()).getTime() / 1000); //Set timestamp to current time
						$('.not').html(data);
						$( "#here" ).load(window.location.href + " #here" );
					}
				}
			});
		}, 60000);

    </script>

    
    <style type="text/css">
		
		.wrapper.theme-1-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-2-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-3-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-4-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-5-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-6-active.pimary-color-red .fixed-sidebar-left .side-nav > li > a.active{background: #F28D37 !important}
		.wrapper.theme-1-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span, .wrapper.theme-2-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span, .wrapper.theme-3-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span, .wrapper.theme-4-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span, .wrapper.theme-5-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span, .wrapper.theme-6-active.pimary-color-red .fixed-sidebar-left .side-nav li.navigation-header > span{color:#F28D37 !important}
		.navbar.navbar-inverse.navbar-fixed-top .nav.top-nav > li > a .top-nav-icon-badge{background: #F28D37 !important}
		.btn.btn-info, .wizard > .actions a.btn-info, .dt-buttons .btn-info.dt-button, .tablesaw-sortable th.tablesaw-sortable-head button.btn-info, .sweet-alert button.btn-info, .owl-theme .owl-nav .btn-info[class*="owl-"], button.btn-info.fc-agendaDay-button.fc-state-default.fc-corner-right, button.btn-info.fc-month-button.fc-state-default.fc-corner-left, button.btn-info.fc-agendaWeek-button, .btn-info.fc-prev-button, .btn-info.fc-next-button, .btn-info.fc-today-button{background: #F28D37 !important; border: solid 1px #F28D37}
		</style>
    
    </head>
    <body class="skin-blue">
    
  <div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="<?php echo site_url('admin/dashboard'); ?>">
							<img class="brand-img" style="top:-16px" src="<?php echo base_url('uploads/'.@$settings->img); ?>" alt="<?php echo $settings->name;?>"/>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
                
			</div>
			<div  class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<!--<li>
						<a id="open_right_sidebar" href="#"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
					</li>-->
					
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope top-nav-icon" style="font-size: 20px !important"></i><span class="top-nav-icon-badge not"><?php echo count($count_inbox); ?></span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut" >
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">Messages</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> Close </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							
								
							<li>
								<div class="streamline message-nicescroll-bar"  id="here">
									
									 <?php if(isset($count_inbox)):?>
                            			<?php $i=1;foreach ($count_inbox as $new){?>
											<div class="sl-item" onclick="is_to_view(<?php echo $new->messages_id?>)">
										<a href="<?php echo site_url('admin/messages/details/'.$new->messages_guid); ?>">
											<div class="icon bg-blue">
												<i class="zmdi zmdi-email"></i>
											</div>
											<div class="sl-content" >
												<span class="inline-block capitalize-font  pull-left truncate head-notifications"><?php echo $new->messages_title; ?></span>
												<span class="inline-block font-11  pull-right notifications-time"><?php echo $new->message_created_on; ?></span>
												<div class="clearfix"></div>
												<p class="truncate"> <?php echo $new->users_fullname; ?></p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									 	<?php $i++;}?>
                         			<?php endif;?>
									
								</div>
							</li>
							
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="<?php echo site_url('admin/messages'); ?>"> View inbox </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge "><?php echo count($count_notifiacation); ?></span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut" >
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">Notification</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> Close </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							
							<div class="streamline message-nicescroll-bar" >
									
									 <?php if(isset($count_notifiacation)):?>
                            			<?php $i=1;foreach ($count_notifiacation as $new){?>
											<div class="sl-item" onclick="is_to_view_not(<?php echo $new->notifications_id?>)">
										
											<div class="icon bg-blue">
												<i class="zmdi zmdi-notifications"></i>
											</div>
											<div class="sl-content" >
												<span class="inline-block capitalize-font  pull-left truncate head-notifications"><?php
													if($new->notifications_type == 1){
														echo 'Your application has been received, and we will contact you shortly'; }
													else if($new->notifications_type == 2){ echo 'Status changed to submitted';}
													else if($new->notifications_type == 3){ echo 'Status changed to processing';}
													else if($new->notifications_type == 4){ echo 'Status changed to not submit';}
												    else if($new->notifications_type == 5){ echo 'Status changed to other';}
													else if($new->notifications_type == 6){ echo 'Status changed to offer';}
													else if($new->notifications_type == 7){ echo 'Status changed to val';}
													else if($new->notifications_type == 8){ echo 'Status changed to enrolled';}
													else if($new->notifications_type == 9){ echo 'Status changed to payment processing';}
													else if($new->notifications_type == 10){ echo 'Status changed to canceled';}
													else if($new->notifications_type == 11){ echo 'Status changed to rejected';}
													?></span>
												<span class="inline-block font-11  pull-right notifications-time"><?php echo $new->notifications_created_on; ?></span>
												<div class="clearfix"></div>
												<p class="truncate"> Application no.: <a href="<?php echo site_url('admin/application/view/'.$new->users_admin_id); ?>"><?php echo $new->users_id; ?></a></p>
											</div>
											
									</div>
									<hr class="light-grey-hr ma-0"/>
									 	<?php $i++;}?>
                         			<?php endif;?>
									
								</div>
							
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="<?php echo site_url('admin/notifications')?>"> View notifications </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">
                        <?php 
								 if(!empty($admin['image'])){
								 ?>
								 <img src="<?php echo base_url('assets/uploads/images/'.$admin['image']);?>"  alt="user_auth" class="user-auth-img img-circle" />
								 <?php 
								 	}else{
								?>	
								 <img src="<?php echo base_url('assets/uploads/images/avatar5.png');?>"  alt="user_auth" class="user-auth-img img-circle" />
								<?php
									}
								?>
                                
                        <span class="user-online-status"></span>
                        </a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                      
                          
							<li>
							
							<?php if($admin_role == 1 || $admin_role == 4){ ?>
								<a href="<?php echo site_url('admin/setting/setting_admin'); ?>">
							<?php } else if($admin_role == 2){ ?>
								<a href="<?php echo site_url('admin/setting/setting_agent'); ?>">
							<?php } else if($admin_role == 3){ ?>
								<a href="<?php echo site_url('admin/setting'); ?>">
							<?php }?>
								
								<i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							

							<li class="divider"></li>
							<li>
								<a href="<?php echo site_url('admin/login/logout'); ?>"><i class="zmdi zmdi-power"></i><span>Sign out</span></a>
							</li>
						</ul>
					</li>
				</ul>
               
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="<?php echo($this->uri->segment(2)=='dashboard' )?'active':'';?>" href="<?php echo site_url('admin/dashboard'); ?>" ><div class="pull-left"><i class="fa fa-tachometer  mr-20"></i><span class="right-nav-text">    Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
                <?php
                    $access = $admin['admin_role'];
                    if($access==1 || $access==4){
                    ?>	
				<li >
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr" class="<?php echo($this->uri->segment(2)=='admins' || $this->uri->segment(3)=='setting_admin' )?'active':'';?>"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Administration</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li class="<?php echo($this->uri->segment(3)=='setting_admin')?'active':'';?>">
							<a href="<?php echo site_url('admin/setting/setting_admin');?>">Setting</a>
						</li>
						<li  class="<?php echo($this->uri->segment(2)=='admins')?'active':'';?>">
							<a href="<?php echo site_url('admin/admins');?>">Users</a>
						</li>
						
					</ul>
				</li>
                <li >
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_d" class="<?php echo($this->uri->segment(2)=='institutions' || $this->uri->segment(2)=='receipts' || $this->uri->segment(2)=='coordinators')?'active':'';?>"><div class="pull-left"><i class="fa fa-gear mr-20"></i>
					<span class="right-nav-text">System constants</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="ecom_d" class="collapse collapse-level-1">
						<li class="<?php echo($this->uri->segment(2)=='institutions')?'active':'';?>">
							<a href="<?php echo site_url('admin/institutions');?>">Institutions</a>
						</li>
						<li class="<?php echo($this->uri->segment(2)=='lang_center')?'active':'';?>">
							<a href="<?php echo site_url('admin/lang_center');?>">Language centers</a>
						</li>
						
						<li  >
							<a class="<?php echo($this->uri->segment(2)=='receipts')?'active':'';?>" href="<?php echo site_url('admin/receipts');?>">Receipts</a>
						</li>
						<li class="<?php echo($this->uri->segment(2)=='coordinators')?'active':'';?>">
							<a  href="<?php echo site_url('admin/coordinators');?>">Coordinators</a>
						</li>
                       
					</ul>
				</li>
				<li >
					<a class="<?php echo($this->uri->segment(3)=='list_agent' || $this->uri->segment(2)=='coupons')?'active':'';?>" href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Agents </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="app_dr" class="collapse collapse-level-1">
						<li class="<?php echo($this->uri->segment(3)=='list_agent')?'active':'';?>">
							<a href="<?php echo site_url('admin/agent/list_agent');?>">Agents</a>
						</li>
						<li class="<?php echo($this->uri->segment(2)=='coupons')?'active':'';?>">
							<a href="<?php echo site_url('admin/coupons');?>">Coupon</a>
						</li>
					</ul>
				</li>
				
				<li><hr class="light-grey-hr mb-10"/></li>
  				<li class="navigation-header">
					<span>Basic operations</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                
				 
				
				 <li>
					 <a class="<?php echo($this->uri->segment(3)=='list_admin' )?'active':'';?>" href="<?php echo site_url('admin/application/list_admin');?>"><div class="pull-left"><i class="ti-files mr-20"></i><span class="right-nav-text">Applications</span></div><div class="clearfix"></div></a>
				</li>
				
				 <li>
					 <a class="<?php echo($this->uri->segment(2)=='students' )?'active':'';?>" href="<?php echo site_url('admin/students');?>"><div class="pull-left"><i class="ti-user mr-20"></i><span class="right-nav-text">Students</span></div><div class="clearfix"></div></a>
				</li>
				
				 <li>
					 <a class="<?php echo($this->uri->segment(2)=='commission' )?'active':'';?>" href="<?php echo site_url('admin/commission');?>"><div class="pull-left"><i class="fa fa-dollar mr-20"></i><span class="right-nav-text">Commission</span></div><div class="clearfix"></div></a>
				</li>
				
				 <li>
					 <a class="<?php echo($this->uri->segment(2)=='messages' )?'active':'';?>" href="<?php echo site_url('admin/messages');?>"><div class="pull-left"><i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="clearfix"></div></a>
				</li>
				
				 <li>
					 <a class="<?php echo($this->uri->segment(2)=='notifications' )?'active':'';?>" href="<?php echo site_url('admin/notifications');?>"><div class="pull-left"> <i class="zmdi zmdi-notifications  mr-20"></i></i><span class="right-nav-text">Notifications</span></div><div class="clearfix"></div></a>
				</li>
				
				 <li>
					 <a class="<?php echo($this->uri->segment(2)=='website' )?'active':'';?>" href="<?php echo site_url('admin/website');?>"><div class="pull-left"> <i class="fa fa-cogs  mr-20"></i><span class="right-nav-text">Setting</span></div><div class="clearfix"></div></a>
				</li>
				
				
			
            
				
				
                
                <?php } 
				
				else if($access==2){ ?>
				
				    <li>
					 <a class="<?php echo($this->uri->segment(3)=='lists' )?'active':'';?>" href="<?php echo site_url('admin/application/lists');?>"><div class="pull-left"><i class="ti-files mr-20" ></i><span class="right-nav-text">Applications</span></div><div class="clearfix"></div></a>
					</li>
					
					
					<li>
					 <a class="<?php echo($this->uri->segment(3)=='add' )?'active':'';?>" href="<?php echo site_url('admin/application/add');?>"><div class="pull-left"><i class="ti-clipboard mr-20"></i><span class="right-nav-text">New application</span></div><div class="clearfix"></div></a>
					</li>
					
			
					
					<li><hr class="light-grey-hr mb-10"/></li>
					<li class="navigation-header">
						<span>component</span> 
						<i class="zmdi zmdi-more"></i>
					</li>
					
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='agent' )?'active':'';?>" href="<?php echo site_url('admin/agent');?>"><div class="pull-left"><i class="ti-user mr-20"></i><span class="right-nav-text">Detials</span></div><div class="clearfix"></div></a>
					</li>
					
					<li>
					 <a class="<?php echo($this->uri->segment(3)=='setting_agent' )?'active':'';?>" href="<?php echo site_url('admin/setting/setting_agent');?>"><div class="pull-left"><i class="ti-settings mr-20"></i><span class="right-nav-text">Settings</span></div><div class="clearfix"></div></a>
					</li>
					
					
					
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='messages' )?'active':'';?>" href="<?php echo site_url('admin/messages');?>"><div class="pull-left"><i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="clearfix"></div></a>
				</li>
				 
				 
					 <li>
					 <a class="<?php echo($this->uri->segment(2)=='notifications' )?'active':'';?>" href="<?php echo site_url('admin/notifications');?>"><div class="pull-left"> <i class="zmdi zmdi-notifications  mr-20"></i></i><span class="right-nav-text">Notifications</span></div><div class="clearfix"></div></a>
				</li>
				
				<?php } else if($access==3){ ?>
				
				
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='application' )?'active':'';?>" href="<?php echo site_url('admin/application');?>"><div class="pull-left"><i class="ti-clipboard mr-20"></i><span class="right-nav-text">Application</span></div><div class="clearfix"></div></a>
					</li>
					
					
					<li >
					 <a class="<?php echo($this->uri->segment(2)=='attachments' )?'active':'';?>" href="<?php echo site_url('admin/attachments');?>"><div class="pull-left"><i class="ti-files mr-20"></i><span class="right-nav-text">Attachments</span></div><div class="clearfix"></div></a>
					</li>
					
					
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='another_std' )?'active':'';?>" href="<?php echo site_url('admin/another_std');?>"><div class="pull-left"><i class="ti-user mr-20"></i><span class="right-nav-text">Aonther student</span></div><div class="clearfix"></div></a>
					</li>
					
					<li><hr class="light-grey-hr mb-10"/></li>
					<li class="navigation-header">
						<span>component</span> 
						<i class="zmdi zmdi-more"></i>
					</li>
					
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='setting' )?'active':'';?>" href="<?php echo site_url('admin/setting');?>"><div class="pull-left"><i class="ti-settings mr-20"></i><span class="right-nav-text">Settings</span></div><div class="clearfix"></div></a>
					</li>
					
					<li>
					 <a class="<?php echo($this->uri->segment(2)=='messages' )?'active':'';?>" href="<?php echo site_url('admin/messages');?>"><div class="pull-left"><i class="fa fa-envelope mr-20"></i><span class="right-nav-text">Inbox</span></div><div class="clearfix"></div></a>
					</li>
				
					
					 <li>
					 <a class="<?php echo($this->uri->segment(2)=='notifications' )?'active':'';?>" href="<?php echo site_url('admin/notifications');?>"><div class="pull-left"> <i class="zmdi zmdi-notifications  mr-20"></i></i><span class="right-nav-text">Notifications</span></div><div class="clearfix"></div></a>
				</li>
				
				<?php }?>
			</ul>
		</div>
       
        
  <script src="<?php echo base_url('assets/cp/vendors/bower_components/jquery/dist/jquery.min.js')?>"></script>      
  
  
  <script type="text/javascript">
  function note_row(i){
//$(document).on('click', '#note_row', function(){
 //alert(12);
 		//var not_id = $(this).attr('idd');
	//	alert(i);
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
  $.ajax({
    url: '<?php echo site_url('admin/services/notification_view') ?>'+'/'+i,
    type:'POST',
    success:function(result){
	 }
  });
}
//});
	
	</script>  
    
<script type="text/javascript">
	
	 function is_to_view(i){

	  
  $.ajax({
    url: '<?php echo site_url('admin/messages/is_to_views') ?>',
    type:'POST',
    data:{messages_id       : i
		  },
    success:function(result){	
		
	 }
  });
}
	
function is_to_view_not(i){

	  
  $.ajax({
    url: '<?php echo site_url('admin/notifications/is_to_views') ?>',
    type:'POST',
    data:{notifications_id       : i
		  },
    success:function(result){	
		
	 }
  });
}

	
	
</script>  