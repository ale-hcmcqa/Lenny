<link rel="stylesheet" type="text/css" href="css/uploadify.css" media="all" />
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['vi'] = {

		closeText: 'Đóng',

		prevText: '&#x3c;Trước',

		nextText: 'Tiếp&#x3e;',

		currentText: 'Hôm nay',

		monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

		'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

		monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

		'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

		dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

		dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

		dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

		weekHeader: 'Tu',

		dateFormat: 'dd-mm-yy',

		firstDay: 0,

		isRTL: false,

		showMonthAfterYear: false,

		yearSuffix: ''};

	$.datepicker.setDefaults($.datepicker.regional['vi']);

});
$(function() {					
    $( "#datepicker" ).datepicker(); 
    $.datepicker.setDefaults($.datepicker.regional['vi']);   
});                                        
</script>
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
    <h2>Cập nhật thành công!</h2>
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
if(isset($upload))
{
    $this->load->view('list_images');
}
echo '<form method="post" name="frmAddContent" action="'.site_url().'/adminhp/doeditcontent/'.$table_name.'/'.$primaryKey.'" enctype="multipart/form-data">';
						//Lấy các nhãn cho form element
						$getLabels=element($table_name,$labels);
						if(count($getLabels)==0)
						{
							echo 'Bạn chưa điền đầy đủ thông tin tại adminhp/config/config.php';
							return;
						}
						$i=0;
						foreach($getLabels as $label)
						{
							$setLabels[$i]=$label;
							$i++;
						}
						$i=0;
						$j=1;
						//Hiển thị form nhập dữ liệu
						$column=array();
						if($column_type!=NULL)
						{
							do
							{
								$column['Name']=key($column_type);
							}while(next($column_type));						
						}
						foreach($fields as $field)
						{
							if(element($field->Field,$column_type))
							{
								$column['Type']=element($field->Field,$column_type);
								if($column['Type'][0]=='radio')
								{
									echo '<p><strong>'.$setLabels[$i].'</strong><br>';
									$count=0;
									do
									{
										if($editContent[$field->Field]==key($column['Type'][1]))
										{
											echo '<input type="radio" name="'.$field->Field.'" checked="checked" value="'.key($column['Type'][1]).'" />';
										}
										else
										{
											echo '<input type="radio" name="'.$field->Field.'" value="'.key($column['Type'][1]).'" />';
										}
										echo $column['Type'][1][key($column['Type'][1])];
										$count++;
									}while(next($column['Type'][1]));
									echo '</p>';
								}elseif($column['Type'][0]=='dropdown')
								{
										//Danh mục bv 1
									 if(($setLabels[$i]=='Danh mục bài viết cấp 1'))
										{
												echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmuc1">';
												echo '<option value="0">--Chọn danh mục--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}
												echo '</select>';?>
										<script language="javascript">
										jQuery(document).ready(function() {
                            				    jQuery('#cmbdanhmuc1').change(function() {
                               					    giatri = this.value;
                                   					jQuery('#cmbdanhmuccon').load('<?php echo site_url().'/site/loadcate2/'; ?>' + giatri);
                                                    jQuery('#cmbdanhmuc3').load('<?php echo site_url().'/site/loadcate3/'; ?>' + giatri);
                                                   // jQuery('#cmbdanhmuc4').load('<?php echo site_url().'/site/loadcate4/'; ?>' + giatri);
                                   	 			});
                                 			});
										</script> 
                                      <?php 
										 }
										 elseif(($setLabels[$i]=='Danh mục bài viết cấp 2'))
										{
												echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmuccon">';
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}
												echo '</select>';
                                        ?>										
                                      <?php 
										 }
										 elseif ($setLabels[$i]=='Danh mục bài viết cấp 3')
										 {
											    echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmuc3">';
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';
											
										 }
                                         elseif(($setLabels[$i]=='Danh mục sản phẩm cấp 1'))
                                         {
                                            	echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmucsp1">';                                                
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);	
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';
                                         ?>
                                         <script language="javascript">
                             			    jQuery(document).ready(function() {
                            				    jQuery('#cmbdanhmucsp1').change(function() {
                               					    giatri = this.value;
                                   					jQuery('#cmbdanhmucspcon').load('<?php echo site_url().'/site/loadcatesp2/'; ?>' + giatri);                                                   
                                   	 			});
                                 			});
                                  		</script>	
                                         <?php                                            
                                         }
                                         elseif ($setLabels[$i]=='Danh mục sản phẩm cấp 2')
                                         {
                                            echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmucspcon">';
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);	
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';
                                                ?>
                                                <script language="javascript">
                                     			    jQuery(document).ready(function() {
                                    				    jQuery('#cmbdanhmucspcon').change(function() {
                                       					    giatri = this.value;
                                           					jQuery('#cmbdanhmucspcon3').load('<?php echo site_url().'/site/loadcatesp2/'; ?>' + giatri);                                                   
                                           	 			});
                                         			});
                                          		</script>	
                                                <?php      
                                         }
                                         elseif ($setLabels[$i]=='Danh mục sản phẩm cấp 3')
                                         {
                                            echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmucspcon3">';
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);	
													if($editContent[$field->Field]==$item->$name)	
													{
														echo '<option value="'.$item->$name.'" selected="selected">';
													}
													else
													{
														echo '<option value="'.$item->$name.'" >';
													}
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';      
                                         }
										 //Danh mục bv 2
										 elseif ($setLabels[$i]=='Danh mục BV cấp 2')
										 {
													echo '<p><strong>'.$setLabels[$i].'</strong><br>';
													$count=0;
													$CI=&get_instance();
													$CI->load->model('site/site_model');
													$danhmuccha=$CI->site_model->getdm2($editContent[$field->Field]);
													if($danhmuccha->num_rows()>0)
													{
													$id=$danhmuccha->row()->danhmuc;
													$query=$CI->site_model->getdm12($id);
													 echo '<select name="'.$field->Field.'" id="baiviet2" class="input">';
																			 foreach($query->result() as $con)
																			 {
																			if($editContent[$field->Field]==$con->id)	
																				{
																			 echo '<option value="'.$con->id.'" selected="selected" >'.$con->danhmucbaivietcap2.'</option>';
																				}
																				else
																				{
																			 echo '<option value="'.$con->id.'" >'.$con->danhmucbaivietcap2.'</option>';
																				}	
																			}				
													echo '</select>';
													}
													else
													{
														echo '<select name="'.$field->Field.'" id="baiviet2" class="input">';
														echo '<option value="0" selected="selected" ></option>';
														foreach($column['Type'][1] as $item)
														{
															$name = key($item);
															if($editContent[$field->Field]==$item->$name)	
															{
																echo '<option value="'.$item->$name.'" selected="selected">';
															}
															else
															{
																echo '<option value="'.$item->$name.'" >';
															}
															next($item);
															$name = key($item);	
															echo $item->$name;
															echo '</option>';
														}
														echo '</select>';
													}
											?>
										<script language="javascript">
										jQuery(document).ready(function(){
																		jQuery("#baiviet2").change(function(){
																		jQuery("#baiviet3").load("<?php echo site_url().'/site/baiviet23/'?>"+jQuery(this).val());
																		});
																		});
										</script> <?PHP
										 }
										 //Danh mục bv 3
										 elseif ($setLabels[$i]=='Danh mục BV cấp 3')
										 {
													echo '<p><strong>'.$setLabels[$i].'</strong><br>';
													$count=0;
													$CI=&get_instance();
													$CI->load->model('site/site_model');
													$danhmuccha=$CI->site_model->get3($editContent[$field->Field]);
													if($danhmuccha->num_rows()>0)
													{
													$id=$danhmuccha->row()->danhmucbaivietcap2;
													$query=$CI->site_model->getcate3($id);
													 echo '<select name="'.$field->Field.'" id="baiviet3" class="input">';
																			 foreach($query->result() as $con)
																			 {
																			if($editContent[$field->Field]==$con->id)	
																				{
																			 echo '<option value="'.$con->id.'" selected="selected" >'.$con->danhmucbaivietcap3.'</option>';
																				}
																				else
																				{
																			 echo '<option value="'.$con->id.'" >'.$con->danhmucbaivietcap3.'</option>';
																				}	
																			}				
													echo '</select>';
													}
													else
													{
														echo '<select name="'.$field->Field.'" id="baiviet3" class="input">';
														echo '<option value="0" selected="selected" ></option>';
														foreach($column['Type'][1] as $item)
														{
															$name = key($item);
															if($editContent[$field->Field]==$item->$name)	
															{
																echo '<option value="'.$item->$name.'" selected="selected">';
															}
															else
															{
																echo '<option value="'.$item->$name.'" >';
															}
															next($item);
															$name = key($item);	
															echo $item->$name;
															echo '</option>';
														}
														echo '</select>';
													}
											?>
										<script language="javascript">
										jQuery(document).ready(function(){
																		jQuery("#baiviet2").change(function(){
																		jQuery("#baiviet3").load("<?php echo site_url().'/site/baiviet23/'?>"+jQuery(this).val());
																		});
																		});
										</script> <?PHP
										 }
										 else
										 {
									
											echo '<p><strong>'.$setLabels[$i].'</strong><br>';
											$count=0;
											echo '<select name="'.$field->Field.'">';
                                            echo '<option value="0">--Chọn danh mục--</option>';
											foreach($column['Type'][1] as $item)
											{
												$name = key($item);
												if($editContent[$field->Field]==$item->$name)	
												{
													echo '<option value="'.$item->$name.'" selected="selected">';
												}
												else
												{
													echo '<option value="'.$item->$name.'" >';
												}
												next($item);
												$name = key($item);	
												echo $item->$name;
												echo '</option>';
											}
											echo '</select>';
										 }
										 echo '</p>';
								}
								elseif($column['Type'][0]=='upload')
								{
									echo '<p><strong>'.$setLabels[$i].'</strong><br>';
									echo '<a target="_new" href="'.base_url().$editContent[$field->Field].'" class="tooltip" title="<img width=500 src='.base_url().$editContent[$field->Field].'>"><img src="'.base_url().$editContent[$field->Field].'" width="220" ></a>';
									echo '<br>';
									echo '<input type="hidden" value="'.$editContent[$field->Field].'"  name="hid'.$field->Field.'" />';
									echo '<input class="fileUpload" type="file"  name="'.$field->Field.'" /></p>';
								}
								elseif($column['Type'][0]=='password')
								{
									echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="password" name="'.$field->Field.'" /></p>';
									echo '<p><strong>Xác nhận '.$setLabels[$i].'</strong><br><input type="password" name="re'.$field->Field.'" /></p>';
								}
							}
							elseif($field->Key=='PRI')
							{
								echo '<input type="hidden" name="'.$field->Field.'" value="'.$editContent[$field->Field].'" />';
							}
							elseif($field->Type=='date')
							{
								$getdate=explode('-',$editContent[$field->Field]);
								$redate=$getdate[2].'-'.$getdate[1].'-'.$getdate[0];
                                if($field->Field=='ngaydang' || $field->Field=='ngaynhanphong' || $field->Field=='ngaytraphong')
                                {
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker" name="'.$field->Field.'" value="'.$redate.'" /></p>';
                                }
                                elseif($field->Field=='ngaynhanhoso')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker1" name="'.$field->Field.'" value="'.$redate.'" /></p>';    
                                }
                                elseif($field->Field=='hannhanhoso')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker2" name="'.$field->Field.'" value="'.$redate.'" /></p>';    
                                }
							}
							elseif(substr($field->Type,0,3)=='int' || substr($field->Type,0,4)=='real' || substr($field->Type,0,5)=='float'|| substr($field->Type,0,6)=='double') 
							{
							if(($setLabels[$i]=='Lượt xem') || ($setLabels[$i]=='Lượt yêu thích'))
							{
							echo '<p style="display:none;"><strong>'.$setLabels[$i].'</strong><br><input maxlength="10" style="text-align:right; width:100px;" value="'.$editContent[$field->Field].'" type="text" name="'.$field->Field.'" /></p>';
							}
							else
							{
								echo '<p><strong>'.$setLabels[$i].'</strong><br><input maxlength="10" style="text-align:right; width:100px;" value="'.$editContent[$field->Field].'" type="text" name="'.$field->Field.'" /></p>';
							}
							}
							elseif(substr($field->Type,0,7)=='varchar')
							{
								if($field->Field=='giodang')
								{
									date_default_timezone_set('Asia/Saigon');	
									$today = date('g:i A'); 
									echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" value="'.$today.'" /></p>';
								}
								elseif($field->Field=='anh_thumb')
								{
									echo '<p style="display:none;"><strong>'.$setLabels[$i].'</strong><br><textarea type="text" name="'.$field->Field.'" value="" style=" width:500px; height:150px; padding: 5px"/>'.$editContent[$field->Field].'</textarea></p>';
								}
								elseif($field->Field=='linkvideo' || $field->Field=='tag'||$field->Field=='tomtat' || $field->Field=='tomtaten' || $field->Field=='tomtatcn' || $field->Field=='googleantic')
								{
									echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea type="text" name="'.$field->Field.'" value="" style=" width:500px; height:100px; padding: 5px"/>'.$editContent[$field->Field].'</textarea></p>';
								}
                                elseif($field->Field=='nguoidang')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" value="'.$editContent[$field->Field].'" readonly="true" style="text-align:right" /></p>';     
                                }
                                elseif($field->Field=='password' && $table_name=="tbladmin")
                                {
                                    echo '<p style="display:none;"><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" value="'.$editContent[$field->Field].'" readonly="true" style="text-align:right" /></p>';   
                                }
                                elseif($field->Field=='matkhau' && $table_name=="tbluser")
                                {
                                    echo '<p style="display:none;"><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" value="'.$editContent[$field->Field].'" readonly="true" style="text-align:right" /></p>';   
                                }
                                elseif($field->Field=='chucnang')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong></p>';
                                    ?>                                    
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
                                    <div class="role_item1">
                                        <input type="checkbox" name="chkfull" onclick="checkall('chrole', this)" /><label>Chọn tất cả</label>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="request-formr">
                                    <?php                                    
                                    $demchk=1;
                                    $this->db->where('status',0);
                                    $sqlchucnanghp=$this->db->get('tblchucnang');
                                    foreach($sqlchucnanghp->result() as $itemchucnanghp)
                                    {      
                                        $editrole=explode(',',$editContent[$field->Field]); 
                                        $ok=0;
                                        foreach($editrole as $itemrole)
                                        {
                                            if(($itemchucnanghp->id)==$itemrole)
                                            {
                                                $ok=1;
                                                break;
                                            }
                                        }   
                                    ?>
                                    <div class="role_item"<?php if($demchk%4==0){ ?>style="margin-right:0;"<?php } ?>>
                                        <input type="checkbox" name="chrole[]" <?php if($ok==1){ ?>checked="checked"<?php } ?> class="chrole" value="<?php echo $itemchucnanghp->id; ?>" /><label><?php echo $itemchucnanghp->chucnang; ?></label>
                                        <div class="clearfix"></div>
                                    </div>                                    
                                    <?php
                                    $demchk++;
                                    }
                                    echo '<div style="clear: both;"></div>';
                                    echo '</div>';
                                }
                                elseif($field->Field=='role')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong></p>';
                                    ?>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#frmAddContent').submit(function(){
                                                if(!$('#request-formr input[type="checkbox"]').is(':checked')){
                                    				alert("Bạn chưa chọn quyền.");
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
                                    <div class="role_item1">
                                        <input type="checkbox" name="chkfull" onclick="checkall('chrole', this)" /><label>Full quyền</label>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="request-formr">
                                    <?php                                    
                                    $demchk=1;
                                    foreach($table_list as $h=>$v)
                                    {      
                                        $editrole=explode(',',$editContent[$field->Field]); 
                                        $ok=0;
                                        foreach($editrole as $itemrole)
                                        {
                                            if(($h.'.'.$v)==$itemrole)
                                            {
                                                $ok=1;
                                                break;
                                            }
                                        }   
                                    ?>
                                    <div class="role_item"<?php if($demchk%4==0){ ?>style="margin-right:0;"<?php } ?>>
                                        <input type="checkbox" name="chrole[]" <?php if($ok==1){ ?>checked="checked"<?php } ?> class="chrole" value="<?php echo $h.'.'.$v; ?>" /><label><?php echo $v; ?></label>
                                        <div class="clearfix"></div>
                                    </div>                                    
                                    <?php
                                    $demchk++;
                                    }
                                    echo '<div style="clear: both;"></div>';
                                    echo '</div>';
                                }
                                elseif($field->Field=='meta_des')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea onkeyup="return displayWordCounter();" type="text" name="'.$field->Field.'" style=" width:500px; height:150px; padding: 5px">'.$editContent[$field->Field].'</textarea></p>';                                    
                                ?>
                                <div class="total_count">Meta description tối đa:
                                    <input class="show_count" name="totalWordLimit" size="4" readonly="true" value="150" type="text">
                                </div>                                
                                <?php        
                                }
                                elseif($field->Field=='meta_title')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input onkeyup="return displayWordCounter1();" style="width:300px;" type="text" name="'.$field->Field.'" value="'.$editContent[$field->Field].'"></p>';
                                    ?>
                                    <div class="total_count">Meta title tối đa:
                                    <input class="show_count1" name="totalWordLimit1" size="4" readonly="true" value="70" type="text">
                                </div>  
                                    <?php    
                                }
                                elseif($field->Field=='mau')
								{
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" style="width:100px;" id="colorpickerField1" value="'.$editContent[$field->Field].'"/></p>';
								}
								else
								{
								echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" style="width:250px;"  value="'.$editContent[$field->Field].'" name="'.$field->Field.'" /></p>';
								}
							}
							elseif($field->Type=='text')
							{
							     if($field->Field=='anhnho' && $table_name=='tblsanpham')
                                 {
                                 ?>
                                 <p><strong>Hình ảnh sản phẩm</strong></p>
                                 <div class="row-field">
                            		<div class="field-content">
                            			<div id="portfolio" class="block-input-append">                   
                                                <div class="title-clear"></div>
                                                <div id="queue"></div>
                                                <input id="file_upload" name="file_upload" type="file" multiple="true"/>                    
                                                 <ul id="sortable">  
                                                    <div class="ci-message"></div>
                                                    <?php 
                                                    if(!empty($editContent[$field->Field])){
                                                    $images1 =json_decode($editContent[$field->Field]); 
                                                    if(is_array($images1) && count($images1)>0){
                                                        foreach ($images1 as $image1) {	
                                                        ?>
                                                                <li>                                       
                                                                       <img class="img-thumb" width="131px"
                                                                           src="<?php echo  base_url().'upload/resized'.'/' . $image1; ?>" />                                   
                                                                            
                                                                    <input type="hidden" name="image_filename[]"
                                                                           value="<?php echo $image1 ?>" /> <br />			
                                                                   
                                                                    <a href="javascript:void(0)" class="remove" onclick="removeImage(this)" >Remove</a>
                                                                </li>
                                                        <?php
                                                        }
                                                    }
                                                    }
                                                    ?>                        
                                                </ul>
                                            </div>			
                            		</div>
                            	</div>
                                 <?php   
                                 }
                                 else
                                 {
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea id="editor'.$j.'"  name="'.$field->Field.'">'.$editContent[$field->Field].'</textarea></p>';
                                 }
								$j++;

							}
							if($column_type!=NULL)
							{
									next($column_type);
							}
        $i++;
    }
    echo '<br>';
    echo '<p><input class="myButton" type="submit" value="Sửa" />
    <input class="myButton" type="reset" value="Xóa" /></p>';
    echo '</form>';
?>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script >
<script type="text/javascript" src="js/mootools-core.js"></script >
<script type="text/javascript" src="js/mootools-more.js"></script >
<script type="text/javascript">
	 window.addEvent('domready', function(){
        reNewItem();
       
    });
	<?php $timestamp = time();?>
	$(function() {
		$('#file_upload').uploadify({
			'formData'      : {
				'timestamp' : '<?php echo $timestamp; ?>',
				'token'     : '<?php echo md5('unique_salt' . $timestamp); ?>',
				'sessionid' : '<?php echo session_id(); ?>'
			},
			'buttonText' 	: 'Chèn ảnh ...',
			'width'   		: 180,
            'auto'          : true,
            'multi'         : true,
			'swf'           : 'images/uploadify.swf',
			'uploader'      : '<?php echo base_url() ?>uploadify.php',
            'onProgress'   : function(file, e) {
            
            },
			'onUploadSuccess' : function(file, data, response) {
				// Et ici
               $("#gallery").load("ajax/gallery.php");
                  var data =  $.parseJSON(data);
                  var item = data.files;
                  if (data.success) {
              
                       var html = '<li>';                                   
                                    html += '<img class="img-thumb" width= "140px" src="<?php echo base_url() . 'tmp/'; ?>'+item.filename+'" />';
                                    html += '<input type="hidden" name="image_id[]" value="0" />';
                                    html += '<input type="hidden" name="image_filename[]" value="'+item.filename+'" /><br/>';				
                                    html +='<a href="javascript:void(0)" class="remove" onclick="removeImage(this)" >Remove</a>';
                           html += '</li>';
                              console.log(html); 
                     $('#sortable').append(html);
                     $('#sortable li:last-child ').find('a.edit').data('title', item.title);								 
                        reNewItem();                                                  
                   }
			} 
		});
	});
       
    function removeImage(el)
    {   
    
        jQuery(el).parent().fadeOut(function(){
             jQuery('.ci-message').append('Delete photo').show().fadeOut();
            jQuery(this).remove();
       });
    }	 
     function reNewItem(){      
        new Sortables('#sortable', {
            clone: true,
            revert: true,
            opacity: 0.3
        });
    }
</script>