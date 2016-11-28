<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$danhmucbaivietcap1=$CI->site_model->gettablename_all('tbldanhmucbaiviet','id,danhmucbaiviet,menu,ordernum,status','','menu',1);
$danhmucbaivietcap1mb=$CI->site_model->gettablename_all('tbldanhmucbaiviet','id,danhmucbaiviet,menu,ordernum,status','','menu',1);
?>
<div id="top_t_mb">
    <select name="danhmuc_mb" onchange="if(this.value != '#') window.open(this.value, '_self');">
        <option value="<?php echo base_url(); ?>">Trang chủ</option>
        <?php 
            if($danhmucbaivietcap1mb->num_rows()>0)
            {
                foreach ($danhmucbaivietcap1mb->result() as $itemdanhmucbaivietcap1mb) 
                {
                ?>
                <option value="<?php echo site_url(LocDau($itemdanhmucbaivietcap1mb->danhmucbaiviet).'-bv'.$itemdanhmucbaivietcap1mb->id.'.html'); ?>"><?php echo $itemdanhmucbaivietcap1mb->danhmucbaiviet; ?></option>                
                <?php
                    $this->db->where('status',0);
                    $this->db->where('danhmucbaiviet',$itemdanhmucbaivietcap1mb->id);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $danhmucbaivietcap1mb_sub=$this->db->get('tbldanhmucbaiviet2');
                    if($danhmucbaivietcap1mb_sub->num_rows()>0)
                    {
                        foreach ($danhmucbaivietcap1mb_sub->result() as $itemdanhmucbaivietcap1mb_sub) 
                        {
                        ?>
                        <option value="<?php echo site_url(BoDau($itemdanhmucbaivietcap1mb_sub->danhmucbaivietcap2).'-bv2'.$itemdanhmucbaivietcap1mb_sub->id.'.html'); ?>">--<?php echo $itemdanhmucbaivietcap1mb_sub->danhmucbaivietcap2;?>--</option>
                        <?php
                        }
                        $danhmucbaivietcap1mb_sub->free_result();
                    }
                }
                $danhmucbaivietcap1mb->free_result();
            }
        ?>
        <option value="<?php echo site_url('lien-he.html'); ?>">Liên hệ</option>
        <option value="<?php echo site_url('san-pham-khuyen-mai.html'); ?>">Khuyến mại</option>        
    </select>
</div>
<div id="top_t_desk">
    <ul id="top_t">
        <li><a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a></li>
        <?php 
            if($danhmucbaivietcap1->num_rows()>0)
            {
                foreach ($danhmucbaivietcap1->result() as $itemdanhmucbaivietcap1) 
                {
                ?>
                <li><a href="<?php echo site_url(LocDau($itemdanhmucbaivietcap1->danhmucbaiviet).'-bv'.$itemdanhmucbaivietcap1->id.'.html'); ?>" title="<?php echo $itemdanhmucbaivietcap1->danhmucbaiviet; ?>"><?php echo $itemdanhmucbaivietcap1->danhmucbaiviet; ?></a>
                    <?php 
                        $this->db->where('status',0);
                        $this->db->where('danhmucbaiviet',$itemdanhmucbaivietcap1->id);
                        $this->db->order_by('ordernum','desc');
                        $this->db->order_by('id','desc');
                        $danhmucbaivietcap2=$this->db->get('tbldanhmucbaiviet2');
                        if($danhmucbaivietcap2->num_rows()>0)
                        {
                        ?>
                        <ul class="sub_menu">
                            <?php 
                                foreach ($danhmucbaivietcap2->result() as $itemdanhmucbaivietcap2) 
                                {
                                ?>
                                <li><a href="<?php echo site_url(BoDau($itemdanhmucbaivietcap2->danhmucbaivietcap2).'-bv2'.$itemdanhmucbaivietcap2->id.'.html'); ?>" title="<?php echo $itemdanhmucbaivietcap2->danhmucbaivietcap2; ?>"><?php echo $itemdanhmucbaivietcap2->danhmucbaivietcap2; ?></a></li>
                                <?php
                                }
                                $danhmucbaivietcap2->free_result();
                            ?>
                        </ul>
                        <?php    
                        }
                    ?>
                </li>
                <?php
                }
                $danhmucbaivietcap1->free_result();
            }
        ?>    
        <li><a href="<?php echo site_url('lien-he.html'); ?>" title="Liên Hệ">Liên hệ</a></li>
        <li><a href="<?php echo site_url('san-pham-khuyen-mai.html'); ?>" title="Sản phẩm khuyến mại">Khuyến mại</a></li>
    </ul>
    <script type="text/javascript">
        jQuery(document).ready(function(){                            
            jQuery('#top_t > li').hover(function(){
                jQuery(this).children('.sub_menu').css('display','block');                       
                },function(){
                    jQuery(this).children('.sub_menu').css('display','none');    
            });            
            jQuery("body").append(jQuery("<div><dt/><dd/></div>").attr("id", "progress"));
                jQuery("#progress").width(100+ "%");
                jQuery("#progress").width("101%").delay(800).fadeOut(400, function() {
                jQuery(this).remove();
            });      
        });
    </script>
</div>
<div id="hotline">
    <?php 
    $hotline=$this->db->get('tblthongtincongty')->row();
    ?>
    <p>Hotline:&nbsp;<?php echo $hotline->dienthoai; ?></p>
</div>
<div id="login_h">
    <ul>
        <?php 
            if(isset($_SESSION['id']))
            {
                $this->db->where('id',$_SESSION['id']);
                $user=$this->db->get('tbluser');
                if($user->num_rows()>0)
                {
                    $user=$user->row();
                    ?>
                    <li><p style="color:#fff;margin-bottom:0;"><strong>Xin chào:</strong>&nbsp;<span><?php echo $user->nguoidang; ?></span>,<a style="display:inline;text-transform: none;" href="<?php echo site_url('thanhvien/thoat'); ?>" title="Thoát">Thoát</a></p></li>
                    <?php
                }
            }
            else
            {
            ?>
            <li><a href="<?php echo site_url('dang-ky.html'); ?>" title="Đăng ký">Đăng ký</a></li>
            <li><a style="background:none;" href="<?php echo site_url('dang-nhap.html'); ?>" title="Đăng nhập">Đăng nhập</a></li>
            <?php 
            }
        ?>
    </ul>
</div>   