<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//****************************************//
//Copyright 2010 HP Backend Manager 1.0.1 (only for CodeIgniter)
//Author:	TanLCFE
//From:		Hp-Aptech.edu.vn
//Email:	tanlcfe@gmail.com
//****************************************//
class Adminhp extends Controller
{
	function __construct()
	{
		parent::Controller();
		//preload helper and libraries
		$this->load->helper( array('array', 'url', 'form'));
		$this->load->helper('hp_helper');
        $this->load->helper('images');
		$this->load->library('form_validation');
		//do not remove this line
		$this->load->model('admin_dao');
	}
	function deleteGalleryImage($car_id,$img_id)
    {
        $this->db->delete('anh', array('id' => $img_id));
        $this->editContent('tblsanpham',$car_id);
    }
    function suaanh()
    {
        $ids=$_POST['ids'];
        $tens=$_POST['tens'];
        $gias=$_POST['gias'];
        $data=array(
            'duongdan'   =>$tens,
            'gia'   =>$gias
        );
        $this->db->where('id',$ids);
        $this->db->update('anh',$data);
    }
    function themanh()
    {
        $id=$_POST['id'];       
        $mausac=$_POST['mausac'];  
        $gia=$_POST['gia'];                                              
        $data=array(
                    'tenmau'    =>$mausac,                    
                    'gia'   =>$gia,
                    'sanpham'=>$id,                                     
                    );
        $this->db->insert('anh',$data);
    }
function loadimg($id,$dem)
    {
        $this->db->where('id',$id);
        $anh=$this->db->get('anh')->row();
        echo '<img src="'.$anh->duongdan.'" width="100" height="100"/>
<input type="hidden" name="anhthuvien" value="'.$anh->duongdan.'" />';
    }
    function sapxep($id)
    {
        $ordernum=$_POST["ordernum"];
        $table_nameor=$_POST["table_nameor"];
        $data_up=array(
            'ordernum'=>$ordernum
        );
        $this->db->where('id',$id);
        $this->db->update($table_nameor,$data_up);        
    }    
    function statushp()
    {
        $id=$_POST["id"];	    
	    $this->db->where('id',$id);
        $test=$this->db->get($table_name);
	   if($test->status==0){
			$this->adminhp_model->checkstatus($tblname,1,$id);
	   }
	   else{
			$this->adminhp_model->checkstatus($tblname,0,$id);
	   }	
    }
    function deleteallcontent($table_name)
    {        
        $this->checkadminSession();   
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($data['table_name']=="$useroleadd_tact2[0]")
            {
                $ok=1;  
                break;    
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role        		
		$checkbox=$_POST['checkbox'];           
		$countCheck=count($_POST['checkbox']);
		for($i=0;$i<$countCheck;$i++)
		{
			$del_id=$checkbox[$i];   
			$this->db->delete($table_name, array('id' => $del_id));                
    		if($table_name=='tbldanhmucbaiviet')
    		{
    		    $this->db->delete('tbldanhmucbaiviet2',array('danhmucbaiviet'=>$del_id));                   
    			$this->db->delete('tbltintuc', array('danhmucbaiviet' => $del_id));            
    		}
            if($table_name=='tbldanhmucbaiviet2')
            {
                $this->db->delete('tbltintuc', array('danhmucbaivietcap2' => $del_id));      
            }
            if($table_name=='tbltintuc')
    		{
    			$this->db->delete('tag_new', array('idnew' => $del_id,'categories' => '2'));
    		}    
            if($table_name=='tblsanpham')
    		{
    			$this->db->delete('tag_new', array('idnew' => $del_id,'categories' => '1'));
    		}    
            if($table_name=='tbldanhmucsanpham')
    		{  		            
    			$this->db->delete('tblsanpham', array('danhmucsanpham' => $del_id));			
    		}                             
		}
        $this->admin_dao->sitemap();
		if($_SESSION['offset']==0)
        {
            redirect('adminhp/viewContent/'.$table_name);    
        }
        else
        {
            redirect('adminhp/viewContent/'.$table_name.'/'.$_SESSION['offset']);
        }       		  
    }
	function declareTables()
	{
		$this->config->load('config');
		$data['row_per_page']=$this->config->item('row_per_page');	
		$data['table_list']=$this->config->item('table_list');
		$data['labels']=$this->config->item('table_field_label');				
		return $data;						
	}
	//must state callback funtion for columns
	//display form element when insert data into table  
    function resetmatkhau($id)
    {
        $this->checkadminSession(); 
        $table_name="tbluser";
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;     
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role          
        $data=$this->declareTables();
        $data['message']=array('information'=>'true');
        $data['action']="resetmatkhau";
        $data['id']=$id;
        $this->displayTemplate($data);    
    }
    function do_rematkhau()
    {
        $this->checkadminSession();
        $table_name="tbluser"; 
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role          
        $this->form_validation->set_rules('matkhaumoi','<span style="color:red">Mật khẩu cũ</span>','required');
        $this->form_validation->set_rules('rematkhaumoi','<span style="color:red">Xác nhận mật khẩu mới</span>','required|matches[matkhaumoi]');
        $this->form_validation->set_message('required','<span>%s không để trống</span>');   
        $this->form_validation->set_message('matches','<span>%s không trùng với mật khẩu mới</span>');     
        if($this->form_validation->run()==FALSE)
        {            
            $data=$this->declareTables();           
            $data['message']=array('error'=>validation_errors());
            $data['action']="resetmatkhau";
            $data['id']=$this->input->post('id');
            $this->displayTemplate($data);    
        }
        else
        { 
            $data_up=array(
                'matkhau'=>md5($this->input->post('matkhaumoi'))
            );
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('tbluser',$data_up);
            $data=$this->declareTables();           
            $data['message']=array('success'=>'Thông tin của bạn đã được cập nhật.');
            $data['action']="resetmatkhau";
            $data['id']=$this->input->post('id');
            $this->displayTemplate($data);                                  
        }    
    }  
    function doimatkhau($id)
	{	    
		$this->checkadminSession(); 
        $table_name="tbladmin";
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;     
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role          
    	$data=$this->declareTables();
		$data['message']=array('information'=>'true');
		$data['action']="doimatkhau";
        $data['id']=$id;
		$this->displayTemplate($data);
	}
    function do_doimatkhau()
    {
        $this->checkadminSession();
        $table_name="tbladmin"; 
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role          
        $this->form_validation->set_rules('matkhaumoi','<span style="color:red">Mật khẩu cũ</span>','required');
        $this->form_validation->set_rules('rematkhaumoi','<span style="color:red">Xác nhận mật khẩu mới</span>','required|matches[matkhaumoi]');
        $this->form_validation->set_message('required','<span>%s không để trống</span>');   
        $this->form_validation->set_message('matches','<span>%s không trùng với mật khẩu mới</span>');     
        if($this->form_validation->run()==FALSE)
        {            
        	$data=$this->declareTables();    		
            $data['message']=array('error'=>validation_errors());
    		$data['action']="doimatkhau";
            $data['id']=$this->input->post('id');
    		$this->displayTemplate($data);    
        }
        else
        { 
            $data_up=array(
                'password'=>md5($this->input->post('matkhaumoi'))
            );
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('tbladmin',$data_up);
        	$data=$this->declareTables();    		
            $data['message']=array('success'=>'Thông tin của bạn đã được cập nhật.');
    		$data['action']="doimatkhau";
            $data['id']=$this->input->post('id');
    		$this->displayTemplate($data);                                  
        }
    }		
	function addContent($table_name)
	{		
		$this->checkadminSession();	        	
		$data=$this->declareTables();
		//get table's name
		$data['table_name']=$table_name;
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                        
            if($data['table_name']=="$useroleadd_tact2[0]")
            {
                $ok=1; 
                break;     
            }                                                                                                          
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
        //End check role        
		//state action: add or view or delete
		$data['action']='add';
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$data['message']=array('information'=>'true');
		$this->displayTemplate($data);
	}
	function doAddContent($table_name)
	{	
		$this->checkadminSession();	        	
		$data=$this->declareTables();
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                                                                                 
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                  
                                                                                       
        }
        if($ok <> 1){
            redirect(site_url('adminhp'));    
        }
		//state action: add or view or delete
		if($table_name=='tblsanpham')
		{
			$data['upload']='true';
		}
        elseif ($table_name=='tblphukien') 
        {
            $categories='3';
        }		
		if($table_name=='tbltintuc')
		{
			$categories='2';
		}        
		elseif($table_name=='tblsanpham')
		{
			$categories='1';
		}		
		else
		{
			$categories='0';
		}
		$data['action']='add';
		//get table's name
		$data['table_name']=$table_name;
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$enumFields=element($table_name,$data['labels']);		
		if(!$_POST)		
		{
			$data['message']=array('error'=>'Có lỗi xảy ra trong khi thực hiện. Dữ liệu chưa được cập nhật');
			$this->displayTemplate($data);
			return ;
		}
		$passwordType=array();
		$uploadType=array();
		$dateType=array();
		foreach($data['fields'] as $item)
		{
			if(element($item->Field,$data['column_type']))
			{
					$temp=element($item->Field,$data['column_type']);
					if($temp[0]=='password')
					{
						$this->form_validation->set_message('required','Trường dữ liệu <b> %s </b> không được trống.');
						$this->form_validation->set_message('matches','<b>Xác nhận %s </b> không khớp nhau.');
						$this->form_validation->set_rules($item->Field,$item->Field, 'required|matches[re'.$item->Field.']');
						$this->form_validation->set_rules('re'.$item->Field, 'Xác nhận '.$item->Field, 'required');
						$passwordType[$item->Field]=$item->Field;
					}
					elseif($temp[0]=='upload')
					{
						$uploadType[$item->Field]=$item->Field;
					}	
			}
			elseif(substr($item->Type,0,3)=='int'||substr($item->Type,0,6)=='double'||substr($item->Type,0,5)=='float'||substr($item->Type,0,4)=='real'||substr($item->Type,0,7)=='decimal')
			{
				$this->form_validation->set_message('numeric','Trường dữ liệu <b> %s </b> phải là số.');
				$this->form_validation->set_rules($item->Field,$item->Field, 'numeric');
			}
			elseif(substr($item->Type,0,4)=='date')
			{
				$dateType[$item->Field]=$item->Field;
			}
		}
		do
		{	
			if(element(key($enumFields),$passwordType))
			{
				$column[key($enumFields)]	=	md5	($this->input->post(key($enumFields)));
			}
			elseif(element(key($enumFields),$uploadType))
			{    			              
                //upload
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'mp3|gif|jpg|png|zip|rar|csv|pdf|xls|jpeg|doc|docx|bmp';
				$config['max_size']	= '1000000000';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload(key($enumFields)))
				{
					$getFileUpload = $this->upload->data();

					$column[key($enumFields)]='upload/'.$getFileUpload['file_name'];
					$temp=explode('.',$getFileUpload['file_name']);
					if(isset($anh))
					{
					}
					else
					{
						$duoi=strtolower($temp[1]);
						if($duoi=='jpg'||$duoi=='gif'||$duoi=='png'||$duoi=='jpeg'||$duoi=='bmp')
						{
							$anh=true;
    						$duongdan=$getFileUpload['file_name'];
    						$config1['image_library'] = 'gd2';
    						$config1['source_image']	= './upload/'.$duongdan;
    						$config1['create_thumb'] = TRUE;
    						$config1['maintain_ratio'] = TRUE;
    						$config1['width']	=500;
    						$config1['height']	=400;
    						$this->load->library('image_lib', $config1); 
    						$this->image_lib->resize();
    						$thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
						}
						else
						{
							$thumb='';
						}
					}
				}	
				else
				{
					$column[key($enumFields)]=NULL;
				}
				//end upload    
               
			}
			elseif(element(key($enumFields),$dateType))
			{
				//print_r($redate);
				//$column[key($enumFields)]=$this->input->post(key($enumFields));
				$getdate=$this->input->post(key($enumFields));
				$temp = explode("-", $getdate);
				$redate=$temp[2].'-'.$temp[1].'-'.$temp[0];
				$column[key($enumFields)]=$redate;
			}            
			elseif($item->Field='tag')
			{
				$tag10=$this->input->post(key($enumFields));
				$tag0=$tag10;
				$column[key($enumFields)]=$this->input->post(key($enumFields));
			}
			else
			{
				$column[key($enumFields)]=$this->input->post(key($enumFields));
			}
		}while(next($enumFields));
		if(is_array($column))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($_POST)
				{
				    /*if($table_name=='tblsanpham')
                    {                        	
				        $image1 = json_encode($_POST['image_filename']);                                    
                        $column['anhnho']=$image1;    
                        if(!empty($column['anhnho']))                                                                   
                        {  
                        	$loc=str_replace('"','',$column['anhnho']);
                        	$loc2=str_replace('[','',$loc);
                        	$loc3=str_replace(']','',$loc2);                        	
                        	$exp=explode(',',$loc3);                      	                        	                        	
                        	foreach ($exp as $itexp) {                        		                        		
                        		$tmp = 'tmp/'. $itexp;                        		
                        		if(file_exists($tmp)){
			                        if( copy($tmp, 'upload/'. $itexp)){
			                           	//Xu ly resize anh																	
										$name_img='upload/'.$itexp;
										$imageThumb = new Image($name_img);							
										$temp=explode('.',$itexp);				
										$thumb_path = $itexp;
										if($imageThumb->getWidth() > 900){			
											$imageThumb->resize(900,'resize');
										}
										$imageThumb->save($temp[0], './upload/resized');									
			                        }else{
			                            echo "Canot Copy file";
			                        }
			                        unlink($tmp);
			                    }
                        	}
                        }                                                                   
                    }         */           
                    if($table_name=='tbladmin')
                    {
                        $chrole=$_POST['chrole'];
                        $countcheckrole=count($chrole);
                        $del_role='';
                        for($i=0;$i<$countcheckrole;$i++)
                        {                           
                            $del_role=$del_role.','.$chrole[$i];                            
                        }
                        $column['password']=md5($this->input->post('password'));
                        $column['role']=$del_role;
                    }                                                  
					$this->db->insert($table_name, $column);
					$id_new = mysql_insert_id();
					$this->admin_dao->tag($tag0,$id_new,$categories);
                    if($table_name=='tblsanpham')
                    {
                        $data['lastest_id']=$id_new;    
                    }  
                    if($table_name=='tbldanhmucbaiviet' || $table_name=='tbldanhmucbaiviet2' || $table_name=='tbltintuc' || $table_name=='tbldanhmucsanpham' || $table_name=='tblsanpham')
                    {
                       $this->admin_dao->sitemap();
                    }
					if(isset($thumb))
					{
						$this->admin_dao->anh_thumb($table_name,$id_new,$thumb);
						//$data = array(
//									   'anh_thumb' =>$thumb,
//									);
//						
//						$this->db->where('id',$id_new);
//						$this->db->update($table_name,$data); 
					}
					$data['message']=array('success'=>'Cập nhật thông tin thành công.');
					unset($_POST);
				}
				else
				{
					$data['message']=array('warning'=>'Dữ liệu đã được cập nhật!');
				}					
			}
			else
			{
				$data['message']=array('error'=>validation_errors());
			}
		}
		else
		{
			$data['message']=array('error'=>'Có lỗi xảy ra trong khi thực hiện. Dữ liệu chưa được cập nhật');
		}   
        //if($table_name=='tblsanpham')
        //{
            //$this->displayTemplate($data);
        //}             
        //else
        //{
            redirect('adminhp/viewContent/'.$table_name);
        //}
        //redirect('adminhp/addContent/'.$table_name);      		
	}
	function deleteContent($table_name,$id)
	{
		$this->checkadminSession();	  
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                                                                                  
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;  
                break;    
            }                                                                                                     
        }
        if($ok <> 1){        
            redirect(site_url('adminhp'));    
        }	
		$this->db->delete($table_name, array('id' => $id));	        	
		if($table_name=='tbldanhmucsanpham')
		{		    
			$this->db->delete('tblsanpham', array('danhmucsanpham' => $id));			
		}            
		if($table_name=='tbldanhmucbaiviet')
		{
		    $this->db->delete('tbldanhmucbaiviet2',array('danhmucbaiviet'=>$id));            
			$this->db->delete('tbltintuc', array('danhmucbaiviet' => $id));            
		}        
        if($table_name=='tbldanhmucbaiviet2')
		{		    
			$this->db->delete('tbltintuc', array('danhmucbaivietcap2' => $id));
		}  
        if($table_name=='tbltintuc')
		{
		  $this->db->delete('tag_new', array('idnew' => $id,'categories' => '2'));
  		}      
        if($table_name=='tblsanpham')
        {
            $this->db->delete('tag_new', array('idnew' => $id,'categories' => '1'));
        }         		
        $this->admin_dao->sitemap();		
        if($_SESSION['offset']==0)
        {
            redirect('adminhp/viewContent/'.$table_name);    
        }
        else
        {
            redirect('adminhp/viewContent/'.$table_name.'/'.$_SESSION['offset']);
        }     
	}
	function editContent($table_name,$id)
	{
		$this->checkadminSession();	        	
		$data=$this->declareTables();
		//get table's name
		$data['table_name']=$table_name;        
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                                                                                
            if($data['table_name']=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                                                                                                         
        }
        if($ok <> 1){        
            redirect(site_url('adminhp'));    
        }
		//state action: add or view or delete
		$data['action']='edit';
		$data['primaryKey']=$id;
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$enumFields=element($table_name,$data['labels']);		
		$sql=(array)$this->admin_dao->getEditRow($table_name,$id);
		do
		{
			$column[key($enumFields)]=$sql[key($enumFields)];
		}while(next($enumFields));
		$data['editContent']=$column;
		$data['message']=array('warning'=>'Đang sửa nội dung bản ghi có mã là '.$id.' trong bảng '.element($table_name,$data['table_list']));
		$this->displayTemplate($data);
	}
	function doEditContent($table_name,$id)
	{
		$this->checkadminSession();	        	
		$data=$this->declareTables();
		//state action: add or view or delete
		$data['action']='edit';
		//get table's name
		$data['table_name']=$table_name;
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                                                                                   
            if($data['table_name']=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                                                                                                         
        }
        if($ok <> 1){        
            redirect(site_url('adminhp'));    
        } 
		if($table_name=='tblsanpham')
		{
			$categories='1';
			$tag_status='1';
		}
		elseif ($table_name=='tbltintuc')
		{
			$categories='2';
			$tag_status='1';
		}
		elseif($table_name=='tblphukien')
		{
			$categories='3';
			$tag_status='1';
		}
		//elseif($table_name=='tbllichkhaigiang')
		//{
		//	$tag_status='1';
		//	$categories='3';
		//}
		$data['primaryKey']=$id;
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$enumFields=element($table_name,$data['labels']);		
		$password=array();
		$upload=array();
$dateType=array();
		foreach($data['fields'] as $item)
		{
			if(element($item->Field,$data['column_type']))
			{
					$temp=element($item->Field,$data['column_type']);
					if($temp[0]=='password')
					{
						$this->form_validation->set_message('required','Trường dữ liệu <b> %s </b> không được trống.');
						$this->form_validation->set_message('matches','<b>Xác nhận %s </b> không khớp nhau.');
						$fieldNameFiltered1=element($table_name,$data['labels']);
						$fieldNameFiltered2=element($item->Field,$fieldNameFiltered1);
						$this->form_validation->set_rules($item->Field,$fieldNameFiltered2, 'required|matches[re'.$item->Field.']');
						$this->form_validation->set_rules('re'.$item->Field, 'Xác nhận '.$fieldNameFiltered2, 'required');
						$password[$item->Field]=$item->Field;
					}
					elseif($temp[0]=='upload')
					{
						$upload[$item->Field]=$item->Field;
					}
			}
			elseif(substr($item->Type,0,3)=='int'||substr($item->Type,0,6)=='double'||substr($item->Type,0,5)=='float'||substr($item->Type,0,4)=='real'||substr($item->Type,0,7)=='decimal')
			{
				$this->form_validation->set_message('numeric','Trường dữ liệu <b> %s </b> phải là số.');
				$fieldNameFiltered1=element($table_name,$data['labels']);
				$fieldNameFiltered2=element($item->Field,$fieldNameFiltered1);		
				$this->form_validation->set_rules($item->Field,$fieldNameFiltered2, 'numeric');
			}
elseif(substr($item->Type,0,4)=='date')
			{
				$dateType[$item->Field]=$item->Field;
			}
		}
		do
		{	
			if(element(key($enumFields),$password))
			{
				$column[key($enumFields)]=md5($this->input->post(key($enumFields)));
			}
			elseif(element(key($enumFields),$upload))
			{			                   
                    //upload
						$config['upload_path'] = './upload/';
						$config['allowed_types'] = 'mp3|gif|jpg|png|zip|rar|csv|pdf|jpeg|xls|doc|docx';
						$config['max_size']	= '100000';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if ($this->upload->do_upload(key($enumFields)))
						{
							$getFileUpload = $this->upload->data();
							$column[key($enumFields)]='upload/'.$getFileUpload['file_name'];
							
							$temp=explode('.',$getFileUpload['file_name']);
							if(isset($anh))
							{
							}
							else
							{
								$duoi=strtolower($temp[1]);
								if($duoi=='jpg'||$duoi=='gif'||$duoi=='png'||$duoi=='jpeg'||$duoi=='bmp')
								{
									$anh=true;
								$duongdan=$getFileUpload['file_name'];
								$config1['image_library'] = 'gd2';
								$config1['source_image']	= './upload/'.$duongdan;
								$config1['create_thumb'] = TRUE;
								$config1['maintain_ratio'] = TRUE;
								$config1['width']	=500;
								$config1['height']	= 400;
								$this->load->library('image_lib', $config1); 
								$this->image_lib->resize();
								$thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
								}
							}
							
						}	
						else
						{
							//get hidden field marked for image column
							$column[key($enumFields)]=$this->input->post('hid'.key($enumFields));
						}
						//end upload    
                
			}
 			elseif(element(key($enumFields),$dateType))
			{
				//$column[key($enumFields)]=$this->input->post(key($enumFields));
				$getdate=$this->input->post(key($enumFields));
				$temp = explode("-", $getdate);
				$redate=$temp[2].'-'.$temp[1].'-'.$temp[0];
				$column[key($enumFields)]=$redate;
				//print_r($redate);
			}
			elseif(isset($tag_status))
			{
					if($item->Field=='tag')
					{
						$tag10=$this->input->post(key($enumFields));
						$tag0=$tag10;
						$column[key($enumFields)]=$this->input->post(key($enumFields));
					}

			}
			else
			{
				$column[key($enumFields)]=$this->input->post(key($enumFields));
			}
		}while(next($enumFields));		
		if($_POST)
		{	
			if ($this->form_validation->run() == TRUE)
			{
				//editing content statement
                /*if($table_name=='tblsanpham')
                {
                    $image1 = json_encode($_POST['image_filename']);                
                    $column['anhnho']=$image1;
                    if(!empty($column['anhnho']))                                                                   
                        {  
                        	$loc=str_replace('"','',$column['anhnho']);
                        	$loc2=str_replace('[','',$loc);
                        	$loc3=str_replace(']','',$loc2);                        	
                        	$exp=explode(',',$loc3);                      	                        	                        	
                        	foreach ($exp as $itexp) {                        		                        		
                        		$tmp = 'tmp/'. $itexp;                        		
                        		if(file_exists($tmp)){
			                        if( copy($tmp, 'upload/'. $itexp)){
			                           	//Xu ly resize anh																	
										$name_img='upload/'.$itexp;
										$imageThumb = new Image($name_img);							
										$temp=explode('.',$itexp);				
										$thumb_path = $itexp;
										if($imageThumb->getWidth() > 900){			
											$imageThumb->resize(900,'resize');
										}
										$imageThumb->save($temp[0], './upload/resized');									
			                        }else{
			                            echo "Canot Copy file";
			                        }
			                        unlink($tmp);
			                    }
                        	}
                        }
                }           */     
                if($table_name=='tbladmin')
                {
                    $chrole=$_POST['chrole'];
                    $countcheckrole=count($chrole);
                    $del_role='';
                    for($i=0;$i<$countcheckrole;$i++)
                    {                           
                        $del_role=$del_role.','.$chrole[$i];                            
                    }                    
                    $column['role']=$del_role;
                }                              
				$this->db->where('id',$id);                
				$this->db->update($table_name, $column);
				$sql=(array)$this->admin_dao->getEditRow($table_name,$id);
				reset($enumFields);
				do
				{
					$column[key($enumFields)]=$sql[key($enumFields)];
				}while(next($enumFields));
				if(isset($thumb))
					{
						$this->admin_dao->anh_thumb($table_name,$id,$thumb);
					}
				$data['editContent']=$column;
				$data['message']=array('success'=>'Đã cập nhật thông tin bản ghi có mã '.$id.' trong '.$table_name.'.');
				if(isset($tag_status))
				{
				$id_new =$id;
				$this->admin_dao->edittag($tag0,$id_new,$categories);
				}
			}
			else
			{
				$data['message']=array('error'=>validation_errors());
			}
		}
		else
		{
			$data['message']=array('error'=>'Có lỗi xảy ra trong khi thực hiện. Dữ liệu chưa được cập nhật');
		}
		$sql=(array)$this->admin_dao->getEditRow($table_name,$id);
		reset($enumFields);
		do
		{
			$column[key($enumFields)]=$sql[key($enumFields)];
		}while(next($enumFields));
        if($table_name=='tbldanhmucbaiviet' || $table_name=='tbldanhmucbaiviet2' || $table_name=='tbltintuc' || $table_name=='tbldanhmucsanpham' || $table_name=='tblsanpham')
        {
            $this->admin_dao->sitemap();
        }
		$data['editContent']=$column;
        if($_SESSION['offset']==0)
        {
            redirect('adminhp/viewContent/'.$table_name);    
        }
        else
        {
            redirect('adminhp/viewContent/'.$table_name.'/'.$_SESSION['offset']);
        }        
		//$this->displayTemplate($data);
	}
	//view data in table
	function viewContent($table_name,$offset=0)
	{
		$this->checkadminSession();
		//init database information
		$data=$this->declareTables();		
		//get column's meta data 
        //Check role
        $this->db->where('username',$_SESSION['username']);
        $sqlroleuseradd=$this->db->get('tbladmin')->row();            
        $useroleadd_tact=explode(',',$sqlroleuseradd->role);
        $demadd=0;
        foreach($useroleadd_tact as $useroleadd_tact)
        {
            $useroleadd_tact2=explode('.',$useroleadd_tact);                                                                                
            if($table_name=="$useroleadd_tact2[0]")
            {
                $ok=1;
                break;      
            }                                                                                                          
        }
        if($ok <> 1){        
            redirect(site_url('adminhp'));    
        }
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();		
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$limit=element($table_name,$data['row_per_page']);
		//if you does not set how many row per page, adminhp set default to 20
        //$offset=$this->uri->segment(3);
		if($limit==NULL)
		{
			$limit=10;
		}
        if(is_numeric($offset)){
			$_SESSION['offset']=$offset;					
		}				    		
		else
		{
			$_SESSION['offset']=0;				
		}		
		$data['rowLimit']=$limit;
		$data['table_name']=$table_name;
        $data['checkem']=true;
		$data['action']='view';
		$data['contents']=$this->admin_dao->getContent($table_name,$limit,$_SESSION['offset']);
		$data['rowCounter']=$this->admin_dao->getTotalRows($table_name);
		$data['message']=array('information'=>'true');
		$this->displayTemplate($data);
	}
	function viewDetail($table_name,$id)
	{
		$this->checkadminSession();
		//init database information
		$data=$this->declareTables();
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$limit=element($table_name,$data['row_per_page']);
		//if you does not set how many row per page, adminhp set default to 20
		if($limit==NULL)
		{
			$limit=20;
		}
		$data['rowLimit']=$limit;
		$data['table_name']=$table_name;
		$data['action']='view';
		$data['contents']=$this->admin_dao->getContent($table_name,$limit,0);
		$data['rowCounter']=$this->admin_dao->getTotalRows($table_name);
		$data['message']=array('information'=>'true');
		$data['detail']=$this->admin_dao->getDetail($table_name,$id);
		$this->displayTemplate($data);
	}
	function displayTemplate($data)
	{
		$this->load->view('template',$data);
	}    
	//check adminhp session
	function checkadminSession()
	{
		if(isset($_SESSION['username']))
		{		  
		}
        else
        {
		  redirect('adminhp/login');
        } 
	}
	//called function by default
	function index()
	{
		$this->checkadminSession();
		$data=$this->declareTables();
		$this->load->view('template',$data);
	}
	function login()
	{
		$this->load->view('login');	
	}
	function logout()
	{
	   unset($_SESSION['username']);
       //unset($_SESSION['role']);		
		$this->load->view('login');
	}
	function doLogin()
	{
		$this->load->model('admin_dao');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$admin=$this->admin_dao->adminLogin($username,$password);
		if(count($admin)>0)
		{
		    $_SESSION['username']=$username;
            $_SESSION['role']=$admin->role;			
			redirect('adminhp/index'); 
		}
		else
		{
			redirect('adminhp/login'); 
		}
	}
	function changeadminhpInfo()
	{
		$table_name='tbladminhp';
		$this->checkadminSession();		
		$data=$this->declareTables();
		//get table's name
		$data['table_name']=$table_name;
		//state action: add or view or delete
		$data['adminhpchangeinfor']='true';
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$enumFields=element($table_name,$data['labels']);		
		$sql=(array)$this->admin_dao->getadminhp($table_name);
		do
		{
			$column[key($enumFields)]=$sql[key($enumFields)];
		}while(next($enumFields));
		$data['editcontent']=$column;
		$data['message']=array('warning'=>'Đang cập nhật thông tin tài khoản của bạn.');
		$data['adminhpchangeinfor']='true';
		$this->load->view('/template',$data);
	}
	function doChangeInfor()
	{
		$table_name='tbladminhp';				
		$this->checkadminSession();		
		$data=$this->declareTables();
		//state action: add or view or delete
		$data['adminhpchangeinfor']='true';
		//get table's name
		$data['table_name']=$table_name;
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$enumFields=element($table_name,$data['labels']);		
		$password=array();
		$upload=array();
		foreach($data['fields'] as $item)
		{
			if(element($item->Field,$data['column_type']))
			{
			     $temp=element($item->Field,$data['column_type']);
			     if($temp[0]=='password')
			     {
			         $this->form_validation->set_message('required','Trường dữ liệu <b> %s </b> không được trống.');
			         $this->form_validation->set_message('matches','<b>Xác nhận %s </b> không khớp nhau.');
			         $fieldNameFiltered1=element($table_name,$data['labels']);
			         $fieldNameFiltered2=element($item->Field,$fieldNameFiltered1);
			         $this->form_validation->set_rules($item->Field,$fieldNameFiltered2, 'required|matches[re'.$item->Field.']');
			         $this->form_validation->set_rules('re'.$item->Field, 'Xác nhận '.$fieldNameFiltered2, 'required');
                     $password[$item->Field]=$item->Field;
			     }
					elseif($temp[0]=='upload')
					{
						$upload[$item->Field]=$item->Field;
					}
			}
			elseif(substr($item->Type,0,3)=='int'||substr($item->Type,0,6)=='double'||substr($item->Type,0,5)=='float'||substr($item->Type,0,4)=='real'||substr($item->Type,0,7)=='decimal')
			{
				$this->form_validation->set_message('numeric','Trường dữ liệu <b> %s </b> phải là số.');
				$fieldNameFiltered=element($table_name,$data['labels']);
				$fieldNameFiltered=element($item->Field,$table_name);				
				$this->form_validation->set_rules($item->Field,$fieldNameFiltered, 'numeric');
			}
		}
		do
		{	
			if(element(key($enumFields),$password))
			{
				$column[key($enumFields)]=md5($this->input->post(key($enumFields)));
			}
			elseif(element(key($enumFields),$upload))
			{
						//upload
						$config['upload_path'] = './upload/';
						$config['allowed_types'] = 'mp3|gif|jpg|png|zip|rar|csv|pdf|xls|doc|jpeg|docx';
						$config['max_size']	= '100000';
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if ($this->upload->do_upload(key($enumFields)))
						{
							$getFileUpload = $this->upload->data();
							$column[key($enumFields)]='upload/'.$getFileUpload['file_name'];
						}	
						else
						{
							//get hidden field marked for image column
							$column[key($enumFields)]=$this->input->post('hid'.key($enumFields));
						}
						//end upload
			}
			else
			{
				$column[key($enumFields)]=$this->input->post(key($enumFields));
			}
		}while(next($enumFields));		
		if($_POST)
		{	
			if ($this->form_validation->run() == TRUE)
			{
				//editing content statement
				$this->db->where('username',$_SESSION['username']);
				$this->db->update($table_name, $column); 
				$sql=(array)$this->admin_dao->getadminhp($table_name);
				reset($enumFields);
				if(key($enumFields))
				{
					do
					{
						$column[key($enumFields)]=$sql[key($enumFields)];
					}while(next($enumFields));
				}
				$data['editcontent']=$column;
				$data['message']=array('success'=>'Thông tin của bạn đã được cập nhật.');
			}
			else
			{
				$data['message']=array('error'=>validation_errors());
			}
		}
		else
		{
			$data['message']=array('error'=>'Có lỗi xảy ra trong khi thực hiện. Dữ liệu chưa được cập nhật');
		}
		$sql=(array)$this->admin_dao->getadminhp($table_name);
		reset($enumFields);
		do
		{
			$column[key($enumFields)]=$sql[key($enumFields)];
		}while(next($enumFields));
		$data['editcontent']=$column;
		$this->displayTemplate($data);
	}
	function fileManager()
	{
		$this->checkadminSession();		
		$data=$this->declareTables();		
		$data['file_manager']='file_manager';
		$data['message']=array('information'=>'true');
		$this->displayTemplate($data);	
	}
	function doUploadMultiple($id)
	{
		foreach ($_FILES as $fieldName => $file) 
		{
			move_uploaded_file($file['tmp_name'], "./upload/" . strip_tags(basename($file['name'])));		
			//resize image, create thumb
			$config['image_library'] = 'gd2';
			$config['source_image']	= './upload/'.$file['name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['height']	= 420;
			$config['width']	= 900;
			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();
			//-----
			//thumb's name
			$temp=explode('.',$file['name']);
			$thumb=$temp[0].'_thumb'.'.'.$temp[1];
			$name=$temp[0].'.'.$temp[1];
			//insert image and thumb into database by car_id
			$this->db->insert('anh', array('duongdan'=>'upload/'.$name,'thumb'=>'upload/'.$thumb,'sanpham'=>$id)); 
		}
	}		    		
	function edit_success()
	{
		$this->checkadminSession();	
		$data=$this->declareTables();
		$data['action']='editsuccess';
		$this->displayTemplate($data);	
	}	
	function dosearchcontent($table_name)
	{
        $this->checkadminSession();
        $search=$this->input->post('search');
        $compare=$this->input->post('compare');
        //init database information
		$data=$this->declareTables();
		//get column's meta data 
		$query=$this->db->query('SHOW COLUMNS FROM '.$table_name);
		$data['fields'] = $query->result();
		//display dropdown, radio, checkbox, upload...
		$data['column_type']=listColumnCallback($table_name);
		$limit=element($table_name,$data['row_per_page']);
		//if you does not set how many row per page, adminhp set default to 20
		if($limit==NULL)
		{
			$limit=20;
		}
		$data['rowLimit']=$limit;
		$data['table_name']=$table_name;
		$data['action']='view';
		$data['contents']=$this->admin_dao->getresult($search,$compare,$table_name,$limit,0);
		$data['rowCounter']=$this->admin_dao->getTotalRows($table_name);
	    //$data['message']=array('warning'=>'Bạn vừa xóa bản ghi có mã là '.$id.' trong bảng '.element($table_name,$data['table_list']));
		$this->displayTemplate($data);
	}
}
?>