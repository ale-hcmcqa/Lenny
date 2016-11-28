<?php
class site extends Controller
{
    function site()
    {
        parent::Controller();
		$this->load->model('site/site_model');
        $this->load->library('form_validation');                  
    }
    function index()
    {        
        $data['main_content'] ='includes/main_content';
        $data['home']=true;
        $this->load->view('includes/template',$data);       
    }      
    function tuan()
    {
        // lấy ngày hiện tại và xuất ra tuần
        $date = date('Y-m-d');   
        //var_dump($date);     
        $this->show_week($date); // gọi hàm bạn có thể gọi bất cứ nơi đâu để hiển thị thông tin
    }
    function show_week($date){
        $begin = strtotime($date);
        $today = date('N');        
        $day_names = array(
            1 => "Monday",
            2 => "Tuesday",
            3 => "Wednesday",
            4 => "Thursday",
            5 => "Friday",
            6 => "Saturday",
            7 => "Sunday"
        );
        //echo "Date of  week"."";
        $days = array();
        $day_off_set = 0;
        for($i=0;$i<7;$i++)
        {
            if($day_off_set > 7-$today)
            {
                $day_off_set = -($today-1);
            }
            $days[$day_names[$today+$day_off_set]] = date("Y-m-d",$begin+(60*60*24*($day_off_set)));
            $day_off_set++;
        }
        echo '<pre>';
        foreach ($days as $key => $value) {
            echo $value.',';
        }
        echo '</pre>';
        echo "Monday : ".$days["Monday"] . " ";
        echo "Tuesday : ".$days["Tuesday"] . " ";
        echo "Wednesday : ".$days["Wednesday"] . " ";
        echo "Thursday : ".$days["Thursday"] . " ";
        echo "Friday : ".$days["Friday"] . " ";
        echo "Saturday : ".$days["Saturday"] . " ";
        echo "Sunday : ".$days["Sunday"] . " ";
    }    
    function videoct($id)
    {
        $data['id']=$id;
        $data['main_content']='videoct';
        $this->load->view('includes/template',$data);
    }                
    function search()
    {                
        $danhmuc=$this->input->post('danhmuc');
        $ten = $this->input->post('ten');
        $start_row=$this->uri->segment(4);
        $per_page=15;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->site_model->gettimkiem($danhmuc,$ten);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/site/search/'.$danhmuc.'/'.$ten;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->site_model->gettimkiem_limited($danhmuc,$ten,$per_page,$start_row);        
		$pagination= $this->pagination->create_links();	
        $lks=$pagination;
        $lks='<ul class="pagination">'.$pagination; 
        $datar1=array('<strong>','<a hr');    
        $datar2=array('<li class="active"><a>','<li><a hr');
        $datar3=array('</strong>','</a>');    
        $datar4=array('</a></li>','</a><li>');         
        $lks=str_replace($datar1,$datar2,$lks);
        $lks=str_replace($datar3,$datar4,$lks);        
        $lks.='</ul>';
        $data['pagination']=$lks; 
        $data['ten']=$ten;
		$data['main_content']='search_view';
		$this->load->view('includes/template',$data);		            
    }        
    function dathang($id)
    {        
        $data['id']=$id;
        $data['main_content']='datphongid';
        $this->load->view('includes/template',$data);
    }
    function checkgia()
    {
        $iddh=$_POST['iddh'];
        $sophong=$_POST['sophong'];
        $sodem=$_POST['sodem'];
        $data['iddh']=$iddh;
        $data['sophong']=$sophong;
        $data['sodem']=$sodem;
        $html=$this->load->view('includes/checkgia',$data);
        echo $html;
    }
    function datphong()
    {       
        $iddh=$_POST['iddh'];
        $hoten=$_POST['hoten'];
        $dienthoai=$_POST['dienthoai'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $city=$_POST['city'];
        $ngaynhanphongdh=$_POST['ngaynhanphongdh'];
        $ngaytraphongdh=$_POST['ngaytraphongdh'];
        $date_ngnhp=explode('-',$ngaynhanphongdh);
        $date_ngnhp1=$date_ngnhp[0].'-'.$date_ngnhp[1].'-'.$date_ngnhp[2];
        $datatraphong=explode('-',$ngaytraphongdh);
        $datatraphong1=$datatraphong[0].'-'.$datatraphong[1].'-'.$datatraphong[0];
        $sophong=$_POST['sophong'];
        $sodem=$_POST['sodem']; 
        $datecu=getdate();
        $datecu1=$datecu['year'].'-'.$datecu['mon'].'-'.$datecu['mday'];
        $this->db->where('id',$iddh);
        $sqlspdh=$this->db->get('tblphong')->row();
        $noidung='
        <p>Tên phòng:'.$sqlspdh->ten.'</p>
        <table style="border-spacing:0;font-size:12px;border:1px solid #ddd;width:100%;">
            <tr>
                <th style="text-align:left;font-size:12px;border:1px solid #ddd;">Giá</th>
                <th style="text-align:left;font-size:12px;border:1px solid #ddd;">Số Phòng</th>
                <th style="style="text-align:left;font-size:12px;border:1px solid #ddd;"">Số Đêm</th>
            </tr>
            <tr>
                <td style="border:1px solid #ddd;">Giá:&nbsp;<span style="color:#2E892E;font-weight:bold;">'.number_format($sqlspdh->gia,0,'.','.').'&nbsp;'.$sqlspdh->donvitinh.'</span></td>
                <td style="border:1px solid #ddd;">'.$sophong.'</td>
                <td style="border:1px solid #ddd;">'.$sodem.'</td>
            </tr>
            <tr>
                <td style="border:1px solid #ddd;" colspan="3"><p style="text-align: right;">Thành tiền:<span style="color:#2E892E;font-weight:bold;">'.number_format(($sophong*$sqlspdh->gia*$sodem),0,'.','.').'&nbsp;'.$sqlspdh->donvitinh.'</span></p></td>
            </tr>
        </table>
        ';
        $data_order=array(
            'hoten' =>$hoten,
            'diachi'    =>$diachi,
            'dienthoai' =>$dienthoai,
            'email'     =>$email,
            'tinh'  =>$city,
            'ngaynhanphong'=>$date_ngnhp1,
            'ngaytraphong'  =>$datatraphong1,
            'thongtindonhang'   =>$noidung,
            'ngaydang'  =>$datecu1,
            'status'    => 1
        );           
        $this->db->insert('tblorder',$data_order); 
        $data['id']=$iddh;
        $data['thanhcong']=true;
        $data['main_content']='datphongid';
        $this->load->view('includes/template',$data);      
    }
    function guidanhgia()
    {
        $data['main_content']='guidanhgia';
        $this->load->view('includes/template',$data);     
    }
    function doguidanhgia()
    {
        $this->form_validation->set_rules('hoten','<span style="color:red;">Họ tên</span>','required');
        $this->form_validation->set_rules('ykien','<span style="color:red;">Ý kiến đánh giá</span>','required');
        //$this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');        
        //$this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        if($this->form_validation->run()==FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['main_content']='guidanhgia';
            $this->load->view('includes/template',$data);    
        }
        else
        {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000000';
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('avatar'))
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
                $config1['width']	=101;
                $config1['height']	= 101;
                $this->load->library('image_lib', $config1); 
                $this->image_lib->resize();
                $temp=explode('.',$image_data['file_name']);
                $thumb='upload/'.$temp[0].'_thumb'.'.'.$temp[1];
                $name_img='upload/'.$image_data['file_name'];                               
            } 
            $data_guidg=array(
                'ten' =>$this->input->post('hoten'),
                'anh'   =>  $name_img,
                'anh_thumb' =>$thumb,
                'noidung'   =>$this->input->post('ykien'),
                'status'    =>1,
            );
            $this->db->insert('tblykienkhachhang',$data_guidg); 
            $data['thanhcong'] ='Gửi đánh giá thành công';
            $data['main_content']='guidanhgia';
            $this->load->view('includes/template',$data);                
        }
    }
    function danhgiakhachhang()
    {
        $start_row=$this->uri->segment(3);
        $per_page=16;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}

        $query=$this->site_model->getdanhgia();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/site/danhgiakhachhang/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =3;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['ykien']=$this->site_model->getdanhgia_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();   
        $data['main_content']='danhgiakhachhang_view';
        $this->load->view('includes/template',$data);
    }
    function lang()
    {
        $lang=$_POST['lang'];
	    $_SESSION['lang']=$lang;    
    }
    function baivietcap1($id)
    {        
        $this->db->where('id',$id);
        $cate=$this->db->get('tbldanhmucbaiviet');
        if($cate->num_rows()>0)
        {
            $this->db->where('id',$id);        
            $data['danhmuc1'] = $this->db->get('tbldanhmucbaiviet')->row();            
            $data['danhmuc'] = $data['danhmuc1'];   
            $data['danhmucbaiviet']=$cate->row()->id;
            if($data['danhmuc1']->keyword!='')
            {
    	       $data['keyword']=$data['danhmuc1']->keyword;
            }
            if($data['danhmuc1']->meta_title!='')
            {
    	       $data['header_title']=$data['danhmuc1']->meta_title;
        	}
            else
        	{          	   
                    $data['header_title']=$data['danhmuc1']->danhmucbaiviet;                                                                                                             	                   
        	}
            if($data['danhmuc1']->meta_des!='')
        	{
        	    $data['description']=$data['danhmuc1']->meta_des;
        	}
            $start_row=$this->uri->segment(4);
            $per_page=8;
    		if(is_numeric($start_row))
    		{
    			$start_row=$start_row;
    		}
    		else
    		{
    			$start_row=0;
    		}
            $query=$this->site_model->categoriesfa($id);
    		$total_rows = $query->num_rows();
    		$this->load->library('pagination');
    		$config['base_url'] = site_url().'/site/baivietcap1/'.$id;
    		$config['total_rows'] = $total_rows;
    		$config['per_page'] = $per_page;
    		$config['uri_segment'] =4;
    		$config['next_link'] = 'Next';
    		$config['prev_link'] = 'Prev';
    		$config['num_links'] = 4;
    		$config['first_link'] = 'First';
    		$config['last_link'] = 'Last';
    		//$config['full_tag_open']='<div class="pagination">';
    		//$config['full_tag_close']='</div>';
    		$this->pagination->initialize($config);
    		$data['query']=$this->site_model->categoriesfa_limited($id,$per_page,$start_row);
            $data['dm'] = $id;
            $data['danhmucbaiviet']=$id;
            if($data['query']->num_rows()==1)
    		{	
      		    $this->db->where('danhmucbaiviet',$id);
                $sqlview=$this->db->get('tbltintuc')->row();
      		    $this->site_model->num_view($sqlview->id);
    			$data['main_content']='news_view';
                $data['tintuc']=true;
    			$this->load->view('includes/template',$data);
    		}
    		else
    		{
    			$data['tintuc']=true;
    			$pagination= $this->pagination->create_links();
                $lks=$pagination;
                $lks='<ul class="pagination">'.$pagination; 
                $datar1=array('<strong>','<a hr');    
                $datar2=array('<li class="active"><a>','<li><a hr');
                $datar3=array('</strong>','</a>');    
                $datar4=array('</a></li>','</a><li>');         
                $lks=str_replace($datar1,$datar2,$lks);
                $lks=str_replace($datar3,$datar4,$lks);        
                $lks.='</ul>';
                $data['pagination']=$lks;   	
    			$data['main_content']='news';
    			$this->load->view('includes/template',$data);
    	   }
       }
       else
       {
            $data['main_content']='error/error';
		    $this->load->view('includes/template',$data); 
       }
    } 
    function baivietcap2($id)
    {        
        $this->db->where('id',$id);
        $data['danhmuc2'] = $this->db->get('tbldanhmucbaiviet2')->row();
        $data['danhmuc22'] = $data['danhmuc2']; 
        if($data['danhmuc2']->keyword!='')
        {
	       $data['keyword']=$data['danhmuc2']->keyword;
        }
        if($data['danhmuc2']->meta_title!='')
        {
	       $data['header_title']=$data['danhmuc2']->meta_title;
    	}
        else
    	{     	   
            $data['header_title']=$data['danhmuc2']->danhmucbaivietcap2;                                                         
    	}
        if($data['danhmuc2']->meta_des!='')
    	{
    	    $data['description']=$data['danhmuc2']->meta_des;
    	}          
        $start_row=$this->uri->segment(4);
        $per_page=8;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->site_model->categoriesfa2($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/site/baivietcap2/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		//$config['full_tag_open']='<div class="pagination">';
		//$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->site_model->categoriesfa2_limited($id,$start_row,$per_page);
        $data['dmbv2'] = $id;
        if($data['query']->num_rows()==1)
		{	
            $this->db->where('danhmucbaivietcap2',$id);
            $sqlview2=$this->db->get('tbltintuc')->row();
  		    $this->site_model->num_view($sqlview2->id);
			$data['main_content']='news_view';
            $data['tintuc']=true;
			$this->load->view('includes/template',$data);
		}
		else
		{
			//$data['home']=true;
			$pagination= $this->pagination->create_links();	
            $lks=$pagination;
            $lks='<ul class="pagination">'.$pagination; 
            $datar1=array('<strong>','<a hr');    
            $datar2=array('<li class="active"><a>','<li><a hr');
            $datar3=array('</strong>','</a>');    
            $datar4=array('</a></li>','</a><li>');         
            $lks=str_replace($datar1,$datar2,$lks);
            $lks=str_replace($datar3,$datar4,$lks);        
            $lks.='</ul>';
            $data['pagination']=$lks;   
			$data['main_content']='news';
            $data['tintuc']=true;
			$this->load->view('includes/template',$data);
	   }
    }  
    function baivietcap3($id)
    {
       $this->db->where('id',$id);
        $data['danhmuc1'] = $this->db->get('tbldanhmucbaiviet3')->row();
        $data['danhmuc'] = $data['danhmuc1']; 
        if($data['danhmuc1']->keyword!='')
        {
	       $data['keyword']=$data['danhmuc1']->keyword;
        }
        if($data['danhmuc1']->meta_title!='')
        {
	       $data['header_title']=$data['danhmuc1']->meta_title;
    	}
        else
    	{
    	    $data['header_title']=$data['danhmuc1']->danhmucbaivietcap3;
    	}
        if($data['danhmuc1']->meta_des!='')
    	{
    	    $data['description']=$data['danhmuc1']->meta_des;
    	}          
        $start_row=$this->uri->segment(4);
        $per_page=15;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->site_model->categoriesfa3($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/site/baivietcap3/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->site_model->categoriesfa3_limited($id,$start_row,$per_page);
        $data['dmbv3'] = $id;
        if($data['query']->num_rows()==1)
		{	
  		    //$this->baiviet_model->num_view($id);
			$data['main_content']='news_id';
			$this->load->view('includes/template',$data);
		}
		else
		{
			//$data['home']=true;
			$data['pagination']= $this->pagination->create_links();	
			$data['main_content']='news';
			$this->load->view('includes/template',$data);
	   }
    }   
    function baivietchitiet($id)
    {        
        $this->site_model->num_view($id);
		$this->db->where('id',$id);
        $data['query1'] = $this->site_model->getnewsbyid($id); 
        if($data['query1']->meta_title!='')
    	{
    	    $data['header_title']=$data['query1']->meta_title;
    	}
    	else
    	{     	    
            $data['header_title']=$data['query1']->title;                                                         
    	}
    	if($data['query1']->keyword!='')
    	{
    	    $data['keyword']=$data['query1']->keyword;
    	}
    	if($data['query1']->meta_des!='')
    	{
    	    $data['description']=$data['query1']->meta_des;
    	}
    	else
    	{    	    
            $data['description']=$data['query1']->title;                                                             
    	}      
        $data['ct'] = $id;
        $this->db->where('id',$id);
        $sqltindmh=$this->db->get('tbltintuc')->row();
        $data['dml']=$sqltindmh->danhmucbaiviet;
        $data['tintuc']=true;
        $data['main_content']='news_view';
		$this->load->view('includes/template',$data);   
    }    
    function khachhang()
    {
        $start_row=$this->uri->segment(3);
        $per_page=16;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $ykien=$this->site_model->getykien();
		$total_rows = $ykien->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/site/khachhang/';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =3;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['doitac']=$this->site_model->getykien_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['main_content'] = 'doitac_view';
        $data['kh']=true;
        $this->load->view('includes/template',$data); 
    }    
    function khachhangchitiet($id)
    {
        $data['main_content']='khachhang_id';
        $data['query']=$this->site_model->gettablename('tblkhachhang',$id);
        $this->load->view('includes/template',$data);        
    }	
    function lienketlink()
    {
        $data['main_content']='lienketlink';
        $this->load->view('includes/template',$data);
    }
    function contact()
    {
        $this->load->helper('map');      
        $data['contact']=true;
        $data['main_content']='contact';
        $this->load->view('includes/template',$data);
    }
    function bando()
    {
        $data['bando']=true;
        $data['main_content']='bando';
        $this->load->view('includes/template',$data);
    }
    function docontact()
    {
         $this->load->helper('map');   
        $this->form_validation->set_rules('txthoten','<span style="color:red;">Họ tên</span>','required');
		$this->form_validation->set_rules('txtdc','<span style="color:red;">Địa chỉ</span>','required');
		$this->form_validation->set_rules('txtdt','<span style="color:red;">Điện thoại</span>','required');		
		$this->form_validation->set_rules('txtemail','<span style="color:red;">Email</span>','required|valid_email');
		$this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
		$this->form_validation->set_message('valid_email','<span style="color:red;">Email không hợp lệ</span>');
		if($this->form_validation->run()==FALSE)
		{
			$data['errors_register'] = validation_errors();
            $data['contact']=true; 
			$data['main_content'] = 'contact';
			$this->load->view('includes/template',$data);
		}
		else
		{
		    $date = getdate();
    		$sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
    		$insert_data = array(
    				'hoten'	=> $this->input->post('txthoten'),
    				'diachi'	=> $this->input->post('txtdc'),
    				'dienthoai'	=> $this->input->post('txtdt'),
    				'email'	=>	$this->input->post('txtemail'),
    				'noidung'	=> $this->input->post('txtnd'),
    				'ngaylienhe'	=> $sDate,
    				'status'	=>1
    		);  
			$this->site_model->iutablename('','tbllienhe',$insert_data);            
			$data['kq'] = '<span style="color:green;">Cảm ơn bạn đã gửi liên hệ</span>';
            $data['contact']=true; 
			$data['main_content'] = 'contact';
			$this->load->view('includes/template',$data);
		}
    }       
    function loadcate2($id)
    {
       $district=$this->site_model->getdanhmuc2($id);
       echo '<option value="">--Chuyên mục con--</option>';
	   foreach($district as $item)
	   {
	       echo '<option value="'.$item->id.'"'.set_select('cmbdanhmuccon',$item->id).'>'.$item->danhmucbaivietcap2.'</option>';
	   } 
    }
    function loadcate3($id)
    {
        $district=$this->site_model->getdanhmuc3($id);
	    echo '<option value="">--Chuyên mục con--</option>';
	   foreach($district as $item)
	   {
	       echo '<option value="'.$item->id.'"'.set_select('cmbdanhmuc3',$item->id).'>'.$item->danhmucbaivietcap3.'</option>';
	   }     
    }
    function loadcate4($id)
    {
        $district=$this->site_model->getdanhmuc4($id);
	  // echo '<option value="">--Chuyên mục con--</option>';
	   foreach($district as $item)
	   {
	       echo '<option value="'.$item->id.'"'.set_select('cmbdanhmuc4',$item->id).'>'.$item->danhmucsanpham4.'</option>';
	   }         
    }
    function loadcatesp2($id)
    {
        $danhmucsp=$this->site_model->getdanhmucsp2($id);
        echo '<option value="">--Chuyên mục con--</option>';
        foreach($danhmucsp as $itemsp)
        {
            echo '<option value="'.$itemsp->id.'"'.set_select('cmbdanhmucspcon',$itemsp->id).'>'.$itemsp->danhmucsanphamcap2.'</option>';
        }     
    }
    function loadcatepk2($id)
    {
        $danhmucsp=$this->site_model->getdanhmucpk2($id);
        echo '<option value="">--Chuyên mục con--</option>';
        foreach($danhmucsp as $itemsp)
        {
            echo '<option value="'.$itemsp->id.'"'.set_select('cmbdanhmucpkcon',$itemsp->id).'>'.$itemsp->danhmucphukiencap2.'</option>';
        }     
    }
    function loadcatesp3($id)
    {
        $danhmucsp=$this->site_model->getdanhmucsp3($id);
        echo '<option value="">--Chuyên mục con--</option>';
        foreach($danhmucsp as $itemsp)
        {
            echo '<option value="'.$itemsp->id.'"'.set_select('cmbdanhmucspcon3',$itemsp->id).'>'.$itemsp->danhmucsanphamcap3.'</option>';
        }     
    }
    function products_page_hot1()
    {
        $data['status']=true; 

					  $data['status']=true;		

				$start_row=$this->uri->segment(3);

				$per_page=16;

				if(trim($start_row)=='')

				{

					$start_row=0;

					}

				$query=$this->site_model->products_hot1();

				$total_rows = $query->num_rows();

				$this->load->library('pagination');

				

				$config['base_url'] = site_url().'/site/products_page_hot1/';

				$config['total_rows'] = $total_rows;

				$config['per_page'] = $per_page;

				$config['uri_segment'] =3;

				$config['next_link'] = '>';

				$config['prev_link'] = '<';

				$config['num_links'] = 3;

				$config['first_link'] = '>>';

				$config['last_link'] = '<<';

				$config['full_tag_open']='<div class="paginationsp1">';

				$config['full_tag_close']='</div>';

				$this->pagination->initialize($config);

				$data['querymoi']=$this->site_model->products_limited_hot1($start_row, $per_page);

				$data['paginationsp1']= $this->pagination->create_links();	

				$data['main_content']='includes/ct-tab1';

				$_html=$this->load->view('includes/ct-tab1',$data,TRUE);

				echo $_html;    
    }
    function products_page_hot()
    {
        $data['status']=true; 

					  $data['status']=true;		

				$start_row=$this->uri->segment(3);

				$per_page=16;

				if(trim($start_row)=='')

				{

					$start_row=0;

					}

				$query=$this->site_model->products_hot();

				$total_rows = $query->num_rows();

				$this->load->library('pagination');

				

				$config['base_url'] = site_url().'/site/products_page_hot/';

				$config['total_rows'] = $total_rows;

				$config['per_page'] = $per_page;

				$config['uri_segment'] =3;

				$config['next_link'] = '>';

				$config['prev_link'] = '<';

				$config['num_links'] = 3;

				$config['first_link'] = '>>';

				$config['last_link'] = '<<';

				$config['full_tag_open']='<div class="paginationsp">';

				$config['full_tag_close']='</div>';

				$this->pagination->initialize($config);

				$data['query']=$this->site_model->products_limited_hot($start_row, $per_page);

				$data['paginationsp']= $this->pagination->create_links();	

				$data['main_content']='includes/ct-tab';

				$_html=$this->load->view('includes/ct-tab',$data,TRUE);

				echo $_html;
    }
    function products_page_video()
    {
        $data['status']=true; 

					  $data['status']=true;		

				$start_row=$this->uri->segment(3);

				$per_page=8;

				if(trim($start_row)=='')

				{

					$start_row=0;

					}

				$query=$this->site_model->products_video();

				$total_rows = $query->num_rows();

				$this->load->library('pagination');

				

				$config['base_url'] = site_url().'/site/products_page_video/';

				$config['total_rows'] = $total_rows;

				$config['per_page'] = $per_page;

				$config['uri_segment'] =3;

				$config['next_link'] = '>';

				$config['prev_link'] = '<';

				$config['num_links'] = 4;

				$config['first_link'] = '>>';

				$config['last_link'] = '<<';

				$config['full_tag_open']='<div class="pagination1">';

				$config['full_tag_close']='</div>';

				$this->pagination->initialize($config);

				$data['video']=$this->site_model->products_limited_video($start_row, $per_page);

				$data['pagination1']= $this->pagination->create_links();	

				$data['main_content']='includes/ct-video';

				$_html=$this->load->view('includes/ct-video',$data,TRUE);

				echo $_html;
    }
    function sitemap()
    {
        $data['main_content']='sitemap';
        $this->load->view('includes/template',$data);
    }
    function ykienchitiet($id)
    {
        $data['id']=$id;
        $data['main_content']='ykien_id';
        $this->load->view('includes/template',$data);
    } 
    function adminuv()
    {
        if(isset($_SESSION['username1']))
        {}
        else
        {
            redirect('thanhvien/login');    
        }	    
    }
    function sendmail()
    {
        $toemail=$_POST['email'];  
        $this->db->where('status',0);        
        $this->db->where('khuyenmai',1);        
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit(1);                       
        $new=$this->db->get('tbltintuc');
        if($new->num_rows>0)
        {
            $row=$new->row();
            $ndtung=str_replace('/upload','http://thucpham24.vn/upload',$row->noidung); 
            $noidung='<p><strong>Sản phẩm từ website thucpham24.vn</strong></p>
            <p><b style="color:red;"><a href='.site_url(LocDau($row->title).'-'.$row->id.'.html').'>'.$row->title.'</a></b></p>            
            <div>'.$ndtung.'</div>
            ';
        }
        else
        {
            $noidung='Hiện không có sản phẩm khuyễn mại nào';
        }
        $noidung1='<p><strong>Sản phẩm từ website thucpham24.vn</strong></p>
            <p><b>Điện thoại:'.$dienthoai.'</b></p>';
        require_once('class.phpmailer.php'); 
        require_once('class.pop3.php'); 
        define('GUSER', 'sales@hpsoft.vn');          // Email
        define('GPWD', 'lamtan8289');                 // Password        
        /*******************************************************
        * Decription               : send mail by smtp
        * Create Date              : 20110417
        * Parameter                :
        *              $to         : recipients mail
        *            $from        : sender
        *            $from_name    : name of sender
        *            $subject    : subject of mail
        *            $body        : body of mail
        * Return                   : true or false
        * Note                     : code by khoinguonit.com
        *******************************************************/    
        global $message;    
        $this->smtpmailer($toemail, "vannghi.nam1@gmail.com", "thucpham24.vn", "Sản phẩm từ website thucpham24.vn",$noidung);
        //$this->smtpmailer("hoann39@gmail.com",$toemail,"thuephotocopytaihanoi.com", "Báo giá từ website thuephotocopytaihanoi.com",$noidung1);
        echo $message;
        $data['contact']=true;
        $data['main_content']='sendmail';
        $this->load->view('includes/template',$data);
    } 
    function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();                  // tạo một đối tượng mới từ class PHPMailer
        $mail->IsSMTP();                         // bật chức năng SMTP
        $mail->SMTPDebug = 0;                      // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->CharSet='UTF-8'; 
        $mail->SMTPAuth = true;                  // bật chức năng đăng nhập vào SMTP này
        $mail->SMTPSecure = 'ssl';                 // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'smtp.gmail.com';         // smtp của gmail
        $mail->Port = 465;                         // port của smpt gmail
        $mail->Username = GUSER;  
        $mail->Password = GPWD;           
        $mail->SetFrom($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
		
        if(!$mail->Send())
        {
            $message = 'Gởi mail bị lỗi: '.$mail->ErrorInfo; 
            return false;
        } else {
            $message = 'Thư của bạn đã được gởi đi ';
            return true;
        }
    }   	
}
?>