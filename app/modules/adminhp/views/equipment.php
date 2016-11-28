<?php

//$CI= & get_instance();
//
//$CI->db->select('id,equipment');
//
//$equip=$CI->db->get('tbl_equipment')->result();//list all of equipment
//
//
//
//if(isset($primaryKey))
//
//{
//
//	$CI->db->select('equipid');
//
//	$CI->db->where('carid',$primaryKey);
//
//	$equip_checked=$CI->db->get('tbl_car_equip')->result();//list all of equipment
//
//	$lastest_id=$primaryKey;
//
//}
//
$tag=$this->db->get('tag');

?>



<div id="equipment">

<p><strong>Lựa chọn các tiện ích</strong></p>

<hr />

<form method="post" id="frmEquipment" name="frmEquipment">

  <table width="286" height="68">

    <?php

	

	foreach($tag->result() as $item)

	{

		echo '<tr><td height="32">'.$item->tag.'</td><td><input class="chkchecked"';

		echo ' type="checkbox" value="'.$item->id.'" name="equip[]" /></td></tr>';

	}

	

    ?>

    <tr>

      <td><input id="btnEquipment" type="submit" class="button" value="Nhập tiện ích" />

        &nbsp;</td>

      <td></td>

    </tr>

  </table>

</form>

</div>

<script>

	  $("#frmEquipment").submit(function() {  

	  	var temp = [];

	   $("input.chkchecked:checked").each(function() {

		 temp.push($(this).val()); //push each val into the array

	   });

	  	if(temp[0]!=null)

		{

			$.ajax({  

			  type: 'POST',  

			  url: '<?php echo site_url('hpbackend/addEquipment').'/'.$lastest_id?>',

			  data: {'equip[]': temp},

			  success: function() { alert('Dữ liệu cập nhật thành công!'); 

									//$('#equipment').hide('slow');

									//$('html, body').animate({scrollTop:0}, 'slow');

									} ,

			  error: function() { alert('Dữ liệu chưa được cập nhật...');  }	  

			});  

		}

		else

		{

			$('html, body').animate({scrollTop:0}, 'slow');

			alert('Hãy lựa chọn các tiện ích...');

		}

		return false;

	  }); 

</script>

<hr />

