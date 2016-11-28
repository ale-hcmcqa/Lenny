<div id="content_m" class="container">
<div class="box_sp">
    <div class="box_sp_top">                
        <a href="<?php echo site_url('thu-vien-anh.html'); ?>">Tài liệu</a>                
    </div>
    <div class="box_sp_main">
        <?php 
            if($tailieu->num_rows() > 0)
            {
                $counttl=1;
                foreach($tailieu->result() as $itemtailieu)
                {
                ?>
                <div class="item_document">
                    <span><?php echo $counttl; ?>.<?php echo $itemtailieu->tenfile; ?></span>  
                    <a href="<?php echo $itemtailieu->file; ?>"><img src="images/dwnld.gif" width="25px" border="0" /></a>  
                </div>
                <?php 
                    $counttl++;   
                }
            ?>            
            <?php    
            }
            else
            {
            ?>
                <p style="padding:15px;text-align:center;">Dữ liệu đang cập nhật</p>
            <?php    
            }
        ?>        
        <div class="clear"></div>
        <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>
    </div>
</div>
</div>