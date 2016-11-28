<div id="main">



<?php



                    if(!(isset($action)))



					{



						$this->load->view('controlpanel');



					}



					elseif($action=='add')



					{



						$this->load->view('addcontent');



					}
					elseif($action=='doimatkhau')
					{
						$this->load->view('doimatkhau');
					}
					elseif ($action=='resetmatkhau') 
					{
						$this->load->view('resetmatkhau');
					}
                    elseif($action=='add_sinhnhat')
                    {
                        $this->load->view('add_sinhnhat');    
                    }
					elseif($action=='view')



					{



						$this->load->view('viewcontent');



					}



					elseif($action=='view2')



					{



						$this->load->view('viewcontent2');



					}



					elseif($action=='edit')



					{



						$this->load->view('editcontent');	



					}



					elseif($action=='listnews')



					{



						$this->load->view('list_news');



					}
                    elseif($action=='listdangky_view')
                    {
                        $this->load->view('listdangky_view');    
                    }                    
					elseif($action=='editnews')



					{



						$this->load->view('edit_news');



					}



					elseif($action=='editsuccess')



					{



						$this->load->view('edit_wait_success');



					}



						



?>



</div>