<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="<?php echo base_url();?>" />
    <meta http-equiv="Hp Backend Manager" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Powerful backend interface" />
    <meta name="author" content="Tanlcfe" />
    <title>HPBackend Manager by hpsoft</title>
    <link rel="shortcut icon" href="assets/logo_icon.png" />
    <!-- Libraries -->
    <link type="text/css" href="css/hpbackend.css" rel="stylesheet" />         
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <?php 
        if(isset($checkem))
        {
        ?>
        <script type="text/javascript" src="js/hpbackend_library.js"></script>
        <?php    
        }
        else
        {
        ?>
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <?php    
        }
    ?>                               
    <script type="text/javascript" src="js/hpbackend.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script> 
    <link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="css/lay1out.css" />
<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript" src="js/eye.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>       
</head>
<body>
<!-- Container -->
<div id="container"> 
  <!-- Header -->
  <div id="header"> 
    <!-- Top -->
    <?php $this->load->view('header')?>
    <!-- End of Top--> 
    <!-- The navigation bar -->
    <?php $this->load->view('navmenu')?>
    <!-- End of navigation bar" -->     
  </div>
  <!-- End of Header --> 
  <!-- Background wrapper -->
  <div id="bgwrap"> 
    <!-- Main Content -->
    <div id="content">
      <?php 
	  if(isset($AdminChangeInfor))
	  {
		 $this->load->view('changeinfor');
	  }
	  elseif(isset($file_manager))
	  {
		 $this->load->view('filemanager');
	  }


		elseif(isset($addlistsim))

	  {

		  $this->load->view('addlistsim');

	  }
		elseif(isset($themdiem))

	  {

		  $this->load->view('themdiem');

	  }
	  else

	  {

	  	$this->load->view('maincontent');
	  }
	  ?>
    </div>
    <!-- End of Main Content --> 
    <!-- Left Panel -->
    <?php $this->load->view('leftpanel');?>
    <!-- End of Left Panel --> 
  </div>
  <!-- End of bgwrap --> 
</div>
<!-- End of Container --> 
<!-- Footer -->
<?php $this->load->view('footer');?>
<!-- End of Footer -->
</body>
</html>