<div class="danhmuc_item">
    <div class="item_pro">
    <div class="danhmuc_top">
           <h1 style="padding-top:10px !important;">                      
                Ứng viên
        
        </h1>       
    </div>	
    </div>
    <div class="danhmuc_main">
        <div id="step_register_cand">
            <?php 
                if(isset($dk))
                {
            ?>
                <img src="images/kichhoat.png" width="726px"/>
            <?php 
                }
                elseif(isset($thanhcong))
                {
                ?>
                <img src="images/kichhoat2.png" width="726px" />
                <?php    
                }
            ?>
            <div class="clear"></div>
        </div>   
        <div class="clear"></div>
        <?php 
            if(isset($dk))
            {
        ?>     
        <div id="dangky">  
            <?php 
                if(isset($error_register))
                {                                       
                ?>
                    <div id="error_register">
                        <fieldset>
                            <legend>Thông báo hệ thống</legend>
                            <?php echo $error_register; ?>
                        </fieldset>
                    </div>
                <?php    
                }
            ?>                                          
            <form id="frmdangky" method="post" action="<?php echo site_url('thanhvien/dodangkyungvien'); ?>" enctype="multipart/form-data">            
                <div id="conten_re">
                    <div id="title_re">Thông tin tài khoản</div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ Email</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="tendangnhap" />
                        <span class="require">
                            (*)Email có dạng: abc@xyz.hki(Email được sử dụng làm tên đăng nhập)
                        </span>
                    </div>                    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Mật khẩu truy cập</label>
                        <input id="register_password" class="inputtext" type="password" value="" name="matkhau" maxlength="100" />
                        <span class="require">
                            (*) Từ 6 đến 50 ký tự (Không nhập khoảng trắng)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Nhắc lại mật khẩu</label>
                        <input id="confirm_password" class="inputtext" type="password" value="" name="nhaplaimatkhau"/>
                        <span class="require">
                            (*) Từ 6 đến 50 ký tự (Không nhập khoảng trắng)
                        </span>
                    </div>                    
                </div>
                <br />                
                <div id="conten_re">
                    <div id="title_re">Thông tin cá nhân</div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Ngành nghề:</label>
                        <select name="nganhnghe" style="width:200px;height:22px;">
                            <option value="0">--Lựa chọn--</option>
                            <?php 
                                $this->db->where('status',0);
                                $this->db->order_by('ordernum','desc');
                                $this->db->order_by('id','desc');
                                $sqlnn=$this->db->get('tblnganhnghe');
                                if($sqlnn->num_rows() >0)
                                {
                                    foreach($sqlnn->result() as $itemnn)
                                    {
                                    ?>
                                    <option value="<?php echo $itemnn->id; ?>"><?php echo $itemnn->nganhnghe; ?></option>
                                    <?php    
                                    }
                                }
                            ?>
                        </select>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Họ tên:</label>
                        <input id="congty" class="inputtext" type="text" value="" name="hoten" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ</label>
                        <input id="diachi" class="inputtext" type="text" value="" name="diachi" />
                        <span class="require">  
                        (*)                        
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Di động:</label>
                        <input id="dienthoai" class="inputtext" type="text" value="" name="didong"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>   
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Điện thoại bàn:</label>
                        <input id="dienthoai" class="inputtext" type="text" value="" name="dienthoai"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>                                                                                                     
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Ảnh đại diện:</label>
                        <input type="file" value="" name="avatar" />                        
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Sở thích:</label>
                        <input id="sothich" class="inputtext" type="text" value="" name="sothich"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Giới tính:</label>
                        <input type="radio" name="gioitinh" value="1" checked="checked" /> Nam
                        <input type="radio" name="gioitinh" value="0" /> Nữ                        
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Ngày sinh:</label>
                        <select name="ngay">
                            <option value="0">Chọn ngày</option>
                            <?php 
                                for($i=1;$i<=31;$i++)
                                {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php    
                                }
                            ?>
                        </select>  /
                        <select name="thang">
                            <option value="0">Chọn tháng</option>
                            <?php 
                                for($j=1;$j<=12;$j++)
                                {
                                ?>
                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                <?php    
                                }
                            ?>
                        </select>  /   
                        <select name="nam">
                            <option value="0">Chọn Năm</option>
                            <?php 
                                for($k=1960;$k<=2050;$k++)
                                {
                                ?>
                                <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                <?php    
                                }
                            ?>
                        </select>                  
                    </div>
                    <div class="register-field">
                         <label class="cursor" for="register_user_name">Tình trạng hôn nhân:</label>
                        <input type="radio" value="honnhan" value="0" checked="checked" /> Độc thân
                        <input type="radio" name="honnhan" value="1" /> Đã kết hôn
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tỉnh thành:</label>
                        <select name="tinhthanh" style="width:200px;heihgt:25px;">
                            <option value="0">Chọn tỉnh thành</option>
                            <?php 
                                $this->db->where('status',0);
                                $sqltinhthanh=$this->db->get('tbldiachi');
                                if($sqltinhthanh->num_rows() >0)
                                {
                                    foreach($sqltinhthanh->result() as $itemtinhthanh)
                                    {
                                    ?>
                                    <option value="<?php echo $itemtinhthanh->id; ?>"><?php echo $itemtinhthanh->tinhthanh; ?></option>
                                    <?php    
                                    }
                                }
                            ?>                            
                        </select>
                        <span class="require">
                            (*)
                        </span>
                    </div>                      
                    <script type="text/javascript">   
                     function changeCaptcha()
						{
				            document.getElementById("captchaImage").src="captcha_new.php?len="+(Math.random()*4+4);
                            document.getElementById("load_img").src="images/indicator_arrows.gif";
                            setTimeout(function(){jQuery('#load_img').attr({src : "images/indicator_arrows_static.gif"}); }, 500);
						}
                    </script>     
                    <div class="register-field">
                        <label class="cursor" for="captcha_register">
                            <span class="require">(*)</span>
                            Mã bảo vệ:
                        </label>
                        <img src="captcha_new.php" id="captchaImage"/><img id="load_img" src="images/indicator_arrows_static.gif" onclick="changeCaptcha()" style="cursor:pointer;margin-bottom:5px;"/>
                    </div>                                     
                    <div class="register-field" style="padding-left:125px;border:none;">
                        <input type="text" value="" style="width:100px;margin-right:10px;" name="mabaove" size="5" />
                        <span class="require">Nhập chính sác ảnh hiện thị phía trên</span>
                    </div>
                </div>
                <br />
                <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px;">
                    <input id="reset" type="submit" value="Hoàn tất đăng ký" />
                    <input id="reset" type="reset" name="submit" value="Làm lại" readonly="true" />
                </div>
            </form>
            
            <div class="clear"></div>
        </div><!--eND #dangky-->
        <?php 
        }
        elseif(isset($thanhcong))
        {
        ?>
        <div id="success">
        <p>Cảm ơn bạn đã đăng ký thành viên tại <a href="#">http://vietnamcrew.com.vn/</a>. Tài khoản của bạn đã được KÍCH HOẠT THÀNH CÔNG. Sau khi đã kích hoạt thành công bạn cần <a href="<?php echo site_url('thanhvien/login'); ?>">ĐĂNG NHẬP</a> để <span>TẠO HỒ SƠ</span> của công ty mình giúp thuyền viên đăng tuyển.</p>
        <p><a id="trove" href="<?php echo base_url(); ?>">Trở về trang chủ</a></p>
        </div>
        <?php    
        }
        ?>
        <br />
    </div>
</div>