<div class="danhmuc_item">
    <div class="item_pro">
    <div class="danhmuc_top">
           <h1 style="padding-top:10px !important;">                      
        Đăng ký nhà tuyển dụng
        
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
            <form id="frmdangky" method="post" action="<?php echo site_url('thanhvien/donhatuyendung'); ?>" enctype="multipart/form-data">
            <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                tinymce.init({
                   selector: "#gioithieu",
                    theme: "modern",
                    width:500,
                    height: 100,                    
                   image_advtab: true,
                   toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify"
                 }); 
                </script>
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
                    <div id="title_re">Thông tin liên hệ</div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Họ và tên:</label>
                        <input id="full_name" class="inputtext" type="text" value="" name="hoten" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Chức vụ</label>
                        <input id="chucvu" class="inputtext" type="text" value="" name="chucvu" />
                        <span class="require">                          
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Di Động:</label>
                        <input id="didong" class="inputtext" type="text" value="" name="didong"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>                                                                                                                                            
                </div>
                <div id="conten_re">
                    <div id="title_re">Sơ lược thông tin công ty</div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Tên công ty:</label>
                        <input id="congty" class="inputtext" type="text" value="" name="congty" />
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
                        <label class="cursor" for="register_user_name">Điện thoại:</label>
                        <input id="dienthoai" class="inputtext" type="text" value="" name="dienthoai"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>                                                                                                    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Logo công ty:</label>
                        <input type="file" value="" name="logo" />                        
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Loại hình công ty:</label>
                        <select name="loaihinh">
                            <option value="-1">Lựa chọn</option>
                            <option value="0">Tư nhân</option>
                            <option value="1">Nhà nước</option>
                        </select>
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Website:</label>
                        <input id="website" class="inputtext" type="text" value="" name="website"/>
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tỉnh thành:</label>
                        <select name="tinhthanh">
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
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Giới thiệu công ty:</label>
                        </div>
                        <div style="float: left;">
                        <textarea name="gioithieu" id="gioithieu" style="float: left;"></textarea>                       
                        </div>
                        <div class="clear"></div>
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
        <p>Cảm ơn bạn đã đăng ký thành viên tại <a href="#">http://vietnamcrew.com.vn/</a>. Tài khoản của bạn đã được KÍCH HOẠT THÀNH CÔNG. Sau khi đã kích hoạt thành công bạn cần <a href="<?php echo site_url('thanhvien/login'); ?>">ĐĂNG NHẬP</a> để <span>ĐĂNG TIN</span> của công ty mình giúp thuyền viên đăng tuyển.</p>
        <p><a id="trove" href="<?php echo base_url(); ?>">Trở về trang chủ</a></p>
        </div>
        <?php    
        }
        ?>
        <br />
    </div>
</div>