<html>
<head>
<title>
Mapeamento banco
</title>
<style>
body{
	font-family: "Verdana","Helvetica",sans-serif;
    font-size: 0.7em;
}
</style>
</head>
<body>
<form action="mapping/tables/direciona.php" method="get" target="frameMapeamento">
	Nome da Coluna: <input type="text" name="coluna">
	<input type="submit" value="pesquisar">
</form>
<iframe id="frameMapeamento" name="frameMapeamento" width="960" height="600" frameborder="0"></iframe>
</body>
</html>