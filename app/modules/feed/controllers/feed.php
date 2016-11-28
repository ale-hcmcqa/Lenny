<?php 
class Feed extends Controller {
       
      function Feed()
      {
        parent::Controller();
        $this->load->helper('xml');
        $this->load->helper('text');
        $this->load->model('posts_model');
      }
      function index()
    {
        $data['feed_name'] = 'Di động sinh viên'; // your website
        $data['encoding'] = 'UTF-8'; // the encoding
        $data['feed_url'] = base_url().'feed'; // the url to your feed
        $data['page_description'] = 'Hệ thống cửa hàng didongsinhvien.com là nơi bán smartphone giá rẻ chính hãng, phụ kiện điện thoại và những thiết bị di động như tablet, smartwatch, smartband,...với nhiều ưu đãi'; // some description
        $data['page_language'] = 'en-en'; // the language
        $data['creator_email'] = 'mail@me.com'; // your email
        $data['posts'] = $this->posts_model->getPosts();  
        header("Content-Type: application/rss+xml"); // important!
        $this->load->view('rss', $data);
    }
}
?>