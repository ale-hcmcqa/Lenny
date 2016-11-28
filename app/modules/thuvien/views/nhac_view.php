<div class="post">
    <div class="post_top">
        <div class="post_l"></div>
        <div class="post_c">
            <h3><a href="<?php echo site_url('thu-vien-nhac.html'); ?>">Nhạc</a></h3>
        </div>
        <div class="post_r"></div>
        <div class="clear"></div>
    </div>
    <div class="post_main">
        <div style="padding-left:150px;padding-top:15px;">
        <div id="nhac">Loading… </div>
        <script type="text/javascript" src="js/jquery.playlist.js"></script>
        <script type="text/javascript" src="js/jwplayer.js"></script>
        <script type="text/javascript">
            jwplayer("nhac").setup({
            flashplayer:"player.swf",
            playlist:[
            <?php 
                $this->db->where('status',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('ordernum','desc');
                $sqlnhac=$this->db->get('tblnhac');
                $demnhac=1;
                foreach($sqlnhac->result() as $itemnhac)
                {
                ?>
                {file: "<?php echo $itemnhac->file; ?>", title: "<?php echo $demnhac; ?>. <?php echo $itemnhac->tennhac; ?> - ", description: " <?php echo $itemnhac->casy; ?>" },
                <?php 
                $demnhac++;   
                }
            ?>                                                   
            ],
            "playlist.position": "bottom",
            "playlist.size": 1,
            controlbar: "bottom",
            volume: 100,
            width:470,
            autostart: "true",
            height:260,                  
        });        
        </script>
        </div>
        <div class="clear"></div>
        
    </div>
</div>