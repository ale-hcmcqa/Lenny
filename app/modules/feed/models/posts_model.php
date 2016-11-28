<?php 
class posts_model extends Model {
     
    // get all postings
    function getPosts()
    {
        $sql=$this->db->get('tblsanpham');
        return $sql;
    }
}
?>