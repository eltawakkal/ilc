<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
	<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Upgrade account</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="#">Dashboard</a></li>
						<li class="active"><span>Upgrade account</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							
                            
                          
                             <div class="row" style="margin-bottom:10px; text-align: center">
                                <div class="col-xs-12">
                                  <h2 style="text-align: center">Dear ...</h2>
                                   <p style="text-align: center; font-size: 15px; padding-left: 25%; padding-right: 25%">Now you can upgrade your account to be an agent and add another 
students, upgrade now your account and we will contact you soon to get 
your coupon code and the funds per application</p>
                                   <br> <br>
                                    <div class="btn-group ">
                                        <a class="btn btn-primary" id="btn_upgrade" > Upgrade account</a>
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
    
    <script type="text/javascript">
		
		$('#btn_upgrade').on('click', function(){
	
	//var users_id = $('#users_id').val();
	 $.ajax({
    url: '<?php echo site_url('admin/another_std/upgrade') ?>',
    type:'POST',
    data:{},
    success:function(result){
      alert("Account has been upgraded to an agent ,,, you must log out .. and then log on again");
		location.reload();
	 
	 }
  });
});
		
</script>
    
			
	