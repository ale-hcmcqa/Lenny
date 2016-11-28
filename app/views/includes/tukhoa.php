<?php 
$CI=&get_instance();
$CI->load->model('site/site_model');
$tukhoaf=$CI->site_model->gettablename_all('tbltukhoa','','','','');
if($tukhoaf->num_rows()>0)
{
?>
<ul id="tukhoa">
	<marquee onmouseover="this.stop()" scrollamount="3" onmouseout="this.start()" direction="left">
	<?php 
		foreach ($tukhoaf->result() as $itemtukhoaf) 
		{
		?>
		<li><a href="<?php echo $itemtukhoaf->link; ?>" target="_blank" title="<?php echo $itemtukhoaf->tukhoa; ?>"><?php echo $itemtukhoaf->tukhoa; ?></a></li>
		<?php
		}
		$tukhoaf->free_result();
	?> 
	</marquee>   
</ul>
<?php 
}
?>