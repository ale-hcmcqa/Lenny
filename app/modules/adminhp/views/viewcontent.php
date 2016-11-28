<?php
    echo ' <div class="message information close">
    <h2>'.element($table_name,$table_list).'</h2>
    <p><em>* Hiển thị toàn bộ dữ liệu trong '.element($table_name,$table_list).'.</em></p>
    </div>';
    if(isset($message['error']))
    {
        echo '<div class="message error close">
        <h2>Lỗi!</h2>
        <p>'.$message['eror'].'</p>
        </div>';	
    }
    if(isset($message['success']))
    {
        echo '<div class="message success close">
        <h2>Nhập dữ liệu thành công!</h2>
        <p>'.$message['success'].'</b></p>
        </div>';
    }
    if(isset($message['warning']))
    {
        echo '<div class="message warning close">
        <h2>Chú ý!</h2>
        <p>'.$message['warning'].'</p>
        </div>';	
    }
    $viewTable=element($table_name,$labels);
    $fieldName=array();
    $counter=0;
    do
    {
        $fieldName[$counter]=key($viewTable);	
        $counter++;
    }while(next($viewTable));
    ?>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#frm_viewcontent').submit(function(){
            if(!$('#request-form input[type="checkbox"]').is(':checked')){
				alert("Bạn chọn ít nhất 1 bản ghi.");
 			 return false;
			}
		});
	});
</script>     
    <script language="javascript">
	function checkall(class_name,obj)
	{
		var items=document.getElementsByClassName(class_name);
		if(obj.checked == true)
		{
			for(i=0;i<items.length;i++)
				items[i].checked=true;
		}
		else
		{
			for(i=0;i<items.length;i++)
				items[i].checked=false;						
		}
	}	
</script>	          
<form method="post" name="frmAddContent" action="<?php echo site_url().'adminhp/dosearchcontent/'.$table_name; ?>" enctype="multipart/form-data">
    <span>Nhập từ cần tìm kiếm:&nbsp;</span><input type="text" name="search" style="margin-bottom: 10px; margin-right:5px; width:300px" /><span><a  style="font-size:12px; color:#06C; text-decoration:none" href="<?php echo site_url().'/adminhp/search_status/'.$table_name; ?>" class="tooltip" title="Xem các bản ghi chưa được hiển thị">**Các bản ghi chưa được hiển thị</a></span>	<br />				
    <span style="margin-right: 37px;">Tìm kiếm theo:</span><select name="compare" style="margin-bottom: 10px; margin-right:5px;">
    <?php
        foreach ($viewTable as $key => $value)
        // Get fields and lables of table;
        {
    ?>
    <option value="<?php echo $key;?>"><?php  echo $value; ?></option>
    <?php
        }
    ?>
    </select><br />
    <p><input class="myButton" type="submit" value="Tìm kiếm" />
    <input class="myButton" type="reset" value="Xóa dữ liệu" /></p>
</form>
<form name="frm_viewcontent" id="frm_viewcontent" method="post" action="<?php echo site_url('adminhp/deleteallcontent/'.$table_name); ?>">
<?php 
    if($table_name=='tblmeta' || $table_name=='tblthongtincongty')
    {
        
    }   
    else
    { 
?>
<div class="register-complete" align="left" style="margin-bottom:10px">
    <input name="delete" type="submit" id="delete" value="" title="Xóa tất cả"/>
    <?php 
        if($table_name=='tbllienhe' || $table_name=='tblorder')
        {}
        else
        {
    ?>
    <a title="Thêm mới" class="nut_themmoi" href="<?php echo site_url('adminhp/addContent/'.$table_name); ?>"></a>
    <?php 
    }    
    ?>    
    <div style="clear: both;"></div>
</div>
<?php 
}
?>
<table class="contentTable1 sortable1" width="100%" style="border:1px solid #ccc">
    <tr style="cursor:pointer;">
    <?php 
        if($table_name=='tblmeta' || $table_name=='tblthongtincongty')
        {
            
        }       
        else
        {
    ?>
    <td class="sorttable_nosort" height="30" width="10" style="font-weight:bold; font-size:12px; color:white; " align="center" valign="middle" bgcolor="#272727"><input type="checkbox" onclick="checkall('checkbox', this)" name="check" /></td>
    <?php 
    }
    ?>
    <?php  
    //paging
    $CI=&get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = site_url('adminhp/viewContent/'.$table_name);
    $config['uri_segment']=4;
    $config['total_rows'] = $rowCounter;
    $config['per_page'] = $rowLimit;
    $CI->pagination->initialize($config);
    echo ' <td class="sorttable_nosort" height="30" style="font-weight:bold; font-size:12px; color:white; " align="center" valign="middle" bgcolor="#272727">Sửa</td>';
    if($table_name=='tblthongtincongty')
    {
    }
    elseif($table_name=='tblmeta')
    {
    }
    elseif($table_name=='tblslidebar')
    {
    
    }    
    else
    {
        echo ' <td class="sorttable_nosort" height="30" style="font-weight:bold; font-size:12px; color:white; " align="center" valign="middle" bgcolor="#272727">Xóa</td>';
    }
    if($table_name=='tbladmin' || $table_name=='tbluser')
    {
        echo '<td height="30" style="font-weight:bold; font-size:12px; color:white; " align="center" valign="middle" bgcolor="#272727">Reset pass</td>';
    } 
    foreach($viewTable as $item) 
    { 
        if(($item=='Mật khẩu' && $table_name=='tbluser') || ($item=='Mật khẩu' && $table_name=='tbladmin') || ($item=='Chọn quyền' && $table_name=='tbladmin'))
        {}        
        else
        {
            echo ' <td height="30" style="font-weight:bold; font-size:12px; color:white; " align="center" valign="middle" bgcolor="#272727">'.$item.'</td>';
        }    
    }
?>
</tr>
<?php
    $text_field_position=array();
    $count_on_txt_field_pos=0;
    $demtung=1;
    foreach($contents as $content)
    {
        if($demtung%2==0)
        {
            echo '<tr style="font-size:12px;background:#ffffcc;">';
        }
        else
        {
            echo '<tr style="font-size:12px;background:#ccffcc;">';
        }       
        if($table_name=='tblmeta' || $table_name=='tblthongtincongty')
        {
            
        }
        else
        {
            echo '<td id="request-form"><input name="checkbox[]" type="checkbox" id="checkbox" class="checkbox" value="'.$content->$fieldName[0].'"></td>';
        }         
        echo '<td align="center"><a title="Sửa" class="edit_view" href="'.site_url().'adminhp/editContent/'.$table_name.'/'.$content->$fieldName[0].'"></a></td>';        
        if($table_name=='tblthongtincongty')
        {
            
        }
        elseif($table_name=='tblmeta')
        {
        }
        elseif($table_name=='tblslidebar')
        {
                                    
        }
        else
        {	
        ?>
        <td align="center"><a title="Xóa" class="xoa_view" onClick="return confirm('Bạn có muốn xóa thật không ?');" href="<?php echo site_url().'/adminhp/deleteContent/'.$table_name.'/'.$content->$fieldName[0]?>"></a></td>		
        <?php
        }
        if($table_name=='tbladmin')
        {
            echo '<td align="center"><a title="Đổi mật khẩu" href="'.site_url().'adminhp/doimatkhau/'.$content->$fieldName[0].'"><img src="assets/icon-48-user.png" title="Đổi mật khẩu" alt="Đổi mật khẩu"></a></td>';    
        }
        elseif($table_name=='tbluser')
        {
            echo '<td align="center"><a title="Đổi mật khẩu" href="'.site_url().'adminhp/resetmatkhau/'.$content->$fieldName[0].'"><img src="assets/icon-48-user.png" title="Đổi mật khẩu" alt="Đổi mật khẩu"></a></td>';        
        }
        for($k=0;$k<$counter;$k++)
        {
            $temp=element($fieldName[$k],$column_type);            
            if(($k==2 && $table_name=='tbladmin') || ($k==6 && $table_name=='tbladmin'))
            {}            
            elseif(($k==2 && $table_name=='tbluser'))
            {

            }          
            else
            {
                echo '<td>';
                if($temp[0]=='upload')
                {
                    if($temp[1]=='image')
                    {
                        echo '<a target="_new" href="'.base_url().$content->$fieldName[$k].'" class="tooltip" title="<img width=300 src='.base_url().$content->$fieldName[$k].'>"><img src="'.base_url().$content->$fieldName[$k].'" width="100" ></a>';
                    }
                    elseif($temp['1']=='file')
                    {
                        echo '<a target="_new" href="'.base_url().$content->$fieldName[$k].'">'.base_url().$content->$fieldName[$k].'</a>';
                    }
                }
                elseif($temp[0]=='dropdown')
                {
                    $i=0;
                    foreach($temp[1] as $item)
                    {
                        $key=key($item);
                        if(element($key,(array)$item)==$content->$fieldName[$k])
                        {
                            if($table_name=='tbl_comments')
                            {
                                echo '<a class="tooltip" target="_blank" href="'.site_url('news/getNewsById').'/'.$content->$fieldName[$k].'" title="Click để xem chi tiết" >'.$item->$fieldName[$k].'</a>';
                            }
                            else
                            {
                                echo $item->$fieldName[$k];
                            }
                            break;  
                        }
                    }
                }           
                elseif($temp[0]=='radio')
                {
                    echo $temp[1][$content->$fieldName[$k]];
                }
                else
                {
                    $getPrimaryKey=$content->$fieldName[0];
                    foreach($fields as $field)
                    {
                        if($field->Field==$fieldName[$k])
                        {
                            if($field->Type=='text')
                            {                                                      
                                echo '<a href="'.site_url('/adminhp/viewDetail/'.$table_name.'/'.$getPrimaryKey.'/'.$field->Field).'" class="button tooltip dialog_link" title="Click để xem chi tiết!"><span class="ui-icon ui-icon-newwin"></span>Chi tiết</a>';
                                echo '<div class="hidden_text">'.$content->$fieldName[$k].'</div>';                                                       
                                break;
                            }
                            if($field->Field=='ordernum')
                            {                            
                            ?>
                            <p style="float:left;width:50px;"><input id="ordernum<?php echo $content->$fieldName[0]; ?>" type="text" value="<?php echo $content->$fieldName[$k]; ?>" style="width:20px;text-align:center;">&nbsp;<a id="save_icon" class="buttom_sv" style="cursor:pointer;"><img src="assets/save.png"/></a></p>
                            <input type="hidden" name="table_nameor" id="table_nameor" value="<?php echo $table_name; ?>" />
                            <script type="text/javascript">
                                jQuery(document).ready(function(){
                                    jQuery(".buttom_sv").click(function(){                                        
                                        var ordernum=jQuery("#ordernum<?php echo $content->$fieldName[0]; ?>").val();                                        
                                        var table_nameor=jQuery("#table_nameor").val();
                                        var filter = /^([0-9])+$/;
                                        if(!filter.test(ordernum))
                                        {
                                            alert("Thứ tự chỉ nhập kiểu số");
                                            jQuery("#ordernum<?php echo $content->$fieldName[0]; ?>").focus();
                                            return false;    
                                        }
                                        else
                                        {
                                            jQuery.ajax({
                                                type:"POST",
                                                data: {ordernum : ordernum,table_nameor : table_nameor},    
                                                url: "<?php echo site_url('adminhp/sapxep/'.$content->$fieldName[0]); ?>",
                                                success: function(html){
                                                    window.location.href="<?php echo site_url('adminhp/viewContent/'.$table_name); ?>";    
                                                }                        
                                            }); 
                                        }  
                                        return false; 
                                    });        
                                });
                            </script>
                            <?php                                                                       
                            }                        
                            elseif($field->Type=='date')
                            {
                                $hoai=$content->$fieldName[$k];
                                $getdate=explode('-',$hoai);
                                $redate=$getdate[2].'-'.$getdate[1].'-'.$getdate[0];
                                echo $redate;
                            }                        
                            else
                            {
                                if(strlen($content->$fieldName[$k])>100)
                                {
                                    echo '<a href="'.site_url('/adminhp/viewDetail/'.$table_name.'/'.$getPrimaryKey.'/'.$field->Field).'" class="button tooltip dialog_link" title="Click để xem chi tiết!"><span class="ui-icon ui-icon-newwin"></span>Chi tiết</a>';
    							//	echo '<div class="hidden_text">'.$content->$fieldName[$k].'</div>';
    								break;
                                }
                                else
                                {
                                    echo $content->$fieldName[$k];
                                }
                            }
    				}
            }
        }
        echo '</td>';
    }
}
?>
</tr>
<?php	
    $demtung++;	 
    }    
?>
</table>
</form>
<?php
    echo '<div class="pagingNumber">';
    echo $CI->pagination->create_links();
    echo '</div>';					
?>
<!-- Dialog --> 
    <script>
        jQuery('.dialog_link').click(function(){
            var content=jQuery(this).siblings('.hidden_text').html();
            jQuery('#dialog').html(content);
        });
        </script>
        <div id="dialog" title="Chi tiết thông tin">
        <p>
        </p>
        </div>
<!-- End of Dialog -->
<script type="text/javascript">
    function check_status(id)
    {
        $.ajax({
		      cache:false,
              type:"POST",  
              url:"<?php echo site_url('adminhp/statushp/'); ?>", 
              data:{id : id},
			  success:function(html){				
				window.location.href ="<?php echo site_url('adminhp/viewContent/'.$table_name); ?>";
			}                                                          
	   });  
    }
</script>