<div class="box_right" style="margin-bottom:0;">
    <div class="box_right_top" style="margin-bottom:0;">                                                             
            <a href="" class="box_top_title">Kết quả tìm kiếm</a> 
            <div class="box_right_vien"></div>                    
    </div>      
        <div class="box_right_main">            
            <ol class="breadcrumb" style="margin-bottom:0;">                
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <li class="active">Kết quả tìm kiếm</li>
                <div class="clear"></div>
            </ol>                           
             <?php 
                if($query->num_rows() > 0)
                {
                    ?>                   
                    <?php
                    $demdmsp=1;
                    foreach($query->result() as $itemsanphambc)
                    {  
                                                                                                                                            
                    ?>
                    <div class="sanpham_item" <?php if($demdmsp%5==0){?>style="margin-right:0;"<?php } ?>>
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
                    if($demdmsp%5==0)
                    {
                    ?>
                    <div class="clearfix"></div>
                    <?php    
                    }                    
                $demdmsp++;
                }
                ?>                
                <?php                
            }  
            ?>                      
            <div class="clearfix"></div>
            <div style="padding:10px;"><?php echo $pagination;?></div>                                      
        </div>
    </div>    