<?php
$CI= & get_instance();
$CI->db->where('sanpham',$primaryKey);
$images=$CI->db->get('anh')->result();
$this->load->view('upload');
foreach($images as $item)
{
?>
<div style="display:block; clear:all;border-bottom:1px solid #ddd;padding:10px 0;">
	<?php 
		$this->db->where('id',$item->tenmau);
		$sqlmau=$this->db->get('tblmausac')->row();
	?>
	<a style="float:left;" target="_new" href="<?php echo base_url().$item->duongdan;?>" class="tooltip" title="<img  src='<?php echo base_url().$item->duongdan;?>'>">Giá:&nbsp;<?php echo $item->gia; ?></a> <br>
	<p>Màu sắc:&nbsp;<?php echo $sqlmau->tenmau; ?></p>
	<div style="clear:both;"></div>
<a href="<?php echo site_url('adminhp/deleteGalleryImage/'.$primaryKey.'/'.$item->id); ?>">Xóa</a>
<!-- <a id="sua<?php echo $item->id; ?>">Sửa</a>
<div style="display:none;" id="content_sua<?php echo $item->id; ?>">
	<table>
		<tr>
			<td>Tên ảnh</td>
			<input type="hidden" name="ids<?php echo $item->id; ?>" id="ids<?php echo $item->id; ?>" value="<?php echo $item->id; ?>">
			<td><input type="text" name="tens<?php echo $item->id; ?>" value="<?php echo $item->duongdan; ?>" id="tens<?php echo $item->id; ?>"></td>
		</tr>
		<tr>
			<td>Giá</td>
			<td><input type="text" name="gias<?php echo $item->id; ?>" value="<?php echo $item->gia; ?>" id="gias<?php echo $item->id; ?>"></td>
		</tr>
		<tr>	
			<td></td>		
			<td><a style="cursor: pointer;" id="thaydoi<?php echo $item->id; ?>">Thay đổi</a></td>
		</tr>
	</table>
</div> -->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#sua<?php echo $item->id; ?>").click(function(){
			jQuery("#content_sua<?php echo $item->id; ?>").css('display','block');
		});
	});
</script>
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#thaydoi<?php echo $item->id;?>").click(function(){
				var ids=jQuery("#ids<?php echo $item->id; ?>").val();
				var tens=jQuery("#tens<?php echo $item->id; ?>").val();
				var gias=jQuery("#gias<?php echo $item->id; ?>").val();
				jQuery.ajax({
	                 cache:false,
	                 type:"POST",
	                 data: {ids : ids,tens: tens,gias : gias},
	                 url:"<?php echo site_url('adminhp/suaanh');?>", 
	                 success:function(html){                                     
	                    window.location.reload();
	                   // jquery("#listphanhoi").hide();
	                 }                                                          
	           }); 
           }); 
		});
	</script>
</div>
<?php
}
echo '<hr />';


?>


