<?php
$CI=&get_instance();
$CI->load->model('site/site_model');
$contactinfo=$CI->site_model->gettablename('tblthongtincongty','id,tencongty,diachi,dienthoai','');
$tencongtyctvn=$contactinfo->tencongty;
$diachictvn=$contactinfo->diachi;
$address = get_infor_from_address($contactinfo->diachi);
?> 
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAxmioee4IxJGbd_M69PUMd0W3jDl6ZvHs"></script>
<script>
	function initialize() {
		var myLatlng = new google.maps.LatLng(10.8497934,106.6699073);
		var mapOptions = {
			zoom: 16,
			center: myLatlng
		};
		var map = new google.maps.Map(document.getElementById('div_id'), mapOptions);
		var contentString = "<table><tr><th><?php echo $tencongtyctvn; ?></th></tr><tr><td><strong>Địa chỉ:</strong>:&nbsp;<?php echo $diachictvn; ?></td></tr><tr><td><strong>Điện thoại:</strong>:&nbsp;<?php echo $contactinfo->dienthoai; ?></td></table>";
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: '<?php echo $tencongtyctvn; ?>'
		});
		infowindow.open(map, marker);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="vaotrong">
		<div class="box_right">
		    <div class="box_right_top" style="margin-bottom:0;"> 		    	                                      
		        <a href="" class="box_top_title">Liên hệ</a> 
		        <div class="box_right_vien"></div>  		                                                                                                                                       
		    </div>         
		        <div class="box_right_main">                             
		            <ol class="breadcrumb">
		                <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
		                <li class="active">Liên hệ</li>
		                
		            </ol>
		            <div class="row">
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                    <div id="div_id" style="width:100%;height:300px;"></div>
		                </div>
		                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                    <div id="info_contact" style="padding-top:15px;padding-right:15px;">                           
		             <div style="font-size:13px;font-family:arial;">                        
		            <ul>
						<li id="name-contact">
						    <h3 style="margin:0;background:none;margin-bottom:10px;color:#034c90;font-size:18px;font-weight:bold;text-transform:uppercase;"><?php echo $tencongtyctvn; ?></h3>
						</li>                
						<li style="color:#333;"><span><b>Địa chỉ:</b></span>&nbsp;<?php echo $diachictvn; ?></li>                                                             
						<li style="color:#333;"><span><b>Điện thoại:</b></span>&nbsp;<?php echo $contactinfo->dienthoai; ?></li>                                				
		            </ul>
		        </div>  
		            
		        <div>
		        <?php 
		            if(isset($errors_register))
		            {
		                echo $errors_register;
		            }
		            elseif(isset($kq))
		            {
		                echo $kq;
		            }
		        ?>
		        <form method="post" name="frmcontact" action="<?php echo site_url('site/docontact'); ?>">				
						<div class="request-formm">
							<div class="caption">
								<span>Họ và tên:</span>
							</div>
							<div class="column">
								<input type="text" name="txthoten" value=""/>
							</div>
						</div>
						<div class="request-formm">
							<div class="caption">
								<span>Địa chỉ:</span>
							</div>
							<div class="column">
								<input type="text" name="txtdc" value=""/>
							</div>
						</div>
						<div class="request-formm">
							<div class="caption">
								<span>Điện thoại:</span>
							</div>
							<div class="column">
								<input type="text" name="txtdt" value=""/>
							</div>
						</div>
						<div class="request-formm">
							<div class="caption">
								<span>Email:</span>
							</div>
							<div class="column">
								<input type="text" name="txtemail" value=""/>
							</div>
						</div>
						<div class="request-formm">
							<div class="caption">
								<span>Nội dung:</span>
							</div>
							<div class="column">
								<textarea rows="5" style="width:100%; " name="txtnd" id="txtnd"></textarea>
							</div>
						</div>
						<div class="request-formm">
							<br/>
							<input type="submit" class="nut" name="cbg" value="Gửi"/>
							<input type="reset" class="nut" value="Làm lại"/>
						</div>
					</form> 
					<br>           
		    </div>       
		        <div class="clear"></div>
		    </div><!--End #info_contact-->             
		                </div>
		            </div>                                                                                          
		    <div class="clear"></div>
		    </div>       
		    <div class="clear"></div>             
		</div>
	</div>
</div>  