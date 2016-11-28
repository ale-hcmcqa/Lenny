<?php 
class thuvien extends Controller
{
	function thuvien()
	{
		parent::Controller();
		$this->load->model('thuvien/thuvien_model');
		$this->load->library('pagination');        
	}
	function index()
	{	
		$data['main_content']='thuvien_view';
		$this->load->view('includes/template',$data);
	}
    function loadcate()
    {
        $query=$this->thuvien_model->getthuvien();
		$total_rows=count($query);
		$start_row=$this->uri->segment(3);
		$per_page=20;
		$config['base_url']=site_url().'thuvien/index';
		$config['total_rows']=$total_rows;
		$config['per_page']=$per_page;
		$config['uri_segment']=3;
		$config['next_link']='Next';
		$config['prev_link']='Prev';
		$config['num_links']='4';
		$config['first_link']='First';
		$config['last_link']='Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->thuvien_model->getthuvien_limited($per_page,$start_row);
		$data['pagination']=$this->pagination->create_links();
		$title=$this->uri->segment(4);  
        $data['main_content']='includes/ct-tab';      			
		$html=$this->load->view('includes/ct-tab',$data,TRUE);    
        echo $html;
    }
    function hinhanhhoatdong()
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

        $query=$this->thuvien_model->gethinhanhhoatdong();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thuvien/hinhanhhoatdong/';
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
		$data['query']=$this->thuvien_model->gethinhanhhoatdong_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();               
        $data['main_content'] = 'hinhanhhd_view';
        $this->load->view('includes/template',$data);    
    }
    function anhalbum($id)
    {
        $start_row=$this->uri->segment(4);
        $per_page=16;
		if(is_numeric($start_row))
		{
			$start_row=$start_row;
		}
		else
		{
			$start_row=0;
		}

        $query=$this->thuvien_model->gethinhanhalbum($id);
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thuvien/anhalbum/';
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
		$data['query']=$this->thuvien_model->gethinhanhalbum_limited($id,$per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();        
        $data['main_content'] = 'anhalbum_view';
        $data['anhdm']=$id;
        $this->load->view('includes/template',$data);        
    }    
    function video()
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

        $query=$this->thuvien_model->getvideo();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thuvien/video/';
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
		$data['video']=$this->thuvien_model->getvideo_limited($per_page,$start_row);
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
        $data['main_content'] = 'video_view';
        $this->load->view('includes/template',$data); 
    }
    function document()
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

        $tailieu=$this->thuvien_model->gettailieu();
		$total_rows = $tailieu->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thuvien/document/';
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
		$data['tailieu']=$this->thuvien_model->gettailieu_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['main_content'] = 'tailieu_view';
        $this->load->view('includes/template',$data);
    }
    function nhac()
    {       
        $data['main_content']='nhac_view';
        $this->load->view('includes/template',$data);    
    }
    function danhmucalbum()
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

        $query=$this->thuvien_model->getthuvien();
		$total_rows = $query->num_rows();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'/thuvien/danhmucalbum/';
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
		$data['query']=$this->thuvien_model->getthuvien_limited($per_page,$start_row);
        $data['pagination']= $this->pagination->create_links();
        $data['thuvien']=true;
        $data['main_content'] = 'danhmucalbum_view';
        $this->load->view('includes/template',$data);        
    }
}
?>