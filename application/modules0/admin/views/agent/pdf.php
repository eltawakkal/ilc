<meta http-equiv="Content-Type" content="charset=utf-8"/>
<style type="text/css">
th
            {
                font-family: "DejaVu Sans Mono", monospace;
                /*font-family: "Helvetica", sans-serif;*/ This is wrong
                border: solid 1px black;
                font-size: 12px;
            }
            </style>
<?php 
 
echo '
	<html style="direction:rtl" dir="rtl">
							<head>
								<title>Invoice</title>
							</head>
							<body>
								<table width="100%" style="border: 1px solid #f4f4f4">
												<tr>												
													<th>رقم المسلسل</th>
													<th>رقم العميل</th>
													<th>رقم هاتف العميل</th>
													<th>حالة العميل</th>
													<th>المدينة</th>
													<th>العنوان</th>
													<th>خطوط العرض</th>
													<th>خطوط الطول</th>
												 </tr>				
										';
										$i=1; foreach($clients as $new){
											echo '<tr>
													<td>'.$i.'</td>
													<td>'.$new->user_id.'</td>
													<td>'.$new->user_phone.'</td>
													<td>'.$new->user_status_name.'</td>
													<td>'.$new->city_name.'</td>
													<td>'.$new->region_name.'</td>
													<td>'.$new->address_latitude.'</td>
													<td>'.$new->address_longitude.'</td>
													
												</tr>';
										
										$i++;}		
									echo '	
										
										</table>	
										
							
							</body>
						</html>

';
?>