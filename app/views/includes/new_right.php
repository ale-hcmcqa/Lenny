<?php 
if(isset($_SESSION['lang']))
{
    $lang=$_SESSION['lang'];
}
else
{
    $lang='vi';
}
$CI=&get_instance();
$CI->load->model('site/site_model');
$tinmoi=$CI->site_model->gettablename_all('tbltintuc','id,title,ordernum,status',5,'','');
?>
<div class="box">
    <div class="box_top">
        <a class="box_top_title" href="">Tin mới nhất</a>
        <div class="clear"></div>
    </div>
    <div class="box_main">
        <?php 
            if($tinmoi->num_rows()>0)
            {
            ?>
            <ul class="tinmoi_r">
                <?php 
                    foreach($tinmoi->result() as $itemtinmoi)
                    {                        
                        $tinmoivnr=$itemtinmoi->title;                        
                    ?>
                    <li>                        
                        <a href="<?php echo site_url(BoDau($itemtinmoi->title).'-'.$itemtinmoi->id.'.html'); ?>" title="<?php echo $tinmoivnr; ?>"><?php echo $tinmoivnr; ?></a>                        
                    </li>
                    <?php 
                    }
                    $tinmoi->free_result();
                ?>                
            </ul>
            <?php 
            }
        ?>
    </div>
</div>
<div class="box">
    <div class="box_top">
        <a href="" class="box_top_title">Tin xem nhiều</a>
        <div class="clear"></div>
    </div>
    <div class="box_main">
        <?php 
            $this->db->where('status',0);
            $this->db->order_by('view','desc');
            $this->db->limit(5);
            $sqltinxemnhieu=$this->db->get('tbltintuc');
            if($sqltinxemnhieu->num_rows()>0)
            {
            ?>
            <ul class="tinmoi_r">
                <?php 
                    foreach($sqltinxemnhieu->result() as $itemtinxemnhieu)
                    {                        
                        $tinmoivnnhieur=$itemtinxemnhieu->title;                            
                    ?>
                    <li>                        
                        <a href="<?php echo site_url(BoDau($itemtinxemnhieu->title).'-'.$itemtinxemnhieu->id.'.html'); ?>" title="<?php echo $tinmoivnnhieur; ?>"><?php echo $tinmoivnnhieur; ?></a>                        
                    </li>
                    <?php 
                    }
                    $sqltinxemnhieu->free_result();
                ?>               
            </ul>
            <?php 
            }
        ?>
    </div>
</div>