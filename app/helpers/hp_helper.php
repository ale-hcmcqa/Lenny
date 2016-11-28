<?php
function listColumnCallback($table_name)
	{
		$CI= & get_instance();
		//************//
		//warning: all of table must have active column

		//************//
		//set label for radio, checkbox
		//the value sequence:
							//0			//1				//...
		$lblRadioShow=array(' Hiển thị',' Không Hiển thị');
		$lblRadiof=array('Dofollow','Nofollow');
		$lblRadioht=array('Không hiển thị','Hiển thị');
        $lblRadioac=array('Chưa kích hoạt','Kích hoạt');
		$lblRadiovt=array('Trái','Phải');
		$lblRadiosale=array('Mặc Định','Giảm Giá');
		$lblRadioloai=array('Ảnh thường','Ảnh flash');
		$lblRadiovitri=array('Top','Bottom','Right');
		$lblRadio2=array('Trái','Phải');
		$lblRadiopro=array('Còn hàng','Hết hàng');
		$lblhienthihome = array('Không hiện thị','Hiện thị');				
        $lblduyet = array('Đã duyệt','Chưa duyệt');  
        $lblgioitinh=array('Nữ','Nam'); 
        $lblhonnhan=array('Độc thân','Đã kết hôn');
        $lblloaihinh=array('Nhà nước','Tư nhân');     
		switch($table_name)
		{
		  case 'tblorder':
            $querydh=$CI->db->get('tbltintuc');
            return array
            (
                'title'   =>  array('dropdown',$querydh->result()),
                'status'    =>  array('radio',$lblduyet)
            );
        case 'tblbannerdoc':
            return array
            (
                'anh'   =>  array('upload','image'),
                'vitri1'    =>  array('radio',$lblhienthihome),
                'vitri2'    =>  array('radio',$lblhienthihome),
                'status'    =>  array('radio',$lblduyet)
            );                
		case 'tblsupport':
            return array
            (                
                'status'    =>  array('radio',$lblRadioShow)
            ); 
        case 'tblykienkhachhang':
            return array
            (
                'anh'   =>  array('upload','image'),
                'status'    =>  array('radio',$lblRadioShow)
            );   
        case 'tbllienhe':
            return array
            (
                'status'    =>  array('radio',$lblRadioShow)
            );
		case 'tblthongtincongty':
            return array
            (
                'logo'  =>  array('upload','image'),                                                   
                'status'	=> array('radio',$lblRadioShow),
            );
        case 'tblhang':
            return array(
                'home'  =>  array('radio',$lblhienthihome),
                'status'    =>  array('radio',$lblRadioShow)
            );
        case 'tblkhoanggia': 
            return array(
                'status'    =>  array('radio',$lblRadioShow)
            );
        case 'tblmausac':
            return array(
                'status'    =>  array('radio',$lblRadioShow)
            ); 
        case 'tblkieudang':
            return array(
                'status'    =>  array('radio',$lblRadioShow)
            ); 
        case 'tblphongcach':
            return array(
                'status'    =>  array('radio',$lblRadioShow)
            );  
        case 'tblchucnang':
            return array(
                'status'    =>  array('radio',$lblRadioShow)
            );       
        case 'tbldanhmucphukien':            
            return array(                             
                'status'    =>  array('radio',$lblRadioShow)
            );  
        case 'tbldanhmucphukien2':
            $querypk=$CI->db->get('tbldanhmucphukien');
            return array(
                'danhmucphukien'=>array('dropdown',$querypk->result()),                 
                'status'    =>  array('radio',$lblRadioShow)
            );
        case 'tblphukien':
            $querypk=$CI->db->get('tbldanhmucphukien');
            $CI->db->select('id,danhmucphukiencap2');
            $querypk2=$CI->db->get('tbldanhmucphukien2');
            return array(
                'danhmucphukien'=>array('dropdown',$querypk->result()),
                'danhmucphukiencap2'=>array('dropdown',$querypk2->result()),
                'anh'    =>  array('upload','image'),
                'status'    =>  array('radio',$lblRadioShow)    
            );    
        case 'tblmeta':
            return array
            (
                'status'    =>array('radio',$lblRadioShow),
            ); 
        case 'tbltukhoa':
            return array
            (
                'status'    =>array('radio',$lblRadioShow),
            );                                     	
		case 'tbldanhmucbaiviet':                
            return array
            (                                                              
                'menu' =>  array('radio',$lblhienthihome),
                'footer' =>  array('radio',$lblhienthihome),                                                                                                                                                                                                                                                                                                                                                              																
                'status'=>array('radio',$lblRadioShow)
	       );	
        case 'tbldanhmucbaiviet2':
            $querydm1 = $CI->db->get('tbldanhmucbaiviet');
            return array
            (                
                'danhmucbaiviet' =>array('dropdown',$querydm1->result()),                
                'trai'  =>array('radio',$lblhienthihome), 
                'home'  =>array('radio',$lblhienthihome),                               
                'status'    =>array('radio',$lblRadioShow)
            );  
        case 'tbldanhmucbaiviet3':
            $querydm1 = $CI->db->get('tbldanhmucbaiviet');
            $CI->db->select('id,danhmucbaivietcap2');
            $query2=$CI->db->get('tbldanhmucbaiviet2');            
            return array
            (
                'anh'   =>  array('upload','image'),
                'danhmucbaiviet' =>array('dropdown',$querydm1->result()), 
                'danhmucbaivietcap2'=>array('dropdown',$query2->result()),                
                'left'  =>array('radio',$lblhienthihome),                                
                'status'    =>array('radio',$lblRadioShow)
            );                                  
		case 'tbltintuc':
            $CI->db->select('id,danhmucbaiviet');
            $query = $CI->db->get('tbldanhmucbaiviet');   
            $CI->db->select('id,danhmucbaivietcap2');
            $query2=$CI->db->get('tbldanhmucbaiviet2');
            $CI->db->select('id,danhmucbaivietcap3');
            $query3=$CI->db->get('tbldanhmucbaiviet3');                              
			return array
			(				
				'anh'	=>array('upload','image'),                                
                'danhmucbaiviet' => array('dropdown',$query->result()),                 
                'danhmucbaivietcap2'=>array('dropdown',$query2->result()),
                'danhmucbaivietcap3'    =>  array('dropdown',$query3->result()),                                                  
                'home'  =>  array('radio',$lblhienthihome),                                            
				'status'=>array('radio',$lblRadioShow)
			); 
        case 'tbldanhmucsanpham':
            return array
            (  
                'anh'   =>  array('upload','image'),                              
                'hot'  =>  array('radio',$lblhienthihome),                                                                        
                'status'    =>  array('radio',$lblRadioShow)
            );
        case 'tbldanhmucsanpham2':
            $querydm1=$CI->db->get('tbldanhmucsanpham');
            return array
            (
                'danhmucsanpham'    =>  array('dropdown',$querydm1->result()),
                'home'  =>  array('radio',$lblhienthihome),             
                'status'    =>  array('radio',$lblRadioShow)
            );   
        case 'tbldanhmucsanpham3':
            $querydm1=$CI->db->get('tbldanhmucsanpham');
            $CI->db->select('id,danhmucsanphamcap2');
            $querysp2=$CI->db->get('tbldanhmucsanpham2'); 
            return array
            (
                'danhmucsanpham'    =>  array('dropdown',$querydm1->result()),
                'danhmucsanphamcap2'    =>  array('dropdown',$querysp2->result()),                                
                'status'    =>  array('radio',$lblRadioShow)
            );       
        case 'tblsanpham':
            $querysp1=$CI->db->get('tbldanhmucsanpham');
            $CI->db->select('id,danhmucsanphamcap2');
            $querysp2=$CI->db->get('tbldanhmucsanpham2');
            $CI->db->select('id,hang');  
            $queryhang=$CI->db->get('tblhang'); 
                                                                                       
            return array
            (
                'anh'   =>  array('upload','image'),
                'danhmucsanpham'=>array('dropdown',$querysp1->result()),
                'hang'=>array('dropdown',$queryhang->result()),                 
                'danhmucsanphamcap2'=>array('dropdown',$querysp2->result()),
                'banchay'   =>  array('radio',$lblhienthihome),               
                'noibat'   =>  array('radio',$lblhienthihome),                
                'tinhtrang' => array('radio',$lblRadiopro),                
                'status'    =>  array('radio',$lblRadioShow)
            );                                                     		
		case 'tbllienhe':
			return array
			(
				'status'	=> array('radio',$lblRadioShow)
			);
        case 'tbluser':
            return array
            (
                //'matkhau' =>array('password','md5'),
                'status'    =>  array('radio',$lblRadioShow)
            );                            
		case 'tbladmin':
            $queryrole=$CI->db->get('tblrole');
			return array
			(				
				//'password'=>array('password','md5'),                
				'status'=>array('radio',$lblRadioac),
			);
        case 'tblquangcao':
            return array
            ( 
                'anh'   =>  array('upload','image'), 
                'vitri1'   =>  array('radio',$lblhienthihome),
                'vitri2'   =>  array('radio',$lblhienthihome), 
                'vitri3'   =>  array('radio',$lblhienthihome),
                'vitri4'   =>  array('radio',$lblhienthihome), 
                'vitri5'   =>  array('radio',$lblhienthihome),
                'vitri6'   =>  array('radio',$lblhienthihome),
                'vitri7'   =>  array('radio',$lblhienthihome),           
                'status'    =>  array('radio',$lblRadioShow)
            );        
        case 'tblhinhanhhoatdong':
            //$querydmal=$CI->db->get('tbldanhmucalbum');
            return array
            (                
                'anh' => array('upload','image'),  
                //'home'  =>  array('radio',$lblhienthihome),
                //'danhmucalbum'  =>  array('dropdown',$querydmal->result()),              
                'status'    =>  array('radio',$lblRadioShow)
            );  
       case 'tblslider'
:            return array
            (
                'anh'   =>  array('upload','image'),
                'trai'   =>  array('radio',$lblhienthihome),
                'phai'  =>  array('radio',$lblhienthihome),
                'status' => array('radio',$lblRadioShow)
            );
        case 'tblvideo':
            return array
            (                             
                'status'    =>array('radio',$lblRadioShow)
            );                                                          
        case 'tbldoitac':            
            return array
            (                
                'anh'   =>  array('upload','image'),
                'status'    =>  array('radio',$lblRadioShow)
            );                                                                                                                                                                                               
				default:		
						return NULL;
		}
	}
?>