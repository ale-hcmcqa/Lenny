<div class="box_center">
    <div class="box_center_top"> 
    	<div class="box_center_top_l">
    		<p><?php echo $query->ten; ?></p>
    	</div>
    	<div class="box_center_top_r"></div>
        <div class="clearfix"></div>                                                                                                                         
    </div>         
    <div class="box_center_main">
    	<ol class="breadcrumb" style="margin-bottom:0;">
	        <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
	        <li class="active"><?php echo $query->ten; ?></li>
	    </ol>
	    <div class="row">
	    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	    		<div id="phukienct_img">
	    			<img title="<?php echo $query->ten; ?>" alt="<?php echo $query->ten; ?>" src="<?php echo $query->anh; ?>">
	    		</div>
	    	</div>
	    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div id="phukienct_nd">
					<h1><?php echo $query->ten; ?></h1>
					<div class="product_detail_social">
						<ul>
							<li><div class="fb-like" data-href="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
							<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>">Tweet</a></li>
							<li><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>"></div></li>
							<div class="clearfix"></div>
						</ul>
						<script type="text/javascript" orig_index="16">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
						<script src="https://apis.google.com/js/plusone.js" type="text/javascript" orig_index="17">
                 			{lang: 'vi'}
               			</script>
					</div>
					<table>
						<tr>
							<th>Giá:</th>
							<td>
								<p style="margin-bottom:0;">
								<?php 
									if($query->gia==0)
									{
										echo 'Liên hệ';
									}
									else
									{
										echo '<span style="color:red;font-weight:bold;">'.number_format($query->gia,0,'.','.').'&nbsp;'.$query->donvitinh.'</span>';
									}
								?>
								</p>
							</td>
						</tr>
						<tr>
							<th>Thông tin cơ bản:</th>
							<td valign="top">
								<p><?php echo $query->thongtin1; ?></p>
								<p><?php echo $query->thongtin2; ?></p>
								<p><?php echo $query->thongtin3; ?></p>
								<p><?php echo $query->thongtin4; ?></p>
								<p><?php echo $query->thongtin5; ?></p>
							</td>
						</tr>
					</table>														
				</div>				
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    		<div id="chitiet">
					<div id="chitiet_top">
						<p>Thông tin chi tiết</p>
						<div class="clearfix"></div>
					</div>
					<div id="chitiet_main">
						<?php echo $query->noidung; ?>
					</div>
				</div>
				<div style="margin-left:10px;" class="product_detail_social">
					<ul>
						<li><div class="fb-like" data-href="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>" data-width="450" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>">Tweet</a></li>
						<li><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html'); ?>"></div></li>
						<div class="clearfix"></div>
					</ul>
					<script type="text/javascript" orig_index="16">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script>
					<script src="https://apis.google.com/js/plusone.js" type="text/javascript" orig_index="17">
             			{lang: 'vi'}
           			</script>
				</div>					            
		        <div id="fb" style="padding-left:10px;">       
	    	       <div id="fb-root"></div>
	    		      <script>(function(d, s, id) {
	    		          var js, fjs = d.getElementsByTagName(s)[0];
	                      if (d.getElementById(id)) return;
	                      js = d.createElement(s); js.id = id;
	                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	                      fjs.parentNode.insertBefore(js, fjs);
	                }(document, 'script', 'facebook-jssdk'));</script>
	                <html xmlns:fb="http://ogp.me/ns/fb#">
	                    <fb:comments href="<?php echo site_url(LocDau($query->ten).'-p'.$query->id.'.html');?>" width="100%" num_posts="10" ></fb:comments>
	                </html>
	                <!--fb-->
	            </div>       
	    	</div>	
	    </div>
    </div>
</div>    