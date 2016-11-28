<?php 
$CI=&get_instance();
$CI->load->helper('time');
?>  
<div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12" id="new_ct_l">   
    <div class="box_right"> 
        <div class="box_right_top" style="margin-bottom:0;">                                                                                                         	          
            <?php
                if(isset($dm))
                {
                    $this->db->where('id',$dm);
                    $sqldanhmucdmv=$this->db->get('tbldanhmucbaiviet')->row();                            
                    $danhmucdmvvn=$sqldanhmucdmv->danhmucbaiviet;                                                                                                                                             
                    $this->db->where('danhmucbaiviet',$dm);
                    $query1=$this->db->get('tbltintuc')->row();
                ?>
                <a class="box_top_title" href="<?php echo site_url(BoDau($sqldanhmucdmv->danhmucbaiviet).'.html'); ?>" title="<?php echo $danhmucdmvvn; ?>">&nbsp;<?php echo $danhmucdmvvn; ?></a>               
                <?php    
                }
                if(isset($dmbv2))
                {
                    $this->db->where('id',$dmbv2);
                    $sqldanhmucdmv2=$this->db->get('tbldanhmucbaiviet2')->row();
                    $this->db->where('danhmucbaivietcap2',$dmbv2);
                    $query1=$this->db->get('tbltintuc')->row();
                ?>
                <a class="box_top_title" href="">&nbsp;<?php echo $sqldanhmucdmv2->danhmucbaivietcap2; ?></a>
                <?php
                }
                if(isset($ct))
                { 
                    $this->db->where('id',$ct);
                    $sqlnews = $this->db->get('tbltintuc')->row();
                    $this->db->where('id',isset($sqlnews->danhmucbaivietcap2));
                    $sqldm2t=$this->db->get('tbldanhmucbaiviet2')->row();
                    $sqlnews1 = $sqlnews->danhmucbaiviet;                  
                    $this->db->where('id',$sqlnews1);
                    $sqldm = $this->db->get('tbldanhmucbaiviet')->row();                            
                    $danhmucall=$sqldm->danhmucbaiviet;                                                                                                                                                                                                                                                                                                           
            ?>       
            <a href="<?php echo site_url(BoDau($sqldm->danhmucbaiviet).'.html'); ?>" class="box_top_title"><?php echo $danhmucall; ?></a>                   
            <?php 
            }
            ?> 
            <div class="box_right_vien"></div>                                                                                                                                                                       
        </div>                         		
    	<div class="box_right_main">          
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><i style="font-size:20px;color:#ed1c24;" class="fa fa-home"></i></a></li>
                <?php 
                    if(isset($dm))
                    {
                    ?>
                    <li><a href="<?php echo site_url(LocDau($sqldanhmucdmv->danhmucbaiviet).'-bv'.$sqldanhmucdmv->id.'.html'); ?>" id="a2"><?php echo $danhmucdmvvn; ?></a></li>
                    <?php    
                    }
                    if(isset($dmbv2))
                    {
                    ?>
                    <li><a href="<?php echo site_url(BoDau($sqldanhmucdmv2->danhmucbaivietcap2).'.html'); ?>" id="a2"><?php echo $sqldanhmucdmv2->danhmucbaivietcap2; ?></a></li>
                    <?php    
                    }
                    if(isset($ct))
                    {
                    ?>
                    <li><a href="<?php echo site_url(LocDau($sqldm->danhmucbaiviet).'-bv'.$sqldm->id.'.html'); ?>" id="a2"><?php echo $danhmucall; ?></a></li>
                    <?php 
                        $this->db->where('id',isset($sqlnews->danhmucbaivietcap2));
                        $sqldm2tte=$this->db->get('tbldanhmucbaiviet2');
                        if($sqldm2tte->num_rows()>0)
                        {
                    ?>
                    <li><a href="<?php echo site_url(BoDau($sqldm2t->danhmucbaiviet).'-bv2'.$sqldm2t->id.'.html'); ?>"><?php echo $sqldm2t->danhmucbaivietcap2; ?></a></li>
                    <?php 
                        }
                    ?>
                    <li class="action"><?php echo $query1->title; ?></li>
                    <?php 
                    }
                ?>
                <div class="clear"></div>
            </ul>                  
    		<div class="keugoi" style="padding:0 10px;"> 
                <?php                     
                    $titlect=$query1->title;                     
                    $noidungct=$query1->noidung;                                                                                                                                                                                               
                ?>           
    			<h1 style="background:none;padding-left:0;"><?php echo $titlect; ?></h1>
                <div id="time">
                Ngày đăng:&nbsp;<?php $date=explode('-',$query1->ngaydang);echo $date[2].'-'.$date[1].'-'.$date[0];?>
                    |             
                    <?php echo $query1->giodang; ?> | <?php echo $query1->view; ?>&nbsp;Lượt xem | Người đăng:&nbsp;<?php echo $query1->nguoidang; ?>
                </div>            			
                <div class="p"><?php echo $noidungct; ?></div>                                                  
                <div style="clear: both;"></div>
    		</div>	
    		 <!--Chia Sẻ-->                                                                        
                      <div id="chiase" style="padding-top:7px;">
                      	  <span id="title"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;Chia sẻ</span>
                          <div class="addthis_toolbox addthis_default_style " style="padding-top:5px;width:auto;height:auto;clear:both;">
                              <div id="embed" class="linkhaybutton" style="float:left;">
                                    <a title="Chia sẻ trên LinkHay.com" target="_blank" href="http://linkhay.com/submit?link_url=<?php echo site_url().'/baiviet/baivietchitiet/'.$query1->id?>/<?php echo url_title($query1->title)?>" title="<?php echo url_title($query1->title)?>&amp;link_title=<?php echo url_title($query1->title)?>&amp;link_content=&amp;link_media=0&amp;utm_source=partner&amp;utm_medium=embedded&amp;utm_campaign=button" class="count"><span>0</span></a>
                                    <a href="http://linkhay.com/submit?link_url=<?php echo site_url().'baiviet/baivietchitiet/'.$query1->id?>/<?php echo url_title($query1->title)?>&amp;link_title=<?php echo url_title($query1->title)?> &amp;link_content=&amp;link_media=0&amp;utm_source=partner&amp;utm_medium=embedded&amp;utm_campaign=button" title="Chia sẻ trên LinkHay.com" target="_blank" class="retweet">HOT!</a>
                               </div>
                              <!-- AddThis Button BEGIN -->
                              <div class="addthis_toolbox addthis_default_style ">
                                  <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                  <a class="addthis_button_tweet"></a>
                              <script type="text/javascript">
                              var GoShareType = "govnShareLink";
                              function share_zing() { var u = location.href; window.open("http://link.apps.zing.vn/share?u=" + encodeURIComponent(u)); }
                              </script>
                              <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
    
                              <a class="addthis_counter addthis_pill_style"></a>
    
                       </div>
                              <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eae23e6468992a2"></script>
                              <!-- AddThis Button END -->
                          </div>					 
                       </div>
                      <!--Chia Sẻ-->                                
            <div id="tags">
                <span><i class="glyphicon glyphicon-tags"></i>&nbsp;Xem thêm:</span>
                <?php
                    $this->db->where('categories','2');
                    $this->db->where('idnew',$query1->id);
                    $tag=$this->db->get('tag_new');
                    if($tag->num_rows()>0)
                    {
                        foreach($tag->result() as $tag)
                        {
                            $this->db->where('id',$tag->idtag);
                            $tagname=$this->db->get('tag');
                            if($tagname->num_rows()>0)
                            {
                                $tagname1=$tagname->row();
                                {
                                ?>
                                    <a href="<?php echo site_url('/tag/getnewsByTag/'.$tagname1->id.'/'.url_title($tagname1->tag));  ?>" title="Tìm hiểu thêm về '<?php echo $tagname1->tag;?>'"> <?php echo $tagname1->tag;?></a>, 
                                <?php
                                }
                            }
                        }
                    }
                ?>
            </div>     
            <?php 
                $this->db->where('danhmucbaiviet',$query1->danhmucbaiviet);
                $this->db->where('id !=',$query1->id);
                $this->db->limit(5);
                $sqllq=$this->db->get('tbltintuc');
                if($sqllq->num_rows() >0)
                {
            ?>   
            <div id="lienquan">
                <p>Tin liên quan</p>            
                <ul>
                    <?php                                             
                            foreach($sqllq->result() as $sqllq)
                            {                                  
                            $titlelienquan=$sqllq->title;                                                                                                                                                                                                                                                                       
                                ?>
                                <li>                                    
                                    <a href="<?php echo site_url(LocDau($sqllq->title).'-'.$sqllq->id.'.html');?>" title="<?php echo $titlelienquan; ?>"><?php echo $titlelienquan; ?></a>
                                    <div class="clear"></div>
                                </li>
                                <?php 
                            }                    
                        ?>                    
                </ul>
            </div>
            <?php 
            }
            ?>                        
            <br />
    		<div id="fb" style="padding-left:9px;">       
    	       <div id="fb-root"></div>
    		      <script>(function(d, s, id) {
    		          var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <html xmlns:fb="http://ogp.me/ns/fb#">
                    <fb:comments href="<?php echo site_url(LocDau($query1->title).'-'.$query1->id.'.html');?>" width="100%" num_posts="10" ></fb:comments>
                </html>
                <!--fb-->
            </div>
    	</div>
        <div class="box_center_foo"></div>
    	<div class="clear"></div>    
    </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12" id="new_ct_r"> 
        <?php $this->load->view('includes/new_right') ?>
    </div>
</div>