<script>
        $(function() {
            $( "#ngaynhanphongdhl" ).datepicker({
            numberOfMonths:2,
            showButtonPanel: true,
            dateFormat: 'dd-mm-yy',
            closeText: 'Đóng',

						prevText: '&#x3c;Trước',

						nextText: 'Tiếp&#x3e;',

						currentText: 'Hôm nay',

						monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

						'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

						monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

						'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

						dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

						dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						weekHeader: 'Tu',

						dateFormat: 'dd-mm-yy',

						firstDay: 0,

						isRTL: false,

						showMonthAfterYear: false,

						yearSuffix: ''
        });                            
    });
</script>
<script>
$(function() {
            $( "#ngaytraphongdhl" ).datepicker({
            numberOfMonths:2,
            showButtonPanel: true,
            dateFormat: 'dd-mm-yy',
            closeText: 'Đóng',

						prevText: '&#x3c;Trước',

						nextText: 'Tiếp&#x3e;',

						currentText: 'Hôm nay',

						monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

						'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],

						monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

						'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],

						dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

						dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

						weekHeader: 'Tu',

						dateFormat: 'dd-mm-yy',

						firstDay: 0,

						isRTL: false,

						showMonthAfterYear: false,

						yearSuffix: ''
        });                            
    });
</script>
<div id="new_left">
    <div class="box_left">
        <div class="box_left_top">
            <p>Tìm kiếm</p>
        </div>
        <div class="box_left_main">
            <form name="frmsearchl" method="post" action="<?php echo site_url('site/searchphong'); ?>">
                <table id="timkiemle">
                    <tr>
                        <th>Tên</th>
                    </tr>
                    <tr>
                        <td><input style="background:none !important;" type="text" name="ten" value="" /></td>
                    </tr>
                    <tr>
                        <th>Ngày nhận phòng</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="ngaynhanphongdhl" name="ngaynhanphong" value="" /></td>
                    </tr>
                    <tr>
                        <th>Ngày trả phòng</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="ngaytraphongdhl" name="ngaytraphong" value="" /></td>
                    </tr>
                    <tr>
                        <th>Số người</th>
                    </tr>
                    <tr>
                        <td><input style="background:none !important;" type="text" name="songuoi" value="" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Tìm kiếm" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>    
    <div class="box_left">
        <div class="box_left_top">
            <p>Phòng yêu thích</p>
        </div>
        <div class="box_left_main">
            <?php 
                $this->db->where('status',0);
                $this->db->where('yeuthich >',0);
                $this->db->order_by('ordernum','desc');
                $this->db->order_by('id','desc');
                $sqlyeuthich=$this->db->get('tblphong');
                if($sqlyeuthich->num_rows()>0)
                {
                    foreach($sqlyeuthich->result() as $itemyeuthich)
                    {
                    ?>
                    <div class="phong_l_item">
                        <a href="<?php echo site_url(LocDau($itemyeuthich->ten).'-p'.$itemyeuthich->id.'.html'); ?>" class="phong_l_item_img" title="<?php echo $itemyeuthich->ten; ?>"><img src="<?php echo $itemyeuthich->anh_thumb; ?>" title="<?php echo $itemyeuthich->ten; ?>" alt="<?php echo $itemyeuthich->ten; ?>" /></a>
                        <div class="phong_l_item_nd">
                            <a href="<?php echo site_url(LocDau($itemyeuthich->ten).'-p'.$itemyeuthich->id.'.html'); ?>" class="phong_l_item_name"><?php echo $itemyeuthich->ten; ?></a>
                            <div class="phong_l_item_sao">
                                <?php 
                                    if($itemyeuthich->sosao==1)
                                    {
                                        echo '<p class="sao"></p>';    
                                    }
                                    elseif($itemyeuthich->sosao==2)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';    
                                    }
                                    elseif($itemyeuthich->sosao==3)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                    elseif($itemyeuthich->sosao==4)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                    elseif($itemyeuthich->sosao==5)
                                    {
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                        echo '<p class="sao"></p>';
                                    }
                                ?>
                            </div>
                            <div class="clear"></div>
                            <p class="phong_l_item_gia">Giá:&nbsp;<span><?php echo number_format($itemyeuthich->gia,0,'.','.').'&nbsp;'.$itemyeuthich->donvitinh; ?></span></span></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php    
                    }
                    $sqlyeuthich->free_result();
                }
            ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="box_left">
        <div class="box_left_top">
            <p>Tại sao chọn Thảo Minh</p>
        </div>
        <div class="box_left_main">
            <div class="taisao_l">
                <?php 
                    $taisaol=$this->db->get('tblthongtincongty')->row();
                    echo $taisaol->taisao;
                ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="new_right">
    <div class="box_left"> 
        <div class="box_left_top">
            <p>Danh sách phòng</p>
        </div>
        <div class="box_left_main">
            <table id="dathang_list">
                <tr>
                    <th>Tên phòng</th>
                    <th>Tối đa</th>
                    <th>Giá 1 đêm</th>
                    <th>Đặt phòng</th>
                </tr>
                <?php 
                        if($query->num_rows()>0)
                        {
                            foreach($query->result() as $itemquery)
                            {
                            ?>
                <tr>
                    
                            <td width="35%">
                                <a style="float: left;margin-right:10px;" href="<?php echo site_url(LocDau($itemquery->ten).'-p'.$itemquery->id.'.html'); ?>"><?php echo $itemquery->ten; ?></a>
                                <div id="phongnghi_sao">
                                    <?php
                                        for($i=1;$i<=$itemquery->sosao;$i++)
                                        {                                         
                                           echo '<p class="sao"></p>';                                                           
                                        }                                 
                                    ?>                                    
                                </div>                                
                                </td>
                            <td>
                            
                            <?php 
                            for($k=1;$k<=$itemquery->soluong;$k++)
                            {
                            ?>
                                <p class="person"></p>
                            <?php    
                            }                            
                            ?> 
                            <div class="clear"></div>
                            (<?php 
                            if($itemquery->soluong>0)
                            {
                                echo $itemquery->soluong.'&nbsp;người'; 
                            }
                            ?> 
                            )                                                                                     
                            </td>
                            <td><?php 
                            if($itemquery->gia==0)
                            {
                                echo 'Liên hệ';
                            }
                            else
                            {
                                echo number_format($itemquery->gia,0,'.','.').'&nbsp;'.$itemquery->donvitinh;
                            }
                            ?>
                            </td>
                            <td><div class="order_list"><a href="<?php echo site_url(LocDau($itemquery->ten).'-dh'.$itemquery->id.'.html'); ?>">Đặt phòng</a></div></td>
                           
                </tr>
                 <?php
                            } 
                        }
                    ?>
                <tr>
                    <td colspan="4"><?php echo $pagination; ?></td>
                </tr>
            </table>
        </div>
    </div>    
    <div class="clear"></div>
</div>