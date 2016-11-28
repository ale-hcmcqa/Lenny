<div class="danhmuc_box">
    <div class="danhmuc_box_top">
           <h3> 
           <a href="<?php echo base_url(); ?>">Trang chủ</a>&nbsp;»&nbsp;             
            <a href="<?php echo site_url('dang-ky-thanh-vien.html') ?>">Thông tin cá nhân</a>        
        </h3>       
    </div>	
    <div class="danhmuc_box_main">
        <?php 
            $this->db->where('id',$id);
            $sqlthongtin=$this->db->get('tbldangky')->row();
        ?>
        <div id="dangky">            
            <?php 
                if(isset($error_register))
                {
                    if(isset($thanhcong))
                    {
                    ?>
                        <script>
                            alert('Đăng ký thành công');
                            windown.location='<?php echo site_url(); ?>';
                        </script>
                    <?php    
                    }
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
            <br />            
            <form id="frmdangky" method="post" action="<?php echo site_url('thanhvien/dodoithongtin'); ?>">
                <div id="conten_re">
                    <div id="title_re">Thông tin đăng nhập</div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tài khoản</label>
                        <input type="hidden" name="txtid" value="<?php echo $sqlthongtin->id; ?>" />
                        <input id="register_user_name" class="inputtext" disabled="disabled" type="text" value="<?php echo $sqlthongtin->taikhoan; ?>" name="tendangnhap" />
                        <span class="require">
                            (*)Tài khoản từ 6 đến 50 ký tự (Không nhập khoảng trắng)
                        </span>
                    </div>                    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Mật khẩu truy cập</label>
                        <input id="register_password" class="inputtext" disabled="disabled" type="password" value="<?php echo $sqlthongtin->matkhau; ?>" name="matkhau" maxlength="100" />
                        <span class="require">
                            (*) Từ 6 đến 50 ký tự (Không nhập khoảng trắng)
                        </span>
                    </div>                    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ email</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $sqlthongtin->email; ?>" name="email" />
                        <span class="require">
                            (*)Email có dạng: abc@xyz.hki(Email được sử dụng làm tên đăng nhập)
                        </span>
                    </div>
                </div>
                <br />
                <div id="conten_re">
                    <div id="title_re">Thông tin cá nhân</div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Họ và tên:</label>
                        <input id="full_name" class="inputtext" type="text" value="<?php echo $sqlthongtin->hoten; ?>" name="hoten" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Công ty - cửa hàng</label>
                        <input id="congty" class="inputtext" type="text" value="<?php echo $sqlthongtin->congty; ?>" name="congty" />
                        <span class="require">                          
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Số nhà/Ngách/Đường:</label>
                        <input id="diachi" class="inputtext" type="text" value="<?php echo $sqlthongtin->duong; ?>" name="diachi"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Quận huyện</label>
                        <input id="diachi" class="inputtext" type="text" value="<?php echo $sqlthongtin->quanhuyen; ?>" name="quanhuyen"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tỉnh thành</label>
                        <input id="diachi" class="inputtext" type="text" value="<?php echo $sqlthongtin->tinhthanh; ?>" name="tinhthanh"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Điện thoại</label>
                        <input id="dienthoai" class="inputtext" type="text" value="<?php echo $sqlthongtin->dienthoai; ?>" name="dienthoai"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Fax</label>
                        <input id="fax" class="inputtext" type="text" value="<?php echo $sqlthongtin->fax; ?>" name="fax"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" style="width:200px;" for="mobile_phone">Do đâu bạn biết đến chúng tôi</label>
                        <input type="hidden" name="hidelydo" value="<?php echo $sqlthongtin->lydo; ?>" />
                        <select id="lydo" style="padding:4px;" name="lydo">
                            <option value="Tìm kiếm trên google">Tìm kiếm trên google</option>
                            <option value="Qua người giới thiệu">Qua người giới thiệu</option>
                            <option value="Từ website khác">Từ website khác</option>
                        </select>
                        <input style="display:none;margin-left:210px;margin-top:5px;" type="text" name="nguoigioithieu" id="nguoigioithieu" class="inputtext" value="Tên người giới thiệu" autocomplete="off" onfocus="if(this.value=='Tên người giới thiệu') this.value='';" onblur="if(this.value=='') this.value='Tên người giới thiệu';"/>
                    </div>
                    <script type="text/javascript">
                        $('#lydo').change(function(){
                            var lydo=$('#lydo').val();
                            if(lydo=='Qua người giới thiệu')
                            {
                                $(this).siblings('#nguoigioithieu').css('display','block');    
                            }
                            else
                            {
                                $(this).siblings('#nguoigioithieu').css('display','none');    
                            } 
                        });
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
        </div>
        <br />
    </div>
</div>