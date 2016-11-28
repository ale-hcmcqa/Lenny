<div class="box_center">
    <div class="box_center_top">
        <p>Đánh giá của khách hàng về sản phẩm</p>
    </div>
    <div class="box_center_main">
         <ol class="breadcrumb">              
            <li><a href="<?php echo base_url(); ?>" id="a1">Trang chủ</a></li>
            <li class="active">Đánh giá của khách hàng</li>
         </ol>
         <?php 
            if($ykien->num_rows() >0)
            {
                foreach($ykien->result() as $itemykien)
                {
         ?>
         <div class="item_lt">
            <div class="row"> 
                        <?php 
                            if($itemykien->anh_thumb=='' || $itemykien->anh_thumb=='0')
                            {
                            }
                                else
                                {
                        ?>                                        
                        <div class="col-lg-2 itemtt_img">                                                                   
                            <a href="<?php echo site_url('site/ykienchitiet/'.$itemykien->id.'/'.url_title($itemykien->ten.'.html')); ?>" title="<?php echo $itemykien->ten; ?>"><img src="<?php echo $itemykien->anh_thumb; ?>" alt="<?php echo $itemykien->ten; ?>" /></a>                               
                        </div>
                        <?php 
                        }
                        ?>                         
                    <div class="col-lg-10 itemtt_nd" >                                                   
                        <a href="<?php echo site_url('site/ykienchitiet/'.$itemykien->id.'/'.url_title($itemykien->ten.'.html')); ?>" class="itemlt_name"><?php echo $itemykien->ten; ?></a>                                                                                           
                        <div class="p"><?php echo catchuoi(strip_tags($itemykien->noidung),200);?></div>                    
                        <div class="read1">
                            <a href="<?php echo site_url('site/ykienchitiet/'.$itemykien->id.'/'.url_title($itemykien->ten.'.html')); ?>">+ Xem thêm</a>
                        </div>                           
                    </div>
                    <div class="clear"></div>                    
                </div>
         </div>
         <?php 
            }
         }
         else
         {
         ?>
         <p style="text-align:center;">Dữ liệu đang cập nhật</p>
         <?php   
         }
         ?>           
    </div>
</div>