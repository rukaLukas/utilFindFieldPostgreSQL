<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

if(!empty($_GET['coluna'])){
	
	$link = pg_connect("host=localhost user=dbportal password=Prefe!tur@2010 dbname=e-cidade") or die("erro conexao" . pg_last_error());
	$coluna = pg_escape_string($_GET['coluna']);
	$query = "select 
			c.schemaname,
			c.relname,
			a.attname
			from pg_catalog.pg_attribute a 
			inner join pg_stat_user_tables c on a.attrelid = c.relid
			WHERE
			a.attnum > 0 AND
			NOT a.attisdropped
			AND a.attname = '".$coluna."'
			order by c.relname, a.attname";
	$result = pg_exec($link, $query);
	$numrows = pg_numrows($result);	
	$row = pg_fetch_array($result);	
	$schema = $row[0];
	$tabela = $row[1];
	
}
?>

<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $("#conteudo").load("<?php echo $schema . "_" . $tabela . ".html"; ?>");
 });
 </script>
 
 <style>
 #caminho{
	font-family: "Verdana","Helvetica",sans-serif;
	font-size: 0.7em;
	margin:0 0 10px 0;
	border:1px solid #cdcdcd;
	background: #ededed;
	color: #293D6B;
}
</style>
</head>
<body>
	<div id="caminho"><?php echo "<b>".$schema."</b><i>(schema)</i> -> <b>".$tabela."</b><i>(tabela)</i>"; ?></div>
	<div id="conteudo"></div>

</body>
</html>
