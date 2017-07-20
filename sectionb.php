<!DOCTYPE html>
<html lang="en-US">
<head>
<script type="tet/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
	var data = new google.visualization.DataTable();
	data.addColumn('string', Category);
	data.addColumn('number', Cnt);
	data.addRows([
	
	['<?php echo $acc_cat; ?>', '<?php echo $acc_cnt; ?>'],
	['<?php echo $acc_cat; ?>', '<?php echo $acc_cnt; ?>'],
	]);
	
	var options = {'title': 'Piechart', 'width':550, 'height':400};
	
	var chart = new google.visualization.PieChart(doucment.getElementById('piechart'));
	chart.draw(data, options);
}
</script>

<h1>My Web Page</h1>
<div id="piechart"></div>
</body>

</html>

<?php
$hn = 'localhost';
$db = 'faloduno_pbl';
$un = 'faloduno_pbl';
$pw = 'mypassword';

$conn = new mysql_connect($hn, $un, $pw, $db);
if($conn->connect_error){
   die($conn->connect_error);
}

$query = "SELECT category, count(*) as cnt FROM classics";
$results = mysql_query($conn, $query);

$pieData = array();
while ($row = mysql_fetch_array($results)){
	$acc_cat = $row['category'];
	$acc_cnt = $row['cnt'];
	$pieData[] = array($row['category'], $row['cnt']);
}
?>

