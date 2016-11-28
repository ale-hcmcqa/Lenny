<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Công việc đã lưu</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="listtindang">            
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>  
                    <th>Ngày đăng</th>                                      
                    <th>Xóa</th>
                </tr>
                <?php                     
                    if($hoso->num_rows() >0)
                    {
                        $hosol=1;
                        foreach($hoso->result() as $itemhoso)
                        {                            
                        ?>
                        <tr>
                            <td><?php echo $hosol; ?></td>
                            <td>
                                <?php 
                                    $this->db->where('id',$itemhoso->title);
                                    $title=$this->db->get('tbltintuyendung')->row();
                                    ?>
                                    <a href="<?php echo site_url(url_sp($title->id)); ?>"><?php echo $title->title;?></a>                                    
                                    <?php 
                                ?>
                            </td>  
                            <td>
                            <?php
                                $dataluu=explode('-',$itemhoso->ngayluu);
                                echo $dataluu[2].'-'.$dataluu[1].'-'.$dataluu[0];  
                            ?>
                            </td>                                                                                                              
                            <td><a onclick="return confirm('Bạn có muốn xóa thật không ?');" href="<?php echo site_url('thanhvien/deleteluu/'.$itemhoso->id); ?>"><img src="images/Delete.png" width="16px" height="16px" /></a></td>
                        </tr>
                        <?php                             
                        $hosol++;  
                        }                        
                    }
                ?>                
            </table>
            <br />
            <?php echo $pagination; ?>
        </div>
    </div>
</div>    