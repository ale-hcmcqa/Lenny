<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Hồ sơ công việc của bạn</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="hoso">
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề hồ sơ</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php 
                    if($query->num_rows() >0)
                    {
                        $hoso=1;
                        foreach($query->result() as $itemhoso)
                        {
                            ?>
                            <tr>
                                <td><?php echo $hoso; ?></td>
                                <td><?php echo $itemhoso->tieude; ?></td>
                                <td style="width:20px;"><a href="<?php echo site_url('thanhvien/edithoso/'.$itemhoso->id); ?>"><img src="images/Edit.png" /></a></td>
                                <td style="width:20px;"><a onclick="return confirm('Bạn có muốn xóa thật không ?');" href="<?php echo site_url('thanhvien/deletehoso/'.$itemhoso->id.'/'.url_title($itemhoso->tieude)); ?>"><img src="images/Delete.png" /></a></td>
                            </tr>
                            <?php
                            $hoso++;  
                        }
                ?>                    
                <?php 
                }
                ?>
                <tr>
                    <td colspan="4">
                        <?php echo $pagination; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>    