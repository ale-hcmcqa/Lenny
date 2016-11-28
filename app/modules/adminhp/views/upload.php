<?PHP
if(isset($primaryKey))
{
	$lastest_id=$primaryKey;
}
?>
<hr />
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{ 
$('#photoimg').live('change', function()	
{ 
$("#preview").html('');
$("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
}); 
</script>
<style>
#anh_khachsan td
{
	padding:3px 5px;
}
#ten
{
	width:200px
}
</style>
<h3><b>Nhập Màu sắc cho hình ảnh</b></h3>
	<table id="anh_khachsan">
		<tr style="padding-bottom:10px;">
        	<td><b>Chọn màu sắc</b></td>
        	<td>
                <input type="hidden" name="id" id="id" value="<?php echo $lastest_id; ?>" />
        		<select name="mausac" id="mausac">
        			<option value="-1">Chọn màu sắc</option>
        			<?php 
        				$this->db->where('status',0);
        				$sqlmausacchon=$this->db->get('tblmausac');
        				if ($sqlmausacchon->num_rows()>0) 
        				{
        					foreach ($sqlmausacchon->result() as $itemmausacchon) 
        					{
        					?>
        					<option value="<?php echo $itemmausacchon->id;?>"><?php echo $itemmausacchon->tenmau;?></option>
        					<?php
        					}
        					$sqlmausacchon->free_result();
        				}
        			?>
        		</select>
        	</td>
        </tr>	    	                
    <tr style="padding-bottom:10px;">
            <td><b>Giá</b></td>            
            <td><input type="text" value="" name="gia" id="gia" /></td>
        </tr>
        <tr style="padding-bottom:10px;">
        	<td colspan="2">
        		<input class="button" id="nhap" type="submit" value="Nhập">
            </td>
        </tr>
        <td><td colspan="2"><div id="loadding"></div></td></td>
    </table>
    <script>
	  jQuery("#nhap").click(function() { 
		//$("#loadding").html('<img src="images/loader.gif" alt="Uploading...."/>');
        var id = jQuery("#id").val();
        var mausac=jQuery("#mausac").val();							  	
        var gia = jQuery('#gia').val();
		if(mausac=='-1')
		{
			alert('Bạn chưa chọn màu sắc');
			return false;
		}
		else
		{			
            jQuery.ajax({
                                     cache:false,
                                     type:"POST",
                                     data: {id : id,mausac: mausac,gia : gia},
                                     url:"<?php echo site_url('adminhp/themanh');?>", 
                                     success:function(html){                                     
                                        alert("Cám ơn bạn đã gửi phản hồi");
                                       // jquery("#listphanhoi").hide();
                                     }                                                          
                               });  
		}
		return false;
	  }); 
</script>
    