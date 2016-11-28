<?php 
class sanpham_model extends Model
{
    function sanpham_model()
    {
        parent::Model();
    }
    function getlocsanpham($id)
    {
        $this->db->where('id',$id);
        $sqlgiakhoang=$this->db->get('tblkhoanggia')->row();
        $this->db->where('status',0);
        $this->db->where('gia >',$sqlgiakhoang->giatu);
        $this->db->where('gia <',$sqlgiakhoang->giaden);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sqlsploc=$this->db->get('tblsanpham');
        return $sqlsploc;
    }
    function getlocsanpham_limited($id,$limit,$start_row)
    {
        $this->db->where('id',$id);
        $sqlgiakhoang=$this->db->get('tblkhoanggia')->row();
        $this->db->where('status',0);
        $this->db->where('gia >',$sqlgiakhoang->giatu);
        $this->db->where('gia <',$sqlgiakhoang->giaden);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlsploc=$this->db->get('tblsanpham');
        return $sqlsploc;     
    }
    function getsanphambyid($id)
    {
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $sqlsanpham = $this->db->get('tblsanpham');
        return $sqlsanpham->row();
    }
    function getphukienbyid($id)
    {
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $sql = $this->db->get('tblphukien');
        return $sql->row();
    }
    function num_view($id)
    {
        $this->db->where('id',$id);
        $sp = $this->db->get('tblsanpham');
        $sp = $sp->row();
        $sp = $sp->view + 1;
        $data = array(
            'view'  =>$sp            
        );
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $this->db->update('tblsanpham',$data);
    }
    function timkiem($danhmuc1,$hang,$giatu,$giaden)
    {
        $this->db->where('status',0);
        if($danhmuc1!=0)
        {
            $this->db->where('danhmucsanpham',$danhmuc1);
        }
        if($hang!=0)
        {
            $this->db->where('hangsx',$hang);
        }
        if($giatu!=0&&$giaden!=0)
        {
            $this->db->where('gia >',$giatu);
            $this->db->where('gia <',$giaden);
        }
        elseif($giatu!=0)
        {
            $this->db->where('gia >',$giatu);
        }
        elseif($giaden!=0)
        {
            $this->db->where('gia <',$giaden);
        }
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $query=$this->db->get('tblsanpham');
        return $query;
    }
    function timkiem_limited($danhmuc1,$hang,$giatu,$giaden,$start_row,$limit)
	{
		$this->db->where('status','0');
		
		if($danhmuc1!=0)
		{
			$this->db->where('danhmucsanpham',$danhmuc1);
		}
		if($hang!=0)
		{
			$this->db->where('hangsx',$hang);
		}
		if($giatu!=0&&$giaden!=0)
		{
			$this->db->where('gia >',$giatu);
			$this->db->where('gia <',$giaden);
		}
		elseif($giatu!=0)
		{
			
			$this->db->where('gia >',$giatu);
		}
		elseif($giaden!=0)
		{
			
			$this->db->where('gia <',$giaden);
		}
		$this->db->order_by('ordernum','desc');
		$this->db->order_by('id','desc');
		$this->db->limit($limit,$start_row);		
	    $query=$this->db->get('tblsanpham');
        return $query;	  
	}
    function getmonan()
    {        
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sqlsp = $this->db->get('tblsanpham');
        return $sqlsp;
    }
    function getmonan_limited($limit,$start_row)
    {       
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlsp = $this->db->get('tblsanpham');
        return $sqlsp;
    }
    function getsanpham()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqlsp = $this->db->get('tblsanpham');
		return $sqlsp;
    }
    function getsanpham_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlsp = $this->db->get('tblsanpham');
		return $sqlsp;
    }
     function getphukien()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sqlsp = $this->db->get('tblphukien');
        return $sqlsp;
    }
    function getphukien_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlsp = $this->db->get('tblphukien');
        return $sqlsp;
    }
    function getsanphamkm()
    {
        $this->db->where('status',0);
        $this->db->where('giakm !=',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $sqlspnb = $this->db->get('tblsanpham');
        return $sqlspnb;
    }
    function getsanphamkm_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->where('giakm !=',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlspnb = $this->db->get('tblsanpham');
        return $sqlspnb;
    }
    function getsanphamnb()
    {
        $this->db->where('status',0);
        $this->db->where('banchay',1);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqlspnb = $this->db->get('tblsanpham');
		return $sqlspnb;
    }
    function getsanphamnb_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->where('banchay',1);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlspnb = $this->db->get('tblsanpham');
		return $sqlspnb;
    }
    function getdanhmucsanpham($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucsanpham',$id);
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getdanhmucsanpham_limited($id,$start_row,$limit)
	{
	  $sql="select * from tblsanpham where status='0' and  danhmucsanpham='$id' order by ordernum asc,id desc limit  $start_row,$limit";
	  $sqldm1=$this->db->query($sql);
	  return $sqldm1;	  
	}
    function getlocmausac($id)
    {
        //$this->db->where('status',0);
        $this->db->where('tenmau',$id);
        $sql1 = $this->db->get('anh');
        return $sql1;    
    }
    function getlocmausac_limited($id,$start_row,$limit)
    {
        $sql="select * from anh where tenmau=$id order by id desc limit $start_row,$limit";
      $sql1=$this->db->query($sql);
      //var_dump($sql);
      return $sql1;     
    }
    function getdanhmucphukien($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucphukien',$id);
        $sqldm1 = $this->db->get('tblphukien');
        return $sqldm1;
    }
    function getdanhmucphukien_limited($id,$start_row,$limit)
    {
      $sql="select * from tblphukien where status='0' and  danhmucphukien='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function gethangkm($id)
    {
        $this->db->where('status',0);
        $this->db->where('khuyenmai',1);
        $this->db->where('hang',$id);
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function gethangkm_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and khuyenmai='1' and hang='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getphongcach($id)
    {
        $this->db->where('status',0);
        $this->db->where('phongcach',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getphongcach_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and phongcach='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getkieudang($id)
    {
        $this->db->where('status',0);
        $this->db->where('kieudang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getkieudang_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and kieudang='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getchucnang($id)
    {
        $this->db->where('status',0);
        $this->db->like('chucnang',$id);     
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getchucnang_limited($id,$limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->like('chucnang',$id);
        $this->db->limit($limit,$start_row);     
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;    
    }
    function getsapxepgiamdankm($id)
    {
        $this->db->where('status',0);
        $this->db->where('khuyenmai',1);
        $this->db->order_by('gia','desc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxepgiamdankm_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and khuyenmai='1' and hang='$id' order by gia desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxeptangdankm($id)
    {
        $this->db->where('status',0);
        $this->db->where('khuyenmai',1);
        $this->db->order_by('gia','asc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxeptangdankm_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and khuyenmai='1' and hang='$id' order by gia asc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }    
    function getsapxepgiamdanpt($id)
    {
        $this->db->where('status',0);
        $this->db->where('phothong',1);
        $this->db->order_by('gia','desc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxepgiamdanpt_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and phothong='1' and hang='$id' order by gia desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxeptangdanpt($id)
    {
        $this->db->where('status',0);
        $this->db->where('phothong',1);
        $this->db->order_by('gia','asc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxeptangdanpt_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and phothong='1' and hang='$id' order by gia asc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxepgiamdancc($id)
    {
        $this->db->where('status',0);
        $this->db->where('caocap',1);
        $this->db->order_by('gia','desc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxepgiamdancc_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and caocap='1' and hang='$id' order by gia desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxeptangdancc($id)
    {
        $this->db->where('status',0);
        $this->db->where('caocap',1);
        $this->db->order_by('gia','asc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxeptangdancc_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and caocap='1' and hang='$id' order by gia asc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxepgiamdanh($id)
    {
        $this->db->where('status',0);
        $this->db->order_by('gia','desc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxepgiamdanh_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and hang='$id' order by gia desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxeptangdanh($id)
    {
        $this->db->where('status',0);
        $this->db->order_by('gia','asc');
        $this->db->where('hang',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxeptangdanh_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and hang='$id' order by gia asc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxepgiamdan($id)
    {
        $this->db->where('status',0);
        $this->db->order_by('gia','desc');
        $this->db->where('danhmucsanpham',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxepgiamdan_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and danhmucsanpham='$id' order by gia desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getsapxeptangdan($id)
    {
        $this->db->where('status',0);
        $this->db->order_by('gia','asc');
        $this->db->where('danhmucsanpham',$id);        
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function getsapxeptangdan_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and danhmucsanpham='$id' order by gia asc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function gethangpt($id)
    {
        $this->db->where('status',0);
        $this->db->where('phothong',1);
        $this->db->where('hang',$id);
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function gethangpt_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and phothong='1' and hang='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function gethangcc($id)
    {
        $this->db->where('status',0);
        $this->db->where('caocap',1);
        $this->db->where('hang',$id);
        $sqldm1 = $this->db->get('tblsanpham');
        return $sqldm1;
    }
    function gethangcc_limited($id,$start_row,$limit)
    {
      $sql="select * from tblsanpham where status='0' and caocap='1' and hang='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getdanhmucphukiencap2($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucphukiencap2',$id);
        $sqldm1 = $this->db->get('tblphukien');
        return $sqldm1;
    }
    function getdanhmucphukiencap2_limited($id,$start_row,$limit)
    {
      $sql="select * from tblphukien where status='0' and  danhmucphukiencap2='$id' order by ordernum desc,id desc limit  $start_row,$limit";
      $sqldm1=$this->db->query($sql);
      return $sqldm1;     
    }
    function getloaixe($id)
    {
        $this->db->where('status',0);
        $this->db->where('hang',$id);
        $sqlloaixe=$this->db->get('tblsanpham');
        return $sqlloaixe;
    }
    function getloaixe_limited($id,$start_row,$limit)
    {
        $sql="select * from tblsanpham where status='0' and  hang='$id' order by ordernum asc,id desc limit  $start_row,$limit";
	    $sqlloaixe=$this->db->query($sql);
	    return $sqlloaixe;	    
    }
    function getdanhmucsanpham2($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucsanphamcap2',$id);
        $sqldm2 = $this->db->get('tblsanpham');
        return $sqldm2;
    }
    function getdanhmucsanpham2_limited($id,$start_row,$limit)
	{
	  $sql="select * from tblsanpham where status='0' and  danhmucsanphamcap2='$id' order by ordernum desc,id desc limit  $start_row,$limit";
	  $sqldm2=$this->db->query($sql);
	  return $sqldm2;	  
	}
    function getdanhmucsanpham3($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucsanphamcap3',$id);
        $sqldm3 = $this->db->get('tblsanpham');
        return $sqldm3;
    }
    function getdanhmucsanpham3_limited($id,$start_row,$limit)
	{
	  $sql="select * from tblsanpham where status='0' and  danhmucsanphamcap3='$id' order by ordernum desc,id desc limit  $start_row,$limit";
	  $sqldm3=$this->db->query($sql);
	  return $sqldm3;	  
	}
}
?>