<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="box_center">
      <div class="box_center_top">
        <div class="box_center_top_al">
            <a href="" title="Thư viện ảnh">Thư viện ảnh</a>
        </div> 
        <div class="clear"></div>                                       
      </div>
      <div class="clear"></div>                    
    <div class="box_center_main">            
            <ul class="breadcrumb" style="margin:15px;">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a><span>/</span></li>
                <li><a href="<?php echo site_url('thu-vien-anh.html'); ?>" title="Thư viện ảnh">Thư viện ảnh</a></li>
                <div class="clear"></div>
            </ul>
            <br />
            <div class="demonstrations">                        
                <div class="row">
                    <div id="content_box" class="gallery clearfix">                
                        <?php 
                        
                            if($query->num_rows() >0)
                            {
                                $demtv=1;
                                foreach($query->result() as $itemhinhanhhd)
                                {                            
                                        $titletv=$itemhinhanhhd->title;                                                                                                                                                                                                           
                                ?>
                                <div class="col-lg-3 col-md-3 col-lg-sm-3 col-lg-xs-12 thuvien_item">                        
                                    <a href="<?php echo site_url('thuvien/anhalbum/'.$itemhinhanhhd->id.'/'.url_title($itemhinhanhhd->title).'.html'); ?>" title="<?php echo $itemhinhanhhd->title; ?>" class='fresco' data-fresco-group='example' data-fresco-caption="<?php echo $itemhinhanhhd->title; ?>"><img src="<?php echo $itemhinhanhhd->anh_thumb; ?>" title="<?php echo $titletv; ?>" alt="<?php echo $titletv; ?>" /></a>
                                    <p class="thuvien_item_name"><?php echo $titletv; ?></p>                                      
                                </div>        
                            <?php
                                $demtv++;
                                }                         
                            }
                            ?>                    
                            <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>
                    </div>
                </div> 
                </div>           
            <div class="clear"></div>
        </div>
    </div>
    </div>    
    <div class="clearfix"></div>
</div>    