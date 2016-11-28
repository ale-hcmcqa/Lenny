<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Sửa tin đăng</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="dangtin">
            <?php 
                if(isset($id))
                {
                    $this->db->where('id',$id);
                    $edittindang=$this->db->get('tbltintuyendung')->row();
                }
            ?>
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
                            <p style="color:green;">Sửa đổi thành công</p>
                        </fieldset>
                    </div>
                <?php    
                }
            ?>          
            <form name="frmdangtin" method="post" action="<?php echo site_url('thanhvien/doedittindang'); ?>"> 
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
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->title; ?>" name="tieude" style="width:500px !important;" />
                        <input type="hidden" name="id" value="<?php echo $edittindang->id; ?>" />
                        <input type="hidden" name="giodangct" value="<?php echo $edittindang->giodang; ?>" />
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
                                        if($itemnganhnghe->id==$edittindang->nganhnghe)
                                        {
                                        ?>
                                        <option value="<?php echo $itemnganhnghe->id; ?>" selected="selected"><?php echo $itemnganhnghe->nganhnghe; ?></option>
                                        <?php    
                                        }
                                        else
                                        {
                                        ?>
                                        <option value="<?php echo $itemnganhnghe->id; ?>"><?php echo $itemnganhnghe->nganhnghe; ?></option>
                                        <?php    
                                        }                                     
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
                        <textarea name="mota" id="mota" style="float: left;"><?php echo $edittindang->motacongviec; ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div>  
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Kỹ năng yêu cầu:</label>
                        </div>
                        <div style="float:left;margin-left:8px;margin-top:5px;">
                        <textarea name="kynang" id="kynang" style="float: left;"><?php echo $edittindang->kynangyeucau; ?></textarea>                       
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
                                            if($itembangcap->id==$edittindang->bangcap)
                                            {
                                            ?>
                                            <option value="<?php echo $itembangcap->id;?>" selected="selected"><?php echo $itembangcap->bangcap; ?></option>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="<?php echo $itembangcap->id;?>"><?php echo $itembangcap->bangcap; ?></option>
                                            <?php    
                                            }                                           
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
                                            if($itemtienganh->id==$edittindang->trinhdo)
                                            {
                                            ?>
                                            <option value="<?php echo $itemtienganh->id; ?>" selected="selected"><?php echo $itemtienganh->trinhdo; ?></option>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="<?php echo $itemtienganh->id; ?>"><?php echo $itemtienganh->trinhdo; ?></option>
                                            <?php    
                                            }                                           
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
                                            if($itemkinhnghiem->id==$edittindang->kinhnghiem)
                                            {
                                            ?>
                                            <option value="<?php echo $itemkinhnghiem->id; ?>" selected="selected"><?php echo $itemkinhnghiem->kinhnghiem; ?></option>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="<?php echo $itemkinhnghiem->id; ?>"><?php echo $itemkinhnghiem->kinhnghiem; ?></option>
                                            <?php    
                                            }                                           
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
                                            if($itemluong->id==$edittindang->luong)
                                            {
                                            ?>
                                            <option value="<?php echo $itemluong->id; ?>" selected="selected"><?php echo $itemluong->luong; ?></option>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="<?php echo $itemluong->id; ?>"><?php echo $itemluong->luong; ?></option>
                                            <?php    
                                            }                                           
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
                        <input id="register_user_name" class="inputtext" type="text" value="<?php  echo $edittindang->thoigianthuviec; ?>" name="thuviec" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>    
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Tuổi</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->tuoi; ?>" name="tuoi" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <div style="float: left;">
                        <label class="cursor" for="register_user_name">Phụ cấp & chế độ:</label>
                        </div>
                        <div style="float: left;margin-left:8px;margin-top:5px;">
                        <textarea name="phucap" id="phuccap" style="float: left;"><?php echo $edittindang->phucap; ?></textarea>                       
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
                                            if($itemdiadiem->id==$edittindang->tinhthanh)
                                            {
                                            ?>
                                            <option value="<?php echo $itemdiadiem->id; ?>" selected="selected"><?php echo $itemdiadiem->tinhthanh; ?></option>
                                            <?php    
                                            }
                                            else
                                            {
                                            ?>
                                            <option value="<?php echo $itemdiadiem->id; ?>"><?php echo $itemdiadiem->tinhthanh; ?></option>
                                            <?php    
                                            }                                           
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
                        <textarea name="hoso" id="hoso" style="float: left;"><?php echo $edittindang->hoso; ?></textarea>                       
                        </div>
                        <div class="clear"></div>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Người nhận</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->nguoinhan; ?>" name="nguoinhan" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ nhận hồ sơ</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->diachinhanhoso; ?>" name="diachinhan" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Điện thoại</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->dienthoai; ?>" name="dienthoai" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ email</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->email1; ?>" name="email" style="width:500px !important;" />
                        <span class="require">
                            (*)
                        </span>
                    </div>  
                    <div class="register-field">
                        <label class="cursor" for="register_user_name">Địa chỉ email 2</label>
                        <input id="register_user_name" class="inputtext" type="text" value="<?php echo $edittindang->email2; ?>" name="email2" style="width:500px !important;" />
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
                        <?php 
                        $getdate=explode('-',$edittindang->ngaynhanhoso);
                        $ngaynhan=$getdate[2].'-'.$getdate[1].'-'.$getdate[0];                        
                        ?>
                        <label class="cursor" for="register_user_name">Ngày nhận hồ sơ</label>
                        <input id="datepicker" class="inputtext" type="text" value="<?php echo $ngaynhan; ?>" name="ngaynhan" />
                        <span class="require">
                            (*)
                        </span>
                    </div> 
                    <div class="register-field">
                        <?php 
                            $getdate1=explode('-',$edittindang->hannhanhoso);
                            $hannhan=$getdate1[2].'-'.$getdate1[1].'-'.$getdate1[0];
                        ?>
                        <label class="cursor" for="register_user_name">Hạn nhận hồ sơ</label>
                        <input id="datepicker1" class="inputtext" type="text" value="<?php echo $hannhan; ?>" name="hannhan" />
                        <span class="require">
                            (*)
                        </span>
                    </div>                                                
                </div> 
                <div class="register-complete" align="left" style="margin-bottom:5px;text-align:center;padding-top:15px;">
                        <input id="reset" type="submit" value="Sửa đổi" />
                        <input id="reset" type="reset" name="submit" value="Làm lại" readonly="true" />
                    </div>                
            </form>
        </div>
    </div>
</div>    