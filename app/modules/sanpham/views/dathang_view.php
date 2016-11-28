<div class="box_center">
    <div class="box_center_top">                            
        <a href="">Đặt hàng</a>                
    </div>            
    <div class="box_center_main">  
        <ul class="breadcrumb" style="margin:10px;">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>
            <li class="active">Đặt hàng</li>
            <div class="clear"></div>
        </ul>      
        <?php             
            $rows = $query;            
        ?>
        <div id="dathang_byby">
            <p><strong>Quý khách đang đặt hàng cho sản phẩm:&nbsp;</strong><span><?php echo $rows->ten; ?></span></p>
            <table>
                <tr>
                    <th width="30%">Tên sản phẩm</th>
                    <th width="20%">Ảnh</th>
                    <th width="10%">Giá</th>
                    <th width="10%">Thành tiền</th>
                </tr>
                <tr>
                    <td><?php echo $rows->ten; ?></td>
                    <td align="center"><img src="<?php echo $rows->anh_thumb; ?>" width="100px"/></td>
                    <td><?php 
                    if($rows->gia==0)
                    {
                        echo 'Liên hệ';
                    }
                    else
                    {
                        echo number_format($rows->gia,0,'.','.').'&nbsp;'.$rows->donvitinh;    
                    }
                    ?></td>
                    <td style="color:#f7941d;text-align: center;font-weight:bold;">
                        <?php 
                    if($rows->gia==0)
                    {
                        echo 'Liên hệ';
                    }
                    else
                    {
                        echo number_format($rows->gia,0,'.','.').'&nbsp;'.$rows->donvitinh;    
                    }
                    ?>
                    </td>
                </tr>
            </table>
        </div>                
        <div id="listorder"> 
        <p id="hh_title">Hãy nhập đầy đủ thông tin bên dưới để đặt hàng</p>       
        <form name="dathangsp" id="dathangsp" method="post" action="">
            <table class="form_order">
                <tr>
                    <td>
                        <b>Họ tên<span>*</span></b>
                    </td>
                    <td>
                        <b>Địa chỉ<span>*</span></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="hoten" id="hoten" class="inputtext" />
                        <input type="hidden" name="id" id="id" value="<?php echo $rows->id; ?>" />
                    </td>
                    <td>
                        <input type="text" name="diachi" id="diachi" class="inputtext" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Điện thoại<span>*</span></b>
                    </td>
                    <td>
                        <b>Email<span>*</span></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="dienthoai" id="dienthoai" class="inputtext" />
                    </td>
                    <td>
                        <input type="text" name="email" id="email" class="inputtext" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>                   
                Yêu cầu thêm                         
                    </b></td>
                </tr>              
                <tr>
                    <td colspan="2">
                        <textarea id="yeucau" name="yeucau"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="button" type="submit" value="Đặt hàng" />
                        <input class="button" type="reset" value="Làm lại" />
                    </td>
                </tr>
            </table>
        </form> 
        <br />        
        </div>   
        <script type="text/javascript">
            jQuery(document).ready(function(){
                function checkMail(mail){
                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;								
                    if (!filter.test(mail)) return false;								
                        return true;								
                }
                jQuery("#dathangsp").submit(function(){
                    var id=jQuery("#id").val();
                    var hoten=jQuery("#hoten").val();
                    var diachi=jQuery("#diachi").val();
                    var dienthoai=jQuery("#dienthoai").val();
                    var email=jQuery("#email").val();  
                    var yeucau=jQuery("#yeucau").val();
                    if(hoten=='')
                    {
                        alert("Họ tên không để trống");
                        return false;
                    }  
                    if(diachi=='')
                    {
                        alert("Địa chỉ không để trống");
                        return false;
                    }
                    if(dienthoai=='')
                    {
                        alert("Điện thoại không để trống");
                        return false;
                    }
                    if(!checkMail(email))
                    {
                        alert("Email không đúng định dạng (xyz@abc.de)");
                        return false;
                    }
                    else
                    {                        
                        jQuery.ajax({
                            cache:false,
                            type:"POST",
                            data:{id : id,hoten : hoten,diachi : diachi,dienthoai : dienthoai,email : email,yeucau : yeucau},
                            url:"<?php echo site_url('sanpham/dodathang/'); ?>", 
                            success:function(html){
                                jQuery("#listorder").html(html);
                                //jQuery("#thank").show();
                               // alert("Cám ơn bạn đã gửi phản hồi");
                                       // jquery("#listphanhoi").hide();
                            }                                                          
                        });     
                    }
                    return false;
                });		    
            });            	
        </script>                                                   
    </div>    
</div><!--End .danhmucpro-->