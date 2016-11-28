<?php
class Tag extends Controller
{
	function __construct()
	{
		parent::Controller();  
		$this->load->model('tag/tag_model');
		$this->load->library('pagination'); 
	}
	function getnewsByTag($id)
	{		
		$data['tag']=$this->tag_model->getTagNew($id);	
		if($data['tag'])
		{
			$data['header_title']=$data['tag']->tag;
		}
		else
		{
			$data['header_title']='';
		}
		$query=$this->tag_model->getnewByTagId($id);
		$total_rows =$query->num_rows();
		$per_page=10;
		$start_row=$this->uri->segment(4);
		$config['base_url'] = site_url().'/tag/getnewsByTag/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 10;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->tag_model->getnewByTagId_limited($id,$per_page,$start_row);
		$data['pagination']= $this->pagination->create_links();	
		$data['main_content']='newsbytag';
		$this->load->view('includes/template',$data);
	}
    function getsanphamByTag($id)
	{
		//$data['home']=true;
		$data['tag']=$this->tag_model->getTagNew($id);	
		if($data['tag'])
		{
			$data['header_title']=$data['tag']->tag;
		}
		else
		{
			$data['header_title']='';
		}
		$query=$this->tag_model->getsanphamByTagId($id);
		$total_rows =$query->num_rows();
		$per_page=10;
		$start_row=$this->uri->segment(4);
		$config['base_url'] = site_url().'/tag/getsanphamByTag/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 10;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->tag_model->getsanphamByTagId_limited($id,$per_page,$start_row);
		$data['pagination']= $this->pagination->create_links();	
		$data['main_content']='sanphambytag';
		$this->load->view('includes/template',$data);
	}
	function getphukienByTag($id)
	{
		$data['tag']=$this->tag_model->getTagNew($id);	
		if($data['tag'])
		{
			$data['header_title']=$data['tag']->tag;
		}
		else
		{
			$data['header_title']='';
		}
		$query=$this->tag_model->getphukienByTagId($id);
		$total_rows =$query->num_rows();
		$per_page=32;
		$start_row=$this->uri->segment(4);
		$config['base_url'] = site_url().'/tag/getphukienByTag/'.$id;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] =4;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['num_links'] = 10;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>';
		$this->pagination->initialize($config);
		$data['query']=$this->tag_model->getphukienByTagId_limited($id,$per_page,$start_row);
		$data['pagination']= $this->pagination->create_links();	
		$data['main_content']='phukienbytag';
		$this->load->view('includes/template',$data);	
	}
}
?>