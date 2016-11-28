<div class="row">
    <div class="col-lg-12 page_item">
        <div class="box_center_t">              
                <p><a class="cufont_cc" href="#">Hỏi đáp</a></p>        
        </div>
        <div class="page_item_main">
             <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <li class="active">Hỏi đáp</li>
            </ol>       
            <?php 
                if($hoidap->num_rows() >0)
                {
                    foreach($hoidap->result() as $itemhoidap)
                    {                                                 
                            $noidunghdvn=$itemhoidap->noidung;                                        
            ?>
            <div class="hoidap_item">                           
                <b><a href="<?php echo site_url('site/traloi/'.$itemhoidap->id.'/'.url_title($itemhoidap->tomtat).'.html'); ?>"><?php echo $itemhoidap->tomtat; ?></a></b>
                <div class="hoidap_ngay">
                    Ngày đăng:&nbsp;
                    <?php 
                        $datedang=explode("-",$itemhoidap->ngaydang);
                        echo $datedang[2].'-'.$datedang[1].'-'.$datedang[0];
                    ?>
                </div>
                <p>Người gửi:&nbsp;<?php echo $itemhoidap->hoten; ?></p>
            </div>
            <?php 
                }
            }
            else
            {
            ?>
            <p style="text-align:center;">Hiện chưa có hỏi đáp nào</p>
            <?php    
            }
            ?>
            <div style="padding:10px;"><?php echo $pagination;?></div>  
            <div class="clear"></div>
            <div id="danghoidap">
                <div id="listorder">
                <p>Đăng câu hỏi</p>
                <form name="frmhoidap" id="hoidap" method="post" action="">
                    <table>
                        <tr>
                            <td><label>Họ tên</label></td>                            
                        </tr>
                        <tr>
                            <td><input type="text" name="hoten" value="" id="hoten" /></td>
                        </tr>
                        <tr>
                            <td><label>Địa chỉ</label></td>                            
                        </tr>
                        <tr>
                            <td><input type="text" name="diachi" id="diachi" value="" /></td>
                        </tr>
                        <tr>
                            <td><label>Email</label></td>                            
                        </tr>
                        <tr>
                            <td><input type="text" name="email" id="email" value="" /></td>
                        </tr>
                        <tr>
                            <td><label>Điện thoại</label></td>                            
                        </tr>
                        <tr>
                            <td><input type="text" name="dienthoai" id="dienthoai" /></td>
                        </tr>
                        <tr>
                            <td><label>Câu hỏi</label></td>                            
                        </tr>
                        <tr>
                        <td><textarea name="cauhoi" rows="20" id="cauhoi" cols="60"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                            <br />
                            <input type="submit" name="submit" value="Gửi" class="nut_hd"/>
                            <input type="reset" name="reset" class="nut_hd" value="Làm lại" />
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
                <script type="text/javascript">
                jQuery(document).ready(function(){
                    function checkMail(mail){
                        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;								
                        if (!filter.test(mail)) return false;								
                            return true;								
                    }
                    jQuery("#hoidap").submit(function(){                    
                        var hoten=jQuery("#hoten").val();
                        var diachi=jQuery("#diachi").val();                   
                        var email=jQuery("#email").val();  
                        var dienthoai=jQuery("#dienthoai").val();
                        var cauhoi=jQuery("#cauhoi").val();
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
                        if(cauhoi=='')
                        {
                            alert("Bạn chưa nhập câu hỏi");
                            return false;
                        }
                        if(cauhoi.length < 15)
                        {
                            alert("Câu hỏi phải đủ 15 ký tự");
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
                                data:{hoten : hoten,diachi : diachi,email : email,dienthoai : dienthoai,cauhoi : cauhoi},
                                url:"<?php echo site_url('site/dohoidap/'); ?>", 
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
        </div>
    </div>
</div>