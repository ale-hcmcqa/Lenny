<div class="box_right" style="padding-top:0;">  
    <div class="box_right_top">                     
        <p>
            Kết quả tìm kiếm
        </p>        
    </div>                 
     <div class="box_right_main">            
            <?php 
                if($query->num_rows() >0)
                {
                    $sp=1;
                    foreach($query->result() as $itemtimkiem)
                    {                        
                        $tenallvn=$itemtimkiem->ten;                                                                                          
                    ?>
                    <div class="sanpham_item" <?php if($sp%5==0) { ?>style="margin-right:0;"<?php } ?>>
                        <a href="<?php echo site_url(url_sp($itemtimkiem->id)); ?>" class="sanpham_img" title="<?php echo $itemtimkiem->ten; ?>"><img src="<?php echo $itemtimkiem->anh_thumb; ?>" title="<?php echo $itemtimkiem->ten; ?>" alt="<?php echo $itemtimkiem->ten; ?>" /></a>
                        <a href="<?php echo site_url(url_sp($itemtimkiem->id)); ?>" class="sanpham_name" title="<?php echo $itemtimkiem->ten; ?>"><?php echo $itemtimkiem->ten; ?></a>
                        <p>Giá:&nbsp;<span>
                        <?php
                                if($itemtimkiem->gia=='')
                                {                    
                                    echo "Liên hệ";                                                                            
                                }
                                else
                                {
                                    echo number_format($itemtimkiem->gia,0,'.','.')?>&nbsp;<?php echo $itemtimkiem->donvitinh; 
                                }
                            ?>  
                            </span>
                        </p>            
                    </div> 
                    <?php   
                        $sp++;
                    }
                }
                else
                {
                ?>
                <p style="text-align:center;">Dữ liệu đang cập nhật</p>
                <?php    
                }
            ?>
            <div class="clear"></div>                        
            <div style="padding:20px;"><?php echo $pagination;?></div>         
     </div>
</div>