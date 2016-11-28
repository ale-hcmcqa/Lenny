   
        <div class="box_right" style="padding-top:15px !important;">
        <div class="box_right_top">                           
            <p class="cufont_text"><a>Khách hàng chi tiết</a></p>                 
            <div class="box_vi"></div> 
            <div class="clear"></div>
        </div>                  
    <div class="box_right_main">    
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            <li class="active">Khách hàng chi tiết</li>
        </ol>
        <?php             
            $rows = $query;            
        ?>
        <div id="item_sp">
            <?php                  
                $tenct=$rows->ten;                
                $noidungct=$rows->noidung;                                                                 
            ?>
            <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
       
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
            <style>
			.wide {
				border-bottom: 1px #000 solid;
				width: 4000px;
			}
			
			.fleft { float: left; margin: 0 20px 0 0; }
			
			.cboth { clear: both; }
			
			#main {
				background: #fff;
				margin: 0 auto;
				padding: 30px;
				width: 1000px;
			}            
		</style>
            <div id="item_name">
                <h1><?php echo $tenct; ?></h1> 
                <br />
                 <?php echo $rows->noidung; ?>                                                                                                                                                       
            </div>  
            <div id="item_img">
            <div id="content_box" style="width:350px !important;" class="gallery clearfix">
                <img src="<?php echo $rows->anh; ?>" alt="<?php echo $tenct; ?>" title="<?php echo $tenct; ?>" style="max-width:300px;"/>
                <a style="text-align: center;background:none;" href="<?php echo $rows->anh; ?>" id="zoom" rel="prettyPhoto[gallery]">Xem ảnh lớn hơn</a>                                 
            </div>
            </div>                    
            <div class="clear"></div>                                          
        </div>  
        <br />                                                 
        <div id="fb" style="padding-left:9px;">       
	       <div id="fb-root"></div>
		      <script>(function(d, s, id) {
		          var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                  fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <html xmlns:fb="http://ogp.me/ns/fb#">
                <fb:comments href="<?php echo site_url(url_kh($rows->id));?>" width="700" num_posts="10" ></fb:comments>
            </html>
            <!--fb-->
        </div>
    </div>
    </div>    