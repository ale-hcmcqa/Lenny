<?php 
class thanhvien extends Controller
{
    function thanhvien()
    {
        parent::Controller();
        $this->load->model('thanhvien/thanhvien_model');
        $this->load->library('form_validation');
    }
    function register()
    {
        $data['main_content']='register_view';
        $this->load->view('includes/template',$data);
    }
    function checklogin()
    {
        $user=$_POST['user'];
         $pass=$_POST['pass'];
         $this->db->where('nguoidang',$user);
         $this->db->where('matkhau',md5($pass));
         $user=$this->db->get('tbluser');
         if($user->num_rows()>0)
         {
             echo 'true';
             $_SESSION['username']=$user;
             $_SESSION['id']=$user->row()->id;
         }
         else
         {
             echo 'false';
         }
    }
    function thuchiendangky()
    {
        $this->form_validation->set_rules('tendangnhap','<span style="color:red;">Tên đăng nhập</span>', 'required|min_length[4]|max_length[50]|alpha_numeric|check_user');
		$this->form_validation->set_rules('matkhau','<span style="color:red;">Mật khẩu</span>', 'required|matches[nhaplaimatkhau]|min_length[6]|max_length[50]|alpha_numeric');
		$this->form_validation->set_rules('email', '<span style="color:red;">Email</span>', 'required|valid_email|check_mail');
		$this->form_validation->set_rules('mabaomat', '<span style="color:red;">Mã bảo mật</span>', 'required|check_captcha');
		$this->form_validation->set_rules('hoten', '<span style="color:red;">Họ tên</span>', 'required');
		$this->form_validation->set_rules('dienthoai', '<span style="color:red;">Điện thoại</span>', 'required|alpha_numeric');
		$this->form_validation->set_rules('diachi', '<span style="color:red;">Địa chỉ</span>', 'required');
		$this->form_validation->set_message('alpha_numeric', '%s <span style="color:red;">không được chứa kí tự đặc biệt.</span>');
		$this->form_validation->set_message('min_length', '%s <span style="color:red;">phải có từ 6 - 50 ký tự</span>');
		$this->form_validation->set_message('max_length', '%s <span style="color:red;">phải có từ 6 - 50 ký tự</span>');
		$this->form_validation->set_message('required', '%s <span style="color:red;">không để trống</span>');
		$this->form_validation->set_message('matches', '%s <span style="color:red;">không trùng nhau</span>');
		$this->form_validation->set_message('valid_email', '%s <span style="color:red;">không đúng định dạng email</span>');
		$this->form_validation->set_message('check_user', '%s <span style="color:red;">đã có người dùng</span>');
		$this->form_validation->set_message('check_mail', '%s <span style="color:red;">đã được sử dụng để đăng ký</span>');
		$this->form_validation->set_message('alpha_numeric', '%s <span style="color:red;">chỉ có thể nhập số</span>');
		$this->form_validation->set_message('check_captcha', '%s <span style="color:red;">không đúng</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$data['main_content'] = 'register_view';
			$data['error_register']=validation_errors();
			$this->load->view('includes/template', $data);	
		}
		else
		{
			$username=$this->input->post('tendangnhap');
			$password=md5($this->input->post('matkhau'));
			$name=$this->input->post('hoten');						
			$email=$this->input->post('email');						
			$phone=$this->input->post('dienthoai');	
			$address=$this->input->post('diachi');	
			$date=getdate();
			$sDate=$date['year'].'-'.$date['mon'].'-'.$date['mday'];
			$insert_data = array(				
				'nguoidang' => $username ,
				'matkhau' => $password ,
                'hoten' => $name,
                'diachi'    =>$address,
                'dienthoai' => $phone,
				'email' => $email,
                'ngaydang'  =>$sDate,								
                'status'    =>0
			);
			$this->db->insert('tbluser', $insert_data);
			$id=mysql_insert_id();
			$_SESSION['username']=$username;
			$_SESSION['id']=$id;
			$data['main_content'] = 'register_view';
			$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
			$this->load->view('includes/template', $data);	
		}
    }   
    function luucv()
    {
        $this->adminuv();
        if($_POST["save"])
        {
            if(isset($_SESSION['username1']))
            {
                $this->db->where('emailuv',$_SESSION['username1']);
                $ungvien=$this->db->get('tblungvien')->row();
            }  
            $this->db->where('emailuv',$ungvien->id);
            $this->db->where('title',$this->input->post('title'));
            $luu=$this->db->get('tblluucongviec');  
            if($luu->num_rows() >0)
            {
                $id=$luu->row()->id;
                $emailuv=$ungvien->id;
                $title=$this->input->post('title');
                $dateluu=getdate();
                $sDateluu=$dateluu['year'].'-'.$dateluu['mon'].'-'.$dateluu['mday'];
                $updateluu=array(
                        'emailuv'   =>$emailuv,
                        'title' =>$title,
                        'ngayluu'=>$sDateluu
                    );
                $this->db->where('id',$id);    
                $this->db->update('tblluucongviec',$updateluu);             
            }
            else
            {
                $emailuv=$ungvien->id;
                $title=$this->input->post('title');
                $dateluu=getdate();
                $sDateluu=$dateluu['year'].'-'.$dateluu['mon'].'-'.$dateluu['mday'];
                $insertluu=array(
                        'emailuv'   =>$emailuv,
                        'title' =>$title,
                        'ngayluu'=>$sDateluu
                    );
                $this->db->insert('tblluucongviec',$insertluu); 
            }
        }  
        redirect('thanhvien/listluuhoso');             
    }
    function listluuhoso()
    {
        $start_row=$this->uri->segment(3);
        $per_page=25;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->thanhvien_model->getluuhoso();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thanhvien/listluuhoso/';
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
		$data['hoso']=$this->thanhvien_model->getluuhoso_limited($start_row,$per_page);
        $data['pagination']= $this->pagination->create_links();
        $data['nhatuyendung']=true;
        $data['ungvien']=true;
        $data['main_content1'] = 'luuhoso_view';
        $this->load->view('includes/template',$data);     
    }
    function deleteluu($id)
    {
        $this->db->delete('tblluucongviec',array('id'=>$id));
        redirect('thanhvien/listluuhoso');
    }
    function dangtin()
    {
        $this->admin();
        $data['main_content1']='dangtin_view';
        $data['nhatuyendung']=true;
        $this->load->view('includes/template',$data);
    }    
    function dodangtin()
    {
        $this->admin();
        $this->form_validation->set_rules('tieude','<span style="color:red;">Tiêu đề</span>','required|min_length[6]');
        $this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');
        //$this->form_validation->set_rules('email','<span style="color:red;">Địa chỉ Email</span>','required|valid_email');
        //$this->form_validation->set_rules('email2','<span style="color:red;">Địa chỉ Email 2</span>','required|valid_email');
        $this->form_validation->set_rules('ngaynhan','<span style="color:red;">Ngày nhận hồ sơ</span>','required');
        $this->form_validation->set_rules('hannhan','<span style="color:red;">Hạn nhận hồ sơ</span>','required');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        //$this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['main_content1']='dangtin_view';
            $data['nhatuyendung']=true;
            $this->load->view('includes/template',$data);    
        }
        else
        {
            if($this->input->post('nganhnghe')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn ngành nghề";
                $data['main_content1']='dangtin_view';
                $data['nhatuyendung']=true;
                $this->load->view('includes/template',$data);      
            } 
            elseif($this->input->post('bangcap')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn bằng cấp";
                $data['main_content1']='dangtin_view';
                $data['nhatuyendung']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('tienganh')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn trình độ Tiếng Anh";
                $data['main_content1']='dangtin_view';
                $data['nhatuyendung']=true;
                $this->load->view('includes/template',$data);     
            }
            elseif($this->input->post('kinhnghiem')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn Kinh nghiệm";
                $data['main_content1']='dangtin_view';
                $data['nhatuyendung']=true;
                $this->load->view('includes/template',$data);    
            }
            elseif($this->input->post('luong')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn Lương";
                $data['main_content1']='dangtin_view';
                $data['nhatuyendung']=true;
                $this->load->view('includes/template',$data);    
            }
            else
            {
                $getdate=explode('-',$this->input->post('ngaynhan'));
                $ngaynhan=$getdate[2].'-'.$getdate[1].'-'.$getdate[0];
                $getdate1=explode('-',$this->input->post('hannhan'));
                $hannhan=$getdate1[2].'-'.$getdate1[1].'-'.$getdate1[0];
                $getdate2=getdate();
               	$sDate = $getdate2['year'].'-'.$getdate2['mon'].'-'.$getdate2['mday'];
                $title=$this->input->post('tieude');
                $nganhnghe=$this->input->post('nganhnghe');
                $mota=$this->input->post('mota');  
                $kynang=$this->input->post('kynang');
                $bangcap=$this->input->post('bangcap');
                $trinhdo=$this->input->post('tienganh');
                $kinhnghiem=$this->input->post('kinhnghiem');
                $luong=$this->input->post('luong');
                $thuviec=$this->input->post('thuviec');
                $tuoi=$this->input->post('tuoi');
                $phucap=$this->input->post('phucap');
                $diadiem=$this->input->post('diadiem');
                $hoso=$this->input->post('hoso');
                $nguoinhan=$this->input->post('nguoinhan');
                $diachinhanhs=$this->input->post('diachinhan');
                $dienthoai=$this->input->post('dienthoai');
                $email1=$this->input->post('email');
                $email2=$this->input->post('email2');
                date_default_timezone_set('Asia/Saigon');	
                $today = date('g:i A'); 
                if(isset($_SESSION['username']))
                {
                    $this->db->where('email',$_SESSION['username']);
                    $user=$this->db->get('tblnhatuyendung')->row();
                }
                //$ngaynhan=$this->input->post('ngaynhan');
                //$hannhan=$this->input->post('hannhan');
                $insert_tuyendung=array(
                                    'title' =>$title,
                                    'nganhnghe' => $nganhnghe,
                                    'motacongviec'  =>$mota,
                                    'kynangyeucau'  =>$kynang,
                                    'bangcap'   =>$bangcap,
                                    'trinhdo'   =>$trinhdo,
                                    'kinhnghiem' =>$kinhnghiem,
                                    'luong' => $luong,
                                    'thoigianthuviec'   =>$thuviec,
                                    'tuoi'  =>$tuoi,
                                    'phucap'    =>$phucap,
                                    'tinhthanh' =>$diadiem,
                                    'hoso'  =>$hoso,
                                    'nguoinhan' =>$nguoinhan,
                                    'diachinhanhoso'=>$diachinhanhs,
                                    'dienthoai' =>$dienthoai,
                                    'email1' =>$email1,
                                    'email2'    =>$email2,
                                    'ngaynhanhoso' =>$ngaynhan,
                                    'hannhanhoso'   =>$hannhan,
                                    'ngaydang'  =>$sDate,
                                    'giodang'   =>$today,
                                    'email' =>$user->id,
                                    'ordernum'  =>0,
                                    'status'    =>0   
                ); 
                $this->db->insert('tbltintuyendung',$insert_tuyendung);   
                $data['thanhcong']=true;
                $data['nhatuyendung']=true; 
                $data['main_content1']='dangtin_view';                
                $this->load->view('includes/template',$data);                             
            } 
        }
    }
    function edittintuyendung($id)
    {
        $data['main_content1']='edittindang_view';
        $data['id']=$id;
        $data['nhatuyendung']=true;
        $this->load->view('includes/template',$data);
    }
    function doedittindang()
    {
        $this->admin();
        $this->form_validation->set_rules('tieude','<span style="color:red;">Tiêu đề</span>','required|min_length[6]');
        //$this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required');
        $this->form_validation->set_rules('email','<span style="color:red;">Địa chỉ Email</span>','required|valid_email');
        $this->form_validation->set_rules('email2','<span style="color:red;">Địa chỉ Email 2</span>','required|valid_email');
        $this->form_validation->set_rules('ngaynhan','<span style="color:red;">Ngày nhận hồ sơ</span>','required');
        $this->form_validation->set_rules('hannhan','<span style="color:red;">Hạn nhận hồ sơ</span>','required');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        //$this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['main_content1']='edittindang_view';
            $data['nhatuyendung']=true;
            $data['id']=$this->input->post('id');
            $this->load->view('includes/template',$data);    
        }
        else
        {
            if($this->input->post('nganhnghe')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn ngành nghề";
                $data['main_content1']='edittindang_view';
                $data['nhatuyendung']=true;
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);      
            } 
            elseif($this->input->post('bangcap')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn bằng cấp";
                $data['main_content1']='edittindang_view';
                $data['nhatuyendung']=true;
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('tienganh')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn trình độ Tiếng Anh";
                $data['main_content1']='edittindang_view';
                $data['nhatuyendung']=true;
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);     
            }
            elseif($this->input->post('kinhnghiem')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn Kinh nghiệm";
                $data['main_content1']='edittindang_view';
                $data['nhatuyendung']=true;
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);    
            }
            elseif($this->input->post('luong')=='0')
            {
                $data['error_register'] = "Bạn chưa chọn Lương";
                $data['main_content1']='edittindang_view';
                $data['nhatuyendung']=true;
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);    
            }
            else
            {
                $getdate=explode('-',$this->input->post('ngaynhan'));
                $ngaynhan=$getdate[2].'-'.$getdate[1].'-'.$getdate[0];
                $getdate1=explode('-',$this->input->post('hannhan'));
                $hannhan=$getdate1[2].'-'.$getdate1[1].'-'.$getdate1[0];
                $getdate2=getdate();
               	$sDate = $getdate2['year'].'-'.$getdate2['mon'].'-'.$getdate2['mday'];
                $id=$this->input->post('id');
                $title=$this->input->post('tieude');
                $nganhnghe=$this->input->post('nganhnghe');
                $mota=$this->input->post('mota');  
                $kynang=$this->input->post('kynang');
                $bangcap=$this->input->post('bangcap');
                $trinhdo=$this->input->post('tienganh');
                $kinhnghiem=$this->input->post('kinhnghiem');
                $luong=$this->input->post('luong');
                $thuviec=$this->input->post('thuviec');
                $tuoi=$this->input->post('tuoi');
                $phucap=$this->input->post('phucap');
                $diadiem=$this->input->post('diadiem');
                $hoso=$this->input->post('hoso');
                $nguoinhan=$this->input->post('nguoinhan');
                $diachinhanhs=$this->input->post('diachinhan');
                $dienthoai=$this->input->post('dienthoai');
                $giodang=$this->input->post('giodangct');
                $email1=$this->input->post('email');
                $email2=$this->input->post('email2');
                if(isset($_SESSION['username']))
                {
                    $this->db->where('email',$_SESSION['username']);
                    $user=$this->db->get('tblnhatuyendung')->row();
                }
                //$ngaynhan=$this->input->post('ngaynhan');
                //$hannhan=$this->input->post('hannhan');
                $update_tuyendung=array(
                                    'title' =>$title,
                                    'nganhnghe' => $nganhnghe,
                                    'motacongviec'  =>$mota,
                                    'kynangyeucau'  =>$kynang,
                                    'bangcap'   =>$bangcap,
                                    'trinhdo'   =>$trinhdo,
                                    'kinhnghiem' =>$kinhnghiem,
                                    'luong' => $luong,
                                    'thoigianthuviec'   =>$thuviec,
                                    'tuoi'  =>$tuoi,
                                    'phucap'    =>$phucap,
                                    'tinhthanh' =>$diadiem,
                                    'hoso'  =>$hoso,
                                    'nguoinhan' =>$nguoinhan,
                                    'diachinhanhoso'=>$diachinhanhs,
                                    'dienthoai' =>$dienthoai,
                                    'email1' =>$email1,
                                    'email2'    =>$email2,
                                    'ngaynhanhoso' =>$ngaynhan,
                                    'hannhanhoso'   =>$hannhan,
                                    'ngaydang'  =>$sDate,
                                    'giodang'   =>$giodang,
                                    'email' =>$user->id,
                                    'ordernum'  =>0,
                                    'status'    =>0   
                ); 
                $this->db->where('id',$id);
                $this->db->update('tbltintuyendung',$update_tuyendung);   
                $data['thanhcong']=true;
                $data['nhatuyendung']=true; 
                $data['main_content1']='edittindang_view'; 
                $data['id']=$this->input->post('id');               
                $this->load->view('includes/template',$data);                             
            } 
        }    
    }
    function deletetintuyendung($id)
    {        
        $this->db->delete('tbltintuyendung',array('id'=>$id));
        redirect('thanhvien/listtindang');        
    }
    function deletetinhethan($id)
    {
        $this->db->delete('tbltintuyendung',array('id'=>$id));
        redirect('thanhvien/tinhethan');        
    }
    function listtindang()
    {
        $this->admin();
        $start_row=$this->uri->segment(3);
        $per_page=10;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->thanhvien_model->gettindang();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thanhvien/listtindang/';
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
		$data['query']=$this->thanhvien_model->gettindang_limited($start_row,$per_page);
        $data['pagination']= $this->pagination->create_links();        
        $data['nhatuyendung']=true;
        $data['main_content1']='listtindang_view';
        $this->load->view('includes/template',$data);
    }
    function tinhethan()
    {
        $this->admin();
        $start_row=$this->uri->segment(3);
        $per_page=12;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->thanhvien_model->gettinhethan();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thanhvien/tinhethan/';
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
		$data['query']=$this->thanhvien_model->gettinhethan_limited($start_row,$per_page);
        $data['pagination']= $this->pagination->create_links();        
        $data['nhatuyendung']=true;
        $data['main_content1']='listtinhethan_view';
        $this->load->view('includes/template',$data);    
    }
    function nhatuyendung()
    {
        $data['main_content'] = 'nhatuyendung_view';
        $data['dk']=true;
        $this->load->view('includes/template',$data);
    }
    function dangkyungvien()
    {
        $data['main_content']='ungvien_view';
        $data['dk']=true;
        $this->load->view('includes/template',$data);
    }
    function dodangkyungvien()
    {
        $this->form_validation->set_rules('tendangnhap','<span style="color:red;">Đỉa chỉ Email</span>','required|min_length[6]|max_length[50]|valid_email');
        $this->form_validation->set_rules('matkhau','<span style="color:red;">Mật khẩu</span>','required|matches[nhaplaimatkhau]|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');
        $this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        $this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('max_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('matches','<span style="color:red;">%s không trùng nhau</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['dk']=true;
            $data['main_content'] = 'ungvien_view';
            $this->load->view('includes/template',$data);    
        }
        else
        {
            if($this->thanhvien_model->validate_register_emailuv($this->input->post('tendangnhap'))==true)
            {
                $data['error_register'] = '<span style="color:red;">Email đã tồn tại</span>';
                $data['main_content'] = 'ungvien_view';
                $this->load->view('includes/template',$data);  
                return;   
            }   
            elseif($this->input->post('nganhnghe')=='0')
            {
                $data['error_register'] = '<span style="color:red;">Bạn chưa chọn ngành nghề</span>';
                $data['dk']=true;
                $data['main_content'] = 'ungvien_view';
                $this->load->view('includes/template',$data);         
            }
            elseif($this->input->post('ngay')=='0')
            {
                $data['error_register'] = '<span style="color:red;">Bạn chưa chọn ngày sinh</span>';
                $data['dk']=true;
                $data['main_content'] = 'ungvien_view';
                $this->load->view('includes/template',$data);     
            } 
            elseif($this->input->post('thang')=='0')
            {
                $data['error_register'] = '<span style="color:red;">Bạn chưa chọn tháng sinh</span>';
                $data['dk']=true;
                $data['main_content'] = 'ungvien_view';
                $this->load->view('includes/template',$data);     
            } 
            elseif($this->input->post('nam')=='0')
            {
                $data['error_register'] = '<span style="color:red;">Bạn chưa chọn năm sinh</span>';
                $data['dk']=true;
                $data['main_content'] = 'ungvien_view';
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('tinhthanh')=='0')
            {
                $data['error_register'] = '<span style="color:red;">Bạn chưa chọn tỉnh thành</span>';
                $data['dk']=true;
                $data['main_content'] = 'ungvien_view';
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
                    //$image_data = $this->upload->data();
                    //$name_img='upload/'.$image_data['file_name'];
                    $image_data = $this->upload->data();
                    $slider='upload/'.$image_data['file_name'];
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
                $email = $this->input->post('tendangnhap');
                $password = md5($this->input->post('matkhau'));  
                $nganhnghe=$this->input->post('nganhnghe');          
                $hoten = $this->input->post('hoten');
                $diachi = $this->input->post('diachi');                
                $didong = $this->input->post('didong');
                $dienthoai=$this->input->post('dienthoai');                            
                $gioitinh = $this->input->post('gioitinh');
                $sothich=$this->input->post('sothich');
                $ngay=$this->input->post('ngay');
                $thang=$this->input->post('thang');
                $nam=$this->input->post('nam');
                $ngaysinh=$nam.'-'.$thang.'-'.$ngay;
                $tinhtrang=$this->input->post('honnhan');    
                $tinhthanh=$this->input->post('tinhthanh');                        
                $date = getdate();
                $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $insert_data = array(                    
                        'emailuv'  =>$email,
                        'matkhau'   =>$password,
                        'nganhnghe' =>$nganhnghe,
                        'hoten'     =>$hoten,
                        'diachi'    =>$diachi,
                        'gioitinh'   =>$gioitinh,
                        'ngaysinh' =>$ngaysinh,
                        'tinhtranghonnhan' =>$tinhtrang,                    
                        'didong' =>$didong,
                        'phone'=>$dienthoai,
                        'tinhthanh'  =>$tinhthanh,
                        'anh'       =>$name_img,                    
                        'anh_thumb' =>$thumb,                                                                        
                        'ngaydang'=>$sDate,
                        'sothich' =>$sothich,
                        'ordernum'  =>0,
                        'status'    =>0
                );    
                $this->db->insert('tblungvien',$insert_data);
               // $id = mysql_insert_id();
               // $_SESSION['username'] = $username;
                //$_SESSION['id'] = $id;
                $data['thanhcong'] = true;            
                $data['main_content'] = 'ungvien_view';
                //$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
                $this->load->view('includes/template',$data);    
            }    
        }
    }
    function doeditdangkyungvien()
    {                          
        if($this->input->post('ngay')=='0')
        {
            $data['error_register'] = '<span style="color:red;">Bạn chưa chọn ngày sinh</span>';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;
            $data['main_content1'] = 'includes/main_content1';
            $this->load->view('includes/template',$data);     
        } 
        elseif($this->input->post('thang')=='0')
        {
            $data['error_register'] = '<span style="color:red;">Bạn chưa chọn tháng sinh</span>';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;
            $data['main_content1'] = 'includes/main_content1';
            $this->load->view('includes/template',$data);     
        } 
        elseif($this->input->post('nam')=='0')
        {
            $data['error_register'] = '<span style="color:red;">Bạn chưa chọn năm sinh</span>';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;
            $data['main_content1'] = 'includes/main_content1';
            $this->load->view('includes/template',$data);     
        }  
        elseif($this->input->post('nganhnghe')=='0')
        {
            $data['error_register'] = '<span style="color:red;">Bạn chưa chọn ngành nghề</span>';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;
            $data['main_content1'] = 'includes/main_content1';
            $this->load->view('includes/template',$data);      
        }
        elseif($this->input->post('tinhthanh')=='0')
        {
            $data['error_register'] = '<span style="color:red;">Bạn chưa chọn tỉnh thành</span>';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;
            $data['main_content1'] = 'includes/main_content1';
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
                    $name_img=$this->input->post('anhuv');
                    $thumb=$this->input->post('anhthumbuv');
                }
                else
                {
                    //$image_data = $this->upload->data();
                    //$name_img='upload/'.$image_data['file_name'];
                    $image_data = $this->upload->data();
                    $slider='upload/'.$image_data['file_name'];
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
                $email = $this->input->post('tendangnhap');
                $password = md5($this->input->post('matkhau'));            
                $hoten = $this->input->post('hoten');
                $diachi = $this->input->post('diachi');
                $didong=$this->input->post('didong');                
                $dienthoai = $this->input->post('dienthoai');                            
                $gioitinh = $this->input->post('gioitinh');
                $sothich=$this->input->post('sothich');
                $ngay=$this->input->post('ngay');
                $thang=$this->input->post('thang');
                $nam=$this->input->post('nam');
                $ngaysinh=$nam.'-'.$thang.'-'.$ngay;
                $tinhtrang=$this->input->post('honnhan');    
                $tinhthanh=$this->input->post('tinhthanh'); 
                $nganhnghe=$this->input->post('nganhnghe');                       
                $date = getdate();
                $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $updateungvien = array(                    
                       // 'email'  =>$email,
                        //'matkhau'   =>$password,
                        'nganhnghe' =>$nganhnghe,
                        'hoten'     =>$hoten,
                        'diachi'    =>$diachi,
                        'gioitinh'   =>$gioitinh,
                        'ngaysinh' =>$ngaysinh,
                        'tinhtranghonnhan' =>$tinhtrang,                    
                        'didong' =>$didong,
                        'phone'=>$dienthoai,
                        'tinhthanh'  =>$tinhthanh,
                        'anh'       =>$name_img,                    
                        'anh_thumb' =>$thumb,                                                                        
                        'ngaydang'=>$sDate,
                        'sothich'=>$sothich,
                        'ordernum'  =>0,
                        'status'    =>0
                );  
                $this->db->where('id',$this->input->post('ungvienid'));  
                $this->db->update('tblungvien',$updateungvien);
               // $id = mysql_insert_id();
               // $_SESSION['username'] = $username;
                //$_SESSION['id'] = $id;
                $data['thanhcong'] = true; 
                $data['nhatuyendung']=true;
                $data['ungvien']=true;           
                $data['main_content1'] = 'includes/main_content1';
                //$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
                $this->load->view('includes/template',$data);    
            }             
    }
    function quanlytuyendung()
    {
        $this->admin();
        $data['nhatuyendung']=true;        
        $data['main_content1'] = 'includes/main_content1';
        $this->load->view('includes/template', $data);     
    }
    function quanlyungvien()
    {
        $this->adminuv();
        $data['nhatuyendung']=true;
        $data['ungvien']=true;
        $data['main_content1'] = 'includes/main_content1';
        $this->load->view('includes/template', $data);  
    }
    function donhatuyendung()
    {        
        $this->form_validation->set_rules('tendangnhap','<span style="color:red;">Đỉa chỉ Email</span>','required|min_length[6]|max_length[50]|valid_email|checkuser');
        $this->form_validation->set_rules('matkhau','<span style="color:red;">Mật khẩu</span>','required|matches[nhaplaimatkhau]|min_length[6]|max_length[50]');        
        $this->form_validation->set_rules('hoten','<span style="color:red;">Họ tên</span>','required');
        $this->form_validation->set_rules('chucvu','<span style="color:red;">Chức vụ</span>','required');
        $this->form_validation->set_rules('didong','<span style="color:red;">Di động</span>','required|alpha_numeric');
        $this->form_validation->set_rules('congty','<span style="color:red;">Tên công ty</span>','required');
        $this->form_validation->set_rules('diachi','<span style="color:red;">Điạ chỉ</span>','required');
        $this->form_validation->set_rules('dienthoai','<span style="color:red;">Điện thoại</span>','required|alpha_numeric');
        $this->form_validation->set_message('checkuser','<span style="color:red;">%s đã có người dùng</span>');
        $this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');             
        $this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('alpha_numeric','<span style="color:red;">%s không được chứa các ký tự đặc biệt</span>');
        $this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('max_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('matches','<span style="color:red;">%s không trùng nhau</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['dk']=true;
            $data['main_content'] = 'nhatuyendung_view';
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
            if ( ! $this->upload->do_upload('logo'))
            {
                $name_img='';
                $thumb='';
            }
            else
            {
                //$image_data = $this->upload->data();
                //$name_img='upload/'.$image_data['file_name'];
                $image_data = $this->upload->data();
                $slider='upload/'.$image_data['file_name'];
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
            if($this->thanhvien_model->validate_register_email($this->input->post('tendangnhap'))==true)
            {
                $data['error_register'] = "Email đã tồn tại";
                $data['dk']=true;
                $data['main_content'] = 'nhatuyendung_view';
                $this->load->view('includes/template',$data);  
                return;   
            }          
            elseif($this->input->post('loaihinh')==-1)
            {
                $data['error_register'] = "Bạn chưa chọn loại hình công ty";
                $data['dk']=true;
                $data['main_content'] = 'nhatuyendung_view';
                $this->load->view('includes/template',$data);    
            }
            elseif($this->input->post('tinhthanh')==0)
            {
                $data['error_register'] = "Bạn chưa chọn tỉnh thành";
                $data['dk']=true;
                $data['main_content'] = 'nhatuyendung_view';
                $this->load->view('includes/template',$data);    
            }
            else
            {
                $email = $this->input->post('tendangnhap');
                $password = md5($this->input->post('matkhau'));            
                $hoten = $this->input->post('hoten');
                $chucvu = $this->input->post('chucvu');
                $didong = $this->input->post('didong');
                $congty=$this->input->post('congty');
                $diachi = $this->input->post('diachi');            
                $dienthoai = $this->input->post('dienthoai');            
                $loaihinh = $this->input->post('loaihinh');
                $website=$this->input->post('website');    
                $tinhthanh=$this->input->post('tinhthanh'); 
                $gioithieu =$this->input->post('gioithieu');       
                $date = getdate();
                $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $insert_data = array(                    
                        'email'  =>$email,
                        'matkhau'   =>$password,
                        'hoten'     =>$hoten,
                        'chucvu'     =>$chucvu,
                        'didong'    =>$didong,
                        'tencongty' =>$congty,
                        'diachi' =>$diachi,                    
                        'dienthoai' =>$dienthoai,
                        'anh'       =>$name_img,                    
                        'anh_thumb' =>$thumb,
                        'loaihinh'  =>$loaihinh,
                        'website'   =>$website,
                        'tinhthanh'  =>$tinhthanh,
                        'gioithieu' =>$gioithieu,
                        'ngaydangky'=>$sDate,
                        'ordernum'  =>0,
                        'status'    =>0
                );    
                $this->db->insert('tblnhatuyendung',$insert_data);
               // $id = mysql_insert_id();
               // $_SESSION['username'] = $username;
                //$_SESSION['id'] = $id;
                $data['thanhcong'] = true;            
                $data['main_content'] = 'nhatuyendung_view';
                //$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
                $this->load->view('includes/template',$data);
            }
        }
    }
    function doeditnhatuyendung()
    {
        //$this->form_validation->set_rules('tendangnhap','<span style="color:red;">Đỉa chỉ Email</span>','required|min_length[6]|max_length[50]|valid_email|checkuser');
       // $this->form_validation->set_rules('matkhau','<span style="color:red;">Mật khẩu</span>','required|matches[nhaplaimatkhau]|min_length[6]|max_length[50]');        
        $this->form_validation->set_rules('hoten','<span style="color:red;">Họ tên</span>','required');
        $this->form_validation->set_rules('chucvu','<span style="color:red;">Chức vụ</span>','required');
        $this->form_validation->set_rules('didong','<span style="color:red;">Di động</span>','required|alpha_numeric');
        $this->form_validation->set_rules('congty','<span style="color:red;">Tên công ty</span>','required');
        $this->form_validation->set_rules('diachi','<span style="color:red;">Điạ chỉ</span>','required');
        $this->form_validation->set_rules('dienthoai','<span style="color:red;">Điện thoại</span>','required|alpha_numeric');
        //$this->form_validation->set_message('checkuser','<span style="color:red;">%s đã có người dùng</span>');
        //$this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');             
        //$this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('alpha_numeric','<span style="color:red;">%s không được chứa các ký tự đặc biệt</span>');
        //$this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
       // $this->form_validation->set_message('max_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        //$this->form_validation->set_message('matches','<span style="color:red;">%s không trùng nhau</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['nhatuyendung']=true;
            $data['main_content1'] = 'includes/main_content1';
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
            if ( ! $this->upload->do_upload('logo'))
            {
                $name_img=$this->input->post('anh');
                $thumb=$this->input->post('anhresize');
            }
            else
            {
                //$image_data = $this->upload->data();
                //$name_img='upload/'.$image_data['file_name'];
                $image_data = $this->upload->data();
                $slider='upload/'.$image_data['file_name'];
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
            /*if($this->thanhvien_model->validate_register_email($this->input->post('tendangnhap'))==true)
            {
                $data['error_register'] = "Email đã tồn tại";
                $data['main_content'] = 'nhatuyendung_view';
                $this->load->view('includes/template',$data);  
                return;   
            } 
            */         
            if($this->input->post('loaihinh')==-1)
            {
                $data['error_register'] = "Bạn chưa chọn loại hình công ty";
                $data['nhatuyendung']=true;
                $data['main_content1'] = 'includes/main_content1';
                $this->load->view('includes/template',$data);    
            }
            elseif($this->input->post('tinhthanh')==0)
            {
                $data['error_register'] = "Bạn chưa chọn tỉnh thành";
                $data['nhatuyendung']=true;
                $data['main_content1'] = 'includes/main_content1';
                $this->load->view('includes/template',$data);    
            }
            else
            {
                //$email = $this->input->post('tendangnhap');
                //$password = md5($this->input->post('matkhau'));            
                $hoten = $this->input->post('hoten');
                $chucvu = $this->input->post('chucvu');
                $didong = $this->input->post('didong');
                $congty=$this->input->post('congty');
                $diachi = $this->input->post('diachi');            
                $dienthoai = $this->input->post('dienthoai');            
                $loaihinh = $this->input->post('loaihinh');
                $website=$this->input->post('website');    
                $tinhthanh=$this->input->post('tinhthanh'); 
                $gioithieu =$this->input->post('gioithieu');       
                $date = getdate();
                $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $insert_data = array(                    
                        //'email'  =>$email,
                        //'matkhau'   =>$password,
                        'hoten'     =>$hoten,
                        'chucvu'     =>$chucvu,
                        'didong'    =>$didong,
                        'tencongty' =>$congty,
                        'diachi' =>$diachi,                    
                        'dienthoai' =>$dienthoai,
                        'anh'       =>$name_img,                    
                        'anh_thumb' =>$thumb,
                        'loaihinh'  =>$loaihinh,
                        'website'   =>$website,
                        'tinhthanh'  =>$tinhthanh,
                        'gioithieu' =>$gioithieu,
                        'ngaydangky'=>$sDate,
                        'ordernum'  =>0,
                        'status'    =>0
                );   
                $this->db->where('id',$this->input->post('txtid')); 
                $this->db->update('tblnhatuyendung',$insert_data);
               // $id = mysql_insert_id();
               // $_SESSION['username'] = $username;
                //$_SESSION['id'] = $id;
                $data['thanhcong'] = true;   
                $data['nhatuyendung']=true;         
                $data['main_content1'] = 'includes/main_content1';
                //$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
                $this->load->view('includes/template',$data);
            }
        }    
    }
    function login()
    {
        $data['main_content'] = 'login_view';
        $this->load->view('includes/template',$data);
    }
    function thuchiendangnhap()
	{
			$username=$_POST['username'];
			$password=md5($_POST['password']);
			$this->db->where('nguoidang',$username);
			$this->db->where('matkhau',$password);
			$kq=$this->db->get('tbluser');
			if($kq->num_rows()>0)
			{
				$data['error_register']='<strong style="color:#22B700;">Xin chào :<span style="color:blue;"> '.$username.'</span> </strong><br/><strong style="color:#22B700;">Bạn đã đăng nhập tài khoản thành công - Chúc bạn một ngày vui vẻ</strong>';
				$_SESSION['username']=$kq->row()->nguoidang;
				$_SESSION['id']=$kq->row()->id;				
				redirect(base_url());
			}
			else
			{
				$data['error_register']='<p><span style="color:red;">Tên đăng nhập hoặc mật khẩu không đúng.Vui lòng thử lại !</span></p>';
				$data['main_content'] = 'login_view';
			    $this->load->view('includes/template', $data);
			}
	}             
    function dologintuyendung()
    {
        $username = $this->input->post('email');
        $matkhau = md5($this->input->post('matkhau'));
        $this->db->where('status',0);
        $this->db->where('email',$username);
        $this->db->where('matkhau',$matkhau);
        $kq = $this->db->get('tblnhatuyendung');
        if($kq->num_rows() > 0)
        {
            $data['error_register'] ='<strong style="color:#22B700;">Xin chào :<span style="color:blue;"> '.$username.'</span> </strong><br/><strong style="color:#22B700;">Bạn đã đăng nhập tài khoản thành công - Chúc bạn một ngày vui vẻ</strong>';
            $_SESSION['username'] = $kq->row()->email;
            $_SESSION['id'] = $kq->row()->id;
            if(isset($_POST['check_cookie']))
            {
                 $expire=time()+60*60*24*365; // Tổng số giây có được từ thời có máy chủ unix, tức là thời gian sẽ là ngày mai nếu tính từ thời điểm hiện tại
                 setcookie("user",$username, $expire,"/");
                 setcookie("pass",$matkhau,time() +60*60*30*365,"/");
            }
            redirect('thanhvien/quanlytuyendung');     
        }
        else
        {
            $data['error_register']='<p>Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại</p>';
            $data['main_content'] = 'login_view';
            $this->load->view('includes/template',$data);
        }
    }
    function dologinungvien()
    {
        $username = $this->input->post('email');
        $matkhau = md5($this->input->post('matkhau'));
        $this->db->where('status',0);
        $this->db->where('emailuv',$username);
        $this->db->where('matkhau',$matkhau);
        $kq = $this->db->get('tblungvien');
        if($kq->num_rows() > 0)
        {
            $data['error_registeruv'] ='<strong style="color:#22B700;">Xin chào :<span style="color:blue;"> '.$username.'</span> </strong><br/><strong style="color:#22B700;">Bạn đã đăng nhập tài khoản thành công - Chúc bạn một ngày vui vẻ</strong>';
            $_SESSION['username1'] = $kq->row()->emailuv;
            $_SESSION['id'] = $kq->row()->id;
            if(isset($_POST['check_cookie']))
            {
                 $expire=time()+60*60*24*365; // Tổng số giây có được từ thời có máy chủ unix, tức là thời gian sẽ là ngày mai nếu tính từ thời điểm hiện tại
                 setcookie("user",$username, $expire,"/");
                 setcookie("pass",$matkhau,time() +60*60*30*365,"/");
            }
            redirect('thanhvien/quanlyungvien');     
        }
        else
        {
            $data['error_registeruv']='<p>Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại</p>';
            $data['main_content'] = 'login_view';
            $this->load->view('includes/template',$data);
        }    
    }
    function quenmatkhau()
    {
        $data['main_content'] = 'quenmatkhau_view';        
        $this->load->view('includes/template',$data);
    }
    function doforget()
    {
        $this->form_validation->set_rules('email','<span style="color:red;">Email</span>','required|valid_email');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_changepass'] = validation_errors();
            $data['main_content'] = 'quenmatkhau_view';               
            $this->load->view('includes/template',$data); 
        }   
        else
        {
            $email = $_POST['email'];
            $this->db->where('email',$email);
            $u = $this->db->get('tbluser');
            if($u->num_rows() > 0)
            {
                $data = array(
                    'matkhau' =>md5('123456'),
                );    
                $this->db->where('email',$email);
                $this->db->update('tbluser',$data);
                $data['email'] = $email;
                $data['error_changepass'] = '<span style="color:green; font-weight:bold; font-size: 12px;">Gửi thành công.<br/>Một email chứa nội dung về tên đăng nhập và mật khẩu đã được gửi về email của bạn.</span>';
                $data['main_content'] = 'quenmatkhau_view';                
                $this->load->view('includes/template',$data);
            }   
            else
            {
                $data['error_changepass'] = '<span style="color:red;">Email không tồn tại trong hệ thống</span>';
                $data['main_content'] = 'quenmatkhau_view';                
                $this->load->view('includes/template',$data);
            }  
        } 
    }
    function quenmatkhauuv()
    {
        $data['main_content'] = 'quenmatkhauuv_view';        
        $this->load->view('includes/template',$data);    
    }
    function doforgetuv()
    {
        $this->form_validation->set_rules('email','<span style="color:red;">Email</span>','required|valid_email');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_changepass'] = validation_errors();
            $data['main_content'] = 'quenmatkhauuv_view';               
            $this->load->view('includes/template',$data); 
        }   
        else
        {
            $email = $_POST['email'];
            $this->db->where('email',$email);
            $u = $this->db->get('tblungvien');
            if($u->num_rows() > 0)
            {
                $data = array(
                    'matkhau' =>md5('123456'),
                );    
                $this->db->where('email',$email);
                $this->db->update('tblungvien',$data);
                $data['email'] = $email;
                $data['error_changepass'] = '<span style="color:green; font-weight:bold; font-size: 12px;">Gửi thành công.<br/>Một email chứa nội dung về tên đăng nhập và mật khẩu đã được gửi về email của bạn.</span>';
                $data['main_content'] = 'quenmatkhauuv_view';                
                $this->load->view('includes/template',$data);
            }   
            else
            {
                $data['error_changepass'] = '<span style="color:red;">Email không tồn tại trong hệ thống</span>';
                $data['main_content'] = 'quenmatkhauuv_view';                
                $this->load->view('includes/template',$data);
            }  
        }     
    }
    function doimatkhau()
    {
        $data['main_content']='doipass_view';        
        $data['id']=$_SESSION['id'];
        $this->load->view('includes/template',$data);    
    }    
    function dodoimk()
    {
        $this->form_validation->set_rules('matkhaucu','<span style="color:red;">Mật khẩu cũ</span>','required');
        $this->form_validation->set_rules('matkhaumoi','<span style="color:red;"Mật khẩu mới</span>','required');
        if($this->form_validation->run() ==FALSE)
        {
            $data['main_content']='doipass_view';            
            $data['id']=$this->input->post('id');
            $this->load->view('includes/template',$data);    
        }   
        else
        {
            $matkhau=md5($_POST['matkhaucu']);
            $this->db->where('matkhau',$matkhau);
            $d=$this->db->get('tbluser');
            if($d->num_rows()>0)
            {
                $data_mk=array(
                    'matkhau'=>md5($this->input->post('matkhaumoi'))
                );  
                $this->db->where('id',$this->input->post('id')); 
                $this->db->update('tbluser',$data_mk); 
                $data['error_register']='<span style="color:green;">Đổi mật khẩu thành công</span>';  
                $data['main_content']='doipass_view';                  
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);        
            }   
            else
            {
                $data['error_register']='Mật khẩu cũ không đúng';  
                $data['main_content']='doipass_view';                  
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);
            } 
        } 
    }
    function doithongtin($id)
    {
        $data['main_content']='thongtin_view';
        $data['id']=$id;
        $this->load->view('includes/template',$data);        
    }
    function dodoithongtin()
    {
       // $this->form_validation->set_rules('tendangnhap','<span style="color:red;">Tài khoản</span>','required|min_length[6]|max_length[50]|check_user');
        //$this->form_validation->set_rules('matkhau','<span style="color:red;">Mật khẩu</span>','required|matches[nhaplaimatkhau]|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('email','<span style="color:red;">Email</span>','required|valid_email|check_email');
        $this->form_validation->set_rules('hoten','<span style="color:red;">Họ tên</span>','required');
        $this->form_validation->set_rules('diachi','<span style="color:red;">Số nhà/Sô ngách/Đường</span>','required');
        $this->form_validation->set_rules('quanhuyen','<span style="color:red;">Quận huyện</span>','required');
        $this->form_validation->set_rules('tinhthanh','<span style="color:red;">Tỉnh thành</span>','required');
        $this->form_validation->set_rules('dienthoai','<span style="color:red;">Điện thoại</span>','required|alpha_numeric');
        $this->form_validation->set_rules('mabaove','<span style="color:red;">Mã bảo vệ</span>','required|check_captcha');
        $this->form_validation->set_message('check_user','<span style="color:red;">%s đã có người dùng</span>');
        $this->form_validation->set_message('check_email','<span style="color:red;">%s đã tồn tại</span>');
        $this->form_validation->set_message('check_captcha','<span style="color:red;">%s không đúng</span>');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('alpha_numeric','<span style="color:red;">%s không được chứa các ký tự đặc biệt</span>');
        $this->form_validation->set_message('min_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('max_length','<span style="color:red;">%s phải có từ 6 đến 50 ký tự</span>');
        $this->form_validation->set_message('matches','<span style="color:red;">%s không trùng nhau</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() == FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['main_content'] = 'thongtin_view';
            $data['id']=$this->input->post('txtid');
            $this->load->view('includes/template',$data);
        }
        else
        {
            $id=$this->input->post('txtid');
            //$username = $this->input->post('tendangnhap');
            $password = md5($this->input->post('matkhau'));
            $email=$this->input->post('email');
            $hoten = $this->input->post('hoten');
            $congty = $this->input->post('congty');
            $duong = $this->input->post('diachi');
            $quanhuyen = $this->input->post('quanhuyen');
            $tinhthanh = $this->input->post('tinhthanh');
            $dienthoai = $this->input->post('dienthoai');
            $fax = $this->input->post('fax');
            $lydo = $this->input->post('lydo').'('.$_POST['nguoigioithieu'].')';
            $date = getdate();
            $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
            $insert_data = array(                    
                   // 'taikhoan'  =>$username,
                    'matkhau'   =>$password,
                    'email'     =>$email,
                    'hoten'     =>$hoten,
                    'congty'    =>$congty,
                    'duong'     =>$duong,
                    'quanhuyen' =>$quanhuyen,
                    'tinhthanh' =>$tinhthanh,
                    'dienthoai' =>$dienthoai,
                    'fax'       =>$fax,                    
                    'lydo'      =>$lydo,
                    'ngaydangky'=>$sDate,
            );  
            $this->db->where('id',$id);  
            $this->db->update('tbldangky',$insert_data);
            //$id = mysql_insert_id();
           // $_SESSION['username'] = $username;
           // $_SESSION['id'] = $id;
           // $data['thanhcong'] = true;   
           $data['id']=$this->input->post('txtid');         
            $data['main_content'] = 'thongtin_view';
            $data['error_register']='<p style="color:#1B9BE6;"><b>Sửa thông tin thành công</b></p>';
            $this->load->view('includes/template',$data);
        }    
    }
    function doipass()
    {
        $data['main_content1']='doipass_view';
        $data['nhatuyendung']=true;
        $data['id']=$_SESSION['id'];
        $this->load->view('includes/template',$data);    
    }
    function doipassungvien()
    {
        $data['main_content1']='doipassuv_view';
        $data['nhatuyendung']=true;
        $data['ungvien']=true;        
        $this->load->view('includes/template',$data);      
    }
    function dodoipassuv()
    {
         $this->form_validation->set_rules('matkhaucu','<span style="color:red;">Mật khẩu cũ</span>','required');
        $this->form_validation->set_rules('matkhaumoi','<span style="color:red;"Mật khẩu mới</span>','required');
        if($this->form_validation->run() ==FALSE)
        {
            $data['main_content1']='doipassuv_view';
            $data['nhatuyendung']=true;
            $data['ungvien']=true;   
            $data['id']=$this->input->post('id');
            $this->load->view('includes/template',$data);    
        }   
        else
        {
            $matkhau=md5($_POST['matkhaucu']);
            $this->db->where('matkhau',$matkhau);
            $d=$this->db->get('tblungvien');
            if($d->num_rows()>0)
            {
                $data_uv=array(
                    'matkhau'=>md5($this->input->post('matkhaumoi'))
                );  
                $this->db->where('id',$this->input->post('id')); 
                $this->db->update('tblungvien',$data_uv); 
                $data['error_register']='<span style="color:green;">Đổi mật khẩu thành công</span>';  
                $data['main_content1']='doipassuv_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true; 
                $data['id']=$this->input->post('id');
                $this->load->view('includes/template',$data);        
            }   
            else
            {
                $data['error_register']='Mật khẩu củ không đúng';  
                $data['main_content1']='doipassuv_view'; 
                 $data['nhatuyendung']=true; 
                $data['id']=$this->input->post('id');
                $data['ungvien']=true; 
                $this->load->view('includes/template',$data);
            } 
        }         
    }    
    function taohoso()
    {
        $this->adminuv();
        $data['main_content1']='taohoso_view'; 
        $data['nhatuyendung']=true; 
        $data['ungvien']=true;
        $this->load->view('includes/template',$data);    
    }
    function dotaohoso()
    {
        $this->adminuv();
        $this->form_validation->set_rules('title','<span style="color:red;">Tiêu đề hồ sơ</span>','required');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        if($this->form_validation->run()==FALSE)
        {
            
            $data['error_register']=validation_errors();
            $data['main_content1']='taohoso_view'; 
            $data['nhatuyendung']=true; 
            $data['ungvien']=true;
            $this->load->view('includes/template',$data);        
        }   
        else
        {
            if($this->input->post('vitrimm')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn vị trí mong muốn</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);    
            }  
            elseif($this->input->post('bangcap')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn bằng cấp</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('trinhdo')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn trình độ tiếng Anh</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('kinhnghiem')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn kinh nghiệm</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('mucluong')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn mức lương</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('loaihinh')=='-1')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn loại hình công ty</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('tinhthanh')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn tỉnh thành</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            else
            {
                $datehs = getdate();
                $sDatehs = $datehs['year'].'-'.$datehs['mon'].'-'.$datehs['mday'];
                date_default_timezone_set('Asia/Saigon');	
                $today = date('g:i A'); 
                if(isset($_SESSION['username1']))
                {
                    $this->db->where('emailuv',$_SESSION['username1']);
                    $ungvien=$this->db->get('tblungvien')->row();
                }
                $checkbox=$_POST['checkbox'];
                $countCheck=count($_POST['checkbox']);
                $del_id='';
                for($i=0;$i<$countCheck;$i++)
                {
                    $del_id=$del_id.','.$checkbox[$i];                    
                }
                $inserthoso=array(
                        'tieude'   =>$this->input->post('title'),
                        'nganhnghe' =>$this->input->post('vitrimm'),
                        'bangcap'   =>$this->input->post('bangcap'),
                        'trinhdo'   =>$this->input->post('trinhdo'),
                        'kinhnghiem'=>$this->input->post('kinhnghiem'),
                        'luong' =>$this->input->post('mucluong'),
                        'muctieucongviec' =>$this->input->post('muctieu'),
                        'gioithieu' =>$this->input->post('gioithieu'),
                        'loaihinhcty'=>$this->input->post('loaihinh'),
                        'tinhthanh' =>$this->input->post('tinhthanh'),
                        'truong'    =>$this->input->post('khoahoc'),
                        'chuyennganh'   =>$this->input->post('chuyennganh'),
                        'chungchiditau' =>$del_id,
                        'tuyen' =>$this->input->post('tuyenhh'),
                        'trongluongtau'=>$this->input->post('trongluong'),
                        'vitrilamviec'  =>$this->input->post('vitrilv'),
                        'loaihang'  =>  $this->input->post('loaihang'),
                        'congty'    =>$this->input->post('congty'),
                        'khuyennghi'=>$this->input->post('khuyennghi'),
                        'ngaydang'  =>$sDatehs,
                        'emailuv' =>$ungvien->id,
                        'giodang'=>$today,
                        'ordernum'=>0,
                        'status'  =>0  
                );  
                $this->db->insert('tblhosoungvien',$inserthoso);
                $data['thanhcong'] = true;            
                $data['main_content1'] = 'taohoso_view';
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                //$data['error_register']='<p style="color:#1B9BE6;"><b>Đăng ký thành công</b></p>';
                $this->load->view('includes/template',$data);
            }
        } 
    }
    function list_hoso()
    {
        $this->adminuv();
        $start_row=$this->uri->segment(3);
        $per_page=15;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->thanhvien_model->gethoso();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thanhvien/list_hoso/';
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
		$data['query']=$this->thanhvien_model->gethoso_limited($start_row,$per_page);
        $data['pagination']= $this->pagination->create_links();
        $data['main_content1'] = 'hoso_view';
        $data['nhatuyendung']=true;
        $data['ungvien']=true;
        $this->load->view('includes/template',$data);
    }
    function deletehoso($id)
    {
        $this->adminuv();
        $this->db->delete('tblhosoungvien',array('id'=>$id));
        redirect('thanhvien/list_hoso');
    }
    function edithoso($id)
    {
        $this->adminuv();
        $data['main_content1'] = 'edithoso_view';
        $data['nhatuyendung']=true;
        $data['ungvien']=true;
        $data['id']=$id;
        $this->load->view('includes/template',$data);    
    }
    function doedittaohoso()
    {
        $this->adminuv();
        $this->form_validation->set_rules('title','<span style="color:red;">Tiêu đề hồ sơ</span>','required');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        if($this->form_validation->run()==FALSE)
        {
            
            $data['error_register']=validation_errors();
            $data['main_content1']='taohoso_view'; 
            $data['nhatuyendung']=true; 
            $data['ungvien']=true;
            $this->load->view('includes/template',$data);        
        }   
        else
        {
            if($this->input->post('vitrimm')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn vị trí mong muốn</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);    
            }  
            elseif($this->input->post('bangcap')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn bằng cấp</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('trinhdo')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn trình độ tiếng Anh</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('kinhnghiem')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn kinh nghiệm</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('mucluong')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn mức lương</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('loaihinh')=='-1')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn loại hình công ty</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            elseif($this->input->post('tinhthanh')=='0')
            {
                $data['error_register']='<span style="color:red;">Bạn chưa chọn tỉnh thành</span>';
                $data['main_content1']='taohoso_view'; 
                $data['nhatuyendung']=true; 
                $data['ungvien']=true;
                $this->load->view('includes/template',$data);     
            }  
            else
            {
                $datehs = getdate();
                $sDatehs = $datehs['year'].'-'.$datehs['mon'].'-'.$datehs['mday'];
                date_default_timezone_set('Asia/Saigon');	
                $today = date('g:i A'); 
                if(isset($_SESSION['username1']))
                {
                    $this->db->where('emailuv',$_SESSION['username1']);
                    $ungvien=$this->db->get('tblungvien')->row();
                }
                $checkbox=$_POST['checkbox'];
                $countCheck=count($_POST['checkbox']);
                $del_id='';
                for($i=0;$i<$countCheck;$i++)
                {
                    $del_id=$del_id.','.$checkbox[$i];                    
                }
                $updatehoso=array(                        
                        'tieude'   =>$this->input->post('title'),
                        'nganhnghe' =>$this->input->post('vitrimm'),
                        'bangcap'   =>$this->input->post('bangcap'),
                        'trinhdo'   =>$this->input->post('trinhdo'),
                        'kinhnghiem'=>$this->input->post('kinhnghiem'),
                        'luong' =>$this->input->post('mucluong'),
                        'muctieucongviec' =>$this->input->post('muctieu'),
                        'gioithieu' =>$this->input->post('gioithieu'),
                        'loaihinhcty'=>$this->input->post('loaihinh'),
                        'tinhthanh' =>$this->input->post('tinhthanh'),
                        'truong'    =>$this->input->post('khoahoc'),
                        'chuyennganh'   =>$this->input->post('chuyennganh'),
                        'chungchiditau' =>$del_id,
                        'tuyen' =>$this->input->post('tuyenhh'),
                        'trongluongtau'=>$this->input->post('trongluong'),
                        'vitrilamviec'  =>$this->input->post('vitrilv'),
                        'loaihang'  =>  $this->input->post('loaihang'),
                        'congty'    =>$this->input->post('congty'),
                        'khuyennghi'=>$this->input->post('khuyennghi'),
                        'ngaydang'  =>$sDatehs,
                        'emailuv' =>$ungvien->id,
                        'giodang'=>$this->input->post('giodanguv'),
                        'ordernum'=>0,
                        //'status'  =>0  
                );  
                $this->db->where('id',$this->input->post('txtid'));
                $this->db->update('tblhosoungvien',$updatehoso);
                $data['thanhcong'] = true;                            
                $data['main_content1'] = 'edithoso_view';
                $data['nhatuyendung']=true;
                $data['ungvien']=true;
                $data['id']=$this->input->post('txtid');
                $this->load->view('includes/template',$data); 
            }
        }     
    }
    function candangnhap()
    {
        $data['main_content']='chuadn_view';        
        $this->load->view('includes/template',$data);     
    }   
    function donhangvietsan()
    {
        $data['main_content'] = 'donhangvietsan';
        $this->load->view('includes/template',$data);
    }
    function thuchiengui()
    {
        $this->form_validation->set_rules('hoten','<span style="color:red;">Họ tên</span>','required');
        $this->form_validation->set_rules('diachi','<span style="color:red;">Địa chỉ</span>','required');
        $this->form_validation->set_rules('dienthoai','<span style="color:red;">Họ tên</span>','required|alpha_numeric');
        $this->form_validation->set_rules('email','<span style="color:red;">Email</span>','required|valid_email');
        $this->form_validation->set_message('required','<span style="color:red;">%s không để trống</span>');
        $this->form_validation->set_message('alpha_numeric','<span style="color:red;">%s không chứa các ký tự đặc biệt</span>');
        $this->form_validation->set_message('valid_email','<span style="color:red;">%s không hợp lệ</span>');
        if($this->form_validation->run() ==FALSE)
        {
            $data['error_register'] = validation_errors();
            $data['main_content'] = 'donhangvietsan';
            $this->load->view('includes/template',$data);    
        }
        else
        {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|csv|pdf|xls|xlsx|jpeg|doc|docx|bmp|xml';
            $config['max_size'] = '1000000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload())
            {
                $data['error_register'] = '<p>Có lỗi xảy ra vui lòng thử lại</p>';
                $data['main_content'] = 'donhangvietsan';
                $this->load->view('includes/template');    
            }   
            else
            {
                $images_data = $this->upload->data();
                $name_img = 'upload/'.$images_data['file_name'];
                $hoten = $this->input->post('hoten');
                $diachi = $this->input->post('diachi');
                $dienthoai = $this->input->post('dienthoai');
                $email = $this->input->post('email');
                $date = getdate();
                $sDate = $date['year'].'-'.$date['mon'].'-'.$date['mday'];
                $insert_data = array(
                        'hoten' =>$hoten,
                        'diachi'    =>$diachi,
                        'dienthoai' =>$dienthoai,
                        'email' =>$email,
                        'file'  =>$name_img,
                        'ngaygui'   =>$sDate
                );    
                $this->db->insert('tbldonhang',$insert_data);
                $noidung='<div style="padding:30px 50px;">
                	 <table style="width:100%">
                     	<tr>';                		
                            $tt=$this->db->get('tblthongtincty')->row();
                       	    $noidung=$noidung.'<td>
                            <h3>'.$tt->tencongty.'</h3>
                            </td>
                            <td style="text-align:right">
                            Ngày:'.$date['mday'].'-'.$date['mon'].'-'.$date['year'].'
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2">Điện thoại: '.$tt->dienthoai.'&nbsp;&nbsp;Fax: '.$tt->fax.'</td>
                        </tr>
                        <tr>
                        	<td colspan="2">Địa chỉ: '.$tt->diachi.'</td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:center"><h2>ĐƠN ĐẶT MUA HÀNG</h2></td>
                        </tr>                                                         
                        <tr>
                            <td colspan="2">Khách hàng: <b>'.$hoten.'</b></td>
                        </tr>   
                        <tr>
                            <td colspan="2">Địa chỉ: <b>'.$diachi.'</b></td>
                        </tr>    
                        <tr>
                            <td colspan="2" >Điện thoại: <b>'.$dienthoai.'</b></td>
                        </tr>   
                        <tr>
                            <td colspan="2" >Email: <b>'.$email.'</b></td>
                        </tr>   
                        <tr>
                            <td colspan="2" >File đơn hàng: <b>'.site_url($name_img).'</b></td>
                        </tr>                                                           	
                     </table>                
                </div>';
               	//Gửi email
                require_once('class.phpmailer.php'); 
                require_once('class.pop3.php');             
                define('GUSER', 'tungvu90@gmail.com');          // Email            
                define('GPWD','tungvu90it');                 // Password
                global $message;                
                $this->smtpmailer($this->db->get('tblthongtincty')->row()->email, "tungvu90@gmail.com", "Vinh Xuân", "Đơn đặt hàng từ website NhuaVinhXua.com",$noidung);
				$this->smtpmailer($email, "tungvu90@gmail.com", "Vịnh xuân", "Đơn đặt hàng từ website NhuaVinhXua.com",$noidung);
                echo $message;
				//gửi email
                $data['thanhcong'] = true;
				$data['main_content'] = 'donhangvietsan';
				$data['error_register']='<p style="color:#1B9BE6;"><b>Gửi thành công</b></p>';
				$this->load->view('includes/template', $data);
            } 
        }
    }
    function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();                  // tạo một đối tượng mới từ class PHPMailer
        $mail->IsSMTP();                         // bật chức năng SMTP
        $mail->SMTPDebug = 0;                      // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
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
        } 
        else 
        {
            $message = 'Thư của bạn đã được gởi đi ';
            return true;
        }
    }
    function thoat()
    {        
        if(isset($_SESSION['username']))
		{
 			 unset($_SESSION['username']);
		}	        	
		if(isset($_SESSION['id']))
		{
 			 unset($_SESSION['id']);
		}
        redirect(base_url());
    }
    function admin()
	{
		if(isset($_SESSION['username']))
        {}
        else
        {
            redirect('thanhvien/login');    
        }		 
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
}
?>