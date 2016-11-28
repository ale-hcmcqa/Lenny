<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$footer_cty=$CI->site_model->gettablename('tblthongtincongty','tencongty,diachi,diachi2,dienthoai,email,website','');
$danhmucft=$CI->site_model->gettablename_all('tbldanhmucbaiviet','id,danhmucbaiviet,footer,ordernum,status',4,'footer',1);
?>
<div id="bg_footer">
    <div class="container wrapper"> 
        <div id="footer">
            <div class="footer_item">
                <div class="footer_item_top" id="chapnhantt">
                    <a href="">Chấp nhận thanh toán</a>
                </div>
                <div class="footer_item_main">
                    <div id="the_all">
                        <a href="" class="thenh"><img src="images/techcombank.png"></a>
                        <a href="" class="thenh"><img src="images/master.png"></a>
                        <a href="" class="thenh"><img src="images/visa.png"></a>
                        <a href="" class="thenh"><img src="images/mb.png"></a>
                        <a href="" class="thenh"><img src="images/viettn.png"></a>
                        <a href="" class="thenh"><img src="images/pay.png"></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php 
                if($danhmucft->num_rows()>0)
                {
                    foreach ($danhmucft->result() as $itemdanhmucft) 
                    {                       
                    ?>
                    <div class="footer_item">
                        <div class="footer_item_top">
                            <a href="<?php echo site_url(BoDau($itemdanhmucft->danhmucbaiviet).'-bv'.$itemdanhmucft->id.'.html'); ?>" title="<?php echo $itemdanhmucft->danhmucbaiviet; ?>"><?php echo $itemdanhmucft->danhmucbaiviet; ?></a>
                        </div>
                        <div class="footer_item_main">
                            <?php 
                                $this->db->where('status',0);
                                $this->db->where('danhmucbaiviet',$itemdanhmucft->id);
                                $this->db->order_by('ordernum','desc');
                                $this->db->order_by('id','desc');
                                $this->db->limit(4);
                                $sqltindmhome=$this->db->get('tbltintuc');
                                if($sqltindmhome->num_rows()>0)
                                {
                                ?>
                                <ul>
                                    <?php 
                                        foreach ($sqltindmhome->result() as $itemtindmhome) 
                                        {
                                        ?> 
                                        <li><a href="<?php echo site_url(BoDau($itemtindmhome->title).'-'.$itemtindmhome->id.'.html'); ?>" title="<?php echo $itemtindmhome->title; ?>"><?php echo $itemtindmhome->title; ?></a></li> 
                                        <?php
                                        }
                                        $sqltindmhome->free_result();
                                    ?>                                                                    
                                </ul>
                                <?php 
                                }
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <?php
                    }
                    $danhmucft->free_result();
                }
            ?>                   
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container wrapper">
    <div id="footer1">
        <div class="box_cuc">
            <div class="box_cuc_top">
                <p>Về chúng tôi</p>
                <div id="vien_cuc"></div>
            </div>   
            <div class="box_cuc_main">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="footer_left">
                        <p><strong><?php echo $footer_cty->tencongty; ?></strong></p>
                        <p>Địa chỉ:&nbsp;<?php echo $footer_cty->diachi; ?></p>
                        <p>Điện thoại:&nbsp;<?php echo $footer_cty->dienthoai; ?></p>
                        <p>Website:&nbsp;<a href="http://<?php echo $footer_cty->website; ?>"><?php echo $footer_cty->website; ?></a></p>
                        <p>Email:&nbsp;<a href="mailto:<?php echo $footer_cty->email; ?>" title="<?php echo $footer_cty->email; ?>"><?php echo $footer_cty->email; ?></a></p>
                        <p>Văn phòng:&nbsp;<?php echo $footer_cty->diachi2; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="sanpham_ft">
                        <p><strong>Sản phẩm cúa chúng tôi</strong></p>
                        <?php 
                            $this->db->where('status',0);
                            $this->db->order_by('ordernum','desc');
                            $this->db->order_by('id','desc');
                            $this->db->limit(10);
                            $sqldanhmucsanphamft=$this->db->get('tbldanhmucsanpham');
                            if($sqldanhmucsanphamft->num_rows()>0)
                            {
                            ?>
                            <ul>
                                <?php 
                                    foreach ($sqldanhmucsanphamft->result() as $itemdanhmucsanphamft) 
                                    {
                                    ?>
                                    <li><a href="<?php echo site_url(BoDau($itemdanhmucsanphamft->danhmucsanpham).'-dm'.$itemdanhmucsanphamft->id.'.html'); ?>" title="<?php echo $itemdanhmucsanphamft->danhmucsanpham; ?>"><?php echo $itemdanhmucsanphamft->danhmucsanpham; ?></a></li>
                                    <?php
                                    }
                                    $sqldanhmucsanphamft->free_result();
                                ?>                                                            
                            </ul>
                            <?php 
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="guimail_ft">
                        <form name="frmguimail" method="POST" action="">
                            <input type="text" name="ten" value="" placeholder="Nhập email để nhận tin khuyến mại">
                            <input type="submit" name="submit" value="Gửi">
                        </form>
                        <div id="xephang">
                            <p>Tự hào là công ty được xếp hạng 45/500 Doanh nghiệp lớn nhất Việt Nam</p>
                            <img src="images/vnr.png">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>  
<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",43522]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>