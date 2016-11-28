<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" id="new_ct_l">
        <div class="box_right">
            <div class="box_right_top" style="margin-bottom:0;"> 
                <h1>                                
                    <?php 
                        if(isset($dm))
                        {
                            $this->db->where('id',$dm);
                            $sqldm = $this->db->get('tbldanhmucbaiviet')->row();                            
                            $danhmuc=$sqldm->danhmucbaiviet;                                                                                                                                                                                                                                                                                                                                                                                                          
                    ?>          
                    <a class="box_top_title" href="<?php echo site_url(BoDau($sqldm->danhmucbaiviet).'-'.$sqldm->id.'.html') ?>"><?php echo $danhmuc; ?></a>
                    <?php
                        }
                        if(isset($dmbv2))
                        {
                            $this->db->where('id',$dmbv2);
                            $sqldm2=$this->db->get('tbldanhmucbaiviet2')->row();                            
                            $danhmuc2=$sqldm2->danhmucbaivietcap2;                                                                                      
                        ?>
                        <a class="box_top_title" href="<?php echo site_url(BoDau($sqldm2->danhmucbaivietcap2).'-'.$sqldm2->id.'.html') ?>"><?php echo $danhmuc2; ?></a>
                        <?php    
                        }
                        if(isset($dmbv3))
                        {
                            $this->db->where('id',$dmbv3);
                            $sqldm3=$this->db->get('tbldanhmucbaiviet3')->row();
                            $danhmuc3=$sqldm3->danhmucbaivietcap3;
                        ?>
                        <a class="box_top_title" href="<?php echo site_url(BoDau($sqldm3->danhmucbaivietcap3).'-'.$sqldm3->id.'.html') ?>"><?php echo $danhmuc3; ?></a>
                        <?php    
                        }
                    ?>
                </h1> 
                <div class="box_right_vien"></div>                                                                                              
            </div>        
            <div class="box_main">                         
                <ol class="breadcrumb">              
                    <li><a href="<?php echo base_url(); ?>" id="a1"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
                    <?php 
                        if(isset($dm))
                        {
                        ?>
                        <li>
                        <a href="<?php echo site_url(BoDau($sqldm->danhmucbaiviet).'-'.$sqldm->id.'.html') ?>" id="a2"><?php echo $danhmuc; ?></a>
                        </li>
                    <?php 
                    }
                    if(isset($dmbv2))
                    {
                        $this->db->where('id',$dmbv2);
                        $sqlbvcu2=$this->db->get('tbldanhmucbaiviet2')->row();                        
                        $this->db->where('id',$sqlbvcu2->danhmucbaiviet);
                        $sqlbvcu1=$this->db->get('tbldanhmucbaiviet')->row(); 
                    ?>
                    <li><a href="<?php echo site_url(LocDau($sqlbvcu1->danhmucbaiviet).'-bv'.$sqlbvcu1->id.'.html'); ?>" title="<?php echo $sqlbvcu1->danhmucbaiviet; ?>"><?php echo $sqlbvcu1->danhmucbaiviet; ?></a></li>                    
                    <?php 
                        $this->db->where('id',$dmbv2);
                        $sqlbvcu2te=$this->db->get('tbldanhmucbaiviet2');
                        if($sqlbvcu2te->num_rows()>0)
                        {
                        ?>
                        <li>
                            <a href="<?php echo site_url(BoDau($sqldm2->danhmucbaivietcap2).'-'.$sqldm2->id.'.html') ?>" id="a2"><?php echo $danhmuc2; ?></a>
                        </li>
                        <?php
                        }    
                    }
                    if(isset($dmbv3))
                    {
                    ?>
                    <li>
                    <a href="<?php echo site_url(BoDau($sqldm3->danhmucbaivietcap3).'-'.$sqldm3->id.'.html') ?>" id="a2"><?php echo $danhmuc3; ?></a>
                    </li>
                    <?php    
                    }
                    ?>
                    <div class="clear"></div>
                </ol>   
                <?php 
                if($query->num_rows() > 0)
                {
                    $demtt=1;
                    foreach($query->result() as $itemtt)
                    {                         
                        $titlevn=$itemtt->title; 
                        $tomtatvn=$itemtt->tomtat;                                                                                                                                                                                                                                                     
                ?>                           
                            <div class="item_lt">
                            <div class="row"> 
                                <?php 
                                    if($itemtt->anh_thumb=='' || $itemtt->anh_thumb=='0')
                                    {
                                    }
                                        else
                                        {
                                ?>                                        
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 itemtt_img">                                                                   
                                    <a href="<?php echo site_url(BoDau($itemtt->title).'-'.$itemtt->id.'.html');?>"><img src="<?php echo $itemtt->anh_thumb; ?>" alt="<?php echo $itemtt->title; ?>" /></a>                               
                                </div>
                                <?php 
                                }
                                ?>                         
                            <div class="<?php if($itemtt->anh_thumb=='' || $itemtt->anh_thumb=='0'){ ?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?php }else{ ?>col-lg-9 col-md-9 col-sm-9 col-xs-9<?php } ?> itemtt_nd" >                                                   
                                <a href="<?php echo site_url(BoDau($itemtt->title).'-'.$itemtt->id.'.html');?>" class="itemlt_name"><?php echo $titlevn; ?></a>                                                                                           
                                <div class="p"><?php echo catchuoi(strip_tags($tomtatvn),200);?></div>                    
                                <div class="read1">
                                    <a href="<?php echo site_url(BoDau($itemtt->title).'-'.$itemtt->id.'.html');?>">+ Chi tiết</a>
                                </div>                 
                            </div>
                            <div class="clear"></div>                    
                        </div>
                        </div>                                           
            <?php 
                $demtt++;
                   }
                   $query->free_result();
               }
               else
               {
               ?>
               <p style="text-align:center;padding-top:10px;color:#333;font-size:12px;">Dữ liệu đang cập nhật</p>
                <?php
               }
            ?>
            <div><?php echo $pagination;?></div>  
            <div class="clearfix"></div>
            <?php 
                if(isset($dm))
                {
                    $this->db->where('id',$dm);
                    $sqltheh = $this->db->get('tbldanhmucbaiviet')->row();                                                                 
                    $theheading=$sqltheh->theh;
                    ?>
                    <div class="theh_item" style="padding-top:10px;border-top:1px solid #ddd;margin-right:10px;margin-left:10px;"> 
                        <b style="display:block;border-bottom:1px solid #ddd;padding-bottom:10px;">Từ khóa</b>
                        <?php echo $theheading; ?>
                    </div>    
                    <?php 
                }
                if(isset($dmbv2))
                {
                    $this->db->where('id',$dmbv2);
                    $sqltheh = $this->db->get('tbldanhmucbaiviet2')->row();                                                                 
                    $theheading=$sqltheh->theh;
                    ?>
                    <div class="theh_item" style="padding-top:10px;border-top:1px solid #ddd;"> 
                        <b style="display:block;border-bottom:1px solid #ddd;padding-bottom:10px;">Từ khóa</b>
                        <?php echo $theheading; ?>
                    </div>
                    <?php    
                }
            ?>            
            </div>            
            <div class="clearfix"></div>             
        </div>
    </div>    
    <div class="col-md-3 col-sm-3 col-xs-12" id="new_ct_r"> 
        <?php $this->load->view('includes/new_right') ?>
    </div>
</div>   
