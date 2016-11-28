<div class="box_right" style="margin-bottom:0;">
    <div class="box_right_top" style="margin-bottom:0;">                                         
            <a href="">Sản phẩm khuyễn mại</a>  
            <div class="box_right_vien"></div>                             
    </div>           
 <div class="box_center_main">  
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#205d9d;" class="fa fa-home"></i></a></li>                
        <li><a href="<?php echo site_url('san-pham.html') ?>">Sản phẩm khuyễn mại</a></li>    
        <div class="clear"></div>                        
    </ul>           
        <?php 
            if($sanpham->num_rows() >0)
            {
                $sp=1;
                ?>
                <div class="sanpham_mb">
                    <?php 
                                foreach ($sanpham->result() as $itemsanphambyhomemb) {
                                ?>
                                <div class="sanpham_mb_item">
                                    <a href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_img"><img src="<?php echo $itemsanphambyhomemb->anh_thumb; ?>"></a>                                    
                                    <a href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_name"><?php echo $itemsanphambyhomemb->ten; ?></a>
                                    <p class="sanpham_mb_item_gia">Giá:<span>
                                        <?php 
                                        if($itemsanphambyhomemb->giakm!=0) 
                                        {
                                            echo number_format($itemsanphambyhomemb->giakm,0,'.','.');
                                        } 
                                        else
                                        {  
                                            if($itemsanphambyhomemb->gia==0)

                                            {

                                                echo 'Liên hệ';

                                            }

                                            else

                                            {

                                                echo number_format($itemsanphambyhomemb->gia,0,'.','.');

                                            }
                                        }
                                        ?>

                                        </span>
                                    </p>                                
                                    <a href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_read"><i class="fa fa-caret-right fw"></i>&nbsp;Chi tiết</a>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                                }
                            ?>    
                </div>
                <div class="sanpham_desk">
                <?php
                foreach($sanpham->result() as $itemsanphambc)
                {                                                                                                                                         
                ?>
                <div class="sanpham_item" <?php if($sp%5==0){?>style="margin-right:0;"<?php } ?>>
                                <?php 
                                    if($itemsanphambc->giakm!=0)
                                    {
                                        $giamgiabc=100-((($itemsanphambc->giakm)/($itemsanphambc->gia))*100);
                                    ?>
                                    <div class="sanpham_item_giam"><p>- <?php echo floor($giamgiabc); ?>% </p></div>
                                    <?php 
                                    }
                                ?>
                                <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphambc->ten; ?>" alt="<?php echo $itemsanphambc->ten; ?>" src="<?php echo $itemsanphambc->anh_thumb; ?>"></a>
                                <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphambc->ten,50); ?></a>
                                <p class="sanpham_item_gia">
                                    <?php 
                                        if($itemsanphambc->giakm!=0)
                                        {
                                            echo number_format($itemsanphambc->giakm,0,'.','.').'&nbsp;'.$itemsanphambc->donvitinh;
                                        }
                                        else
                                        {
                                            if($itemsanphambc->gia==0)
                                            {
                                                echo 'Liên hệ';
                                            }
                                            else
                                            {
                                                echo number_format($itemsanphambc->gia,0,'.','.').'&nbsp;'.$itemsanphambc->donvitinh;
                                            }
                                        }
                                    ?>
                                </p>
                                <?php 
                                    if($itemsanphambc->giakm!=0)
                                    {
                                        $tkim=($itemsanphambc->gia) - ($itemsanphambc->giakm);
                                    ?>
                                    <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkim,0,'.','.').'&nbsp;'.$itemsanphambc->donvitinh;?></p>
                                    <?php 
                                    }
                                ?>
                            </div>  
                <?php   
                    $sp++;
                }
                ?>
                </div>
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