<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_dao extends Model
{
    function Admin_dao()
    {
        parent::Model();
    }
    function anh_thumb($table_name,$id_new,$thumb)
	{
	   $data = array(
	       'anh_thumb' =>$thumb,
	   );
						
	   $this->db->where('id',$id_new);
	   $this->db->update($table_name,$data); 
	}
    function sitemap()
	{
	   $doc = new DOMDocument("1.0","utf-8"); 
       $doc->formatOutput = true;
       $r = $doc->createElement("urlset" );
       $r->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
       $doc->appendChild( $r );
       $url = $doc->createElement("url" );
       $name = $doc->createElement("loc" );
       $name->appendChild(
            $doc->createTextNode(cnf_link)
	   );
	   $url->appendChild($name);			
	   $changefreq = $doc->createElement( "changefreq" );
	   $changefreq->appendChild(
	       $doc->createTextNode('daily')
	   );
       $url->appendChild($changefreq);			
	   $priority = $doc->createElement( "priority" );
	   $priority->appendChild(
 			$doc->createTextNode('1.00')
	   );
	   $url->appendChild($priority);			
	   $r->appendChild($url);			
		//Danhmuc b�i vi?t 1
		$this->db->where('status',0);
		$cate=$this->db->get('tbldanhmucbaiviet');
		if($cate->num_rows()>0)
		{
			foreach($cate->result() as $row)
			{
				$url = $doc->createElement( "url" );
				
				$name = $doc->createElement( "loc" );
				$name->appendChild(
					$doc->createTextNode(site_url(LocDau($row->danhmucbaiviet).'-bv'.$row->id.'.html'))
				);
				$url->appendChild($name);
				
				$changefreq = $doc->createElement( "changefreq" );
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				
				$priority = $doc->createElement( "priority" );
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				
				$r->appendChild($url);
			}
		}        
		//Danh muc bai viet cap 2
        $this->db->where('status',0);
		$cate=$this->db->get('tbldanhmucbaiviet2');
		if($cate->num_rows()>0)
		{
			foreach($cate->result() as $row)
			{
				$url = $doc->createElement( "url" );
				
				$name = $doc->createElement( "loc" );
				$name->appendChild(
					$doc->createTextNode(site_url(BoDau($row->danhmucbaivietcap2).'-bv2'.$row->id.'.html'))
				);
				$url->appendChild($name);
				
				$changefreq = $doc->createElement( "changefreq" );
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				
				$priority = $doc->createElement( "priority" );
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				
				$r->appendChild($url);
			}
         }
            
        //Danh m?c s?n ph?m        
        /*$this->db->where('status',0);
		$cate=$this->db->get('tbldanhmucsanpham');
		if($cate->num_rows()>0)
		{
			foreach($cate->result() as $row)
			{
				$url = $doc->createElement( "url" );
				
				$name = $doc->createElement( "loc" );
				$name->appendChild(
					$doc->createTextNode(site_url(BoDau($row->danhmucsanpham).'.html'))
				);
				$url->appendChild($name);
				
				$changefreq = $doc->createElement( "changefreq" );
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				
				$priority = $doc->createElement( "priority" );
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				
				$r->appendChild($url);
			}
		}                    */
		//baiviet
		$this->db->where('status',0);
		$cate=$this->db->get('tbltintuc');
		if($cate->num_rows()>0)
		{
			foreach($cate->result() as $row)
			{
				$url = $doc->createElement( "url" );
				
				$name = $doc->createElement( "loc" );
				$name->appendChild(
					$doc->createTextNode(site_url(LocDau($row->title).'-'.$row->id).'.html')
				);
				$url->appendChild($name);
				
				$changefreq = $doc->createElement( "changefreq" );
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				
				$priority = $doc->createElement( "priority" );
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				
				$r->appendChild($url);
			}
		}
        //s?n ph?m	        
        /*$this->db->where('status',0);
		$cate=$this->db->get('tblsanpham');
		if($cate->num_rows()>0)
		{
			foreach($cate->result() as $row)
			{
				$url = $doc->createElement( "url" );
				
				$name = $doc->createElement( "loc" );
				$name->appendChild(
					$doc->createTextNode(site_url(LocDau($row->ten).'-sp'.$row->id).'.html')
				);
				$url->appendChild($name);
				
				$changefreq = $doc->createElement( "changefreq" );
				$changefreq->appendChild(
					$doc->createTextNode('daily')
				);
				$url->appendChild($changefreq);
				
				$priority = $doc->createElement( "priority" );
				$priority->appendChild(
					$doc->createTextNode('1.00')
				);
				$url->appendChild($priority);
				
				$r->appendChild($url);
			}
		}        */
        //end s?n ph?m	  
  			$doc->save("sitemap.xml");	
	}
	function tag($tag0,$id_new,$categories)
	{
		$tag1= explode(",",$tag0);
				foreach ($tag1 as $tag)
				{
						//  $tag = trim($tag);
						 //Lay id cua tag c? t?n l? $tag, neu ko c? th? th?m moi
						// $this->db->where('tag',$tag);
						 $sql=$this->db->get('tag');
						 if ($sql->num_rows()>0)
						 {
							 $ok=0;
							 foreach($sql->result() as $s)
							 {
								 if($s->tag==$tag)
								 {
									 $id_tag=$s->id;
									 $ok=1;
									 break;
								 }
							 }
							 if($ok==0)
							 {
								  $data=array(
										 'tag'=>$tag,
										 );
								 $this->db->insert('tag',$data);
								 $id_tag= mysql_insert_id();	
							 }
							// if($sql->row()->tag==$tag)
//							 {
//							 $id_tag=$sql->row()->id;
//							 }
//							 else
//							 {
//							 $data=array(
//										 'tag'=>$tag,
//										 );
//							 $this->db->insert('tag',$data);
//							 $id_tag= mysql_insert_id();	 
//							 }
						 }
						 else
						 {
							 $data=array(
										 'tag'=>$tag,
										 );
							 $this->db->insert('tag',$data);
							$id_tag= mysql_insert_id();
						}
					   $data=array(
								  'idnew'=>$id_new,
								  'idtag'=>$id_tag,
								  'categories'=>$categories,
								  );
					   $this->db->insert('tag_new',$data);
				}//end if tag	
	}
    function edittag($tag0,$id_new,$categories)
	{
		$this->db->where('idnew',$id_new);
		$this->db->where('categories',$categories);
		$this->db->delete('tag_new');
		$tag1= explode(",",$tag0);
			/*print_r($arrtags);*/
				foreach ($tag1 as $tag)
				{
						  $tag = trim($tag);
						 //Lay id cua tag c? t?n l? $tag, neu ko c? th? th?m moi
						// $this->db->where('tag',$tag);
						 $sql=$this->db->get('tag');
						 if ($sql->num_rows()>0)
						 {
							 $ok=0;
							 foreach($sql->result() as $s)
							 {
								 if($s->tag==$tag)
								 {
									 $id_tag=$s->id;
									 $ok=1;
									 break;
								 }
							 }
							  if($ok==0)
							 {
								  $data=array(
										 'tag'=>$tag,
										 );
								 $this->db->insert('tag',$data);
								 $id_tag= mysql_insert_id();	
							 }
							 
							 
								 $data=array(
											'idnew'=>$id_new,
											'idtag'=>$id_tag,
											'categories'=>$categories,
											);
								 $this->db->insert('tag_new',$data);
						 }
						 else
						 {
							 $data=array(
										 'tag'=>$tag,
										 );
							 $this->db->insert('tag',$data);
							$id_tag= mysql_insert_id();
					   $data=array(
								  'idnew'=>$id_new,
								  'idtag'=>$id_tag,
								  'categories'=>$categories,
								  );
					   $this->db->insert('tag_new',$data);
						 }
				}//end if tag	
	}
    function adminLogin($username,$password)
    {
        $this->db->where('status',1);
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $sql=$this->db->get('tbladmin');
        return $sql->row();
    }
    function getresult($search,$compare,$tableName,$limit,$offset)
    {
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $this->db->like($compare,$search); // Produces: WHERE seach LIKE '%compare%'
        $sql=$this->db->get($tableName);
        return $sql->result();
    }
    function getContent($tableName,$limit,$offset)
    {        
        $this->db->limit($limit,$offset);        
        $this->db->order_by('id','desc');        
        $sql=$this->db->get($tableName);       
        return $sql->result();
    }
    function getTotalRows($tableName)
    {        
        $this->db->from($tableName);
        return $this->db->count_all_results();
    }
    function getEditRow($tableName,$id)
    {
        $this->db->where('id',$id);
        $sql=$this->db->get($tableName);
        return $sql->row();
    }
    function getAdmin($tableName)
    {
        $this->db->where('username',$this->session->userdata('admin'));
        $sql=$this->db->get($tableName);
        return $sql->row();
    }
    function getDetail($table_name,$id)
    {
        $this->db->where('id',$id);
        $sql=$this->db->get($table_name);
        return $sql->row();
    }
    function getDetailNews($id)
    {
        $this->db->where('id',$id);
        $sql=$this->db->get('tblsinhnhat');
        return $sql->row();	
    }
    function getListnews()
    {
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sql=$this->db->get('tbl_news');
        return $sql->result();
    }
    function getListnews_limited($limit,$offset)
    {
        $this->db->order_by('dateup','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $sql=$this->db->get('tbl_news');
        return $sql->result();
    }
    function getdangky()
    {
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sql=$this->db->get('tblsinhnhat');
        return $sql->result();
    }
    function getdangky_limited($limit,$offset)
    {
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $sql=$this->db->get('tblsinhnhat');
        return $sql->result();
    }    
	function delete_news($id)
	{
	   $this->db->where('id',$id);
       $this->db->delete('tbl_news');
    }
    function delete_sinhnhat($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tblsinhnhat');    
    }
    function do_addsinhnhat()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000000';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('anhbe'))
        {
            $name_img='';
            $thumb='';
        }
        else
        {
            $image_data = $this->upload->data();
            $name_img='upload/'.$image_data['file_name'];                
            $duongdan=$image_data['file_name'];
            $config1['image_library'] = 'gd2';
            $config1['source_image']	= './upload/'.$duongdan;
            $config1['create_thumb'] = TRUE;
            $config1['maintain_ratio'] = TRUE;
            $config1['width']	=214;
            $config1['height']	= 153;
            $this->load->library('image_lib', $config1); 
            $this->image_lib->resize();
            $temp=explode('.',$image_data['file_name']);
            $thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
            $name_img='upload/'.$image_data['file_name'];
        }
        $checkbox=$_POST['checkbox'];
        $countCheck=count($_POST['checkbox']);
        $del_id='';
        for($i=0;$i<$countCheck;$i++)
        {
            $del_id=$del_id.','.$checkbox[$i];                    
        }  
        $diung=$_POST['diung']; 
        $countdiung=count($_POST['diung']);
        $del_du='';
        for($j=0;$j<$countdiung;$j++)
        {
            $del_du=$del_du.','.$diung[$j];                 
        }
        $tiemphong=$_POST['tiemphongtt'];
        $counttienphong=count($_POST['tiemphongtt']);
        $del_tp='';
        for($k=0;$k<$counttienphong;$k++)
        {
            $del_tp=$del_tp.','.$tiemphong[$k];               
        }
        $lophoc=$_POST['lop'];
        $countlophoc=count($_POST['lop']);
        $del_lh='';
        for($m=0;$m<$countlophoc;$m++)
        {
            $del_lh=$del_lh.','.$lophoc[$m];               
        }
        $ngaysinh=$this->input->post('ngaysinh');
        $thangsinh=$this->input->post('thangsinh');
        $namsinh=$this->input->post('namsinh');        
        $sinhnhat=$namsinh.'-'.$thangsinh.'-'.$ngaysinh;
        $data_birđay=array(
            'hotenme'   =>  $this->input->post('hotenme'),
            'hotencha'  =>  $this->input->post('hotencha'),
            'nghenghiepme'  =>  $this->input->post('nghenghiepme'),
            'nghenghiepbo'  =>  $this->input->post('nghenghiepbo'),
            'noilamviecme'  =>  $this->input->post('noilamviecme'),
            'noilamvieccha' =>  $this->input->post('noilamvieccha'),
            'diachinoilamviecme'    =>  $this->input->post('diachinoilamviecme'),
            'diachinoilamvieccha'   =>  $this->input->post('diachinoilamvieccha'),
            'diachigiadinh' =>  $this->input->post('diachigiadinh'),
            'didongme'  =>  $this->input->post('didongme'),
            'didongcha' =>  $this->input->post('didongcha'),
            'dienthoaigiadinh'  =>  $this->input->post('dienthoaigd'),
            'hoten' =>$this->input->post('hoten'),
            'ngaysinh'  =>$sinhnhat,
            'sothich'   =>  $this->input->post('sothich'),
            'thoiquen'  =>  $this->input->post('thoiquen'),
            'gioitinh'  =>  $this->input->post('gioitinh'),
            'tinhtrang' =>  $del_id,
            'diung' =>  $del_du,
            'ditat' =>  $this->input->post('ditat'),
            'tieusubenh'    =>  $this->input->post('tieusubenh'),
            'tiemphong' =>  $del_tp,
            'thongtinkhac'  =>  $this->input->post('thongtinkhac'),
            'nguoiduadon'   =>  $this->input->post('nguoduadon'),
            'lop'   =>  $del_lh,
            'anh'   =>$name_img,
            'anh_thumb' =>$thumb,
            'ngaydang'  => $this->input->post('ngaydang'),
            'chuky' =>  $this->input->post('chuky'),
            'ordernum'  =>$this->input->post('thutu'),
            'status'    =>$this->input->post('status')
        ); 
        $this->db->insert('tblsinhnhat',$data_birđay); 
    }
	function do_addnews()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000000';
        //$config['max_width']  = '0';
        //$config['max_height']  = '0';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('anh'))
        {
            $name_img='';
            $thumb='';
        }
        else
        {
            //$image_data = $this->upload->data();
            //$name_img='upload/'.$image_data['file_name'];
            $image_data = $this->upload->data();
            //$slider='upload/'.$image_data['file_name'];
            $duongdan=$image_data['file_name'];
            $config1['image_library'] = 'gd2';
            $config1['source_image']	= './upload/'.$duongdan;
            $config1['create_thumb'] = TRUE;
            $config1['maintain_ratio'] = TRUE;
            $config1['width']	=80;
            $config1['height']	= 63;
            $this->load->library('image_lib', $config1); 
            $this->image_lib->resize();
            $temp=explode('.',$image_data['file_name']);
            $thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
            $name_img='upload/'.$image_data['file_name'];
	   }
       if ( ! $this->upload->do_upload('upslider'))
	   {
	       $name_img1='';
	   }
	   else
	   {
	       $image_data = $this->upload->data();
	       $name_img1='upload/'.$image_data['file_name'];
	   }  
       $datens=explode('-',$this->input->post('ngaydang'));       
       $ngaydang=$datens[2].'-'.$datens[1].'-'.$datens[0];
       $data=array(
				'title'		=>$this->input->post('title'),
                'titleen'   =>$this->input->post('titleen'),                 
				'tomtat'		=>$this->input->post('tomtat'),
                'tomtaten'		=>$this->input->post('tomtaten'),
				'danhmucbaiviet'	=>$this->input->post('danhmucbaiviet'),	
                'danhmucbaivietcap2'    =>$this->input->post('danhmucbaivietcap2'),		
				'anh'	=>$name_img,
                'anh_thumb' =>$thumb,
                'noidung'	=>$this->input->post('noidung'),
                'noidungen'	=>$this->input->post('noidungen'),
                'ngaydang'	=>$ngaydang,
                'giodang'	=>$this->input->post('giodang'),
                'moi'	=>$this->input->post('moi'),
                'hoatdong'   =>$this->input->post('hoatdong'),
                'slider'    =>$this->input->post('slider'),
                'anhslider' => $name_img1,                               
                'meta_title'	=>$this->input->post('meta_title'),
                'meta_des'	=>$this->input->post('meta_des'),
                'keyword'	=>$this->input->post('keyword'),
                'ordernum'	=>$this->input->post('ordernum'),
                'status'	=>$this->input->post('status'),
                'tag'		=>trim($this->input->post('tags')),
	   );
       $this->db->insert('tbltintuc',$data);
	   if($this->input->post('tags'))
	   {
			//Cat tag dua vao database
			$id_a= $this->db->insert_id();
			$arrtags = explode(",",$this->input->post('tags'));
			/*print_r($arrtags);*/
			foreach ($arrtags as $tag)
			{
				$tag = trim($tag);
			   //Lay id cua tag c� t�n l� $tag, neu ko c� th� th�m moi
			   $this->db->where('tag',$tag);
			   $sql=$this->db->get('tag');
			   if ($sql->num_rows()>0)
			   {
	               if($sql->row()->tag==$tag)
                   {
				        $id_tag=$sql->row()->id;
                   }
                   else
                   {
                        $data=array(
                            'tag'   =>$tag,
                        ); 
                        $this->db->insert('tag',$data);
                        $id_tag= mysql_insert_id();
                   }
			   }
			   else
			   {
				   $data=array(
							   'tag'=>$tag,
                    );
                    $this->db->insert('tag',$data);
                    $id_tag= mysql_insert_id();
			   }
				$data=array(
						'idnew'=>$id_a,
						'idtag'=>$id_tag,
                        'categories'=>2
				);
                $this->db->insert('tag_new',$data);
			}//end if tag
    }
   }







		







	function do_editnews()
	{
        $id=$this->input->post('txtid');
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000000';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('anhbe'))
        {
            $name_img=$this->input->post('anhbe_edit');
            $thumb=$this->input->post('anhbe_thumb');
        }
        else
        {
            $image_data = $this->upload->data();
            $name_img='upload/'.$image_data['file_name'];                
            $duongdan=$image_data['file_name'];
            $config1['image_library'] = 'gd2';
            $config1['source_image']	= './upload/'.$duongdan;
            $config1['create_thumb'] = TRUE;
            $config1['maintain_ratio'] = TRUE;
            $config1['width']	=80;
            $config1['height']	= 63;
            $this->load->library('image_lib', $config1); 
            $this->image_lib->resize();
            $temp=explode('.',$image_data['file_name']);
            $thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
            $name_img='upload/'.$image_data['file_name'];
        }
        $checkbox=$_POST['checkbox'];
        $countCheck=count($_POST['checkbox']);
        $del_id='';
        for($i=0;$i<$countCheck;$i++)
        {
            $del_id=$del_id.','.$checkbox[$i];                    
        }  
        $diung=$_POST['diung']; 
        $countdiung=count($_POST['diung']);
        $del_du='';
        for($j=0;$j<$countdiung;$j++)
        {
            $del_du=$del_du.','.$diung[$j];                 
        }
        $tiemphong=$_POST['tiemphongtt'];
        $counttienphong=count($_POST['tiemphongtt']);
        $del_tp='';
        for($k=0;$k<$counttienphong;$k++)
        {
            $del_tp=$del_tp.','.$tiemphong[$k];               
        }
        $lophoc=$_POST['lop'];
        $countlophoc=count($_POST['lop']);
        $del_lh='';
        for($m=0;$m<$countlophoc;$m++)
        {
            $del_lh=$del_lh.','.$lophoc[$m];               
        }
        $ngaysinh=$this->input->post('ngaysinh');
        $thangsinh=$this->input->post('thangsinh');
        $namsinh=$this->input->post('namsinh');
        $sinhnhat=$namsinh.'-'.$thangsinh.'-'.$ngaysinh;
       $data_birđay=array(
            'hotenme'   =>  $this->input->post('hotenme'),
            'hotencha'  =>  $this->input->post('hotencha'),
            'nghenghiepme'  =>  $this->input->post('nghenghiepme'),
            'nghenghiepbo'  =>  $this->input->post('nghenghiepbo'),
            'noilamviecme'  =>  $this->input->post('noilamviecme'),
            'noilamvieccha' =>  $this->input->post('noilamvieccha'),
            'diachinoilamviecme'    =>  $this->input->post('diachinoilamviecme'),
            'diachinoilamvieccha'   =>  $this->input->post('diachinoilamvieccha'),
            'diachigiadinh' =>  $this->input->post('diachigiadinh'),
            'didongme'  =>  $this->input->post('didongme'),
            'didongcha' =>  $this->input->post('didongcha'),
            'dienthoaigiadinh'  =>  $this->input->post('dienthoaigd'),
            'hoten' =>$this->input->post('hoten'),
            'ngaysinh'  =>$sinhnhat,
            'sothich'   =>  $this->input->post('sothich'),
            'thoiquen'  =>  $this->input->post('thoiquen'),
            'gioitinh'  =>  $this->input->post('gioitinh'),
            'tinhtrang' =>  $del_id,
            'diung' =>  $del_du,
            'ditat' =>  $this->input->post('ditat'),
            'tieusubenh'    =>  $this->input->post('tieusubenh'),
            'tiemphong' =>  $del_tp,
            'thongtinkhac'  =>  $this->input->post('thongtinkhac'),
            'nguoiduadon'   =>  $this->input->post('nguoduadon'),
            'lop'   =>  $del_lh,
            'anh'   =>$name_img,
            'anh_thumb' =>$thumb,
            'ngaydang'  => $this->input->post('ngaydang'),
            'chuky' =>  $this->input->post('chuky'),
            'ordernum'  =>$this->input->post('thutu'),
            'status'    =>$this->input->post('status')
        ); 
        $this->db->where('id',$id);
        $this->db->update('tblsinhnhat',$data_birđay); 
    }
	function getGroupById($id)
	{







		$this->db->where('status',0);







		$this->db->where('id',$id);







		$sql=$this->db->get('tbl_group');







			return $sql->row();







		}







	function getCateById($id)







	{







		$this->db->where('status',0);







		$this->db->where('id',$id);







		$sql=$this->db->get('tbl_categories');







			return $sql->row();







		}







	function getGroup2()







	{







		$this->db->where('status',0);







		$sql=$this->db->get('tbl_group');







			return $sql->result();







		}	







	







}























?>