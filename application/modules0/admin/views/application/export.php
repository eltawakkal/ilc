<?php

header('Content-Type: "text/csv"');
header('Content-Disposition: attachment; filename="'.lang('clients').'.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Content-Transfer-Encoding: binary");
header('Pragma: public');

?>
رقم المسلسل,رقم العميل,رقم الهاتف, حالة العميل,اسم المدينة,اسم المنطقة,خطوط العرض,خطوط الطول
							<?php $i=1;
								
							foreach ($clients as $new)
							{
							?>
									<?php echo $i .","?>
									<?php echo $new->user_id .","?>
									<?php echo $new->user_phone .","?>
                                    <?php echo $new->user_status_name .","?>
									<?php echo $new->city_name .","?>
                                    <?php echo $new->region_name .","?>
                                    <?php echo $new->location_latitude .","?>
                                    <?php echo $new->location_longitude .","?>

									<?php echo ",\n";?>
                                <?php $i++;}?>