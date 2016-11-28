<script type="text/javascript" src="js/fresco/fresco.js"></script>
<div class="box_center">
        <div class="box_center_top">  
            <div class="box_center_top_al">          
            <?php 
                if(isset($anhdm))
                {
                    $this->db->where('id',$anhdm);
                    $sqldanhmucanh=$this->db->get('tblhinhanhhoatdong')->row();
                    ?>
                    <p><a href="" class="cufont_text"><?php echo $sqldanhmucanh->title; ?></a></p>
                    <?php
                }
            ?>                         
            </div>         
        </div>
        <div class="box_center_main" style="padding:0 15px;">
            <ol class="breadcrumb" style="margin:15px;">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <?php 
                    if(isset($anhdm))
                    {
                ?>
                <li class="active"><?php echo $sqldanhmucanh->title; ?></li>
                <?php 
                }
                ?>
            </ol>            
    <div class="row">                         
                <?php 
                    if($query->num_rows() >0)
                    {
                        $dembum=1;
                        ?> 
                        <div id="title_album" class="thongbaoone" style="text-align: center;color:red;font-size:20px;font-weight:bold;"><?php echo $sqldanhmucanh->title; ?>
                   	        <p style="font-size:12px;color:red;font-weight:normal;text-transform:none;font-style:italic;padding-top:5px">Click vào ảnh để xem ảnh lớn hơn</p>
                        </div>                       
                        <?php
                        foreach($query->result() as $itemhinhanhalbum)
                        {
                        ?>
                        <div class="col-lg-3 col-md-3 col-lg-sm-3 col-lg-xs-12 thuvien_item" style="height:150px;">
                            <a href="<?php echo $itemhinhanhalbum->duongdan; ?>" class='fresco' data-fresco-group='example' data-fresco-caption="<?php echo $sqldanhmucanh->title; ?>"><img src="<?php echo $itemhinhanhalbum->thumb; ?>"/></a>                            
                        </div>
                    <?php
                        $dembum++;
                        } 
                    }
                    else
                    {
                    ?>
                    <p style="text-align:center;">Dữ liệu đang cập nhật</p>
                    <?php    
                    }
                    ?>
                    <div style="padding-bottom: 10px;"><?php echo $pagination; ?></div>  
</div>                              
        </div>
    </div>    