<div class="s-main" style="overflow:hidden;">
    <div class="s-main-top">
        <div class="bor_top" style="width:775px;"></div>
        <h3>Đơn hàng viết sẵn</h3>
    </div>
    <div class="s-main-main" style="overflow: hidden;">
        <div id="dangky">
            <div class="register-notice">
                <span>Lưu ý:</span>Bạn cần nhập đầy đủ và chính xác thông tin để đảm bảo quyền lợi của bạn sau này.
                <br />Nếu bạn đã có tài khoản, bạn có thể  
                <a href="#">đăng nhập ở đây</a>
                <br />
            Những trường có dấu(*)yêu cầu quý khách bắt buộc phải điền đúng và đầy đủ.
            </div> 
            <br />
            <?php 
                if(isset($error_register))
                {
                    if(isset($thanhcong))
                    {
                    ?>
                    <script>
                        windows.location='<?php echo site_ursl(); ?>';
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
                <br />
                <?php    
                }
            ?>
            <form id="frmdonhang" method="post" action="<?php echo site_url('thanhvien/thuchiengui'); ?>" enctype="multipart/form-data">
                 <div id="conten_re">
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Họ tên:</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="hoten" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                     <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ:</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="diachi" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địện thoại:</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="dienthoai" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ Email:</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="email" />
                        <span class="require">
                            (*)Email có dạng: abc@xyz.hki
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Nội dung:</label>
                        <input type="file" size="20" value="" name="userfile" />
                        <span class="require">
                            (*)Định dạng file(.pdf,.doc,.xls,.png,.jpg....)
                        </span>
                    </div>
                 </div>
                 <br />
                 <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px;">
                    <input id="reset" type="submit" value="Xác nhận" />
                    <input id="reset" type="reset" name="submit" value="Làm lại"/>
                </div>
            </form>
        </div>   
    </div>
</div>