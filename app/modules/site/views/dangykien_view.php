<div class="post_ct">           
    <h3 class="cufont_p"><a href="<?php echo site_url('site/dangcamnhan'); ?>"><?php echo label('danhcamnhan',$this) ?></a></h3>
        
    </div>
    <div class="left_box_main" style="border:none !important;">
        <div id="link_br">
            <a href="<?php echo base_url(); ?>" id="a1"><?php echo label('home',$this) ?></a><span>»</span>
            <a href="<?php echo site_url('site/dangcamnhan'); ?>" id="a2"><?php echo label('danhcamnhan',$this) ?></a>
        </div>  
        <div class="sanpham">
            <?php 
                if(isset($errors_register))
                {
                    echo $errors_register;
                }
                elseif(isset($kq))
                {
                    echo $kq;
                }
            ?>
            <form method="post" name="frmykien" action="<?php echo site_url('site/dodangcamnhan'); ?>" enctype="multipart/form-data">
                <div class="request-formm">
					<div class="caption">
						<label><?php echo label('ten',$this) ?>:</label>
					</div>
					<div class="column">
						<input type="text" name="txthoten" value=""/>
					</div>
				</div> 
                <div class="request-formm">
					<div class="caption">
						<label>Ảnh đại diện:</label>
					</div>
					<div class="column">
						<input type="file" name="avatar" value=""/>
					</div>
				</div> 
                <div class="request-formm">
					<div class="caption">
						<label>Cảm nhận:</label>
					</div>
					<div class="column">
						<textarea rows="5" style="width:88%; " name="txtykien" id="txtykien"></textarea>
					</div>
				</div>
                <script type="text/javascript">
                function changeCaptcha()
						{
								document.getElementById("captchaImage").src="captcha_new.php?len="+(Math.random()*4+4);
								 document.getElementById("load_img").src="images/indicator_arrows.gif";
								 setTimeout(function(){jQuery('#load_img').attr({src : "images/indicator_arrows_static.gif"}); }, 500);
						}
						</script>
                <div class="request-formm" style="padding-top:10px;">
                    <div class="caption" style="float: left;padding-right:15px;padding-top:6px;">
                        <label class="cursor" for="captcha_register">
                            <span class="require">(*)</span>
                            <?php echo label('mabaove',$this) ?>:
                        </label>                        
                    </div>      
                    <div>
                        <img src="captcha_new.php" id="captchaImage"/><img id="load_img" src="images/indicator_arrows_static.gif" onclick="changeCaptcha()" style="cursor:pointer;margin-bottom:5px;"/>
                    </div>                      
                </div> 
                <div class="request-formm" style="padding-left:90px;border:none;padding-top:10px;">
                        <input type="text" value="" style="width:100px;margin-right:10px;" name="mabaove" size="5" />
                        <span class="require" style="color:red;">Nhập chính sác ảnh hiện thị phía trên</span>
                </div>  
                <div class="request-formm">
					<br/>
					<input type="submit" class="nut" name="cbg" value="<?php echo label('submit',$this) ?>"/>
					<input type="reset" class="nut" value="<?php echo label('reset',$this) ?>"/>
				</div>
            </form>
        </div>
        <br />
    </div>
</div>