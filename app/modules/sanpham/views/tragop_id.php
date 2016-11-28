<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="vaotrong">
        <div class="box">
            <div class="box_top">     	                                    
                <a href="" class="box_top_title">Mua trả góp</a>                                                                                                                                        
            </div>         
            <div class="box_main">
            	<ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
                    <li class="active"><?php echo $query->ten; ?></li>                
                </ol>
                <div class="control_banner">
                	<img src="images/banner_gop01.png">
                	<h1>LỢI ÍCH KHI MUA  TRẢ GÓP <?php echo $query->ten; ?> TẠI DIDONGSINHVIEN</h1>
                	<ul>
                		<li class="offix01"><p>Không thế chấp tài sản</p></li>
                		<li class="offix02"><p>Không chứng minh tài chính</p></li>
                		<li class="offix03"><p>Không cần công chứng giấy tờ</p></li>
                	</ul>
                	<div class="clearfix"></div>
                </div>
                <div class="detail_g">
                	<p id="detail_g_title">Hiện tại DiDongSinhVien hợp tác với công ty tài chính là  PPF và HD Finance để cung cấp dich vụ trả góp. Số tiền trả hàng tháng bên dưới chỉ mang tính tham khảo</p>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box_leftG">
                		<img title="<?php echo $query->ten; ?>" alt="<?php echo $query->ten; ?>" width="150" height="150" src="<?php echo $query->anh_thumb; ?>">
                		<p>
                			<?php 
        	                    if($query->gia==0)
        	                    {
        	                        echo 'Liên hệ';
        	                    }
        	                    else
        	                    {
        	                        echo number_format($query->gia,0,'.','.').'&nbsp;'.$query->donvitinh;
        	                    }
        	                ?>
                		</p>
                		<a href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" title="<?php echo $query->ten; ?>">Xem chi tiết sản phẩm</a>
                		<div class="clear"></div>
                	</div>
                	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 box_rightG">
        				<p id="box_rightG_t">3 bước mua trả góp <a href="<?php echo site_url(LocDau($query->ten).'-sp'.$query->id.'.html'); ?>" title="<?php echo $query->ten; ?>"><?php echo $query->ten; ?></a> tại website DidongSinhVien</p>
        				<ul class="nav_step">
        					<li>Bước 1</li>
        					<li>Bước 2</li>
        					<li>Bước 3</li>
        				</ul>
        				<ul class="block_step">
        					<li><p>Chọn số tiền và hồ sơ phù hợp với bạn</p></li>
        					<li><p>Duyệt hồ sơ trả góp qua điện thoại hoặc tại của hàng Di Động Sinh Viên</p></li>
        					<li><p>Nhận sản phẩm tại của hàng khi hồ sơ được công ty tài chính duyệt</p></li>
        				</ul>
        				<div class="clearfix"></div>
                	</div>
                	<div class="clearfix"></div>
                </div> 
                <script type="text/javascript">
                	function number_format(number,decimals,dec_point,thousands_sep)
                    {
                        number=(number+'').replace(/[^0-9+\-Ee.]/g,'');
                        var n=!isFinite(+number)?0:+number,prec=!isFinite(+decimals)?0:Math.abs(decimals),sep=(typeof thousands_sep==='undefined')?',':thousands_sep,dec=(typeof dec_point==='undefined')?'.':dec_point,s='',toFixedFix=function(n,prec){var k=Math.pow(10,prec);return''+(Math.round(n*k)/k).toFixed(prec);};s=(prec?toFixedFix(n,prec):''+Math.round(n)).split('.');if(s[0].length>3){s[0]=s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,sep);}
                        if((s[1]||'').length<prec)
                        {
                            s[1]=s[1]||'';
                            s[1]+=new Array(prec-s[1].length+1).join('0');
                        }
                        return s.join(dec)+' đ';
                    }
            		jQuery(document).ready(function(){ 
            			jQuery('[name="before_pay"]:radio').click(function(){
            				jQuery('.nav_step01 li label').click(function(){
            					jQuery('.nav_step01 li label').removeClass('activetr');
            					jQuery(this).addClass('activetr');
            				});    				
            				var giagocmon=parseFloat(<?php echo $query->gia; ?>);
            				var tratruocmon=parseFloat(jQuery('[name="before_pay"]:radio:checked').val());       				
            				var thoigiantramon=parseFloat(jQuery('[name="options"]:radio:checked').val());    				 				
            				var giatrumon=parseFloat(giagocmon - tratruocmon); 
            				var moithangmon=(giatrumon/thoigiantramon) + (giatrumon*0.029); 
            				var tongmoithangmon=thoigiantramon*moithangmon + tratruocmon; 
            				jQuery('#price_6monthHD').html(number_format(moithangmon,0,',','.'));
            				jQuery('#price_s6monthHD').html(number_format(tongmoithangmon,0,',','.'));				
            			});  
            			jQuery('[name="options"]:radio').click(function(){
            				jQuery('.nav_step02 li label').click(function(){
            					jQuery('.nav_step02 li label').removeClass('activetr');
            					jQuery(this).addClass('activetr');
            				}); 
            				var giagocthang=parseFloat(<?php echo $query->gia; ?>);    				
            				var tratruocthang=parseFloat(jQuery('[name="before_pay"]:radio:checked').val());       				
            				var thoigiantrathang=parseFloat(jQuery('[name="options"]:radio:checked').val());    				 				
            				if(thoigiantrathang==6)
            				{
            					jQuery(".icon_table").css('left','70px');
            				}
            				else if(thoigiantrathang==9)
            				{
            					jQuery(".icon_table").css('left','240px');	
            				}
            				else
            				{
            					jQuery(".icon_table").css('left','410px');
            				}
            				var giatruthang=parseFloat(giagocthang - tratruocthang);
            				var moithangthang=(giatruthang/thoigiantrathang) + (giatruthang*0.029); 
            				var tongmoithangthang=thoigiantrathang*moithangthang + tratruocthang;
            				jQuery('#price_6monthHD').html(number_format(moithangthang,0,',','.'));
            				jQuery('#price_s6monthHD').html(number_format(tongmoithangthang,0,',','.'));				 
            			});     			
            			jQuery("#hokhau1").click(function(){
            				var value_lai1=jQuery("#hokhau1").attr('data-lai');    				
            				jQuery('.rateHD').attr('data-lai',value_lai1);
            				jQuery('.rateHD').html('2.9 %');
            				var giatong1=parseFloat(<?php echo $query->gia; ?>);
            				var tratruoc1=parseFloat(jQuery('[name="before_pay"]:radio:checked').val());
            				var thoigiantra1=parseFloat(jQuery('[name="options"]:radio:checked').val());    				
            				var giatru1=parseFloat(giatong1 - tratruoc1);
            				var moithang1=(giatru1/thoigiantra1) + (giatru1*value_lai1);
            				var tongmoithang1=thoigiantra1*moithang1 + tratruoc1;     							
            				jQuery('#price_6monthHD').html(number_format(moithang1,0,',','.'));
            				jQuery('#price_s6monthHD').html(number_format(tongmoithang1,0,',','.'));
            			});
            			jQuery("#hokhau2").click(function(){
            				var value_lai=jQuery("#hokhau2").attr('data-lai'); 
            				jQuery('.rateHD').attr('data-lai',value_lai);
            				jQuery('.rateHD').html('2.66 %');
            				var giatong=parseFloat(<?php echo $query->gia; ?>);
            				var tratruoc=parseFloat(jQuery('[name="before_pay"]:radio:checked').val());
            				var thoigiantra=parseFloat(jQuery('[name="options"]:radio:checked').val());
            				var giatru=parseFloat(giatong - tratruoc);
            				var moithang=(giatru/thoigiantra) + (giatru*value_lai);
            				var tongmoithang=thoigiantra*moithang + tratruoc;    				
            				jQuery('#price_6monthHD').html(number_format(moithang,0,',','.'));
            				jQuery('#price_s6monthHD').html(number_format(tongmoithang,0,',','.'));
            			});
            		});
                </script>
                <div class="box_list_step">
                	<p class="step_title">Chọn số tiền và hồ sơ phù hợp với bạn</p>
                	<p class="title_step01">Bạn muốn trả trước bao nhiêu ?</p>
                	<?php 
                		if($query->gia<7000000)
                		{
                		?>
        	        	<ul class="nav_step01">
        	        		<li><label class="activetr"><input type="radio" value="<?php echo $query->gia*0.2; ?>" name="before_pay" autocomplete="off" checked="true">&nbsp;<?php echo number_format($query->gia*0.2,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.3; ?>" data-gia="<?php echo $query->gia*0.3; ?>" autocomplete="off"><?php echo number_format($query->gia*0.3,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.4; ?>" data-gia="<?php echo $query->gia*0.4; ?>" autocomplete="off"><?php echo number_format($query->gia*0.4,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.5; ?>" data-gia="<?php echo $query->gia*0.4; ?>" autocomplete="off"><?php echo number_format($query->gia*0.5,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        	</ul>
                		<?php 
        				}
        				elseif($query->gia>=7000000 && $query<=13000000)
        				{
        				?>
        				<ul class="nav_step01">
        	        		<li><label class="activetr"><input type="radio" value="<?php echo $query->gia*0.3; ?>" name="before_pay" autocomplete="off" checked="true">&nbsp;<?php echo number_format($query->gia*0.3,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.4; ?>" data-gia="<?php echo $query->gia*0.3; ?>" autocomplete="off"><?php echo number_format($query->gia*0.4,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.5; ?>" data-gia="<?php echo $query->gia*0.4; ?>" autocomplete="off"><?php echo number_format($query->gia*0.5,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.6; ?>" data-gia="<?php echo $query->gia*0.4; ?>" autocomplete="off"><?php echo number_format($query->gia*0.6,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        	</ul>
        				<?php	
        				}
        				elseif ($query>13000000) 
        				{
        				?>
        				<ul class="nav_step01">
        	        		<li><label class="activetr"><input type="radio" value="<?php echo $query->gia*0.4; ?>" name="before_pay" autocomplete="off" checked="true">&nbsp;<?php echo number_format($query->gia*0.4,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.5; ?>" data-gia="<?php echo $query->gia*0.5; ?>" autocomplete="off"><?php echo number_format($query->gia*0.5,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.6; ?>" data-gia="<?php echo $query->gia*0.6; ?>" autocomplete="off"><?php echo number_format($query->gia*0.6,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        		<li><label><input type="radio" name="before_pay" value="<?php echo $query->gia*0.7; ?>" data-gia="<?php echo $query->gia*0.7; ?>" autocomplete="off"><?php echo number_format($query->gia*0.7,0,'.','.').'&nbsp;'.$query->donvitinh; ?></label></li>
        	        	</ul>
        				<?php
        				}
                	?>        	
                	<div class="clearfix"></div>
                	<p class="title_step02">Vui lòng cung cấp thêm thông tin cá nhân (để xét duyệt trả góp)</p>
                	<div class="seclect_date">
                		<div class="row">
                			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                				<p><strong>Năm sinh của bạn</strong></p>
                			</div>
                			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 checkbox">
                				<input type="email" class="form-control" id="inputdate" placeholder="    12   /  10   /  1980">
                			</div>
                			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                				<p>Độ tuổi mua trả góp từ 20 - 60 tuổi</p>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                				<p><strong>Giấy từ bạn phải có</strong></p>
                			</div>
                			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                				<div class="radio">
                					<label style="font-weight:bold;"><input type="radio" id="hokhau1" name="info_buy" data-lai="0.029" value="1" checked>CMND + Hộ khẩu hoặc Bằng lái</label>
                				</div>
                				<div class="radio">
                					<label style="font-weight:bold;"><input type="radio" id="hokhau2" name="info_buy" data-lai="0.0266" value="2">CMND + Hộ khẩu + Hoá đơn điện nước</label>
                				</div>
                			</div>	
                		</div>
                		<div class="clearfix"></div>
                	</div>
                	<p class="title_step03">Chọn thời gian vay (thời gian vay khác nhau thì có số tiền góp khác nhau)</p>
                	<ul class="nav_step02">
                		<li><label class="activetr"><input type="radio" value="6" name="options" autocomplete="off" checked>6 tháng</label></li>
                		<li><label><input type="radio" name="options" value="9" autocomplete="off">9 tháng</label></li>
                		<li><label><input type="radio" name="options" value="12" autocomplete="off">12 tháng</label></li>
                	</ul>
                	<div class="clearfix"></div>
                	<div class="presentation_content">
                		<div class="icon_table"><img src="images/icon_table.png"></div>
                		<table class="table" style="margin-bottom:0;">
        	                <tbody>
        	                    <tr>
        	                        <td class="left_td">Đối tác</td>
        	                        <td style=" text-align:center;width:30%;">HOMECREDIT</td>
        	                        <td style=" text-align:center;border-left: 1px solid #ddd;width:30%;">HD Finance</td>
        	                    </tr>
        	                    <tr>
        	                        <td class="left_td">Góp mỗi tháng</td>
        	                        <td>0 Đ</td>
        	                        <td style="border-left: 1px solid #ddd;" id="price_6monthHD">
        	                        	<?php 
        	                        		if($query->gia<7000000)
        	                        		{
        	                        			$laivao=($query->gia*0.2);
        	                        		}
        	                        		elseif($query->gia>=7000000 && $query->gia<13000000)
        	                        		{
        	                        			$laivao=($query->gia*0.3);	
        	                        		}
        	                        		elseif ($query->gia>13000000) 
        	                        		{
        	                        			$laivao=($query->gia*0.4);		                    
        	                        		}	                        		
        	                        		$moithang=($query->gia) - $laivao;
        	                        		$moithanglai=($moithang/6) + ($moithang*0.029);
        	                        		echo number_format($moithanglai,0,'.','.').'&nbsp'.$query->donvitinh;
        	                        	?>
        	                        </td>
        	                    </tr>
        	                    <tr>
        	                        <td class="left_td">Tổng góp, lãi và trả trước</td>
        	                        <td>0 Đ</td>
        	                        <td style="border-left: 1px solid #ddd;" id="price_s6monthHD">
        	                        	<?php echo number_format(6*$moithanglai + $laivao,0,'.','.').'&nbsp;'.$query->donvitinh; ?>
        	                        </td>
        	                    </tr>
        	                    <tr>
        	                        <td class="left_td">Lãi suất thực</td>
        	                        <td>0%</td>
        	                        <td style="border-left: 1px solid #ddd;" class="rateHD" data-lai="2.9">2.9 %</td>
        	                    </tr>
        	                    <tr>
        	                        <td class="left_td">Thời gian duyệt hồ sơ</td>
        	                        <td>15 - 30 phút</td>
        	                        <td style="border-left: 1px solid #ddd;">15 - 30 phút</td>
        	                    </tr>
        	                    <tr>
        	                        <td class="left_td">Thông tin khác</td>
        	                        <td style="font-weight:300;">Phí phạt góp trễ:
        	                        1 - 29 ngày: 150.000 Đ.
        	                        Phí thanh lý sớm hợp đồng:
        	                        15% tính trên số tiền gốc còn lại.</td>
        	                        <td style="font-weight:300;border-left: 1px solid #ddd;">Phí phạt góp trễ:
        	                        1 - 29 ngày: 150.000 Đ.
        	                        Phí thanh lý sớm hợp đồng:
        	                        15% tính trên số tiền gốc còn lại.</td>
        	                    </tr>
        	                    
        	                </tbody>
        	            </table>	            
                	</div>
                	<p>Tư vấn trả góp gọi 1900.2006 (1.000 Đ/Phút) hoặc (08) 71.08.08.08 bấm phím 2 (8h30-22h kể cả T7, CN, lễ)</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>