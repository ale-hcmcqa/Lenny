<div class="box_center">
    <div class="box_center_top">                                         
            <a href="">Sản phẩm</a>                               
    </div>           
 <div class="box_center_main">  
    <ul class="breadcrumb" style="margin-bottom:0;">
        <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#205d9d;" class="fa fa-home"></i></a></li>                
        <li><a href="<?php echo site_url('san-pham.html') ?>">Sản phẩm</a></li>    
        <div class="clear"></div>                        
    </ul>      
      <div class="row">  
        <?php 
            if($sanpham->num_rows() >0)
            {
                $sp=1;
                foreach($sanpham->result() as $itemsanpham)
                {                         
                    $tenallvn=$itemsanpham->ten;                                                                                               
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="sanpham_item">                                                   
                <?php 
                    if($itemsanpham->anh_thumb=='')
                    {
                        
                    }
                    else
                    {
                ?>                           
                <a class="sanpham_item_img" href="<?php echo site_url(LocDau($itemsanpham->ten).'-sp'.$itemsanpham->id.'.html');?>" title="<?php echo $tenallvn; ?>"><img src="<?php echo $itemsanpham->anh_thumb; ?>" alt="<?php echo $tenallvn; ?>" title="<?php echo $tenallvn; ?>" /></a>                                
                <?php 
                }
                ?>   
                <a href="<?php echo site_url(LocDau($itemsanpham->ten).'-sp'.$itemsanpham->id.'.html');?>" class="sanpham_item_name"><?php echo $tenallvn; ?></a>
                <p class="sanpham_item_gia">Giá:<span>
                            <?php 
                            if($itemsanpham->gia==0)
                            {
                                echo 'Liên hệ';
                            }
                            else
                            {
                                echo number_format($itemsanpham->gia,0,'.','.');
                            }
                            ?>
                            </span></p>
                 <div class="sanpham_item_cuoi">                                
                                <a href="<?php echo site_url(LocDau($itemsanpham->ten).'-dh'.$itemsanpham->id.'.html'); ?>" class="sanpham_item_order" title="<?php echo $itemsanpham->ten; ?>">Mua hàng</a>                                
                            </div>                                                                                                                                                                                                                  
        </div><!--End .box_sanpham--> 
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
        </div>
        <div class="clear"></div>                        
        <div style="padding:20px;"><?php echo $pagination;?></div>
        <div class="clearfix"></div>         
 </div>
</div>     