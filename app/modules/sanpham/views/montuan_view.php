<div class="box_center">
	<div class="box_center_top">
		<p>Thực đơn</p>
	</div>
	<div class="box_center_main">
		<div class="row">
			<?php 
				if ($monan->num_rows()>0) 
				{
					$demsphome=1;
					foreach ($monan->result() as $itemsanphambyhome) 
					{
						 $date = date('Y-m-d');  
				        $begin = strtotime($date);
				        $today = date('N');        
				        $day_names = array(
				            1 => "Monday",
				            2 => "Tuesday",
				            3 => "Wednesday",
				            4 => "Thursday",
				            5 => "Friday",
				            6 => "Saturday",
				            7 => "Sunday"
				        );
				        //echo "Date of  week"."";
				        $days = array();
				        $day_off_set = 0;
				        for($i=0;$i<7;$i++)
				        {
				            if($day_off_set > 7-$today)
				            {
				                $day_off_set = -($today-1);
				            }
				            $days[$day_names[$today+$day_off_set]] = date("Y-m-d",$begin+(60*60*24*($day_off_set)));
				            $day_off_set++;
				        }
				        foreach ($days as $key => $value) 
				        {		
				        	if(strtotime($itemsanphambyhome->ngaydang)==strtotime($value))
				        	{				        
							?>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<div class="sanpham_item">
									<a href="<?php echo site_url(LocDau($itemsanphambyhome->ten).'-sp'.$itemsanphambyhome->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphambyhome->ten; ?>"><img src="<?php echo $itemsanphambyhome->anh_thumb; ?>" title="<?php echo $itemsanphambyhome->ten; ?>" alt="<?php echo $itemsanphambyhome->ten; ?>"></a>
									<a href="<?php echo site_url(LocDau($itemsanphambyhome->ten).'-sp'.$itemsanphambyhome->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphambyhome->ten; ?>"><?php echo $itemsanphambyhome->ten; ?></a>
									<p>Giá:&nbsp;<span>
										<?php 
		                                if($itemsanphambyhome->gia==0)
		                                {
		                                	echo 'Liên hệ';
		                                }
		                                else
		                                {
		                                ?>
		                                <?php echo number_format($itemsanphambyhome->gia,0,'.','.')?>&nbsp;<?php echo $itemsanphambyhome->donvitinh; ?>&nbsp;/&nbsp;đĩa
		                                <?php    
		                                }
		                                ?>								
									</span></p>
									<a onclick="addorder(<?php echo $itemsanphambyhome->id; ?>,1)" class="sanpham_read">Mua hàng</a>
									<div class="clearfix"></div>
								</div>
							</div>	
							<?php
							}
						}
					}
					$monan->free_result();
				?>				
				<?php
				}
			?>																		
		</div>
		<?php echo $pagination; ?>		
	</div>
</div>