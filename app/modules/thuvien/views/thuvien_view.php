<div class="box">
    <div class="box_top">   
        <div class="box_top_l">     
            <p><a href="<?php echo site_url('thu-vien-hinh-anh.html'); ?>">Thư viện ảnh</a></p>
        </div>   
        <div class="box_top_r"></div>            
    </div>
    <div class="box_main">        
        <?php 
            $demtv=1;
            foreach($query->result() as $itemhinhanh)
            {                  
                    $titletv=$itemhinhanh->title;                                
                ?>   
                    <div class="thuvien1" <?php if($demtv%2==0) { ?> style="border-right:none;" <?php } ?> >             
                        <div class="thuvien1_img">
                            <a href="<?php echo $itemhinhanh->anh; ?>"><img src="<?php echo $itemhinhanh->anh_thumb; ?>" alt="<?php echo $itemhinhanh->title; ?>" /></a>
                        </div>
                        <div class="thuvien1_name">
                            <?php echo $titletv; ?>
                        </div>   
                    </div> 
                <?php                   
            ?>            
            <?php 
            $demtv++;   
            }
        ?>   
        <script type="text/javascript">
       	    $(document).ready(function () {
           	    $('.thuvien1_img a').lightBox();                                
            });
        </script>      
        <div class="clear"></div>
        <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>
        </div>
</div>