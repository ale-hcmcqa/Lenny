<div id="content_m" class="container">
<div class="box">
   <div class="box_sp">        
        <div class="box_sp_top">
            <p class="cufont_text" style="font-weight:bold;font-size:18px;">Đổi mật khẩu</p>
        </div>
        <div class="box_top1_r"></div>
    </div>
    <div class="box_main">
    <?php 
        if(isset($id))
        {
            $this->db->where('id',$id);
            $doipass=$this->db->get('tbluser')->row();
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
            <form name="login" method="post" action="<?php echo site_url('thanhvien/dodoimk'); ?>">
                <div style="width:500px;margin:15px auto;">
                <div class="form">
                    <p style="font-weight: bold;">Tài khoản:&nbsp;<span style="color:#A7010F;"><?php echo $doipass->email; ?></span></p>
                    <input type="hidden" name="id" value="<?php echo $doipass->id; ?>" />                    
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
                </div>
            </form>            
        </div>        
    </div>
</div>
</div>