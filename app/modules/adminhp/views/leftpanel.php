<div id="sidebar">
<?php
if(isset($action2))
{
    echo 'ád';
}
?>
<h2>Danh Mục Quản Lý</h2>
<!-- Accordion -->
<div class="sort">
<?php 
$listOfTableName=$table_list;
$demleft=1;
//if($sqlcheckrole->num_rows()==1)
//{     
foreach($table_list as $item)
{
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#left_cat<?php echo $demleft; ?>").click(function(){
                jQuery("#left_content<?php echo $demleft; ?>").toggle();
                if(jQuery("#left_content<?php echo $demleft; ?>").is(":hidden"))
                {
                    jQuery("#left_content<?php echo $demleft; ?>").css('display','none');
                    jQuery(this).addClass('collapsed');    
                }
                else
                {
                    jQuery("#left_content<?php echo $demleft; ?>").css('display','block');                    
                    jQuery(this).removeClass('collapsed');  
                }     
            });
        });
    </script>    
    <div class="left_tung" style="margin-bottom:15px;">
    <?php
    $this->db->where('username',$_SESSION['username']);
    $sqlroleuser=$this->db->get('tbladmin')->row();    
    $userole_tact=explode(',',$sqlroleuser->role);
    $demleft2=0;
    foreach($userole_tact as $userole_tact)
    {        
        $userole_tact2=explode('.',$userole_tact);                                            
        foreach($userole_tact2 as $ki=>$vi)
        {              
            if($item==$vi)
            {
            ?>
            <div class="portlet-header-tung" id="left_cat<?php echo $demleft;?>"><strong><?php echo $item; ?></strong></div>
            <?php             
            }                                          
        }
        $demleft2++;        
    }    
    ?>    
    <?php        
    if(isset($table_name))
    {
        if(key($listOfTableName)==$table_name)
        {
            echo '<div class="portlet-content" id="left_content'.$demleft.'" style="display:none;">';
        }
        else
        {
            echo '<div class="portlet-content" id="left_content'.$demleft.'" style="display:none;">';
        }
    }
    else
    {
        echo '<div class="portlet-content" id="left_content'.$demleft.'" style="display:none;">';
    }
    echo '<ul>';            
        if($item=='Thông tin liên hệ' || $item=='Thông tin công ty' || $item=='Thông tin Seo' || $item=='Thông tin đặt hàng' || $item=='Liên hệ tư vấn')
        {
        }  
        else
        {      
            echo '<li><a class="tooltip" title="Nhập dữ liệu" href="'.site_url().'adminhp/addContent/'.key($listOfTableName).'">Thêm mới</a></li>';
        }
        echo  ' <li><a class="tooltip" title="Xem, Sửa, Xóa..." href="'.site_url().'adminhp/viewContent/'.key($listOfTableName).'">Danh sách</a></li>';               
    echo '
    </ul>
</div>
</div>';
next($listOfTableName);
$demleft++;
}
?>
</div>
<h2>Lịch</h2>
<!-- Datepicker -->
<div id="datepickerf"></div>
<!-- End of Datepicker -->
<p>&nbsp;</p>
</div>
<!-- End of Accordion-->
<!-- Statistics -->
<!--<h2>Thống kê</h2>
<p><b>Bài viết:</b> 2201</p>
<p><b>Tài khoản:</b> 3788</p>-->
<!-- End of Statistics -->	