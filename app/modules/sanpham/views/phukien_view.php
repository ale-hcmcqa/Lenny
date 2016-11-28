<div class="box_center">
    <div class="box_center_top"> 
    	<div class="box_center_top_l">                                       
        	<a href="">Phụ kiện</a>   
        </div> 
        <div class="box_center_top_r"></div>
        <div class="clearfix"></div>                                                                                                                         
    </div>         
    <div class="box_center_main"> 
    	<ol class="breadcrumb" style="margin-bottom:0;">
	        <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
	        <li class="active">Phụ kiện</li>                
        </ol> 
        <div class="row">
        	<?php 
        		if($phukien->num_rows()>0)
        		{
                    ?>
                    <div class="sanpham_mb">
                        <?php                                                         
                                $demkmmb=1;
                                foreach ($phukien->result() as $itemsanphamkmmb) 
                                {                     
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="sanpham_item">                                
                                        <a href="<?php echo site_url(LocDau($itemsanphamkmmb->ten).'-pk'.$itemsanphamkmmb->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkmmb->ten; ?>"><img src="<?php echo $itemsanphamkmmb->anh_thumb; ?>" title="<?php echo $itemsanphamkmmb->ten; ?>" alt="<?php echo $itemsanphamkmmb->ten; ?>"></a>
                                        <a href="<?php echo site_url(LocDau($itemsanphamkmmb->ten).'-pk'.$itemsanphamkmmb->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkmmb->ten; ?>"><?php echo $itemsanphamkmmb->ten; ?></a>
                                        <p>
                                            <?php 
                                                if($itemsanphamkmmb->gia==0)
                                                {
                                                    echo 'Liên hệ';
                                                }
                                                else
                                                {
                                                    echo number_format($itemsanphamkmmb->gia,0,'.','.').'&nbsp;'.$itemsanphamkmmb->donvitinh;
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                if($demkmmb%2==0)
                                {
                                ?>
                                <div class="clearfix"></div>
                                <?php    
                                }
                                $demkmmb++;
                                }
                                //$sqlsanphamkmmb->free_result();                           
                        ?>
                    </div>
                    <div class="sanpham_desk">
                    <?php
        			foreach ($phukien->result() as $itemsanphamkhuyenmai) 
        			{        				
        		?>
	        	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	                <div class="sanpham_item" onmouseover='showtip("<div style=\"width:250px;\"><div style=\"background:#ed1c24;height:35px;line-height:35px;width:100%;line-height:35px;padding-left:10px;font-size:12px;font-weight:bold;color:#fff;\"><?php echo $itemsanphamkhuyenmai->ten; ?></div><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Giá:</strong>&nbsp;<span style=\"color:red;\"><?php if($itemsanphamkhuyenmai->gia==0){ echo 'Liên hệ';}else{ echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;}?></span></p><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Bảo hành:&nbsp;</strong><?php echo $itemsanphamkhuyenmai->baohanh; ?></p><p style=\"border-top:1px solid #ddd;margin-top:10px;;text-align:left;padding-top:9px;padding-left:10px;\"><strong>Thông tin</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin1; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin2; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin3; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin4; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;padding-bottom:10px;\"><?php echo $itemsanphamkhuyenmai->thongtin5; ?></span></div>");' onmouseout="hidetip();">	                    
	                    <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-pk'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><img src="<?php echo $itemsanphamkhuyenmai->anh_thumb; ?>" title="<?php echo $itemsanphamkhuyenmai->ten; ?>" alt="<?php echo $itemsanphamkhuyenmai->ten; ?>"></a>
	                    <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-pk'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><?php echo $itemsanphamkhuyenmai->ten; ?></a>
	                    <p>
	                        <?php 
	                            if($itemsanphamkhuyenmai->gia==0)
	                            {
	                                echo 'Liên hệ';
	                            }
	                            else
	                            {
	                                echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;
	                            }
	                        ?>
	                    </p>
	                </div>
	            </div>	            
            	<?php
            		} 
            		?>
                </div>
            		<div class="clearfix"></div>
            		<div style="margin-left:30px;margin-top:5px;"><?php echo $pagination; ?></div>                    
            		<?php
				}
            ?>
        </div>
    </div>
</div>        