<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.box_bccu').hover(function(){            
            jQuery(this).children().children('.info_hi').fadeIn();
        },function(){
            jQuery(this).children().children('.info_hi').fadeOut();
        });
    });   
</script>
<div class="box">  
    <div class="box_top">                    
        <a class="box_top_title" href="<?php echo site_url('san-pham-ban-chay.html'); ?>">Sản phẩm bán chạy</a>               
    </div>                 
     <div class="box_main" style="padding-bottom:15px;">     
        <ul class="breadcrumb" style="margin:15px;">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>                
            <li class="active">Sản phẩm bán chạy</li>    
            <div class="clear"></div>                        
        </ul>            
            <?php 
                if($sanphamnb->num_rows() >0)
                {
                    ?>
                    <ul style="list-style:none;">
                    <?php
                    $sp=1;
                    foreach($sanphamnb->result() as $itemsanphambc)
                    {                                                                                                                         
                    ?>
                    <li class="box_bc box_bccu" <?php if($sp%5==0){ ?>style="border-right:none;"<?php } ?>>
                         <div class="box_bccu">
                            <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="box_bc_img" title="<?php echo $itemsanphambc->ten; ?>"><img src="<?php echo $itemsanphambc->anh_thumb; ?>" title="<?php echo $itemsanphambc->ten; ?>" alt="<?php echo $itemsanphambc->ten; ?>"></a>
                            <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="box_bc_name" title="<?php echo $itemsanphambc->ten; ?>"><?php echo $itemsanphambc->ten; ?></a>
                            <p>
                                <?php 
                                if($itemsanphambc->gia==0)
                                {
                                    echo 'Liên hệ';
                                }
                                else
                                {
                                    echo number_format($itemsanphambc->gia,0,'.','.').'&nbsp;'.$itemsanphambc->donvitinh;
                                }
                                ?>
                            </p>
                            <div class="info_hi">
                                <ul class="info-list">
                                    <li class="info-list"><strong>Mô tả sản phẩm</strong></li>
                                    <li><?php echo $itemsanphambc->chip; ?></li>
                                    <li><?php echo $itemsanphambc->ram; ?></li>
                                    <li><?php echo $itemsanphambc->hedieuhanh; ?></li>
                                    <li><?php echo $itemsanphambc->manhinh; ?></li>
                                    <li><?php echo $itemsanphambc->pin; ?></li>
                                    <li><?php echo $itemsanphambc->camera; ?></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <?php   
                        $sp++;
                    }
                    ?>
                </ul>
                    <?php
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
            <div class="clearfix"></div>       
     </div>
</div>