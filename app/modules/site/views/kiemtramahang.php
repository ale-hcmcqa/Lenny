<div class="box_center">
	<div class="box_center_top">
		<p>Kiểm tra mã hàng</p>
	</div>
	<div class="box_center_main">
		<div id="checkma">
			<p>Nhập mã đơn hàng</p>
			<form name="frmcheckma" method="POST" action="<?php echo site_url('site/docheckdonhang'); ?>">
				<input type="text" name="ma" value="" placeholder="Nhập mã đơn hàng">
				<input type="submit" name="submit" value="Tìm kiếm">
			</form>
		</div>
	</div>
</div>