<div class="row">
    <div class="col-lg-12 page_item">
        <div class="box_center_t">              
            <p><a class="cufont_cc" href="<?php echo site_url("hoi-dap.html"); ?>">Hỏi đáp</a></p>        
        </div>
        <div class="page_item_main">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                <li class="active">Trả lời câu hỏi</li>
            </ol>  
            <div id="traloi">
                <?php 
                    if(isset($id))
                    {
                        $this->db->where('id',$id);
                        $sqlhoidapct=$this->db->get('tblhoidap')->row();
                        ?>
                        <b><?php echo $sqlhoidapct->tomtat; ?></b>
                        <div id="traloi">
                            <p id="anwer">Trả lời:</p>
                            <div>
                                <?php echo $sqlhoidapct->noidung; ?>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>