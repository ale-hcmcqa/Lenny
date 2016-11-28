<div class="box_center">
    <div class="box_center_top">
    <p>Chi tiết đơn hàng</p>
   	</div>
	<div class="box_center_main">
		<br>
		<?php 
			if(isset($id))
			{
				$this->db->where('id',$id);
				$sqldonhangct=$this->db->get('tblorder')->row();
				?>
				<p><strong>Mã đơn hàng</strong>:&nbsp;<?php echo $sqldonhangct->ma; ?></p>				
				<p><strong>Người đăng</strong>:&nbsp;
					<?php 
					$this->db->where('id',$sqldonhangct->nguoidang);
					$sqlnguoidangd=$this->db->get('tbluser')->row();
					echo $sqlnguoidangd->nguoidang; 
					?>
				</p>
				<div>
					<?php echo $sqldonhangct->sanpham; ?>
				</div>
				<?php
			}
		?>
		<p></p>
	</div>
</div>