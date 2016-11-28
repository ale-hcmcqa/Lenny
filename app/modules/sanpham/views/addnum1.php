<table>
							            <tr id="title_table">							                      
					                      <td class="">Sản phẩm</td>
					                      <td class="">Thông tin</td>
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
												$this->db->where('id',$item['0']);
												$sp=$this->db->get('tblsanpham')->row();
												?>
												<tr class="item_or" id="tr_<?php echo $sp->id.$dem?>">													
													<td><b style="display:block;"><?php echo $sp->ten;?></b>
														<img src="<?php echo $sp->anh_thumb;?>" width="120" style="text-align: center;"/>
														<p><a onclick="confirm('Bạn có thật sự muốn xóa?')" href="<?php echo site_url('sanpham/delete_order1/'.$row); ?>"><img src="images/1335283990_button_cancel.png" width="20" border="0" /></a></p>
													</td>													
													<td>
														 <p>Số lượng: <input style="width:30px;text-align:center;" type="text" name="soluong1<?php echo $sp->id ?>" id="soluong1<?php echo $sp->id; ?>" value="<?php echo $item['1']; ?>" />   </p>                            
														 <p>Giá: 
														<?php                           															
															//echo number_format($item['2'],0,'.','.');
															//echo 'đ';														                                                                                                                                                   
													   ?>	
													   </p>																																				
													<?php
														$tong=($item['1'])*($item['2']);
														echo number_format($tong,0,'.','.').' đ';
														$sum=$sum+$tong;															                                              
													?>
													</td>													
												</tr>
												<?php
											}
											?>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#soluong1<?php echo $sp->id;?>").change(function(){
														var soluong1 = $("#soluong1<?php echo $sp->id;?>").val();
														jQuery.ajax({
															cache: false,
															type:"POST",
															data:{soluong1 : soluong1},
															url:"<?php echo site_url('sanpham/addnum1/'.$sp->id);?>",
															success:function(html){
																$("#list_order").html(html);                         
															}
														});
													});
												});
											</script>
											<script type="text/javascript">
												jQuery(document).ready(function(){
													jQuery("#delete_order<?php echo $sp->id.$dem?>").click(function(){
														r = confirm("Bạn có thật sự muốn xóa?");  
														if(r == false) return false;
														else
														{
															jQuery.ajax({
																cache: false,
																type:"POST",
																url:"<?php echo site_url('sanpham/delete_order/'.$row);?>",
																success:function(html){
																	$("#tr_<?php echo $sp->id.$dem?>").hide();
																	$("#list_order").html(html);
																	window.location.reload();
																}
															});
														}
													});
												});
											</script>
											<?php
												$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'đ]----------';
												$dem++;
										}
										?>
										<tr class="sum_money">                    											
											<td style="color:#0d81c9;" colspan="2">
												<b>Tổng tiền:<b><?php echo number_format($sum,0,'.','.').'&nbsp;đ';?></b>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<div id="tieptuc">
                            <a href="<?php echo base_url(); ?>" class="nut">Tiếp tục mua hàng</a>
                            <a style="background:#f51b1b !important;" href="<?php echo site_url('sanpham/thanhtoan'); ?>" class="nut">Thanh toán</a>
                        </div>
											</td>
										</tr>
										<?php

									}?>									
							        </table>