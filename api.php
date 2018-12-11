<?php
	include './WeatherForcastExecutor.php';

	$wfExecutor = new WeatherForcastExecutor();
	$html = $wfExecutor->getExecutedJob();
?>

<!DOCTYPE html>
<html>
<head>
	<title>SW.COM</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="https://fonts.googleapis.com/css?family=Overpass+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fira+Mono:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class='rg-container'>
	<div class='rg-content'>
		<table class='rg-table' summary='Hed'>
			<caption class='rg-header'>
				<span class='rg-hed'>One Track Website</span>
				<span class='rg-dek'><em>noun: used in reference to a person whose thoughts are preoccupied with one subject or interest.</em></span>
			<thead>
				<tr>
				<th class='text '>Location</th>
				<th class='text '>Surf Height</th>
				<th class='text '>Tide Times</th>
				<th class='text '>Wind Direction</th>
				<th class='text '>Swells</th>
				<th class='text '>Weather</th>
				<th class='text '>Surf Rating</th>
				</tr>
			</thead>
			<tbody>
				<?= $html ?>
			</tbody>
		</table>
	</div>
	<div class='rg-source'>
		<span class='pre-colon'>Made with ? in Caloundra | &#169; Copyright 2018</span>
	</div>
</div>

</html>