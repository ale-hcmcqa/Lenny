<div class="box_center">
    <div class="box_center_top"> 
        <div class="box_center_top_al">                         
            <a href="" class="box_main_l">Đối tác</a> 
        </div>                                          
    </div>
    <div class="box_center_main">
        <ul class="breadcrumb" style="margin:15px;">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            <li class="active">Đối tác</li>
            <div class="clear"></div>
        </ul>            
        <?php 
            $demdt=1;
            foreach($query->result() as $itemdoitac)
            {                     
                    $titledt=$itemdoitac->title;                                      
                ?>                                            
                 <div class="col-lg-3 col-md-3 col-lg-sm-3 col-lg-xs-12 thuvien_item">                    
                        <?php 
                            if($itemdoitac->anh_thumb=='' || $itemdoitac->anh_thumb=='0')
                            {
                            }
                                else
                                {
                        ?>                                        
                        <div class="itemtt_img">                                                                   
                            <a href="<?php echo $itemdoitac->link; ?>" target="_blank" target="_blank"><img src="<?php echo $itemdoitac->anh; ?>" alt="<?php echo $itemdoitac->title; ?>" /></a>                               
                        </div>
                        <a href="" class="thuvien_item_name"><?php echo $itemdoitac->title; ?></a>
                        <?php 
                        }
                        ?>                                             
                    <div class="clear"></div>                                    
                </div>            
                <?php                   
            ?>            
            <?php 
            $demdt++;   
            }
        ?>                     
        <div class="clearfix"></div>
        <br />
        <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>
    </div>
</div>