<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$slider=$CI->site_model->gettablename_all('tblslider','','','','');
?>
<div id="danhmucall">
    <div id="danhmucleft">        
        <ul> 
            <?php 
                $this->db->where('status',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $sqldanhmucsanphamtr=$this->db->get('tbldanhmucsanpham');
                if($sqldanhmucsanphamtr->num_rows()>0)
                {
                    foreach ($sqldanhmucsanphamtr->result() as $itemdanhmucsanphamtr) 
                    {
                    ?>
                    <li><a href="<?php echo site_url(LocDau($itemdanhmucsanphamtr->danhmucsanpham).'-dm'.$itemdanhmucsanphamtr->id.'.html'); ?>" title="<?php echo $itemdanhmucsanphamtr->danhmucsanpham; ?>"><?php echo $itemdanhmucsanphamtr->danhmucsanpham; ?> <?php if($itemdanhmucsanphamtr->hot==1){ ?><img style="margin-left:15px;" title="<?php echo $itemdanhmucsanphamtr->danhmucsanpham; ?>" alt="<?php echo $itemdanhmucsanphamtr->danhmucsanpham; ?>" src="images/icon_hot.png"><?php } ?></a>
                        <?php 
                            $this->db->where('status',0);
                            $this->db->where('danhmucsanpham',$itemdanhmucsanphamtr->id);
                            $this->db->order_by('ordernum','desc');
                            $this->db->order_by('id','desc');
                            $sqldanhmucsanphamtr2=$this->db->get('tbldanhmucsanpham2');
                            if($sqldanhmucsanphamtr2->num_rows()>0)
                            {
                            ?>
                            <ul class="danhmucleft_sub">
                                <?php 
                                foreach ($sqldanhmucsanphamtr2->result() as $itemdanhmucsanphamtr2) 
                                {
                                ?>
                                <li><a href="<?php echo site_url(BoDau($itemdanhmucsanphamtr2->danhmucsanphamcap2).'-dm2'.$itemdanhmucsanphamtr2->id.'.html'); ?>" title="<?php echo $itemdanhmucsanphamtr2->danhmucsanphamcap2; ?>"><?php echo $itemdanhmucsanphamtr2->danhmucsanphamcap2; ?></a></li>
                                <?php
                                }
                                $sqldanhmucsanphamtr2->free_result();
                                ?>
                            </ul>
                            <?php    
                            }
                        ?>
                    </li> 
                    <?php
                    }
                    $sqldanhmucsanphamtr->free_result();
                }
            ?>                                
            <li><a href="<?php echo site_url('san-pham-khuyen-mai.html'); ?>" title="Sản phẩm khuyến mại"><img src="images/icon_11.png">Khuyến mại<img style="margin-left:15px;" src="images/icon_hot.png"></a></li>                 
        </ul>            
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function(){                            
        jQuery('#danhmucleft ul > li').hover(function(){
            jQuery(this).children('.danhmucleft_sub').css('display','block');                       
            },function(){
                jQuery(this).children('.danhmucleft_sub').css('display','none');    
        });                    
    });
</script>
    <div id="slider">
        <?php 
            if($slider->num_rows()>0)
            {
            ?>
            <div class="owl-carousel">
                <?php 
                    foreach ($slider->result() as $itemslider) 
                    {
                    ?>
                    <div>
                        <a href="<?php echo $itemslider->link; ?>" target="_blank" title="<?php echo $itemslider->title; ?>"><img alt="<?php echo $itemslider->title; ?>" title="<?php echo $itemslider->title; ?>" src="<?php echo $itemslider->anh; ?>"></a>
                    </div>
                    <?php
                    }
                    $slider->free_result();
                ?>                
            </div> 
            <?php 
            }
        ?>   
    </div>
    <div class="clearfix"></div>
</div>