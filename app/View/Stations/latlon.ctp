<table>
<?php foreach($stations as $station): ?>
<tr>
	<td><?php echo $station['Stations']['id']; ?></td>
	<td><?php echo $station['Stations']['name']; ?></td>
	<td><?php echo $station['Stations']['lat']; ?></td>
	<td><?php echo $station['Stations']['lng']; ?></td>
	<td><?php echo $station['Stations']['latlng']; ?></td>
</tr>
<?php endforeach; ?>
</table>