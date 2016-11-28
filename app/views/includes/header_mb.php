<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$header_cty_mb=$CI->site_model->gettablename('tblthongtincongty','tencongty,logo','');
$danhmucspmb=$CI->site_model->gettablename_all('tbldanhmucsanpham','id,danhmucsanpham,ordernum,status','','','');
?>
<div id="logo_mb">
	<a href="<?php echo base_url(); ?>" title="<?php echo $header_cty_mb->tencongty; ?>"><img title="<?php echo $header_cty_mb->tencongty; ?>" alt="<?php echo $header_cty_mb->tencongty; ?>" src="<?php echo $header_cty_mb->logo; ?>"></a>
</div>
<div id="giohang_mb">
 <p><a href="<?php echo site_url('sanpham/giohang'); ?>">Giỏ hàng</a>&nbsp;<span>(
        <?php 
            if(isset($_SESSION['sanpham']))
            {
                if($_SESSION['sanpham']!='')
                {
                    $str=$_SESSION['sanpham'];                    
                    $num=explode(",",$str);
                    $html=count($num);
                    $itemr=explode("-",$rowr);
                    echo $html;
                }
                else
                {
                    echo '0';
                }
            }
            else
            {
                echo '0';
            }
        ?>)        
    </span></p>
</div>
<div class="clearfix"></div>
<div id="menu_mb" style="position: relative;z-index:10000;">
	<div id="zt-mainmenu">
		<div class="zt-navigation hidden-desktop">
            <div id="search1">
                <form name="frmsearch2" method="POST" action="<?php echo site_url('site/search'); ?>">                            
                    <select name="danhmuc">
                        <option value="0">--ALL--</option>
                        <?php 
                            $this->db->where('status',0);
                            $this->db->order_by('ordernum','desc');
                            $this->db->order_by('id','desc');
                            $sqldanhmucsptkmb=$this->db->get('tbldanhmucsanpham');
                            if($sqldanhmucsptkmb->num_rows()>0)
                            {
                                foreach ($sqldanhmucsptkmb->result() as $itemdanhmucsptkmb) 
                                {
                                ?>
                                <option value="<?php echo $itemdanhmucsptkmb->id; ?>"><?php echo $itemdanhmucsptkmb->danhmucsanpham; ?></option>
                                <?php
                                }
                                $sqldanhmucsptkmb->free_result();
                            }
                        ?>
                    </select>
                    <input type="text" name="ten" value="" />
                    <input type="submit" name="submit" value="" />                          
                </form>
                <div class="clear"></div>
            </div>       
            <a class="btn-navbar hidden-desktop collapsed" id="mobile-button"></a>                    
        </div>
        <div class="zt-drillmenu-inner hidden-desktop" id="tat" style="display: none;">
        	<div class="navbar">
        		<div class="menusys_drill collapse">
                    <?php 
                        if($danhmucspmb->num_rows()>0) 
                        {   
                        ?>
            			<ul id="zo2-drilldown-menu" class="nav-drilldown"> 
                            <?php 
                                foreach ($danhmucspmb->result() as $itemdanhmucspmb) 
                                {
                                ?>
                                <li><a href="<?php echo site_url(LocDau($itemdanhmucspmb->danhmucsanpham).'-dm'.$itemdanhmucspmb->id.'.html'); ?>" title="<?php echo $itemdanhmucspmb->danhmucsanpham; ?>"><span class="menusys_name"><?php echo $itemdanhmucspmb->danhmucsanpham; ?></span></a>
                                    <?php 
                                        $this->db->where('status',0);
                                        $this->db->where('danhmucsanpham',$itemdanhmucspmb->id);
                                        $this->db->order_by('ordernum','desc');
                                        $this->db->order_by('id','desc');
                                        $danhmucspmbcap=$this->db->get('tbldanhmucsanpham2');
                                        if($danhmucspmbcap->num_rows()>0)
                                        {
                                            ?>
                                            <ul>
                                            <?php
                                            foreach ($danhmucspmbcap->result() as $itemdanhmucspmbcap) 
                                            {
                                            ?>
                                            <li><a href="<?php echo site_url(BoDau($itemdanhmucspmbcap->danhmucsanphamcap2).'-dm2'.$itemdanhmucspmbcap->id.'.html'); ?>" title="<?php echo $itemdanhmucspmbcap->danhmucsanphamcap2; ?>"><?php echo $itemdanhmucspmbcap->danhmucsanphamcap2; ?></a></li>
                                            <?php
                                            }
                                            $danhmucspmbcap->free_result();
                                            ?>
                                            </ul>
                                            <?php
                                        }
                                    ?>
                                </li>
                                <?php
                                }
                                $danhmucspmb->free_result();
                            ?>       				                            
            			</ul>
                        <?php 
                        }
                    ?>
        		</div>
        	</div>
        </div>
	</div>
</div>