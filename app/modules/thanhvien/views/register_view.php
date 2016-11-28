<div class="box_right">
    <div class="box_right_top" style="margin-bottom:0;">        
        <a class="box_top_title">Đăng ký thành viên</a> 
        <div class="box_right_vien"></div>        
    </div>
<div class="box_right_main">  
<ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
    <li class="active">Đăng ký thành viên</li>
</ol>
        	<div id="content_b">
            	<div id="content_left">
       		<div class="register-notice"><span>Lưu ý :</span> Bạn cần nhập đầy đủ và chính xác thông tin để đảm bảo quyền lợi của bạn sau này. <br />

Nếu bạn đã có tài khoản, bạn có thể <a href="<?php echo site_url('dang-nhap.html');?>">đăng nhập ở đây </a><br />

Những trường có dấu (<u> * </u>) yêu cầu quý khách bắt buộc phải điền đúng và đầy đủ.
			<p>Bằng việc tạo ra một tài khoản tại hệ thống của chúng tôi bạn sẽ được hưởng các tiện ích và dịch vụ tốt nhất, quá trình đặt mua sản phẩm được tiến hành nhanh và chính xác hơn. Ngoài ra bạn còn có thể sử dụng toàn bộ tiện ích trên hệ thống website của chúng tôi.</p>
			</div>
            <?php 
			if(isset($error_register))
			{?>
            <div id="error_register">
			<fieldset style="text-align: left;background-color: #F5EFC9;">
    		<legend style="font-weight: bold; color:#F00" accesskey="Q">Thông báo hệ thống</legend>
				<?php echo $error_register;
					?>
			 </fieldset>
			 </div>
			 <?PHP
             }?>

            <form  enctype="multipart/form-data" action="<?php echo site_url('thanhvien/thuchiendangky');?>" method="post" id="dangky" name="">
                <div id="conten_re">
                	<div id="title_re">Thông tin đăng nhập</div>
                        <div class="register-field">
                            <label class="cursor" for="register_user_name"><span class="require">*</span> Tên truy cập :</label>
                            <input name="tendangnhap"  type="text" id="register_user_name"   value="<?php echo set_value('tendangnhap'); ?>"><span class="require"> Từ 4 đến 50 ký tự (Không nhập khoảng trắng và kí tự đặc biệt)</span>
                        </div>
                        <div class="register-field">
                            <label class="cursor" for="register_password"><span class="require">*</span> Mật khẩu truy cập :</label>
                            <input name="matkhau" type="password" id="register_password" value="<?php echo set_value('matkhau'); ?>" maxlength="100"><span class="require"> Từ 6 đến 50 ký tự (Không nhập khoảng trắng)</span>
                        </div>
                        <div class="register-field">
                            <label class="cursor" for="confirm_password"><span class="require">*</span> Nhập lại mật khẩu :</label>
                            <input name="nhaplaimatkhau" type="password" id="confirm_password" value=""><span class="require"> Nhập lại mật khẩu đã nhập</span>
                        </div>
                        <div class="register-field">
                            <label class="cursor" for="email"><span class="require">*</span>Email :</label>
                            <input name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"><span class="require">Email đúng có dạng : abc@xyz.yhn</span>
                        </div>
                    <div id="title_re">Thông tin cá nhân</div>
                        <div class="register-field">
                            <label class="cursor" for="full_name"><span class="require">*</span> Họ và tên:</label>
                            <input name="hoten" type="text"  id="full_name" value="<?php echo set_value('full_name'); ?>" ><span class="require"></span>
                          </div>
                        <div class="register-field">
                        <label class="cursor" for="full_name"><span class="require">*</span> Địa chỉ:</label>
                        <input name="diachi" type="text"  id="diachi" value="<?php echo set_value('diachi'); ?>" >
                        </div>
                        <div class="register-field">
                            <label class="cursor" for="mobile_phone"><span class="require">*</span> Điện thoại:</label>
                            <input name="dienthoai" type="text" id="mobile_phone" value="<?php echo set_value('dienthoai'); ?>"><span class="require">Chỉ bao gồm số không nhập chữ</span>
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
                            <label class="cursor" for="captcha_register"><span class="require">*</span> Mã bảo mật:</label>
                            <img src="captcha_new.php" id="captchaImage" ><img id="load_img" src="images/indicator_arrows_static.gif" onclick="changeCaptcha()" style="cursor:pointer;margin-bottom:5px;"/>
                       </div>
                        <div class="register-field" style="padding-left:125px;">
                            <input type="text" size="5"  name="mabaomat"  style="width:100px;margin-right:10px;" value="<?php echo set_value('mabaomat'); ?>"><span class="require">Nhập chính xác ảnh hiện thị phía trên</span>
                        </div>			
                        <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px">
                            <input id="reset" class="buttonDisabled" type="submit"  value="Hoàn tất đăng ký" name="submit" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="reset"  type="reset"  readonly="true" value="Làm lại" name="submit" >
                        </div><Br />
				</div>

                </form>
    </div>
          </div>
</div>     
</div>                      