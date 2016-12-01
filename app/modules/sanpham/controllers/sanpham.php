<?php 
class sanpham extends Controller
{
    function sanpham()
    {
        parent::Controller();
        $this->load->model('sanpham/sanpham_model');
        $this->load->library('form_validation');
        //modules::run('language/switchLang'); 
    }    
     function sao($id)
     {
        $sao=$_POST['sao'];
        $data=array(
	       'ten'=>$id,
           'sao'=>$sao,
		);
	   $this->db->insert('sao',$data);
	   echo ' <script src="js/jquery.rating.js" type="text/javascript" language="javascript"></script>
 			<link href="css/jquery.rating.css" type="text/css" rel="stylesheet"/>';
			for($i=1;$i<6;$i++)
			{
				if($i==$sao)
				{
					echo '<input name="star2" type="radio" value="'.$i.'" class="star" disabled="disabled" checked="checked"/>';
				}
				else
				{
					echo '<input name="star2" type="radio" value="'.$i.'" class="star" disabled="disabled"/>';
				}
			}
			$this->db->where('ten',$id);
			$binhchon=$this->db->get('sao');
			echo '<span id="soluot">('.$binhchon->num_rows().' bình chọn)</span>';
			echo '<br clear="all"/>';
     }
     function mausac($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=28;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getlocmausac($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/mausac/'.$id;
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
        $data['query']=$this->sanpham_model->getlocmausac_limited($id,$start_row,$per_page);
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
        $data['main_content']='danhmuc2_view';        
        $data['pk'] =true; 
        $data['pcu']=$id;
        $data['cucu']=true;
        $data['cucusas']=$id; 
        $data['taitai'] = $id;
        //$data['giak']=$id; 
        $this->load->view('includes/template',$data);   
     }
     function locsp($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=28;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getlocsanpham($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/locsp/'.$id;
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
        $data['query']=$this->sanpham_model->getlocsanpham_limited($id,$per_page,$start_row);
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
        $data['main_content']='danhmuc1_view';        
        $data['pk'] = $id; 
        $data['locsptt']=true; 
        $data['taitai'] = $id;
        $data['giak']=$id; 
        $this->load->view('includes/template',$data);
     }
     function getykienbyid($id)
     {
        $data['id']=$id;
        $data['main_content']='ykien_id'; 
        $this->load->view('includes/template',$data);
     }
     function sapxepgiamdankm($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxepgiamdankm($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxepgiamdankm/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxepgiamdankm_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;
        $data['pk']=$id;          
        $data['dmhangkm']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxeptangdankm($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxeptangdankm($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxeptangdankm/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxeptangdankm_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id; 
        $data['dmhangkm']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxepgiamdanh($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxepgiamdanh($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxepgiamdanh/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxepgiamdanh_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;          
        $data['dmhang']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }          
    function sapxeptangdanpt($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxeptangdanpt($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxeptangdanpt/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxeptangdanpt_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id;     
        $data['dmhangpt']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxepgiamdanpt($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxepgiamdanpt($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxepgiamdanpt/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxepgiamdanpt_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;
        $data['pk']=true;          
        $data['dmhangpt']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }          
     function sapxeptangdancc($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxeptangdancc($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxeptangdancc/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxeptangdancc_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id;     
        $data['dmhangcc']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxepgiamdancc($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxepgiamdancc($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxepgiamdancc/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxepgiamdancc_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;
        $data['pk']=true;          
        $data['dmhangcc']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }     
     function sapxeptangdanh($id)
     {
         $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxeptangdanh($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxeptangdanh/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxeptangdanh_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id; 
        $data['dmhang']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxepgiamdan($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxepgiamdan($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxepgiamdan/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxepgiamdan_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id; 
        $data['dm']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function sapxeptangdan($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsapxeptangdan($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sapxeptangdan/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getsapxeptangdan_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id; 
        $data['dm']=$id; 
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);
     }
     function chucnang($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getchucnang($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/chucnang/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getchucnang_limited($id,$per_page,$start_row);
        $data['dmkd'] = $id;  
        $data['pk'] = true;  
        $data['taitai'] = $id; 
        $data['cnkhkh']=$id;            
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);  
     }
     function kieudang($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getkieudang($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/kieudang/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getkieudang_limited($id,$start_row,$per_page);
        $data['dmkd'] = $id;  
        $data['pk'] = $id;  
        $data['taitai'] = $id; 
        $data['kieudangh']=true;            
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);  
     }
     function phongcach($id)
     {
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getphongcach($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/phongcach/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getphongcach_limited($id,$start_row,$per_page);
        $data['dmph'] = $id;  
        $data['pk'] = $id;  
        $data['taitai'] = $id;
        $data['phongcachh']=true;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);     
     }
     function hangkm($id)
     {
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tblhang')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
        }
        else
        {            
            $data['header_title']=$data['danhmucsp1']->hang;                                                    
        }
        if($data['danhmucsp1']->meta_des!='')
        {
            $data['description']=$data['danhmucsp1']->meta_des;
        }         
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->gethangkm($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/hangkm/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->gethangkm_limited($id,$start_row,$per_page);
        $data['dmhangkm'] = $id;  
        $data['pk'] = $id;  
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);   
     }
     function hangpt($id)
     {
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tblhang')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
        }
        else
        {            
            $data['header_title']=$data['danhmucsp1']->hang;                                                    
        }
        if($data['danhmucsp1']->meta_des!='')
        {
            $data['description']=$data['danhmucsp1']->meta_des;
        }         
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->gethangpt($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/hangpt/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->gethangpt_limited($id,$start_row,$per_page);
        $data['dmhangpt'] = $id;  
        $data['pk'] = $id;  
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);   
     }
     function hangcc($id)
     {
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tblhang')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
        }
        else
        {            
            $data['header_title']=$data['danhmucsp1']->hang;                                                    
        }
        if($data['danhmucsp1']->meta_des!='')
        {
            $data['description']=$data['danhmucsp1']->meta_des;
        }         
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->gethangcc($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/hangcc/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->gethangcc_limited($id,$start_row,$per_page);
        $data['dmhangcc'] = $id;  
        $data['pk'] = $id;  
        $data['taitai'] = $id;             
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
        $data['main_content']='danhmuc1_view';
        $this->load->view('includes/template',$data);   
     }
     function phukien()
     {
        $start_row=$this->uri->segment(3);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getphukien();
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/phukien/';
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
        $data['phukien']=$this->sanpham_model->getphukien_limited($per_page,$start_row);
        $pagination= $this->pagination->create_links();
        $lks='<ul class="pagination">'.$pagination; 
        $datar1=array('<strong>','<a hr');    
        $datar2=array('<li class="active"><a>','<li><a hr');
        $datar3=array('</strong>','</a>');    
        $datar4=array('</a></li>','</a><li>');         
        $lks=str_replace($datar1,$datar2,$lks);
        $lks=str_replace($datar3,$datar4,$lks);        
        $lks.='</ul>';
        $data['pagination']=$lks;   
        $data['pk']=true;
        $data['main_content'] = 'phukien_view';
        $this->load->view('includes/template',$data);            
     }
     function giohang()
     {
        //$data['taitai']=true;
        $data['main_content']="order";
        $this->load->view('includes/template',$data);
     }
     function getphukienbyid($id)
     {
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tbldanhmucphukien')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
        }
        else
        {            
            $data['header_title']=$data['danhmucsp1']->danhmucphukien;                                                    
        }
        if($data['danhmucsp1']->meta_des!='')
        {
            $data['description']=$data['danhmucsp1']->meta_des;
        }         
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getdanhmucphukien($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/getphukienbyid/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getdanhmucphukien_limited($id,$start_row,$per_page);
        $data['dmpk'] = $id;  
        $data['pk'] = $id;             
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
        $data['main_content']='danhmucpk_view';
        $this->load->view('includes/template',$data);  
     }     
     function getphukienby2id($id)
     {
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tbldanhmucphukien2')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
        }
        else
        {            
            $data['header_title']=$data['danhmucsp1']->danhmucphukiencap2;                                                    
        }
        if($data['danhmucsp1']->meta_des!='')
        {
            $data['description']=$data['danhmucsp1']->meta_des;
        }         
        $start_row=$this->uri->segment(4);
        $per_page=32;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getdanhmucphukiencap2($id);
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/getphukienby2id/'.$id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] =4;
        $config['next_link'] = '>>';
        $config['prev_link'] = '<<';
        $config['num_links'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open']='<div class="pagination">';
        $config['full_tag_close']='</div>';
        $this->pagination->initialize($config);
        $data['query']=$this->sanpham_model->getdanhmucphukiencap2_limited($id,$start_row,$per_page);
        $data['dmpk2'] = $id;  
        $data['pk'] = $id;             
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
        $data['main_content']='danhmucpk_view';
        $this->load->view('includes/template',$data);
     }
    function getdanhmucbyid($id)
    {         
        $this->db->where('id',$id);
        $data['danhmucsp1'] = $this->db->get('tbldanhmucsanpham')->row();
        $data['danhmucsp'] = $data['danhmucsp1'];   
        if($data['danhmucsp1']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp1']->keyword;
        }
        if($data['danhmucsp1']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp1']->meta_title;
       	}
        else
       	{            
            $data['header_title']=$data['danhmucsp1']->danhmucsanpham;                                                    
       	}
        if($data['danhmucsp1']->meta_des!='')
       	{
   	        $data['description']=$data['danhmucsp1']->meta_des;
       	}         
        $start_row=$this->uri->segment(4);
        $per_page=35;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->sanpham_model->getdanhmucsanpham($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/sanpham/getdanhmucbyid/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->sanpham_model->getdanhmucsanpham_limited($id,$start_row,$per_page);
        $data['dm'] = $id;  
        $data['taitai']=true; 
        $data['pk']=true;     
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
		$data['main_content']='danhmuc1_view';
		$this->load->view('includes/template',$data);	  
    }
    function gethangbyid($id)
    {
        $this->db->where('id',$id);
        $data['loaixe1'] = $this->db->get('tblhang')->row();
        $data['loaixe'] = $data['loaixe1'];   
        if($data['loaixe1']->keyword!='')
        {
            $data['keyword']=$data['loaixe1']->keyword;
        }
        if($data['loaixe1']->meta_title!='')
        {
            $data['header_title']=$data['loaixe1']->meta_title;
       	}
        else
       	{            
            $data['header_title']=$data['loaixe1']->hang;                                                    
       	}
        if($data['loaixe1']->meta_des!='')
       	{
   	        $data['description']=$data['loaixe1']->meta_des;
       	}         
        $start_row=$this->uri->segment(4);
        $per_page=25;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->sanpham_model->getloaixe($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/sanpham/gethangbyid/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->sanpham_model->getloaixe_limited($id,$start_row,$per_page);
        $data['taitai']=true; 
        $data['dmhang']=$id;
        $data['pk']=true;                
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
		$data['main_content']='danhmuc1_view';
		$this->load->view('includes/template',$data);	      
    }
    function getdanhmuc2byid($id)
    {        
        $this->db->where('id',$id);
        $data['danhmucsp2'] = $this->db->get('tbldanhmucsanpham2')->row();
        $data['danhmucspc2'] = $data['danhmucsp2'];   
        if($data['danhmucsp2']->keyword!='')
        {
            $data['keyword']=$data['danhmucsp2']->keyword;
        }
        if($data['danhmucsp2']->meta_title!='')
        {
            $data['header_title']=$data['danhmucsp2']->meta_title;
       	}
        else
       	{   	       
            $data['header_title']=$data['danhmucsp2']->danhmucsanphamcap2;            
       	}
        if($data['danhmucsp2']->meta_des!='')
       	{
   	        $data['description']=$data['danhmucsp2']->meta_des;
       	}         
        $start_row=$this->uri->segment(4);
        $per_page=35;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->sanpham_model->getdanhmucsanpham2($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/sanpham/getdanhmuc2byid/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = '>>';
		$config['prev_link'] = '<<';
		$config['num_links'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->sanpham_model->getdanhmucsanpham2_limited($id,$start_row,$per_page);
        $data['dm2'] = $id;       	
        $data['dmac']=true;	
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
		$data['main_content']='danhmuc1_view';
		$this->load->view('includes/template',$data);		           
    }
    function getdanhmuc3byid($id)
    {         
        $this->db->where('id',$id);
        $data['danhmucsp3'] = $this->db->get('tbldanhmucsanpham3');
        if($data['danhmucsp3']->num_rows()>0)
        {
            $data['danhmucsp3']=$data['danhmucsp3']->row();
            $data['danhmucspc3'] = $data['danhmucsp3'];   
            if($data['danhmucspc3']->keyword!='')
            {
                $data['keyword']=$data['danhmucspc3']->keyword;
            }
            if($data['danhmucspc3']->meta_title!='')
            {
                $data['header_title']=$data['danhmucspc3']->meta_title;
           	}
            else
           	{   	       
                $data['header_title']=$data['danhmucspc3']->danhmucsanphamcap3;            
           	}
            if($data['danhmucspc3']->meta_des!='')
           	{
       	        $data['description']=$data['danhmucspc3']->meta_des;
           	}         
            $start_row=$this->uri->segment(4);
            $per_page=25;
    		if(is_numeric($start_row))
    		{
    			$start_row=$start_row;
    		}
    		else
    		{
    			$start_row=0;
    		}
            $query=$this->sanpham_model->getdanhmucsanpham3($id);
    		$total_rows = $query->num_rows();
    		$this->load->library('pagination');
    		$config['base_url'] = site_url().'/sanpham/getdanhmuc3byid/'.$id;
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
    		$data['query']=$this->sanpham_model->getdanhmucsanpham3_limited($id,$start_row,$per_page);
            $data['dmsp3'] = $id;   
            $data['dmac']=true;    		
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
    		$data['main_content']='danhmuc1_view';
    		$this->load->view('includes/template',$data);
        }
        else
        {
            redirect(base_url());
        }		           
    }    
    function sanphamall()
    {        
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
        $query=$this->sanpham_model->getsanpham();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/sanpham/sanphamall/';
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
		$data['sanpham']=$this->sanpham_model->getsanpham_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['sanphamac']=true;
        $data['main_content'] = 'sanpham_view';
        $this->load->view('includes/template',$data);
    }    
    function getsanphambykm()
    {        
        $start_row=$this->uri->segment(3);
        $per_page=35;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsanphamkm();
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/getsanphambykm/';
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
        $data['sanpham']=$this->sanpham_model->getsanphamkm_limited($per_page,$start_row);        
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
        $data['main_content'] = 'sanphamkm_view';
        $this->load->view('includes/template',$data);
    }    
    function loaixeall()
    {
        $data['main_content']='loaixeall_view';
        $this->load->view('includes/template',$data);
    }  
    function sanphamkhuyenmai()
    {
        $start_row=$this->uri->segment(3);
        $per_page=28;
        if(is_numeric($start_row))
        {
            $start_row=$start_row;
        }
        else
        {
            $start_row=0;
        }
        $query=$this->sanpham_model->getsanphamkm();
        $total_rows = $query->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = site_url().'/sanpham/sanphambanchay/';
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
        $data['query']=$this->sanpham_model->getsanphamkm_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['km']=true;
        $data['main_content'] = 'danhmuc1_view';
        $this->load->view('includes/template',$data);    
    } 
    function sanphambanchay()
    {
        $start_row=$this->uri->segment(3);
        $per_page=28;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}
        $query=$this->sanpham_model->getsanphamnb();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/sanpham/sanphambanchay/';
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
		$data['sanphamnb']=$this->sanpham_model->getsanphamnb_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['sanphamac']=true;
        $data['main_content'] = 'sanphamnb_view';
        $this->load->view('includes/template',$data);     
    } 
    function phukienbyid($id)
    {
        $data['query'] = $this->sanpham_model->getphukienbyid($id);
        if($data['query']->meta_title!='')
        {
            $data['header_title']=$data['query']->meta_title;
        }
        else
        {          
            $data['header_title']=$data['query']->ten;                              
        }
        if($data['query']->keyword!='')
        {
            $data['keyword']=$data['query']->keyword;
        }
        if($data['query']->meta_des!='')
        {
            $data['description']=$data['query']->meta_des;
        }
        else
        {
            $data['description']=$data['query']->ten;
        }  
        $data['pk']=true;    
        $data['main_content'] = 'phukien_id';
        $this->load->view('includes/template',$data);       
    }
    function tragop($id)
    {
        $data['query'] = $this->sanpham_model->getsanphambyid($id);
        if($data['query']->meta_title!='')
        {
            $data['header_title']=$data['query']->meta_title;
        }
        else
        {          
            $data['header_title']=$data['query']->ten;                              
        }
        if($data['query']->keyword!='')
        {
            $data['keyword']=$data['query']->keyword;
        }
        if($data['query']->meta_des!='')
        {
            $data['description']=$data['query']->meta_des;
        }
        else
        {
            $data['description']=$data['query']->ten;
        }                          
        $data['main_content'] = 'tragop_id';
        $this->load->view('includes/template',$data);    
    }
    function sanphambyid($id)
    {        
        $this->sanpham_model->num_view($id);
        $data['query'] = $this->sanpham_model->getsanphambyid($id);
        if($data['query']->meta_title!='')
    	{
    	    $data['header_title']=$data['query']->meta_title;
    	}
    	else
    	{    	   
            $data['header_title']=$data['query']->ten;                      	    
    	}
    	if($data['query']->keyword!='')
    	{
    	    $data['keyword']=$data['query']->keyword;
    	}
    	if($data['query']->meta_des!='')
    	{
    	    $data['description']=$data['query']->meta_des;
    	}
    	else
    	{
    	    $data['description']=$data['query']->ten;
    	}                  
        $data['pkct']=true;
        $data['main_content'] = 'sanpham_id';
        $this->load->view('includes/template',$data);    
    }
    function dathang($id)
    {	
        if(isset($_SESSION['id']))
        {
            $data['id']=$id;  		
            $data['main_content']='donhang_ct';
            $this->load->view('includes/template',$data);
        }
        else
        {
            redirect(base_url());
        }
    }
    function checkhang($id)
    {
        $data['id']=$id;        
        $data['main_content']='donhang_ct1';
        $this->load->view('includes/template',$data);    
    }
    function huydonhang()
    {
        unset($_SESSION['sanpham']);
        redirect(base_url());
    }    
    function addorder_pro()
    {
        $id=$_POST['id'];
        $soluong=$_POST['soluong'];
		$idArr=explode("_",$id);
		$kichthuoc=$idArr['1'];
        if(isset($_SESSION['sanpham']))
        {
            if($_SESSION['sanpham']!='')
            {
                 $chuoi='';
                 $str=$_SESSION['sanpham'];
                 $num=explode(",",$str);
                 $dem=1;
                 foreach($num as $row)
                 {
                     $item=explode("-",$row);
                     {
                        if($id==$item['0'])
                        {
                            $sl=$item['1']+$soluong;
                            $true=1;
                            $con=$item['0'].'-'.$sl.'-';
                        }
                        else
                        {
                            $con=$item['0'].'-'.$item['1'].'-';
                        }
                    }
                        if($dem==1)
                        {
                        $chuoi=$chuoi.$con;
                        }
                        else
                        {
                            $chuoi=$chuoi.','.$con;
                        }
                        $dem++;    
                 }
                 if(isset($true))
                {
                    $_SESSION['sanpham']=$chuoi;
                }
                else
                {
                    $order=$id.'-'.$soluong.'-'.$kichthuoc;
                    $order=$_SESSION['sanpham'].','.$order;
                    $_SESSION['sanpham']=$order;
                }
                }
                else
                {
                    
                    $order=$id.'-'.$soluong.'-'.$kichthuoc;
                    $_SESSION['sanpham']=$order;
                    
                }
        }
        else
        {
            $order=$id.'-'.$soluong.'-'.$kichthuoc;
            $_SESSION['sanpham']=$order;
        }
        $str=$_SESSION['sanpham'];
        $num=explode(",",$str); 
        $html=count($num);
        echo '<a href='.site_url("sanpham/giohang").'>Giỏ hàng&nbsp;('.$html.')</a>';        
    }
    function thanhtoan()
    {
        $data['main_content']='thanhtoan';        
        $data['pkc']=true;
        $data['taitai']=true;
        $this->load->view('includes/template',$data);
    }
    function dodathang()
    {
        $id=$_POST['id'];
        $hoten=$_POST['hoten'];
        $diachi=$_POST['diachi'];
        $dienthoai=$_POST['dienthoai'];
        $email=$_POST['email'];
        $yeucau=$_POST['yeucau'];
        $this->db->where('id',$id);
        $sqlsphjk=$this->db->get('tblsanpham')->row();
        if($sqlsphjk->gia==0)
        {
            $giakm='Liên hệ';
        }
        else
        {
            $giakm=number_format($sqlsphjk->gia,0,'.','.');    
        }
        $noidung="
            <table width='100%' border='1' style='border-spacing:0;'>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Image</th>
                    <th>Giá</th>
                    <th>Thành tiền</th> 
                </tr>
                <tr>
                    <td>".$sqlsphjk->ten."</td>
                    <td><img src=".$sqlsphjk->anh." width='100'/></td>
                    <td>".$giakm."</td>
                    <td>".$giakm."</td>
                </tr>   
            </table>
        ";
        $dateng=getdate();
        $ngaydang=$dateng['year'].'-'.$dateng['mon'].'-'.$dateng['mday'];
        $data_order=array(
                        'hoten'=>$hoten,
                        'diachi'=>$diachi,
                        'dienthoai'=>$dienthoai,
                        'email' =>  $email,
                        'sanpham'   =>$noidung,
                        'yeucau'    =>$yeucau,                        
                        'ngaydang'=>$ngaydang,
                        'status'    =>1                        
                    );
        $this->db->insert('tblorder',$data_order);  
        $html=$this->load->view('success_view');
        echo $html;                  
    }
    function addsoluong()
    {
        $id=$_POST['id'];
        $soluong=$_POST['soluong'];
        $id=$_POST['id'];
		if(isset($_SESSION['sanpham']))
		{
			if($_SESSION['sanpham']!='')
			{
			$chuoi='';
			$str=$_SESSION['sanpham'];
			$num=explode(",",$str);
			$dem=1;
			foreach($num as $row)
			{
				$item=explode("-",$row);
				{
					if($id==$item['0'])
					{
						$sl=$item['1']+$soluong;
						$true=1;
						$con=$item['0'].'-'.$sl;
					}
					else
					{
						$con=$item['0'].'-'.$item['1'];
					}
				}
				if($dem==1)
				{
				$chuoi=$chuoi.$con;
				}
				else
				{
					$chuoi=$chuoi.','.$con;
				}
				$dem++;
			}
			if(isset($true))
			{
				$_SESSION['sanpham']=$chuoi;
			}
			else
			{
				$order=$id.'-'.$soluong;
				$order=$_SESSION['sanpham'].','.$order;
				$_SESSION['sanpham']=$order;
			}
			}
			else
			{
				
				$order=$id.'-'.$soluong;
				$_SESSION['sanpham']=$order;
				
			}
		}
		else
		{
		$order=$id.'-'.$soluong;
		$_SESSION['sanpham']=$order;
		}
		$str=$_SESSION['sanpham'];
        $num=explode(",",$str);
		$html=count($num);
		echo $html;
    }
    function xemgiohang()
    {
        $data['main_content'] = 'xemgiohang';
        $this->load->view('includes/template',$data);
    }
    function delete_order1($id)
     {
        $str=$_SESSION['sanpham'];
        $num=explode(",",$str);
        $dem=1;
        $chuoi='';
        foreach($num as $row)
        {
          if($row==$id)
          {
          }
          else
          {
              if($chuoi=='')
              {
                  $chuoi=$row;
              }
              else
              {
                  $chuoi=$chuoi.','.$row;
              }
          }
          $dem++;
        }
        if($_SESSION['sanpham']='')
        {
            unset($_SESSION['sanpham']);
        }
        else
        {
           $_SESSION['sanpham']=$chuoi;
        }
        redirect('sanpham/giohang');
     }
    function delete_order($id)
    {
        $str=$_SESSION['sanpham'];
		$num=explode(",",$str);
		$dem=1;
		$chuoi='';
		foreach($num as $row)
		{
		  if($row==$id)
		  {
		  }
		  else
		  {
		      if($chuoi=='')
		      {
		          $chuoi=$row;
		      }
		      else
		      {
		          $chuoi=$chuoi.','.$row;
		      }
		  }
		  $dem++;
		}
		if($_SESSION['sanpham']='')
		{
            unset($_SESSION['sanpham']);
		}
		else
		{
		   $_SESSION['sanpham']=$chuoi;
		}
        $html=$this->load->view('addnum');
        echo $html;
		
		//alert(html);
		//window.location.reload();
    }  
    function addnum1($id)
    {
        $soluong=$_POST['soluong1'];
        $str=$_SESSION['sanpham'];
        $num=explode(",",$str);
        $dem=1;
        $chuoi='';
        foreach($num as $row)
        {
              $item=explode("-",$row);
              if($item['0']==$id)
              {
                    $row=$item['0'].'-'.$soluong.'-';
              }
              if($dem==1)
              {
                    $chuoi=$chuoi.$row;
              }
              else
              {
                    $chuoi=$chuoi.','.$row;
              }
              $dem++;
        }
        $_SESSION['sanpham']=$chuoi;
        $html=$this->load->view('addnum1');
        echo $html;     
    }     
    function addnum($id)
    {
        $soluong=$_POST['soluong'];
        $str=$_SESSION['sanpham'];
        $num=explode(",",$str);
        $dem=1;
        $chuoi='';
        foreach($num as $row)
        {
              $item=explode("-",$row);
              if($item['0']==$id)
              {
                    $row=$item['0'].'-'.$soluong;
              }
              if($dem==1)
              {
                    $chuoi=$chuoi.$row;
              }
              else
              {
                    $chuoi=$chuoi.','.$row;
              }
              $dem++;
        }
        $_SESSION['sanpham']=$chuoi;
        $html=$this->load->view('addnum');
        echo $html;      
    }
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
         }
        return $str;
    }    
    function guidonhang()
    {
        $ma=$this->rand_string(10);
        $id=$_POST['user'];
        $hoten=$_POST['hoten'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $ghichu=$_POST['ghichu'];        
        $dienthoai=$_POST['dienthoai'];        
        //$diachigiaohang=$_POST['diachi_n'];
        $noidungdonhang='<table border="0" cellpadding="4" cellspacing="4" width="90%">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Xin chào '.$hoten.'!</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Chúc mừng Bạn đã đặt hàng thành công từ website lenny.vn. Dưới đây là chi tiết đơn hàng:</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>';
    $noidungdonhang=$noidungdonhang.'<h3 style="text-align:center"><b>Chi tiết đơn hàng</b></h3>
    <table style="width:100%;border:1px solid #ccc;padding:5px;;border-collapse: collapse;font-size:12px;text-align:center">
                            <tr id="title_table">
                              <td style="border:1px solid #ccc;padding:5px;"><b>STT</b></td>
                              <td style="border:1px solid #ccc;padding:5px;"><b>Tên sản phẩm</b></td>
                              <td style="border:1px solid #ccc;padding:5px;"><b>Ảnh</b></td>
                              <td style="border:1px solid #ccc;padding:5px;"><b>Giá</b></td>
                              <td style="border:1px solid #ccc;padding:5px;"><b>Số lượng</b></td>
							  <td style="border:1px solid #ccc;padding:5px;"><b>Kích thước</b></td>
                              <td style="border:1px solid #ccc;padding:5px;"><b>Thành tiền</b></td>
                            </tr>';
                              $str=$_SESSION['sanpham'];
                            if($str!='')
                            {
                            $num=explode(",",$str);
                            $dem=1;
                            $sum=0;
                            $sanpham='';
                            foreach($num as $row)
                            {
                                $item=explode("-",$row);
                                {
									$spId = $item['0'];
									$idArr=explode("_",$spId);
									$kichthuoc=$idArr['1'];
                                    $this->db->where('id',$item['0']);
                                    $sanpham=$this->db->get('tblsanpham')->row();
                                $noidungdonhang=$noidungdonhang.'<tr class="item_or" >
                                  <td style="font-size:13px;border:1px solid #ccc;padding:5px;">'.$dem.'</td>
                                  <td style="text-align:left;font-size:13px;border:1px solid #ccc;padding:5px;"><b>'.$sanpham->ten.'</b></td>
								  <td class="lightbox" style="border:1px solid #ccc;padding:5px;"><img src="'.site_url().$sanpham->anh_thumb.'" width="200"/></td>
                                  <td style="text-align:right;border:1px solid #ccc;padding:5px;">';
                                  if($sanpham->giakm!=0)
                                  {
                                        $noidungdonhang=$noidungdonhang.number_format($sanpham->giakm,0,'.','.').'đ';
                                  }
                                  else
                                  {
                                      if($sanpham->gia==0)
                                      { 
                                        $noidungdonhang=$noidungdonhang.'Liên hệ';
                                      }
                                      elseif(is_numeric($sanpham->gia))
                                      {
                                        
                                        $noidungdonhang=$noidungdonhang.number_format($sanpham->gia,0,'.','.').'đ';
                                      }
                                      else
                                      {
                                        $noidungdonhang=$noidungdonhang.'Liên hệ';
                                      }
                                  }
                                  $noidungdonhang=$noidungdonhang.'</td>
                                  <td class="lightbox" style="border:1px solid #ccc;padding:5px;">'.$item['1'].'</td>;
								  <td class="lightbox" style="border:1px solid #ccc;padding:5px;">'.$kichthuoc.'</td>';
                                  if($sanpham->giakm!=0)
                                  {
                                    $tong=($item['1'])*($sanpham->giakm);
                                  $noidungdonhang=$noidungdonhang.'<td class="lightbox" style="border:1px solid #ccc;padding:5px;">'.number_format($tong,0,'.','.').'</td>';
                                  $sum=$sum+$tong;
                                  }
                              else
                              {
                                   if($sanpham->gia==0)
                                 {
                                     $noidungdonhang=$noidungdonhang.'<td class="lightbox" style="border:1px solid #ccc;padding:5px;">Liên hệ</td>';
                                     $tong=0;
                                     $sum=$sum+$tong;
                                 }
                                 elseif(is_numeric($sanpham->gia))
                                 {
                                  $tong=($item['1'])*($sanpham->gia);
                                  $noidungdonhang=$noidungdonhang.'<td class="lightbox" style="border:1px solid #ccc;padding:5px;">'.number_format($tong,0,'.','.').'</td>';
                                  $sum=$sum+$tong;
                                 }
                                 else
                                 {
                                    $noidungdonhang=$noidungdonhang.'<td class="lightbox" style="border:1px solid #ccc;padding:5px;">'.$sanpham->gia.'</td>';
                                 }
                                 } 
                                  
                                $noidungdonhang=$noidungdonhang.'</tr>';
                                $dem++;
                                }
                            }
                            }
                            $noidungdonhang=$noidungdonhang.'</table>';      
                            $noidungdonhang=$noidungdonhang.'<h3>Tổng chi phí phải thanh toán: <span style="color:red">'.number_format($sum,0,'.','.').' đ</span></h3>';                                        
                $noidungdonhang=$noidungdonhang.'
                <p><h3><b>Thông tin người đặt hàng</b></h3></p>
                <p>Mã: '.$ma.'</p>
                <p>Họ tên: '.$hoten.'</p>
                <p>Điện thoại: '.$dienthoai.'</p>
                <p>Email: '.$email.'</p>                
                <p>Ghi chú: '.$ghichu.'</p>
                <p><h3><b>Địa chỉ giao hàng</b></h3>: '.$diachi.'</p>                
                ';
                $ngay=getdate();
      $xem=$ngay['year'];
      $xem1=$ngay['mday'];
      $xem2=$ngay['mon'];
     $thoigian=$xem.'-'.$xem2.'-'.$xem1;
    
        $tongtientrus=number_format($sum,0,'.','.').' đ';    
    if(isset($_SESSION['id']))
    {
        $this->db->where('id',$_SESSION['id']);
        $usergd=$this->db->get('tbluser')->row();
        $nguoidang=$usergd->nguoidang;
    }
    else{
        $nguoidang='';
    }        
         $data=array(                    
                     'ma'=>$ma,
                     'nguoidang'    => $nguoidang,
                     'hoten'=>$hoten,
                     'email'=>$email,                     
                     'sanpham'=>$noidungdonhang,
                     'diachi'=>$diachi,
                     'tongtien'     =>$tongtientrus,                        
                     'ngaydang'=>$thoigian,
                     'ghichu'=>$ghichu,
                     'dienthoai'=>$dienthoai,
                     'status'   =>1
                     );
         $this->db->insert('tblorder',$data);         
         //Gửi email
                      /*  $toemail=$this->db->get('thongtincty')->row()->emaildathang;
                    require_once('class.phpmailer.php'); 
            
                    require_once('class.pop3.php'); 
            
                    define('GUSER', 'hotrohp@gmail.com');          // Email
            
                    define('GPWD', '12345678@a');                 // Password
                    global $message;
                
                    $this->smtpmailer($toemail, "hotrohp@gmail.com", "Thảo Ngân", "Đơn hàng từ website Thảo Ngân",$noidungdonhang);*/
                    
                    $_SESSION['sanpham']='';
                    unset($_SESSION['sanpham']);
 }
    function add_order()
    {
        $ngay=getdate();
		$xem=$ngay['year'];
		$xem1=$ngay['mday'];
		$xem2=$ngay['mon'];
		$str=$_SESSION['sanpham'];
		$num=explode(",",$str);
		$dem=1;
		$sum=0;
		$sanpham2='</table><br>';
		$sanpham='<p style="text-transform:uppercase;"><b>Sáº£n pháº©m Ä‘áº·t hĂ ng</b></p><table border="1"><tr><td style="font-weight:bold;padding:5px 10px;">STT</td><td style="font-weight:bold;padding:5px 10px;">TĂªn sáº£n pháº©m</td>
		<td style="font-weight:bold;padding:5px 10px;">áº¢nh</td>
		<td style="font-weight:bold;padding:5px 10px;">Sá»‘ lÆ°á»£ng</td>
		<td style="font-weight:bold;padding:5px 10px;">GiĂ¡</td>		
		<td style="font-weight:bold;padding:5px 10px;">ThĂ nh tiá»n</td>
		</tr>';
		foreach($num as $row)
		{
			$item=explode("-",$row);
			{
				$this->db->where('id',$item['0']);
				$sp=$this->db->get('tblsanpham')->row();
				$tong=($item['1'])*($sp->gia);
				$anh=base_url().$sp->anh;
				$sum=$sum+$tong;
				$sanpham=$sanpham.'<tr><td style="font-weight:bold;padding:5px 10px;">'.$dem.'</td><td style="font-weight:bold;padding:5px 10px;">'.$sp->ten.'</td><td style="font-weight:bold;padding:5px 10px;"><img src="'.$anh.'" width="100" /></td><td style="font-weight:bold;padding:5px 10px;">'.$item['1'].'</td><td style="font-weight:bold;padding:5px 10px;">'.$sp->gia.'</td><td style="font-weight:bold;padding:5px 10px;">'.$tong.'VNĂ</td><tr>';
				$dem++;
			}
		}
		$sanpham=$sanpham.$sanpham2;
		$thoigian=$xem.'-'.$xem2.'-'.$xem1;
		$data=array(
					'hoten'=>$_POST['name'],
					'sanpham'=>$sanpham,
					'dienthoai'=>$_POST['phone'],
					'email'=>$_POST['email'],
					'tongtien'=>$_POST['summoney'],
					'diachi'=>$_POST['address'],
					'nganhang'=>$_POST['bank'],
					'sotaikhoan'=>$_POST['numbank'],
					'ghichu'=>$_POST['comment'],
					'ngaygui'=> $thoigian,
                    'status'    =>1
		);
		$this->db->insert('tblorder',$data);
		/*$data['iddh']=mysql_insert_id();
		$data['thoigian']=$xem.'-'.$xem2.'-'.$xem1;
		$data['ten']=$_POST['name'];
		$data['dienthoai']=$_POST['phone'];
		$data['email']=$_POST['email'];
		$data['tongtien']=$_POST['summoney'];
		$data['diachi']=$_POST['address'];
		$data['nganhang']=$_POST['bank'];
		$data['sotaikhoan']=$_POST['numbank'];
		$data['ghichu']=$_POST['comment'];
		$data['thanhcong']=true;		
        */
        $data['error_register']=true;
        unset($_SESSION['sanpham']);
		$data['main_content']='order';
	  	$this->load->view('includes/template',$data);
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
        $mail->CharSet = "UTF-8";        
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
}
?>