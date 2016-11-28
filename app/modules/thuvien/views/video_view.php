<div class="box_center">
    <div class="box_center_top">       
        <a href="<?php echo site_url('video.html'); ?>">Video</a>       
    </div>
    <div class="box_center_main">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#f36e1e;" class="fa fa-home"></i></a></li>
            <li class="active">Video</li>            
        </ol>
        <div class="row">    
        <?php 
            $demvd=1;
            foreach($video->result() as $itemvideo)
            {
                $str=explode('=',$itemvideo->url);
                $str2=explode('&',$str[1]);
                ?>                               
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> 
                    <div class="sanpham_itemct_img">
                        <iframe class="embed-player" width="100%" height="170" src="http://www.youtube.com/embed/<?php echo $str2[0];?>" frameborder="0" allowfullscreen></iframe>
                    </div>    
                    <div class="desc-prd">
                        <?php echo $itemvideo->title; ?>
                    </div>       
                </div>
                <?php
                if($demvd%3==0)
                {
                    echo '<div class="clearfix"></div>';
                }
                $demvd++;
            } 
        ?>        
        <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>
        </div>
    </div>
</div>