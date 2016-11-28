<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.box_bccu').hover(function(){            
            jQuery(this).children().children('.info_hi').fadeIn();
        },function(){
            jQuery(this).children().children('.info_hi').fadeOut();
        });
    });   
</script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" id="vaotrong">
        <div class="box-right" style="margin-bottom:0;">
            <div class="box_right_top" style="margin-bottom:0;">                                        
                <h1 style="margin:0;">
                    <?php 
                        if(isset($dm))
                        {
                            $this->db->where('id',$dm);
                            $dmcon = $this->db->get('tbldanhmucsanpham')->row();                   
                            $danhmucsp=$dmcon->danhmucsanpham;                                                                                                                                                                         
                        ?>
                        <a href="<?php echo site_url(BoDau($dmcon->danhmucsanpham).'.html'); ?>" class="box_top_title"><?php echo $danhmucsp;?></a>                        
                        <?php 
                        }
                        if(isset($dm2))
                        {
                            $this->db->where('id',$dm2);
                            $dmcon2=$this->db->get('tbldanhmucsanpham2')->row();                    
                            $danhmucsp2=$dmcon2->danhmucsanphamcap2;                                           
                        ?>
                        <a href="<?php echo site_url(BoDau($dmcon2->danhmucsanphamcap2).'-dm2'.$dmcon2->id.'.html'); ?>" class="box_top_title">
                            <?php                
                                echo $danhmucsp2;
                            ?>
                        </a>
                        <?php    
                        }                        
                        if(isset($dmsp3))
                        {
                            $this->db->where('id',$dmsp3);
                            $dmcon3=$this->db->get('tbldanhmucsanpham3')->row();
                            $danhmucsp3=$dmcon3->danhmucsanphamcap3;
                            ?>
                            <a href="<?php echo site_url(BoDau($dmcon3->danhmucsanphamcap3).'-dm3'.$dmcon3->id.'.html'); ?>" class="cufont_text">
                                <?php                
                                    echo $danhmucsp3;
                                ?>
                            </a>
                            <?php 
                        }
                        if(isset($dmhang))
                        {
                            $this->db->where('id',$dmhang);
                            $hangdmcon=$this->db->get('tblhang')->row();
                            ?>
                            <a href="<?php echo site_url(LocDau($hangdmcon->hang).'-hang'.$hangdmcon->id.'.html'); ?>" class="box_top_title"><?php echo $hangdmcon->hang; ?></a>
                            <?php
                        }
                        if(isset($km))
                        {
                        ?>
                        <a href="<?php echo site_url('san-pham-khuyen-mai.html'); ?>" class="box_top_title">Sản phẩm khuyễn mại</a>
                        <?php
                        }
                        if(isset($giak))
                        {
                            $this->db->where('id',$giak);
                            $sqlkhoangiavi=$this->db->get('tblkhoanggia')->row();
                            ?>
                            <a href="<?php echo site_url('sanpham/locsp/'.$sqlkhoangiavi->id.'/'.url_title($sqlkhoangiavi->title).'.html'); ?>" class="box_top_title"><?php echo $sqlkhoangiavi->title; ?></a>
                            <?php
                        }
                        ?>
                    </h1>
                <div class="box_right_vien"></div>                                                                                     
            </div>
            <div class="box_right_main"> 
                <ul class="breadcrumb">              
                    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#205d9d;" class="fa fa-home"></i></a></li>
                    <?php 
                        if(isset($dm))
                        {
                        ?>
                        <li><a href="<?php echo site_url(LocDau($dmcon->danhmucsanpham).'-dm'.$dmcon->id.'.html') ?>" title="<?php echo $danhmucsp; ?>"><?php echo $danhmucsp; ?></a></li>    
                        <?php    
                        }
                        if(isset($dm2))
                        {
                            $this->db->where('id',$dm2);
                            $sqldm22=$this->db->get('tbldanhmucsanpham2')->row();
                            $this->db->where('id',$sqldm22->danhmucsanpham);
                            $sqldm34=$this->db->get('tbldanhmucsanpham')->row();
                        ?>
                        <li><a href="<?php echo site_url(LocDau($sqldm34->danhmucsanpham).'-dm'.$sqldm34->id.'.html'); ?>" title="<?php echo $sqldm34->danhmucsanpham; ?>"><?php echo $sqldm34->danhmucsanpham; ?></a></li>
                        <li class="active"><?php echo $danhmucsp2; ?></li>   
                        <?php                                   
                        }  
                        if(isset($dmhang))
                        {
                        ?>
                        <li class="active"><?php echo $hangdmcon->hang; ?></li>
                        <?php    
                        } 
                        if(isset($km))
                        {
                        ?>
                        <li class="active">Sản phẩm khuyễn mại</li>
                        <?php    
                        } 
                        if(isset($giak))
                        {
                        ?>
                        <li class="active"><?php echo $sqlkhoangiavi->title; ?></li>
                        <?php    
                        }
                    ?>
                    <div class="clear"></div>
                </ul>                                         
                 <?php 
                    if($query->num_rows() > 0)
                    {
                        ?>  
                        <div class="sanpham_mb">
                            <?php 
                                foreach ($query->result() as $itemsanphambyhomemb) {
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
                            $demsp=1;
                            foreach($query->result() as $itemsanphambc)
                            {
                            ?>                                             
                            <div class="sanpham_item" <?php if($demsp%5==0){?>style="margin-right:0;"<?php } ?>>
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
                            $demsp++;   
                            }
                            $query->free_result();
                            ?> 
                            </div>                                               
                        <?php
                    }
                    else
                    {
                    ?>
                        <p style="text-align:center;color:#fff;">Dữ liệu đang cập nhật</p>
                    <?php    
                    }
                ?>                
                <div class="clearfix"></div>         
                <div style="padding:10px;"><?php echo $pagination;?></div>
                <div class="clearfix"></div>                
                <?php 
                    if(isset($dm))
                    {
                        $this->db->where('id',$dm);
                        $sqltheh = $this->db->get('tbldanhmucsanpham')->row();                                                                 
                        $theheading=$sqltheh->theh;
                        ?>
                    <div class="theh_item" style="padding-top:10px;border-top:1px solid #ddd;">  
                        <b style="display:block;border-bottom:1px solid #ddd;padding-bottom:10px;">Từ khóa</b>
                        <?php echo $theheading; ?>
                    </div>    
                    <?php 
                    }
                    if(isset($dm2))
                    {
                        $this->db->where('id',$dm2);
                        $sqltheh = $this->db->get('tbldanhmucsanpham2')->row();                                                                 
                        $theheading=$sqltheh->theh;   
                        ?>
                        <div class="theh_item" style="padding-top:10px;border-top:1px solid #ddd;">  
                            <b style="display:block;border-bottom:1px solid #ddd;padding-bottom:10px;">Từ khóa</b>          
                            <?php echo $theheading; ?>
                        </div>  
                        <?php 
                    }
                ?>
                <br>                                                                                                                  
            </div>    
            <div class="clear"></div>    
        </div>
    </div>       
</div>