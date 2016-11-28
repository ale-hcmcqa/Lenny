<?php
class site_model extends Model
{
    function site_model()
    {
        parent::Model();
    }    
    function gettablename($table_name,$data_select,$id)
    {
        if($id!='')
        {
            $this->db->where('id',$id);
        }  
        if($data_select!='')
        {      
            $this->db->select($data_select);
        }
        $sql=$this->db->get($table_name);
        return $sql->row();
    }  
    function getmabyid($ma)
    {
        $this->db->where('ma',$ma);
        $sqlcheckma=$this->db->get('tblorder');
        return $sqlcheckma->row();
    } 
    function iutablename($id,$table_name,$data)
    {
        if($id=='')
        {
            $this->db->insert($table_name,$data);
        }
        else
        {
            $this->db->where('id',$id);
            $this->db->update($table_name,$data);
        }
    } 
    function gettablename_all($table_name,$dataall_selct,$limit,$data_key,$data_value)
    {
        $this->db->where('status',0);        
        if($data_key!='' && $data_value!='')
        {
            $this->db->where($data_key,$data_value);
        }          
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        if($dataall_selct!='')
        {
            $this->db->select($dataall_selct);
        }
        if($limit!='')
        {
            $this->db->limit($limit);
        }
        $sqlall=$this->db->get($table_name);
        return $sqlall;
    } 
    function getdanhgia()
    {
        $this->db->where('status',0);        
		$sqlyk = $this->db->get('tblykienkhachhang');
		return $sqlyk;
    } 
    function getdanhgia_limited($limit,$start_row)
    {
        $this->db->where('status',0);  
        $this->db->limit($limit,$start_row);      
		$sqlyk = $this->db->get('tblykienkhachhang');
		return $sqlyk;     
    }
    function categoriesfa($id)
    {
        $this->db->where('status',0);
        $this->db->where('danhmucbaiviet',$id);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$query = $this->db->get('tbltintuc');
		return $query;		
    }
    function categoriesfa_limited($id,$limit,$start_row)
	{
	   $this->db->where('status',0);
       $this->db->where('danhmucbaiviet',$id);
       $this->db->order_by('ordernum','desc');
       $this->db->order_by('id','desc');
       $this->db->limit($limit,$start_row);
       $query = $this->db->get('tbltintuc');
	   return $query;
	  
	}
    function categoriesfa2($id)
    {
    $this->db->where('danhmucbaivietcap2',$id);
	$this->db->where('status','0');
	$this->db->order_by('ngaydang','desc');
	$this->db->order_by('ordernum','desc');
	$this->db->order_by('id','desc');
	$this->db->from('tbltintuc');
	$query=$this->db->get();
	return $query;
    }
    function categoriesfa2_limited($id,$start_row,$limit)
	{
	  $sql="select * from tbltintuc where status='0' and  danhmucbaivietcap2='$id' order by ngaydang desc,ordernum asc,id desc limit  $start_row,$limit";
	  $query=$this->db->query($sql);
	  return $query;
	  
	}
    function categoriesfa3($id)
    {
        $this->db->where('danhmucbaivietcap3',$id);
	$this->db->where('status','0');
	$this->db->order_by('ngaydang','desc');
	$this->db->order_by('ordernum','desc');
	$this->db->order_by('id','desc');
	$this->db->from('tbltintuc');
	$query=$this->db->get();
	return $query;
    }
    function categoriesfa3_limited($id,$start_row,$limit)
	{
	  $sql="select * from tbltintuc where status='0' and  danhmucbaivietcap3='$id' order by ngaydang desc,ordernum asc,id desc limit  $start_row,$limit";
	  $query=$this->db->query($sql);
	  return $query;
	  
	}
    function getnewsbyid($id)
    {
        $this->db->where('id',$id);
        $sqlnewsid = $this->db->get('tbltintuc');
        return $sqlnewsid->row(); 
    }
    function num_view($id)
    {
        $this->db->where('id',$id);
        $new = $this->db->get('tbltintuc');
        $new = $new->row();
        $view = $new->view + 1;
        $data = array(
            'view'  =>$view
        );
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $this->db->update('tbltintuc',$data);
    } 
    function num_viewp($id)
    {
        $this->db->where('id',$id);
        $new = $this->db->get('tblphong');
        $new = $new->row();
        $view = $new->view + 1;
        $data = array(
            'view'  =>$view
        );
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $this->db->update('tblphong',$data);
    } 
    function getchungloai($id)	
	{
	   $this->db->where('danhmucsanpham',$id);
       $sql = $this->db->get('tbldanhmucsanpham2');
       return $sql->result();
	}        
    function getdanhmuc2($id)	
	{
	   $this->db->where('danhmucbaiviet',$id);
       $sql = $this->db->get('tbldanhmucbaiviet2');
       return $sql->result();
	}
    function getdanhmuc3($id)
    {
        $this->db->where('danhmucbaivietcap2',$id);
        $sql = $this->db->get('tbldanhmucbaiviet3');
        return $sql->result();
    }
    function getdanhmuc4($id)
    {
        $this->db->where('danhmuc',$id);
        $sql = $this->db->get('tbldanhmucsanpham4');
        return $sql->result();    
    }
    function getdanhmucsp2($id)
    {
        $this->db->where('danhmucsanpham',$id);
        $sql=$this->db->get('tbldanhmucsanpham2');
        return $sql->result();
    }
    function getdanhmucpk2($id)
    {
        $this->db->where('danhmucphukien',$id);
        $sql=$this->db->get('tbldanhmucphukien2');
        return $sql->result();
    }
    function getdanhmucsp3($id)
    {
        $this->db->where('danhmucsanphamcap2',$id);
        $sql=$this->db->get('tbldanhmucsanpham3');
        return $sql->result();
    }
    function getdoitac()
    {
        $this->db->where('status',0);  
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');            
        $search = $this->db->get('tblkhachhang');
        return $search;      
    }
    function getdoitac_limited($limit,$start_row)
    {
        $this->db->where('status',0);  
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc'); 
        $this->db->limit($limit,$start_row);            
        $search = $this->db->get('tblkhachhang');
        return $search;
    }
    function getcity($id)
    {
        $this->db->where('status',0);  
        $this->db->where('tinh',$id);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');            
        $search = $this->db->get('tblphong');
        return $search;    
    }
    function getcity_limited($id,$limit,$start_row)
    {
        $this->db->where('status',0);  
        $this->db->where('tinh',$id);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');     
        $this->db->limit($limit,$start_row);         
        $search = $this->db->get('tblphong');
        return $search;
    }
    function getsearch($ten,$ngaynhanphong,$ngaytraphong,$songuoi)
    {
        $ngaynhanphong1=explode('-',$ngaynhanphong);
        $ngaynhanphong2=$ngaynhanphong1[2].'-'.$ngaynhanphong1[1].'-'.$ngaynhanphong1[0];
        $ngaytraphong1=explode('-',$ngaytraphong);
        $ngaytraphong2=$ngaytraphong1[2].'-'.$ngaytraphong1[1].'-'.$ngaytraphong1[0];
        $this->db->where('ngaynhanphong',$ngaynhanphong2);
        $this->db->where('ngaytraphong',$ngaytraphong2);
        $sqldonhang=$this->db->get('tblorder');
        if($sqldonhang->num_rows()>0)
        {
            
        }
        else
        {
            $this->db->where('status',0);
            $songuoi=$this->input->post('songuoi');
            if($songuoi=='')
            {
                $this->db->where('soluong >',$songuoi);    
            }
            else
            {
                $this->db->where('soluong >',$songuoi);
            }
            $ten=$this->input->post('ten');
            if($ten=='')
            {                            
            }                
            else
            {            
                $this->db->like('ten',$ten);                                  
            }
            $this->db->order_by('ordernum','desc');
            $this->db->order_by('id','desc');            
            $search = $this->db->get('tblphong');
            return $search;       
        }
    }
    function getsearch_limited($ten,$ngaynhanphong,$ngaytraphong,$songuoi,$limit,$start_row)
    {             
        $ngaynhanphong1=explode('-',$ngaynhanphong);
        $ngaynhanphong2=$ngaynhanphong1[2].'-'.$ngaynhanphong1[1].'-'.$ngaynhanphong1[0];
        $ngaytraphong1=explode('-',$ngaytraphong);
        $ngaytraphong2=$ngaytraphong1[2].'-'.$ngaytraphong1[1].'-'.$ngaytraphong1[0];
        $this->db->where('ngaynhanphong',$ngaynhanphong2);
        $this->db->where('ngaytraphong',$ngaytraphong2);
        $sqldonhang=$this->db->get('tblorder');
        if($sqldonhang->num_rows()>0)
        {            
        }
        else
        {
            $this->db->where('status',0);
            $songuoi=$this->input->post('songuoi');
            if($songuoi=='')
            {
                $this->db->where('soluong >',$songuoi);    
            }
            else
            {
                $this->db->where('soluong >',$songuoi);
            }
            $ten=$this->input->post('ten');
            if($ten=='')
            {                            
            }                
            else
            {            
                $this->db->like('ten',$ten);                                  
            }
            $this->db->order_by('ordernum','desc');
            $this->db->order_by('id','desc'); 
            $this->db->limit($limit,$start_row);           
            $search = $this->db->get('tblphong');
            return $search;       
        }
    }
    function gettimkiem($danhmuc,$ten)
    {         
        $this->db->where('status',0);
        $danhmuc=$this->input->post('danhmuc');
        $ten=$this->input->post('ten');
        if($danhmuc==0)
        {}
        else
        {
            $this->db->where('danhmucsanpham',$danhmuc);     
        }
        if($ten=='')
        {                            
        }                
        else
        {            
            $this->db->like('ten',$ten);                                  
        }       
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');            
        $search = $this->db->get('tblsanpham');
        return $search;
    }
    function gettimkiem_limited($danhmuc,$ten,$limit,$start_row)
    {         
        $this->db->where('status',0);        
        $danhmuc=$this->input->post('danhmuc');
        $ten=$this->input->post('ten');
        if($danhmuc==0)
        {}
        else
        {
            $this->db->where('danhmucsanpham',$danhmuc);     
        }
        if($ten=='')
        {                            
        }                
        else
        {            
            $this->db->like('ten',$ten);                                  
        }       
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');    
        $this->db->limit($limit,$start_row);
        $search = $this->db->get('tblsanpham');
        return $search;    
    }       
    function products_video()
    {
        $this->db->where('status','0');         
        $this->db->from('tblvideo');
        $query=$this->db->get();
        return $query;  
    }
    function products_limited_video($start_row,$limit)
    {
        $sql="select * from tblvideo where status='0' order by id desc limit $start_row,$limit";
        $query=$this->db->query($sql);
        return $query;    
    }
    function products_hot()    
    {        
        $this->db->where('status',0);
        $this->db->where('noibat',1);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');                 
        $this->db->from('tblsanpham');
        $query=$this->db->get();
        return $query;    
    }    
   	function products_limited_hot($start_row,$limit)
	{
	   $sql="select * from tblsanpham where status=0 and noibat=1 order by ordernum desc,id desc limit $start_row,$limit";
       $query=$this->db->query($sql);
       return $query;
    }    
    function products_hot1()    
    {        
        $this->db->where('status',0);        
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');                 
        $this->db->from('tblsanpham');
        $query=$this->db->get();
        return $query;    
    }    
   	function products_limited_hot1($start_row,$limit)
	{
	   $sql="select * from tblsanpham where status=0 order by ordernum desc,id desc limit $start_row,$limit";
       $query=$this->db->query($sql);
       return $query;
    }    
    function gethoidap()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqlhd = $this->db->get('tblhoidap');
		return $sqlhd;
    }
    function gethoidap_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqlhd = $this->db->get('tblhoidap');
		return $sqlhd;
    }
    function getykien()
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
		$sqldt = $this->db->get('tblkhachhang');
		return $sqldt;    
    }
    function getykien_limited($limit,$start_row)
    {
        $this->db->where('status',0);
        $this->db->order_by('ordernum','desc');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start_row);
        $sqldt = $this->db->get('tblkhachhang');
		return $sqldt;
    }
}
?>