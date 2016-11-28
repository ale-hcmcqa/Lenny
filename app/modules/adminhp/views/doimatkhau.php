<div class="message information close">
    <h2>Đổi mật khẩu</h2>
    <p><em>* Thông tin đổi mật khẩu.</em></p>
</div>
<?php
    if(isset($message['error']))
    {
        echo '<div class="message error close">
        <h2>Lỗi!</h2>
        <p>'.$message['error'].'</p>
        </div>';	
    }
    if(isset($message['success']))
    {
        echo '<div class="message success close">
        <h2>Đổi mật khẩu thành công!</h2>
        <p>'.$message['success'].'</b></p>
        </div>';
    }
    if(isset($id))
    {
?>
<form method="post" name="frmAddContent" action="<?php echo  site_url().'/adminhp/do_doimatkhau/' ?>" enctype="multipart/form-data">
<p>
    <strong>Tài khoản</strong>:    
    <label style="font-weight:bold;color:#3883cc;">
    <?php 
    $this->db->where('id',$id);
    $sqltaikhoanadview=$this->db->get('tbladmin');
    echo $sqltaikhoanadview->row()->username; 
    ?></label>
</p>
<p>
    <input type="hidden" name="id" value="<?php echo $sqltaikhoanadview->row()->id; ?>" />
    <strong>Mật khẩu mới:</strong>
    <br />
    <input style="width:300px;" type="password" name="matkhaumoi" value="" />
</p>
<p>
    <strong>Xác nhận mật khẩu</strong>
    <br />
    <input style="width:300px;" type="password" name="rematkhaumoi" value="" />
</p>
<p><input class="myButton" type="submit" value="Nhập" />&nbsp;&nbsp;&nbsp;<input class="myButton" type="reset" value="Xóa" /></p>
</form>
<?php 
}
?>