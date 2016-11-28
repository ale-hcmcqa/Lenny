<ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a><span>/</span></li>
                <li class="active">Đặt phòng</li>
                <div class="clear"></div>
</ul>
<div id="main_content_booking">  
        <?php 
            if(isset($thanhcong))
            {
            ?>
            <script type="text/javascript">
                alert('Đặt phòng thành công');
                window.location.href="<?php echo base_url(); ?>";
            </script>
            <?php    
            }
        ?>
        <form name="frmdatehang" method="post" action="<?php echo site_url('site/datphong'); ?>">  
        <div class="b_info_contact">
            <div class="b_info_contact_t">
                <div class="b_info_icon"><p>1</p></div>
                <p>Thông tin liên hệ</p>
            </div>
            <div class="pany_body">
                <div class="form_infomation">
                    <label>Họ tên:<span style="color:red;">*</span></label>
                    <input type="text" name="hoten" id="hoten" value="" />
                    <span class="error warm_ht"></span>
                </div>  
                <div class="form_infomation">
                    <label>Điện thoại:<span style="color:red;">*</span></label>
                    <input type="text" name="dienthoai" id="dienthoai" value="" />
                    <span class="error warm_dt"></span>
                </div>   
                <div class="form_infomation">
                    <label>Email:<span style="color:red;">*</span></label>
                    <input type="text" name="email" id="email" value="" />
                    <span class="error warm_email"></span>
                </div>
                <div class="form_infomation">
                    <label>Địa chỉ:<span style="color:red;">*</span></label>
                    <input type="text" name="diachi" id="diachi" value="" />
                    <span class="error warm_dc"></span>
                </div>
                <div class="form_infomation">
                    <label>Tỉnh / thành / phố:<span style="color:red;">*</span></label>
                    <select name="city" id="city">
                        <option value="-1">--Chọn Tỉnh/TP--</option>
                        <?php 
                            $this->db->where('status',0);
                            $sqltinhdh=$this->db->get('tbltinh');
                            if($sqltinhdh->num_rows()>0)
                            {
                                foreach($sqltinhdh->result() as $itemtinhdh)
                                {
                                ?>
                                <option value="<?php echo $itemtinhdh->id; ?>"><?php echo $itemtinhdh->tinh; ?></option>
                                <?php    
                                }
                            }
                        ?>
                    </select>
                    <span class="error warm_city"></span>
                </div>                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="b_info_contact" style="background:#FBF1E6;width:385px !important;">
            <div class="b_info_contact_t" style="background:#D57A05 !important;">
                <div class="b_info_icon"><p>2</p></div>
                <p>Thông tin đặt hàng</p>
            </div>
            <div class="pany_body">
                <?php 
                    if(isset($id))
                    {
                        $this->db->where('id',$id);
                        $sqldatphong=$this->db->get('tblphong')->row();
                    }
                ?>
                <div class="img">
                    <img src="<?php echo $sqldatphong->anh_thumb; ?>" />
                </div>
                <div class="pany_body_name">
                    <p id="pany_body_title"><?php echo $sqldatphong->ten; ?></p>
                    <div style="padding-top:2px;">
                        <?php 
                            if($sqldatphong->sosao==1)
                            {
                                echo '<p class="sao"></p>';    
                            }
                            elseif($sqldatphong->sosao==2)
                            {
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                            }
                            elseif($sqldatphong->sosao==3)
                            {
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                            }
                            elseif($sqldatphong->sosao==4)
                            {
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                                echo '<p class="sao"></p>';
                            }
                            elseif($sqldatphong->sosao==5)
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
                </div>
                <?php 
                    $diachidh=$this->db->get('tblthongtincongty')->row();
                ?>
                <p id="diachi_dh">Địa chỉ:&nbsp;<?php echo $diachidh->diachi; ?></p>    
                <div id="thongtinthanhtoan">
                    <p>Thông tin đơn hàng</p>
                </div>
                <script>
        $(function() {
            $( "#ngaynhanphongdh" ).datepicker({
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
            $( "#ngaytraphongdh" ).datepicker({
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
                <table id="ngaydatphong">
                        <tr>
                            <th>Ngày nhận phòng</th>
                            <th>Ngày trả phòng</th>
                        </tr>
                        <tr>
                            <?php 
                            $datenhp=getdate();
                            $datetrp=date("Y-m-d", strtotime("+1 day"));
                            $datetrp1=explode('-',$datetrp);                             
                            ?>
                            <td><input type="text" name="ngaynhanphongdh" id="ngaynhanphongdh" value="<?php echo $datenhp['mday'].'-'.$datenhp['mon'].'-'.$datenhp['year'] ?>" /></td>
                            <td><input id="ngaytraphongdh" type="text" value="<?php echo $datetrp1[2].'-'.$datetrp1[1].'-'.$datetrp1[0]; ?>" name="ngaytraphongdh"/></td>
                        </tr>
                    </table>
                <div class="viewport">
                    <p class="n_room">1.<?php echo $sqldatphong->ten; ?></p>                                           
                    <div id="update_gia">
                    <table>
                        <tr>
                            <td>Giá</td> 
                            <td>Số phòng:</td>
                            <td>Số đêm</td>                                                                                   
                        </tr>
                        <tr>
                            <td>Giá:&nbsp;<span><?php echo number_format($sqldatphong->gia,0,'.','.').'&nbsp;'.$sqldatphong->donvitinh; ?></span></td>
                           <td><input type="text" id="sophong" name="sophong" value="1"/></td>
                            <td><input type="text" id="sodem" name="sodem" value="1"/></td>                            
                        </tr> 
                        <tr>
                            <td colspan="3"><p style="text-align: right;">Thành tiền:<span><?php echo number_format($sqldatphong->gia,0,'.','.').'&nbsp;'.$sqldatphong->donvitinh; ?></span></p></td>                            
                        </tr>                       
                    </table> 
                    </div>
                    <input type="hidden" id="iddh" name="iddh" value="<?php echo $sqldatphong->id; ?>" />
                    <a id="capnhat_gia" onclick="return updateprice();">Cập nhật giá</a>
                    <script type="text/javascript">
                        function updateprice()
                        {                            
                                var iddh=jQuery("#iddh").val(); 
                                var sophong=jQuery("#sophong").val();
                                var sodem=jQuery("#sodem").val();   
                                if(sophong==0)
                                {
                                    alert('Bạn chưa nhập số phòng');
                                    return false;
                                }
                                else if(sodem==0)
                                {
                                    alert('Bạn chưa nhập số đêm');
                                    return false;    
                                } 
                                else
                                {
                                    jQuery.ajax({
                                        cache:false,
                                        type:"POST",
                                        data:{iddh : iddh,sophong : sophong,sodem : sodem},
                                        url:"<?php echo site_url('site/checkgia'); ?>",
                                        success:function(html){
                                            jQuery("#update_gia").html(html);
                                        }
                                    });
                                }                           
                        }
                    </script>
                </div>            
                <div class="clear"></div>
            </div>
        </div>  
        <div class="b_info_contact" style="background:#EAF3EA;width:290px !important;">
            <div class="b_info_contact_t" style="background:#2E892E !important;">
                <div class="b_info_icon"><p>2</p></div>
                <p>Gửi yêu cầu đặt hàng</p>
            </div>
            <div class="pany_body">
                <div id="finish_pay">
                    <input type="submit" name="submit" onclick="return datphongorder();" value="Hoàn thành" />
                </div>
                <div id="note">
                    <label>Lưu ý</label>
                    <p>•&nbsp;Thảo Minh sẽ liên hệ với quý khách (qua email hoặc điện thoại) trong vòng <span>30 phút</span> (T2-CN: 08:00 - 23:00) để xác nhận phòng và thời hạn thanh toán. </p>
                    <p>•&nbsp;Quý khách sẽ thanh toán (tại nhà, tại Thảo Minh, chuyển khoản hay thẻ) sau khi có xác nhận còn phòng trống từ Thảo Minh.</p>
                    <p>•&nbsp;Trường hợp Quý khách muốn xác nhận ngay, vui lòng liên hệ với Thảo Minh theo Hotline:</p>
                    <p>Hỗ trợ 1:&nbsp;<span><?php echo $diachidh->dienthoai; ?></span></p>
                    <p>Hỗ trợ 2:&nbsp;<span><?php echo $diachidh->dienthoai2; ?></span></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>  
        <script type="text/javascript">
            function datphongorder()
            {
                hoten=jQuery("#hoten").val();
                dienthoai=jQuery("#dienthoai").val();
                email=jQuery("#email").val();
                diachi=jQuery("#diachi").val();
                city=jQuery("#city").val();
                if(hoten=='')
                {
                    jQuery(".warm_ht").html('Bạn chưa nhập họ tên');
                    jQuery("#hoten").focus();
                    return false;
                }
                else if(dienthoai=='')
                {
                    jQuery(".warm_ht").html('');
                    jQuery(".warm_dt").html('Bạn chưa nhập điện thoại');
                    jQuery("#dienthoai").focus();
                    return false;    
                }
                else if(email.search('@')==-1)
                {
                    jQuery(".warm_ht").html('');
                    jQuery(".warm_dt").html('');
                    jQuery(".warm_email").html('Email không hợp lệ');
                    jQuery("#email").focus();
                    return false;    
                }
                else if(diachi=='')
                {
                    jQuery(".warm_ht").html('');
                    jQuery(".warm_dt").html('');
                    jQuery(".warm_email").html('');
                    jQuery(".warm_dc").html('Địa chỉ không để trống');
                    jQuery("#diachi").focus();
                    return false;    
                }
                else if(city==-1)
                {
                    jQuery(".warm_ht").html('');
                    jQuery(".warm_dt").html('');
                    jQuery(".warm_email").html('');
                    jQuery(".warm_dc").html('');    
                    jQuery(".warm_city").html('Bạn chưa chọn tỉnh thành');
                    return false;
                }
                return true;
            }
        </script>
        </form>                            
</div>