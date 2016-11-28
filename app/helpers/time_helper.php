<?php
class test{
 public function calculateTime($time_to_calculate)
 {
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time_now = intval(strtotime(date('H:i:s d-m-Y')));
  $temp_time = intval(strtotime($time_to_calculate));
  $distance_time = $time_now - $temp_time;
  if($distance_time < 0)
  {
   return "Time to calculate must less than now";
   exit(); 
  }
  
  if($distance_time == 1)
  {
   return "Khoảng 1 giây trước";
  }
  else if(ceil($distance_time/60) == 1)
  {
   return "Khoảng 1 phút trước";
  }
  else if(ceil($distance_time/60) > 1 && ceil($distance_time/60) < 60)
  {
   return "Khoảng ".ceil($distance_time/60)." phút trước";
  }
  else if(ceil($distance_time/(60*60)) == 1)
  {
   return "Khoảng 1 giờ trước";
  }
  else if(ceil($distance_time/(60*60)) < 24)
  {
   return "Khoảng ".ceil($distance_time/(60*60))." giờ trước";
  }
  else if(ceil($distance_time/(60*60*24)) == 1)
  {
   return "Khoảng 1 ngày trước";
  }
  else if(ceil($distance_time/(60*60*24)) < 7)
  {
   return "Khoảng ".ceil($distance_time/(60*60*24))." ngày trước";
  }
  else if(ceil($distance_time/(60*60*24*7)) == 1)
  {
   return "Khoảng 1 tuần trước";
  }
  else if(ceil($distance_time/(60*60*24*7)) < 4)
  {
   return "Khoảng ".ceil($distance_time/(60*60*24*7))." tuần trước";
  }
  else if(ceil($distance_time/(60*60*24*7*4)) == 1)
  {
   return "Khoảng 1 tháng trước";
  }
  else if(ceil($distance_time/(60*60*24*7*4)) < 12)
  {
   return "Khoảng ".ceil($distance_time/(60*60*24*7*4))." tháng trước";
  }
  else if(ceil($distance_time/(60*60*24*7*4*12)) == 1)
  {
   return "Khoảng 1 năm trước";
  }
  else
  {
   return "Khoảng ".ceil($distance_time/(60*60*24*7*4*12))." năm trước";
  }
 }
}