<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Quên mật khẩu ứng viên</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <br />            
        <div class="changepass">
            <p style="text-align:center;">
                <b>Nhập chính xác địa chỉ email bạn sử dụng để đăng ký tài khoản tại vietnamcrew.com.vn<br />
                    Tên đăng nhập và mật khẩu sẽ được gửi về email bạn đã đăng ký.
                </b>
            </p>
            <br />
           <?php 
        	if(isset($error_changepass))
        		{
        			if(isset($email))
        			{
        				$this->db->where('email',$email);
        				$user=$this->db->get('tblnhatuyendung');
        				$user=$user->row();
                        $noidung='<p><b>Thông tin đăng nhập từ website vietnamcrew.com.vn</b></p>
                        
                        <p> Tên đăng nhập :<b>'.$user->email.'</b></p>
                        
                        <p>  Mật khẩu :<b>123456</b></p>';
        
                        require_once('class.phpmailer.php');                 
                        require_once('class.pop3.php');                 
                        define('GUSER', 'rasu666@gmail.com');          // Email                
                        define('GPWD', 'cogangtopweb@2012');                 // Password
                        global $message;
                        function smtpmailer($to, $from, $from_name, $subject, $body)
                        {
                            $mail = new PHPMailer();                  // tạo một đối tượng mới từ class PHPMailer
                            $mail->IsSMTP();                         // bật chức năng SMTP
                            $mail->SMTPDebug =0;                      // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
                            $mail->SMTPAuth = true;                  // bật chức năng đăng nhập vào SMTP này
                            $mail->SMTPSecure = 'ssl';                 // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
                            $mail->Host = 'smtp.gmail.com';         // smtp của gmail
                            $mail->Port = 465;                         // port của smpt gmail
                            $mail->Username = GUSER;  
                            $mail->Password = GPWD;           
                            $mail->SetFrom($from, $from_name);
                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($to);
                            if(!$mail->Send())
                            {
                                $message = 'Gởi mail bị lỗi: '.$mail->ErrorInfo; 
                                return false;
                            } 
                    		else 
                    		{
                                $message = 'Thư của bạn đã được gởi đi ';
                                return true;
                            }
                        }
                        smtpmailer($email, "rasu666@gmail.com", "", "vietnamcrew.com.vn",$noidung);
        			}
        		?>
                <div id="error_register">
            	<fieldset>
            		<legend>Thông báo hệ thống</legend><?php 
        				echo $error_changepass;
        				?>
                </fieldset>
                </div>
        		<?php
                }
      		?>
            <br />
            <form method="post" action="<?php echo site_url('thanhvien/doforgetuv'); ?>">
                <label style="width:60px;padding-left:130px;" for="txtold">Email</label>
                <input class="input2" type="text" value="" name="email" />
                <span class="info_e">Nhập chính xác Email dùng để đăng ký tài khoản</span>
                <br /><br />
                <div style="padding-left:158px;">
                    <input id="reset" class="button" type="submit" value="Xác nhận" />
                    <input id="reset" class="button" type="reset" value="Làm lại" />
                </div>
                <br />
            </form>
        </div>
        <br />
    </div>
</div>