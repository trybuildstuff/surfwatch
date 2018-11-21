<?php
$url = 'http://magicseaweed.com/api/06c6c6502c517fa06b1d405326fa2a24/forecast/?spot_id=546';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

//print_r($curl_error);


$output = json_decode($output);

//print_r($output);

$html = '';

foreach ($output as $val) {
    
    $html .= "<tr class=''>
                <td class='text' data-title='Location'>".$val->localTimestamp."</td>
                <td class='text' data-title='Surf Height'>".$val->swell->minBreakingHeight." ".$val->swell->maxBreakingHeight."</td>
                <td class='text' data-title='Tide Times'>3.7ft at 5:30am</td>
                <td class='text' data-title='Wind Direction'>".$val->wind->compassDirection."</td>
                <td class='text' data-title='Swells'>SE</td>
                <td class='text' data-title='Weather'>23&deg; & Cloudy</td>
                <td class='number' data-title='Get Directions'><a href=\"#\">View &#8599;</a></td>
             </tr>";
    
}

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
</head>
<style type="text/css">
	/* info (hed, dek, source, credit) */
.rg-container {
	font-family: 'Overpass Mono', monospace;
	font-size: 16px;
	line-height: 2.5;
	margin: 0;
	padding: 1em 0.5em;
}
.rg-header {
	margin-bottom: 3em; 
}

.rg-header > * {
	display: block;
}
.rg-hed {
	font-weight: bold;
	font-size: 1.2em;
	text-transform: uppercase;
	font-family: 'Fira Mono', Helvetica, Arial, sans-serif;
}
.rg-dek {
	font-size: 1em;
}

.rg-source {
	margin: 0 auto;
	font-size: 0.75em;
	text-align: right;
	max-width: 1200px;
}
.rg-source .pre-colon {
	text-transform: uppercase;
}

.rg-source .post-colon {
	font-weight: bold;
}

/* table */
table.rg-table {
	width: 100%;
	margin-bottom: 0.5em;
	font-size: 1.1em;
	border-collapse: collapse;
	border-spacing: 0;
    	max-width: 1200px;
    	margin: 0 auto;
}
table.rg-table tr {
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
	text-align: left;
	color: #333;
}
table.rg-table thead {
	border-bottom: 0px;
	padding-bottom: 2px;
} 
table.rg-table tr {
	border-bottom: 1px solid #666;
	color: #222;
}
table.rg-table tr.highlight {
	background-color: #dcf1f0 !important;
}
table.rg-table.zebra tr:nth-child(even) {
	background-color: #f6f6f6;
}
table.rg-table th {
	font-weight: bold;
	padding: 0.35em;
	font-size: 1em;
	font-family: 'Fira Mono', Helvetica, Arial, sans-serif;
	text-align: center;
	text-transform: uppercase;
}
table.rg-table td {
	padding: 0.35em;
	font-size: 0.9em;
	text-align: center;
}
table.rg-table .highlight td {
	font-weight: bold;
}
table.rg-table th.number, td.number {
	text-align: right;
}

/* media queries */
@media screen and (max-width: 544px) {
.rg-container {
	max-width: 544px;
	margin: 0 auto;
}
table.rg-table {
	width: 100%;
}
table.rg-table tr.hide-mobile, table.rg-table th.hide-mobile, table.rg-table td.hide-mobile {
	display: none;
}
table.rg-table thead {
	display: none;
}
table.rg-table tbody {
	width: 100%;
}
table.rg-table tr, table.rg-table th, table.rg-table td {
	display: block;
	padding: 0;
}
table.rg-table tr {
	border-bottom: none;
	margin: 0 0 1em 0;
	padding: 0.5em;
}
table.rg-table tr.highlight {
	background-color: inherit !important;
}
table.rg-table.zebra tr:nth-child(even) {
	background-color: none;
}
table.rg-table.zebra td:nth-child(even) {
	background-color: #f6f6f6;
}
table.rg-table tr:nth-child(even) {
	background-color: none;
}
table.rg-table td {
	padding: 0.5em 0 0.25em 0;
	border-bottom: 1px dotted #ccc;
	text-align: right;
}
table.rg-table td[data-title]:before {
	content: attr(data-title);
	font-weight: bold;
	display: inline-block;
	content: attr(data-title);
	float: left;
	margin-right: 0.5em;
	font-size: 0.95em;
}
table.rg-table td:last-child {
	padding-right: 0;
	border-bottom: 2px solid #ccc;
}
table.rg-table td:empty {
	display: none;
}
table.rg-table .highlight td {
	background-color: inherit;
	font-weight: normal;
}
}

</style>
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
				<th class='text '>Get Directions</th>
				</tr>
			</thead>
			<tbody>
                
                <?php echo $html;?>
				
                <!--
				<tr class=''>
					<td class='text ' data-title='Location'>Ann Street Reef</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Alexandra Headland</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Point Cartwright</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>	
<tr class=''>
					<td class='text ' data-title='Location'>Mooloolaba</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Warana</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Dickys</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Moffat Cliffs</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Kings Beach</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
<tr class=''>
					<td class='text ' data-title='Location'>Bulcock Beach</td>
					<td class='text ' data-title='Surf Height'>2-3ft</td>
					<td class='text ' data-title='Tide Times'>3.7ft at 5:30am</td>
					<td class='text ' data-title='Wind Direction'>&#8593; Light SSE</td>
					<td class='text ' data-title='Swells'>SE</td>
					<td class='text ' data-title='Weather'>23&deg; & Cloudy</td>
</td>
					<td class='number ' data-title='Get Directions'><a href="#">View &#8599;</a></td>
				</tr>
                
                -->

			
			</tbody>
		</table>
	</div>
	<div class='rg-source'>
		<span class='pre-colon'>Made with ? in Caloundra | &#169; Copyright 2018</span>
	</div>
</div>

</html>