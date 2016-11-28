<div class="s-main">
    <div class="s-main-top">
    <div class="bor_top" style="width:775px;"></div>
        <h3><a href="<?php echo base_url(); ?>">Trang chủ</a> > <a href="#">Giỏ hàng</a></h3>
    </div>
    <div class="s-main-main">
        <div id="giohang" style="padding-left:10px;">
            <?php 
                if(isset($_SESSION['sanpham']))
                {
                    if($_SESSION['sanpham']!='')
					{
                ?>
                    <div id="list_order">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Chiều dài</th>
                            <th>Kích thước</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <?php 
                            $str = $_SESSION['sanpham'];
                            if($str!='')
                            {
                                $num = explode(",",$str);
                                $dem = 1;
                                $sum = 0;
                                $sanpham='';
                                foreach($num as $row)
                                { 
                                    $item = explode("-",$row); 
                                    {
                                        $this->db->where('id',$item['0']);
                                        $sp = $this->db->get('tblsanpham')->row();
                                ?>
                                <tr class="item_or" id="tr_<?php echo $sp->id.$dem; ?>">
                                    <td><?php echo $dem; ?></td>
                                    <td><?php echo $sp->ten; ?></td>
                                    <td><?php echo number_format($sp->gia,0,'.','.'); ?>&nbsp;<?php echo $sp->gia; ?></td>
                                    <td><?php echo $sp->chieuday; ?></td>
                                    <td><?php echo $sp->kichthuoc; ?></td>
                                    <td><input type="text" name="soluong<?php echo $sp->id; ?>" id="soluong<?php echo $sp->id; ?>" value="<?php echo $item['1']; ?>" /></td>
                                    <td>
                                        <?php 
                                            if($sp->gia=='0')
                                             {
                                                 echo 'Liên hệ';
                                                 $tong=0;
                                                 $sum=$sum+$tong;
                                             }
                                             elseif(is_numeric($sp->gia))
                                             {
                                              $tong=($item['1'])*($sp->gia);
                                              echo number_format($tong,0,'.','.');
                                              $sum=$sum+$tong;
                                             }
                                             else
                                             {
                                                 echo $sp->gia;
                                             }
                                        ?>                                        
                                    </td>
                                    <td><a id="delete_order<?php echo $sp->id.$dem; ?>" class="delete_order" title="Xóa sản phẩm"><img src="images/xoa.png" width="20px" /></a></td>
                                </tr>                                
                                <?php
                                    }
                                ?>
                                <script type="text/javascript">
                                jQuery(document).ready(function(){
        					   		jQuery("#soluong<?php echo $sp->id;?>").change(function(){
        								var soluong = $("#soluong<?php echo $sp->id;?>").val();
                                        if(soluong=='0' || soluong=='')
                                        {
                                            alert('Số lượng không để trống');
                                            $('#soluong<?php echo $sp->id ?>').focus();
                                            return false;
                                        }
                                        var sl = $('#soluong<?php echo $sp->id; ?>').val();
                                        var filter = /^([0-9])+$/;
                                        if(!filter.test(sl))
                                        {
                                            alert('Số lượng chỉ nhập kiểu số');
                                            $('#soluong<?php echo $sp->id; ?>').focus();
                                            return false;    
                                       }
                                        else
                                        {
            								jQuery.ajax({
            						 			cache: false,
            						 			type:"POST",
            						 			data:{soluong : soluong},
            						 			url:"<?php echo site_url('sanpham/addnum/'.$sp->id);?>",
            						 			success:function(html){
            						 				$("#list_order").html(html);
            									}
            									});
                                        }
        					   			});
        					  		});
                                </script>
                                <script type="text/javascript">
                                    jQuery(document).ready(function(){
                                        jQuery("#delete_order<?php echo $sp->id.$dem; ?>").click(function(){
                                            r = confirm("Bạn có thực sự muốn xóa");;
                                            if(r==false) return false;
                                            else
                                            {
                                                jQuery.ajax({
                                                    cache: false,
                                                    type:"POST",
                                                    url:"<?php echo site_url('sanpham/delete_order/'.$row); ?>",
                                                    success:function(html){
                                                        $('#tr<?php echo $sp->id.$dem; ?>').hide();
                                                        $("#list_order").html(html);
                                                        <?php 
                                                            $str =$_SESSION['sanpham'];
                                                            $num = explode(",",$str);
                                                            $html = count($num) - 1;
                                                        ?>
                                                        jQuery(".num").html(<?php echo $html; ?>);
                                                    }    
                                                });
                                            }    
                                        });    
                                    });
                                </script>
                                <?php 
                                    $sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'VNĐ]----------';  
                                    $dem++;                          
                                } 
                                ?>
                                <tr class="sum_money">        
                                    <td colspan="6"><b>Tổng tiền(Đã bao gồm VAT)</b></td> <td style="border-right:none;text-align:right"><b><?php echo number_format($sum,0,'.','.');?></b></td><td style="border-left:none;"></td>        
                                </tr>
                            <?php
                            }                               
                        ?>
                    </table>
                    </div>
                    <br />
                    <div class="info_order">
                	   Cám ơn bạn đã đặt hàng<br />Bạn vui lòng nhập chính xác thông tin bên dưới để chúng tôi có thể liên hệ với bạn.
                    </div>
                    <form action="<?php echo site_url('sanpham/add_order/'); ?>" method="post" name="frmContact" id="addorder">
                    	<input type="hidden" value="<?php echo $sanpham; ?>" name="products" />
                        <input type="hidden" value="<?php echo number_format($sum,0,'.','.'); ?> <?php echo $sp->dvt;?>" name="summoney" />
                        <div class="form-row"><label>Họ tên(*)</label><input type="text" id="name"  name="name" class="cttext" value="<?php echo set_value('name'); ?>"/><br /></div>
                        <div class="form-row"><label class="label">Điện thoại(*)</label><input type="text" id="phone"  name="phone" class="cttext" value="<?php echo set_value('phone'); ?>"/><br /></div>
                        <div class="form-row"><label class="label">Email(*)</label><input type="text" id="email"  name="email" class="cttext" value="<?php echo set_value('email'); ?>"/></div>
                         <div class="form-row"><label class="label">Địa chỉ</label><input type="text" id="address"  name="address" class="cttext" value="<?php echo set_value('address'); ?>"/></div>
                         <div class="form-row"><label class="label">Tên ngân hàng</label><input type="text" id="bank"  name="bank" class="cttext" value="<?php echo set_value('bank'); ?>"/></div>
                         <div class="form-row"><label class="label">Số tài khoản</label><input type="text" id="numbank"  name="numbank" class="cttext" value="<?php echo set_value('numbank'); ?>"/></div>
                         <div class="form-row"><label class="label">Ghi chú</label><textarea  style="height:200px;width:500px;" name="comment" onkeyup="initTyper(this);" class="cttext"></textarea></div> <br />
						<div class="form-row"><div class="bt"><input id="reset" type="submit"  value="Gửi đơn hàng">&nbsp;&nbsp;<input name="rs" type="reset" id="reset" value="Làm mới" /></div></div>
                    </form>
                <?php 
                    }
                    else
                    {
                    ?>
                    <h3>Hiện chưa có sản phẩm nào trong giỏ hàng</h3>
                    <?php    
                    }                         
                }
                else
                {
                ?>
                    <h3>Hiện chưa có sản phẩm nào trong giỏ hàng</h3>
                <?php   
                }
            ?>
        </div>
        <br />
    </div>
    <div class="s-main-foo">
    
    </div>
</div>