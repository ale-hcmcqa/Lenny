<link rel="stylesheet" type="text/css" href="css/uploadify.css" media="all" /> 
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
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
		<h2>Nhập dữ liệu thành công!</h2>
		<p>'.$message['success'].'</b></p>
		</div>';
	}

	if(isset($message['information']))
	{
	   echo ' <div class="message information close">
	   <h2>Nhập dữ liệu '.element($table_name,$table_list).'</h2>
	<p><em>* Trường mã tự động tăng khi bạn Submit.</em></p>

						</div>';
						}


						if(isset($message['warning']))
						{

							echo '<div class="message error close">
							<h2>Chú ý!</h2>
							<p>'.$message['warning'].'</p>
						</div>';
						}
						//for tbl_gallery
						if(isset($upload))
                        {
                            $this->load->view('upload');
						}

						echo '<form method="post" id="frmAddContent" name="frmAddContent" action="'.site_url().'/adminhp/doaddcontent/'.$table_name.'" enctype="multipart/form-data">';
						//Lấy các nhãn cho form element
						$getLabels=element($table_name,$labels);
						if(count($getLabels)==0)
						{
							echo 'Bạn chưa nhập tên các trường trong Controller/admin/adminhp.php';
							return;

						}
						$i=0;
						foreach($getLabels as $label)
						{
							$setLabels[$i]=$label;
							$i++;

						}
						$i=0;
						$editorCounter=1;
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
										if($count==0)
										{
											echo '<input type="radio" name="'.$field->Field.'" checked="checked" value="'.key($column['Type'][1]).'" />';


										}
										else
										{
											echo '<input type="radio" name="'.$field->Field.'"  value="'.key($column['Type'][1]).'" />';
										}
										echo $column['Type'][1][key($column['Type'][1])];
										$count++;

									}while(next($column['Type'][1]));
									echo '</p>';
								}
								elseif($column['Type'][0]=='dropdown')
								{
									if(($setLabels[$i]=='Danh mục bài viết cấp 1'))
									{
												echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmuc1">';
                                                echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);	
													echo '<option value="'.$item->$name.'">';
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
                                                    //jQuery('#cmbdanhmuc3').load('<?php echo site_url().'/site/loadcate3/'; ?>' + giatri);
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
													echo '<option value="'.$item->$name.'">';
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';
                                      ?>	
                                      <script language="javascript">
                             			    jQuery(document).ready(function() {
                            				    jQuery('#cmbdanhmuccon').change(function() {
                               					    giatri = this.value;
                                   					//jQuery('#cmbdanhmuccon').load('<?php echo site_url().'/site/loadcate2/'; ?>' + giatri);
                                                    jQuery('#cmbdanhmuc3').load('<?php echo site_url().'/site/loadcate3/'; ?>' + giatri);
                                                   // jQuery('#cmbdanhmuc4').load('<?php echo site_url().'/site/loadcate4/'; ?>' + giatri);
                                   	 			});
                                 			});
                                  		</script>											 
                                      <?php 
										 }
										 //Pháp luạt 2
										 elseif ($setLabels[$i]=='Danh mục bài viết cấp 3')
										 {
											    echo '<p><strong>'.$setLabels[$i].'</strong><br>';
												$count=0;
												echo '<select name="'.$field->Field.'" id="cmbdanhmuc3">';
echo '<option value="0">--Không chọn--</option>';
												foreach($column['Type'][1] as $item)
												{
													$name = key($item);	
													echo '<option value="'.$item->$name.'">';
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';
											?>
                                      <?php 
										}
										elseif (($setLabels[$i]=='Danh mục phụ kiện cấp 1')) 
										{
											echo '<p><strong>'.$setLabels[$i].'</strong><br>';
											$count=0;
											echo '<select name="'.$field->Field.'" id="cmbdanhmucpk1">';                                                
                                            echo '<option value="0">--Không chọn--</option>';
											foreach($column['Type'][1] as $item)
											{
												$name = key($item);	
												echo '<option value="'.$item->$name.'">';
												next($item);
												$name = key($item);	
												echo $item->$name;
												echo '</option>';
											}	
											echo '</select>';
											?>
											<script language="javascript">
                                 			    jQuery(document).ready(function() {
                                				    jQuery('#cmbdanhmucpk1').change(function() {
                                   					    giatri = this.value;
                                       					jQuery('#cmbdanhmucpkcon').load('<?php echo site_url().'/site/loadcatepk2/'; ?>' + giatri);                                                   
                                       	 			});
                                     			});
                                      		</script>	
											<?php
										}
										elseif (($setLabels[$i]=='Danh mục phụ kiện cấp 2')) 
										{
											echo '<p><strong>'.$setLabels[$i].'</strong><br>';
											$count=0;
											echo '<select name="'.$field->Field.'" id="cmbdanhmucpkcon">';                                                
                                            echo '<option value="0">--Không chọn--</option>';
											foreach($column['Type'][1] as $item)
											{
												$name = key($item);	
												echo '<option value="'.$item->$name.'">';
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
													echo '<option value="'.$item->$name.'">';
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';?>
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
													echo '<option value="'.$item->$name.'">';
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
                                           					jQuery('#cmbdanhmucspcon3').load('<?php echo site_url().'/site/loadcatesp3/'; ?>' + giatri);                                                   
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
													echo '<option value="'.$item->$name.'">';
													next($item);
													$name = key($item);	
													echo $item->$name;
													echo '</option>';
												}	
												echo '</select>';   
                                         }																				 
										else
										{
											echo '<p><strong>'.$setLabels[$i].'</strong><br>';
											$count=0;
											echo '<select name="'.$field->Field.'">';
                                            echo '<option value="0">--Không chọn--</option>';
											foreach($column['Type'][1] as $item)
											{
												$name = key($item);	                                                
												echo '<option value="'.$item->$name.'">';
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



									if(element($table_name,$table_list)=='Thư viện Tài liệu Văn bản')



								    {



									echo '<p><strong>Upload Tài liệu văn bản:</strong><br>';



									}



									elseif(element($table_name,$table_list)=='Thư viện Hình ảnh')



									{



									echo '<p><strong>Upload hình ảnh:</strong><br>';



									}



									else



									{



									echo '<p><strong>'.$setLabels[$i].'</strong><br>';



									}



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
							}
							elseif($field->Type=='date')
							{
    							date_default_timezone_set('Asia/Saigon');
    							$getdate=getdate();
    							$redate=$getdate['mday'].'-'.$getdate['mon'].'-'.$getdate['year'];
                                if($field->Field=='ngaydang' || $field->Field=='ngaynhanphong' || $field->Field=='ngaytraphong')
                                {
    							     echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker" name="'.$field->Field.'" value="'.$redate.'" /></p>';
                                }
                                /*elseif($field->Field=='ngaysinh')
                                {                                    
                                    echo '<p><strong>'.$setLabels[$i].'</strong></p>';                                    
                                    echo '<select name="sltngay">';
                                    for($m=1;$m<=31;$m++)
                                    {
                                        echo '<option value="'.$m.'">'.$m.'</option>';
                                    }
                                    echo '</select>&nbsp/&nbsp';    
                                    echo '<select name="sltthang">';
                                    for($k=1;$k<=12;$k++)
                                    {
                                        echo '<option value="'.$k.'">'.$k.'</option>';    
                                    }
                                    echo '</select>&nbsp/&nbsp';
                                    echo '<select name="sltnam">';
                                    for($h=1960;$h<=2050;$h++)
                                    {
                                        echo '<option value="'.$h.'">'.$h.'</option>';    
                                    }
                                    echo '</select>';
                                    $ngaysinh12=$_POST['sltngay'];
                                    $thangsinh=$_POST['sltthang'];
                                    $namsinh=$_POST['sltnam'];
                                    $ngaysinhall=$ngaysinh12.'-'.$thangsinh.'-'.$namsinh;
                                    echo $ngaysinhall;                                                                      
                                    echo '<input type="hidden" name="'.$field->Field.'" value="'.$ngaysinhall.'" >';
                                }
                                */
                                elseif($field->Field=='ngaynhanhoso')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker1" name="'.$field->Field.'" value="'.$redate.'" /></p>';    
                                }
                                elseif($field->Field=='hannhanhoso')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" id="datepicker2" name="'.$field->Field.'" value="'.$redate.'" /></p>';    
                                }
							}
							elseif(substr($field->Type,0,3)=='int' || substr($field->Type,0,5)=='float' || substr($field->Type,0,6)=='double' || substr($field->Type,0,4)=='real')
							{
    							if($field->Field=='view' || $field->Field=='yeuthich')
    							{
    							     echo '<p style="display:none;"><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" style="text-align:right" /></p>';
    							}                                
    							else
    							{
    								echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" style="text-align:right" /></p>';
    							}
							}
							elseif(substr($field->Type,0,7)=='varchar')
							{
								if($field->Field=='linkvideo' || $field->Field=='tomtat' || $field->Field=='tomtaten' || $field->Field=='tomtatcn' || $field->Field=='googleantic' || $field->Field=='binhluan')
								{
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea type="text" name="'.$field->Field.'" style=" width:500px; height:150px; padding: 5px"></textarea></p>';
								}
                                elseif($field->Field=='nguoidang')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input readonly="true" type="text" name="'.$field->Field.'" value="'.$_SESSION['username'].'" style="text-align:right" /></p>';     
                                }
                                elseif($field->Field=='password' && $table_name=="tbladmin")
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="password" name="'.$field->Field.'" /></p>';
									echo '<p><strong>Xác nhận '.$setLabels[$i].'</strong><br><input type="password" name="re'.$field->Field.'" /></p>';    
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
                                    ?>
                                    <div class="role_item"<?php if($demchk%4==0){ ?>style="margin-right:0;"<?php } ?>>
                                        <input type="checkbox" name="chrole[]" class="chrole" value="<?php echo $itemchucnanghp->id; ?>" /><label><?php echo $itemchucnanghp->chucnang; ?></label>
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
                                    ?>
                                    <div class="role_item"<?php if($demchk%4==0){ ?>style="margin-right:0;"<?php } ?>>
                                        <input type="checkbox" name="chrole[]" class="chrole" value="<?php echo $h.'.'.$v; ?>" /><label><?php echo $v; ?></label>
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
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea onkeyup="return displayWordCounter();" type="text" name="'.$field->Field.'" style=" width:500px; height:150px; padding: 5px"></textarea></p>';
                                ?>
                                <div class="total_count">Meta description tối đa:
                                    <input class="show_count" name="totalWordLimit" size="4" readonly="true" value="150" type="text">
                                </div>                                
                                <?php        
                                }
                                elseif($field->Field=='meta_title')
                                {
                                    echo '<p><strong>'.$setLabels[$i].'</strong><br><input onkeyup="return displayWordCounter1();" style="width:300px;" type="text" name="'.$field->Field.'"></p>';                                                                       
                                    ?>
                                    <div class="total_count">Meta title tối đa:
                                    <input class="show_count1" name="totalWordLimit1" size="4" readonly="true" value="70" type="text">
                                </div>  
                                    <?php    
                                }
								elseif($field->Field=='giodang')
								{
                                    date_default_timezone_set('Asia/Saigon');	
									$today = date('g:i A'); 
									echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" value="'.$today.'" /></p>';
								}
								elseif($field->Field=='anh_thumb')
								{
								}
								elseif($field->Field=='tag')
								{
									echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea type="text" name="'.$field->Field.'" value="" style=" width:500px; height:100px; padding: 5px"/></textarea></p>';
								}  								                            
                                elseif($field->Field=='mau')
								{
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" style="width:100px;" id="colorpickerField1"/></p>';
								}
								else
								{
								echo '<p><strong>'.$setLabels[$i].'</strong><br><input type="text" name="'.$field->Field.'" style="width:300px;" /></p>';
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
                                                    if(!empty($field->Field)){
                                                    $images1 =json_decode($field->Field); 
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
								    echo '<p><strong>'.$setLabels[$i].'</strong><br><textarea id="editor'.$editorCounter.'" name="'.$field->Field.'"></textarea></p>';
                                }
								$editorCounter++;
							}
        if($column_type!=NULL)
        {
            next($column_type);
        }
        $i++;
    }
    echo '<br>';
    echo '<p><input class="myButton" type="submit" value="Nhập" />
        <input class="myButton" type="reset" value="Xóa" /></p>';
    echo '</form>';
?>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
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