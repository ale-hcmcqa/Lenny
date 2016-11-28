<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "site";
$route['lien-he.html'] = 'site/contact';
$route['phu-kien.html'] = 'sanpham/phukien';
$route['san-pham-khuyen-mai.html']='sanpham/getsanphambykm';
$route['mon-an-theo-tuan.html']='sanpham/monantheotuan';
$route['dang-ky.html'] = 'thanhvien/register';
$route['dang-nhap.html'] = 'thanhvien/login';
$route['san-pham-ban-chay.html']='sanpham/sanphambanchay';
$route['khach-hang.html']='site/khachhang';
$route['y-kien-khach-hang.html']='site/ykien';
$route['thu-vien-anh.html']='thuvien/hinhanhhoatdong';
$route['san-pham.html']='sanpham/sanphamall';
$route['doi-tac.html']='site/doitac';
$route['video.html']='thuvien/video';
$route['thu-vien-nhac.html']='thuvien/nhac';
$route['(:any)-vd(:num).html'] = "site/videoct/$2";
$route['(:any)-(:num).html'] = "site/baivietchitiet/$2";
$route['(:any)-sp(:num).html'] = "sanpham/sanphambyid/$2";
$route['(:any)-p(:num).html'] = "sanpham/phukienbyid/$2";
$route['(:any)-dh(:num).html'] = "sanpham/dathang/$2";
$route['(:any)-dm(:num)(.html)?(/:num)?'] = 'sanpham/getdanhmucbyid/$2/$1/$3';
$route['(:any)-yk(:num)(.html)?(/:num)?'] = 'sanpham/getykienbyid/$2/$1/$3';
$route['(:any)-t(:num)(.html)?(/:num)?']='site/getdanhmuccity/$2/$1/$3';
$route['(:any)-hang(:num)(.html)?(/:num)?'] = 'sanpham/gethangbyid/$2/$1/$3';
$route['(:any)-loaixe(:num)(.html)?(/:num)?'] = 'sanpham/getloaixebyid/$2/$1/$3';
$route['(:any)-bv(:num)(.html)?(/:num)?'] = 'site/baivietcap1/$2/$1/$3';
$route['scaffolding_trigger'] = "";
$link = mysql_connect(dbhostname,dbuser,dbpass);
mysql_query("SET NAMES 'UTF8'");
mysql_select_db(dbdatabase, $link);
//danh muc bai viet cap 1
$catebv1 = mysql_query("SELECT * from tbldanhmucbaiviet where status='0'", $link);
while ($catebv11 = mysql_fetch_array($catebv1)) 
{
	$tenbv1 = BoDau($catebv11["danhmucbaiviet"]).'.html';
	$route[$tenbv1]= "site/baivietcap1/".$catebv11["id"]; 
}
//danh mục bài viết cấp 2
$cate2 = mysql_query("SELECT * from tbldanhmucbaiviet2 where status='0'", $link);
while ($cate3 = mysql_fetch_array($cate2)) 
{
	$ten2 = BoDau($cate3["danhmucbaivietcap2"]).'-bv2'.$cate3["id"].'.html';
	$route[$ten2]= "site/baivietcap2/".$cate3["id"]; 
}
//danh mục bài viết cấp 3
$cate3b = mysql_query("SELECT * from tbldanhmucbaiviet3 where status='0'", $link);
while ($cate3bb = mysql_fetch_array($cate3b)) 
{
	$ten3a = BoDau($cate3bb["danhmucbaivietcap3"]).'-bv3'.$cate3bb["id"].'.html';
	$route[$ten3a]= "site/baivietcap3/".$cate3bb["id"]; 
}
$catesp=mysql_query("SELECT * from tbldanhmucsanpham where status='0'", $link);
while ($catesp1 = mysql_fetch_array($catesp)) 
{
	$tencatesp1 = BoDau($catesp1["danhmucsanpham"]).'.html';
	$route[$tencatesp1]= "sanpham/getdanhmucbyid/".$catesp1["id"]; 
}
//danh muc san pham cap 2
$cate4 = mysql_query("SELECT * from tbldanhmucsanpham2 where status='0'", $link);
while ($cate5 = mysql_fetch_array($cate4)) 
{
	$ten5 = BoDau($cate5["danhmucsanphamcap2"]).'-dm2'.$cate5["id"].'.html';
	$route[$ten5]= "sanpham/getdanhmuc2byid/".$cate5["id"]; 
}
//danh muc san pham cap 3
$cate6 = mysql_query("SELECT * from tbldanhmucsanpham3 where status='0'", $link);
while ($cate7 = mysql_fetch_array($cate6)) 
{
	$ten9 = BoDau($cate7["danhmucsanphamcap3"]).'-dm3'.$cate7["id"].'.html';
	$route[$ten9]= "sanpham/getdanhmuc3byid/".$cate7["id"]; 
}
//danh muc phu kien cap 2
$catepk2 = mysql_query("SELECT * from tbldanhmucphukien2 where status='0'", $link);
while ($cate7pk = mysql_fetch_array($catepk2)) 
{
	$ten9pk = BoDau($cate7pk["danhmucphukiencap2"]).'-pk2'.$cate7pk["id"].'.html';
	$route[$ten9pk]= "sanpham/getphukienby2id/".$cate7pk["id"]; 
}
function BoDau($str)
{
	$str = strtolower($str);
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|�� �|ặ|ẳ|ẵ|ắ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|�� �|Ặ|Ẳ|Ẵ|Ắ)/", 'A', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ợ|Ở|Ớ|Ỡ)/", 'O', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	$str = preg_replace("/(Đ)/", 'D', $str);
	$str = preg_replace("/( |'|,|\||\.|\"|\?|\/|\%|–|!)/", '-', $str);
	$str = preg_replace("/(\()/", '-', $str);
	$str = preg_replace("/(\))/", '-', $str);
	$str = preg_replace("/(&)/", '-', $str);    
    $str = preg_replace("/(“|”)/", '-', $str);
	return strtolower($str);    
}