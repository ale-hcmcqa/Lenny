 <?PHP
        $this->db->where('status',0);
		$this->db->order_by('ordernum','desc');
		$this->db->order_by('id','desc');
		$cate=$this->db->get('tbldanhmucsanpham');
		if($cate->num_rows()>0)
		{
			$dem=1;
			foreach($cate->result() as $cate1)
			{
				//kiem tra co sp ko
				$this->db->where('hang',$idhang);
				$this->db->where('danhmuc',$cate1->id);
				$sp=$this->db->get('tblsanpham');
				if($sp->num_rows()>0)
				{
				//kiem tra co sp ko
				if($dem==1)
				{
		?>
        <!--b-box-->
        <h2 class="title_list_cate" style="padding-left:15px;"><a href="#"><?PHP echo $cate1->danhmuc?></a></h2>      
        <br />
        <!--content-box-->
        	<?PHP
             $this->db->where('status',0);
			$this->db->where('danhmuc',$cate1->id);
			$this->db->order_by('ordernum','desc');
			$this->db->order_by('id','desc');
			$this->db->limit(3);
			$cate2=$this->db->get('tbldanhmucsanpham2');
			if($cate2->num_rows()>0)
			{
				foreach($cate2->result() as $cate2)
				{
							
								//kiem tra co sp ko
								$this->db->where('hang',$idhang);
								$this->db->where('danhmucsanpham2',$cate2->id);
								$sp=$this->db->get('tblsanpham');
								if($sp->num_rows()>0)
								{
								//kiem tra co sp ko
			?>          
            	<div class="item_cate2">
                	<a href="#"><img src="<?php echo $cate2->anh_thumb?>" width="230" height="134" border="0" alt="<?php echo $cate2->danhmucsanpham2?>" /></a>
                    <a href="#" class="name_cate2"><?PHP echo $cate2->danhmucsanpham2?></a>
                    <br clear="all" />
                </div>               
            </div>
            <?PHP
								}
				}
			}?>
            <div style="clear:both"></div>
        <!--content-box--><br />
        <!--b-box-->
       <?PHP
				}
				else
				{?>
         <!--b-box-->
       <h2 class="title_list_cate" style="padding-left:15px;"><a href="#"><?PHP echo $cate1->danhmuc?></a></h2>
        <br />
        <!--content-box-->
        		<?PHP
				 $this->db->where('status',0);
				$this->db->where('danhmuc',$cate1->id);
				$this->db->order_by('ordernum','desc');
				$this->db->order_by('id','desc');
				$this->db->limit(4);
				$cate2=$this->db->get('tbldanhmucsanpham2');
				if($cate2->num_rows()>0)
				{
					foreach($cate2->result() as $cate2)
					{
							
								//kiem tra co sp ko
								$this->db->where('hang',$idhang);
								$this->db->where('danhmucsanpham2',$cate2->id);
								$sp=$this->db->get('tblsanpham');
								if($sp->num_rows()>0)
								{
								//kiem tra co sp ko
				?>
				<div class="cate2_s item_cate2 ">
					<a href="#"><img src="<?PHP echo $cate2->anh_thumb?>" width="167" height="131" border="0" alt="<?PHP echo $cate2->danhmucsanpham2?>" /></a>
					<a href="#" class="name_cate2"><?PHP echo $cate2->danhmucsanpham2?></a>
					<br clear="all" />
				</div>
				<?PHP
								}
					}
				}?>
            	<div style="clear:both"></div><br />
                <?PHP
				}
				
				}
				$dem++;
			}
		}?>
        <!--content-box-->        
        <div style="clear:both"></div>
