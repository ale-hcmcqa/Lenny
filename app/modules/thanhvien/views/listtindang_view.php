<div class="danhmuc_item">
   <div class="item_pro">        
        <div class="danhmuc_top">
            <h3 style="padding-left:20px !important;">Danh sách tin đăng</h3>
        </div>
    </div>
    <div class="danhmuc_main">
        <div id="listtindang">
            <?php 
                if(isset($_SESSION['username']))
                {
                    $this->db->where('email',$_SESSION['username']);
                    $list=$this->db->get('tblnhatuyendung')->row();
                }
            ?>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Ngành nghề</th>
                    <th>Bằng cấp</th>
                    <th>Trình độ </th>
                    <th>Kinh nghiệm</th>
                    <th>Lương</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php                     
                    if($query->num_rows() >0)
                    {
                        $listt=1;
                        foreach($query->result() as $itemlist)
                        {
                            //$ngayhomnay=date("Y-m-d");
                           // $ngayhethang=$itemlist->hannhanhoso;
                            //if(strtotime($ngayhethang) < strtotime($ngayhomnay))
                            //{
                        ?>
                        <tr>
                            <td><?php echo $listt; ?></td>
                            <td><?php echo $itemlist->title; ?></td>
                            <td>
                               <?php 
                                $this->db->where('id',$itemlist->nganhnghe);
                                $sqlnganhnghe=$this->db->get('tblnganhnghe')->row();
                                echo $sqlnganhnghe->nganhnghe;
                               ?> 
                            </td>
                            <td>
                               <?php 
                                $this->db->where('id',$itemlist->bangcap);
                                $sqlbangcap=$this->db->get('tblbangcap')->row();
                                echo $sqlbangcap->bangcap;
                               ?> 
                            </td>
                            <td>
                               <?php 
                                $this->db->where('id',$itemlist->trinhdo);
                                $sqltrinhdo=$this->db->get('tbltrinhdotienganh')->row();
                                echo $sqltrinhdo->trinhdo;
                               ?> 
                            </td>
                            <td>
                               <?php 
                                $this->db->where('id',$itemlist->kinhnghiem);
                                $sqlkinhnghiem=$this->db->get('tblkinhnghiem')->row();
                                echo $sqlkinhnghiem->kinhnghiem;
                               ?> 
                            </td>
                            <td>
                               <?php 
                                $this->db->where('id',$itemlist->luong);
                                $sqlluong=$this->db->get('tblluong')->row();
                                echo $sqlluong->luong;
                               ?> 
                            </td>
                            <td><a href="<?php echo site_url('thanhvien/edittintuyendung/'.$itemlist->id.'/'.url_title($itemlist->title)); ?>"><img src="images/Edit.png" width="16px" height="16px" /></a></td>
                            <td><a onclick="return confirm('Bạn có muốn xóa thật không ?');" href="<?php echo site_url('thanhvien/deletetintuyendung/'.$itemlist->id.'/'.url_title($itemlist->title)); ?>"><img src="images/Delete.png" width="16px" height="16px" /></a></td>
                        </tr>
                        <?php 
                        //} 
                        $listt++;  
                        }                        
                    }
                ?>                
            </table>
            <br />
            <?php echo $pagination; ?>
        </div>
    </div>
</div>    