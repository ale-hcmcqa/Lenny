<?php 
if(isset($id))
{
    $this->db->where('id',$id);
    $sqlvideoct=$this->db->get('tblvideo')->row();
    $str=explode('=',$sqlvideoct->url);
    $str2=explode('&',$str[1]);
?>
<div class="box_left">
    <div class="box_left_top">
        <p>Video chi tiết</p>
    </div>
    <div class="box_left_main">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a><span>/</span></li>
            <li class="active"><?php echo $sqlvideoct->title; ?></li>
            <div class="clear"></div>
        </ul> 
        <div id="videochitiet">            
            <iframe class="embed-player" width="600" height="400" src="http://www.youtube.com/embed/<?php echo $str2[0];?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php 
}
?>