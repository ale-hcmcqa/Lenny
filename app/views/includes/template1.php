<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<?php
echo header('Content-type: text/html; charset=utf-8');
?>
<head>
    <?php 
        $offset = 60 * 15;
        header("Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT");
        header("Cache-Control: max-age=$offset, must-revalidate"); 
    ?>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <meta name="google-site-verification" content="hU4TLz0t7fUwp6sAXoONKcUtwwJNTueqsYC9EPreLno" />	
    <base href="<?php echo base_url(); ?>" />
	<title>
        <?php
        $CI = &get_instance();
        $CI->load->model('site/site_model');
        $data_select='title,description,keywords';
        $meta = $CI->site_model->gettablename('tblmeta',$data_select,'');        
        if(isset($header_title))
        {
            echo $header_title;
        }
        else
        {
	       echo $meta->title;
        }
    ?>
    </title>
    <meta name="description" content="<?php
    if(isset($description))
    {
        echo $description;
    }
    else
    {
        echo $meta->description;
    }?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="author" content="didongsinhvien"/>
    <meta name="copyright" content="didongsinhvien" />
    <meta name="robots" content="index,follow" />
    <meta name="geo.region" content="VN-HP" />
    <meta name="geo.placename" content="Hải Ph&ograve;ng" />
    <meta name="geo.position" content="20.838313;106.687122" />
    <meta name="ICBM" content="20.838313, 106.687122" />
    <meta http-equiv="content-language" content="vi"/>    
    <meta name="dc.description" content="<?php echo $meta->description; ?>">
    <meta name="dc.keywords" content="<?php echo $meta->keywords; ?>">
    <meta name="dc.subject" content="<?php echo $meta->title; ?>">
    <meta name="dc.created" content="2015-12-04">
    <meta name="dc.publisher" content="<?php echo $meta->title; ?>">
    <meta name="dc.rights.copyright" content="didongsinhvien">
    <meta name="dc.creator.name" content="didongsinhvien">
    <meta name="dc.creator.email" content="sales@hpsoft.vn">
    <meta name="dc.identifier" content="http://didongsinhvien.com/">
    <meta name="dc.language" content="vi-VN">
    <link href="<?php echo base_url().'feed'; ?>" rel="alternate" type="application/rss+xml" title="RSS 2.0">
    <link href="<?php echo base_url().'feed'; ?>" rel="alternate" type="application/atom+xml" title="Atom 1.0">
    <meta name="keywords" content="<?php 
    if(isset($keyword))
    {
        echo $keyword;    
    }
    else
    {
        echo $meta->keywords;    
    }     
    ?>"/>    
    <?php
        function catchuoi($chuoi,$gioihan){
        if(strlen($chuoi)<=$gioihan)
        {
            return $chuoi;
        }
        else{
        if(strpos($chuoi," ",$gioihan) > $gioihan){
            $new_gioihan=strpos($chuoi," ",$gioihan);
            $new_chuoi = substr($chuoi,0,$new_gioihan)."...";
            return $new_chuoi;
        }
        $new_chuoi = substr($chuoi,0,$gioihan)."...";
            return $new_chuoi;
        }
    }
    ?>     
    <?php 
    if(isset($ctp))
    {
        $this->db->where('id',$ctp);
        $baivietfb=$this->db->get('tbltintuc')->row();
        ?>
        <meta property="og:url" itemprop="url" content="<?php echo site_url(LocDau($baivietfb->title).'-'.$baivietfb->id.'.html'); ?>" />
        <meta property="og:title" content="<?php echo $baivietfb->ten; ?>"/>
        <meta property="og:image" content="<?php echo base_url().$baivietfb->anh; ?>" />
        <?php
    }    
    ?>    
    <link href="css/style.css" rel="stylesheet" type="text/css" />    
    <link href="css/skin-ie7.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/jcarousel.responsive.css"/>
    <link rel="stylesheet" type="text/css" href="css/menu.css">                
    <link href="css/default.css" rel="stylesheet" type="text/css" />        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>  
    <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>    
    <script type="text/javascript" src="js/jcarousel.responsive.js"></script>    
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript"></script>
    <script src="js/zo2-uncompressed.js" type="text/javascript"></script>
    <script type="text/javascript">
         jQuery(document).ready(function(){
            jQuery("#mobile-button").click(function(){
                jQuery("#tat").toggle();
                if(jQuery("#tat").is(":hidden")){
                    jQuery("#tat").css('display','none');                            
                    jQuery(this).addClass('collapsed');
                }
                else
                {
                    jQuery("#tat").css('display','block');
                    jQuery(this).removeClass('collapsed');                            
                }        
            }); 
        });   
    </script>    
    <script type="text/javascript">
        $ZO2(document).ready(function() {
            /* Mega Menu script block */
                        var megas = $ZO2('div[class="menusub_mega"]');
            var _tmp  = Array();

            $ZO2.each(megas, function(key, item) {
                var id = $ZO2(item).attr('id').split("_");
                if(id[2] != null) {
                    var smart = "_" + id[1] + "_" + id[2];
                    if($ZO2.inArray(smart, _tmp)) {
                        $ZO2.merge(_tmp, Array(smart));
                        ZTMenu(smart, "megamenu_close", 'show',
                            '350',
                            'hide',
                            '350',
                            'ltr');
                    }
                }
            });

            /* Add/remove class hover when mouse enter/mouse leave */
            $ZO2.each($ZO2('ul#menusys_mega li'), function(i, item) {
                $ZO2(item).mouseenter(function() {
                    $ZO2(item).addClass('hover');
                }).mouseleave(function() {
                        $ZO2(item).removeClass('hover');
                    });
            });
            
            /* Fancy Menu script block */
            
            /* Accordion menu */
            $ZO2(document).ready(function() {
                $ZO2("#zo2-drilldown-menu").mtAccordionMenu({
                    accordion:true,
                    speed: 500,
                    closedSign: 'collapse',
                    openedSign: 'expand',
                    mouseType: 0,
                    easing: 'easeInOutBack'
                });
            });

        });
    </script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script>
        jQuery(document).ready(function($) {
            var owl = jQuery('.owl-carousel'); // save reference to variable
            owl.owlCarousel({
              items:1,
              nav:true,
              loop:true,
              autoplay:true,
              autoplayTimeout:3000,
              autoplayHoverPause:true
            });
        });
    </script>                      
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.jcarousel.min1.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {  
            jQuery('.jcarousel-skin-ie7').jcarousel({
                 auto:0,
               scroll:1,
               animation:'slow',
                wrap: 'circular',
                animation:2000,       
            });                                                
        });                      
    </script>   
    <script type="text/javascript" src="js/bootstrap.min.js"></script>   				                       
    <?php 
        $magoogleantic=$this->db->get('tblthongtincongty')->row();        
        echo $magoogleantic->googleantic;
    ?>
    <script type="text/javascript">
        function addorder(idc,priceCard){
            jQuery.ajax({
                cache: false,
                type:"POST",
                    url:"<?php echo site_url('sanpham/addorder_pro/');?>",
                    data: {idc : idc,priceCard : priceCard},
                    success:function(html){
                        alert("Sản phẩm đã thêm vào giỏ hàng");
                        window.location.reload();
                    }
            });                             
        }   
    </script>                
</head>
<body>
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="bg_top">
        <div class="container wrapper" id="top">
            <?php $this->load->view('includes/top'); ?>
        </div>
    </div>
    <!-- <div id="header_mb">
        <?php $this->load->view('includes/header_mb') ?>        
    </div> -->
    <div id="bg_header">
        <div class="container wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                    
                    <div id="header">
                        <?php $this->load->view('includes/header') ?>
                    </div><!--End #header-->
                </div>
            </div>
        </div>
    </div>    
    <div class="container wrapper">        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="slider_tru">
                <?php $this->load->view('includes/slider') ?>    
            </div>            
        </div>        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="main_content">
                <?php $this->load->view($main_content) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php 
                    $this->db->where('status',0);
                    $this->db->order_by('ordernum','desc');
                    $this->db->order_by('id','desc');
                    $sqldoitac=$this->db->get('tbldoitac');
                    if($sqldoitac->num_rows()>0)
                    {
                    ?>
                    <div id="doitac">
                        <div class="jcarousel-wrapper">
                            <div class="jcarousela2">
                                <ul>
                                    <?php 
                                        foreach ($sqldoitac->result() as $itemdoitac) 
                                        {
                                        ?>
                                        <li><a href="<?php echo $itemdoitac->link; ?>" target="_blank" title="<?php echo $itemdoitac->title; ?>"><img alt="<?php echo $itemdoitac->title; ?>" title="<?php echo $itemdoitac->title; ?>" src="<?php echo $itemdoitac->anh; ?>"></a></li>
                                        <?php
                                        }
                                        $sqldoitac->free_result();
                                    ?>                                                                    
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-preva2"><img src="images/prevd.png"></a>
                            <a href="#" class="jcarousel-control-nexta2"><img src="images/nextvd.png"></a>
                        </div>
                    </div>
                    <?php 
                    }
                ?>
            </div>    
        </div>        
    </div>              
    <?php $this->load->view('includes/footer') ?>                            
</body>
</html>