<style>
.error
{
    color:red;
}
</style>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="vaotrong">
		<div class="box_right" style="margin-bottom:0;">
		    <div class="box_right_top" style="margin-bottom:0;">		
				<a class="box_top_title">Đặt hàng và thanh toán</a>	
				<div class="box_right_vien"></div>		
		    </div>
			<div class="box_right_main" style="padding:10px 0;">
				<ol class="breadcrumb" style="margin-bottom:0;">
					<li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
					<li class="active">Đặt hàng và thanh toán</li>
				</ol>  
				<div class="popup">
					<p>Đơn hàng đang được gửi đi. Vui lòng đợi trong giây lát</p>
					<div class="progress progress-striped active">
						<div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
							<span class="sr-only">100% Complete</span>
						</div>  
					</div>
				</div>
				<div class="alert alert-success thanhcong">Gửi đơn hàng thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.</div>
				<?php
					if(isset($_SESSION['sanpham']))
					{
				    ?>      
					<div class="box_or">
						<?php
						if(isset($_SESSION['username'])&&isset($_SESSION['id']))
						{
							$this->db->where('id',$_SESSION['id']);
							$user=$this->db->get('tbluser')->row();					
						}
						else
						{
						?>
						<br />
						<div class="title_gh">Thông tin tài khoản</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="mess">
										<P><b>Bạn là khách hàng mới</b></P>
										<p>Đăng ký với chúng tôi để thanh toán nhanh hơn, để theo dõi tình trạng đặt hàng của bạn và nhiều hơn nữa. Bạn cũng có thể thanh toán mà không cần đăng ký tài khoản.</p>
									</div>
									<p style="color:red;font-weight:bold">Nếu không muốn đăng ký vui lòng điền thông tin vào form phía dưới để gửi đơn hàng</p>
									<div class="b_order"><a href="<?PHP echo site_url('dang-ky.html')?>">Đăng ký tài khoản</a></div>
									<br />
								</div>                    
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="mess">
										<P><b>Bạn đã có tài khoản trên hệ thống</b></P>
										<p>Để tiếp tục, vui lòng nhập địa chỉ email và mật khẩu mà bạn sử dụng cho tài khoản của bạn.</p>
									</div>
									<form action="<?PHP echo site_url('thanhvien/thuchiendangnhap/');?>" method="post" name="" id="fvujq-form1">
										<div class="loidangnhap">Tên đăng nhập hoặc mật khẩu không đúng vui lòng thử lại</div>
										<div style="padding-top:20px;margin-bottom:10px" class="sign-in-field">
											<label style="font-weight:normal; width:120px; color:#000" for="user_name">Tên đăng nhập: </label>
											<input type="text" id="user_name" name="username"  value="<?php echo (isset($_REQUEST['username'])) ? $_REQUEST['username'] : ''; ?>">
											<div class="warning user_e">Vui lòng nhập tên đăng nhập</div>
										</div>
										<div class="sign-in-field" style="margin-bottom:10px">
											<label style="font-weight:normal; width:120px;color:#000" for="password">Mật khẩu: </label>
											<input type="password" id="password" name="password"  value="<?php echo set_value('password'); ?>">
											<div class="warning pass_e">Vui lòng nhập mật khẩu</div>
										</div>
										<div id="field_captcha" class="sign-in-field"></div>
										<div align="left" style="margin-left:123px;font-weight:normal;" class="sign-in-set-cookie"></div>
									</form>
									<div class="b_order" style="margin-top:10px;"><a class="tt">Tiếp tục</a></div>
									<div class="loaduser"></div>
									<br />
									<script>
										$('.tt').click(function(){
											var user=$('#user_name').val();
											var pass=$('#password').val();
											if($('#user_name').val() == "")
											{
												$(".user_e").slideDown('slow').delay(2000).slideUp('slow');
												$("#user_name").focus();
												return false;
											}
											if($('#password').val() == "")
											{
												$(".pass_e").slideDown('slow').delay(2000).slideUp('slow');
												$("#password").focus();
												return false;
											}
											else
											{
												$(".loaduser").html('<img src="images/loader.gif" alt="Uploading...."/>');         
												$.ajax({
													cache: false,
													type:"POST",
													data:{user:user,pass:pass},
													url:"<?php echo site_url('thanhvien/checklogin');?>",
													success:function(html){
														$(".loaduser").html('');
														if(html == "true") 
														{
															window.location='<?php echo site_url('sanpham/thanhtoan')?>';
														}
														else
														{
															$(".loidangnhap").show();
														}
													}
												});
												return false;
											}
										});								
									</script>
								</div>
							</div>
							<div style="clear:both"></div>       									
							<?php
						}
						?>
						<div class="title_gh">Thông tin khách hàng</div>
						<div class="mess">
							<p><b>Lưu ý</b></p>
							<p>Vui lòng điền đầy đủ thông tin để hoàn tất việc đặt hàng</p>
						</div>
						<div class="form_notification"></div>
							<?php
							if(isset($_SESSION['id']))
							{
								$this->db->where('status',0);
								$this->db->where('id',$_SESSION['id']);
								$user=$this->db->get('tbluser');
								if($user->num_rows()>0)
								{
									$row=$user->row();
								?>
								<form action="" method="" name="frmContact" id="contact-form">
									<div class="row no-padding">								
										<div class="col-sm-4 effect-loaded">
											<label>Họ tên</label>
											<input class="input-contact-form" value="<?PHP echo $row->hoten?>" type="text" name="hoten">
											<input type="hidden" name="user"  value="<?PHP if(isset($_SESSION['id'])){ echo $_SESSION['id'];}else { echo '0';}?>"/>
										</div>
										<div class="col-sm-4 effect-loaded">
											<label>Điện thoại</label>
											<input class="input-contact-form" value="<?PHP echo $row->dienthoai?>" type="text" name="dienthoai">
										</div>
										<div class="col-sm-4 effect-loaded">
											<label>Email</label>
											<input class="input-contact-form" value="<?PHP echo $row->email?>" type="text" name="email">
										</div>                                                                        
										<div class="col-sm-12 effect-loaded">
											<label>Địa chỉ nhận hàng</label>
											<input class="input-contact-form" type="text" value="<?PHP echo $row->diachi?>" name="diachi" style="height:60px">
										</div>
										<div class="col-sm-12 effect-loaded">
											<label>Ghi chú</label>
											<p>
												<textarea class="message-contact-form" name="ghichu" style="height:200px"></textarea>
											</p>
											<br />
											<p>
											  <input type="submit" class="btn btn-success contact-form-button" value="Gửi đơn hàng">
											  <input type="reset" class="btn btn-danger contact-form-button" value="Làm lại">
											</p>
										</div>
									</div>
								</form>
								<?php
								}
							}
							else
							{
							?>
							<form action="" method="" name="frmContact" id="contact-form">
							<div class="row no-padding">						
								<div class="col-sm-4 effect-loaded">
									<label>Họ tên</label>
									<input class="input-contact-form" type="text" name="hoten">
									<input type="hidden" name="user"  value="<?PHP if(isset($_SESSION['id'])){ echo $_SESSION['id'];}else { echo '0';}?>"/>
								</div>
								<div class="col-sm-4 effect-loaded">
									<label>Điện thoại</label>
									<input class="input-contact-form" type="text" name="dienthoai">
								</div>
							  <div class="col-sm-4 effect-loaded">
								<label>Email</label>
								<input class="input-contact-form" type="text" name="email">
							  </div>                  
							  <div class="col-sm-12 effect-loaded">
								<label>Địa chỉ nhận hàng</label>
								<input class="input-contact-form" type="text" name="diachi" style="height:60px">
							  </div>
							  <div class="col-sm-12 effect-loaded">
								<label>Ghi chú</label>
								<p>
								  <textarea class="message-contact-form" name="ghichu" style="height:200px"></textarea>
								</p>
								<br />
								<p>
								  <input type="submit" class="btn btn-success contact-form-button" value="Gửi đơn hàng">
								  <input type="reset" class="btn btn-danger contact-form-button" value="Làm lại">
								</p>
							  </div>
							</div>
						  </form>
						  <?PHP
							}?>
					  <script src="js/jquery.validate.js" type="text/javascript"></script>
					<script type="text/javascript">    
						$(document).ready(function(){
								
							$("#contact-form").validate({
									/*onfocusout: false,
									onkeyup: false,*/
									errorContainer: ".form_notification", 
									errorLabelContainer: ".form_notification", 
									errorElement: "span",   
												
									rules: {
										hoten: {
										  required: true
										},
										dienthoai: {
										  required: true
										},
										email: {
										  required: true,
										  email: true
										},
										diachi: {
										  required: true
										}
									  },
								
									messages: {
										hoten: {
											required: '<div> Vui lòng điền <strong>họ tên của bạn</strong>.</div>',
										},
										dienthoai: {
											required: '<div>Vui lòng điền <strong>số điện thoại</strong>.</div>',
										},
										diachi: {
											required: '<div>Vui lòng điền <strong>địa chỉ nhận hàng</strong>.</div>',
										},
										email: {
											required: '<div>Vui lòng điền email.</div>',
											email: '<div>Email không đúng định dang.</div>'
												},
										message: {
											required: '<div class="alert alert-block"> <button type="button" class="close" data-dismiss="alert">&times;</button>Please enter your <strong>meassage</strong>.</div>',
											minlength: '<div class="alert alert-block"> <button type="button" class="close" data-dismiss="alert">&times;</button>Your message should have at least 10 characters.</div>'                        
										}
									},
									
									submitHandler: function(form) { 
												 
											$('.popup').show('slow');   
											$('.box_or').hide('slow');      
										formObj = $( '#' + form.id );
										
										$.ajax({
										type: "POST",
										data: formObj.serialize(),
										url: "<?PHP echo site_url('sanpham/guidonhang')?>",
										success: function() {
												 
											$('.popup').hide('slow');   
											$('.thanhcong').show('slow');   
											$('.num_order').html(0);
											
											}
										});
										
										return false; 
									}
							});  
						})
						</script>
							<?PHP
							if(isset($_SESSION['sanpham']))
							{
								if($_SESSION['sanpham']!='')
								{
							?>  
								  <div class="list_order">								  	
									  <div class="sanpham_desk">
									  <table style="border:1px solid #ccc;">
					
										<tr id="title_table">
					
										  <td>Sản phẩm</td>
										  <td>Giá</td>
										  <td>Số lượng</td>	
										  <td>Kích thước</td>			
										  <td>Tổng</td>
					
										</tr>
					
										<?PHP
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
											<tr class="item_or" id="tr_<?PHP echo $sp->id.$dem?>">
											  <td style="text-align:left;font-weight:bold"><b><?PHP echo $sp->ten;?></b></td>
											  <td style="text-align:left;font-size:11px;color:#4e8c00">
											  	<?php
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
                           ?>								
											  </td>
											  <td><?PHP echo $item['1']?></td>
											  <td><?PHP echo $kichthuoc;?></td>
											  <td style="text-align:right">
											  	<?php
											  	if($sp->giakm!=0)
											  	{
											  		$tong=($item['1'])*($sp->giakm);
												  echo number_format($tong,0,'.','.');
												  $sum=$sum+$tong;
											  	}
											  	else
											  	{									 
												  $tong=($item['1'])*($sp->gia);
												  echo number_format($tong,0,'.','.');
												  $sum=$sum+$tong;
												 }									 
											  	?>
											  </td>
											</tr>
											<?PHP
											}
											$sanpham=$sanpham.'-Sản phẩm '.$dem.' | Số lượng : ['.$item['1'].' ] | Thành tiền : ['.$tong.'VNĐ]----------';
											$dem++;
										}
										?>
										<tr class="sum_money">
					
											<td colspan="3"><b>Tổng tiền</b></td> <td style="border-right:none;text-align:right">
											<b>
											<?php
												echo number_format($sum,0,'.','.').'&nbsp;đ';									  
											?>
										  </b>
										  </td>
					
										</tr>
					
										<?PHP
					
										}?>
					
									  </table>
									  </div>	
								  </div>
								  <br /> 
					   <?PHP
								}
								else
								{?>
							<h3 class="intro_h" style="text-align: center;padding:20px">Hiện tại chưa có sản phẩm nào trong giỏ hàng !</h3>
								<?PHP
								}
							}
							else
							{?>
							<h3 class="intro_h" style="text-align: center;padding:20px">Hiện tại chưa có sản phẩm nào trong giỏ hàng !</h3>
							<?PHP
							}
							?>
							</div>
							<?PHP
							}
							else
							{?>
							<h3 class="intro_h" style="text-align: center;padding:20px">Hiện tại chưa có sản phẩm nào trong giỏ hàng !</h3>
							<?PHP
							}?>
			</div><!--End .box_center_main-->
		</div><!--End .box_center-->
	</div>
</div>