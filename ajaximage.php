<?php
//include('db.php');
//session_start();
$session_id='1'; // User session id
$path = "upload/";
$valid_formats = array("jpg", "png", "PNG","gif","GIF", "bmp","BMP","JPG","jpeg","JPEG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
//mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
echo "<img src='upload/".$actual_image_name."' width='130' class='preview'>";
 echo "<input type='hidden' name='anh' value='upload/".$actual_image_name."'  id='anh' /> ";
  echo "<input type='hidden' name='anh_thumb' value=''  id='anh_thumb' /> ";
}
else
echo "failed";
}
else
echo "Image file size max 1 MB"; 
}
else
echo "Invalid file format.."; 
}
else
echo "Please select image..!";
exit;
}
?>