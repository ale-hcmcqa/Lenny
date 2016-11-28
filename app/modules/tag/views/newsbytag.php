<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class="box">
            <div class="box_top">                                   
                    <h1 style="margin:0;"><a class="box_top_title"><?php echo $tag->tag; ?></a></h1>                                                                                                                                     
            </div>            	
            <div class="box_main">       
            <ol class="breadcrumb" style="margin:15px;">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li> 
                <li class="active"><?php echo $tag->tag; ?></li>
                <div class="clear"></div>
            </ol>        	
        	<?php
        		$CI=&get_instance();
                $CI->load->model('tag/tag_model');
                if($query->num_rows()>0)
                {
        			$dem=1;
        			foreach($query->result() as $row1)
        			{
        				$row=$CI->tag_model->getnew($row1->idnew);
                        if($row->num_rows() > 0)
                        {
                            $row=$row->row();                    
                            $titletag=$row->title;   
                            $tomtattag=$row->tomtat;                                                                                                                                                                                                                                                                                                                                                                  
        	?>    	        
                    <div class="item_lt"> 
                    <div class="row">
                        <?php 
                            if($row->anh_thumb!='' || $row->anh_thumb!='0')
                            {
                        ?>
                        <div class="col-lg-3 itemtt_img">                                          
                            <a href="<?php echo site_url(LocDau($row->title).'-'.$row->id.'.html');?>" title="<?php echo $titletag; ?>"><img src="<?php echo $row->anh_thumb; ?>" alt="<?php echo $titletag; ?>" title="<?php echo $titletag; ?>" /></a>                           
                        </div>
                        <?php 
                        }
                        ?>  
                        <div class="col-lg-9 itemtt_nd"> 
                        <a href="<?php echo site_url(LocDau($row->title).'-'.$row->id.'.html');?>" class="itemlt_name"><?php echo $titletag; ?></a>                 
                        <div class="p"><?php echo strip_tags($tomtattag);?></div>
                        <div class="read1">
                            <a href="<?php echo site_url(LocDau($row->title).'-'.$row->id.'.html');?>">+ Chi tiết</a>
                        </div>
                        </div>
                        <div class="clear"></div>                    
                    </div>
                    </div>                
        	<?php 
        		 }
                }
        		}
        	?> 
        	<div style="padding:10px;"><?php echo $pagination;?></div>
            <div class="clear"></div>          
        </div>	
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <?php $this->load->view('includes/new_right') ?>
    </div>
</div>