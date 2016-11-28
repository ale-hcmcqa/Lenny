<div class="box_center">
	<div class="box_center_top">
		<p>Kiểm tra mã hàng</p>
	</div>
	<div class="box_center_main">
		<?php 
			if(isset($mah))
			{
			?>
			<table id="checkmo">
				<tr>
					<th>Mã</th>			
					<th>Họ tên</th>
					<th>Email</th>
					<th>Người đăng</th>
					<th>Địa chỉ</th>
					<th>Địện thoại</th>
					<th>Trạng thái</th>
					<th>Chi tiết</th>
				</tr>
				<tr>
					<td><?php echo $mah->ma; ?></td>
					<td><?php echo $mah->hoten; ?></td>
					<td><?php echo $mah->email; ?></td>
					<td><?php echo $mah->nguoidang; ?></td>
					<td><?php echo $mah->diachi; ?></td>
					<td><?php echo $mah->dienthoai; ?></td>
					<td>
						<?php 
						if($mah->status==1)
						{
							echo 'Chưa duyệt';
						}
						else
						{
							echo 'Đã duyệt';
						}
						?>
					</td>
					<td><a href="<?php echo site_url('sanpham/checkhang/'.$mah->id); ?>" title="Xem chi tiết">Xem chi tiết</a></td>
				</tr>	
			</table>
			<?php 
			}
		?>		
	</div>
</div>	