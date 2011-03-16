<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>What's new | Semanti–CS Updates</title>
<link href="screen.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<body>

<?php

	require_once('_library.php');
	
	$q = '
PREFIX dc: <http://purl.org/dc/elements/1.1/>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rss: <http://purl.org/rss/1.0/>
SELECT ?link ?title ?date
WHERE {
	?item rss:link ?link .
	?item rss:title ?title .
	?item dc:date ?date .
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
			echo("<li>{$row['date']}: <a href=\"{$row['link']}\">{$row['title']}</li>\n");
		}
		echo('</ul>');
	}

?>
</body>
</html>