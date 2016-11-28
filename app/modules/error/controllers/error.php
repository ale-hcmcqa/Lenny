<?php
class error extends Controller
{
    function error()
    {
        parent::Controller();
        $this->load->helper(array('form', 'url'));	  
        $this->load->library('form_validation');
    }
    function index()
    {
    	$data['main_content']='error';    
    	$this->load->view('includes/template',$data);
    }
}
?>