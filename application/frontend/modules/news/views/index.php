<table>
	<tr>
		<td>ID</td>
		<td>Title</td>
	</tr>
<?php while($row = mysql_fetch_assoc($news)):?>
	<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['title']?></td>
	</tr>
<?php endwhile;?>
</table>