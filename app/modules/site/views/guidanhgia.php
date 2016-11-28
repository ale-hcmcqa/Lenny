<div class="box_center">
    <div class="box_center_top">
        <p>Gửi đánh giá</p>
    </div>
    <div class="box_center_main">
        <ol class="breadcrumb">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>
            <li class="active">Gửi đánh giá</li>
         </ol>
         <div id="danhgia1">
             <?php 
			     if(isset($error_register))
			     {
                ?>
                <div id="error_register">
    			<fieldset style="text-align: left;background-color: #F5EFC9;">
        		<legend style="font-weight: bold; color:#F00" accesskey="Q">Thông báo hệ thống</legend>
    				<?php echo $error_register;
    					?>
    			 </fieldset>
    			 </div>
			     <?php
             }?>
             <?php 
                if(isset($thanhcong))
                {
                ?>
                <p style="color:green;"><?php echo $thanhcong; ?></p>
                <?php    
                }
             ?>
            <form name="frmdanhgia1" method="post" action="<?php echo site_url('site/doguidanhgia'); ?>" enctype="multipart/form-data">
            <table>
            <td>
                <tr>
                    <th valign="top">Họ tên</th>
                    <td><input type="text" name="hoten" value="" /></td>
                </tr>
                <tr>
                    <th valign="top">Ảnh đại diện</th>
                    <td><input type="file" name="avatar" /></td>
                </tr>
                <tr>
                    <th valign="top">Ý kiến đánh giá</th>
                    <td><textarea name="ykien" rows="10" cols="100"></textarea></td>
                </tr>                
                <tr>
                    <td></td>
                    <td style="padding-top:10px;">
                        <input type="submit" name="submit" value="Gửi" />
                        <input type="reset" name="reset" value="Làm lại" />
                    </td>
                </tr>
            </td>
            </table>
            </form>
         </div>
    </div>
</div>