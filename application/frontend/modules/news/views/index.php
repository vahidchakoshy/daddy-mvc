<a href="<?php echo base_url('index.php/news/submit')?>">ارسال خبر جدید</a>
<table>
	<tr>
		<td>ID</td>
		<td>Title</td>
		<td>Manage</td>
	</tr>
<?php while($row = mysql_fetch_assoc($news)):?>
	<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['title']?></td>
		<td><a href="<?php echo base_url('index.php/news/view/'.$row['id'])?>">نمایش</a></td>
	</tr>
<?php endwhile;?>
</table>