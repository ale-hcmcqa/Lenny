<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Đổi mật khẩu</h3>
        </div>
    </div>
    <div class="danhmuc_main">
    <?php 
        if(isset($_SESSION['username1']))
        {
            $this->db->where('email',$_SESSION['username1']);
            $doipassuv=$this->db->get('tblungvien')->row();
        }
    ?>
        <div id="dangnhap1">            
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
            <form name="login" method="post" action="<?php echo site_url('thanhvien/dodoipassuv'); ?>">
                <div class="form">
                    <label style="font-weight: bold;">Tài khoản:&nbsp;<span style="color:#A7010F;"><?php echo $doipassuv->email; ?></span></label>
                    <input type="hidden" name="id" value="<?php echo $doipassuv->id; ?>" />                    
                </div> 
                <div class="form">
                    <label>Mật khẩu cũ:</label>
                    <input type="password" name="matkhaucu" value="" /><br />                    
                </div> 
                <div class="form">
                    <label>Mật khẩu mới:</label>
                    <input type="password" name="matkhaumoi" value="" /><br />                    
                </div>
                <br />
                
                <div class="form_complate">
                    <input id="reset" type="submit" name="sign_in" value="Tiếp tực"/>
                    <input id="reset" type="reset" name="sign_in" value="Làm lại"/>
                </div>
            </form>
            <div class="form">
            
            </div>
        </div>        
    </div>
</div>