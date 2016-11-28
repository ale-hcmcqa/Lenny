<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Thông tin phản hồi</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="ttphanhoi">
            <table>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Nhà tuyển dụng</th>
                    <th>Ngày gửi</th>    
                </tr>
                <?php 
                    if(isset($_SESSION['username1']))
                    {
                        $this->db->where('emailuv',$_SESSION['username1']);
                        $usertuv=$this->db->get('tblungvien')->row();
                    }
                    $this->db->where('emailuv',$usertuv->id);
                    $sqlphanhoi=$this->db->get('tblphanhoi');
                    foreach($sqlphanhoi->result() as $itemphanhoi)
                    {
                ?>
                <tr>
                    <td><?php echo $itemphanhoi->chude; ?></td>
                    <td><?php echo $itemphanhoi->noidung; ?></td>
                    <td>
                        <?php 
                            $this->db->where('id',$itemphanhoi->email);
                            $sqlnhatph=$this->db->get('tblnhatuyendung')->row();
                        ?>
                        
                            <a href="<?php echo site_url('site/nhatuyendungchitiet/'.$sqlnhatph->id); ?>"><?php echo $sqlnhatph->tencongty;?></a> 
                        <?php    
                        ?>
                    </td>
                    <td>
                        <?php
                            $dategaygui=explode('-',$itemphanhoi->ngaygui); 
                            echo $dategaygui[2].'-'.$dategaygui[1].'-'.$dategaygui[0]; 
                        ?>
                    </td>
                </tr>
                <?php 
                    }
                ?>
            </table>
        </div>
    </div>
</div>    