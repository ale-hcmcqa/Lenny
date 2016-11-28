<?php
class Tag_model extends Model
{
    function __construct()
    {
        parent::Model();
        $this->load->database();
    }



	function getTagById($id)
	{



		$this->db->where('idnew',$id);



		$query=$this->db->get('tag_new');



		return $query;



	}



	function getTagNew($id)

	{

		$this->db->where('id',$id);

		$sql=$this->db->get('tag');

		return $sql->row();

	}

	function getnewByTagId($id)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','2');

		$query=$this->db->get('tag_new');

		return $query;

	}

	

	function getnewByTagId_limited($id,$limit,$start_row)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','2');

		$this->db->limit($limit,$start_row);

		$query=$this->db->get('tag_new');

		return $query;

	}
    function getsanphamByTagId($id)
	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','1');

		$query=$this->db->get('tag_new');

		return $query;

	}
    function getsanphamByTagId_limited($id,$limit,$start_row)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','1');

		$this->db->limit($limit,$start_row);

		$query=$this->db->get('tag_new');

		return $query;

	}
	function getphukienByTagId($id)
	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','3');

		$query=$this->db->get('tag_new');

		return $query;

	}
    function getphukienByTagId_limited($id,$limit,$start_row)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','3');

		$this->db->limit($limit,$start_row);

		$query=$this->db->get('tag_new');

		return $query;

	}
	function getnew($id)
	{
		$this->db->where('status',0);
		$this->db->where('id',$id);
		$sql=$this->db->get('tbltintuc');
		return $sql;
    }
    function getsanpham($id)
    {
        $this->db->where('status',0);
        $this->db->where('id',$id);
        $sql=$this->db->get('tblsanpham');
        return $sql;    
    }    
    function getphukien($id)
	{
		$this->db->where('idtag',$id);
		$this->db->where('categories','3');
		$query=$this->db->get('tag_new');
		return $query;
	}
	function khuyenmai_limited($id,$limit,$start_row)
	{
		$this->db->where('idtag',$id);
		$this->db->where('categories','1');
		$this->db->limit($limit,$start_row);
		$query=$this->db->get('tag_new');
		return $query;
	}
	function khuyenmai_id($id)
	{
		$this->db->where('status',0);
		$this->db->where('id',$id);
		$sql=$this->db->get('sanpham');
		return $sql->row();
    }
    function phapluat($id)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','4');

		$query=$this->db->get('tag_new');

		return $query;

	}

	

	function phapluat_limited($id,$limit,$start_row)

	{

		$this->db->where('idtag',$id);

		$this->db->where('categories','4');

		$this->db->limit($limit,$start_row);

		$query=$this->db->get('tag_new');

		return $query;

	}

	function phapluat_id($id)

	{

		$this->db->where('status',0);

		$this->db->where('id',$id);

		$sql=$this->db->get('khachang');

		return $sql->row();

    }


	}



?>