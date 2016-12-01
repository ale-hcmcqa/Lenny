<script type="text/javascript" src="js/fresco/fresco.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.danhmuc_item:first').css('display','block'); 
        $('.fa_tab').click(function(){
            var name=$(this).attr('title');                            
            $('.danhmuc_item').css('display','none');                            
             $('#'+name).css('display','block');
             $('.fa_tab').removeClass('active');
             $(this).addClass('active');    
        });                             
    });
</script> 
<?php $rows = $query;?>
<div class="box_right" style="margin-bottom:0;">
    <div class="box_right_top" style="margin-bottom:0;">                                                    
        <a href=""><?php echo $rows->ten; ?></a> 
        <div class="box_right_vien"></div>                                                                                   
    </div>                  
    <div class="box_right_main">    
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            <?php 
                $this->db->where('id',$rows->id);
                $sqlsanphambyctid=$this->db->get('tblsanpham')->row();
                $this->db->where('id',$sqlsanphambyctid->danhmucsanpham);
                $sqldanhmucsp1ct=$this->db->get('tbldanhmucsanpham');
                if($sqldanhmucsp1ct->num_rows()>0)
                {
                    $sqldanhmucsp1ct=$sqldanhmucsp1ct->row();
                ?>
                <li><a href="<?php echo site_url(LocDau($sqldanhmucsp1ct->danhmucsanpham).'-dm'.$sqldanhmucsp1ct->id.'.html'); ?>" title="<?php echo $sqldanhmucsp1ct->danhmucsanpham;?>"><?php echo $sqldanhmucsp1ct->danhmucsanpham;?></a></li>
                <?php    
                }
                $this->db->where('id',$sqlsanphambyctid->danhmucsanphamcap2);
                $sqldanhmucsp2ct=$this->db->get('tbldanhmucsanpham2');
                if($sqldanhmucsp2ct->num_rows()>0)
                {
                    $sqldanhmucsp2ct=$sqldanhmucsp2ct->row();     
                ?>
                <li><a href="<?php echo site_url(BoDau($sqldanhmucsp2ct->danhmucsanphamcap2).'-dm2'.$sqldanhmucsp2ct->id.'.html'); ?>" title="<?php echo $sqldanhmucsp2ct->danhmucsanphamcap2; ?>"><?php echo $sqldanhmucsp2ct->danhmucsanphamcap2; ?></a></li>
                <?php
                }                           
            ?>
            <li class="active"><?php echo $rows->ten; ?></li>
            <div class="clear"></div>
        </ul>                              
        <div id="item_sp">
            <?php                  
                $tenct=$rows->ten;                
                $noidungct=$rows->noidung;                                                                 
            ?>                    
            <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div id="item_img">
                            <div class="demonstrations">
                            <div id="content_box" class="gallery clearfix">
                                <img src="<?php echo $rows->anh; ?>" alt="<?php echo $tenct; ?>" title="<?php echo $tenct; ?>" style="max-width:100%;"/>
                                <a href="<?php echo $rows->anh; ?>" id="zoom" class='fresco' data-fresco-group='example' data-fresco-caption="<?php echo $rows->ten; ?>">Xem ảnh lớn hơn</a>                                 
                            </div>
                        </div>
                        </div>                    
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div id="item_name">
                            <h1><?php echo $tenct; ?></h1>                                                                                         
                            <div id="time" style="border-bottom:1px solid #e2e2e2;">
                                Ngày đăng:&nbsp;
                                <?php
                                    $datesp=explode('-',$rows->ngaydang); 
                                    echo $datesp[2].'-'.$datesp[1].'-'.$datesp[0]; 
                                ?>                    
                                &nbsp;|&nbsp;<?php echo $rows->giodang; ?>&nbsp;|&nbsp;<?php echo $rows->view; ?> View | Người đăng:&nbsp;<?php echo $rows->nguoidang; ?>
                            </div>
                            <?php 
                                if($rows->ma!='')
                                {
                                ?>
                                <p><strong>Mã SP</strong>:&nbsp;<?php echo $rows->ma; ?></p>                            
                                <?php
                                }                                 
                            ?>                            
                            <p><strong>Danh mục sản phẩm</strong>:&nbsp;
                            <?php 
                            $this->db->where('id',$rows->danhmucsanpham);
                            $sqldanhmucspct=$this->db->get('tbldanhmucsanpham');
                            if($sqldanhmucspct->num_rows()>0)
                            {
                                echo $sqldanhmucspct->row()->danhmucsanpham;   
                            }
                            ?></p>                             
                            <p style="margin-bottom:0;"><strong>Giá</strong>:&nbsp;
                            <?php 
                                if($rows->gia==0)
                                {
                                ?>
                                <span style="font-size:20px;color:red;">Liên hệ</span>
                                <?php 
                                }
                                else
                                {
                                ?>
                                <span style="font-size:20px;color:red;<?php if($rows->giakm!=0){?>text-decoration: line-through;<?php }?>"><?php echo number_format($rows->gia,0,'.','.')?>&nbsp;<?php echo $rows->donvitinh; ?></span>
                                <?php    
                                }
                                ?>
                            </p>
                            <?php 
                                if($rows->giakm!=0)
                                {
                                ?>
                                <p style="border-bottom:1px solid #ddd;"><strong>Giá khuyễn mại:</strong>&nbsp;<span style="font-size:20px;color:red;"><?php echo number_format($rows->giakm,0,'.','.').'&nbsp;'.$rows->donvitinh; ?></span></p>                            
                                <?php 
                                }
                            ?>
                            <p style="border-bottom:1px solid #ddd;"><strong>Điện thoại:</strong>&nbsp;<span style="font-size:20px;color:red;"><a href="tel:<?php echo $rows->dienthoai; ?>"><?php echo $rows->dienthoai; ?></a></span></p>                            
							<div id="dathang_con_ct">
								<div id="labelquantityinput">Số lượng</div>
                                <input type="text" name="soluong" id="soluong" value="1" />
								<div id="labelsizeinput">Kích thước</div>
								<select id="kichthuoc">
								  <option value="S">S</option>
								  <option value="M" selected="selected">M</option >
								  <option value="L">L</option>
								  <option value="XL">XL</option>
								  <option value="XXL">XXL</option>
								</select>
								<a style="cursor: pointer; background:#f51b1b !important;" id="muangay" class="btnr" title="<?php echo $rows->ten; ?>"><font color="white">Mua ngay</font></a>
								<a style="cursor: pointer;" id="dathangnao" class="btnr" title="<?php echo $rows->ten; ?>">Thêm vào giỏ hàng</a>
                                <input type="hidden" value="<?php echo $rows->id;?>" id="idpro" name="order_name"/>
                                <script type="text/javascript">
                                    function CheckNumber() {
                                        var reg = /^\d+$/;
                                        if (!reg.test($("#soluong").val())) {
                                            alert("Số lượng không hợp lệ");
                                            $("#soluong").val("1");
                                            return false;
                                        }
                                        if ((parseInt($("#soluong").val(), 10) <= 0)) {
                                            alert("Số lượng không hợp lệ, số lượng phải là một số nguyên lớn hơn 0");
                                            return false;
                                        }
                                        return true;
                                    }
                                  jQuery(document).ready(function(){
                                   jQuery("#dathangnao").click(function(){
                                    var soluong =$('#soluong').val();
									var kichthuoc =$('#kichthuoc').val();								
                                    var id =$('#idpro').val() + '_' + kichthuoc;								
                                    if (!CheckNumber())
                                            return;
                                    jQuery.ajax({
                                     cache: false,
                                     type:"POST",
                                    data:{soluong : soluong,id : id},
                                     url:"<?php echo site_url('sanpham/addorder_pro/');?>",
                                     success:function(html){
                                      alert('Sản phẩm đã được thêm vào giỏ hàng');
                                        window.location.reload();                                    
                                     }
                                    });
                                   });
								   
                                  });
							      jQuery(document).ready(function(){
                                   jQuery("#muangay").click(function(){
                                    var soluong =$('#soluong').val();
									var kichthuoc =$('#kichthuoc').val();								
                                    var id =$('#idpro').val() + '_' + kichthuoc;								
                                    if (!CheckNumber())
                                            return;
                                    jQuery.ajax({
                                     cache: false,
                                     type:"POST",
                                    data:{soluong : soluong,id : id},
                                     url:"<?php echo site_url('sanpham/addorder_pro/');?>",
									 success:function(html){
                                        window.location.href = 'sanpham/thanhtoan/';
                                     }
                                    });
                                   });
								   
                                  });
                                 </script>
                                <div class="clearfix"></div>
                            </div>                                                                                                                                                                                                                                                                                                                                                
                        </div>
                    </div>                  
            </div>          
            <div class="clear"></div>                                 
            <div id="tab_new">
                <div id="tab_top">
                    <ul class="ul_tab_news" class="tab">
                        <li><a class="fa_tab active" title="item_1">Thông tin chung</a></li>
                        <li><a class="fa_tab" title="item_2">Thông số kỹ thuật</a></li>                                                                               
                    </ul>
                </div>
                <div id="tab_main">
                    <div id="item_1" class="danhmuc_item" style="display:none;">                            
                        <?php echo $rows->tomtat; ?>
                        <div class="clearfix"></div>
                    </div>
                    <div id="item_2" class="danhmuc_item" style="display:none;">
                        <?php echo $rows->noidung; ?>    
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>    
                </div>
                <div class="clearfix"></div>
            </div>                       
        </div>                                   
        <div id="chiase" style="margin-bottom:10px;padding:10px 20px 10px 12px;margin-left:0px;margin-top:10px;">
            <span id="title"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;&nbsp;Chia sẻ</span>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eae23e6468992a2"></script>
            <!-- AddThis Button END --><br />
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_preferred_5"></a>
                <a class="addthis_button_preferred_6"></a>
                <a class="addthis_button_preferred_7"></a>
                <a class="addthis_button_preferred_8"></a>
                <a class="addthis_button_preferred_9"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
            </div>               
        </div>
        <div id="tags">
            <span><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Từ khóa</span>
            <?php
                $this->db->where('categories','1');
                $this->db->where('idnew',$rows->id);
                $tag=$this->db->get('tag_new');
                if($tag->num_rows()>0)
                {
                    foreach($tag->result() as $tag)
                    {
                        $this->db->where('id',$tag->idtag);
                        $tagname=$this->db->get('tag');
                        if($tagname->num_rows()>0)
                        {
                            $tagname1=$tagname->row();
                            {
                            ?>
                                <a href="<?php echo site_url('/tag/getsanphamByTag/'.$tagname1->id.'/'.url_title($tagname1->tag));  ?>" title="<?php echo $tagname1->tag;?>"> <?php echo $tagname1->tag;?></a>, 
                            <?php
                            }
                        }
                    }
                }
            ?>
        </div>                
    </div>    
    <div class="clear"></div>
</div> 
<div class="box_right">
    <div class="box_right_top" style="margin-bottom:0;">                                        
        <a href="">Sản phẩm cùng loại</a> 
        <div class="box_right_vien"></div>                                            
    </div>
    <div class="box_right_main">       
        <?php                                     
            $this->db->where('status',0);
            $this->db->where('id !=',$rows->id);
            $this->db->where('danhmucsanpham',$rows->danhmucsanpham);
            $this->db->limit(6);
            $sqlsanphamcungloai=$this->db->get('tblsanpham'); 
            $demsp=1;
            ?>
            <div class="sanpham_mb">
                <?php 
                                foreach ($sqlsanphamcungloai->result() as $itemsanphambyhomemb) {
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
                                    <p class="sanpham_item_phone">Điện thoại:&nbsp;<a href="tel:<?php echo $itemsanphambyhomemb->dienthoai; ?>"><?php echo $itemsanphambyhomemb->dienthoai; ?></a></p>                               
                                    <a href="<?php echo site_url(LocDau($itemsanphambyhomemb->ten).'-sp'.$itemsanphambyhomemb->id.'.html'); ?>" class="sanpham_mb_item_read"><i class="fa fa-caret-right fw"></i>&nbsp;Chi tiết</a>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                                }
                            ?>    
            </div>
            <div class="sanpham_desk">
            <?php                                     
            foreach($sqlsanphamcungloai->result() as $itemsanphambc)
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
                <a href="<?php echo site_url(LocDau($itemsanphambc->ten).'-sp'.$itemsanphambc->id.'.html'); ?>" class="sanpham_item_name"><?php echo $itemsanphambc->ten; ?></a>
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
            $demsp++;
            }
            $sqlsanphamcungloai->free_result(); 
            ?>
            </div>
            <?php                       
        ?>                 
    </div>
</div>   