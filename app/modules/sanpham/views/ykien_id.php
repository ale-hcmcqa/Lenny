<?php 
if (isset($id))
{
	$this->db->where('id',$id);
	$sqlykienkh=$this->db->get('tblykienkhachhang')->row();
?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="vaotrong">
		<div class="box">
		    <div class="box_top"> 
		    	<div class="box_center_top_l">                                       
		        	<a href="" class="box_top_title">Ý kiến khách hàng - <span style="text-transform:none;">của <?php echo $sqlykienkh->hoten; ?></span></a>   
		        </div>                                                                                                                                
		    </div>         
	        <div class="box_main" style="padding:0 10px;">
	        	<div id="ykien_ct">
	        		<?php echo $sqlykienkh->tomtat; ?>
	        	</div>
	        	<div id="ykien_nd">
	        		<p id="ykien_title">Trả lời</p>
	        		<?php echo $sqlykienkh->noidung; ?>		
					<div class="clearfix"></div>
	        	</div>
	        </div>
	    </div>
	</div>
</div>	
<?php 
}
?>