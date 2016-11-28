<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Tạo hồ sơ</h3>
        </div>
    </div>
    <div class="danhmuc_main">
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
                elseif(isset($thanhcong))
                {
                ?>
                <div id="error_register">
                        <fieldset>
                            <legend>Thông báo hệ thống</legend>
                            <p>Tạo hồ sơ thành công</p>
                        </fieldset>
                    </div>
                <?php    
                }
            ?>                                          
            <form id="frmdangky" method="post" action="<?php echo site_url('thanhvien/dotaohoso'); ?>" enctype="multipart/form-data">
            <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
                <script type="text/javascript">
                tinymce.init({
                   selector: "textarea",
                    theme: "modern",
                    width:708,
                    height: 100,                    
                   image_advtab: true,
                   toolbar: "bold italic underline | alignleft aligncenter alignright alignjustify"
                 }); 
                </script>
                <div id="conten_re">
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tiêu đề hồ sơ</label>
                        <input id="register_user_name" class="inputtext" type="text" value="" name="title" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>   
                </div>
                <div id="conten_re">
                    <div id="title_re">Thông tin nghề nghiệp</div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Vị trí mong muốn</label>
                        <select name="vitrimm" style="width:300px;height:22px;">
                            <option value="0">Chọn vị trí</option>
                            <?php 
                                $this->db->where('status',0);
                                $sqlvitri=$this->db->get('tblnganhnghe');
                                if($sqlvitri->num_rows() >0)
                                {
                                    foreach($sqlvitri->result() as $itemvitri)
                                    {
                                    ?>
                                    <option value="<?php echo $itemvitri->id; ?>"><?php echo $itemvitri->nganhnghe; ?></option>
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
                        <label class="cursor" for="register_user_name">Bằng cấp</label>
                        <select name="bangcap" style="width:300px;height:22px;">
                            <option value="0">Chọn bằng cấp</option>
                             <?php 
                                $this->db->where('status',0);
                                $sqlbangcap=$this->db->get('tblbangcap');
                                if($sqlbangcap->num_rows() >0)
                                {
                                    foreach($sqlbangcap->result() as $itembangcap)
                                    {
                                    ?>
                                    <option value="<?php echo $itembangcap->id; ?>"><?php echo $itembangcap->bangcap; ?></option>
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
                        <label class="cursor" for="register_user_name">Trình độ tiếng Anh</label>
                        <select name="trinhdo" style="width:300px;height:22px;">
                            <option value="0">--Lựa chọn--</option>
                             <?php 
                                $this->db->where('status',0);
                                $sqltrinhdo=$this->db->get('tbltrinhdotienganh');
                                if($sqltrinhdo->num_rows() >0)
                                {
                                    foreach($sqltrinhdo->result() as $itemtrinhdo)
                                    {
                                    ?>
                                    <option value="<?php echo $itemtrinhdo->id; ?>"><?php echo $itemtrinhdo->trinhdo; ?></option>
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
                        <select name="kinhnghiem" style="width:300px;height:22px;">
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
                        <label class="cursor" for="register_user_name">Mức lương</label>
                        <select name="mucluong" style="width:300px;height:22px;">
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
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Mục tiêu công việc:</label>
                        </div>
                        <div style="float: left;margin-left:8px;margin-top:5px;">
                        <textarea name="muctieu" id="muctieu" style="float: left;"></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div>    
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Giới thiệu bản thân:</label>
                        </div>
                        <div style="float:left;margin-left:8px;margin-top:5px;">
                        <textarea name="gioithieu" id="gioithieu" style="float: left;"></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Loại hình công ty</label>
                        <select name="loaihinh" style="width:300px;height:22px;">
                            <option value="-1">--Lựa chọn--</option>                             
                            <option value="0">Tư nhân</option>
                            <option value="1">Nhà nước</option>                                    
                        </select>
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tỉnh/Thành phố</label>
                        <select name="tinhthanh" style="width:300px;height:22px;">
                            <option value="0">--Lựa chọn--</option>
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
                </div>
                <br />
                <div id="conten_re">
                    <div id="title_re">Quá trình học vấn</div>
                    <div class="register-field">
                        <label class="cursor" for="full_name">Trường/Khóa học:</label>
                        <input id="full_name" class="inputtext" type="text" value="" name="khoahoc" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Chuyên ngành</label>
                        <input id="chuyennganh" class="inputtext" type="text" value="" name="chuyennganh" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div>                                                                                                                                                            
                </div>
                <div id="conten_re">
                    <div id="title_re">Chứng chỉ đi tàu (Nếu có)</div>
                    <div style="padding-top:15px;padding-left:30px;padding-bottom:15px;">
                    <?php 
                        $this->db->where('status',0);
                        $sqlch=$this->db->get('tblchungchiditau');
                        if($sqlch->num_rows() >0)
                        {
                            foreach($sqlch->result() as $itemch)
                            {
                    ?>
                            <div class="chungchi" style="float:left;width:200px;font-size:12px;">
                                <input type="checkbox" name="checkbox[]" value="<?php echo $itemch->id ?>" />&nbsp;&nbsp;&nbsp;<?php echo $itemch->chungchi; ?>
                            </div>
                    <?php 
                        }
                    }
                    ?>
                    <div class="clear"></div>   
                    </div>                                                                                                                                                                                                                                                                                          
                </div>
                <div id="conten_re">
                    <div id="title_re">Kinh nghiệm làm việc</div>
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tuyến hàng hải</label>
                        <input id="tuyenhh" class="inputtext" type="text" value="" name="tuyenhh" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div>   
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Trọng lượng tàu</label>
                        <input id="trongluong" class="inputtext" type="text" value="" name="trongluong" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Vị trí làm việc</label>
                        <input id="vitrilv" class="inputtext" type="text" value="" name="vitrilv" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Loại hàng</label>
                        <input id="loaihang" class="inputtext" type="text" value="" name="loaihang" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Công ty</label>
                        <input id="congty" class="inputtext" type="text" value="" name="congty" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Recommendation</label>
                        <input id="khuyennghi" class="inputtext" type="text" value="" name="khuyennghi" style="width:500px !important;" />
                        <span class="require">                          
                        </span>
                    </div>     
                </div>
                <br />
                <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px;">
                    <input id="reset" type="submit" value="Tạo hồ sơ" />
                    <input id="reset" type="reset" name="submit" value="Làm lại" readonly="true" />
                </div>
            </form>
            
            <div class="clear"></div>
        </div><!--eND #dangky-->
    </div>
</div>    