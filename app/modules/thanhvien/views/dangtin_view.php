<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Đăng tin tuyển dụng</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="dangtin">
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
            <?php 
                if(isset($thanhcong))
                {
                ?>
                <div id="error_register">
                        <fieldset>
                            <legend>Thông báo hệ thống</legend>
                            <p style="color:green;">Đăng tin thành công</p>
                        </fieldset>
                    </div>
                <?php    
                }
            ?>          
            <form name="frmdangtin" method="post" action="<?php echo site_url('thanhvien/dodangtin'); ?>"> 
                <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                tinymce.init({
                   selector: "textarea",
                    theme: "modern",
                    width:700,
                    height: 100,                    
                   image_advtab: true,
                   toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify"
                 }); 
                </script>  
                 <div id="conten_re">             
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tiêu đề công việc</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('name'); ?>" name="tieude" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                </div>
                <div id="conten_re">
                     <div id="title_re">Thông tin vị trí tuyển dụng</div>
                     <div class="register-field">
                        <label class="cursor" for="register_user_name">Vị trí tuyển dụng</label>
                        <select name="nganhnghe" style="width:200px;height:22px;">
                            <option value="0">--Chọn ngành nghề--</option>
                            <?php 
                                $this->db->where('status',0);
                                $this->db->order_by('ordernum','desc');
                                $this->db->order_by('id','desc');
                                $sqlnganhnghe=$this->db->get('tblnganhnghe');
                                if($sqlnganhnghe->num_rows() >0)
                                {
                                    foreach($sqlnganhnghe->result() as $itemnganhnghe)
                                    {
                                    ?>
                                    <option value="<?php echo $itemnganhnghe->id; ?>"><?php echo $itemnganhnghe->nganhnghe; ?></option>
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
                        <div style="padding-bottom:20px;">
                        <label class="cursor" for="register_user_name">Mô tả công việc:</label>
                        </div>
                        <div style="margin-left:8px;margin-top:5px;">
                        <textarea name="mota" id="mota" style="float: left;"><?php echo set_value('mota'); ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div>  
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Kỹ năng yêu cầu:</label>
                        </div>
                        <div style="float:left;margin-left:8px;margin-top:5px;">
                        <textarea name="kynang" id="kynang" style="float: left;"><?php echo set_value('kynang'); ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Bằng cấp</label>                            
                            <select name="bangcap" style="width:200px;height:22px;">
                                <option value="0">--Lựa chọn--</option>
                                <?php 
                                    $this->db->where('status',0);
                                    $this->db->order_by('ordernum','desc');
                                    $this->db->order_by('id','desc');
                                    $sqlbangcap=$this->db->get('tblbangcap');
                                    if($sqlbangcap->num_rows() >0)
                                    {
                                        foreach($sqlbangcap->result() as $itembangcap)
                                        {
                                        ?>
                                        <option value="<?php echo $itembangcap->id;?>"><?php echo $itembangcap->bangcap; ?></option>
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
                        <label class="cursor" for="register_user_name">Trình độ Tiếng Anh</label>
                            <select name="tienganh" style="width:200px;height:22px;">
                                <option value="0">--Lựa chọn--</option>
                                <?php 
                                    $this->db->where('status',0);
                                    $this->db->order_by('ordernum','desc');
                                    $this->db->order_by('id','desc');
                                    $sqltienganh=$this->db->get('tbltrinhdotienganh');
                                    if($sqltienganh->num_rows() >0)
                                    {
                                        foreach($sqltienganh->result() as $itemtienganh)
                                        {
                                        ?>
                                        <option value="<?php echo $itemtienganh->id; ?>"><?php echo $itemtienganh->trinhdo; ?></option>
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
                        <label class="cursor" for="register_user_name">Kinh nghiệm</label>
                            <select name="kinhnghiem" style="width:200px;height:22px;">
                                <option value="0">--Lựa chọn--</option>
                                <?php 
                                    $this->db->where('status',0);
                                    $sqlkinhnghiem=$this->db->get('tblkinhnghiem');
                                    if($sqlkinhnghiem->num_rows() >0)
                                    {
                                        foreach($sqlkinhnghiem->result() as $itemkinhnghiem)
                                        {
                                        ?>
                                        <option value="<?php echo $itemkinhnghiem->id; ?>"><?php echo $itemkinhnghiem->kinhnghiem; ?></option>
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
                        <label class="cursor" for="register_user_name">Lương</label>
                            <select name="luong" style="width:200px;height:22px;">
                                <option value="0">--Lựa chọn--</option>
                                <?php 
                                    $this->db->where('status',0);
                                    $sqlluong=$this->db->get('tblluong');
                                    if($sqlluong->num_rows() >0)
                                    {
                                        foreach($sqlluong->result() as $itemluong)
                                        {
                                        ?>
                                        <option value="<?php echo $itemluong->id; ?>"><?php echo $itemluong->luong; ?></option>
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
                        <label class="cursor" for="register_user_name">Thời gian thử việc</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('thuviec'); ?>" name="thuviec" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tuổi</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('tuoi'); ?>" name="tuoi" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Phụ cấp & chế độ:</label>
                        </div>
                        <div style="float: left;margin-left:8px;margin-top:5px;">
                        <textarea name="phucap" id="phuccap" style="float: left;"><?php echo set_value('phucap'); ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa điểm tuyển dụng</label>
                            <select name="diadiem" style="width:200px;height:22px;">
                                <option value="0">--Lựa chọn--</option>
                                <?php 
                                    $this->db->where('status',0);
                                    $sqldiadiem=$this->db->get('tbldiachi');
                                    if($sqldiadiem->num_rows() >0)
                                    {
                                        foreach($sqldiadiem->result() as $itemdiadiem)
                                        {
                                        ?>
                                        <option value="<?php echo $itemdiadiem->id; ?>"><?php echo $itemdiadiem->tinhthanh; ?></option>
                                        <?php   
                                        }
                                    }
                                ?>
                            </select>
                        <span class="require">
                            (*)
                        </span>
                    </div>     
                </div>   
                <div id="conten_re">
                    <div id="title_re">Thông tin nộp hồ sơ</div>
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Hồ sơ bao gồm:</label>
                        </div>
                        <div style="float: left;margin-left:8px;margin-top:5px;">
                        <textarea name="hoso" id="hoso" style="float: left;"><?php echo set_value('hoso'); ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Người nhận</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('nguoinhan'); ?>" name="nguoinhan" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ nhận hồ sơ</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('diachinhan'); ?>" name="diachinhan" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Điện thoại</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="dienthoai" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ email</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('email') ?>" name="email" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ email 2</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo set_value('email2') ?>" name="email2" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />
                    <script type="text/javascript" src="js/datapicket.js"></script>   
                    <script>
                    $(function() {
                        $( "#datepicker").datepicker({
                            dateFormat: 'dd-mm-yy',
                            monthNames:['Tháng 1 -', 'Tháng 2 -', 'Tháng 3 -', 'Tháng 4 -', 'Tháng 5 -', 'Tháng 6 -','Tháng 7 -', 'Tháng 8 -', 'Tháng 9 -', 'Tháng 10 -', 'Tháng 11 -', 'Tháng 12 -'],
                            monthNamesShort: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Bốn', 'Tháng Năm', 'Tháng Sáu','Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười 11', 'Tháng Mười Hai'],
                            dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
            				dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            				dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                            weekHeader: 'Tu',
                        });
                        $( "#datepicker1").datepicker({
                            dateFormat: 'dd-mm-yy',
                            monthNames:['Tháng 1 -', 'Tháng 2 -', 'Tháng 3 -', 'Tháng 4 -', 'Tháng 5 -', 'Tháng 6 -','Tháng 7 -', 'Tháng 8 -', 'Tháng 9 -', 'Tháng 10 -', 'Tháng 11 -', 'Tháng 12 -'],
                            monthNamesShort: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Bốn', 'Tháng Năm', 'Tháng Sáu','Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười 11', 'Tháng Mười Hai'],
                            dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
            				dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            				dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                            weekHeader: 'Tu',
                        });
                });
                </script>                 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Ngày nhận hồ sơ</label>
                        <input id="datepicker" class="inputtext" type="text" value="<?php echo set_value('ngaynhan'); ?>" name="ngaynhan" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Hạn nhận hồ sơ</label>
                        <input id="datepicker1" class="inputtext" type="text" value="<?php echo set_value('hannhan'); ?>" name="hannhan" />
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
                <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px;">
                        <input id="reset" type="submit" value="Thêm mới" />
                        <input id="reset" type="reset" name="submit" value="Làm lại" readonly="true" />
                    </div>                
            </form>
        </div><!--End #dangtin-->
    </div>
</div>