<ol class="breadcrumb" style="margin-bottom:0;margin-top:-10px;">
    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
    <li class="active">Điện thoại</li>
</ol>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="hangtete" style="padding-right:0;padding-top:10px;padding-bottom:15px;">
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Hãng sản xuất</p>
    		</div>
    		<div class="box_hang_main">
    			<?php 
    				$this->db->where('status',0);
    				$this->db->order_by('ordernum','desc');
    				$this->db->order_by('id','desc');
    				$sqlhangleft=$this->db->get('tblhang');
    				if ($sqlhangleft->num_rows()>0) 
    				{
    				?>
    				<ul class="ul_hang">
    					<?php 
    						foreach ($sqlhangleft->result() as $itemhangleft) 
    						{
    						?>
    						<li><a <?php 
                            if(isset($dmhang))
                            {
                                if($itemhangleft->id==$dmhang)
                                { 
                                    ?>
                                    style="color:#a9302a;font-weight:bold;"
                                    <?php 
                                }
                            }
                            elseif(isset($dmhangkm))
                            {
                                if($itemhangleft->id==$dmhangkm)
                                { 
                                    ?>
                                    style="color:#a9302a;font-weight:bold;"
                                    <?php 
                                }    
                            }
                            elseif(isset($dmhangpt)) 
                            {
                                if($itemhangleft->id==$dmhangpt)
                                { 
                                    ?>
                                    style="color:#a9302a;font-weight:bold;"
                                    <?php 
                                }      
                            }
                            elseif (isset($dmhangcc)) 
                            {
                                if($itemhangleft->id==$dmhangcc)
                                { 
                                    ?>
                                    style="color:#a9302a;font-weight:bold;"
                                    <?php 
                                }     
                            }
                            ?> 
                            href="<?php echo site_url(LocDau($itemhangleft->hang).'-hang'.$itemhangleft->id.'.html'); ?>" title="<?php echo $itemhangleft->hang; ?>"><?php echo $itemhangleft->hang; ?></a></li>
    						<?php
    						}
    						$sqlhangleft->free_result();
    					?>
    				</ul>
    				<?php
    				}
    			?>    			
    		</div>
    	</div>
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Khoảng giá</p>
    		</div>
    		<div class="box_hang_main">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlkhoanggia=$this->db->get('tblkhoanggia');
                    if($sqlkhoanggia->num_rows()>0)
                    {
                    ?>
                    <ul class="ul_hang">
                        <?php 
                            foreach ($sqlkhoanggia->result() as $itemkhoanggia) 
                            {
                            ?>
                            <li><a 
                                <?php 
                                    if (isset($giak)) 
                                    {
                                        if($itemkhoanggia->id==$giak)
                                        {
                                        ?>
                                        style="color:#a9302a;font-weight:bold;"
                                        <?php    
                                        }
                                    }
                                ?>
                                href="<?php echo site_url('sanpham/locsp/'.$itemkhoanggia->id.'/'.url_title($itemkhoanggia->title).'.html'); ?>" title="<?php echo $itemkhoanggia->title; ?>"><?php echo $itemkhoanggia->title; ?></a></li>
                            <?php
                            }
                            $sqlkhoanggia->free_result();
                        ?>                        
                    </ul>
                    <?php    
                    }
                ?>    			
    		</div>
    	</div>
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Màu sắc</p>
    		</div>
    		<div class="box_hang_main">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlmausac=$this->db->get('tblmausac');
                    if ($sqlmausac->num_rows()>0) 
                    {
                    ?>
                    <ul class="ul_hang" style="max-height: 140px;overflow: auto;">
                        <?php 
                            foreach ($sqlmausac->result() as $itemmausac) 
                            {
                            ?>
                            <li><a href="<?php echo site_url('sanpham/mausac/'.$itemmausac->id.'/'.url_title($itemmausac->tenmau).'.html'); ?>" title="<?php echo $itemmausac->tenmau; ?>"><?php echo $itemmausac->tenmau; ?></a></li>
                            <?php
                            }
                            $sqlmausac->free_result();
                        ?>
                    </ul>
                    <?php
                    }
                ?>    			
    		</div>
    	</div>
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Phong cách</p>
    		</div>
    		<div class="box_hang_main">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlphongcach=$this->db->get('tblphongcach');
                    if($sqlphongcach->num_rows()>0)
                    {
                    ?>
                    <ul class="ul_hang" style="max-height: 140px;overflow: auto;">
                        <?php 
                            foreach ($sqlphongcach->result() as $itemphongcach) 
                            {
                            ?>
                            <li><a 
                                <?php 
                                    if (isset($dmph)) 
                                    {
                                       if($itemphongcach->id==$dmph)
                                       {
                                       ?>
                                       style="font-weight:bold;color:#a9302a;"
                                       <?php 
                                       }
                                    }
                                ?>
                                href="<?php echo site_url('sanpham/phongcach/'.$itemphongcach->id.'/'.url_title($itemphongcach->phongcach).'.html'); ?>" title="<?php echo $itemphongcach->phongcach; ?>"><?php echo $itemphongcach->phongcach; ?></a></li>
                            <?php
                            }
                            $sqlphongcach->free_result();
                        ?>
                    </ul>
                    <?php    
                    }
                ?>    			
    		</div>
    	</div>
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Kiểu dáng</p>
    		</div>
    		<div class="box_hang_main">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlkieudang=$this->db->get('tblkieudang');
                    if ($sqlkieudang->num_rows()>0) 
                    {
                    ?>
                    <ul class="ul_hang">
                        <?php 
                            foreach ($sqlkieudang->result() as $itemkieudang) 
                            {
                            ?>
                            <li><a 
                                <?php 
                                    if(isset($dmkd))
                                    {
                                        if($itemkieudang->id==$dmkd)
                                        {
                                        ?>
                                        style="font-weight:bold;color:#a9302a;"
                                        <?php    
                                        }
                                    }
                                ?>
                                href="<?php echo site_url('sanpham/kieudang/'.$itemkieudang->id.'/'.url_title($itemkieudang->kieudang).'.html'); ?>" title="<?php echo $itemkieudang->kieudang; ?>"><?php echo $itemkieudang->kieudang; ?></a></li>
                            <?php
                            }
                            $sqlkieudang->free_result();
                        ?>
                    </ul>
                    <?php
                    }
                ?>    			
    		</div>
    	</div>
    	<div class="box_hang">
    		<div class="box_hang_top">
    			<p>Chức năng</p>
    		</div>
    		<div class="box_hang_main">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlchucnang=$this->db->get('tblchucnang');
                    if($sqlchucnang->num_rows()>0)
                    {
                    ?>
                    <ul class="ul_hang">
                        <?php 
                            foreach ($sqlchucnang->result() as $itemchucnang) 
                            {
                            ?>
                            <li><a href="" title="<?php echo $itemchucnang->chucnang; ?>"><?php echo $itemchucnang->chucnang; ?></a></li>
                            <?php
                            }
                            $sqlchucnang->free_result();
                        ?>
                    </ul>
                    <?php    
                    }
                ?>    			
    		</div>
    	</div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="padding-top:10px;">
        <div class="image_top">
            <img src="images/vyd1459246283.jpg">
        </div>
        <div class="pro_cat_list">
            <div class="pro_cat_filter">
                <ul>                    
                    <?php 
                        if(isset($dm))
                        {
                            $this->db->where('id',$dm);
                            $sqldmspd=$this->db->get('tbldanhmucsanpham')->row();
                        ?>
                        <li style="padding-left:10px;"><strong>Sắp xếp theo:</strong></li>
                        <li><a href="<?php echo site_url('sanpham/sapxepgiamdan/'.$dm.'/'.url_title($sqldmspd->danhmucsanpham).'.html'); ?>" title="Giá cao đến thấp"><img title="Giá cao đến thấp" alt="Giá cao đến thấp" src="images/icon_list_proso.png">&nbsp;Giá cao đến thấp</a></li>
                        <li><a href="<?php echo site_url('sanpham/sapxeptangdan/'.$dm.'/'.url_title($sqldmspd->danhmucsanpham).'.html'); ?>" title="Giá thấp đến cao"><img title="Giá thấp đến cao" alt="Giá thấp đến cao" src="images/icon_list_proso.png">&nbsp;Giá thấp đến cao</a></li>
                        <?php 
                        }
                        if(isset($dmhang))
                        {
                            $this->db->where('id',$dmhang);
                            $sqlhangsp=$this->db->get('tblhang')->row();
                        ?>
                        <li style="padding-left:10px;"><strong>Sắp xếp theo:</strong></li>
                        <li><a href="<?php echo site_url('sanpham/sapxepgiamdanh/'.$dmhang.'/'.url_title($sqlhangsp->hang).'.html'); ?>" title="Giá cao đến thấp"><img title="Giá cao đến thấp" alt="Giá cao đến thấp" src="images/icon_list_proso.png">&nbsp;Giá cao đến thấp</a></li>
                        <li><a href="<?php echo site_url('sanpham/sapxeptangdanh/'.$dmhang.'/'.url_title($sqlhangsp->hang).'.html'); ?>" title="Giá thấp đến cao"><img title="Giá thấp đến cao" alt="Giá thấp đến cao" src="images/icon_list_proso.png">&nbsp;Giá thấp đến cao</a></li>
                        <?php    
                        }
                        if (isset($dmhangkm)) 
                        {
                           $this->db->where('id',$dmhangkm);
                           $sqlhangkmsp=$this->db->get('tblhang')->row();
                           ?>
                           <li style="padding-left:10px;"><strong>Sắp xếp theo:</strong></li>
                           <li><a href="<?php echo site_url('sanpham/sapxepgiamdankm/'.$dmhangkm.'/'.url_title($sqlhangkmsp->hang).'.html'); ?>" title="Giá cao đến thấp"><img title="Giá cao đến thấp" alt="Giá cao đến thấp" src="images/icon_list_proso.png">&nbsp;Giá cao đến thấp</a></li>
                           <li><a href="<?php echo site_url('sanpham/sapxeptangdankm/'.$dmhangkm.'/'.url_title($sqlhangkmsp->hang).'.html'); ?>" title="Giá thấp đến cao"><img title="Giá thấp đến cao" alt="Giá thấp đến cao" src="images/icon_list_proso.png">&nbsp;Giá thấp đến cao</a></li>
                           <?php
                        }
                        if (isset($dmhangpt)) 
                        {
                           $this->db->where('id',$dmhangpt);
                           $sqlhangptsp=$this->db->get('tblhang')->row();
                           ?>
                           <li style="padding-left:10px;"><strong>Sắp xếp theo:</strong></li>
                           <li><a href="<?php echo site_url('sanpham/sapxepgiamdanpt/'.$dmhangpt.'/'.url_title($sqlhangptsp->hang).'.html'); ?>" title="Giá cao đến thấp"><img title="Giá cao đến thấp" alt="Giá cao đến thấp" src="images/icon_list_proso.png">&nbsp;Giá cao đến thấp</a></li>
                           <li><a href="<?php echo site_url('sanpham/sapxeptangdanpt/'.$dmhangpt.'/'.url_title($sqlhangptsp->hang).'.html'); ?>" title="Giá thấp đến cao"><img title="Giá thấp đến cao" alt="Giá thấp đến cao" src="images/icon_list_proso.png">&nbsp;Giá thấp đến cao</a></li>
                           <?php
                        }
                        if (isset($dmhangcc)) 
                        {
                           $this->db->where('id',$dmhangcc);
                           $sqlhangccsp=$this->db->get('tblhang')->row();
                           ?>
                           <li style="padding-left:10px;"><strong>Sắp xếp theo:</strong></li>
                           <li><a href="<?php echo site_url('sanpham/sapxepgiamdancc/'.$dmhangcc.'/'.url_title($sqlhangccsp->hang).'.html'); ?>" title="Giá cao đến thấp"><img title="Giá cao đến thấp" alt="Giá cao đến thấp" src="images/icon_list_proso.png">&nbsp;Giá cao đến thấp</a></li>
                           <li><a href="<?php echo site_url('sanpham/sapxeptangdancc/'.$dmhangcc.'/'.url_title($sqlhangccsp->hang).'.html'); ?>" title="Giá thấp đến cao"><img title="Giá thấp đến cao" alt="Giá thấp đến cao" src="images/icon_list_proso.png">&nbsp;Giá thấp đến cao</a></li>
                           <?php
                        }
                        if(isset($locsptt))
                        {
                        ?>
                        <li style="padding-left:10px;"><strong>Lọc theo giá:</strong></li>
                        <?php    
                        }
                        if(isset($phongcachh))
                        {
                        ?>
                        <li style="padding-left:10px;"><strong>Phong cách</strong></li>
                        <?php    
                        }
                        if (isset($kieudangh)) 
                        {
                        ?>
                        <li style="padding-left:10px;"><strong>Kiểu dáng</strong></li>
                        <?php
                        }
                        if(isset($cucu))
                        {
                        	if(isset($pcu))
                        	{
                        		$this->db->where('id',$pcu);
                        		$sqlmsky=$this->db->get('tblmausac')->row();
                        	}
                        ?>
                        <li style="padding-left:10px;"><strong>Màu sắc</strong> - <?php echo $sqlmsky->tenmau; ?></li>
                        <?php	
                        }
                    ?>
                    <li id="catco"><span><strong><?php echo $query->num_rows(); ?>&nbsp;sản phẩm</strong></span></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="pro_cat_main">                
                <div class="row">
                    <?php
                        if($query->num_rows()>0)
                        {
                            foreach ($query->result() as $itemsanphama) 
                            { 
                            	$this->db->where('id',$itemsanphama->sanpham);
                            	$itemsanphamkhuyenmai=$this->db->get('tblsanpham')->row();                    
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="sanpham_item" onmouseover='showtip("<div style=\"width:250px;\"><div style=\"background:#ed1c24;height:35px;line-height:35px;width:100%;line-height:35px;padding-left:10px;font-size:12px;font-weight:bold;color:#fff;\"><?php echo $itemsanphamkhuyenmai->ten; ?></div><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Giá:</strong>&nbsp;<span style=\"color:red;\"><?php if($itemsanphamkhuyenmai->gia==0){ echo 'Liên hệ';}else{ echo number_format($itemsanphamkhuyenmai->gia,0,'.','.').'&nbsp;'.$itemsanphamkhuyenmai->donvitinh;}?></span></p><p style=\"text-align:left;padding-top:9px;padding-left:10px;margin-bottom:0;\"><strong>Bảo hành:&nbsp;</strong><?php echo $itemsanphamkhuyenmai->baohanh; ?></p><?php if(($itemsanphamkhuyenmai->khuyenmai1=='')&&($itemsanphamkhuyenmai->khuyenmai2=='')&&($itemsanphamkhuyenmai->khuyenmai3=='')&&($itemsanphamkhuyenmai->khuyenmai4=='')&&($itemsanphamkhuyenmai->khuyenmai5=='')){}else{ ?><p style=\"text-align:left;padding-top:9px;padding-left:10px;\"><strong>Khuyễn mại:&nbsp;</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai1; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai2; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai3; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai4; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->khuyenmai5; ?></span><?php } ?><p style=\"border-top:1px solid #ddd;margin-top:10px;;text-align:left;padding-top:9px;padding-left:10px;\"><strong>Thông tin</strong></p><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->chip; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->ram; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->pin; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->hedieuhanh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;\"><?php echo $itemsanphamkhuyenmai->manhinh; ?></span><span style=\"display:block;padding-left:10px;text-align:left;font-size:12px;color:#000;font-weight:normal;padding-bottom:10px;\"><?php echo $itemsanphamkhuyenmai->camera; ?></span></div>");' onmouseout="hidetip();">
                                    <?php 
                                        if($itemsanphamkhuyenmai->khuyenmai==1)
                                        {
                                        ?>
                                        <div class="pro_gif"></div>
                                        <?php 
                                        }
                                    ?>
                                    <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-sp'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_img" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><img src="<?php echo $itemsanphamkhuyenmai->anh_thumb; ?>" title="<?php echo $itemsanphamkhuyenmai->ten; ?>" alt="<?php echo $itemsanphamkhuyenmai->ten; ?>"></a>
                                    <a href="<?php echo site_url(LocDau($itemsanphamkhuyenmai->ten).'-sp'.$itemsanphamkhuyenmai->id.'.html'); ?>" class="sanpham_item_name" title="<?php echo $itemsanphamkhuyenmai->ten; ?>"><?php echo $itemsanphamkhuyenmai->ten; ?></a>
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
                            $query->free_result();
                        }
                        else
                        {
                        ?>
                        <p style="text-align:center;color:#333;padding-top:20px;font-size:12px;">Dữ liệu đang cập nhật</p>
                        <?php    
                        }
                    ?>
                    <div class="clearfix"></div>         
                    <div style="padding:10px;margin-left:15px;"><?php echo $pagination;?></div>
                </div>
            </div>
        </div>
    </div>
</div>