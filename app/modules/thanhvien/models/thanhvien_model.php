<?php 
class thanhvien_model extends Model
{
    function thanhvien_model()
    {
        parent::Model();
    }
    function validate_register_email($email)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('tblnhatuyendung');
		if($query->num_rows==1)
		{
			return true;
		}
	}
    function validate_register_emailuv($email)
    {
        $this->db->where('email',$email);
        $query=$this->db->get('tblungvien');
        if($query->num_rows==1)
        {
            return true;
        }
    }
    function gethoso()
    {  
        if(isset($_SESSION['username1']))
        {
            $this->db->where('emailuv',$_SESSION['username1']);
            $ungvien=$this->db->get('tblungvien')->row();
        }
		$this->db->where('status','0');
		$this->db->order_by('emailuv',$ungvien->id);
		$this->db->order_by('ordernum','desc');
		$this->db->order_by('id','desc');		
		$query=$this->db->get('tblhosoungvien');
		return $query;  
    }
    function gethoso_limited($start_row,$limit)
	{
	   if(isset($_SESSION['username1']))
       {
            $this->db->where('emailuv',$_SESSION['username1']);
            $ungvien=$this->db->get('tblungvien')->row();
        }
	  $sql="select * from tblhosoungvien where status='0' and emailuv=$ungvien->id order by ordernum asc,id desc limit  $start_row,$limit";
	  $query=$this->db->query($sql);
	  return $query;	  
	}
    function gettindang()
    {
        if(isset($_SESSION['username']))
        {
            $this->db->where('email',$_SESSION['username']);
            $user=$this->db->get('tblnhatuyendung')->row();
        }
		$this->db->where('status','0');
		$this->db->where('email',$user->id);
		$this->db->order_by('ordernum','desc');
		$this->db->order_by('id','desc');		
		$query=$this->db->get('tbltintuyendung');
		return $query;      
    }
    function gettindang_limited($start_row,$limit)
    {
        if(isset($_SESSION['username']))
        {
            $this->db->where('email',$_SESSION['username']);
            $user=$this->db->get('tblnhatuyendung')->row();
        }    
        $sql="select * from tbltintuyendung where status='0' and email=$user->id order by ordernum asc,id desc limit  $start_row,$limit";
        $query=$this->db->query($sql);
        return $query;
    }
    function gettinhethan()
    {
        if(isset($_SESSION['username']))
        {
            $this->db->where('email',$_SESSION['username']);
            $user=$this->db->get('tblnhatuyendung')->row();
        }       
        $ngayhomnay=date("Y-m-d");
        $hethan=strtotime($ngayhomnay);
		$this->db->where('status','0');
		$this->db->where('email',$user->id);
        $this->db->where('hannhanhoso <',$hethan);
		$this->db->order_by('ordernum','desc');
		$this->db->order_by('id','desc');		
		$query=$this->db->get('tbltintuyendung');
		return $query;      
    }
    function gettinhethan_limited($start_row,$limit)
    {
        if(isset($_SESSION['username']))
        {
            $this->db->where('email',$_SESSION['username']);
            $user=$this->db->get('tblnhatuyendung')->row();
        }   
        $ngayhomnay=date("Y-m-d");
        $hethan=strtotime($ngayhomnay);
        $sql="select * from tbltintuyendung where status='0' and email=$user->id and hannhanhoso <$hethan  order by ordernum desc,id desc limit  $start_row,$limit";
        $query=$this->db->query($sql);
        return $query;
    }
    function getluuhoso()
    {
        $this->db->where('status','0');				
		$this->db->order_by('id','desc');		
		$luu=$this->db->get('tblluucongviec');
		return $luu;      
    }
    function getluuhoso_limited($start_row,$limit)
    {
        $sql="select * from tblluucongviec where status='0' order by id desc limit $start_row,$limit";
	    $luu=$this->db->query($sql);
	    return $luu;	
    }
}
?>