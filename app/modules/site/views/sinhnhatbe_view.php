<div class="row">
    <div class="col-lg-12 page_item">
        <div class="page_item_top">
            <p><a href="<?php echo site_url('lien-he.html'); ?>" class="thongbaoone">Sinh nhật bé yêu</a></p>
        </div>
        <div class="page_item_main">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <li class="active">Sinh nhật bé yêu</li>
            </ol>
            <div id="sinhnhat_all">
                <div class="row">
                <?php 
                    $data=date('m',time());
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqlsinhnhatall=$this->db->get('tblsinhnhat');
                    if($sqlsinhnhatall->num_rows() >0)
                    {
                        $ok=0;
                        $dem=1;                        
                    ?>
                    <div id="title_album" class="thongbaoone" style="text-align: center;padding-bottom:10px;">Sinh nhật bé yêu trong tháng <?php echo $data; ?>                   	        
                    </div>  
                    <?php 
                        foreach($sqlsinhnhatall->result() as $itemsinhnhatall)
                        {
                            $sn=$itemsinhnhatall->ngaysinh;
                            $item=explode('-',$sn);
                            if($item['1']==$data)
                            {
                                $ok=1;
                                ?>
                                <div class="col-lg-6">
                                    <div class="sinhnhatbe_item">
                                        <div class="sinhnhatbe_img">
                                            <a href=""><img src="<?php echo $itemsinhnhatall->anh_thumb; ?>" /></a>
                                        </div>
                                        <div class="sinhnhat_nd" style="padding-top:7px;">
                                            <label>Bé:&nbsp;<?php echo $itemsinhnhatall->hoten; ?></label>
                                            <p>Sinh nhật:<?php echo $item['2'].'-'.$item['1']; ?></p>
                                        </div>
                                        <div class="clear"></div>
                                    </div>    
                                </div>
                                <?php
                            }                            
                            $dem++;
                        }
                        if($ok==0)
        				{        					
        					echo '<p>Tháng này không có sinh nhật bé nào.</p>';        					
        				}
                    ?>
                    <?php    
                    }
                    else
        			{
        				echo '<p>Tháng này không có sinh nhật bé nào.</p>';
        			}
                ?>
                </div>
            </div>            
        </div>
    </div>
</div>