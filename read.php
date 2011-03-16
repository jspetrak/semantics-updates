<?php

	require_once('_library.php');
	
	$sources = array('http://localhost/_rssdemo1/rss.rdf', 'http://localhost/_rssdemo2/rss.rdf');
	
	foreach ($sources as $source) {
		$READER->loadFeed($source);
	}

?>