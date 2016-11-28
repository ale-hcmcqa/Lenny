<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$header_cty=$CI->site_model->gettablename('tblthongtincongty','tencongty,diachi,logo','');
$danhmucmenu=$CI->site_model->gettablename_all('tbldanhmucbaiviet','id,danhmucbaiviet,menu,ordernum,status','','menu',1);
?>
<div id="logo">
    <a href="<?php echo base_url(); ?>" title="<?php echo $header_cty->tencongty; ?>"><img title="<?php echo $header_cty->tencongty; ?>" alt="<?php echo $header_cty->tencongty; ?>" src="<?php echo $header_cty->logo; ?>"></a>
    <p>Địa chỉ:&nbsp;<?php echo $header_cty->diachi; ?></p>
</div>
<div id="wensong">
    <div id="chinhhang">
        <p>Cam kết<span>Chất lượng</span></p>
    </div>
    <div id="free">
        <p>Giao hàng<span id="span1"><span style="color:#fff203;">Tận nơi</span></span></p>
    </div>
    <div id="baohanh">
        <p>7 ngày<span>Đổi trả</span></p>
    </div>
    <div id="muahang">
        <p>Thanh toán<span>Khi nhận hàng</span></p>
    </div>
    <div class="clearfix"></div>
</div>
<div id="box_search_all">
    <div id="danhmuc_l">
        <p>Danh mục sản phẩm</p>
        <div id="vien"></div>
    </div>
    <div id="search">
        <form name="frmsearch" method="POST" action="<?php echo site_url('site/search'); ?>">
            <select name="danhmuc">
                <option value="0">Tất cả các sản phẩm</option>
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqldanhmucsptk=$this->db->get('tbldanhmucsanpham');
                    if($sqldanhmucsptk->num_rows()>0)
                    {
                        foreach ($sqldanhmucsptk->result() as $itemdanhmucsptk) 
                        {
                        ?>
                        <option value="<?php echo $itemdanhmucsptk->id; ?>"><?php echo $itemdanhmucsptk->danhmucsanpham; ?></option>
                        <?php
                        }
                    }
                ?>                
            </select>
            <input type="text" name="ten" placeholder="Tìm kiếm...">
            <input type="submit" name="submit" value="">
        </form>
    </div>
    <div id="giohang">
        <a href="<?php echo site_url('sanpham/giohang'); ?>">Giỏ hàng</a>
        <div id="giohang_so">
<?php 
                        if(isset($_SESSION['sanpham']))
                        {
                            if($_SESSION['sanpham']!='')
                            {
                                $str=$_SESSION['sanpham'];
                                $num=explode(",",$str);
                                $html=count($num);
                                echo $html;
                            }
                            else
                            {
                                echo '0';
                            }
                        }
                        else
                        {
                            echo '0';
                        }
                    ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>