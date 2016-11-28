<div class="post_ct">    
            <h3 class="cufont_p"><a href="<?php echo site_url('sitemap.html'); ?>">SiteMap</a></h3>        
    </div>
    <div class="post_main">    
    <script type="text/javascript">
        $(document).ready(function() {
            $('.hitarea').click(function(){
                //$(this).css('background-position','0px -112px')
				//$(this).siblings('.ul_end').slideDown();													 
				var obj=$(this);
				if(obj.hasClass('expand'))
				{
				    obj.removeClass('expand');
				    obj.addClass('colpand');
                    obj.css('background-position','0px -112px')
				    obj.siblings('.ul_end').slideDown();
				}
				else if(obj.hasClass('colpand'))
				{
				    obj.removeClass('colpand');
				    obj.addClass('expand');
				    obj.css('background-position','-80px -2px')
				    obj.siblings('.ul_end').slideUp();
				}														
				   });
	   });
    </script>
        <?php 
            $this->db->where('status',0);
            //$this->db->where('vitri1',1);
            $sqlgt=$this->db->get('tbldanhmucbaiviet');
            if($sqlgt->num_rows() > 0)
            {
                foreach($sqlgt->result() as $itemgt)
                {
                ?>
                <div class="zone_list">
                    <h2 class="saleoff">
                        <a href="<?php echo site_url(BoDau($itemgt->danhmucbaiviet).'.html') ?>"><?php echo $itemgt->danhmucbaiviet; ?></a>
                    </h2>
                    
                </div><!--End .zone_list-->
                <?php    
                }
            ?>            
            <?php    
            }
        ?>        
        
        <div class="clear"></div>
        <br />
    </div>
</div>