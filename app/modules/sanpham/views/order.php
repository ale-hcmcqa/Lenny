<style>
.error
{
	color:red;
	text-align:center;
}
</style>
<div class="box_right">
<div class="box_right_top" style="margin-bottom:0;">     
    <a class="cufont_text">Giỏ hàng</a>   
    <div class="box_right_vien"></div>    
</div>
<div class="box_right_main"> 
    <ol class="breadcrumb">                
        <li><a href="<?php echo base_url(); ?>" id="a1"><i style="font-size:20px;color:#205d9d;" class="fa fa-home"></i></a></li>
        <li class="active">Giỏ hàng</li>
    </ol>   
    <div id="content_b" style="padding-right:15px">
         <div class="mid product_overlay" >
        <?PHP
			//if(isset($_SESSION['username']))
			//{
				//print $_SESSION['sanpham'];
			if(isset($error_register))
			{?>
				<div class="error" style="font-weight:bold;">  <br />

                     <p>Cảm ơn quý khách đã đặt hàng.<br />Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>

                     <br />

                </div> 
			<?PHP            
			if(isset($laplai))
			{
				?>
            <p style="font-weight:bold;color:red;text-align:center">Vui lòng không lặp lại !</p>
            <?PHP
			}
            else
            {
                
            }
            }
            else
            {
            ?>
            <?php 
                if(isset($_SESSION['sanpham']))
				{
				    if($_SESSION['sanpham']!='')
					{
					?>
<p class="intro_h" style="font-size:20px;font-weight:bold;">Sản phẩm trong giỏ hàng của bạn</p>                    
                    <div id="list_order">				  
                  <div class="hid_mb">
                  	<table class="">
                    <tr id="title_table" class="">
                      <td class="">STT</td>
						
                      <td class="">Tên sản phẩm</td>

                      <td class="">Ảnh</td>

                      <td class="">Đơn giá</td>

                      <td class="">Số lượng</td>
					  
					  <td class="">Kích thước</td>

                      <td class="">Thành tiền</td>

                      <td class="">Xóa</td>

                    </tr>

                    <?php
                    $str=$_SESSION['sanpham'];
					if($str!='')
					{
					$num=explode(",",$str);
					$dem=1;
					$sum=0;
					$sanpham='';
					foreach($num as $row)
					{
						$item=explode("-",$row);
						{
							$spId = $item['0'];
							$idArr=explode("_",$spId);
							$kichthuoc=$idArr['1'];
							$this->db->where('id',$item['0']);
							$sp=$this->db->get('tblsanpham')->row();
							?>
                        
                       <tr class="item_or" id="tr_<?php echo $spId.$dem?>">    
                          <td class=""><?php echo $dem;?></td>
                          <td class=""><b><?php echo $sp->ten;?></b></td>
                          <td class="lightbox" style="text-align:center;"><a href="<?php echo $sp->anh;?>"><img src="<?php echo $sp->anh_thumb;?>" width="120" height="120" style="text-align: center;"/></a></td>
                         <td class=""><?php
                          	if($sp->giakm!=0)
                          	{ 
                          		echo number_format($sp->giakm,0,'.','.');
	                                echo 'đ';
                          	}
                          	else
                          	{                          
	                            if($sp->gia=='0') 
	                            { 
	                                echo 'Liên hệ';
	                            }
	                            elseif(is_numeric($sp->gia))
	                            {
	                                echo number_format($sp->gia,0,'.','.');
	                                echo 'đ';
	                            } 
                            }                                                                                                                                                    
                           ?></td>
                          <td class=""><br />
                            <input style="width:30px;text-align:center;" type="text" name="soluong<?php echo $spId ?>" id="soluong<?php echo $spId; ?>" value="<?php echo $item['1']; ?>" />
                          </td>
						  <td class=""><?php echo $kichthuoc;?></td>
                          <td class="">
                          <?php
                          	if($sp->giakm!=0)
                          	{
                          		$tong=($item['1'])*($sp->giakm);
	    						echo number_format($tong,0,'.','.').' đ';
	    						$sum=$sum+$tong;
                          	}
                          	else
                          	{                          
	    						 if($sp->gia=='')
	    						 {
	    							 echo 'Liên hệ';
	    							 $tong=0;
	    							 $sum=$sum+$tong;
	    						 }
	    						 elseif(is_numeric($sp->gia))
	    						 {
	                              $tong=($item['1'])*($sp->gia);
	    						  echo number_format($tong,0,'.','.').' đ';
	    						  $sum=$sum+$tong;
	    						 }
	    						 else
	    						 {
	    							 echo $sp->gia;
	    						 }
    						 }                                                  
						  ?>
                          </td>
						  <td class=""><a id="delete_order<?PHP echo $spId.$dem?>" class="delete_order" title="Xóa sản phẩm" style="cursor:pointer;"><img src="images/1335283990_button_cancel.png" width="20" border="0" /></a></td>
                        </tr>
                        <?PHP
						}?>
                        <script type="text/javascript">
					  jQuery(document).ready(function(){
					   jQuery("#soluong<?PHP echo $spId;?>").change(function(){
						var soluong = $("#soluong<?PHP echo $spId;?>").val();
						jQuery.ajax({
						 cache: false,
						 type:"POST",
						 data:{soluong : soluong},
						 url:"<?PHP echo site_url('sanpham/addnum/'.$spId);?>",
						 success:function(html){
						 $("#list_order").html(html);                         
						 }
						});
					   });
					  });					  					 
					 </script>
					 <script type="text/javascript">
                      jQuery(document).ready(function(){
                       jQuery("#delete_order<?PHP echo $spId.$dem?>").click(function(){
                        r = confirm("Bạn có thật sự muốn xóa?");    
                        if(r == false) return false;
                        else
                        {
                        jQuery.ajax({
                         cache: false,
                         type:"POST",
                         url:"<?PHP echo site_url('sanpham/delete_order/'.$row);?>",
                         success:function(html){
                          $("#tr_<?PHP echo $spId.$dem?>").hide();
                          $("#list_order").html(html);
						  window.location.reload();
                         }
                        });
                        }
                       });
                      });
                     </script>					 
                        <?PHP
						$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'đ]----------';
						$dem++;
					}
					?>
                    <tr class="sum_money">

                    	<td colspan="5" style="text-align: center;color:red;" class=""><b>Tổng tiền</b></td> <td style="text-align:center;color:#0d81c9;" colspan="2" class=""><b><?PHP echo number_format($sum,0,'.','.');?> VNĐ</b></td>
                    </tr>

                    <?PHP

					}?>

                  </table>
                  </div>
                  <tr>
                    <td>                        
                        <div id="tieptuc">
                            <a href="<?php echo base_url(); ?>" class="nut">Tiếp tục mua hàng</a>
                            <a style="background:#f51b1b !important;" href="<?php echo site_url('sanpham/thanhtoan'); ?>" class="nut">Thanh toán</a>
                        </div>
                    </td>
                  </tr>

			  </div>
                    <?php   
					}
                }
                else
                {
                ?>
                <p style="text-align:center;font-weight:bold;font-size:18px;font-family:Tahoma;">Hiện không có sản phẩm nào trong giỏ hàng</p>
                <?php    
                }
            ?>
            <?php    
            }
            ?>                                              
            </div>                        
    </div>    	
</div>     
</div>
                         