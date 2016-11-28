<div class="box_center">
    <div class="box_center_top">                        
        <h1 class="box_main_l" style="font-weight: normal;">
            <?php 
                if(isset($loaixe))
                {
                    $this->db->where('id',$loaixe);
                    $dmcon = $this->db->get('tblhang')->row();                   
                    $danhmucsp=$dmcon->hang;                                                                                                                                                                         
                ?>
                <a href="" class="cufont_text"><?php echo $danhmucsp;?></a>
                <?php 
                }                
                ?>
            </h1>                                                   
    </div>
    <div class="box_center_main"> 
        <ul class="breadcrumb">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a><span>/</span></li>
            <?php 
                if(isset($loaixe))
                {
                ?>
                <li class="active"><?php echo $danhmucsp; ?></li>    
                <?php    
                }                
            ?>
            <div class="clear"></div>
        </ul> 
        <br />              
         <?php 
            if($querylx->num_rows() > 0)
            {
                $demdmsp=1;
                foreach($querylx->result() as $itemdm)
                {                   
                    $tenall=$itemdm->ten;                                                                                                    
                ?>  
                <div class="sanpham_item" <?php if($demdmsp%4==0){ ?> style="margin-right:0;" <?php } ?>>                                                   
                <?php 
                    if($itemdm->anh_thumb=='')
                    {
                        
                    }
                    else
                    {
                ?>                           
                <a class="sanpham_item_img" href="<?php echo site_url(LocDau($itemdm->ten).'-sp'.$itemdm->id.'.html');?>" title="<?php echo $tenall; ?>"><img src="<?php echo $itemdm->anh_thumb; ?>" alt="<?php echo $tenall; ?>" title="<?php echo $tenall; ?>" /></a>                                
                <?php 
                }
                ?>   
                <a href="<?php echo site_url(LocDau($itemdm->ten).'-sp'.$itemdm->id.'.html');?>" class="sanpham_item_name"><?php echo $tenall; ?></a>
                <p class="sanpham_item_gia">
                    Giá:&nbsp;
                        <?php 
                        if($itemdm->gia==0)
                        {
                        ?>
                        <span>Liên hệ</span>
                        <?php 
                        }
                        else
                        {
                        ?>
                        <span><?php echo number_format($itemdm->gia,0,'.','.')?>&nbsp;<?php echo $itemdm->donvitinh; ?></span>
                        <?php    
                        }
                        ?>
                    </p>
                    <div class="sanpham_item_read">
                        <a href="<?php echo site_url(LocDau($itemdm->ten).'-dh'.$itemdm->id.'.html'); ?>" title="<?php echo $itemdm->ten; ?>">Đặt hàng</a>
                    </div>                                                                                                                                                                                                 
        </div><!--End .box_sanpham-->   
            <?php 
            $demdmsp++;
            }
        }
        else
        {
        ?>
            <p style="text-align:center;color:#333;">Dữ liệu đang cập nhật</p>
        <?php    
        }
        ?>         
        <div style="padding:10px;"><?php echo $pagination;?></div>
        <div class="clear"></div>        
        <br />
        <?php 
            if(isset($loaixe))
            {
                $this->db->where('id',$loaixe);
                $sqltheh = $this->db->get('tblhang')->row();                                                                 
                $theheading=$sqltheh->theh;
                ?>
            <div class="theh_item" style="padding-top:10px;border-top:1px solid #ddd;">  
                <b style="display:block;border-bottom:1px solid #ddd;padding-bottom:10px;">Các từ khóa liên quan đến <?php echo $sqltheh->hang;?></b>
                <?php echo $theheading; ?>
            </div>    
            <?php          
            }
        ?>      
    </div>
    <div class="box_center_foo"></div>
    <div class="clear"></div>    
</div>    