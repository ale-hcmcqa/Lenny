<?php 
$CI=&get_instance();
$CI->load->model('tag/tag_model');
?>
<div class="box">
    <div class="box_top">                                                   
            <a class="box_top_title"><?php echo $tag->tag; ?></a>                                                                  
    </div>     	
	<div class="box_main" style="padding:0 10px;">
        <ul class="breadcrumb" style="margin-bottom:0;">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>            
            <li class="active"><?php echo $tag->tag; ?></li> 
            <div class="clear"></div>                   
        </ul> 
        <ul style="list-style:none;">                                    
		<?php         		          
			$dem=1;            
			foreach($query->result() as $row1)
			{
				$row=$CI->tag_model->getsanpham($row1->idnew);
                if($row->num_rows() > 0)
                {
                    $itemsanphambc=$row->row();                                                                    
                ?>
                <li class="box_bc box_bccu" <?php if($demsp%5==0){ ?>style="border-right:none;"<?php } ?>>
                             <div class="box_bccu">
                                <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="box_bc_img" title="<?php echo $itemsanphambc->ten; ?>"><img src="<?php echo $itemsanphambc->anh_thumb; ?>" title="<?php echo $itemsanphambc->ten; ?>" alt="<?php echo $itemsanphambc->ten; ?>"></a>
                                <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="box_bc_name" title="<?php echo $itemsanphambc->ten; ?>"><?php echo $itemsanphambc->ten; ?></a>
                                <p class="giacu">
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
                                <a class="khuyenmai_item_dh" onclick="addorder(<?php echo $itemsanphambc->id;?>,<?php echo $itemsanphambc->gia; ?>);">Đặt hàng</a>
                                <div class="clearfix"></div>
                            </div>
                        </li>      
	          <?php 
		         }
                 $dem++;
            }		
		?>  
        </ul>  
        <div class="clearfix"></div>      
		<div style="padding:10px;"><?php echo $pagination;?></div>         
        <div class="clearfix"></div>                        
	</div>    
    <div class="clear"></div>	
</div>
