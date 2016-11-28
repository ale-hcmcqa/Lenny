<?php 
$this->db->where('status',0);
$this->db->order_by('ordernum','desc');
$this->db->order_by('id','desc');
$sqlloaixesp=$this->db->get('tblloaixe');
if($sqlloaixesp->num_rows() >0)
{
    foreach($sqlloaixesp->result() as $itemloaixesp)
    {
        $this->db->where('status',0);
        $this->db->where('loaixe',$itemloaixesp->id);                
        $sanphamdem=$this->db->get('tblsanpham');
        if($sanphamdem->num_rows() >0)
        {
?>
<div class="box_center">
    <div class="box_center_top">                                  
        <a href="<?php echo site_url(LocDau($itemloaixesp->loaixe).'-loaixe'.$itemloaixesp->id.'.html'); ?>" title="<?php echo $itemloaixesp->loaixe; ?>" class="cufont_text"><?php echo $itemloaixesp->loaixe; ?></a>                        
    </div>                 
         <div class="box_center_main">                   
                <?php 
                    $this->db->where('status',0);
                    $this->db->where('loaixe',$itemloaixesp->id);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $this->db->limit(4);
                    $sanpham=$this->db->get('tblsanpham');
                    if($sanpham->num_rows() >0)
                    {
                        $sp=1;
                        foreach($sanpham->result() as $itemsanpham)
                        {                         
                            $tenallvn=$itemsanpham->ten;                                                                                               
                        ?>
                        <div class="box_sanpham">                                             
                        <?php 
                            if($itemsanpham->anh_thumb=='0')
                            {                                    
                            }
                            else
                            {
                            ?>                                                     
                                <a class="box_sanpham_img" href="<?php echo site_url(LocDau($itemsanpham->ten).'-sp'.$itemsanpham->id.'.html');?>" title="<?php echo $itemsanpham->ten; ?>"><img src="<?php echo $itemsanpham->anh_thumb; ?>" alt="<?php echo $itemsanpham->ten; ?>" /></a>                                                   
                            <?php 
                            }
                            ?>                             
                            <a class="box_sanpham_name" href="<?php echo site_url(LocDau($itemsanpham->ten).'-sp'.$itemsanpham->id.'.html');?>"><?php echo $tenallvn;  ?></a>
                            <p class="box_sanpham_price">Giá:&nbsp;<span>
                    <?php 
                        if($itemsanpham->gia=='')
                        {                    
                            echo "Liên hệ";                                                                            
                        }
                        else
                        {
                            echo number_format($itemsanpham->gia,0,'.','.')?>&nbsp;<?php echo $itemsanpham->donvitinh; 
                        }
                    ?>
                    </span></p>
                    <div class="box_sanpham_order">
                        <a href="<?php echo site_url('sanpham/dathang/'.$itemsanpham->id.'/'.url_title($itemsanpham->ten.'.html')); ?>" title="<?php echo $itemsanpham->ten; ?>">Đặt hàng</a>
                    </div>                                                                                                                                                                                                                    
                            <div class="clear"></div>
                        </div><!--End .box_sanpham-->   
                        <?php   
                            $sp++;
                        }
                        $sanpham->free_result();
                    }
                    else
                    {
                    ?>
                    <p style="text-align:center;">Dữ liệu đang cập nhật</p>
                    <?php    
                    }
                ?>
                <div class="clear"></div>                                                 
         </div>
</div>
<?php
        }
    }
    $sqlloaixesp->free_result(); 
}
?>    