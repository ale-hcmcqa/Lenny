<div id="top">
    <!-- Logo -->
        <div class="logo"> 
        <a  name="Top" title="by TanLCFE" class="tooltip"><img src="assets/logo.png" alt="Wide Admin" height="82" /></a> 					</div>
    <!-- End of Logo -->
    <!-- Meta information -->
    <div class="meta">
        <p>Xin chào <?php echo $_SESSION['username'];?></p>
        <ul>
            <li><a href="<?php echo site_url()?>adminhp/logout" title="" class="tooltip"><span class="ui-icon ui-icon-power"></span>Thoát</a></li>
            <li><a href="#" title="Thay đổi cài đặt hiện tại" class="tooltip"><span class="ui-icon ui-icon-wrench"></span>Cài đặt</a></li>
            <li><a href="<?php echo site_url()?>adminhp/viewContent/tbladmin" title="Thay đổi thông tin tài khoản của bạn." class="tooltip"><span class="ui-icon ui-icon-person"></span>Tài khoản</a></li>
        </ul>	
    </div>
    <!-- End of Meta information -->
</div>