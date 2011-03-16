<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>Start | Semanti–CS Updates HQ</title>
<link href="hq.screen.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<body>

<?php

	require_once('../_setup.php');
	
	$q = '
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
@prefix foaf: <http://xmlns.com/foaf/0.1/> .
PREFIX ov: <http://open.vocab.org/terms/> .
SELECT ?feed ?name
WHERE {
	<http://keg.vse.cz/resource/software/semanti-cs-updates> rdf:type foaf:Agent .
	<http://keg.vse.cz/resource/software/semanti-cs-updates> ov:syndicates ?feed .
	?feed rdf:type foaf:Document .
	?feed foaf:name ?name .
}
ORDER BY DESC(?date)
	';

	$data = $STORE->query($q);
	if (sizeof($STORE->getErrors()) > 0) {
		print_r($STORE->getErrors());
	}	
	
	if (sizeof($data['result']['rows']) > 0) {
		echo('<ul>');
		foreach($data['result']['rows'] as $row) {
			echo("<li>{$row['date']}: <a href=\"{$row['link']}\">{$row['title']}</a></li>\n");
		}
		echo('</ul>');
	}

?>

</body>
</html>