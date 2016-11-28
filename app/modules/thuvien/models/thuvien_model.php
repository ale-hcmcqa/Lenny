<?php 
class thuvien_model extends Model
{
	function thuvien_model()
	{
		parent::Model();
	}
	function gethinhanhhoatdong()
	{
		$this->db->where('status',0);        
		$sqltv = $this->db->get('tblhinhanhhoatdong');
		return $sqltv;
	}
	function gethinhanhhoatdong_limited($limit,$start_row)
	{
		$this->db->where('status',0);        
		$this->db->limit($limit,$start_row);
		$sqltv=$this->db->get('tblhinhanhhoatdong');
		return $sqltv;
	}
    function getthuvien()
	{
		$this->db->where('status',0);
		$sqltv = $this->db->get('tbldanhmucalbum');
		return $sqltv;
	}
	function getthuvien_limited($limit,$start_row)
	{
		$this->db->where('status',0);
		$this->db->limit($limit,$start_row);
		$sqltv=$this->db->get('tbldanhmucalbum');
		return $sqltv;
	}
    function gethinhanhalbum($id)
    {               
        $this->db->where('sanpham',$id);
        $this->db->order_by('id','desc');        
        $sqlanhalbum=$this->db->get('anh');
        return $sqlanhalbum;
    }
    function gethinhanhalbum_limited($id,$limit,$start_row)
	{        
        $this->db->where('sanpham',$id);       
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlanhalbum=$this->db->get('anh');
        return $sqlanhalbum;
	}
    function getvideo()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqlvd = $this->db->get('tblvideo');
		return $sqlvd;    
    }
    function getvideo_limited($limit,$start_row)
	{
		$this->db->where('status',0);
		$this->db->limit($limit,$start_row);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqltv=$this->db->get('tblvideo');
		return $sqltv;
	}
    function gettailieu()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqltl = $this->db->get('tbltailieu');
		return $sqltl;       
    }
    function gettailieu_limited($limit,$start_row)
    {
        $this->db->where('status',0);
		$this->db->limit($limit,$start_row);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqltl=$this->db->get('tbltailieu');
		return $sqltl;    
    }
    function getnhac()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqltl = $this->db->get('tblnhac');
		return $sqltl;       
    }
    function getnhac_limited($limit,$start_row)
    {
        $this->db->where('status',0);
		$this->db->limit($limit,$start_row);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqltl=$this->db->get('tblnhac');
		return $sqltl;    
    }
}
?>