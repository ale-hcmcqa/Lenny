<?php 
if(isset($id))
{
    $this->db->where('status',0);
    $this->db->where('id',$id);
    $sqltintucct=$this->db->get('tblphong')->row();
}
?>
<link rel="stylesheet" type="text/css" href="css/galleryview.css"/>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.galleryview-2.0.js"></script>
<script type="text/javascript" src="js/jquery.timers-1.1.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#photos').galleryView({
			panel_width: 690,
			panel_height:400,
			frame_width: 92,
			frame_height: 52
		});
	});
</script>
<script>
        $(function() {
            $( "#ngaynhanphongdhl" ).datepicker({
            numberOfMonths:2,
            showButtonPanel: true,
            dateFormat: 'dd-mm-yy',
            closeText: 'Đóng',

						prevText: '&#x3c;Trước',

						nextText: 'Tiếp&#x3e;',

						currentText: 'Hôm nay',

						monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

						'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

						monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

						'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

						dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

						dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						weekHeader: 'Tu',

						dateFormat: 'dd-mm-yy',

						firstDay: 0,

						isRTL: false,

						showMonthAfterYear: false,

						yearSuffix: ''
        });                            
    });
</script>
<script>
$(function() {
            $( "#ngaytraphongdhl" ).datepicker({
            numberOfMonths:2,
            showButtonPanel: true,
            dateFormat: 'dd-mm-yy',
            closeText: 'Đóng',

						prevText: '&#x3c;Trước',

						nextText: 'Tiếp&#x3e;',

						currentText: 'Hôm nay',

						monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

						'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

						monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

						'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

						dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

						dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						weekHeader: 'Tu',

						dateFormat: 'dd-mm-yy',

						firstDay: 0,

						isRTL: false,

						showMonthAfterYear: false,

						yearSuffix: ''
        });                            
    });
</script>

<div id="new_left">
    <div class="box_left">
        <div class="box_left_top">
            <p>Tìm kiếm</p>
        </div>
        <div class="box_left_main">
            <form name="frmsearchl" method="post" action="<?php echo site_url('site/searchphong'); ?>">
                <table id="timkiemle">
                    <tr>
                        <th>Tên</th>
                    </tr>
                    <tr>
                        <td><input style="background:none !important;" type="text" name="ten" value="" /></td>
                    </tr>
                    <tr>
                        <th>Ngày nhận phòng</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="ngaynhanphongdhl" name="ngaynhanphong" value="" /></td>
                    </tr>
                    <tr>
                        <th>Ngày trả phòng</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="ngaytraphongdhl" name="ngaytraphong" value="" /></td>
                    </tr>
                    <tr>
                        <th>Số người</th>
                    </tr>
                    <tr>
                        <td><input style="background:none !important;" type="text" name="songuoi" value="" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Tìm kiếm" /></td>
                    </tr>
                </table>
            </form>
            <div class="clear"></div>
        </div>
    </div>    
    <div class="box_left">
        <div class="box_left_top">
            <p>Phòng yêu thích</p>
        </div>
        <div class="box_left_main">
            <?php 
                $this->db->where('status',0);
                $this->db->where('yeuthich >',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $sqlyeuthich=$this->db->get('tblphong');
                if($sqlyeuthich->num_rows()>0)
                {
                    foreach($sqlyeuthich->result() as $itemyeuthich)
                    {
                    ?>
                    <div class="phong_l_item">
                        <a href="<?php echo site_url(LocDau($itemyeuthich->ten).'-p'.$itemyeuthich->id.'.html'); ?>" class="phong_l_item_img" title="<?php echo $itemyeuthich->ten; ?>"><img src="<?php echo $itemyeuthich->anh_thumb; ?>" title="<?php echo $itemyeuthich->ten; ?>" alt="<?php echo $itemyeuthich->ten; ?>" /></a>
                        <div class="phong_l_item_nd">
                            <a href="<?php echo site_url(LocDau($itemyeuthich->ten).'-p'.$itemyeuthich->id.'.html'); ?>" class="phong_l_item_name"><?php echo $itemyeuthich->ten; ?></a>
                            <div class="phong_l_item_sao">
                                <?php 
                                    if($itemyeuthich->sosao==1)
                                    {
                                        echo '<p class="sao"></p>';    
                                    }
                                    elseif($itemyeuthich->sosao==2)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';    
                                    }
                                    elseif($itemyeuthich->sosao==3)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                    elseif($itemyeuthich->sosao==4)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                    elseif($itemyeuthich->sosao==5)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                ?>
                            </div>
                            <div class="clear"></div>
                            <p class="phong_l_item_gia">Giá:&nbsp;<span>
                            <?php 
                            if($itemyeuthich->gia==0)
                            {
                                echo 'Liên hệ';
                            }
                            else
                            {
                                echo number_format($itemyeuthich->gia,0,'.','.').'&nbsp;'.$itemyeuthich->donvitinh; 
                            }
                            ?></span></span></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php    
                    }
                    $sqlyeuthich->free_result();
                }
            ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="box_left">
        <div class="box_left_top">
            <p>Tại sao chọn Thảo Minh</p>
        </div>
        <div class="box_left_main">
            <div class="taisao_l">
                <?php 
                    $taisaol=$this->db->get('tblthongtincongty')->row();
                    echo $taisaol->taisao;
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="new_right">
    <div class="box_left"> 
        <div class="box_left_top">
            <p><?php echo $sqltintucct->ten; ?></p>
        </div>
        <div class="box_left_main">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a><span>/</span></li>
                <li class="active"><?php echo $sqltintucct->ten; ?></li>
                <div class="clear"></div>
            </ul>
            <div id="title_p">
                <div id="title_p1">
                    <h1><?php echo $sqltintucct->ten; ?></h1>
                </div>
                <div id="title_p2">
                    <?php 
                        $t=$sqltintucct->sosao;
                        if($t==1)
                        {
                        ?>
                        <p class="sao"></p>
                        <?php    
                        }
                        elseif($t==2)
                        {
                        ?>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <?php    
                        }
                        elseif($t==3)
                        {
                        ?>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>                        
                        <?php    
                        }
                        elseif($t==4)
                        {
                        ?>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <?php                                                    
                        }
                        elseif($t==5)
                        {
                        ?>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <p class="sao"></p>
                        <?php    
                        }
                    ?>
                </div> 
                <div class="clear"></div>               
                <div id="time_p">
                    <p style="float: left;padding-right:15px;">Ngày đăng:&nbsp;<?php $date=explode('-',$sqltintucct->ngaydang);echo $date[2].'-'.$date[1].'-'.$date[0];?> | <?php echo $sqltintucct->giodang; ?> | <?php echo $sqltintucct->view ?> lượt xem</p>
                    <p id="yeuthich" style="float: left;cursor: pointer;color:#3883cc">Lưu vào yêu thích<span style="color:#333 !important;">
                    (<?php echo $sqltintucct->yeuthich;?>)</span></p>
                    <input type="hidden" name="idyt" id="idyt" value="<?php echo $sqltintucct->id; ?>" />
                    <script type="text/javascript">
                        jQuery(document).ready(function(){                            
                            jQuery("#yeuthich").click(function(){                                
                                idyt=jQuery("#idyt").val();
                                jQuery.ajax({
                                    cache:false,
                                    type:"POST",
                                    data:{idyt : idyt},
                                    url:"<?php echo site_url('site/tanglike'); ?>",
                                    success:function(html){
                                        alert('Cám ơn bạn đã yêu thích');
                                        window.location.reload();
                                    }    
                                });     
                            });    
                        })    
                    </script>
                    <div class="clear"></div>
                </div>
            </div>    
            <div class="clear"></div>
            <div class="like_face">
				<div class="fb-like" style="float:left;padding-right:10px;" data-href="<?php echo site_url(LocDau($sqltintucct->ten).'-p'.$sqltintucct->id.'.html'); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
				<div class="g-plusone" data-size="medium" data-href="<?php echo site_url(LocDau($sqltintucct->ten).'-p'.$sqltintucct->id.'.html'); ?>"></div>
            </div>
            <div id="datphong">
                <a href="<?php echo site_url(LocDau($sqltintucct->ten).'-dh'.$sqltintucct->id.'.html'); ?>" title="Đặt phòng">Đặt phòng</a>
            </div>
            <div class="clear"></div>
            <div class="pikachoose">
                <?php 
                    $this->db->where('sanpham',$sqltintucct->id);
                    $sqlanhct=$this->db->get('anh');
                    if($sqlanhct->num_rows()>0)
                    {
                    ?>
                	<ul id="photos">
                        <?php 
                            foreach($sqlanhct->result() as $itemanhct)
                            {
                            ?>
                		      <li><img src="<?php echo $itemanhct->thumb; ?>" title="<?php echo $sqltintucct->ten; ?>" alt="<?php echo $sqltintucct->ten; ?>"/></li>
                            <?php 
                            }
                        ?>                		
                	</ul>
                    <?php 
                    }
                ?>
            </div>  
            <div class="thongtin">
                <div class="thongtin_top">
                    <p>Thông tin chung</p>
                </div>
                <div class="thongtin_main">
                    <p><strong>Kiểu phòng:</strong>&nbsp;<?php echo $sqltintucct->kieuphong; ?></p>
                    <p><strong>Diện tích phòng:</strong>&nbsp;<?php echo $sqltintucct->dientichphong; ?></p>
                    <p><strong>Giường:</strong>&nbsp;<?php echo $sqltintucct->giuong; ?></p>
                    <p><strong>Giá 1 đêm:</strong>&nbsp;<?php echo number_format($sqltintucct->gia,0,'.','.').'&nbsp;'.$sqltintucct->donvitinh; ?></p>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <div class="thongtin_top">
                    <p>Tiên nghi phòng</p>
                </div>
                <div class="thongtin_main">
                    <?php echo $sqltintucct->tiennghiphong; ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <div class="thongtin_top">
                    <p>Chi tiết</p>
                </div>
                <div class="thongtin_main">
                    <?php echo $sqltintucct->chitiet; ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <div class="thongtin_top">
                    <p>Bình luận</p>
                </div>
                <div class="thongtin_main">
                    <div id="fb" style="padding-left:9px;">       
            	       <div id="fb-root"></div>
            		      <script>(function(d, s, id) {
            		          var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                              fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <html xmlns:fb="http://ogp.me/ns/fb#">
                            <fb:comments href="<?php echo site_url(LocDau($sqltintucct->ten).'-p'.$sqltintucct->id.'.html'); ?>" width="650px" num_posts="10" ></fb:comments>
                        </html>
                        <!--fb-->
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="thongtin">
                <div class="thongtin_top">
                    <p>Phòng khác</p>
                </div>
                <div class="thongtin_main">
                    <?php 
                        $this->db->where('status',0);
                        $this->db->where('id !=',$sqltintucct->id);
                        $this->db->order_by('ordernum','desc');
                        $this->db->order_by('id','desc');
                        $this->db->limit(8);
                        $sqlphongkhac=$this->db->get('tblphong');
                        if($sqlphongkhac->num_rows()>0)
                        {
                            foreach($sqlphongkhac->result() as $itemphongkhac)
                            {
                            ?>
                            <div class="phongkhac_item">
                                <a href="<?php echo site_url(LocDau($itemphongkhac->ten).'-p'.$itemphongkhac->id.'.html'); ?>" class="phongkhac_item_img" title="<?php echo $itemphongkhac->ten; ?>"><img src="<?php echo $itemphongkhac->anh_thumb; ?>" title="<?php echo $itemphongkhac->ten; ?>" alt="<?php echo $itemphongkhac->ten; ?>" /></a>
                                <div class="phongkhac_nd">
                                    <a href="<?php echo site_url(LocDau($itemphongkhac->ten).'-p'.$itemphongkhac->id.'.html'); ?>" class="phongkhac_item_name" title="<?php echo $itemphongkhac->ten; ?>"><?php echo $itemphongkhac->ten; ?></a>
                                    <div class="phongkhac_item_sao">
                                        <?php 
                                            for($pl=1;$pl<=$itemphongkhac->sosao;$pl++)
                                            {
                                                echo '<p class="sao"></p>';    
                                            }                                            
                                        ?>                                                      
                                        <div class="clear"></div>
                                    </div>
                                    <p class="phongkhac_item_gia">Giá:&nbsp;<span>
                                    <?php 
                                    if($itemphongkhac->gia==0)
                                    {
                                        echo 'Liên hệ';
                                    }
                                    else
                                    {
                                        echo number_format($itemphongkhac->gia,0,'.','.').'&nbsp;'.$itemphongkhac->donvitinh; 
                                    }
                                    ?></span></p>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div> 
                            <?php 
                            }
                            $sqlphongkhac->free_result();
                        }
                    ?>                   
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>