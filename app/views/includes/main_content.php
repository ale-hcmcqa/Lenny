<div clas="box_right">
    <div class="box_right_top">
        <p>Sản phẩm nổi bật</p>
        <div class="box_right_vien" style="width:93%;"></div>
    </div>
    <div class="box_right_main">
        <div class="sanpham_mb">
            <?php 
                $this->db->where('status',0);
                $this->db->where('noibat',1);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $this->db->limit(20);
                $sqlsanphamnoibat1=$this->db->get('tblsanpham');
                if($sqlsanphamnoibat1->num_rows()>0)
                {
                ?>
                <div class="jcarousel-wrapper">
                    <div class="jcarousela">
                        <ul>
                            <?php 
                                foreach ($sqlsanphamnoibat1->result() as $itemsanphamnoibat1) 
                                {                                    
                                ?>
                            <li>
                                <div class="sanpham_item" style="width:99%;margin:auto;">
                                    <?php 
                                    if($itemsanphamnoibat1->giakm!=0)
                                    {
                                        $giamgianbbc1=100-((($itemsanphamnoibat1->giakm)/($itemsanphamnoibat1->gia))*100);
                                    ?>
                                    <div class="sanpham_item_giam"><p>- <?php echo floor($giamgianbbc1); ?>% </p></div>
                                    <?php 
                                    }
                                ?>
                                <a href="<?php echo site_url(LocDau($itemsanphamnoibat1->ten).'-sp'.$itemsanphamnoibat1->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphamnoibat1->ten; ?>" alt="<?php echo $itemsanphamnoibat1->ten; ?>" src="<?php echo $itemsanphamnoibat1->anh_thumb; ?>"></a>
                                <a href="<?php echo site_url(LocDau($itemsanphamnoibat1->ten).'-sp'.$itemsanphamnoibat1->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphamnoibat1->ten,50); ?></a>
                                <p class="sanpham_item_gia">
                                    <?php 
                                        if($itemsanphamnoibat1->giakm!=0)
                                        {
                                            echo number_format($itemsanphamnoibat1->giakm,0,'.','.').'&nbsp;'.$itemsanphamnoibat1->donvitinh;
                                        }
                                        else
                                        {
                                            if($itemsanphamnoibat1->gia==0)
                                            {
                                                echo 'Liên hệ';
                                            }
                                            else
                                            {
                                                echo number_format($itemsanphamnoibat1->gia,0,'.','.').'&nbsp;'.$itemsanphamnoibat1->donvitinh;
                                            }
                                        }
                                    ?>
                                </p>
                                <p class="sanpham_item_phone">Điện thoại:&nbsp;<a href="tel:<?php echo $itemsanphamnoibat1->dienthoai; ?>"><?php echo $itemsanphamnoibat1->dienthoai; ?></a></p>
                                <?php 
                                    if($itemsanphamnoibat1->giakm!=0)
                                    {
                                        $tkimnb1=($itemsanphamnoibat1->gia) - ($itemsanphamnoibat1->giakm);
                                    ?>
                                    <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkimnb1,0,'.','.').'&nbsp;'.$itemsanphamnoibat1->donvitinh;?></p>
                                    <?php 
                                    }
                                ?>
                                </div>
                            </li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-preva"><img src="images/prevm.png"></a>
                    <a href="#" class="jcarousel-control-nexta"><img src="images/nextm.png"></a>
                </div>
                <?php 
                }
            ?>
        </div>
        <div class="sanpham_desk">
            <?php 
                $this->db->where('status',0);
                $this->db->where('noibat',1);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $this->db->limit(20);
                $sqlsanphamnoibat=$this->db->get('tblsanpham');
                if($sqlsanphamnoibat->num_rows()>0)
                {
                    $demnbcat=1;
                ?>
                <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">
                <?php 
                    foreach ($sqlsanphamnoibat->result() as $itemsanphamnoibat) 
                    {                    
                     if($demnbcat%2==1)
                     {
                    ?>
                     <li class="itemchay<?php echo $demnbcat; ?>">
                    <?php 
                        }
                    ?>
                    <div class="sanpham_item">
                        <?php 
                        if($itemsanphamnoibat->giakm!=0)
                        {
                            $giamgianbbc=100-((($itemsanphamnoibat->giakm)/($itemsanphamnoibat->gia))*100);
                        ?>
                        <div class="sanpham_item_giam"><p>- <?php echo floor($giamgianbbc); ?>% </p></div>
                        <?php 
                        }
                    ?>
                    <a href="<?php echo site_url(LocDau($itemsanphamnoibat->ten).'-sp'.$itemsanphamnoibat->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphamnoibat->ten; ?>" alt="<?php echo $itemsanphamnoibat->ten; ?>" src="<?php echo $itemsanphamnoibat->anh_thumb; ?>"></a>
                    <a href="<?php echo site_url(LocDau($itemsanphamnoibat->ten).'-sp'.$itemsanphamnoibat->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphamnoibat->ten,50); ?></a>
                    <p class="sanpham_item_gia">
                        <?php 
                            if($itemsanphamnoibat->giakm!=0)
                            {
                                echo number_format($itemsanphamnoibat->giakm,0,'.','.').'&nbsp;'.$itemsanphamnoibat->donvitinh;
                            }
                            else
                            {
                                if($itemsanphamnoibat->gia==0)
                                {
                                    echo 'Liên hệ';
                                }
                                else
                                {
                                    echo number_format($itemsanphamnoibat->gia,0,'.','.').'&nbsp;'.$itemsanphamnoibat->donvitinh;
                                }
                            }
                        ?>
                    </p>
                    <p class="sanpham_item_phone">Điện thoại:&nbsp;<?php echo $itemsanphamnoibat->dienthoai; ?></p>
                    <?php 
                        if($itemsanphamnoibat->giakm!=0)
                        {
                            $tkimnb=($itemsanphamnoibat->gia) - ($itemsanphamnoibat->giakm);
                        ?>
                        <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkimnb,0,'.','.').'&nbsp;'.$itemsanphamnoibat->donvitinh;?></p>
                        <?php 
                        }
                    ?>
                    </div>                    
                    <?php 
                        if($demnbcat%2==0)
                     {
                    ?>
                </li> 
                <?php 
                    }
                    $demnbcat++;
                    }
                ?>                                   
            <ul>
            <?php 
            }
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div clas="box_right">
    <div class="box_right_top">
        <p>Sản phẩm bán chạy</p>
        <div class="box_right_vien" style="width:93%;"></div>
    </div>
    <div class="box_right_main">
        <div class="sanpham_mb">
            <?php 
                $this->db->where('status',0);
                $this->db->where('banchay',1);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $this->db->limit(20);
                $sqlsanphambanchay2=$this->db->get('tblsanpham');
                if($sqlsanphambanchay2->num_rows()>0)
                {
                ?>
                <div class="jcarousel-wrapper">
                    <div class="jcarousela3">
                        <ul>
                            <?php 
                                foreach ($sqlsanphambanchay2->result() as $itemsanphambanchay2) 
                                {
                                ?>
                                <li>
                                    <div class="sanpham_item" style="width:99%;">
                                        <?php 
                                        if($itemsanphambanchay2->giakm!=0)
                                        {
                                            $giamgiatbc2=100-((($itemsanphambanchay2->giakm)/($itemsanphambanchay2->gia))*100);
                                        ?>
                                        <div class="sanpham_item_giam"><p>- <?php echo floor($giamgiatbc2); ?>% </p></div>
                                        <?php 
                                        }
                                    ?>
                                    <a href="<?php echo site_url(LocDau($itemsanphambanchay2->ten).'-sp'.$itemsanphambanchay2->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphambanchay2->ten; ?>" alt="<?php echo $itemsanphambanchay2->ten; ?>" src="<?php echo $itemsanphambanchay2->anh_thumb; ?>"></a>
                                    <a href="<?php echo site_url(LocDau($itemsanphambanchay2->ten).'-sp'.$itemsanphambanchay2->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphambanchay2->ten,50); ?></a>
                                    <p class="sanpham_item_gia">
                                        <?php 
                                            if($itemsanphambanchay2->giakm!=0)
                                            {
                                                echo number_format($itemsanphambanchay2->giakm,0,'.','.').'&nbsp;'.$itemsanphambanchay2->donvitinh;
                                            }
                                            else
                                            {
                                                if($itemsanphambanchay2->gia==0)
                                                {
                                                    echo 'Liên hệ';
                                                }
                                                else
                                                {
                                                    echo number_format($itemsanphambanchay2->gia,0,'.','.').'&nbsp;'.$itemsanphambanchay2->donvitinh;
                                                }
                                            }
                                        ?>
                                    </p>
                                    <p class="sanpham_item_phone">Điện thoại:&nbsp;<a href="tel:<?php echo $itemsanphambanchay2->dienthoai; ?>"><?php echo $itemsanphambanchay2->dienthoai; ?></a></p>
                                    <?php 
                                        if($itemsanphambanchay2->giakm!=0)
                                        {
                                            $tkimtot2=($itemsanphambanchay2->gia) - ($itemsanphambanchay2->giakm);
                                        ?>
                                        <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkimtot2,0,'.','.').'&nbsp;'.$itemsanphambanchay2->donvitinh;?></p>
                                        <?php 
                                        }
                                    ?>
                                    </div>
                                </li>
                                <?php
                                }
                                $sqlsanphambanchay2->free_result();
                            ?>                            
                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-preva3"><img src="images/prevm.png"></a>
                        <a href="#" class="jcarousel-control-nexta3"><img src="images/nextm.png"></a>
                </div>
                <?php 
                }
            ?>
        </div>
        <div class="sanpham_desk">
        <?php 
            $this->db->where('status',0);
            $this->db->where('banchay',1);
            $this->db->order_by('ordernum','desc');
            $this->db->order_by('id','desc');
            $this->db->limit(20);
            $sqlsanphambanchay=$this->db->get('tblsanpham');
            if($sqlsanphambanchay->num_rows()>0)
            {
                $dembccat=1;
            ?>
            <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">
            <?php 
                foreach ($sqlsanphambanchay->result() as $itemsanphamtot) 
                {                    
                 if($dembccat%2==1)
                 {
                ?>
                 <li class="itemchay<?php echo $dembccat; ?>">
                <?php 
                    }
                ?>
                <div class="sanpham_item">
                    <?php 
                    if($itemsanphamtot->giakm!=0)
                    {
                        $giamgiatbc=100-((($itemsanphamtot->giakm)/($itemsanphamtot->gia))*100);
                    ?>
                    <div class="sanpham_item_giam"><p>- <?php echo floor($giamgiatbc); ?>% </p></div>
                    <?php 
                    }
                ?>
                <a href="<?php echo site_url(LocDau($itemsanphamtot->ten).'-sp'.$itemsanphamtot->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphamtot->ten; ?>" alt="<?php echo $itemsanphamtot->ten; ?>" src="<?php echo $itemsanphamtot->anh_thumb; ?>"></a>
                <a href="<?php echo site_url(LocDau($itemsanphamtot->ten).'-sp'.$itemsanphamtot->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphamtot->ten,50); ?></a>
                <p class="sanpham_item_gia">
                    <?php 
                        if($itemsanphamtot->giakm!=0)
                        {
                            echo number_format($itemsanphamtot->giakm,0,'.','.').'&nbsp;'.$itemsanphamtot->donvitinh;
                        }
                        else
                        {
                            if($itemsanphamtot->gia==0)
                            {
                                echo 'Liên hệ';
                            }
                            else
                            {
                                echo number_format($itemsanphamtot->gia,0,'.','.').'&nbsp;'.$itemsanphamtot->donvitinh;
                            }
                        }
                    ?>
                </p>
                <p class="sanpham_item_phone">Điện thoại:&nbsp;<?php echo $itemsanphamtot->dienthoai; ?></p>
                <?php 
                    if($itemsanphamtot->giakm!=0)
                    {
                        $tkimtot=($itemsanphamtot->gia) - ($itemsanphamtot->giakm);
                    ?>
                    <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkimtot,0,'.','.').'&nbsp;'.$itemsanphamtot->donvitinh;?></p>
                    <?php 
                    }
                ?>
                </div>                    
                <?php 
                    if($dembccat%2==0)
                 {
                ?>
            </li> 
            <?php 
                }
                $dembccat++;
                }
            ?>                                   
        <ul>
        <?php 
        }
        ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div clas="box_right">
    <div class="box_right_top">
        <p>Sản phẩm mới</p>
        <div class="box_right_vien" style="width:93%;"></div>
    </div>
    <div class="box_right_main">
        <div class="sanpham_mb">
            <?php 
                $this->db->where('status',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $this->db->limit(20);
                $sqlsanphammoi2=$this->db->get('tblsanpham');
                if($sqlsanphammoi2->num_rows()>0)
                {
                ?>
                <div class="jcarousel-wrapper">
                    <div class="jcarousel1">
                        <ul>
                            <?php 
                                foreach ($sqlsanphammoi2->result() as $itemsanphammoi2) 
                                {
                                ?>
                                <li>
                                    <div class="sanpham_item" style="width:99%;margin:auto;">
                                        <?php 
                                        if($itemsanphammoi2->giakm!=0)
                                        {
                                            $giamgiabcghjk=100-((($itemsanphammoi2->giakm)/($itemsanphammoi2->gia))*100);
                                        ?>
                                        <div class="sanpham_item_giam"><p>- <?php echo floor($giamgiabcghjk); ?>% </p></div>
                                        <?php 
                                        }
                                    ?>
                                    <a href="<?php echo site_url(LocDau($itemsanphammoi2->ten).'-sp'.$itemsanphammoi2->id.'.html'); ?>" class="sanpham_item_img"><img title="<?php echo $itemsanphammoi2->ten; ?>" alt="<?php echo $itemsanphammoi2->ten; ?>" src="<?php echo $itemsanphammoi2->anh_thumb; ?>"></a>
                                    <a href="<?php echo site_url(LocDau($itemsanphammoi2->ten).'-sp'.$itemsanphammoi2->id.'.html'); ?>" class="sanpham_item_name"><?php echo catchuoi($itemsanphammoi2->ten,50); ?></a>
                                    <p class="sanpham_item_gia">
                                        <?php 
                                            if($itemsanphammoi2->giakm!=0)
                                            {
                                                echo number_format($itemsanphammoi2->giakm,0,'.','.').'&nbsp;'.$itemsanphammoi2->donvitinh;
                                            }
                                            else
                                            {
                                                if($itemsanphammoi2->gia==0)
                                                {
                                                    echo 'Liên hệ';
                                                }
                                                else
                                                {
                                                    echo number_format($itemsanphammoi2->gia,0,'.','.').'&nbsp;'.$itemsanphammoi2->donvitinh;
                                                }
                                            }
                                        ?>
                                    </p>
                                    <p class="sanpham_item_phone">Điện thoại:&nbsp;<a href="tel:<?php echo $itemsanphammoi2->dienthoai; ?>"><?php echo $itemsanphammoi2->dienthoai; ?></a></p>
                                    <?php 
                                        if($itemsanphammoi2->giakm!=0)
                                        {
                                            $tkim2=($itemsanphammoi2->gia) - ($itemsanphammoi2->giakm);
                                        ?>
                                        <p class="sanpham_tk">Tiết kiệm:&nbsp;<?php echo number_format($tkim2,0,'.','.').'&nbsp;'.$itemsanphammoi2->donvitinh;?></p>
                                        <?php 
                                        }
                                    ?>
                                    </div>    
                                </li>
                                <?php
                                }
                            ?>                            
                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-prev1"><img src="images/prevm.png"></a>
                    <a href="#" class="jcarousel-control-next1"><img src="images/nextm.png"></a>
                </div>
                <?php 
                }
            ?>
        </div>
        <div class="sanpham_desk">
            <?php 
                $this->db->where('status',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $this->db->limit(20);
                $sqlsanphammoi=$this->db->get('tblsanpham');
                if($sqlsanphammoi->num_rows()>0)
                {
                    $demmoicat=1;
                ?>
                <ul id="second-carousel" class="first-and-second-carousel jcarousel-skin-ie7">
                    <?php 
                        foreach ($sqlsanphammoi->result() as $itemsanphambc) 
                        {                    
                         if($demmoicat%2==1)
                         {
                        ?>
                         <li class="itemchay<?php echo $demmoicat; ?>">
                        <?php 
                            }
                        ?>
                        <div class="sanpham_item">
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
                        <p class="sanpham_item_phone">Điện thoại:&nbsp;<?php echo $itemsanphambc->dienthoai; ?></p>
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
                            if($demmoicat%2==0)
                         {
                        ?>
                    </li> 
                    <?php 
                        }
                        $demmoicat++;
                        }
                    ?>                                   
                <ul>
                <?php 
                }
                ?>
        </div>    
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>