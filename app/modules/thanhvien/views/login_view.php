<style>

.error
{
	   background-position: 122px 5px;
    padding-left: 142px;
	color:red;
}

</style>
<div class="box_right">
	<div class="box_right_top" style="margin-bottom:0;">        
    	<a class="box_top_title">Đăng nhập hệ thống</a>
        <div class="box_right_vien"></div> 
    </div>        
<div class="box_right_main"> 
<ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
    <li class="active">Đăng nhập</li>
</ol>  
   	<div id="content_b">
  		<div id="loginForm">
        <?php 
            if(isset($error_register))
			{
			 ?>
            <div id="error_register">
    			 <fieldset style="text-align: left;background-color: #F5EFC9;">
                <legend style="font-weight: bold; color:#F00" accesskey="Q">Thông báo hệ thống</legend>
                <?php echo $error_register;?>
                </fieldset>
            </div>
			<?php }

			?>            
            <form action="<?php echo site_url('thanhvien/thuchiendangnhap/');?>" method="post" name="">
                <div id="conten_re">
                    <div id="title_re">Đăng nhập</div>
                        <div class="register-field">

                            <label style="font-weight:normal; width:120px; color:#000" for="user_name">Tên đăng nhập: </label>

                            <input type="text" id="user_name" name="username" style="background:#fff;" value="<?php echo (isset($_REQUEST['username'])) ? $_REQUEST['username'] : ''; ?>">

                        </div>

                        <div class="register-field">

                            <label style="font-weight:normal; width:120px;color:#000" for="password">Mật khẩu: </label>

                            <input type="password" id="password" name="password" style="background:#fff;" value="<?php echo set_value('password'); ?>">
                        </div>
                        <div id="field_captcha" class="sign-in-field"></div>                        
                        <div style="padding-left:122px;padding-top:15px;" class="sign-in-submit1">
                            <input type="submit" value="Đăng nhập" id="reset" name="sign_in">&nbsp;&nbsp;
                            <input type="reset" value="Xóa" id="reset" class="btnLogLogin floatLeft" name="sign_in"/>                            
                        </div>
                        <br />
                </div>
                    </form>

                    </div>
                    
                    </div>    

</div>
</div>