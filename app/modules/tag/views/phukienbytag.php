<?php 
$CI=&get_instance();
$CI->load->model('tag/tag_model');
?>
<div class="box_center">
    <div class="box_center_top">                                                   
            <a><?php echo $tag->tag; ?></a>                                                                  
    </div>     	
	<div class="box_center_main" style="padding:0 10px;">
        <ul class="breadcrumb" style="margin-bottom:0;">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>            
            <li class="active"><?php echo $tag->tag; ?></li> 
            <div class="clear"></div>                   
        </ul>                                 
		<?php         		          
			$dem=1;
			foreach($query->result() as $row1)
			{
				$row=$CI->tag_model->getphukien($row1->idnew);
                if($row->num_rows() > 0)
                {
                    $itemsanphamkhuyenmai=$row->row();                                                                    
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="sanpham_item" onmouseover='showtip("<div style=\"width:250px;\"><div style=\"background:#ed1c24;height:35px;line-height:35px;width:100%;line-height:35px;padding-left:10px;font-size:12px;font-weight:bold;color:#fff;\"><?php echo $itemsanphamkhuyenmai->ten; ?></div><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Giá:</strong>&nbsp;<span style=\"color:red;\"><?php if($itemsanphamkhuyenmai->gia==0){ echo 'Liên hệ';}else{ echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;}?></span></p><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Bảo hành:&nbsp;</strong><?php echo $itemsanphamkhuyenmai->baohanh; ?></p><p style=\"border-top:1px solid #ddd;margin-top:10px;;text-align:left;padding-top:9px;padding-left:10px;\"><strong>Thông tin</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin1; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin2; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin3; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->thongtin4; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;padding-bottom:10px;\"><?php echo $itemsanphamkhuyenmai->thongtin5; ?></span></div>");' onmouseout="hidetip();">                     
                            <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-p'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><img src="<?php echo $itemsanphamkhuyenmai->anh_thumb; ?>" title="<?php echo $itemsanphamkhuyenmai->ten; ?>" alt="<?php echo $itemsanphamkhuyenmai->ten; ?>"></a>
                            <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-p'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><?php echo $itemsanphamkhuyenmai->ten; ?></a>
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
                 $dem++;
            }		
		?>    
        <div class="clearfix"></div>      
		<div style="padding:10px;"><?php echo $pagination;?></div>         
        <div class="clearfix"></div>                        
	</div>    
    <div class="clear"></div>	
</div>
