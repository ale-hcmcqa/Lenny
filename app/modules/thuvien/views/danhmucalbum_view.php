<div class="box_right" style="padding-top:15px !important;">
    <div class="box_right_top">                   
        <p><a href="<?php echo site_url('danh-muc-album.html'); ?>" class="cufont_text">Danh mục album ảnh</a></p>       
        <div class="box_vi"></div>                   
    </div>
    <div class="box_right_main">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>                
            <li class="active">Danh mục album ảnh</li>                
        </ol>                                                        
            <?php                     
                if($query->num_rows() >0)
                {
                    $demtv=1;
                    foreach($query->result() as $itemdanhmucanhall)
                    {
                    ?>
                    <div class="thuvien_item" <?php if($demtv%3==0){ ?> style="margin-right:0;" <?php } ?>>
                        <a href="<?php echo site_url(BoDau($itemdanhmucanhall->danhmucalbum).'.html'); ?>" class="thuvien_item_img"><img src="<?php echo $itemdanhmucanhall->anh_thumb; ?>" title="<?php echo $itemdanhmucanhall->danhmucalbum; ?>" alt="<?php echo $itemdanhmucanhall->danhmucalbum; ?>" /></a>                        
                        <a href="<?php echo site_url(BoDau($itemdanhmucanhall->danhmucalbum).'.html'); ?>" class="thuvien_item_name" title="<?php echo $itemdanhmucanhall->danhmucalbum; ?>"><?php echo $itemdanhmucanhall->danhmucalbum; ?></a>                        
                    </div>  
                    <?php 
                    $demtv++;
                    }
                }
            ?> 
            <div class="clear"></div>
            <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>                                                                                                  
    </div>
</div>        